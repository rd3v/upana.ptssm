<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kerjaan_proses extends MY_Controller {

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
        $this->load->model('teknisi/KerjaanMasukModel');

        $content['data'] = [
            'data'  => $this->KerjaanMasukModel->getspk($this->session->userdata('id'), '1')
        ];

        $footer['data'] = [
            "route" => $this->getRoute()
        ];

        $this->load->view('teknisi/header_menu',$this->header);
        $this->load->view('teknisi/kerjaan-proses/main',$content);
        $this->load->view('teknisi/footer',$footer);
    }

    public function pemasangan($id_spk) {
        $this->load->model('teknisi/KerjaanMasukModel');

        $content['data'] = [
            'data'      => $this->KerjaanMasukModel->getdetail('pemasangan', $id_spk),
            'item'      => $this->crud->gw('data_spk_pemasangan_item', ['id_spk' => $id_spk])
        ];

        $id_material = $this->crud->gda('data_pengeluaran_material', ['tipe_spk' => 'pemasangan', 'id_spk' => $id_spk])['id'];
        $content['data']['material'] = $this->KerjaanMasukModel->getmaterial($id_material);

        $footer['data'] = [
            "route" => $this->getRoute()
        ];

        $this->load->view('teknisi/header_menu',$this->header);
        $this->load->view('teknisi/kerjaan-proses/rincian_pemasangan',$content);
        $this->load->view('teknisi/footer',$footer);
    }
}
