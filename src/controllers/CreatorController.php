<?php

require_once PATH_CORE . 'Controller.php';

class CreatorController extends Controller {

	public function index($id): void {

		$data['title'] = "Profil";
		
		$data['stylesheets'][] = 'pages/profile';
		
		$this->view('creator/profile', $data);
	}

	public function ask(): void {

		if (!isLoggedIn()) {
			redirect($this->getRoutes()['GET:User#login']);
		}

		if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_POST['description'])) {
			
			$userModel = $this->model('User');

			$data['error'] = $userModel->getError();
		}

		$data['header'] = true;
		$data['footer'] = true;
		$data['stylesheets'][] = 'pages/ask';
		
		$this->view('creator/ask', $data);
	}

}