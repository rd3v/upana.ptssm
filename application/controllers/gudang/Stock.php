<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Stock extends MY_Controller {

    private $header = [];

    public function __construct() {
		parent::__construct();
		$this->load->library('session');
        $this->load->helper('form');
        $this->load->helper('url');
        if($this->session->userdata('id') == null or $this->session->userdata('accesstype') != "gudang") {
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

    public function manajemen() {
        
        $footer['data'] = [
            "route" => $this->getRoute()
        ];

        $this->load->view('header_menu',$this->header);
        $this->load->view('gudang/stock_manajemen');
        $this->load->view('footer',$footer);
    }

    public function master() {

        $footer['data'] = [
            "route" => $this->getRoute()
        ];

        $this->load->view('header_menu',$this->header);
        $this->load->view('gudang/stock_master');
        $this->load->view('footer',$footer);
    }

    public function edit($kode) {
        $this->load->model('gudang/StockModel');
        $result = $this->StockModel->getdata($kode);

        if(!empty($result)) {
            $content['data'] = $result;
        } else {
            redirect(base_url()."gudang/stock/master");
        }

        $footer['data'] = [
            "route" => $this->getRoute()
        ];

        $this->load->view('header_menu',$this->header);
        $this->load->view('gudang/stock_master_edit',$content);
        $this->load->view('footer',$footer);        
    }    

    public function editsubmit() {
        $input_kode_barang = $this->input->post('input_kode_barang');
        $kategori_item = $this->input->post('kategori_item');
        $nama_barang = $this->input->post('nama_barang');
        $input_satuan_barang = $this->input->post('input_satuan_barang');
        $stock_minimal = $this->input->post('stock_minimal');
        $tipe = $this->input->post('tipe');
        $merek = $this->input->post('merek');
        $tipe_gudang = $this->input->post('tipe_gudang');
        $btu = $this->input->post('btu');
        $daya = $this->input->post('daya');
        $keterangan_barang = $this->input->post('keterangan_barang');
        
        if($_FILES["image_source_edit"]["error"] == 0) {
            
                $target_dir = $_SERVER['DOCUMENT_ROOT']."/ptssm/app2/assets/img/";
                $target_file = $target_dir . basename($_FILES["image_source_edit"]["name"]);
                $uploadOk = 1;
                $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
                // Check if image file is a actual image or fake image
                
                $check = getimagesize($_FILES["image_source_edit"]["tmp_name"]);
                if($check !== false) {
                    $uploadOk = 1;
                } else {
                    $uploadOk = 0;
                }
                
                // Check if file already exists
                if (file_exists($target_file)) {
                    $uploadOk = 0;
                }

                // Allow certain file formats
                if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
                    $uploadOk = 0;
                }
                // Check if $uploadOk is set to 0 by an error
                if ($uploadOk == 0) {

                } else {
                    unlink($_SERVER['DOCUMENT_ROOT']."/ptssm/app2/assets/img/".$_FILES["image_source_edit"]["name"]);
                    if (move_uploaded_file($_FILES["image_source_edit"]["tmp_name"], $target_file)) {

                        $request = [
                            "kategori" => $kategori_item,
                            "nama" => $nama_barang,
                            "satuan" => $input_satuan_barang,
                            "stock" => $stock_minimal,
                            "tipe" => $tipe,
                            "merk" => $merek,
                            "tipe_gudang" => $tipe_gudang,
                            "btu" => $btu,
                            "daya_listrik" => $daya,
                            "keterangan" => $keterangan_barang,
                            "gambar" => $_FILES["image_source_edit"]["name"],

                        ];

                        $this->db->where('kode', $input_kode_barang);
                        $resultstore = $this->db->update('master_stock', $request);                    

                        if($resultstore) {
                            $result = true;
                        } else {
                            $result = false;
                        }
                    } else {
                       $result = false;
                    }
                }            

        } else {

            $request = [
                "kategori" => $kategori_item,
                "nama" => $nama_barang,
                "satuan" => $input_satuan_barang,
                "stock" => $stock_minimal,
                "tipe" => $tipe,
                "merk" => $merek,
                "tipe_gudang" => $tipe_gudang,
                "btu" => $btu,
                "daya_listrik" => $daya,
                "keterangan" => $keterangan_barang
            ];
        
            $this->db->where('kode', $input_kode_barang);
            $result = $this->db->update('master_stock', $request);   

        }
        
        if($result) {
            $this->session->set_flashdata('status', 'success');
            $this->session->set_flashdata('flsh_msg', 'Data telah di update');
            redirect(base_url()."gudang/stock/master");
        } else {
            $this->session->set_flashdata('status', 'danger');
            $this->session->set_flashdata('flsh_msg', 'Gagal mengupload gambar');
            redirect(base_url()."gudang/stock/master");
        }


    }

    public function masterhapus() {
        $kode = $this->input->post('kode');
        $this->load->model('gudang/StockModel');
        $result = $this->StockModel->hapus($kode);
        if($result) {
            $response = [
                'title' => 'Berhasil',
                'message' => 'Data Master Stock telah di Hapus',
                'status' => 'success'
            ];
        } else {
            $response = [
                'title' => 'Gagal',
                'message' => 'Data Master Stock Gagal di Hapus',
                'status' => 'danger'
            ];
        }
        $this->sendResponse($response);        
    }

    public function getdatamaster() {
        $this->load->model('gudang/StockModel');
        $response = $this->StockModel->getdatamaster();

        $this->sendResponse($response);
    }
    
    public function store() {
        
        $input_kode_barang = $this->input->post('input_kode_barang');
        $kategori_item = $this->input->post('kategori_item');
        $nama_barang = $this->input->post('nama_barang');
        $input_satuan_barang = $this->input->post('input_satuan_barang');
        $stock_minimal = $this->input->post('stock_minimal');
        $tipe = $this->input->post('tipe');
        $merek = $this->input->post('merek');
        $tipe_gudang = $this->input->post('tipe_gudang');
        $btu = $this->input->post('btu');
        $daya = $this->input->post('daya');
        $keterangan_barang = $this->input->post('keterangan_barang');
 
        $this->load->model('gudang/StockModel');
        
        if($_FILES["image_source"]["error"] == 0) {
            
                $target_dir = $_SERVER['DOCUMENT_ROOT']."/ptssm/app2/assets/img/";
                $target_file = $target_dir . basename($_FILES["image_source"]["name"]);
                $uploadOk = 1;
                $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
                // Check if image file is a actual image or fake image
                
                $check = getimagesize($_FILES["image_source"]["tmp_name"]);
                if($check !== false) {
                    $uploadOk = 1;
                } else {
                    $uploadOk = 0;
                }
                
                // Check if file already exists
                if (file_exists($target_file)) {
                    $uploadOk = 0;
                }

                // Allow certain file formats
                if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
                    $uploadOk = 0;
                }
                // Check if $uploadOk is set to 0 by an error
                if ($uploadOk == 0) {

                } else {
                    if (move_uploaded_file($_FILES["image_source"]["tmp_name"], $target_file)) {

                        $request = [
                            "kode" => $input_kode_barang,
                            "kategori" => $kategori_item,
                            "nama" => $nama_barang,
                            "satuan" => $input_satuan_barang,
                            "stock" => $stock_minimal,
                            "tipe" => $tipe,
                            "merk" => $merek,
                            "tipe_gudang" => $tipe_gudang,
                            "btu" => $btu,
                            "daya_listrik" => $daya,
                            "keterangan" => $keterangan_barang,
                            "gambar" => $_FILES["image_source"]["name"],

                        ];
                    
                        $resultstore = $this->StockModel->store_master_stock($request);
                        if($resultstore) {
                            $result = true;
                        } else {
                            $result = false;
                        }
                    } else {
                       $result = false;
                    }
                }            

        } else {

            $request = [
                "kode" => $input_kode_barang,
                "kategori" => $kategori_item,
                "nama" => $nama_barang,
                "satuan" => $input_satuan_barang,
                "stock" => $stock_minimal,
                "tipe" => $tipe,
                "merk" => $merek,
                "tipe_gudang" => $tipe_gudang,
                "btu" => $btu,
                "daya_listrik" => $daya,
                "keterangan" => $keterangan_barang
            ];
        
            $result = $this->StockModel->store_master_stock($request);
            if(!$result) {
                $this->session->set_flashdata('status', 'danger');
                $this->session->set_flashdata('flsh_msg', 'Kode Barang sudah ada');
                redirect(base_url()."gudang/stock/master");
            }
        }
        
        if($result) {
            $this->session->set_flashdata('status', 'success');
            $this->session->set_flashdata('flsh_msg', 'Data telah di tambahkan');
            redirect(base_url()."gudang/stock/master");
        } else {
            $this->session->set_flashdata('status', 'danger');
            $this->session->set_flashdata('flsh_msg', 'Gagal mengupload gambar');
            redirect(base_url()."gudang/stock/master");
        }
        
    }

}