<?php
defined('BASEPATH') or exit('No direct script access allowed');

class InvoiceMasukModel extends CI_Model {

   public function getdata() {
       $this->db->select("*");
       $this->db->from("data_invoice_masuk");
       $this->db->order_by('id','desc');
       $result = $this->db->get()->result_array();
       return $result;
   }

   public function get($no_invoice) {
      $this->db->select("*");
      $this->db->from("data_invoice_masuk");
      $this->db->where("no_invoice",$no_invoice);
      $data_invoice_masuk = $this->db->get()->row();

      $this->db->select("*");
      $this->db->from("data_invoice_masuk_list_barang");
      $this->db->where("no_invoice_data_invoice_masuk",$no_invoice);
      $data_invoice_masuk_list_barang = $this->db->get()->result_array();
      $data_invoice_masuk->list_barang = $data_invoice_masuk_list_barang;

      // die(print_r($data_invoice_masuk));

      return $data_invoice_masuk;
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

   public function hapusitem($id) {
      $result = $this->db->delete("data_invoice_masuk_list_barang",['id' => $id]);
      if($result) {
        return [
            "title" => "Sukses",
            "text" => "Sukses Menghapus Item",
            "status" => "success"
        ];
      } else {
        return [
            "title" => "Gagal",
            "text" => "Terjadi Kesalahan, periksa koneksi anda atau hubungi admin.",
            "status" => "error"
        ];
      }
   }

   public function updateitem(array $request) {
      $this->db->where("id",$request['id']);
      $result = $this->db->update("data_invoice_masuk_list_barang",$request);
      if($result) {
        return [
            "title" => "Sukses",
            "text" => "Sukses Mengupdate Item",
            "status" => "success"
        ];
      } else {
        return [
            "title" => "Gagal",
            "text" => "Terjadi Kesalahan, periksa koneksi anda atau hubungi admin.",
            "status" => "error"
        ];
      }
   }

   public function tambahitem(array $request) {
      $result = $this->db->insert("data_invoice_masuk_list_barang",$request);
      if($result) {
        return [
            "title" => "Sukses",
            "text" => "Sukses Menambah Item",
            "status" => "success"
        ];
      } else {
        return [
            "title" => "Gagal",
            "text" => "Terjadi Kesalahan, periksa koneksi anda atau hubungi admin.",
            "status" => "error"
        ];
      }
   }

   public function updates(array $request) {

      $data = [
        "tanggal" => $request['tanggal'],
        "nama_supplier" => $request['nama_supplier'],
        "telepon" => $request['telepon'],
        "email" => $request['email'],
        "alamat" => $request['alamat'],
        "npwp_supplier" => $request['npwp'],
        "status" => $request['status'],
        "gudang" => $request['gudang'],
        "subtotal" => $request['tagihan']['subtotal'],
        "ppn" => $request['tagihan']['ppn'],
        "total" => $request['tagihan']['total']
      ];
      $this->db->where("id",$request['id']);
      $result = $this->db->update("data_invoice_masuk",$data);
      if($result) {
        return [
            "title" => "Sukses",
            "text" => "Sukses Mengupdate Item",
            "status" => "success"
        ];
      } else {
        return [
            "title" => "Gagal",
            "text" => "Terjadi Kesalahan, periksa koneksi anda atau hubungi admin.",
            "status" => "error"
        ];
      }
   }

}