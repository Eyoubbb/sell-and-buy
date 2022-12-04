<?php

class Ticket {

	private int $ticket_id;
	private int $user_id;
	private int $ticket_type_id;
	private int $admin_id;
	private string $ticket_name;
	private string $ticket_description;
	private string $ticket_date;
	private bool $ticket_resolved;

	public function getId(): int { return $this->ticket_id; }

	public function getUserId(): int { return $this->user_id; }
	
	public function getTicketTypeId(): int { return $this->ticket_type_id; }

	public function getAdminId(): int { return $this->admin_id; }

	public function getName(): string { return $this->ticket_name; }

	public function getDescription(): string { return $this->ticket_description; }

	public function getDate(): string { return $this->ticket_date; }

	public function getResolved(): bool { return $this->ticket_resolved; }
	
}