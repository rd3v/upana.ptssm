<?php
defined('BASEPATH') or exit('No direct script access allowed');

class SpkSurveyModel extends CI_Model {

	public function getalldata() {
		$this->db->select("data_spk_survey.id, data_spk_survey.tanggal, data_spk_survey.no_spk, data_customer.nama, data_customer.telepon, data_spk_survey.status");
		$this->db->from("data_spk_survey");
		$this->db->join("data_customer", 'data_customer.id = data_spk_survey.id_pelanggan');
		$this->db->order_by("data_spk_survey.iat DESC");
		$result = $this->db->get()->result_array();
		return $result;
	}

	public function getdata($no_spk) {
		$this->db->select("*");
		$this->db->from("data_spk_survey");
		$this->db->where("no_spk",$no_spk);
		$result = $this->db->get()->row();
		return $result;
	}

	public function getdataitem($no_spk) {
		$this->db->select("*");
		$this->db->from("data_spk_survey_item");
		$this->db->where("no_spk",$no_spk);
		$result = $this->db->get()->result_array();
		return $result;
	}

	public function store() {
		$this->db->select("no_spk");
		$this->db->from("data_spk_survey");
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

		$result1 = $this->db->insert("data_spk_survey",$data1);

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
				$result2 = $this->db->insert("data_spk_survey_item",$data2);
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


	public function store_edit() {

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

		$this->db->where("no_spk",$_POST['no_spk']);
		$result1 = $this->db->update("data_spk_survey",$data1);

		if($result1) {

			$resultdelete = $this->db->delete("data_spk_survey_item",["no_spk" => $_POST['no_spk']]);

			if($resultdelete) {

				for($i = 0;$i < count($_POST['item']);$i++) {

					$barang = explode("||",$_POST['item'][$i]['barang']);

					$data2 = [
						"no_spk" => $_POST['no_spk'],
						"kode" => $barang[0],
						"nama" => $barang[1],
						"jumlah" => $_POST['item'][$i]['jumlah_barang'],
						"keterangan" => $_POST['item'][$i]['keterangan']
					];

					$result2 = $this->db->insert("data_spk_survey_item",$data2);
				}


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

			} else {

					return [
							"state" => false,
							"title" => "Gagal",
							"message" => "Terjadi Kesalahan, silahkan coba lagi atau kontak Admin",
							"status" => "warning"
					];
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
