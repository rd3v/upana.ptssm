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
        $this->load->model("kantor/MasterStockModel");

        $customer = $this->CustomerModel->getdata();
        $stock = $this->MasterStockModel->getdata();

        $content['data'] = [
            'id' => $this->input->get('id', TRUE),
            "customer" => $customer,
            "stock" => $stock,
            'item'  => $this->crud->gw('data_spk_service_item', ['tipe' => '1', 'id_spk' => $this->input->get('id', TRUE)])
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
            $this->load->model("kantor/MasterStockModel");

            $customer = $this->CustomerModel->getdata();
            $stock = $this->MasterStockModel->getdata();

            $content['data'] = [
                'data' => $data,
                "customer" => $customer,
                "stock" => $stock,
                'item'  => $this->crud->gw('data_spk_service_item', ['tipe' => '1', 'id_spk' => $id])
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
                'item'  => $this->crud->gw('data_spk_service_item', ['tipe' => '1', 'id_spk' => $id])
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
                'item'  => $this->crud->gw('data_spk_service_item', ['tipe' => '1', 'id_spk' => $id])
            ];

            $this->load->view('kantor/spk-service/print',$content);
        }
    }

    public function submit_item() {
        $valid = $this->form_validation;
        $valid->set_error_delimiters('', '');
        $valid->set_rules('id_spk', 'ID SPK Service', 'required|trim');
        $valid->set_rules('kode', 'Kode/Nama barang', 'required|trim');
        $valid->set_rules('jumlah', 'Jumlah Barang', 'required|trim');
        $valid->set_rules('keterangan', 'Keterangan', 'trim');

        if ($valid->run() === FALSE) {
            return $this->sendResponse([
                'success'   => FALSE,
                'error'     => array(
                    'id_spk'        => form_error('id_spk'),
                    'kode'          => form_error('kode'),
                    'jumlah'        => form_error('jumlah'),
                    'keterangan'    => form_error('keterangan')
                )
            ]);
        } else {
            $input = $this->input->post(NULL, TRUE);
            $kode = explode('||', $input['kode']);

            if (!$input['id']) {
                $insert = array(
                    'tipe'          => '1',
                    'id_spk'        => $input['id_spk'],
                    'kode'          => $kode[0],
                    'nama'          => $kode[1],
                    'jumlah'        => $input['jumlah'],
                    'keterangan'    => $input['keterangan']
                );

                $this->crud->i('data_spk_service_item', $insert);

                $insert['id'] = $this->db->insert_id();

                return $this->sendResponse([
                    'success'   => TRUE,
                    'add'       => TRUE,
                    'rows'      => $this->crud->cw('data_spk_service_item', ['tipe' => '1', 'id_spk' => $input['id_spk']]),
                    'data'      => $insert
                ]);
            } else {
                $data = $this->crud->gd('data_spk_service_item', ['tipe' => '1', 'id' => $input['id']]);

                if ($data) {
                    $update = array(
                        'id_spk'        => $input['id_spk'],
                        'kode'          => $kode[0],
                        'nama'          => $kode[1],
                        'jumlah'        => $input['jumlah'],
                        'keterangan'    => $input['keterangan']
                    );

                    $this->crud->u('data_spk_service_item', $update, ['tipe' => '1', 'id' => $input['id']]);

                    $update['id'] = $input['id'];

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

    public function delete_item() {
        $input = $this->input->post(NULL, TRUE);
        $where = array('tipe' => '1', 'id' => $input['id']);
        $data = $this->crud->gd('data_spk_service_item', $where);

        if ($data) {
            $this->crud->d('data_spk_service_item', $where);

            return $this->sendResponse(['success' => TRUE]);
        }

        return $this->sendResponse(['success' => FALSE]);
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

            if ($input['action'] == 'add') {
                $insert = array(
                    'id'                => $input['id'],
                    'tipe_pajak'        => $input['tipe_pajak'],
                    'no_spk'            => $input['no_spk'],
                    'tanggal'           => $input['tanggal'],
                    'id_pelanggan'      => $input['id_pelanggan'],
                    'keterangan'        => $input['keterangan'],
                    'waktu_pengerjaan'  => str_replace('T', ' ', $input['waktu_pengerjaan']),
                    'catatan'           => $input['catatan'],
                    'status'            => $input['status'],
                    'iat'               => date('Y-m-d H:i:s')
                );

                $this->crud->i('data_spk_service', $insert);

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
                        'keterangan'        => $input['keterangan'],
                        'waktu_pengerjaan'  => str_replace('T', ' ', $input['waktu_pengerjaan']),
                        'catatan'           => $input['catatan'],
                        'status'            => $input['status']
                    );

                    $this->crud->u('data_spk_service', $update, ['id' => $input['id']]);

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
}
