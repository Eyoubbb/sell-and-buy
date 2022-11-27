<?php

require_once PATH_CORE . 'Controller.php';

class CreatorController extends Controller {

    public function ask(): void {

        if (isLoggedIn()) {
			redirect($this->getRoutes()['GET:User#login']);
		}

        if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_POST['description'])) {
			
			

			$data['error'] = $userModel->getError();
		}

        $data['header'] = true;
		$data['footer'] = true;
        $data['stylesheets'][] = 'pages/askCreator';
        $this->view('creator/ask', $data);
    }

}