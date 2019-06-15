<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class InvoiceMasuk extends MY_Controller {

    private $header = [];

    public function __construct() {
		parent::__construct();
		$this->load->library('session');
        $this->load->helper('url');
        if($this->session->userdata('id') == null or $this->session->userdata('accesstype') != "finance") {
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
        
        $content['data'] = [];
        
        $footer['data'] = [
            "route" => $this->getRoute(),
            "accesstype" => $this->header['data']['user']['accesstype']
        ];

        $this->load->view('header_menu',$this->header);
        $this->load->view('finance/invoice_masuk',$content);
        $this->load->view('footer',$footer);
    }

    public function tambah() {

        $this->load->model('finance/StockModel');
        $master_stock = $this->StockModel->getdatamaster();
        $content['data'] = [
            "stock" => $master_stock
        ];

        $footer['data'] = [
            "route" => $this->getRoute(),
            "accesstype" => $this->header['data']['user']['accesstype']            
        ];

        $this->load->view('header_menu',$this->header);
        $this->load->view('finance/invoice_masuk_tambah',$content);
        $this->load->view('footer',$footer);        
    }

    public function store() {
        $this->load->model('finance/InvoiceMasukModel');

        $listitem = $this->input->post('listitem');
        $tagihan = $this->input->post('tagihan');
        $request = [
            "no_invoice" => $this->input->post('no_invoice'),
            "tanggal" => $this->input->post('tanggal'),
            "nama_supplier" => $this->input->post('nama_supplier'),
            "telepon" => $this->input->post('telepon'),
            "email" => $this->input->post('email'),
            "alamat" => $this->input->post('alamat'),
            "npwp_supplier" => $this->input->post('npwp'),
            "status" => $this->input->post('status'),
            "gudang" => $this->input->post('gudang'),
            "subtotal" => $tagihan['subtotal'],
            "ppn" => $tagihan['ppn'],
            "total" => $tagihan['total']
        ];

        $result_store = $this->InvoiceMasukModel->store($request);
        if($result_store['status']) {
            $result_listitem = $this->InvoiceMasukModel->storelistitem($listitem);
            if($result_listitem) {
                $response = [
                    'title' => 'Berhasil',
                    'message' => 'Data Invoice Masuk telah Tersimpan',
                    'status' => 'success'
                ];
            } else {
                $response = [
                    'title' => 'Gagal',
                    'message' => 'Data Item Invoice Masuk Gagal di Tambahkan',
                    'status' => 'danger'
                ];
            }
        } else {                
            $response = [
                'title' => 'Gagal',
                'message' => 'Data Invoice Masuk Gagal di Tambahkan',
                'status' => 'danger'
            ];                 
        }
        
        $this->sendResponse($response);

    }

    public function rincian($no_invoice) {
        $this->load->model('finance/InvoiceMasukModel');
        $result = $this->InvoiceMasukModel->rincian($no_invoice);
        
        $content['data'] = [
            "invoice" => $result
        ];
        
        $footer['data'] = [
            "route" => $this->getRoute(),
            "accesstype" => $this->header['data']['user']['accesstype']
        ];

        $this->load->view('header_menu',$this->header);
        $this->load->view('finance/invoice_masuk_rincian',$content);
        $this->load->view('footer',$footer);        
    }

    public function hapus() {     
        $no_invoice = $this->input->post('no_invoice');
        $this->load->model('finance/InvoiceMasukModel');
        $result = $this->InvoiceMasukModel->hapus($no_invoice);
        if($result) {
            $response = [
                'title' => 'Berhasil',
                'message' => 'Data Invoice Masuk telah di Hapus',
                'status' => 'success'
            ];
        } else {
            $response = [
                'title' => 'Gagal',
                'message' => 'Data Invoice Masuk Gagal di Hapus',
                'status' => 'danger'
            ];
        }
        $this->sendResponse($response);
    }


    public function edit($id) {
        
        $this->load->model('customerModel');
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
        $this->load->view('customer_edit',$content);
        $this->load->view('footer',$footer);        
    }

    public function getdata() {
        $this->load->model('finance/InvoiceMasukModel');
        $response = $this->InvoiceMasukModel->getdata();
        $this->sendResponse($response);
    }

    public function update() {
        $this->load->model('customerModel');

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

    

    public function getdataac($customer_id) {
        $this->load->model('acModel');
        $response = $this->acModel->getdata($customer_id);
        $this->sendResponse($response);
    }

}