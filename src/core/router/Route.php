<?php

class Route {

	private string $path;
	private string $callable;
	private array $matches = [];
	private array $params = [];

	public function __construct(string $path, string $callable) {
		$this->path = trim($path, '/');
		$this->callable = $callable;
	}

	public function getUrl(array $params){
		$path = $this->path;

		foreach ($params as $k => $v) {
			$path = str_replace(":$k", $v, $path);
		}

		return "/$path";
	}

	public function with(string $param, string $regex) {
		$this->params[$param] = str_replace('(', '(?:', $regex);
		return $this;
	}

	public function match(string $url) {
		$url = trim($url, '/');
		$path = preg_replace_callback('#:([\w]+)#', [$this, 'paramMatch'], $this->path);
		$regex = "#^$path$#";
		
		if (!preg_match($regex, $url, $matches)) {
			return false;
		}

		array_shift($matches);
		$this->matches = $matches;
		return true;
	}
	
	private function paramMatch(array $match) {
		if (isset($this->params[$match[1]])) {
			return '(' . $this->params[$match[1]] . ')';
		}
		return '([^/]+)';
	}

	public function call(string $lang, array $routes) {
		$params = explode('#', $this->callable);
		$controllerName = "$params[0]Controller";

		require_once PATH_CONTROLLERS . $controllerName . '.php';

		$urls = array_map(fn ($route) => $route->getUrl($route->matches), array_merge(...array_values($routes)));
		
		$controller = new $controllerName($lang, $urls);
		
		return call_user_func_array([$controller, $params[1]], $this->matches);
	}

}