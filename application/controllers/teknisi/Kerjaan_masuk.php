<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kerjaan_masuk extends MY_Controller {

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
            'data'  => $this->KerjaanMasukModel->getspk($this->session->userdata('id'), '0')
        ];

        $footer['data'] = [
            "route" => $this->getRoute()
        ];

        $this->load->view('teknisi/header_menu',$this->header);
        $this->load->view('teknisi/kerjaan-masuk/main',$content);
        $this->load->view('teknisi/footer',$footer);
    }

    public function kerjakan() {
        $input = $this->input->post(NULL, TRUE);

        $insert = array(
            'id'            => acak_id('data_pengerjaan_teknisi', 'id')['id'],
            'tipe_spk'      => $input['tipe_spk'],
            'id_spk'        => $input['id_spk'],
            'id_teknisi'    => $this->session->userdata('id'),
            'status'        => '0',
            'iat'           => date('Y-m-d H:i:s')
        );

        $this->crud->i('data_pengerjaan_teknisi', $insert);
        $this->crud->u('data_spk_'.$input['tipe_spk'], ['status' => '1'], ['id' => $input['id_spk']]);

        return $this->sendResponse(['success' => TRUE]);
    }
}
