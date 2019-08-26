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

    public function getspkitem($tipe, $id) {
        $this->db->select("data_spk_pemasangan_item.*, master_stock.kode, master_stock.nama");
        $this->db->from("data_spk_pemasangan_item");
        $this->db->join("master_stock", 'master_stock.id = data_spk_pemasangan_item.id_stock');
        $this->db->where(['data_spk_pemasangan_item.tipe' => $tipe, 'data_spk_pemasangan_item.id_spk' => $id]);
        $result = $this->db->get()->result();
        return $result;
    }

}

?>
