<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kerjaan_selesai extends MY_Controller {

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
            'data'  => $this->KerjaanMasukModel->getspk($this->session->userdata('id'), '2')
        ];

        $footer['data'] = [
            "route" => $this->getRoute()
        ];

        $this->load->view('teknisi/header_menu',$this->header);
        $this->load->view('teknisi/kerjaan-selesai/main',$content);
        $this->load->view('teknisi/footer',$footer);
    }

    public function rincian($tipe_spk, $id_spk) {
        $this->load->model('teknisi/KerjaanMasukModel');

        $content['data'] = [
            'data'      => $this->KerjaanMasukModel->getdetail($tipe_spk, $id_spk),
            'item'      => $this->crud->gw('data_spk_'.$tipe_spk.'_item', ['id_spk' => $id_spk])
        ];

        $id_material = $this->crud->gda('data_pengeluaran_material', ['tipe_spk' => $tipe_spk, 'id_spk' => $id_spk])['id'];
        $content['data']['material'] = $this->KerjaanMasukModel->getmaterial($id_material);

        $footer['data'] = [
            "route" => $this->getRoute()
        ];

        $this->load->view('teknisi/header_menu',$this->header);
        $this->load->view('teknisi/kerjaan-selesai/rincian',$content);
        $this->load->view('teknisi/footer',$footer);
    }
}
