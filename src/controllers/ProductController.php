<?php

require_once PATH_CORE . 'Controller.php';

class ProductController extends Controller {

	public function index($id): void {

		$data['stylesheets'][] = 'pages/product';

		$model = $this->model('Product');

		$res = $model->product($id);

		if ($res !== false) {
			$data = array_merge($data, $res);

			$data['title'] = $res['product']->getName();
		} else {
			$data['error'] = $model->getError();
		}

		$this->view('product/product', $data);
	}

	public function new(): void {

		if (!isLoggedIn()) {
			redirect($this->getRoutes()['GET:User#login']->getUrl());
		}

		if (!isCreator()) {
			redirect($this->getRoutes()['GET:Home#index']->getUrl());
		}

		if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_POST['name']) && !empty($_POST['category_id']) && !empty($_POST['price']) && !empty($_POST['description_fr']) && !empty($_POST['description_en']) && isset($_FILES['image'])) {

			$model = $this->model('Product');

			$res = $model->saveNew();

			if ($res !== false) {
				redirect($this->getRoutes()['GET:Product#index'], ['id' => $res['product']->getId()]);
			}

			$data['error'] = $model->getError();
		}

		$data['stylesheets'][] = 'pages/new-product';

		$data['title'] = 'New product';

		$model = $this->model('Product');

		$res = $model->new();

		if ($res !== false) {
			$data = array_merge($data, $res);
		} else {
			$data['error'] = $model->getError();
		}

		$this->view('product/new', $data);
	}

}