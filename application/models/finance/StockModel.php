<?php
defined('BASEPATH') or exit('No direct script access allowed');

class StockModel extends CI_Model {

    public function getfield($kode,$field) {
        $result = $this->db->select($field)->from('master_stock')->where('kode',$kode)->get()->row();
        return $result;
   }

   public function getdatakantor() {
        $this->db->select("*");
        $this->db->from("master_stock");
        $this->db->where("tipe_gudang","2");
        $result = $this->db->get()->result_array();        
        return $result;
    }

   public function getdatatoko() {
        $this->db->select("*");
        $this->db->from("master_stock");
        $this->db->where("tipe_gudang","1");
        $result = $this->db->get()->result_array();        
        return $result;
    }

    public function getdatarincian($kode) {
      return $kode;
    }

}