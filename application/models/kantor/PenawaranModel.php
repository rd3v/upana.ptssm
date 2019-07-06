<?php
defined('BASEPATH') or exit('No direct script access allowed');

class PenawaranModel extends CI_Model {

	public function getalldata() {
		$this->db->select("*");
		$this->db->from("data_manajemen_penawaran");
		$result = $this->db->get()->result_array();
		return $result;
	}

	public function getdata($reff) {
		$this->db->select("*");
		$this->db->from("data_manajemen_penawaran");
		$this->db->where("reff",$reff);
		$data_manajemen_penawaran = $this->db->get()->row();

		$this->db->select("*");
		$this->db->from("data_manajemen_penawaran_list_item");
		$this->db->where("reff",$reff);
		$data_manajemen_penawaran_list_item = $this->db->get()->result_array();

		$this->db->select("*");
		$this->db->from("data_manajemen_penawaran_jasa_pemasangan_material");
		$this->db->where("reff",$reff);
		$data_manajemen_penawaran_jasa_pemasangan_material = $this->db->get()->result_array();

		$data_manajemen_penawaran->list_item = $data_manajemen_penawaran_list_item;
		$data_manajemen_penawaran->jasa_pemasangan = $data_manajemen_penawaran_jasa_pemasangan_material;

		return $data_manajemen_penawaran;
		
	}

	public function get_listitem() {
		$this->db->select("master_stock.id,master_stock.kode,master_stock.nama");
		$this->db->from("master_stock");
		$this->db->where("kategori = 'unit' or kategori = 'material' or kategori = 'sparespart'");
		$this->db->join("data_harga","master_stock.id = data_harga.master_stock_id");
		$result = $this->db->get()->result_array();
		return $result;
	}

	public function get_jasapemasangan_materialac() {
		$this->db->select("master_stock.id,master_stock.kode,master_stock.nama");
		$this->db->from("master_stock");
		$this->db->where("kategori","jasa");
		$this->db->join("data_harga","master_stock.id = data_harga.master_stock_id");
		$result = $this->db->get()->result_array();
		return $result;
	}

    public function store(array $request) {
    	$this->db->select("reff");
    	$this->db->from("data_manajemen_penawaran");
    	$this->db->where("reff",$request['reff']);
    	$check = $this->db->get()->row();
    	if(!empty($check)) {
    		return [
    			"state" => false,
    			"title" => "Gagal",
    			"text" => "No Referensi sudah ada !!!",
    			"status" => "warning"
    		];
    	}

    	$data_manajemen_penawaran = [
    		"tipe_pajak" => $request['tipe_pajak'],
    		"reff" => $request['reff'],
    		"tanggal" => $request['tanggal'],
    		"penerima" => $request['penerima'],
    		"perihal" => $request['perihal']
    	];

    	$data_manajemen_penawaran_list_item = [];
    	for ($a=0; $a < count($request['list_item_penawaran']); $a++) { 
    		$data_manajemen_penawaran_list_item[] = [
    			"reff" => $request['reff'],
    			"tipe" => $request['list_item_penawaran'][$a]['type_penawaran_barang'],
    			"model" => $request['list_item_penawaran'][$a]['model_stock'],
    			"btu_hr" => $request['list_item_penawaran'][$a]['btu'],
    			"daya_listrik" => $request['list_item_penawaran'][$a]['daya_listrik'],
    			"harga" => $request['list_item_penawaran'][$a]['harga_item'],
    			"jumlah" => $request['list_item_penawaran'][$a]['jumlah_barang']
    		];
    	}
  

    	$data_manajemen_penawaran_jasa_pemasangan_material = [];
    	for ($b=0; $b < count($request['jasa_pemasangan']); $b++) { 
    		$data_manajemen_penawaran_jasa_pemasangan_material[] = [
    			"reff" => $request['reff'],
    			"uraian_pekerjaan" => $request['jasa_pemasangan'][$b]['uraian_pekerjaan'],
    			"model" => $request['jasa_pemasangan'][$b]['model'],
    			"jumlah" => $request['jasa_pemasangan'][$b]['jumlah'],
    			"harga" => $request['jasa_pemasangan'][$b]['harga'],
    			"total" => $request['jasa_pemasangan'][$b]['total']
    		];
    	}


    	$data_manajemen_penawaran_result = $this->db->insert('data_manajemen_penawaran',$data_manajemen_penawaran);
        if($data_manajemen_penawaran_result) {
        	for ($i=0; $i < count($data_manajemen_penawaran_list_item); $i++) { 
        		$result_list_item_penawaran = $this->db->insert("data_manajemen_penawaran_list_item",$data_manajemen_penawaran_list_item[$i]);

        	}

        	if($result_list_item_penawaran) {
    			for ($j=0; $j < count($data_manajemen_penawaran_jasa_pemasangan_material); $j++) { 
        			$result_jasa_pemasangan = $this->db->insert("data_manajemen_penawaran_jasa_pemasangan_material",$data_manajemen_penawaran_jasa_pemasangan_material[$j]);
    			}

    			if($result_jasa_pemasangan) {
    				return [
    					"state" => true,
    					"title" => "Berhasil",
    					"text" => "Penawaran berhasil dibuat",
    					"status" => "success"
    				];
    			}
        	}
        }

        return [
        	"state" => false,
			"title" => "Gagal",
			"text" => "Silahkan coba lagi atau hubungi admin.",
			"status" => "warning"
        ];
    }

    public function getmodel($master_stock_id) {
    	$this->db->select("master_stock.tipe,data_harga.modal,data_harga.partai,data_harga.kantor");
    	$this->db->where("master_stock.id",$master_stock_id);
    	$this->db->where("data_harga.master_stock_id",$master_stock_id);
    	$this->db->from("master_stock,data_harga");
    	$result = $this->db->get()->row();
    	return $result;
    }

}