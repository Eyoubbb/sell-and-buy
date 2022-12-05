<?php

require_once PATH_CORE . 'Controller.php';

class ProductController extends Controller {

	public function index($id): void {
		
		$data['title'] = PRODUCT_WINDOW_TITLE;
		
		$data['stylesheets'][] = 'pages/product';

		$model = $this->model('Product');

		$res = $model->product($id);

		if ($res !== false) {
			$data = array_merge($data, $res);
		} else {
			$data['error'] = $model->getError();
		}
		
		$this->view('product/product', $data);
	}

}