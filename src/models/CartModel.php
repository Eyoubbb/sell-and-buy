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

    public function add(int $user_id, int $product_id): bool {
        
        $cartDAO = $this->dao('Cart');

        $productsCart = $cartDAO->findAllProductsCart($user_id);

        foreach ($productsCart as $row) {
            if ($row['product_id'] === $product_id) {

                $resCart = $cartDAO->updateProductToCart($user_id, $product_id, $row['cart_quantity'] + 1);

                if ($resCart === false) {
                    $this->setError('ERROR_ADD_CART');
                    return false;
                }

                return true;
            }
        }

        $resCart = $cartDAO->addProductToCart($user_id, $product_id, 1);

        if ($resCart === false) {
            $this->setError('ERROR_ADD_CART');
            return false;
        }

        return true;
    }

    public function delete(int $user_id, int $product_id): bool {
        
        $cartDAO = $this->dao('Cart');

        $productsCart = $cartDAO->findAllProductsCart($user_id);

        foreach ($productsCart as $row) {
            if ($row['product_id'] === $product_id && $row['cart_quantity'] === 1) {
                
                $resCarts = $cartDAO->deleteProductFromCart($user_id, $product_id);
                
                return true;
            }
        }

        $rescart = $cartDAO->updateProductToCart($user_id, $product_id, $row['cart_quantity'] - 1);

        if ($resCarts === false) {
            $this->setError('ERROR_DELETE_CART');
            return false;
        }

        return true;
    }
}