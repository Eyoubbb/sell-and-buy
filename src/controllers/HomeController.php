<?php

require_once PATH_CORE . 'Controller.php';

class HomeController extends Controller {

	public function index(): void {
		
		$data['title'] = HOME_WINDOW_TITLE;
		
		$data['stylesheets'][] = 'pages/home';
		
		$productModel = $this->model('Product');

		$data['products'] = $productModel->getAllProducts();

		$this->view('home/home', $data);
	}

}