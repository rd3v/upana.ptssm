<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends MY_Controller {

	private $header = [];

    public function __construct() {
		parent::__construct();
		$this->load->library('session');
		$this->load->helper('url');	

        $this->header['data'] = [
            "user" => [
                "id" => $this->session->userdata('id'),
                "name" => $this->session->userdata('name'),
                "email" => $this->session->userdata('email'),
                "accesstype" => $this->session->userdata('accesstype')
            ]            
        ];


    }

	public function index() {
		if($this->session->userdata('id') == null) {
			redirect(base_url()."login",'refresh');
		}
		
		
		$content['data'] = [];
        
        $footer['data'] = [
            "route" => $this->getRoute(),
            "accesstype" => $this->header['data']['user']['accesstype']
        ];

        $this->load->view('master/header_menu',$this->header);
        $this->load->view('master/dashboard',$content);
        $this->load->view('master/footer',$footer);
		
	}

}
