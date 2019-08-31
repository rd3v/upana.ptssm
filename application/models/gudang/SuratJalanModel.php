<?php
defined('BASEPATH') or exit('No direct script access allowed');

class SuratJalanModel extends CI_Model {

   public function getspk($status, $where, $order_by = NULL, $perpage = NULL, $offset = NULL) {
    if ($status == '0') {
      $pemasangan = "data_spk_pemasangan.id_surat_jalan = ''";
      $nonspk = "data_surat_jalan.id = ''";
    } elseif ($status == '1') {
      $pemasangan = "data_spk_pemasangan.id_surat_jalan != '' AND data_surat_jalan.status = '1'";
      $nonspk = "data_surat_jalan.id_spk = '0' AND data_surat_jalan.status = '1'";
    } elseif ($status == '2') {
      $pemasangan = "data_spk_pemasangan.id_surat_jalan != '' AND data_surat_jalan.status = '0'";
      $nonspk = "data_surat_jalan.id_spk = '0' AND data_surat_jalan.status = '0'";
    }

      return $this->db->query("
          SELECT * FROM (
              SELECT data_spk_pemasangan.id, data_spk_pemasangan.iat, data_spk_pemasangan.tanggal, data_spk_pemasangan.tipe_pajak, data_spk_pemasangan.no_spk, data_surat_jalan.no_surat, data_customer.nama, data_customer.telepon, data_spk_pemasangan.status, data_spk_pemasangan.id_surat_jalan
              FROM data_spk_pemasangan
              JOIN data_customer ON data_customer.id = data_spk_pemasangan.id_pelanggan
              LEFT JOIN data_surat_jalan ON data_surat_jalan.id = data_spk_pemasangan.id_surat_jalan
              WHERE {$pemasangan}{$where}
          UNION ALL
              SELECT data_surat_jalan.id, data_surat_jalan.iat, data_surat_jalan.tanggal, data_surat_jalan.tipe_pajak, '' as no_spk, data_surat_jalan.no_surat, data_customer.nama, data_customer.telepon, data_surat_jalan.status, data_surat_jalan.id as id_surat_jalan
              FROM data_surat_jalan
              JOIN data_customer ON data_customer.id = data_surat_jalan.id_pelanggan
              WHERE {$nonspk}{$where}
          ) data_spk_pemasangan
          ".($order_by ? "ORDER BY $order_by" : "")."
          ".($perpage ? "LIMIT $offset, $perpage" : "")."
      ");
   }

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
