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

			$content['data'] = [
                'total_surat_jalan' => $this->crud->ca('data_surat_jalan'),
                'total_pengeluaran_material' => $this->crud->ca('data_pengeluaran_material')
			];

			$footer['data'] = [
				"route" => $this->getRoute()
			];

			$this->load->view('header_menu',$this->header);
			$this->load->view('gudang/dashboard',$content);
			$this->load->view('footer',$footer);
		}


}
