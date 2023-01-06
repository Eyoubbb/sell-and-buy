<?php

require_once PATH_CORE . 'DAO.php';
require_once PATH_ENTITIES . 'Carts.php';

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
}