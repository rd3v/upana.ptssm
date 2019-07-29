<?php
defined('BASEPATH') or exit('No direct script access allowed');

class SuratJalanModel extends CI_Model {

   public function getdata($status) {
      $this->db->select("data_spk_pemasangan.id, data_spk_pemasangan.tanggal, data_spk_pemasangan.tipe_pajak, data_spk_pemasangan.no_spk, data_customer.nama, data_customer.telepon, data_spk_pemasangan.status");
      $this->db->from("data_spk_pemasangan");
      $this->db->join("data_customer", 'data_customer.id = data_spk_pemasangan.id_pelanggan');
      if (is_array($status)) $this->db->or_where($status);
      else $this->db->where("data_spk_pemasangan.status", $status);
      $this->db->order_by("data_spk_pemasangan.iat DESC");
      $result = $this->db->get()->result();
       return $result;
   }

   public function getsurat($status) {
      $this->db->select("data_surat_jalan.id, data_surat_jalan.no_surat, data_spk_pemasangan.no_spk, data_surat_jalan.id_spk, data_surat_jalan.tanggal, data_surat_jalan.tipe_pajak, data_customer.nama, data_customer.telepon, data_surat_jalan.status");
      $this->db->from("data_surat_jalan");
      $this->db->join("data_customer", 'data_customer.id = data_surat_jalan.id_pelanggan');
      $this->db->join("data_spk_pemasangan", 'data_spk_pemasangan.id = data_surat_jalan.id_spk', 'left');
      if ($status == 3) $this->db->where("data_surat_jalan.status", $status);
      else $this->db->or_where('data_surat_jalan.status', '1')->or_where('data_surat_jalan.status', '2');
      $this->db->order_by("data_surat_jalan.iat DESC");
      $result = $this->db->get()->result();
       return $result;
   }

   public function getdetail($id) {
      $this->db->select("data_spk_pemasangan.id, data_spk_pemasangan.tanggal, data_spk_pemasangan.tipe_pajak, data_spk_pemasangan.no_spk, data_spk_pemasangan.id_pelanggan, data_spk_pemasangan.catatan, data_spk_pemasangan.status, data_customer.nama, data_customer.telepon, data_customer.email, data_customer.alamat");
      $this->db->from("data_spk_pemasangan");
      $this->db->join("data_customer", 'data_customer.id = data_spk_pemasangan.id_pelanggan');
      $this->db->where("data_spk_pemasangan.id", $id);
      $result = $this->db->get()->row();
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
