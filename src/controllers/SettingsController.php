<?php

require_once PATH_CORE . 'Controller.php';

class SettingsController extends Controller {
	
	public function index(): void {

		$data['stylesheets'][] = 'pages/settings';
		$data['header'] = true;
		$data['footer'] = true;
		$this->view('settings/settings', $data);
	}
}