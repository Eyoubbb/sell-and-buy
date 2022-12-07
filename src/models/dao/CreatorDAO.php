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
				WHERE creator_id = ?";
		
		return $this->queryRow($sql, [$id], false);
	}
	
}