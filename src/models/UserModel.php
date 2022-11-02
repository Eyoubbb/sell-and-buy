<?php

require_once PATH_CORE . 'Model.php';

class UserModel extends Model {

	public function login(string $email, string $password): User | false {

		$user = $this->dao('UserDAO')->login($email);
		
		if ($user && password_verify($password, $user->getPasswordHash())) {
			return $user;
		}

		return false;
	}
	
}