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

        $this->load->model('hrd/PenugasanModel');

        $content['data'] = [
            'antrian'   => $this->PenugasanModel->getdata('0'),
            'terbit'    => $this->PenugasanModel->getdata('1'),
            'batal'     => $this->PenugasanModel->getdata('3'),
            'teknisi'   => $this->crud->gw('users', ['accesstype' => 'teknisi'])
        ];

		$footer['data'] = [
			"route" => $this->getRoute()
		];

		$this->load->view('header_menu2',$this->header);
		$this->load->view('hrd/manajemen_penugasan',$content);
		$this->load->view('footer2',$footer);
	}

    public function submit_form() {
        $valid = $this->form_validation;
        $valid->set_error_delimiters('', '');
        $valid->set_rules('teknisi', 'Teknisi', 'required|trim');

        if ($valid->run() === FALSE) {
            return $this->sendResponse([
                'success'   => FALSE,
                'error'     => array(
                    'teknisi'  => form_error('username')
                )
            ]);
        } else {
            $input = $this->input->post(NULL, TRUE);

            $id_teknisi = [];
            parse_str($input['teknisi'], $teknisi);
            foreach ($teknisi as $key => $value) {
                array_push($id_teknisi, $key);
            }

            $this->crud->u('data_spk_'.$input['tipe_spk'], ['id_teknisi' => implode(',', $id_teknisi)], ['id' => $input['id']]);

            return $this->sendResponse([
                'success'   => TRUE,
                'add'       => !$input['id_teknisi']
            ]);
        }
    }

    public function rincian_spk($tipe_spk, $id) {
        if ($tipe_spk == 'pemasangan') {
            $data = $this->crud->gd('data_spk_pemasangan', ['id' => $id]);
            $item = $this->crud->gw('data_spk_pemasangan_item', ['tipe' => '1', 'id_spk' => $id]);
        } elseif ($tipe_spk == 'free') {
            $data = $this->crud->gd('data_spk_pemasangan', ['id' => $id]);
            $item = $this->crud->gw('data_spk_pemasangan_item', ['tipe' => '0', 'id_spk' => $id]);
        } elseif ($tipe_spk == 'service') {
            $data = $this->crud->gd('data_spk_service', ['id' => $id]);
            $item = $this->crud->gw('data_spk_service_item', ['id_spk' => $id]);
        }

        if ($data) {
            $content['data'] = [
                'data' => $data,
                "customer" => $this->crud->gd('data_customer', ['id' => $data->id_pelanggan]),
                'item'  => $item
            ];

            $footer['data'] = [
                "route" => $this->getRoute()
            ];

            $this->load->view('header_menu2',$this->header);
            $this->load->view('kantor/spk-'.$tipe_spk.'/rincian',$content);
            $this->load->view('footer2',$footer);
        }
    }
}
