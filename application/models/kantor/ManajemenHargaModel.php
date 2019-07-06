<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ManajemenHargaModel extends CI_Model {

	public function getdata() {
		$this->db->select("id,kode,nama,kategori");
        $this->db->from("master_stock");
        $result = $this->db->get()->result_array();		
		return $result;
	}

	public function getpriceitem() {
		$this->db->select("master_stock.id,master_stock.kode,master_stock.nama,master_stock.tipe,master_stock.merk,data_harga.modal,data_harga.partai,data_harga.kantor,data_harga.keterangan");
		$this->db->where('data_harga.tipe','barang');
		$this->db->join('data_harga','master_stock.id = data_harga.master_stock_id');
		$this->db->from("master_stock");
		$result = $this->db->get()->result_array();
		return $result;
	}

	public function getpricejasa() {
		$this->db->select("master_stock.id,master_stock.kode,master_stock.nama,master_stock.tipe,master_stock.merk,data_harga.modal,data_harga.partai,data_harga.kantor,data_harga.keterangan");
		$this->db->where('data_harga.tipe','jasa');
		$this->db->join('data_harga','master_stock.id = data_harga.master_stock_id');
		$this->db->from("master_stock");
		$result = $this->db->get()->result_array();
		return $result;
	}

	public function submit_barang(array $request) {
		$result = $this->db->insert("data_harga",$request);
		if($result) {
			return [
				"state" => true,
				"title" => "Berhasil!",
				"text" => "data harga item telah ditambahkan",
				"status" => "success"
			];
		} else {
			return [
				"state" => false,
				"title" => "Gagal!",
				"text" => "data harga item gagal ditambahkan",
				"status" => "warning"
			];
		}
	}

	public function submit_jasa(array $request) {
		$result = $this->db->insert("data_harga",$request);
		if($result) {
			return [
				"state" => true,
				"title" => "Berhasil!",
				"text" => "data harga jasa telah ditambahkan",
				"status" => "success"
			];
		} else {
			return [
				"state" => false,
				"title" => "Gagal!",
				"text" => "data harga jasa gagal ditambahkan",
				"status" => "warning"
			];
		}
	}



}

?>