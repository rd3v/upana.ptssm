<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inventory extends MY_Controller {

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
        $this->load->model('gudang/InventoryModel');
        $this->load->model('gudang/UserModel');

        $data = $this->InventoryModel->getdata();
        $teknisi = $this->UserModel->get_teknisi();
        
        $content['data'] = [
            "inventory" => $data,
            "teknisi" => $teknisi
        ];

        $footer['data'] = [
            "route" => $this->getRoute()
        ];

        $this->load->view('master/header_menu',$this->header);
        $this->load->view('master/gudang/inventory',$content);
        $this->load->view('master/footer',$footer);
    }

    public function tambah() {

        $footer['data'] = [
            "route" => $this->getRoute()
        ];

        $this->load->view('master/header_menu',$this->header);
        $this->load->view('master/gudang/inventory_tambah');
        $this->load->view('master/footer',$footer);        
    }

    public function kembalikan_pinjam() {
        $id = $this->input->post('id');
        $this->load->model('gudang/InventoryModel');
        $response = $this->InventoryModel->kembalikan_pinjam($id);
        $this->sendResponse($response);
    }

    public function edit($id) {
        $this->load->model('gudang/InventoryModel');
        $result = $this->InventoryModel->getone($id);

        if(!empty($result)) {
            $content['data'] = $result;
        } else {
            $this->session->set_flashdata('status', 'warning');
            $this->session->set_flashdata('flsh_msg', 'Data tidak di temukan !');
            redirect(base_url()."admin/gudang/inventory");
        }

        $footer['data'] = [
            "route" => $this->getRoute()
        ];

        $this->load->view('master/header_menu',$this->header);
        $this->load->view('master/gudang/inventory_edit',$content);
        $this->load->view('master/footer',$footer);        
    }

    public function hapus() {
        $id = $this->input->post('id');
        $gambar = $this->input->post('gambar');

        $this->load->model('gudang/InventoryModel');
        $response = $this->InventoryModel->hapus($id,$gambar);
        $this->sendResponse($response);
    }

    public function pinjam() {
        $id = $this->input->post('id');
        $teknisi_id = $this->input->post('teknisi_id');
        $this->load->model('gudang/InventoryModel');
        $response = $this->InventoryModel->pinjam($id,$teknisi_id);
        $this->sendResponse($response);
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

        $this->load->view('master/header_menu',$this->header);
        $this->load->view('master/customer_rincian',$content);
        $this->load->view('master/footer',$footer);        
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
            redirect(base_url()."admin/customer/rincian/$customer_id");            
        }

        $content['data'] = [
            "id" => $customer_id,
            "user" => $resultCustomerData,
            "riwayat" => $resultHistoryData
        ];

        $footer['data'] = [
            "route" => $this->getRoute()
        ];

        $this->load->view('master/header_menu',$this->header);
        $this->load->view('master/customer_riwayat',$content);
        $this->load->view('master/footer',$footer);        
    }

    public function submit() {

        $id_barang = $this->input->post("id_barang");
        $nama_barang = $this->input->post("nama_barang");
        $no_seri = $this->input->post("no_seri");
        $kondisi = $this->input->post("kondisi");
 
        $this->load->model('gudang/InventoryModel');
        
        if($_FILES["image_source"]["error"] == 0) {

                $config['upload_path']          = './assets/img/';
                $config['allowed_types']        = 'gif|jpg|png';
                $config['max_size']             = 10048;
                $config['is_image']             = 1;

                $this->load->library('upload', $config);
                
                if ($this->upload->do_upload('image_source')) {
                    $data = ["upload_data" => $this->upload->data()];

                // $target_dir = $_SERVER["DOCUMENT_ROOT"]."/upana.ptssm"."/assets/img/";
                // $randomstr = $this->getRandomString(5);
                // $target_file = $target_dir . basename($randomstr."_".$_FILES["image_source"]["name"]);
                
                // if(file_exists($target_file)) {
                //         $this->session->set_flashdata('status', 'warning');
                //         $this->session->set_flashdata('flsh_msg', 'Nama gambar ada yang sama, silahkan ganti nama gambar anda !');
                //         redirect(base_url()."gudang/inventory");
                // }

                // $uploadOk = 1;
                // $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
                // // Check if image file is a actual image or fake image
                
                // $check = getimagesize($_FILES["image_source"]["tmp_name"]);
                // if($check !== false) {
                //     $uploadOk = 1;
                // } else {
                //     $uploadOk = 0;
                // }
                
                // // Check if file already exists
                // if (file_exists($target_file)) {
                //     $uploadOk = 0;
                // }

                // // Allow certain file formats
                // if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
                //     $uploadOk = 0;
                // }
                // // Check if $uploadOk is set to 0 by an error
                // if ($uploadOk == 0) {

                // } else {
                    
                //     if (move_uploaded_file($_FILES["image_source"]["tmp_name"], $target_file)) {

                        $request = [
                            "id" => $id_barang,
                            "nama" => $nama_barang,
                            "no_seri" => $no_seri,
                            "gambar" => $data['upload_data']['file_name'],
                            "status" => "tersedia",
                            "kondisi" => $kondisi
                        ];
                    
                        $resultstore = $this->InventoryModel->store($request);
                        if($resultstore) {
                            $result = true;
                        } else {
                            $result = false;
                        }
                    } else {
                       $result = false;
                    }
                // }

        } else {

                $request = [
                    "id" => $id_barang,
                    "nama" => $nama_barang,
                    "no_seri" => $no_seri,
                    "status" => "tersedia",
                    "kondisi" => $kondisi
                ];
        
            $resultstore = $this->InventoryModel->store($request);
            if(!$resultstore) {
                $this->session->set_flashdata('status', 'danger');
                $this->session->set_flashdata('flsh_msg', 'ID Barang sudah ada');
                redirect(base_url()."admin/gudang/inventory");
            } else {
                $result = true;
            }
        }
        
        if($result) {
            $this->session->set_flashdata('status', 'success');
            $this->session->set_flashdata('flsh_msg', 'Data telah di tambahkan');
            redirect(base_url()."admin/gudang/inventory");
        } else {
            $this->session->set_flashdata('status', 'danger');
            $this->session->set_flashdata('flsh_msg', 'Gagal mengupload gambar');
            redirect(base_url()."admin/gudang/inventory");
        }

    }

    public function barcode($no_seri) {
        $content['no_seri'] = $no_seri;
        $this->load->view('gudang/inventory_barcode',$content);
    }


    public function update() {
        
        $id_barang = $this->input->post("id_barang");
        $nama_barang = $this->input->post("nama_barang");
        $no_seri = $this->input->post("no_seri");
        $kondisi = $this->input->post("kondisi");

        $this->load->model('gudang/InventoryModel');
        
        if($_FILES["image_source"]["error"] == 0) {

                $target_dir = "./assets/img/";
                $target_file = $target_dir . basename($_FILES["image_source"]["name"]);
                unlink($target_dir.$_FILES["image_source"]["name"]);
                
                $config['upload_path']          = $target_dir;
                $config['allowed_types']        = 'gif|jpg|png';
                $config['max_size']             = 10048;
                $config['is_image']             = 1;

                $this->load->library('upload', $config);
                
                if ($this->upload->do_upload('image_source')) {    
                    $data = ["upload_data" => $this->upload->data()];           
                    
                // $uploadOk = 1;
                // $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
                // // Check if image file is a actual image or fake image
                
                // $check = getimagesize($_FILES["image_source"]["tmp_name"]);
                // if($check !== false) {
                //     $uploadOk = 1;
                // } else {
                //     $uploadOk = 0;
                // }
                
                // // Check if file already exists
                // if (file_exists($target_file)) {
                //     $uploadOk = 0;
                // }

                // // Allow certain file formats
                // if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
                //     $uploadOk = 0;
                // }
                // // Check if $uploadOk is set to 0 by an error
                // if ($uploadOk == 0) {

                // } else {
                    
                //     if (move_uploaded_file($_FILES["image_source"]["tmp_name"], $target_file)) {

                        $request = [
                            "id" => $id_barang,
                            "nama" => $nama_barang,
                            "no_seri" => $no_seri,
                            "kondisi" => $kondisi,
                            "gambar" => $data['upload_data']['file_name']
                        ];
                    
                        $resultstore = $this->InventoryModel->update($request);
                        if($resultstore) {
                            $result = true;
                        } else {
                            $result = false;
                        }
                    } else {
                       $result = false;
                    }
                // }            

        } else {

                $request = [
                    "id" => $id_barang,
                    "nama" => $nama_barang,
                    "no_seri" => $no_seri,
                    "kondisi" => $kondisi
                ];
        
            $resultstore = $this->InventoryModel->update($request);
            if(!$resultstore) {
                $this->session->set_flashdata('status', 'danger');
                $this->session->set_flashdata('flsh_msg', 'ID Barang sudah ada');
                redirect(base_url()."gudang/inventory");
            } else {
                $result = true;
            }
        }
        
        if($result) {
            $this->session->set_flashdata('status', 'success');
            $this->session->set_flashdata('flsh_msg', 'Data telah di update');
            redirect(base_url()."admin/gudang/inventory");
        } else {
            $this->session->set_flashdata('status', 'danger');
            $this->session->set_flashdata('flsh_msg', 'Gagal mengupload gambar');
            redirect(base_url()."admin/gudang/inventory");
        }

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

}