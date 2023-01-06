<?php

require_once PATH_CORE . 'Controller.php';

class UserController extends Controller {

	public function login(): void {
		
		if (isLoggedIn()) {
			redirect($this->getRoutes()['GET:Home#index']);
		}

		if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['email'], $_POST['password'])) {
			
			$userModel = $this->model('User');
			
			$res = $userModel->login();

			if ($res !== false) {
				session_regenerate_id();
				
				$_SESSION['logged_in'] = true;
				$_SESSION['user'] = serialize($res['user']);
				
				redirect($this->getRoutes()['GET:Home#index']);
			}

			$data['error'] = $userModel->getError();
		}
		
		$data['title'] = LOGIN_WINDOW_TITLE;
		
		$data['stylesheets'][] = 'pages/login';

		$data['header'] = false;
		$data['footer'] = false;
		
		$data['form'] = 'user/login';
		
		$data['page-title'] = LOGIN_TITLE;
		$data['option-name'] = LOGIN_NEW;
		$data['option-url'] = $this->getRoutes()['GET:User#register']->getUrl();
		$data['option-link'] = LOGIN_SIGNUP;
		
		$this->view('user/login-register', $data);
	}

	public function register(): void {
		
		if (isLoggedIn()) {
			redirect($this->getRoutes()['GET:Home#index']);
		}

		if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_POST['email']) && !empty($_POST['password']) && !empty($_POST['password-confirm']) && !empty($_POST['first-name']) && !empty($_POST['last-name']) && isset($_FILES['picture'])) {
			
			$userModel = $this->model('User');
			
			$res = $userModel->register();

			if ($res !== false) {
				session_regenerate_id();
				
				$_SESSION['logged_in'] = true;
				$_SESSION['user'] = serialize($res['user']);
				
				redirect($this->getRoutes()['GET:Home#index']);
			}

			$data['error'] = $userModel->getError();
		}
		
		$data['title'] = REGISTER_WINDOW_TITLE;
		
		$data['stylesheets'][] = 'pages/register';

		$data['scripts'][] = [
			'name' => 'multistep',
			'attr' => 'defer'
		];

		$data['header'] = false;
		$data['footer'] = false;

		$data['form'] = 'user/register';
		
		$data['page-title'] = REGISTER_TITLE;
		$data['option-name'] = REGISTER_EXISTING;
		$data['option-url'] = $this->getRoutes()['GET:User#login']->getUrl();
		$data['option-link'] = REGISTER_LOGIN;
		
		$this->view('user/login-register', $data);
	}

	public function logout(): void {
		
		if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true) {
			$model = $this->model('User');

			$model->logout();
		}
		
		redirect($this->getRoutes()['GET:Home#index']);
	}

	public function cart(): void {
		
		if (!isLoggedIn()) {
			redirect($this->getRoutes()['GET:User#login']);
		}

		$model = $this->model('Carts');

		$user = unserialize($_SESSION['user']);

		$res = $model->cart($user->getId());

		$data['cart'] = $res;

		$data['title'] = NAV_CART;
		
		$data['stylesheets'][] = 'pages/cart';

		$data['header'] = true;
		$data['footer'] = true;
		
		$data['page-title'] = NAV_CART;
		
		$this->view('user/cart', $data);
	}

}