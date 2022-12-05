<?php

require_once PATH_CORE . 'DAO.php';
require_once PATH_ENTITIES . 'Product.php';

class ProductDAO extends DAO {

	public function __construct() {
		parent::__construct('products');
	}

	public function getAllProducts() {
		$sql = "SELECT *
				FROM {$this->getTable()} P
				JOIN users U
					ON (P.product_creator_id = U.user_id)
				WHERE P.product_visible = 1";

		return $this->queryAll($sql, null, false);
	}

	public function getAllByCategory($category_id) {
		$sql = "SELECT *
				FROM {$this->getTable()} P
				JOIN users U
					ON (P.product_creator_id = U.user_id)
				WHERE
					P.product_visible = 1
				AND
					P.product_category_id = ?";

		return $this->queryAll($sql, [$category_id], false);
	}
	
	public function getProductById($product_id) {
		$sql = "SELECT *
				FROM {$this->getTable()} P
				JOIN users U
					ON (P.product_creator_id = U.user_id)
				WHERE
					P.product_visible = 1
				AND
					P.product_id = ?";

		return $this->queryRow($sql, [$product_id], false);
	}
	
}