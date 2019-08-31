<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Penawaran extends MY_Controller {

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
        $this->load->view('kantor/penawaran');
        $this->load->view('footer',$footer);
    }

    public function create() {
        
        $this->load->model('kantor/PenawaranModel');
        $get_listitem = $this->PenawaranModel->get_listitem();
        $get_jasapemasangan_materialac = $this->PenawaranModel->get_jasapemasangan_materialac();

        $content['data'] = [
            "get_listitem" => $get_listitem,
            "get_jasapemasangan_materialac" => $get_jasapemasangan_materialac
        ];
        
        $footer['data'] = [
            "route" => $this->getRoute()
        ];

        $this->load->view('header_menu',$this->header);
        $this->load->view('kantor/penawaran_buat',$content);
        $this->load->view('footer',$footer);
    }

    public function store() {
        $this->load->model('kantor/PenawaranModel');
        $response = $this->PenawaranModel->store($_POST);
        $this->sendResponse($response);
    }

    public function rincian($reff) {
        $this->load->model('kantor/PenawaranModel');
        $data_manajemen_penawaran = $this->PenawaranModel->getdata($reff);
        
        $content['data'] = $data_manajemen_penawaran;
        
        $footer['data'] = [
            "route" => $this->getRoute()
        ];

        $this->load->view('header_menu',$this->header);
        $this->load->view('kantor/penawaran_rincian',$content);
        $this->load->view('footer',$footer);        
    }

    public function print($reff) {

        $this->load->model('kantor/PenawaranModel');
        $data_manajemen_penawaran = $this->PenawaranModel->getdata($reff);
        
        $content['data'] = $data_manajemen_penawaran;

        $this->load->view('kantor/penawaran_print',$content);
    }

    public function getalldata() {

        $generalSearch = $this->input->post('query[generalSearch]');

        $where = 'data_manajemen_penawaran.id != \'0\'';
        if ($generalSearch) $where .= ' AND ('.cari_query($generalSearch, ['data_manajemen_penawaran.id','data_manajemen_penawaran.tipe_pajak','data_manajemen_penawaran.reff','data_manajemen_penawaran.tanggal','data_manajemen_penawaran.penerima','data_manajemen_penawaran.perihal']).')';

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
        return $this->db->select('data_manajemen_penawaran.id, data_manajemen_penawaran.tipe_pajak, data_manajemen_penawaran.reff, data_manajemen_penawaran.tanggal, data_manajemen_penawaran.penerima, data_manajemen_penawaran.perihal')->from('data_manajemen_penawaran')->where($where);
    }

    public function getmodel() {
        $master_stock_id = $this->input->post("id");
        $this->load->model('kantor/PenawaranModel');
        $response = $this->PenawaranModel->getmodel($master_stock_id);
        $this->sendResponse($response);
    }


}