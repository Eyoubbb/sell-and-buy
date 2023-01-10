<?php

require_once PATH_CORE . 'Controller.php';

class AdminController extends Controller {


	public function support(): void {

		$model = $this->model('Ticket');

		$res = $model->tickets();

		
		if (!isLoggedIn()) {
			redirect($this->getRoutes()['GET:User#login']);
		}

		if(!isAdmin()) {
			redirect($this->getRoutes()['GET:Home#index']);
		}

		$data['title'] = ADMIN_WINDOW_TITLE;
		
		$data['stylesheets'][] = 'pages/support';

		$data['scripts'][] = [
			'name' => 'more',
			'attr' => 'defer'
		];
		
		$data['header'] = true;
		$data['footer'] = false;

		if ($res !== false) {
			$data = array_merge($data, $res);
		} else {
			$data['error'] = $model->getError();
		}
		$this->view('admin/support', $data);
	}

	public function resolve($id) {
		
		$model = $this->model('Ticket');

		if(!isLoggedIn()) {
			redirect($this->getRoutes()['GET:User#login']);
		}
		
		if(!isAdmin()) {
			redirect($this->getRoutes()['GET:Home#index']);
		}

		if(!$model->resolve($id)) {
			$data['error'] = $model->getError();
		}		
		redirect($this->getRoutes()['GET:Admin#support']);
	}

	public function reopen($id) {

		$model = $this->model('Ticket');

		if(!isLoggedIn()) {
			redirect($this->getRoutes()['GET:User#login']);
		}

		if(!isAdmin()) {
			redirect($this->getRoutes()['GET:Home#index']);
		}

		if(!$model->reopen($id)) {
			$data['error'] = $model->getError();
		}		
		redirect($this->getRoutes()['GET:Admin#support']);
	}

	public function delete($id) {

		$model = $this->model('Ticket');

		if(!isLoggedIn()) {
			redirect($this->getRoutes()['GET:User#login']);
		}

		if(!isAdmin()) {
			redirect($this->getRoutes()['GET:Home#index']);
		}

		if(!$model->delete($id)) {
			$data['error'] = $model->getError();
		}		
		redirect($this->getRoutes()['GET:Admin#support']);
	}
}

?>