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

	public function findAllByCreator($creator_id) {
		$sql = "SELECT *
				FROM {$this->getTable()} P
				WHERE
					P.product_visible = 1
				AND
					P.product_creator_id = ?";

		return $this->queryAll($sql, [$creator_id]);
	}

	public function findAllSimilarProducts($category_id, $product_id, ?int $limit = null) {
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

	public function insertProduct(Product $product): string | false {
		return $this->insert([
			'product_name' => $product->getName(),
			'product_description_fr' => $product->getDescriptionFr(),
			'product_description_en' => $product->getDescriptionEn(),
			'product_price' => $product->getPrice(),
			'product_category_id' => $product->getCategoryId(),
			'product_creator_id' => $product->getCreatorId()
		], false);
	}

	public function updateImageUrl(Product $product): bool {
		return $this->update(['product_id' => $product->getId()], ['product_image_url' => $product->getImageUrl()]);
	}

}