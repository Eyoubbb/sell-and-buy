<?php

abstract class Controller {

	public function __construct(string $lang) {
		$this->lang = $lang;
	}
	
	public function model(string $model): object {

		require_once PATH_MODELS.$model.'.php';

		return new $model();
	}

	public function view(string $view, array $data = []): void {

		$data['view'] = $view;

		$data['lang'] = $this->lang;

		require_once PATH_VIEWS.'default.php';
	}

}