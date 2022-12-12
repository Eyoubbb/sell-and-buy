<?php

require_once PATH_CORE . 'DAO.php';
require_once PATH_ENTITIES . 'SocialMedia.php';

class SocialMediaDAO extends DAO {

	public function __construct() {
		parent::__construct('socialmedias');
	}

	public function findAllByCreator($creator_id): array | false {
		$sql = "SELECT *
				FROM {$this->getTable()} S
				JOIN SocialMediaAccounts SMA
					USING (social_media_id)
				WHERE SMA.user_id = ?";
		
		return $this->queryAll($sql, [$creator_id], true);
	}
	
}