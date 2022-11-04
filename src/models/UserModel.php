<?php

require_once PATH_CORE . 'Model.php';

class UserModel extends Model {

	public function login(): User | false {
		$email = $_POST['email'];
		$password = $_POST['password'];

		$user = $this->dao('User')->getByEmail($email);

		if ($user) {
			if (password_verify($password, $user->getPasswordHash())) {
				return $user;
			} else {
				$this->setError('INVALID_PASSWORD');
			}
		} else {
			$this->setError('INVALID_EMAIL');
		}

		return false;
	}

}