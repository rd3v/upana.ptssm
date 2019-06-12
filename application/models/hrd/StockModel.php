<?php
defined('BASEPATH') or exit('No direct script access allowed');

class StockModel extends CI_Model {

   public function getdata() {
       $this->db->select("*");
       $this->db->from("tbl_customer");
       $result = $this->db->get()->result_array();
       return $result;
   }

   public function getlastid() {
       $this->db->select("id");
       $this->db->from("tbl_customer");
       $this->db->order_by("id","DESC");
       $result = $this->db->get();
       $ret = $result->row();
       return $ret;
   }

   public function store(array $request) {
       $result = $this->db->insert("tbl_customer",$request);
       return $result;
   }

   public function update(array $request) {
       $data = [
           "nama" => $request['nama'],
           "telepon" => $request['telepon'],
           "alamat" => $request['alamat']
        ];
       $this->db->where("id",$request['id']);
       $result = $this->db->update("tbl_customer",$data);
       return $result;
   }

   public function getcustomer($id) {
       $this->db->select("id,nama,telepon,alamat,tipe");
       $this->db->from("tbl_customer");
       $this->db->where("id",$id);
       $result = $this->db->get();
       $ret = $result->row();
       return $ret;
   }

}