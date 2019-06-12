<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Material extends MY_Controller {

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

    public function keluar() {

        $content['data'] = [

        ];

        $footer['data'] = [
            "route" => $this->getRoute()
        ];

        $this->load->view('header_menu',$this->header);
        $this->load->view('material_keluar',$content);
        $this->load->view('footer',$footer);
    }

    public function tambahdata() {

        $this->load->model("customerModel");
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
        $this->load->view('customer_tambah',$content);
        $this->load->view('footer',$footer);        
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

    public function rincian($id) {
        
        $this->load->model('customerModel');
        $result = $this->customerModel->getcustomer($id);

        if(!empty($result)) {
            $content['data'] = $result;
        } else {
            redirect(base_url()."customer");
        }

        $footer['data'] = [
            "route" => $this->getRoute(),
            "id" => $result->id
        ];

        $this->load->view('header_menu',$this->header);
        $this->load->view('customer_rincian',$content);
        $this->load->view('footer',$footer);        
    }

    public function riwayat($customer_id) {
        $this->load->model('customerModel');
        $resultCustomer = $this->customerModel->getcustomer($customer_id);

        $this->load->model('historyModel');
        $resultHistory = $this->historyModel->getdata($customer_id);
        
        if(!empty($resultCustomer)) {
            $resultCustomerData = $resultCustomer;            
        } else {
            redirect(base_url()."customer");
        }

        if(!empty($resultHistory)) {
            $resultHistoryData = $resultHistory;
        } else {
            redirect(base_url()."customer/rincian/$customer_id");            
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
        $this->load->view('customer_riwayat',$content);
        $this->load->view('footer',$footer);        
    }

    public function store() {
        $this->load->model('customerModel');

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

    public function getdata() {
        $this->load->model('customerModel');
        $response = $this->customerModel->getdata();
        $this->sendResponse($response);
    }

    public function getdataac($customer_id) {
        $this->load->model('acModel');
        $response = $this->acModel->getdata($customer_id);
        $this->sendResponse($response);
    }

    public function getRoute() {
        $routes = array_reverse($this->router->routes); // All routes as specified in config/routes.php, reserved because Codeigniter matched route from last element in array to first.
        foreach ($routes as $key => $val) {
        $route = $key; // Current route being checked.
        
            // Convert wildcards to RegEx
            $key = str_replace(array(':any', ':num'), array('[^/]+', '[0-9]+'), $key);
        
            // Does the RegEx match?
            if (preg_match('#^'.$key.'$#', $this->uri->uri_string(), $matches)) break;
        }
        
        if ( ! $route) $route = $routes['default_route']; // If the route is blank, it can only be mathcing the default route.
        
        return $route;
    }    

}