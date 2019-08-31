<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Spk_service extends MY_Controller {

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

        $this->load->view('header_menu2',$this->header);
        $this->load->view('kantor/spk-service/main', ['new_id' => acak_id('data_spk_service', 'id')]);
        $this->load->view('footer2',$footer);
    }

    public function getdata() {
        $this->load->model('kantor/SpkServiceModel');
        $response = $this->SpkServiceModel->getalldata();
        $this->sendResponse($response);
    }

    public function tambah() {

        $this->load->model('kantor/CustomerModel');

        $customer = $this->CustomerModel->getdata();

        $content['data'] = [
            'id' => $this->input->get('id', TRUE),
            "customer" => $customer
        ];

        $footer['data'] = [
            "route" => $this->getRoute()
        ];

        $this->load->view('header_menu2',$this->header);
        $this->load->view('kantor/spk-service/tambah',$content);
        $this->load->view('footer2',$footer);
    }

    public function edit($id) {
        $data = $this->crud->gd('data_spk_service', ['id' => $id]);

        if ($data) {
            $this->load->model('kantor/CustomerModel');

            $customer = $this->CustomerModel->getdata();

            $content['data'] = [
                'data' => $data,
                "customer" => $customer
            ];

            $footer['data'] = [
                "route" => $this->getRoute()
            ];

            $this->load->view('header_menu2',$this->header);
            $this->load->view('kantor/spk-service/edit',$content);
            $this->load->view('footer2',$footer);
        }
    }

    public function rincian($id) {
        $data = $this->crud->gd('data_spk_service', ['id' => $id]);

        if ($data) {
            $content['data'] = [
                'data' => $data,
                "customer" => $this->crud->gd('data_customer', ['id' => $data->id_pelanggan]),
                'item'  => $this->crud->gw('data_spk_service_item', ['id_spk' => $data->id])
            ];

            $footer['data'] = [
                "route" => $this->getRoute()
            ];

            $this->load->view('header_menu2',$this->header);
            $this->load->view('kantor/spk-service/rincian',$content);
            $this->load->view('footer2',$footer);
        }
    }

    public function cetak($id) {
        $data = $this->crud->gd('data_spk_service', ['id' => $id]);

        if ($data) {
            $content['data'] = [
                'data' => $data,
                "customer" => $this->crud->gd('data_customer', ['id' => $data->id_pelanggan]),
                'item'  => $this->crud->gw('data_spk_service_item', ['id_spk' => $data->id])
            ];

            $this->load->view('kantor/spk-service/print',$content);
        }
    }

    public function submit_form() {
        $valid = $this->form_validation;
        $valid->set_error_delimiters('', '');
        $valid->set_rules('id', 'ID SPK Service', 'required|trim');
        $valid->set_rules('tipe_pajak', 'Tipe Pajak', 'required|trim');
        $valid->set_rules('no_spk', 'No. SPK', 'required|trim');
        $valid->set_rules('tanggal', 'Tanggal', 'required|trim');
        $valid->set_rules('id_pelanggan', 'Nama Pelanggan', 'required|trim');
        $valid->set_rules('keterangan', 'Keterangan', 'trim');
        $valid->set_rules('waktu_pengerjaan', 'Waktu Pengerjaan', 'required|trim');
        $valid->set_rules('catatan', 'Catatan', 'trim');
        $valid->set_rules('status', 'Status', 'required|trim');

        if ($valid->run() === FALSE) {
            return $this->sendResponse([
                'success'   => FALSE,
                'error'     => array(
                    'tipe_pajak'        => form_error('tipe_pajak'),
                    'no_spk'            => form_error('no_spk'),
                    'tanggal'           => form_error('tanggal'),
                    'id_pelanggan'      => form_error('id_pelanggan'),
                    'keterangan'        => form_error('keterangan'),
                    'waktu_pengerjaan'  => form_error('waktu_pengerjaan'),
                    'catatan'           => form_error('catatan'),
                    'status'            => form_error('status')
                )
            ]);
        } else {
            $input = $this->input->post(NULL, TRUE);
            $items = explode('&', str_replace('=on', '', $input['item']));
            $batch = [];

            foreach ($items as $row) {
                array_push($batch, [
                    'id_spk'    => $input['id'],
                    'id_ac'     => $row,
                    'iat'       => date('Y-m-d H:i:s')
                ]);
            }

            if ($input['action'] == 'add') {
                $insert = array(
                    'id'                => $input['id'],
                    'tipe_pajak'        => $input['tipe_pajak'],
                    'no_spk'            => $input['no_spk'],
                    'tanggal'           => $input['tanggal'],
                    'id_pelanggan'      => $input['id_pelanggan'],
                    'item'              => str_replace('=on', '', str_replace('&', ',', $input['item'])),
                    'keterangan'        => $input['keterangan'],
                    'waktu_pengerjaan'  => str_replace('T', ' ', $input['waktu_pengerjaan']),
                    'catatan'           => $input['catatan'],
                    'status'            => $input['status'],
                    'iat'               => date('Y-m-d H:i:s')
                );

                $this->crud->i('data_spk_service', $insert);
                $this->db->insert_batch('data_spk_service_item', $batch);

                return $this->sendResponse([
                    'success'   => TRUE,
                    'add'       => TRUE
                ]);
            } else {
                $data = $this->crud->gd('data_spk_service', ['id' => $input['id']]);

                if ($data) {
                    $update = array(
                        'tipe_pajak'        => $input['tipe_pajak'],
                        'no_spk'            => $input['no_spk'],
                        'tanggal'           => $input['tanggal'],
                        'id_pelanggan'      => $input['id_pelanggan'],
                        'item'              => str_replace('=on', '', str_replace('&', ',', $input['item'])),
                        'keterangan'        => $input['keterangan'],
                        'waktu_pengerjaan'  => str_replace('T', ' ', $input['waktu_pengerjaan']),
                        'catatan'           => $input['catatan'],
                        'status'            => $input['status']
                    );

                    $this->crud->u('data_spk_service', $update, ['id' => $input['id']]);
                    $this->crud->d('data_spk_service_item', ['id_spk' => $input['id']]);
                    $this->db->insert_batch('data_spk_service_item', $batch);

                    return $this->sendResponse([
                        'success'   => TRUE,
                        'add'       => FALSE
                    ]);
                } else {
                    return $this->sendResponse([
                        'success'   => FALSE
                    ]);
                }
            }
        }
    }

    public function submit() {
        $this->load->model('kantor/SpkServiceModel');
        $response = $this->SpkServiceModel->store($_POST);
        $this->sendResponse($response);
    }

    public function edit_submit() {
        $this->load->model('kantor/SpkServiceModel');
        $response = $this->SpkServiceModel->store_edit($_POST);
        $this->sendResponse($response);
    }

    public function getcustomer() {
        $id = $this->input->post("id");
        $this->load->model('kantor/customerModel');
        $result = $this->customerModel->getcustomer($id);
        $this->sendResponse($result);
    }

    public function getdataac($customer_id) {
        $this->load->model('kantor/acModel');
        $response = $this->acModel->getdata($customer_id);
        $this->sendResponse(['success' => TRUE, 'data' => $response]);
    }
}
