<?php

require_once PATH_CORE . 'Model.php';
require_once PATH_ENTITIES . 'Product.php';
require_once PATH_ENTITIES . 'Category.php';
require_once PATH_ENTITIES . 'User.php';
require_once PATH_ENTITIES . 'Rating.php';
require_once PATH_ENTITIES . 'Comment.php';

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

	public function product($id): array | false {
		$productDAO = $this->dao('Product');
		$resProduct = $productDAO->getProductById($id);

		if ($resProduct === false) {
			$this->setError('ERROR_FETCHING_PRODUCT');
			return false;
		}

		$product = new Product($resProduct);
		$creator = new User($resProduct);

		$ratingDAO = $this->dao('Rating');
		$resRatings = $ratingDAO->getRatingsByProduct($id);

		if ($resRatings === false) {
			$this->setError('ERROR_FETCHING_RATINGS');
			return false;
		}

		$ratings = [];
		$users = [];
		$comments = [];
		foreach ($resRatings as $row) {
			$ratings[] = new Rating($row);

			if (!isset($users[$row['user_id']])) {
				$users[$row['user_id']] = new User($row);
			}

			if (!empty($row['comment_id'])) {
				$comments[$row['comment_id']] = new Comment($row);
			}
		}

		return [
			'product' => $product,
			'creator' => $creator,
			'ratings' => $ratings,
			'users' => $users,
			'comments' => $comments
		];
	}

}