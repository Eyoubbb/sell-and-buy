<?php

require_once PATH_CORE . 'Controller.php';

class UserController extends Controller {

	public function login(): void {
		
		if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true) {
			redirect($this->getRoutes()['GET:Home#index']);
		}

		if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['email'], $_POST['password'])) {
			
			$userModel = $this->model('User');
			
			$user = $userModel->login();

			if ($user) {
				$_SESSION['logged_in'] = true;
				$_SESSION['user'] = $user;
				
				redirect($this->getRoutes()['GET:Home#index']);
			}

			$data['error'] = $userModel->getError();
		}
		
		$data['title'] = LOGIN_WINDOW_TITLE;
		
		$data['stylesheets'][] = 'pages/login';
		
		$this->view('user/login', $data);
	}

}