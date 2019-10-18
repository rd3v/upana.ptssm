<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Stock extends MY_Controller {

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

        $this->load->view('header_menu',$this->header);
        $this->load->view('finance/stock');
        $this->load->view('footer',$footer);
    }

    public function rincian_kantor($id) {
        $this->load->model('finance/StockModel');
        $result = $this->StockModel->getdatarincian($id);
                
        $jumlah = $this->db->query("select sum(jumlah) as jumlah from data_invoice_masuk_list_barang where kode='".$result->kode."'")->row();
                
        # item masuk


        $item_masuk = $this->db->query("
            SELECT 
            `data_invoice_masuk`.`tanggal`,
            `data_invoice_masuk`.`no_invoice`,
            `data_invoice_masuk`.`nama_supplier`,
            `data_invoice_masuk_list_barang`.`jumlah`
            FROM 
            data_invoice_masuk, data_invoice_masuk_list_barang, data_invoice_masuk_list_barang_serial
            WHERE 
            `data_invoice_masuk_list_barang_serial`.`id_stock`=$id AND 
            `data_invoice_masuk_list_barang_serial`.`id_list_barang`=`data_invoice_masuk_list_barang`.`id` AND 
            `data_invoice_masuk_list_barang`.`no_invoice_data_invoice_masuk`=`data_invoice_masuk`.`no_invoice` 
        ")->result();

        $new_item_masuk = [];
        $item_masuk_temp=0;
        for ($i=0;$i < count($item_masuk);$i++) {

            if($i==0) {
                $new_item_masuk[] = [
                    "tanggal" => $item_masuk[$i]->tanggal,
                    "no_invoice" => $item_masuk[$i]->no_invoice,
                    "nama" => $item_masuk[$i]->nama_supplier,
                    "jumlah" => $item_masuk[$i]->jumlah
                ];
                $item_masuk_temp=$i;
                continue;
            }

            if($new_item_masuk[$item_masuk_temp]['no_invoice']==$item_masuk[$i]->no_invoice) {
                continue;
            } else {
                $new_item_masuk[] = [
                    "tanggal" => $item_masuk[$i]->tanggal,
                    "no_invoice" => $item_masuk[$i]->no_invoice,
                    "nama" => $item_masuk[$i]->nama_supplier,
                    "jumlah" => $item_masuk[$i]->jumlah,
                ];
                $item_masuk_temp=$i;
            }

        }


# item keluar
# jika unit ambil di surat jalan, jika material ambil di pengeluaran material

        if($result->kategori=="unit") {

            $item_keluar = $this->db->query("
                SELECT 
                `data_surat_jalan`.`tanggal`,
                `data_surat_jalan`.`no_surat`,
                `data_spk_pemasangan_item`.`nama`,
                `data_spk_pemasangan_item`.`jumlah` as jumlah
                FROM 
                data_surat_jalan, data_spk_pemasangan_item 
                WHERE 
                `data_spk_pemasangan_item`.`id_stock`=$id AND 
                `data_surat_jalan`.`id_spk`=`data_spk_pemasangan_item`.`id_spk` 
            ")->result();

        } else if($result->kategori=="material") {

            $item_keluar = $this->db->query("
                SELECT 
                `data_pengeluaran_material_item`.`iat` as tanggal,
                `data_pengeluaran_material_item`.`id_pengeluaran_material` as no_surat,
                `data_customer`.`nama`,
                `data_pengeluaran_material_item`.`pengeluaran` as jumlah
                FROM 
                data_customer, data_pengeluaran_material_item 
                WHERE 
                `data_pengeluaran_material_item`.`id_stock`=$result->id AND 
                `data_pengeluaran_material_item`.`id_pelanggan`=`data_customer`.`id` 
            ")->result();

        }


        $new_item_keluar = [];
        $item_keluar_temp=0;
        for ($i=0;$i < count($item_keluar);$i++) {

            if(strlen($item_keluar[$i]->tanggal) > 10) {
                $tanggal = date("Y-m-d",strtotime($item_keluar[$i]->tanggal));
            } else {
                $tanggal = $item_keluar[$i]->tanggal;
            }

            if($i==0) {
                $new_item_keluar[] = [
                    "tanggal" =>  $tanggal,
                    "no_surat" => $item_keluar[$i]->no_surat,
                    "nama" => $item_keluar[$i]->nama,
                    "jumlah" => $item_keluar[$i]->jumlah
                ];
                $item_keluar_temp=$i;
                continue;
            }
            if($new_item_keluar[$item_keluar_temp]['no_surat']==$item_keluar[$i]->no_surat) {
                $new_item_keluar[$item_keluar_temp]['jumlah'] += $item_keluar[$i]->jumlah;
                continue;
            } else {
                $new_item_keluar[] = [
                    "tanggal" => $item_keluar[$i]->tanggal,
                    "no_surat" => $item_keluar[$i]->no_surat,
                    "nama" => $item_keluar[$i]->nama,
                    "jumlah" => $item_keluar[$i]->jumlah,
                ];
                $item_keluar_temp=$i;
            }

        }   

        $content = (object) [
            "item_masuk" => $new_item_masuk,
            "item_keluar" => $new_item_keluar,
            "sisa" => $jumlah,
            "data" => $result
        ];

        $footer['data'] = [
            "route" => $this->getRoute(),
            "kode" => $result->kode
        ];        

        $this->load->view('header_menu',$this->header);
        $this->load->view('finance/stock_rincian_kantor',$content);
        $this->load->view('footer',$footer);
    }

    public function rincian_barang($id) {
        $this->load->model('finance/StockModel');
        $result = $this->StockModel->getdatarincian($id);

        $content['data'] = $result;
        
        $footer['data'] = [
            "route" => $this->getRoute(),
            "kode" => $result->kode
        ];        

        $this->load->view('header_menu',$this->header);
        $this->load->view('finance/stock_rincian_barang',$content);
        $this->load->view('footer',$footer);
    }

    private function _query($where) {
        return $this->db->select('master_stock.id, master_stock.kode, master_stock.nama,  master_stock.merk, master_stock.btu, master_stock.kategori, master_stock.satuan, master_stock.tipe, master_stock.tipe_gudang, sum(data_invoice_masuk_list_barang.jumlah) as jumlah, master_stock.keterangan')->from('master_stock,data_invoice_masuk_list_barang')->where($where);
    }

    public function getdatakantor() {

        $generalSearch = $this->input->post('query[generalSearch]');

        $where = 'master_stock.tipe_gudang = \'2\' && master_stock.kode = data_invoice_masuk_list_barang.kode';
        

        if ($generalSearch) $where .= ' AND ('.cari_query($generalSearch, ['master_stock.kode','master_stock.nama','master_stock.merk','master_stock.kategori','master_stock.satuan','master_stock.tipe','master_stock.keterangan']).')';


        $total = $this->_query($where)->get()->num_rows();

        $page = $this->input->post('pagination[page]') ? (int) $this->input->post('pagination[page]') : 1;
        $perpage = $this->input->post('pagination[perpage]') ? (int) $this->input->post('pagination[perpage]') : 10;
        $pages = ceil($total / $perpage);
        $offset = (($page - 1) * $perpage);
        
        $field = $this->input->post('sort[field]') ? $this->input->post('sort[field]') : 'id';
        
        $sort = $this->input->post('sort[sort]') ? $this->input->post('sort[sort]') : 'desc';

        $meta = array('page' => $page, 'pages' => $pages, 'perpage' => $perpage, 'total' => $total, 'sort' => $sort, 'field' => $field);

        $stock = $this->_query($where)->order_by($field.' '.$sort)->group_by('master_stock.kode')->limit($perpage, $offset)->get()->result();

        $this->sendResponse(['success' => TRUE, 'meta' => $meta, 'data' => $stock]);


    }

    public function getdatatoko() {

        $generalSearch = $this->input->post('query[generalSearch]');

        $where = 'master_stock.tipe_gudang = \'1\' && master_stock.kode = data_invoice_masuk_list_barang.kode';

        if ($generalSearch) $where .= ' AND ('.cari_query($generalSearch, ['master_stock.kode','master_stock.nama','master_stock.merk','master_stock.kategori','master_stock.satuan','master_stock.tipe','master_stock.keterangan']).')';


        $total = $this->_query($where)->get()->num_rows();

        $page = $this->input->post('pagination[page]') ? (int) $this->input->post('pagination[page]') : 1;
        $perpage = $this->input->post('pagination[perpage]') ? (int) $this->input->post('pagination[perpage]') : 10;
        $pages = ceil($total / $perpage);
        $offset = (($page - 1) * $perpage);
        
        $field = $this->input->post('sort[field]') ? $this->input->post('sort[field]') : 'id';
        
        $sort = $this->input->post('sort[sort]') ? $this->input->post('sort[sort]') : 'desc';

        $meta = array('page' => $page, 'pages' => $pages, 'perpage' => $perpage, 'total' => $total, 'sort' => $sort, 'field' => $field);

        $stock = $this->_query($where)->order_by($field.' '.$sort)->group_by('master_stock.kode')->limit($perpage, $offset)->get()->result();

        $this->sendResponse(['success' => TRUE, 'meta' => $meta, 'data' => $stock]);
    }

    public function getsatuan() {
        $kode = $this->input->post('kode');
        $field = $this->input->post('field');
        $this->load->model('finance/StockModel');
        $response = $this->StockModel->getfield($kode,$field);        
        $this->sendResponse($response);
    }

}