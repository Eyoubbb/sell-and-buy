<?php

require_once PATH_CORE . 'Controller.php';

class CreatorController extends Controller {

	public function index($id): void {

        $data['title'] = "Profil";
		
		$data['stylesheets'][] = 'pages/profile';
		
		$this->view('creator/profile', $data);
    }

}