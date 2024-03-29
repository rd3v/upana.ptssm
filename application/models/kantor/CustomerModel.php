<?php
defined('BASEPATH') or exit('No direct script access allowed');

class CustomerModel extends CI_Model {

   public function getdata() {
       $this->db->select("*");
       $this->db->from("data_customer");
       $this->db->order_by("iat DESC");
       $result = $this->db->get()->result_array();
       return $result;
   }

   public function getlastid() {
       $this->db->select("id");
       $this->db->from("data_customer");
       $this->db->order_by("id","DESC");
       $result = $this->db->get();
       $ret = $result->row();
       return $ret;
   }

   public function store(array $request) {
       $result = $this->db->insert("data_customer",$request);
       return $result;
   }

   public function update(array $request) {
       $data = [
           "nama" => $request['nama'],
           "telepon" => $request['telepon'],
           "email" => $request['email'],
           "alamat" => $request['alamat'],
           "lat" => $request['lat'],
           "lon" => $request['lon']
        ];
       $this->db->where("id",$request['id']);
       $result = $this->db->update("data_customer",$data);
       return $result;
   }

   public function getcustomer($id) {
       $this->db->select("id,nama,telepon,alamat,lat,lon,tipe,email");
       $this->db->from("data_customer");
       $this->db->where("id",$id);
       $result = $this->db->get();
       $ret = $result->row();
       return $ret;
   }

}
