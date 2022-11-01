<?php

abstract class Controller {

	private string $lang;
	
	public function __construct(string $lang) {
		$this->lang = $lang;
	}
	
	public function model(string $model): void {

		require_once PATH_MODELS.$model.'.php';
	}

	public function view(string $view, array $data = []): void {

		$data['view'] = $view;

		$data['lang'] = $this->lang;

		require_once PATH_VIEWS.'default.php';
	}

}