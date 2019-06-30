<?php
defined('BASEPATH') or exit('No direct script access allowed');

class SpkPemasanganModel extends CI_Model {

	public function getalldata() {
		$this->db->select("tanggal,no_spk,nama_pelanggan,telepon,status");
		$this->db->from("data_spk_pemasangan");
		$result = $this->db->get()->result_array();
		return $result;
	}

	public function store() {
		$this->db->select("no_spk");
		$this->db->from("data_spk_pemasangan");
		$this->db->where("no_spk",$_POST['no_spk']);
		$result = $this->db->get()->row();

		if(!empty($result)) {
			return [
				"state" => false,
				"title" => "Gagal",
				"message" => "Nomor SPK sudah ada",
				"status" => "warning"
			];
		}

		$data1 = [
			"tipe_pajak" => $_POST['tipe_pajak'],
			"no_spk" => $_POST['no_spk'],
			"tanggal" => $_POST['tanggal'],
			"nama_pelanggan" => $_POST['nama_pelanggan'],
			"telepon" => $_POST['telepon'],
			"email" => $_POST['email'],
			"alamat" => $_POST['alamat'],
			"waktu_pengerjaan" => $_POST['waktu_pengerjaan'],
			"catatan" => $_POST['catatan'],
			"status" => $_POST['status']
		];

		$result1 = $this->db->insert("data_spk_pemasangan",$data1);

		if($result1) {
			for($i = 0;$i < count($_POST['item']);$i++) {
				
				$barang = explode("||",$_POST['item'][$i]['barang']);

				$data2 = [
					"no_spk" => $_POST['no_spk'],
					"kode" => $barang[0],
					"nama" => $barang[1],
					"jumlah" => $_POST['item'][$i]['jumlah_barang'],
					"keterangan" => $_POST['item'][$i]['keterangan']
				];
				$result2 = $this->db->insert("data_spk_pemasangan_item",$data2);
				if($result2) {
					return [
						"state" => true,
						"title" => "SPK Telah Terbit!",
						"message" => "SPK yang anda buat telah terbit",
						"status" => "success"
					];
				} else {
					return [
						"state" => false,
						"title" => "Gagal",
						"message" => "Terjadi Kesalahan, silahkan coba lagi atau kontak Admin",
						"status" => "warning"
					];					
				}
			}

		}

		return [
			"state" => false,
			"title" => "Gagal",
			"message" => "Terjadi Kesalahan, silahkan coba lagi atau kontak Admin",
			"status" => "warning"
		];

	}

}