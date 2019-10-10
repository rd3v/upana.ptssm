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

        $content['data'] = $result;

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
        return $this->db->select('master_stock.id, master_stock.kode, master_stock.nama, master_stock.stock, master_stock.merk, master_stock.btu, master_stock.kategori, master_stock.satuan, master_stock.tipe,  master_stock.tipe_gudang, master_stock.daya_listrik, master_stock.keterangan, master_stock.gambar')->from('master_stock')->where($where);
    }

    private function _query2($where) {
        return $this->db->select('master_stock.id, master_stock.kode, master_stock.nama, master_stock.stock, master_stock.merk, master_stock.btu, master_stock.kategori, master_stock.satuan, master_stock.tipe,  master_stock.tipe_gudang, master_stock.daya_listrik, master_stock.keterangan, master_stock.gambar')->from('master_stock')->where($where);
    }

    public function getdatakantor() {

        $generalSearch = $this->input->post('query[generalSearch]');

        $where = 'master_stock.tipe_gudang = \'2\'';
        

        if ($generalSearch) $where .= ' AND ('.cari_query($generalSearch, ['master_stock.kode','master_stock.nama','master_stock.merk','master_stock.kategori','master_stock.satuan','master_stock.tipe','master_stock.keterangan']).')';


        $total = $this->_query($where)->get()->num_rows();

        $page = $this->input->post('pagination[page]') ? (int) $this->input->post('pagination[page]') : 1;
        $perpage = $this->input->post('pagination[perpage]') ? (int) $this->input->post('pagination[perpage]') : 10;
        $pages = ceil($total / $perpage);
        $offset = (($page - 1) * $perpage);
        
        $field = $this->input->post('sort[field]') ? $this->input->post('sort[field]') : 'id';
        
        $sort = $this->input->post('sort[sort]') ? $this->input->post('sort[sort]') : 'desc';

        $meta = array('page' => $page, 'pages' => $pages, 'perpage' => $perpage, 'total' => $total, 'sort' => $sort, 'field' => $field);

        $stock = $this->_query($where)->order_by($field.' '.$sort)->limit($perpage, $offset)->get()->result();

        $this->sendResponse(['success' => TRUE, 'meta' => $meta, 'data' => $stock]);


    }

    public function getdatatoko() {

        $generalSearch = $this->input->post('query[generalSearch]');

        $where = 'master_stock.tipe_gudang = \'1\'';

        if ($generalSearch) $where .= ' AND ('.cari_query($generalSearch, ['master_stock.kode','master_stock.nama','master_stock.merk','master_stock.kategori','master_stock.satuan','master_stock.tipe','master_stock.keterangan']).')';


        $total = $this->_query2($where)->get()->num_rows();

        $page = $this->input->post('pagination[page]') ? (int) $this->input->post('pagination[page]') : 1;
        $perpage = $this->input->post('pagination[perpage]') ? (int) $this->input->post('pagination[perpage]') : 10;
        $pages = ceil($total / $perpage);
        $offset = (($page - 1) * $perpage);
        
        $field = $this->input->post('sort[field]') ? $this->input->post('sort[field]') : 'id';
        
        $sort = $this->input->post('sort[sort]') ? $this->input->post('sort[sort]') : 'desc';

        $meta = array('page' => $page, 'pages' => $pages, 'perpage' => $perpage, 'total' => $total, 'sort' => $sort, 'field' => $field);

        $stock = $this->_query($where)->order_by($field.' '.$sort)->limit($perpage, $offset)->get()->result();

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