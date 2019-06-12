<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends MY_Controller {
    
    public function __construct() {
		parent::__construct();
		$this->load->library('session');
		$this->load->helper('url');
    }
    
    public function login() {
        if($this->session->userdata('id') != null) {
            redirect(base_url());
        }
        $this->load->view('login');
    }

    public function checklogin() {
        $request = [
            "username" => $this->input->get('username'),
            "password" => $this->input->get('password')	
        ];

        $this->load->model('user');
        $check = $this->user->userAuth($request);
        if($check) {
            $user_session = [
                "id" => $check[0]['id'],
                "name" => $check[0]['name'],
                "email" => $check[0]['email'],
                "accesstype" => $check[0]['accesstype']
            ];
            
            $this->session->set_userdata($user_session);

            $data = [
                "status" => true,
                "level" => $check[0]['accesstype']
            ];	
        } else {
            $data = [
                "status" => false
            ];
        }

        $this->sendResponse($data);
    }

    public function logout() {
        $keys = ["id","name","email","accesstype"];
        $this->session->unset_userdata($keys);
        redirect(base_url()."login");
    }    
    
}