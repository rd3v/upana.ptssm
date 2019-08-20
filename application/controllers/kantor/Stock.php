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
        $this->load->view('kantor/stock');
        $this->load->view('footer',$footer);
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
        $this->load->view('kantor/stock_rincian_kantor',$content);
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
        $this->load->view('kantor/stock_rincian_barang',$content);
        $this->load->view('footer',$footer);
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