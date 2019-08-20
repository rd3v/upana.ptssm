<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends MY_Controller {

	private $header = [];

    public function __construct() {
		parent::__construct();
		$this->load->library('session');
		$this->load->helper('url');
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

			if($this->session->userdata('id') == null) {
				redirect(base_url()."teknisi/login",'refresh');
			}

			$content['data'] = [

			];

			$footer['data'] = [
				"route" => $this->getRoute()
			];

			$this->load->view('teknisi/header_menu',$this->header);
			$this->load->view('teknisi/dashboard',$content);
			$this->load->view('teknisi/footer',$footer);
		}

		public function login() {
			if($this->session->userdata('id') != null) {
				redirect(base_url()."teknisi");
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
				$status = true;
			} else {
				$status = false;
			}

			$this->sendResponse($status);
		}

		public function logout() {
			$keys = ["id","name","email","accesstype"];
			$this->session->unset_userdata($keys);
			redirect(base_url()."teknisi/login");
		}

}
