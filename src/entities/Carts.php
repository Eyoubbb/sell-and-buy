<?php

require_once 'User.php';

class Carts {
	
	private int $product_id;
	private int $user_id;
	private int $cart_quantity;

    public function __construct(?array $row = null) {
		if ($row) {
			$this->product_id = $row['product_id'];
			$this->user_id = $row['user_id'];
			$this->cart_quantity = $row['cart_quantity'];
		}
	}

    public function getProductId(): int { return $this->product_id; }

	public function getUserId(): int { return $this->user_id; }

	public function getCartQualtity(): int { return $this->cart_quantity; }
	
}