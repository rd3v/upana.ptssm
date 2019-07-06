<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pesanan extends MY_Controller {

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

    public function spk_pemasangan_index() {
        $footer['data'] = [
            "route" => $this->getRoute()
        ];

        $this->load->view('header_menu',$this->header);
        $this->load->view('kantor/pesanan_spk_pemasangan');
        $this->load->view('footer',$footer);
    }

    public function spk_pemasangan_getdata() {
        $this->load->model('kantor/SpkPemasanganModel');
        $response = $this->SpkPemasanganModel->getalldata();
        $this->sendResponse($response);
    }
    
    public function spk_pemasangan_tambah() {

        $this->load->model('kantor/CustomerModel');
        $this->load->model("kantor/MasterStockModel");

        $customer = $this->CustomerModel->getdata();
        $stock = $this->MasterStockModel->getdata();

        $content['data'] = [
            "customer" => $customer,
            "stock" => $stock
        ];

        $footer['data'] = [
            "route" => $this->getRoute()
        ];

        $this->load->view('header_menu',$this->header);
        $this->load->view('kantor/pesanan_spk_pemasangan_tambah',$content);
        $this->load->view('footer',$footer);
    }

    public function spk_pemasangan_edit($no_spk) {

        $this->load->model('kantor/CustomerModel');
        $this->load->model("kantor/MasterStockModel");
        $this->load->model('kantor/SpkPemasanganModel');
        $this->load->model('kantor/SpkPemasanganModel');

        $customer = $this->CustomerModel->getdata();
        $stock = $this->MasterStockModel->getdata();
        $SpkPemasangan = $this->SpkPemasanganModel->getdata($no_spk);
        $SpkPemasanganItem = $this->SpkPemasanganModel->getdataitem($no_spk);
        
        $content['data'] = [
            "customer" => $customer,
            "stock" => $stock,
            "SpkPemasangan" => $SpkPemasangan,
            "SpkPemasanganItem" => $SpkPemasanganItem
        ];

        $footer['data'] = [
            "route" => $this->getRoute(),
            "SpkPemasanganItem" => $SpkPemasanganItem
        ];

        $this->load->view('header_menu',$this->header);
        $this->load->view('kantor/pesanan_spk_pemasangan_edit', $content);
        $this->load->view('footer',$footer);
    }

    public function spk_pemasangan_submit() {
        $this->load->model('kantor/SpkPemasanganModel');
        $response = $this->SpkPemasanganModel->store($_POST);
        $this->sendResponse($response);
    }

    public function spk_pemasangan_edit_submit() {
        $this->load->model('kantor/SpkPemasanganModel');
        $response = $this->SpkPemasanganModel->store_edit($_POST);
        $this->sendResponse($response);
    }

    public function getcustomer() {
        $id = $this->input->post("id");
        $this->load->model('kantor/customerModel');
        $result = $this->customerModel->getcustomer($id);
        $this->sendResponse($result);        
    }

    public function spk_service_index() {
        $footer['data'] = [
            "route" => $this->getRoute()
        ];

        $this->load->view('header_menu',$this->header);
        $this->load->view('kantor/pesanan_spk_service');
        $this->load->view('footer',$footer);
    }

    public function spk_free_index() {
        $footer['data'] = [
            "route" => $this->getRoute()
        ];

        $this->load->view('header_menu',$this->header);
        $this->load->view('kantor/pesanan_spk_free');
        $this->load->view('footer',$footer);
    }

    public function spk_komplain_index() {
        $footer['data'] = [
            "route" => $this->getRoute()
        ];

        $this->load->view('header_menu',$this->header);
        $this->load->view('kantor/pesanan_spk_komplain');
        $this->load->view('footer',$footer);
    }

    public function spk_survey_index() {
        $footer['data'] = [
            "route" => $this->getRoute()
        ];

        $this->load->view('header_menu',$this->header);
        $this->load->view('kantor/pesanan_spk_survey');
        $this->load->view('footer',$footer);
    }

}