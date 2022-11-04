<?php

require_once PATH_CORE . 'Model.php';

class UserModel extends Model {

	public function login(): User | false {
		$email = $_POST['email'];
		$password = $_POST['password'];

		$user = $this->dao('User')->getByEmail($email);

		if ($user !== false) {
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

	public function register(): User | false {
		$email = $_POST['email'];
		$password = $_POST['password'];
		$passwordConfirm = $_POST['password-confirm'];
		$firstName = $_POST['first-name'];
		$lastName = $_POST['last-name'];
		$picture = $_FILES['picture'];

		if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
			$this->setError('INVALID_EMAIL');
			return false;
		}
		
		if ($password !== $passwordConfirm) {
			$this->setError('PASSWORDS_DO_NOT_MATCH');
			return false;
		}

		$resExif = exif_imagetype($picture['tmp_name']);
		if ($resExif === false || !in_array($resExif, [IMAGETYPE_JPEG, IMAGETYPE_PNG, IMAGETYPE_WEBP])) {
			$this->setError('INVALID_PICTURE');
			return false;
		}
		
		if ($picture['size'] > 5_000_000) {
			$this->setError('PICTURE_TOO_BIG');
			return false;
		}
		
		$userDAO = $this->dao('User');
		
		$userExists = $userDAO->getByEmail($email);

		if ($userExists) {
			$this->setError('EMAIL_ALREADY_EXISTS');
			return false;
		}

		$passwordHash = password_hash($password, PASSWORD_DEFAULT);
		$fileName = "$firstName-$lastName." . pathinfo($picture['name'], PATHINFO_EXTENSION);

		$user = new User();
		$user->setEmail($email);
		$user->setPasswordHash($passwordHash);
		$user->setFirstName($firstName);
		$user->setLastName($lastName);
		$user->setPictureUrl($fileName);
		
		$userId = $userDAO->insertUser($user);
		
		if ($userId !== false) {
			$user->setId($userId);

			if (move_uploaded_file($picture['tmp_name'], PATH_UPLOAD_PROFILE_PICTURES . $fileName)) {
				return $user;
			} else {
				$this->setError('ERROR_UPLOADING_PICTURE');
			}
		} else {
			$this->setError('UNKNOWN_ERROR');
			return false;
		}
	}

}