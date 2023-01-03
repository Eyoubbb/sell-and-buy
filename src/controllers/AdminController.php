<?php

require_once PATH_CORE . 'Controller.php';

class AdminController extends Controller {

	public function index(): void {
		
		if (!isLoggedIn()) {
			redirect($this->getRoutes()['GET:User#login']);
		}
		
		$data['title'] = ADMIN_WINDOW_TITLE;
		
		$data['stylesheets'][] = 'pages/admin';
		
		$data['header'] = true;
		$data['footer'] = false;
		
		$this->view('admin/admin', $data);
	}

	public function support(): void {
		
		if (!isLoggedIn()) {
			redirect($this->getRoutes()['GET:User#login']);
		}

		$data['title'] = ADMIN_WINDOW_TITLE;
		
		$data['stylesheets'][] = 'pages/support';
		
		$data['header'] = true;
		$data['footer'] = false;

		$model = $this->model('Ticket');

		$res = $model->tickets();

		if ($res !== false) {
			$data = array_merge($data, $res);
		} else {
			$data['error'] = $model->getError();
		}
		
		$this->view('admin/support', $data);
	}
}

?>