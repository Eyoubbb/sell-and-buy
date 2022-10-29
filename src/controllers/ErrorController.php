<?php

require_once PATH_CORE.'Controller.php';

class ErrorController extends Controller {
	
	public function index(): void {
		
		$data['title'] = ERROR_DEFAULT_WINDOW_TITLE;
		
		$data['stylesheets'][] = 'pages/error';
		
		$this->view('error/error', $data);
	}

	public function notFound(): void {

		$data['title'] = ERROR_404_WINDOW_TITLE;

		$data['stylesheets'][] = 'pages/error';
		
		$this->view('error/404', $data);
	}

}