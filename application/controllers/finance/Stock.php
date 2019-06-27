<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Stock extends MY_Controller {

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

        $footer['data'] = [
            "route" => $this->getRoute()
        ];

        $this->load->view('header_menu',$this->header);
        $this->load->view('finance/stock');
        $this->load->view('footer',$footer);
    }

    public function rincian_kantor($kode) {
        $this->load->model('finance/StockModel');
        $result = $this->StockModel->getdatarincian($kode);

        $content['data'] = $result;

        $footer['data'] = [
            "route" => $this->getRoute(),
            "kode" => $result->kode
        ];        

        $this->load->view('header_menu',$this->header);
        $this->load->view('finance/stock_rincian_kantor',$content);
        $this->load->view('footer',$footer);
    }

    public function rincian_barang($kode) {
        $this->load->model('finance/StockModel');
        $result = $this->StockModel->getdatarincian($kode);

        $content['data'] = $result;

        $footer['data'] = [
            "route" => $this->getRoute(),
            "kode" => $result->kode
        ];        

        $this->load->view('header_menu',$this->header);
        $this->load->view('finance/stock_rincian_barang',$content);
        $this->load->view('footer',$footer);
    }

    public function getdatakantor() {
        $this->load->model('finance/StockModel');
        $response = $this->StockModel->getdatakantor();
        $this->sendResponse($response);
    }

    public function getdatatoko() {
        $this->load->model('finance/StockModel');
        $response = $this->StockModel->getdatatoko();
        $this->sendResponse($response);
    }

    public function getsatuan() {
        $kode = $this->input->post('kode');
        $field = $this->input->post('field');
        $this->load->model('finance/StockModel');
        $response = $this->StockModel->getfield($kode,$field);        
        $this->sendResponse($response);
    }

}