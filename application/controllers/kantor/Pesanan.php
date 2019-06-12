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