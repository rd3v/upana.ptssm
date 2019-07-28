<?php
defined('BASEPATH') or exit('No direct script access allowed');

class InventoryModel extends CI_Model {
	
	public function getdata() {
		$this->db->select("*");
		$this->db->from("data_inventory");
		$result = $this->db->get()->result_array();
		$data = [];

		foreach ($result as $value) {
			if($value['status'] == "tersedia") {
				$data["tersedia"][] = $value;
			} else if($value['status'] == "dipinjam") {
				$data["dipinjam"][] = $value;
			}
		}

		return $data;
	}

	public function getone($id) {
		$this->db->select("*");
		$this->db->where("id",$id);
		$this->db->from("data_inventory");
		$result = $this->db->get()->row();
		return $result;
	}

	public function store(array $request) {
		$this->db->select("id");
		$this->db->from("data_inventory");
		$this->db->where("id",$request['id']);
		$check = $this->db->get()->row();
		if(empty($check) or $check == null) {
			return $this->db->insert("data_inventory",$request);
		} else {
			return false;
		}

	}

	public function update(array $request) {
		$this->db->where("id",$request['id']);
		if(!isset($request['gambar'])) {
			$result = $this->db->update("data_inventory",[
				"nama" => $request['nama'],
				"no_seri" => $request['no_seri']
			]);
		} else {
			$result = $this->db->update("data_inventory",[
				"nama" => $request['nama'],
				"no_seri" => $request['no_seri'],
				"gambar" => $request['gambar']
			]);
		}
		
		return $result;

	}

	

	public function pinjam($id,$teknisi_id) {
		$data = ["teknisi_id" => $teknisi_id, "status" => "dipinjam"];
		$this->db->where("id",$id);
		$result = $this->db->update("data_inventory",$data);
		if($result) {
			return [
				"state" => true,
				"title" => "Sukses",
				"text" => "Barang telah di pinjam",
				"status" => "success"
			];
		} else {
			return [
				"state" => false,
				"title" => "Gagal",
				"text" => "Terjadi kesalahan, silahkan coba lagi atau hubungi admin",
				"status" => "warning"
			];
		}
	}

	public function kembalikan_pinjam($id) {
		$data = ["teknisi_id" => null, "status" => "tersedia"];
		$this->db->where("id",$id);
		$result = $this->db->update("data_inventory",$data);
		if($result) {
			return [
				"state" => true,
				"title" => "Sukses",
				"text" => "Barang telah di kembalikan",
				"status" => "success"
			];
		} else {
			return [
				"state" => false,
				"title" => "Gagal",
				"text" => "Terjadi kesalahan, silahkan coba lagi atau hubungi admin",
				"status" => "warning"
			];
		}
	}

	public function hapus($id,$gambar="") {
		if($gambar == "") {

		} else {
			unlink($_SERVER["DOCUMENT_ROOT"]."/upana.ptssm/assets/img/".$gambar);
		}

		$this->db->where("id",$id);
		$result = $this->db->delete("data_inventory");
		if($result) {
			return [
				"state" => true,
				"title" => "Sukses",
				"text" => "Barang telah di hapus",
				"status" => "success"
			];
		} else {
			return [
				"state" => false,
				"title" => "Gagal",
				"text" => "Terjadi kesalahan, silahkan coba lagi atau hubungi admin",
				"status" => "warning"
			];
		}
	}

}