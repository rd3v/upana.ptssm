<?php
defined('BASEPATH') or exit('No direct script access allowed');

class StockModel extends CI_Model {

   public function getdata() {
       $this->db->select("*");
       $this->db->from("tbl_customer");
       $result = $this->db->get()->result_array();
       return $result;
   }

   public function getdatamaster() {
        $this->db->select("*");
        $this->db->from("master_stock");
        $result = $this->db->get()->result_array();
        return $result;
    }

}