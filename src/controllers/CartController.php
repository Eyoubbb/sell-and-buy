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
			$data['pdCount'] = $res['products_quantity'];
		}

		$data['title'] = NAV_CART;
		
		$data['stylesheets'][] = 'pages/cart';
		
		$data['page-title'] = NAV_CART;
		
		$this->view('cart/cart', $data);
	}

	public function add(int $id): void {
		
		if (!isLoggedIn()) {
			redirect($this->getRoutes()['GET:User#login']);
		}

		$model = $this->model('Cart');
		$user = unserialize($_SESSION['user']);
		$productId = $id;

		$res = $model->add($user->getId(), $productId);

		redirect($this->getRoutes()['GET:Cart#cart']);
	}

	public function delete(int $id): void {

		$model = $this->model('Cart');
		$user = unserialize($_SESSION['user']);
		$res = $model->delete($user->getId(), $id);

		redirect($this->getRoutes()['GET:Cart#cart']);
	}

	public function deleteAllProduct(int $id): void {

		$model = $this->model('Cart');
		$user = unserialize($_SESSION['user']);
		$res = $model->deleteAllProduct($user->getId(), $id);

		redirect($this->getRoutes()['GET:Cart#cart']);
	}

	public function deleteCart(int $id): void {

		$model = $this->model('Cart');
		$user = unserialize($_SESSION['user']);
		$res = $model->deleteAllCart($user->getId());

		redirect($this->getRoutes()['GET:Home#index']);
	}
}