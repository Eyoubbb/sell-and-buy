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

        return $resCarts;
	}
}