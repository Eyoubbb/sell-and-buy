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
			$resProducts = $productDAO->findAllByCategory($_GET['category']);
		} else {
			$resProducts = $productDAO->findAllProducts();
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

		$categories = $categoryDAO->findAll();

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
		$resProduct = $productDAO->findProductById($id);

		if ($resProduct === false) {
			$this->setError('ERROR_FETCHING_PRODUCT');
			return false;
		}

		$product = new Product($resProduct);
		$creator = new User($resProduct);

		$ratingDAO = $this->dao('Rating');
		$resRatings = $ratingDAO->findRatingsByProduct($id);

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

		$resSimilar = $productDAO->findAllSimilarProducts($product->getCategoryId(), $product->getId(), 4);

		if ($resSimilar === false) {
			$this->setError('ERROR_FETCHING_SIMILAR_PRODUCTS');
			return false;
		}

		$similarProducts = [];
		foreach ($resSimilar as $row) {
			$similarProducts[] = new Product($row);

			if (!isset($users[$row['user_id']])) {
				$users[$row['user_id']] = new User($row);
			}
		}

		return [
			'product' => $product,
			'creator' => $creator,
			'ratings' => $ratings,
			'users' => $users,
			'comments' => $comments,
			'similarProducts' => $similarProducts
		];
	}

	public function new(): array | false {
		$categoryDAO = $this->dao('Category');

		$categories = $categoryDAO->findAll();

		if ($categories === false) {
			$this->setError('ERROR_FETCHING_CATEGORIES');
			return false;
		}

		return [
			'categories' => $categories
		];
	}

	public function saveNew(): array | false {
		[
			'name' => $name,
			'description_fr' => $descriptionFr,
			'description_en' => $descriptionEn,
			'price' => $price,
			'category_id' => $categoryId
		] = $_POST;

		$image = $_FILES['image'];

		$resExif = exif_imagetype($image['tmp_name']);
		if (!in_array($resExif, [IMAGETYPE_JPEG, IMAGETYPE_PNG, IMAGETYPE_WEBP])) {
			$this->setError('INVALID_PICTURE');
			return false;
		}

		if ($image['size'] > 5_000_000) {
			$this->setError('PICTURE_TOO_BIG');
			return false;
		}

		$productDAO = $this->dao('Product');

		$product = new Product();
		$product->setName($name);
		$product->setDescriptionFr($descriptionFr);
		$product->setDescriptionEn($descriptionEn);
		$product->setPrice($price);
		$product->setCategoryId($categoryId);
		$product->setCreatorId(unserialize($_SESSION['user'])->getId());

		$productId = $productDAO->insertProduct($product);

		if ($productId === false) {
			$this->setError('ERROR_INSERTING_PRODUCT');
			return false;
		}

		$product->setId($productId);

		$fileName = "PROD-$productId." . pathinfo($image['name'], PATHINFO_EXTENSION);

		if (!move_uploaded_file($image['tmp_name'], PATH_UPLOAD_PROFILE_PICTURES . $fileName)) {
			$productDAO->rollBack();
			$this->setError('ERROR_UPLOADING_PICTURE');
			return false;
		}

		$product->setImageUrl($fileName);

		if ($productDAO->updateImageUrl($product) === false) {
			$productDAO->rollBack();
			unlink(PATH_UPLOAD_PROFILE_PICTURES . $fileName);
			$this->setError('ERROR_UPDATING_PICTURE_URL');
			return false;
		}

		$productDAO->commit();
		return [
			'product' => $product
		];
	}

}