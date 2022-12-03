<?php

require_once PATH_CORE . 'Model.php';

class ProductModel extends Model {

	public function getAllProducts() {
		$productDAO = $this->dao('Product');

		return $productDAO->getAll();
	}

}