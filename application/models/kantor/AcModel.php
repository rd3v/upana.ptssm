<?php
defined('BASEPATH') or exit('No direct script access allowed');

class AcModel extends CI_Model {

    public function getdata($customer_id) {
        $this->db->select("*");
        $this->db->from("data_ac");
        $this->db->where("customer_id",$customer_id);
        $result = $this->db->get()->result_array();
        return $result;
    }

}