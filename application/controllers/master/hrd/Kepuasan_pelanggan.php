<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kepuasan_pelanggan extends MY_Controller {

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

        $this->load->model('hrd/PelangganModel');

        $content['data'] = [
            'data'   => $this->PelangganModel->getdatakepuasan()
        ];

		$footer['data'] = [
			"route" => $this->getRoute()
		];

		$this->load->view('master/header_menu2',$this->header);
		$this->load->view('master/hrd/kepuasan_pelanggan',$content);
		$this->load->view('master/footer2',$footer);
	}
}
