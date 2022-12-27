<?php

require_once PATH_CORE . 'Controller.php';

class AdminController extends Controller {

	public function index(): void {
		
		if (!isLoggedIn()) {
			redirect($this->getRoutes()['GET:User#login']);
		}
		
		$data['title'] = ADMIN_WINDOW_TITLE;
		
		$data['stylesheets'][] = 'pages/admin';
		
		$data['header'] = false;
		$data['footer'] = false;
		
		$this->view('admin/admin', $data);
	}
}

?>