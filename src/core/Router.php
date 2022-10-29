<?php

class Router {

	public static function contentToRender(): void {
		$uri = self::processURI();
		
		$controllerName = $uri['controller'];

		$lang = $uri['lang'];

		if (is_file(PATH_CONTROLLERS.$controllerName.'.php')) {
			
			require_once PATH_CONTROLLERS.$controllerName.'.php';
			
			$method = method_exists($controllerName, $uri['method']) ? $uri['method'] : 'index';
			
			$args = $uri['args'];
			
			$args ? (new $controllerName($lang))->{$method}(...$args)
				  : (new $controllerName($lang))->{$method}();
		} else {
			require_once PATH_CONTROLLERS.'ErrorController.php';
			
			(new ErrorController($lang))->notFound();
		}
	}

	private static function processURI(): array {
		$uri = self::getURI();
		
		$offset = 0;
		if (in_array($uri[$offset], LANGUAGES)) {
			$lang = $uri[$offset];
			require_once PATH_LANGUAGES.$lang.'.php';
			$offset++;
		} else {
			$lang = DEFAULT_LANGUAGE;
			require_once PATH_LANGUAGES.DEFAULT_LANGUAGE.'.php';
		}

		$controllerPart = $uri[$offset++] ?? '';

		$methodPart = $uri[$offset++] ?? '';

		foreach (array_slice($uri, $offset++) as $arg) {
			$argsPart[] = $arg;
		}

		$controller = !empty($controllerPart)
			? ucfirst($controllerPart).'Controller'
			: 'HomeController';

		$method = !empty($methodPart)
			? $methodPart
			: 'index';

		$args = !empty($argsPart)
			? $argsPart
			: [];

		return [
			'controller' => $controller,
			'method' => $method,
			'args' => $args,
			'lang' => $lang
		];
	}

	private static function getURI(): array {
		$path = $_SERVER['REQUEST_URI'];

		if (str_starts_with($path, '/'.APP_NAME)) {
			$path = substr($path, strlen('/'.APP_NAME));
		} else if (str_starts_with($path, '/')) {
			$path = substr($path, 1);
		}

		return explode('/', $path);
	}

}