<?php
defined('BASEPATH') or exit('No direct script access allowed');

class HistoryModel extends CI_Model {

   public function getdata($customer_id) {
       $this->db->select("*");
       $this->db->where("customer_id",$customer_id);
       $this->db->from("data_riwayat_pekerjaan");
       $result = $this->db->get()->result_array();
       return $result;
   }

}