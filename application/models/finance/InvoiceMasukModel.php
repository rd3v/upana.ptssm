<?php
defined('BASEPATH') or exit('No direct script access allowed');

class InvoiceMasukModel extends CI_Model {

   public function getdata() {
       $this->db->select("*");
       $this->db->from("data_invoice_masuk");
       $result = $this->db->get()->result_array();
       return $result;
   }
   
   public function store(array $request) {
       $result = $this->db->insert('data_invoice_masuk',$request);
       if($result) {
            return [
                "status" => $result,
                "no_invoice" => $request['no_invoice']
            ];
       } else {
           return [
               "status" => $result,
           ];
       }
   }

   public function storelistitem(array $request) {
       for($i = 0;$i < count($request);$i++) {
           $result = $this->db->insert('data_invoice_masuk_list_barang',$request[$i]);
       }
       return $result;
   }

   public function rincian($no_invoice) {
        $data = [];
        $data_invoice = $this->db->where('no_invoice',$no_invoice)->get('data_invoice_masuk')->row();
        $data_invoice_list_barang = $this->db->where('no_invoice_data_invoice_masuk',$no_invoice)->get('data_invoice_masuk_list_barang')->result_array();
        $result = [
            "data_invoice" => $data_invoice,
            "data_invoice_list_barang" => $data_invoice_list_barang
        ];
        return $result;
   }

   public function hapus($no_invoice) {
       $result_list_barang = $this->db->delete('data_invoice_masuk_list_barang', ['no_invoice_data_invoice_masuk' => $no_invoice]);
       if($result_list_barang) {
           $result_invoice = $this->db->delete('data_invoice_masuk', ['no_invoice' => $no_invoice]);
           return $result_invoice;
       } else {
           return $result_list_barang;
       }
   }

}