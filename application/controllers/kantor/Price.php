<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Price extends MY_Controller {

    private $header = [];

    public function __construct() {
		parent::__construct();
		$this->load->library('session');
        $this->load->helper('url');
        if($this->session->userdata('id') == null) {
            redirect(base_url()."login",'refresh');
        }
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
        
        $this->load->model('kantor/ManajemenHargaModel');
        $result = $this->ManajemenHargaModel->getdata();        

        $content['data'] = $result;

        $footer['data'] = [
            "route" => $this->getRoute()
        ];

        $this->load->view('header_menu',$this->header);
        $this->load->view('kantor/price',$content);
        $this->load->view('footer',$footer);
    }

    public function getpriceitem() {
        $this->load->model('kantor/ManajemenHargaModel');
        $response = $this->ManajemenHargaModel->getpriceitem(); 
        $this->sendResponse($response);
    }

    public function getpricejasa() {
        $this->load->model('kantor/ManajemenHargaModel');
        $response = $this->ManajemenHargaModel->getpricejasa(); 
        $this->sendResponse($response);
    }

    public function submit_barang() {
        $this->load->model('kantor/ManajemenHargaModel');
        $result = $this->ManajemenHargaModel->submit_barang($_POST);
        $this->sendResponse($result);
    }

    public function update_submit_barang() {
        $this->load->model('kantor/ManajemenHargaModel');
        $result = $this->ManajemenHargaModel->update_submit_barang($_POST);
        $this->sendResponse($result);
    }

    public function submit_jasa() {
        $this->load->model('kantor/ManajemenHargaModel');
        $result = $this->ManajemenHargaModel->submit_jasa($_POST);
        $this->sendResponse($result);
    }

    public function update_submit_jasa() {
        $this->load->model('kantor/ManajemenHargaModel');
        $result = $this->ManajemenHargaModel->update_submit_jasa($_POST);
        $this->sendResponse($result);
    }

}