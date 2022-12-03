<?php

require_once PATH_CORE . 'Model.php';

class UserModel extends Model {

	public function login(): array | false {
		$email = $_POST['email'];
		$password = $_POST['password'];

		$user = $this->dao('User')->getByEmail($email);

		if ($user === false) {
			$this->setError('INVALID_EMAIL');
			return false;
		}

		if (!password_verify($password, $user->getPasswordHash())) {
			$this->setError('INVALID_PASSWORD');
			return false;
		}
		
		return ['user' => $user];
	}

	public function register(): array | false {
		[
			'email' => $email,
			'password' => $password,
			'password-confirm' => $passwordConfirm,
			'first-name' => $firstName,
			'last-name' => $lastName,
		] = $_POST;

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
		if (!in_array($resExif, [IMAGETYPE_JPEG, IMAGETYPE_PNG, IMAGETYPE_WEBP])) {
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

		$user = new User();
		$user->setEmail($email);
		$user->setPasswordHash($passwordHash);
		$user->setFirstName($firstName);
		$user->setLastName($lastName);
		$user->setPictureUrl('');
		
		$userId = $userDAO->insertUser($user);
		
		if ($userId === false) {
			$userDAO->rollBack();
			$this->setError('UNKNOWN_ERROR');
			return false;
		}

		$user->setId($userId);
		$fileName = "PP-$userId." . pathinfo($picture['name'], PATHINFO_EXTENSION);
		
		if (!move_uploaded_file($picture['tmp_name'], PATH_UPLOAD_PROFILE_PICTURES . $fileName)) {
			$userDAO->rollBack();
			$this->setError('ERROR_UPLOADING_PICTURE');
			return false;
		}
		
		$user->setPictureUrl($fileName);

		if ($userDAO->updatePictureUrl($user) === false) {
			$userDAO->rollBack();
			unlink(PATH_UPLOAD_PROFILE_PICTURES . $fileName);
			$this->setError('ERROR_UPDATING_PICTURE_URL');
			return false;
		}

		$userDAO->commit();
		return ['user' => $user];
		
	}

	public function logout(): void {
		unset($_SESSION['user']);
		$_SESSION['logged_in'] = false;
	}

}