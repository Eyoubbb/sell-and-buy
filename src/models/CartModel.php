<?php

require_once PATH_CORE . 'Model.php';
require_once PATH_ENTITIES . 'Carts.php';

class CartModel extends Model {

	public function cart(int $user_id): array | false {

        $cartsDAO = $this->dao('Cart');

        $resCarts = $cartsDAO->getCartByUserId($user_id);

        if ($resCarts === false) {
            $this->setError('ERROR_CARTS_NOT_FOUND');
            return false;
        }

        if (empty($resCarts)) {
            return false;
        }

        $productsCart = $cartsDAO->findAllProductsCart($user_id);

        $products = [];
		$creators = [];

		foreach ($productsCart as $row) {
			$products[] = new Product($row);

            if (!isset($creators[$row['user_id']])) {
                $creators[$row['user_id']] = new User($row);
            }
		}

        $price = $cartsDAO->getCartPrice($user_id);
        $quantity = $cartsDAO->getQuantityProduct($user_id);

        return [
            'carts' => $resCarts,
            'products' => $products,
            'creators' => $creators,
            'price' =>  $price[0],
            'quantity' => $quantity[0]
        ];
	}

    public function add(int $user_id, int $product_id, int $cart_quantity): bool {
        
        $cartsDAO = $this->dao('Cart');

        $cart = new Carts;
        $cart->setUserId($user_id);
        $cart->setProductId($product_id);
        $cart->setCartQuantity($cart_quantity);

        $cartId = $cartsDAO->addToCart($cart);

        $resCarts = $cartsDAO->addProductToCart($user_id, $product_id, $cart_quantity);

        if ($resCarts === false) {
            $this->setError('ERROR_ADD_CART');
            return false;
        }

        $cartDAO->commit();

        return true;
    }

    public function deleteCart(int $user_id): bool {
        
        $cartsDAO = $this->dao('Cart');

        $resCarts = $cartsDAO->deleteAllProductsFromCart($user_id);

        if ($resCarts === false) {
            $this->setError('ERROR_DELETE_CART');
            return false;
        }

        $cartDAO->commit();

        return true;
    }
}