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
	
	public function ask(): Creator | false {
		
		$description = $_POST['description'];
		$bannerUrl = $_POST['bannerUrl'];

		$creator = new Creator();
		$creator->setDescription($description);
		
		
		$userId = $userDAO->insertUser($user);
	}
}