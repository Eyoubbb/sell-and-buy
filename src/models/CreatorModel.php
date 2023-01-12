<?php

require_once PATH_CORE . 'Model.php';

class CreatorModel extends Model {

	public function profile($creatorId): array | false {

		$creatorDAO = $this->dao('Creator');

		$resCreator = $creatorDAO->findCreatorById($creatorId);

		if ($resCreator === false) {
			$this->setError('ERROR_CREATOR_NOT_FOUND');
			return false;
		}

		$socialMediaDAO = $this->dao('SocialMedia');

		$socialMedias = $socialMediaDAO->findAllByCreator($creatorId);
		
		if ($socialMedias === false) {
			$this->setError('ERROR_SOCIAL_MEDIA_NOT_FOUND');
			return false;
		}
		
		$productDAO = $this->dao('Product');
		
		$products = $productDAO->findAllByCreator($creatorId);

		if ($products === false) {
			$this->setError('ERROR_PRODUCTS_NOT_FOUND');
			return false;
		}

		return [
			'creator' => new Creator($resCreator),
			'socialMedias' => $socialMedias,
			'products' => $products
		];
	}
	
	public function ask(): bool {
		$description = $_POST['description'];
		$user = unserialize($_SESSION['user']);
		$banner = "BAN-1.svg";

		$creatorDAO = $this->dao('Creator');

		$creator = new Creator();
		$creator->setId($user->getId());
		$creator->setDescription($description);
		$creator->setBannerUrl($banner);
		$creator->setVisible(false);

		$resInsert = $creatorDAO->insertCreator($creator);

		if ($resInsert === false) {
			$this->setError('ERROR_CREATING_CREATOR');
			return false;
		}

		$adminDAO = $this->dao('Admin');
		
		$res = $adminDAO->getAllAdmins();

		if ($res === false) {
			$this->setError('ERROR_FETCHING_ADMINS');
			return false;
		}

		$randomAdmin = rand(0, count($res) - 1);

		
		$ticketDAO = $this->dao('Ticket');

		$ticket = new Ticket();
		$ticket->setUserId($user->getId());
		$ticket->setTicketTypeId(5);
		$ticket->setAdminId($res[$randomAdmin]['admin_id']);

		$resTicket = $ticketDAO->createTicket($ticket);

		if ($resTicket === false) {
			$this->setError('ERROR_CREATING_TICKET');
			return false;
		}

		return true;
	}
}