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

   public function hapus($kode) {
       $this->db->select("gambar");
       $this->db->from("master_stock");
       $this->db->where("kode",$kode);
       $result = $this->db->get()->row();
       if(empty($result)) {
          return false;
       }

       if($result->gambar == "" or $result->gambar == null) {
         $master_stock = $this->db->delete('master_stock', ['kode' => $kode]);
       } else {
         unlink($_SERVER['DOCUMENT_ROOT']."/ptssm/app2/assets/img/".$result->gambar);
         $master_stock = $this->db->delete('master_stock', ['kode' => $kode]);
       }
       return $master_stock;
   }   


   public function getdata($kode) {
       $this->db->select("*");
       $this->db->from("master_stock");
       $this->db->where("kode",$kode);
       $result = $this->db->get();
       $ret = $result->row();
       return $ret;
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
      $this->db->select("*");
      $this->db->from("master_stock");
      $this->db->where("kode",$kode);
      $result = $this->db->get()->row();
      return $result;
    }    

}