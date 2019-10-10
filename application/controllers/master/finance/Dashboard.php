<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends MY_Controller {

	private $header = [];

    public function __construct() {
		parent::__construct();
		$this->load->library('session');
		$this->load->helper('url');	
    }

	public function index() {
		if($this->session->userdata('id') == null) {
			redirect(base_url()."login",'refresh');
		}
		
		switch($this->session->userdata('accesstype')) {
			case "master":
				redirect(base_url()."admin/dashboard",'refresh');
			break;
			case "kantor":
				redirect(base_url()."kantor",'refresh');
			break;
			case "finance":
				redirect(base_url()."finance/invoice/masuk",'refresh');
			break;
			case "hrd":
				redirect(base_url()."hrd",'refresh');
			break;
			case "gudang":
				redirect(base_url()."gudang",'refresh');
			break;
			case "teknisi":
				redirect(base_url()."teknisi",'refresh');
			break;
		}
		
		
	}

}
