<?php
defined('BASEPATH') or exit('No direct script access allowed');

class InvoiceMasukModel extends CI_Model {

   public function getdata() {
       $this->db->select("*");
       $this->db->from("data_invoice_masuk");
       $result = $this->db->get()->result_array();
       return $result;
   }
   

}