<?php

require_once PATH_CORE . 'DAO.php';
require_once PATH_ENTITIES . 'Rating.php';

class RatingDAO extends DAO {

	public function __construct() {
		parent::__construct('ratings');
	}

	public function getRatingsByProduct($product_id) {
		$sql = "SELECT *
				FROM {$this->getTable()} R
				JOIN users U
					ON (R.rating_user_id = U.user_id)
				LEFT JOIN comments C
					ON (R.rating_id = C.comment_rating_id)
				WHERE R.rating_product_id = ?";
		
		return $this->queryAll($sql, [$product_id], false);
	}
	
}