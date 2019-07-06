<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Penawaran extends MY_Controller {

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
        $this->load->view('kantor/penawaran');
        $this->load->view('footer',$footer);
    }

    public function create() {
        
        $this->load->model('kantor/PenawaranModel');
        $get_listitem = $this->PenawaranModel->get_listitem();
        $get_jasapemasangan_materialac = $this->PenawaranModel->get_jasapemasangan_materialac();

        $content['data'] = [
            "get_listitem" => $get_listitem,
            "get_jasapemasangan_materialac" => $get_jasapemasangan_materialac
        ];
        
        $footer['data'] = [
            "route" => $this->getRoute()
        ];

        $this->load->view('header_menu',$this->header);
        $this->load->view('kantor/penawaran_buat',$content);
        $this->load->view('footer',$footer);
    }

    public function store() {
        $this->load->model('kantor/PenawaranModel');
        $response = $this->PenawaranModel->store($_POST);
        $this->sendResponse($response);
    }

    public function rincian($reff) {
        $this->load->model('kantor/PenawaranModel');
        $data_manajemen_penawaran = $this->PenawaranModel->getdata($reff);
        
        $content['data'] = $data_manajemen_penawaran;
        
        $footer['data'] = [
            "route" => $this->getRoute()
        ];

        $this->load->view('header_menu',$this->header);
        $this->load->view('kantor/penawaran_rincian',$content);
        $this->load->view('footer',$footer);        
    }

    public function print($reff) {

        $this->load->model('kantor/PenawaranModel');
        $data_manajemen_penawaran = $this->PenawaranModel->getdata($reff);
        
        $content['data'] = $data_manajemen_penawaran;

        $this->load->view('kantor/penawaran_print',$content);
    }

    public function getalldata() {
        $this->load->model("kantor/PenawaranModel");
        $response = $this->PenawaranModel->getalldata();
        $this->sendResponse($response);   
    }

    public function getmodel() {
        $master_stock_id = $this->input->post("id");
        $this->load->model('kantor/PenawaranModel');
        $response = $this->PenawaranModel->getmodel($master_stock_id);
        $this->sendResponse($response);
    }

}