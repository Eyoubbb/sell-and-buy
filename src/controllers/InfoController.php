<?php

require_once PATH_CORE . 'Controller.php';

class InfoController extends Controller {
    
        public function index(): void {
            
            $data['title'] = INFO_WINDOW_TITLE;
            
            $data['stylesheets'][] = 'pages/info';
    
            $model = $this->model('Product');
    
            $res = $model->info();
    
            if ($res !== false) {
                $data = array_merge($data, $res);
            } else {
                $data['error'] = $model->getError();
            }
            
            $this->view('info/info', $data);
        }
}
