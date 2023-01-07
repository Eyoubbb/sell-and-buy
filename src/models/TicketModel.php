<?php

require_once PATH_CORE . 'Model.php';
require_once PATH_ENTITIES . 'Ticket.php';
require_once PATH_ENTITIES . 'User.php';

class TicketModel extends Model {
	public function tickets(): array | false {
		$ticketDAO = $this->dao('Ticket');
		$resTickets = $ticketDAO->findAllTickets();

		if ($resTickets === false) {
			$this->setError('ERROR_FETCHING_TICKETS');
			return false;
		}

		$tickets = [];
		$users = [];
		$admins = [];

		foreach ($resTickets as $row) {
			$tickets[] = new Ticket($row);

			if (!isset($users[$row['user_id']])) {
				$users[$row['user_id']] = new User($row);
			}
			
			$rowAdmin = [
				'user_id' => $row['admin_id'],
				'user_first_name' => $row['admin_first_name'],
				'user_last_name' => $row['admin_last_name'],
				'user_password_hash' => $row['admin_password_hash'],
				'user_email' => $row['admin_email'],
				'user_picture_url' => $row['admin_picture_url']
			];
			
			if(!isset($admins[$row['admin_id']]))
				$admins[$row['admin_id']] = new Admin($rowAdmin);
		}

		return [
			'tickets' => $tickets,
			'users' => $users,
			'admins' => $admins
		];
	}

	public function delete() {
		$ticketDAO = $this->dao('Ticket');
		$ticket = new Ticket($_POST);

		if (!$ticketDAO->deleteTicket($ticket)) {
			$this->setError('ERROR_DELETING_TICKET');
			return false;
		}

		return true;
	}

	public function resolve() {
		$ticketDAO = $this->dao('Ticket');
		$id = intval(explode('/', $_SERVER['REQUEST_URI'])[3]);
		$ticket = new Ticket($ticketDAO->findTicketById($id));

		if (!$ticketDAO->resolveTicket($ticket)) {
			$this->setError('ERROR_RESOLVING_TICKET');
			return false;
		}
		return true;
	}

	public function reopen() {
		$ticketDAO = $this->dao('Ticket');
		$id = intval(explode('/', $_SERVER['REQUEST_URI'])[3]);
		$ticket = new Ticket($ticketDAO->findTicketById($id));

		if (!$ticketDAO->reopenTicket($ticket)) {
			$this->setError('ERROR_REOPENING_TICKET');
			return false;
		}
		return true;
	}
}