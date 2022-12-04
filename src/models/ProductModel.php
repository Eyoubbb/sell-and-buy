<?php

require_once PATH_CORE . 'Model.php';
require_once PATH_ENTITIES . 'Product.php';
require_once PATH_ENTITIES . 'Category.php';
require_once PATH_ENTITIES . 'User.php';

class ProductModel extends Model {

	public function home(): array | false {
		$productDAO = $this->dao('Product');

		if (!empty($_GET['category']) && is_numeric($_GET['category'])) {
			$resProducts = $productDAO->getAllByCategory($_GET['category']);
		} else {
			$resProducts = $productDAO->getAllProducts();
		}

		if ($resProducts === false) {
			$this->setError('ERROR_FETCHING_PRODUCTS');
			return false;
		}
		
		$products = [];
		$creators = [];

		foreach ($resProducts as $row) {
			$products[] = new Product($row);
			
			if (!isset($creators[$row['user_id']])) {
				$creators[$row['user_id']] = new User($row);
			}
		}

		$categoryDAO = $this->dao('Category');

		$categories = $categoryDAO->getAll();

		if ($categories === false) {
			$this->setError('ERROR_FETCHING_CATEGORIES');
			return false;
		}
		
		return [
			'products' => $products,
			'creators' => $creators,
			'categories' => $categories
		];
	}

}