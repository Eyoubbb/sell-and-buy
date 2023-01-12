<?php

require_once PATH_CORE . 'DAO.php';
require_once PATH_ENTITIES . 'Creator.php';
require_once PATH_ENTITIES . 'User.php';

class CreatorDAO extends DAO {

	public function __construct() {
		parent::__construct('creators');
	}

	public function findCreatorById($id) {
		$sql = "SELECT *
				FROM {$this->getTable()} C
				JOIN users U
					ON C.creator_id = U.user_id
				WHERE creator_id = ? and creator_visible is not false";
		
		return $this->queryRow($sql, [$id], false);
	}

	public function insertCreator(Creator $creator) {
		return $this->insert([
            'creator_id' => $creator->getId(),
            'creator_description' => $creator->getDescription(),
            'creator_banner_url' => $creator->getBannerUrl(),
			'creator_visible' => $creator->getVisible()
        ]);
	}

	public function setVisibleCreator(int $creator_id, bool $visibility) {
		$sql = "UPDATE {$this->getTable()} SET creator_visible = ?
				WHERE creator_id = ?";
		return $this->rowCount($sql, [$visibility, $creator_id]);
	}
	
}