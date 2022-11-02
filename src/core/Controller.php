<?php

abstract class Controller {

	private string $lang;
	private array $urls;
	
	public function __construct(string $lang, array $urls) {
		$this->lang = $lang;
		$this->urls = $urls;
	}
	
	public function model(string $model): void {

		require_once PATH_MODELS . $model . '.php';
	}

	public function view(string $view, array $data = []): void {

		$data['view'] = $view;
		$data['lang'] = $this->lang;
		$data['urls'] = $this->urls;

		require_once PATH_VIEWS . 'default.php';
	}

}