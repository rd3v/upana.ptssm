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

        $content['data'] = [
            "route" => $this->getRoute(),
            "user" => [
                "id" => $this->session->userdata('id'),
                "name" => $this->session->userdata('name'),
                "email" => $this->session->userdata('email'),
                "accesstype" => $this->session->userdata('accesstype')
            ]
        ];

        $this->load->view('gudang/stock_master',$content);
    }

    public function edit($id) {
        $this->load->model('gudang/StockModel');
        $result = $this->StockModel->getdata2($id);

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

                $config['upload_path']          = './assets/img/';
                $config['allowed_types']        = 'gif|jpg|png';
                $config['max_size']             = 10048;
                $config['is_image']             = 1;

                $this->load->library('upload', $config);

                // unlink($_SERVER['DOCUMENT_ROOT']."/ptssm/assets/img/".$_FILES["image_source_edit"]["name"]);
                unlink($_SERVER['DOCUMENT_ROOT']."/upana.ptssm/assets/img/".$_FILES["image_source_edit"]["name"]);
                
                if ($this->upload->do_upload('image_source_edit')) {
                    $data = ["upload_data" => $this->upload->data()];
            
                // $target_dir = "./assets/img/";
                // $randomstr = $this->getRandomString(5);
                // $target_file = $target_dir . basename($randomstr."_".$_FILES["image_source_edit"]["name"]);
                // $uploadOk = 1;
                // $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
                // // Check if image file is a actual image or fake image
                
                // $check = getimagesize($_FILES["image_source_edit"]["tmp_name"]);
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

                    // if (move_uploaded_file($_FILES["image_source_edit"]["tmp_name"], $target_file)) {

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
                            "gambar" => $data['upload_data']['file_name']
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
                // }            

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
        $id = $this->input->post('kode');
        $this->load->model('gudang/StockModel');
        $result = $this->StockModel->hapus($id);
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

        $generalSearch = $this->input->post('query[generalSearch]');

        $where = 'master_stock.id != \'0\'';
        if ($generalSearch) $where .= ' AND ('.cari_query($generalSearch, ['master_stock.kode','master_stock.nama','master_stock.merk','master_stock.kategori','master_stock.satuan','master_stock.tipe','master_stock.keterangan']).')';

        $total = $this->_query($where)->get()->num_rows();

        $page = $this->input->post('pagination[page]') ? (int) $this->input->post('pagination[page]') : 1;
        $perpage = $this->input->post('pagination[perpage]') ? (int) $this->input->post('pagination[perpage]') : 10;
        $pages = ceil($total / $perpage);
        $offset = (($page - 1) * $perpage);
        
        $field = $this->input->post('sort[field]') ? $this->input->post('sort[field]') : 'id';
        
        $sort = $this->input->post('sort[sort]') ? $this->input->post('sort[sort]') : 'desc';

        $meta = array('page' => $page, 'pages' => $pages, 'perpage' => $perpage, 'total' => $total, 'sort' => $sort, 'field' => $field);

        $participants = $this->_query($where)->order_by($field.' '.$sort)->limit($perpage, $offset)->get()->result();

        $this->sendResponse(['success' => TRUE, 'meta' => $meta, 'data' => $participants]);
    }

    private function _query($where) {
        return $this->db->select('master_stock.id, master_stock.kode, master_stock.nama, master_stock.stock, master_stock.merk, master_stock.btu, master_stock.kategori, master_stock.satuan, master_stock.tipe,  master_stock.tipe_gudang, master_stock.daya_listrik, master_stock.keterangan, master_stock.gambar')->from('master_stock')->where($where);
    }

    public function getdatakantor() {
        $this->load->model('gudang/StockModel');
        $response = $this->StockModel->getdatakantor();
        $this->sendResponse($response);
    }

    public function getdatatoko() {
        $this->load->model('gudang/StockModel');
        $response = $this->StockModel->getdatatoko();
        $this->sendResponse($response);
    }


    public function rincian_kantor($id) {
        $this->load->model('gudang/StockModel');
        $result = $this->StockModel->getdatarincian($id);
        
        $content['data'] = $result;

        $footer['data'] = [
            "route" => $this->getRoute(),
            "kode" => $result->kode
        ];        

        $this->load->view('header_menu',$this->header);
        $this->load->view('gudang/stock_rincian_kantor',$content);
        $this->load->view('footer',$footer);
    }

    public function rincian_barang($id) {
        $this->load->model('gudang/StockModel');
        $result = $this->StockModel->getdatarincian($id);

        $content['data'] = $result;

        $footer['data'] = [
            "route" => $this->getRoute(),
            "kode" => $result->kode
        ];        

        $this->load->view('header_menu',$this->header);
        $this->load->view('gudang/stock_rincian_barang',$content);
        $this->load->view('footer',$footer);
    }    
    
    public function store() {

        $input_kode_barang = $this->input->post('input_kode_barang');
        switch ($this->input->post('kategori_item')) {
            case '1':
                $kategori_item = "unit"; 
                break;
            case '2':
                $kategori_item = "material"; 
                break;
            case '3':
                $kategori_item = "sparepart"; 
                break;
            case '4':
                $kategori_item = "jasa"; 
                break;
        }
        
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

                $config['upload_path']          = './assets/img/';
                $config['allowed_types']        = 'gif|jpg|png';
                $config['max_size']             = 10048;
                $config['is_image']             = 1;

                $this->load->library('upload', $config);
                
                if ($this->upload->do_upload('image_source')) {
                    $data = ["upload_data" => $this->upload->data()];
                // }

                // $target_dir = "./assets/img/";
                // $randomstr = $this->getRandomString(5);
                // $target_file = $target_dir . basename($randomstr."_".$_FILES["image_source"]["name"]);

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
                            "kode" => $input_kode_barang,
                            "nama" => $nama_barang,
                            "stock" => $stock_minimal,
                            "merk" => $merek,
                            "btu" => $btu,
                            "kategori" => $kategori_item,
                            "satuan" => $input_satuan_barang,
                            "tipe" => $tipe,
                            "tipe_gudang" => $tipe_gudang,
                            "daya_listrik" => $daya,
                            "keterangan" => $keterangan_barang,
                            "gambar" => $data['upload_data']['file_name'],

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
                
                // }    

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