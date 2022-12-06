<?php

require_once PATH_CORE . 'DAO.php';
require_once PATH_ENTITIES . 'Product.php';

class ProductDAO extends DAO {

	public function __construct() {
		parent::__construct('products');
	}

	public function findAllProducts() {
		$sql = "SELECT *
				FROM {$this->getTable()} P
				JOIN users U
					ON (P.product_creator_id = U.user_id)
				WHERE P.product_visible = 1";

		return $this->queryAll($sql, null, false);
	}

	public function findAllByCategory($category_id) {
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

	public function findAllByCategoryExclude($category_id, $product_id, ?int $limit = null) {
		$sql = "SELECT *
				FROM {$this->getTable()} P
				JOIN users U
					ON (P.product_creator_id = U.user_id)
				WHERE
					P.product_visible = 1
				AND
					P.product_category_id = ?
				AND
					P.product_id != ?
				ORDER BY RAND()";
		
		if ($limit !== null) {
			$sql .= " LIMIT ?";
			
			return $this->queryAll($sql, [$category_id, $product_id, $limit], false);
		}

		return $this->queryAll($sql, [$category_id, $product_id], false);
	}
	
	public function findProductById($product_id) {
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