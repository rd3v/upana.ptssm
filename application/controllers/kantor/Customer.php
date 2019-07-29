<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Customer extends MY_Controller {

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

        $content['data'] = [

        ];

        $footer['data'] = [
            "route" => $this->getRoute()
        ];

        $this->load->view('header_menu',$this->header);
        $this->load->view('kantor/customer',$content);
        $this->load->view('footer',$footer);
    }

    public function tambahdata() {

        $this->load->model("kantor/customerModel");
        $result = $this->customerModel->getlastid();
        if(!empty($result)) {
            $tempid = substr($result->id,0,3);
            $id = $this->generateIdPelanggan((int) $tempid + 1);
        } else {
            $id = $this->generateIdPelanggan(1);
        }

        $content['data'] = [
            "id" => $id
        ];

        $footer['data'] = [
            "route" => $this->getRoute()
        ];

        $this->load->view('header_menu',$this->header);
        $this->load->view('kantor/customer_tambah',$content);
        $this->load->view('footer',$footer);
    }

    public function edit($id) {

        $this->load->model('kantor/customerModel');
        $result = $this->customerModel->getcustomer($id);

        if(!empty($result)) {
            $content['data'] = $result;
        } else {
            redirect(base_url()."customer");
        }


        $footer['data'] = [
            "route" => $this->getRoute()
        ];

        $this->load->view('header_menu',$this->header);
        $this->load->view('kantor/customer_edit',$content);
        $this->load->view('footer',$footer);
    }

    public function rincian($id) {

        $this->load->model('kantor/customerModel');
        $result = $this->customerModel->getcustomer($id);

        if(!empty($result)) {
            $content['data'] = $result;
        } else {
            redirect(base_url()."customer");
        }

        $footer['data'] = [
            "route" => $this->getRoute(),
            "id"    => $result->id
        ];

        $this->load->view('header_menu2',$this->header);
        $this->load->view('kantor/customer_rincian',$content);
        $this->load->view('footer2',$footer);
    }

    public function submit_ac() {
        $valid = $this->form_validation;
        $valid->set_error_delimiters('', '');
        $valid->set_rules('id', 'ID Unit', 'required|trim');
        $valid->set_rules('nama', 'Nama Barang', 'required|trim');
        $valid->set_rules('tipe', 'Tipe Barang', 'required|trim');
        $valid->set_rules('merk', 'Merk Barang', 'required|trim');

        if ($valid->run() === FALSE) {
            $this->sendResponse([
                'success'   => FALSE,
                'error'     => array(
                    'id'    => form_error('id'),
                    'nama'  => form_error('nama'),
                    'tipe'  => form_error('tipe'),
                    'merk'  => form_error('merk')
                )
            ]);
        } else {
            $input = $this->input->post(NULL, TRUE);

            if (!$input['action']) {
                $insert = array(
                    'id'            => $input['id'],
                    'customer_id'   => $input['customer_id'],
                    'nama'          => $input['nama'],
                    'tipe'          => $input['tipe'],
                    'merk'          => $input['merk'],
                    'iat'           => date('Y-m-d H:i:s')
                );

                $this->crud->i('data_ac', $insert);

                $this->sendResponse([
                    'success'   => TRUE,
                    'add'       => TRUE
                ]);
            } else {
                $data = $this->crud->gd('data_ac', array('id' => $input['id']));

                if ($data) {
                    $update = array(
                        'id'    => $input['id'],
                        'nama'  => $input['nama'],
                        'tipe'  => $input['tipe'],
                        'merk'  => $input['merk']
                    );

                    $this->crud->u('data_ac', $update, array('id' => $input['id']));

                    $this->sendResponse([
                        'success'   => TRUE,
                        'add'       => FALSE
                    ]);
                } else {
                    $this->sendResponse([
                        'success'   => FALSE
                    ]);
                }
            }
        }
    }

    public function hapus_ac()
    {
        $this->crud->d('data_ac', ['id' => $this->input->post('id', TRUE)]);
        $this->sendResponse([
            'success'   => TRUE
        ]);
    }

    public function print_rincian_item($id) {

        $this->load->model('kantor/AcModel');
        $result = $this->AcModel->getitem($id);

        if(!empty($result)) {
            $content['data'] = $result;
        } else {
            redirect(base_url()."customer");
        }

        $this->load->view('kantor/print_rincian_pelanggan_item',$content);
    }

    public function generate_barcode() {
        if (isset($_GET['d'])) {
            $format = (isset($_GET['f']) ? $_GET['f'] : 'png');
            $symbology = (isset($_GET['s']) ? $_GET['s'] : 'code-128');

            $this->load->library('barcode');
            $this->barcode->output_image($format, $symbology, $_GET['d'], $_GET);
            exit(0);
        }
    }

    public function riwayat($customer_id) {
        $this->load->model('kantor/customerModel');
        $resultCustomer = $this->customerModel->getcustomer($customer_id);

        $this->load->model('kantor/historyModel');
        $resultHistory = $this->historyModel->getdata($customer_id);

        if(!empty($resultCustomer)) {
            $resultCustomerData = $resultCustomer;
        } else {
            redirect(base_url()."customer");
        }

        if(!empty($resultHistory)) {
            $resultHistoryData = $resultHistory;
        } else {
            redirect(base_url()."kantor/customer/rincian/$customer_id");
        }

        $content['data'] = [
            "id" => $customer_id,
            "user" => $resultCustomerData,
            "riwayat" => $resultHistoryData
        ];

        $footer['data'] = [
            "route" => $this->getRoute()
        ];

        $this->load->view('header_menu',$this->header);
        $this->load->view('kantor/customer_riwayat',$content);
        $this->load->view('footer',$footer);
    }

    public function store() {
        $this->load->model('kantor/customerModel');

        $id = $this->input->post('id');
        $nama = $this->input->post('nama');
        $telepon = $this->input->post('telepon');
        $alamat = $this->input->post('alamat');
        $tipe = $this->input->post('tipe');

        $request = [
            "id" => $id,
            "nama" => $nama,
            "telepon" => $telepon,
            "alamat" => $alamat,
            "tipe" => $tipe
        ];

        $result = $this->customerModel->store($request);
        if($result) {
            $response = [
                'title' => 'Berhasil',
                'message' => 'Data Pelanggan telah di Tambahkan',
                'status' => 'success'
            ];
        } else {
            $response = [
                'title' => 'Gagal',
                'message' => 'Data Pelanggan Gagal di Tambahkan',
                'status' => 'danger'
            ];
        }
        $this->sendResponse($response);
    }

    public function update() {
        $this->load->model('kantor/customerModel');

        $id = $this->input->post('id');
        $nama = $this->input->post('nama');
        $telepon = $this->input->post('telepon');
        $alamat = $this->input->post('alamat');

        $request = [
            "id" => $id,
            "nama" => $nama,
            "telepon" => $telepon,
            "alamat" => $alamat
        ];

        $result = $this->customerModel->update($request);
        if($result) {
            $response = [
                'title' => 'Berhasil',
                'message' => 'Data Pelanggan telah di Update',
                'status' => 'success'
            ];
        } else {
            $response = [
                'title' => 'Gagal',
                'message' => 'Data Pelanggan Gagal di Update',
                'status' => 'danger'
            ];
        }
        $this->sendResponse($response);
    }

    public function getdata() {
        $this->load->model('kantor/customerModel');
        $response = $this->customerModel->getdata();
        $this->sendResponse($response);
    }

    public function getdataac($customer_id) {
        $this->load->model('kantor/acModel');
        $response = $this->acModel->getdata($customer_id);
        $this->sendResponse($response);
    }

}
