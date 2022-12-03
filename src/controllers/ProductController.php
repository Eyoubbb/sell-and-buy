<?php

require_once PATH_CORE . 'Controller.php';

class ProductController extends Controller {

	public function index($id): void {
		
		$data['title'] = PRODUCT_WINDOW_TITLE;
		
		$data['stylesheets'][] = 'pages/product';
		
		$this->view('product/product', $data);
	}	
}