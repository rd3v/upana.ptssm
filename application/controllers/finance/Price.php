<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Price extends MY_Controller {

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
        $this->load->view('finance/price');
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