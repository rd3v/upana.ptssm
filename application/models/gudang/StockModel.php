<?php
defined('BASEPATH') or exit('No direct script access allowed');

class StockModel extends CI_Model {

   public function getdatamaster() {
       $this->db->select("*");
       $this->db->from("master_stock");
       $result = $this->db->get()->result_array();
       return $result;
   }

   public function store_master_stock(array $request) {
        $this->db->select("kode");
        $this->db->from("master_stock");
        $this->db->where("kode",$request['kode']);
        $query = $this->db->get()->row();
        if(!empty($query)) {
          return false;
        }
        $result = $this->db->insert('master_stock',$request);
        return $result;
   }

   public function store(array $request) {
       $result = $this->db->insert("data_customer",$request);
       return $result;
   }


}