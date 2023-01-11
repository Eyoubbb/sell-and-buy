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

		$resInsert = $creatorDAO->insertCreator($creator);

		if ($resInsert === false) {
			$this->setError('ERROR_CREATING_CREATOR');
			return false;
		}

		return true;
	}
}