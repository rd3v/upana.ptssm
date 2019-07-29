<?php
defined('BASEPATH') or exit('No direct script access allowed');

class PenugasanModel extends CI_Model {

   public function getdata($status) {
    if ($status == 0) {
      $pemasangan = "data_spk_pemasangan.tipe = '1' AND data_spk_pemasangan.id_teknisi = '' AND data_spk_pemasangan.status != '3'";
      $free = "data_spk_pemasangan.tipe = '0' AND data_spk_pemasangan.id_teknisi = '' AND data_spk_pemasangan.status != '3'";
      $service = "data_spk_service.id_teknisi = '' AND data_spk_service.status != '3'";
    } elseif ($status == 1) {
      $pemasangan = "data_spk_pemasangan.tipe = '1' AND data_spk_pemasangan.id_teknisi != '' AND data_spk_pemasangan.status != '3'";
      $free = "data_spk_pemasangan.tipe = '0' AND data_spk_pemasangan.id_teknisi != '' AND data_spk_pemasangan.status != '3'";
      $service = "data_spk_service.id_teknisi != '' AND data_spk_service.status != '3'";
    } else {
      $pemasangan = "data_spk_pemasangan.tipe = '1' AND data_spk_pemasangan.status = '3'";
      $free = "data_spk_pemasangan.tipe = '0' AND data_spk_pemasangan.status = '3'";
      $service = "data_spk_service.status = '3'";
    }

      return $this->db->query("
          SELECT * FROM (
              SELECT data_spk_pemasangan.id, data_spk_pemasangan.iat, data_spk_pemasangan.tanggal, data_spk_pemasangan.tipe_pajak, data_spk_pemasangan.no_spk, data_spk_pemasangan.id_teknisi, 'Pemasangan' as tipe_spk, data_customer.nama, data_customer.telepon, data_spk_pemasangan.status
              FROM data_spk_pemasangan
              JOIN data_customer ON data_customer.id = data_spk_pemasangan.id_pelanggan
              WHERE $pemasangan
          UNION ALL
              SELECT data_spk_pemasangan.id, data_spk_pemasangan.iat, data_spk_pemasangan.tanggal, data_spk_pemasangan.tipe_pajak, data_spk_pemasangan.no_spk, data_spk_pemasangan.id_teknisi, 'Free' as tipe_spk, data_customer.nama, data_customer.telepon, data_spk_pemasangan.status
              FROM data_spk_pemasangan
              JOIN data_customer ON data_customer.id = data_spk_pemasangan.id_pelanggan
              WHERE $free
          UNION ALL
              SELECT data_spk_service.id, data_spk_service.tanggal, data_spk_service.iat, data_spk_service.tipe_pajak, data_spk_service.no_spk, data_spk_service.id_teknisi, 'Service' as tipe_spk, data_customer.nama, data_customer.telepon, data_spk_service.status
              FROM data_spk_service
              JOIN data_customer ON data_customer.id = data_spk_service.id_pelanggan
              WHERE $service
          ) data_spk_pemasangan
          ORDER BY iat DESC
      ")->result();

      // return $this->db->query("
      //     SELECT * FROM (
      //         SELECT data_spk_pemasangan.id, data_spk_pemasangan.iat, data_spk_pemasangan.tanggal, data_spk_pemasangan.tipe_pajak, data_spk_pemasangan.no_spk, data_spk_pemasangan.id_teknisi, 'Pemasangan' as tipe_spk, data_customer.nama, data_customer.telepon, data_spk_pemasangan.status, users.name as teknisi
      //         FROM data_spk_pemasangan
      //         JOIN data_customer ON data_customer.id = data_spk_pemasangan.id_pelanggan
      //         LEFT JOIN users ON users.id = data_spk_pemasangan.id_teknisi
      //         WHERE $pemasangan
      //     UNION ALL
      //         SELECT data_spk_pemasangan.id, data_spk_pemasangan.iat, data_spk_pemasangan.tanggal, data_spk_pemasangan.tipe_pajak, data_spk_pemasangan.no_spk, data_spk_pemasangan.id_teknisi, 'Free' as tipe_spk, data_customer.nama, data_customer.telepon, data_spk_pemasangan.status, users.name as teknisi
      //         FROM data_spk_pemasangan
      //         JOIN data_customer ON data_customer.id = data_spk_pemasangan.id_pelanggan
      //         LEFT JOIN users ON users.id = data_spk_pemasangan.id_teknisi
      //         WHERE $free
      //     UNION ALL
      //         SELECT data_spk_service.id, data_spk_service.tanggal, data_spk_service.iat, data_spk_service.tipe_pajak, data_spk_service.no_spk, data_spk_service.id_teknisi, 'Service' as tipe_spk, data_customer.nama, data_customer.telepon, data_spk_service.status, users.name as teknisi
      //         FROM data_spk_service
      //         JOIN data_customer ON data_customer.id = data_spk_service.id_pelanggan
      //         LEFT JOIN users ON users.id = data_spk_service.id_teknisi
      //         WHERE $service
      //     ) data_spk_pemasangan
      //     ORDER BY iat DESC
      // ")->result();
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
