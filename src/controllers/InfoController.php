<?php

require_once PATH_CORE . 'Controller.php';

class InfoController extends Controller {
    
    public function index(): void {
        
        $data['title'] = INFO_WINDOW_TITLE;
        
        $data['stylesheets'][] = 'pages/clientSupport';

        $data['header'] = true;
		$data['footer'] = true;

        $this->view('info/clientSupport', $data);
    }

    public function contact(): void {
        
        $data['title'] = INFO_CONTACT_WINDOW_TITLE;
        
        $data['stylesheets'][] = 'pages/infoContact';

        $data['header'] = true;
		$data['footer'] = true;
		
		$this->view('creator/ask', $data);
        
        $this->view('info/contact', $data);
    }

    public function legalNotice(): void {
        
        $data['title'] = INFO_LEGAL_NOTICE_WINDOW_TITLE;
        
        $data['stylesheets'][] = 'pages/infoLegalNotice';

        $data['header'] = true;
        $data['footer'] = true;
        
        $this->view('info/legalNotice', $data);
    }

    public function termsConditions(): void {
        
        $data['title'] = INFO_TERMS_CONDITIONS_WINDOW_TITLE;
        
        $data['stylesheets'][] = 'pages/infoTermsConditions';

        $data['header'] = true;
        $data['footer'] = true;
        
        $this->view('info/termsConditions', $data);
    }

    public function shippingReturn(): void {
        
        $data['title'] = INFO_SHIPPING_RETURN_WINDOW_TITLE;
        
        $data['stylesheets'][] = 'pages/infoShippingReturn';

        $data['header'] = true;
        $data['footer'] = true;
        
        $this->view('info/shippingReturn', $data);
    }
}
