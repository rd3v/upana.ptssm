<?php
defined('BASEPATH') or exit('No direct script access allowed');

class UserModel extends CI_Model {

	public function get_teknisi() {
		$this->db->select("id,name");
		$this->db->from("users");
		$this->db->where("accesstype","teknisi");
		$result = $this->db->get()->result_array();
		return $result;
	}

}