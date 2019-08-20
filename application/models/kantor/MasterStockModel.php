<?php
defined('BASEPATH') or exit('No direct script access allowed');

class MasterStockModel extends CI_Model {

	public function getdata($kategori = '') {
		$this->db->select("id,kode,nama");
        $this->db->from("master_stock");
        if ($kategori) $this->db->where('kategori', $kategori);
        $result = $this->db->get()->result_array();
		return $result;
	}

}

?>
