<?php

require_once PATH_CORE . 'DAO.php';
require_once PATH_DAO . 'ProductDAO.php';
require_once PATH_ENTITIES . 'Carts.php';
require_once PATH_ENTITIES . 'Product.php';


class CartsDAO extends DAO {

	public function __construct() {
		parent::__construct('carts');
	}
	
    public function getAll(): array | false {
        $sql = "SELECT *
                FROM {$this->getTable()}";
        return $this->queryAll($sql, [], false);
    }

    public function getCartByUserId(int $user_id): array | false {
        $sql = "SELECT *
                FROM {$this->getTable()}
                WHERE user_id = ?";
        return $this->queryAll($sql, [$user_id], false);
    }

    public function findAllPorductsCart(int $user_id) {
        $sql = "SELECT *
                FROM {$this->getTable()} C
                JOIN products
                    ON (C.product_id = products.product_id)
                JOIN users U
                    ON (products.product_creator_id = U.user_id)
                WHERE C.user_id = ?";
                
		return $this->queryAll($sql, [$user_id], false);
    }

    public function addProductToCart(int $user_id, int $product_id, int $cart_quantity) {
        return $this->insert([
            'user_id' => $user_id,
            'product_id' => $product_id,
            'cart_quantity' => $cart_quantity
        ]);
    }

    // public function updateQuantityProduct(int $user_id, int $product_id, int $cart_quantity) {
    //     $sql = "UPDATE {$this->getTable()}
    //             SET cart_quantity = ?
    //             WHERE user_id = ?
    //             AND product_id = ?";
    //     return $this->query($sql, [$cart_quantity, $user_id, $product_id]);
    // }

    // public function deleteProductFromCart(int $user_id, int $product_id) {
    //     $sql = "DELETE FROM {$this->getTable()}
    //             WHERE user_id = ?
    //             AND product_id = ?";
    //     return $this->query($sql, [$user_id, $product_id]);
    // }

    public function deleteAllProductsFromCart(int $user_id) {
        return $this->delete($user_id);
    }

    public function getQuantityProduct(int $user_id) {
        $sql = "SELECT count(*) AS quantity
                FROM {$this->getTable()}
                WHERE user_id = ?";
        return $this->queryAll($sql, [$user_id], false);
    }

    public function getCartPrice(int $user_id) {
        $sql = "SELECT ROUND(SUM(p.product_price * C.cart_quantity)) AS cart_price,
                       ROUND(SUM(p.product_price * ((100 - p.product_discount_percentage) / 100) * C.cart_quantity)) AS cart_price_discount
                FROM {$this->getTable()} C
                JOIN products p ON (C.product_id = p.product_id)
                WHERE C.user_id = ?";
        return $this->queryAll($sql, [$user_id], false);
    }
}