<?php

require_once PATH_CORE . 'Model.php';
require_once PATH_ENTITIES . 'Product.php';
require_once PATH_ENTITIES . 'Category.php';
require_once PATH_ENTITIES . 'User.php';

class ProductModel extends Model {

	public function home(): array | false {
		$productDAO = $this->dao('Product');

		$res = $productDAO->getAllProducts();

		if (!$res) {
			$this->setError('ERROR_FETCHING_PRODUCTS');
			return false;
		}
		
		$products = [];
		$categories = [];
		$creators = [];

		foreach ($res as $row) {
			$products[] = new Product($row);
			
			if (!isset($categories[$row['category_id']])) {
				$categories[$row['category_id']] = new Category($row);
			}
			
			if (!isset($creators[$row['user_id']])) {
				$creators[$row['user_id']] = new User($row);
			}
		}
		
		return [
			'products' => $products,
			'categories' => $categories,
			'creators' => $creators
		];
	}

}