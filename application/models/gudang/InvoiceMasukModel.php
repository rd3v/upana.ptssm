<?php
defined('BASEPATH') or exit('No direct script access allowed');

class InvoiceMasukModel extends CI_Model {

   public function getdata() {
       $this->db->select("*");
       $this->db->from("data_invoice_masuk a");
       $this->db->join('data_invoice_masuk_list_barang b','a.no_invoice=b.no_invoice_data_invoice_masuk','left');
       $this->db->where("b.proses",null);
       $this->db->or_where("b.proses",0);
       $result = $this->db->get()->result_array();
       return $result;
  }

  public function getjumlahserial($id) {
    $this->db->select("id,kode,nama,jumlah");
    $this->db->from("data_invoice_masuk_list_barang");
    $this->db->where("id",$id);
    $result = $this->db->get()->row();
    return $result;
  }

   public function simpan(array $request) {
       for ($i=0; $i < count($request); $i++) { 
         $result = $this->db->insert("data_invoice_masuk_list_barang_serial",$request[$i]);
       }
       
       if($result) {
         $this->db->where("id",$request[0]['id_list_barang']);
         $this->db->where("proses",0);
         $result2 = $this->db->update('data_invoice_masuk_list_barang', ["proses" => 1]);
         return $result2;
       } else {
         return false;
       }
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