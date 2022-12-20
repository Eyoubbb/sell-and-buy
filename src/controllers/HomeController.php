<?php

require_once PATH_CORE . 'Controller.php';

class HomeController extends Controller {

	public function index(): void {
		
		$data['title'] = HOME_WINDOW_TITLE;
		
		$data['stylesheets'][] = 'pages/home';

		$model = $this->model('Product');

		$res = $model->home();

		if ($res !== false) {
			$data = array_merge($data, $res);
		} else {
			$data['error'] = $model->getError();
		}
		
		$this->view('home/home', $data);
	}

}