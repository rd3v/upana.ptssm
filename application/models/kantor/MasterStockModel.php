<?php
defined('BASEPATH') or exit('No direct script access allowed');

class MasterStockModel extends CI_Model {

	public function getdata() {
		$this->db->select("kode,nama");
        $this->db->from("master_stock");
        $result = $this->db->get()->result_array();		
		return $result;
	}

}

?>