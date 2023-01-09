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

		$data['scripts'][] = [
			'name' => 'alertCart',
			'attr' => 'defer'
		];
		
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
}