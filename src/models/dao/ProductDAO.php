<?php

require_once PATH_CORE . 'DAO.php';
require_once PATH_ENTITIES . 'Product.php';

class ProductDAO extends DAO {

	public function __construct() {
		parent::__construct('products');
	}

	public function getAllProducts() {
		$sql = 'SELECT *
				FROM products P
				JOIN categories C
					USING (category_id)
				JOIN users U
					ON (P.creator_id = U.user_id)
				WHERE P.product_visible = 1
				ORDER BY P.product_id';

		return $this->queryAll($sql, null, false);
	}
	
}