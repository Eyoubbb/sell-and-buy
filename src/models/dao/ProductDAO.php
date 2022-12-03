<?php

require_once PATH_CORE . 'DAO.php';
require_once PATH_ENTITIES . 'Product.php';

class ProductDAO extends DAO {

	public function __construct() {
		parent::__construct('products');
	}
	
}