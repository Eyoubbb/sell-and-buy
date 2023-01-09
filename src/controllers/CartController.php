<?php

require_once PATH_CORE . 'Controller.php';

class CartController extends Controller {

	public function cart(): void {
		
		if (!isLoggedIn()) {
			redirect($this->getRoutes()['GET:User#login']);
		}

		$model = $this->model('Cart');
		$user = unserialize($_SESSION['user']);
		$res = $model->cart($user->getId());

		if($res) {
			$data['cart'] = $res['carts'];
			$data['products'] = $res['products'];
			$data['creators'] = $res['creators'];
			$data['total'] = $res['price'];
			$data['count'] = $res['quantity'];
		}

		$data['title'] = NAV_CART;
		
		$data['stylesheets'][] = 'pages/cart';

		$data['header'] = true;
		$data['footer'] = true;
		
		$data['page-title'] = NAV_CART;
		
		$this->view('cart/cart', $data);
	}

	public function addToCart(): void {
		
		if (!isLoggedIn()) {
			redirect($this->getRoutes()['GET:User#login']);
		}

		$model = $this->model('Cart');
		$user = unserialize($_SESSION['user']);
		$productId = $_POST['product-id'];
		$res = $model->addToCart($productId, $user->getId(), 1);

		$this->view('cart/cart', $data);
	}

	public function deleteCart(): void {

		$model = $this->model('Cart');
		$user = unserialize($_SESSION['user']);
		$res = $model->deleteCart($user->getId());

		$this->view('cart/cart', $data);
	}
}