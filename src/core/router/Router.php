<?php

require_once 'Route.php';

class Router {

	private string $url;
	private string $lang = DEFAULT_LANGUAGE;
	private array $routes = [];

	public function __construct(string $url) {
		$url = trim($url, '/');

		$parts = explode('/', $url);
		
		if (isset($parts[0]) && in_array($parts[0], LANGUAGES)) {
			$this->lang = $parts[0];
			$this->url = substr($url, strlen($this->lang));
			createCookie('SAB_LANG', $this->lang);
		} else {
			if (isset($_COOKIE['SAB_LANG']) && in_array($_COOKIE['SAB_LANG'], LANGUAGES)) {
				$this->lang = $_COOKIE['SAB_LANG'];
			} else {
				createCookie('SAB_LANG', $this->lang);
			}
			$this->url = $url;
		}
		
		require_once PATH_LANGUAGES . $this->lang . '.php';
	}

	public function getLang(): string {
		return $this->lang;
	}

	public function getRouteUrl(string $name, array $params = []): string {
		if (!isset($this->routes[$name])) {
			throw new Exception('No route matches this name');
		}
		
		return $this->routes[$name]->getUrl($params);
	}

	public function get(string $path, string $callable): Route {
		return $this->add($path, $callable, 'GET');
	}

	public function post(string $path, string $callable): Route {
		return $this->add($path, $callable, 'POST');
	}

	public function put(string $path, string $callable): Route {
		return $this->add($path, $callable, 'PUT');
	}

	public function delete(string $path, string $callable): Route {
		return $this->add($path, $callable, 'DELETE');
	}

	private function add(string $path, string $callable, string $method): Route {
		$route = new Route($path, $callable);

		$this->routes[$method][$callable] = $route;

		return $route;
	}

	public function run(): void {
		$method = $_SERVER['REQUEST_METHOD'];
		
		if (!isset($this->routes[$method])) {
			$this->error(405);
		}

		foreach ($this->routes[$method] as $route) {
			if ($route->match($this->url)) {
				$route->call($this->lang, $this->routes);
				return;
			}
		}

		$this->error(404);
	}

	private function error(int $code = 500): void {
		http_response_code($code);
		
		require_once PATH_CONTROLLERS . 'ErrorController.php';
		$controller = new ErrorController($this->lang, $this->routes);
		$controller->index($code);
	}

}