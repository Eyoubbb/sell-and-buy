<?php

require_once PATH_CORE . 'Model.php';
require_once PATH_ENTITIES . 'Carts.php';

class CartsModel extends Model {

	public function cart(int $user_id): array | false {

        $cartsDAO = $this->dao('Carts');

        $resCarts = $cartsDAO->getCartByUserId($user_id);

        if ($resCarts === false) {
            $this->setError('ERROR_CARTS_NOT_FOUND');
            return false;
        }

        if (empty($resCarts)) {
            return false;
        }

        $productsCart = $cartsDAO->findAllPorductsCart($user_id);

        $products = [];
		$creators = [];

		foreach ($productsCart as $row) {
			$products[] = new Product($row);

            if (!isset($creators[$row['user_id']])) {
                $creators[$row['user_id']] = new User($row);
            }
		}

        return [
            'carts' => $resCarts,
            'products' => $products,
            'creators' => $creators
        ];
	}
}