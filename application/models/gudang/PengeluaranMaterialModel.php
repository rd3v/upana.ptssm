<?php
defined('BASEPATH') or exit('No direct script access allowed');

class PengeluaranMaterialModel extends CI_Model {

   public function getspk($status, $where, $order_by = NULL, $perpage = NULL, $offset = NULL) {
    if ($status == '0') {
      $pemasangan = "data_spk_pemasangan.tipe = '1' AND data_spk_pemasangan.id_pengeluaran_material = ''";
      $free = "data_spk_pemasangan.tipe = '0' AND data_spk_pemasangan.id_pengeluaran_material = ''";
      $service = "data_spk_service.id_pengeluaran_material = ''";
      $survey = "data_spk_survey.id_pengeluaran_material = ''";
    } elseif ($status == '1') {
      $pemasangan = "data_spk_pemasangan.tipe = '1' AND data_spk_pemasangan.id_pengeluaran_material != '' AND data_pengeluaran_material.status = '1'";
      $free = "data_spk_pemasangan.tipe = '0' AND data_spk_pemasangan.id_pengeluaran_material != '' AND data_pengeluaran_material.status = '1'";
      $service = "data_spk_service.id_pengeluaran_material != '' AND data_pengeluaran_material.status = '1'";
      $survey = "data_spk_survey.id_pengeluaran_material != '' AND data_pengeluaran_material.status = '1'";
    } elseif ($status == '2') {
      $pemasangan = "data_spk_pemasangan.tipe = '1' AND data_spk_pemasangan.id_pengeluaran_material != '' AND data_pengeluaran_material.status = '0'";
      $free = "data_spk_pemasangan.tipe = '0' AND data_spk_pemasangan.id_pengeluaran_material != '' AND data_pengeluaran_material.status = '0'";
      $service = "data_spk_service.id_pengeluaran_material != '' AND data_pengeluaran_material.status = '0'";
      $survey = "data_spk_survey.id_pengeluaran_material != '' AND data_pengeluaran_material.status = '0'";
    }

      return $this->db->query("
          SELECT * FROM (
              SELECT data_spk_pemasangan.id, data_spk_pemasangan.iat, data_spk_pemasangan.tanggal, data_spk_pemasangan.tipe_pajak, data_spk_pemasangan.no_spk, data_spk_pemasangan.id_teknisi, 'Pemasangan' as tipe_spk, data_customer.nama, data_customer.telepon, data_spk_pemasangan.status, data_spk_pemasangan.id_pengeluaran_material
              FROM data_spk_pemasangan
              JOIN data_customer ON data_customer.id = data_spk_pemasangan.id_pelanggan
              LEFT JOIN data_pengeluaran_material ON data_pengeluaran_material.id = data_spk_pemasangan.id_pengeluaran_material
              WHERE {$pemasangan}{$where}
          UNION ALL
              SELECT data_spk_pemasangan.id, data_spk_pemasangan.iat, data_spk_pemasangan.tanggal, data_spk_pemasangan.tipe_pajak, data_spk_pemasangan.no_spk, data_spk_pemasangan.id_teknisi, 'Free' as tipe_spk, data_customer.nama, data_customer.telepon, data_spk_pemasangan.status, data_spk_pemasangan.id_pengeluaran_material
              FROM data_spk_pemasangan
              JOIN data_customer ON data_customer.id = data_spk_pemasangan.id_pelanggan
              LEFT JOIN data_pengeluaran_material ON data_pengeluaran_material.id = data_spk_pemasangan.id_pengeluaran_material
              WHERE {$free}{$where}
          UNION ALL
              SELECT data_spk_service.id, data_spk_service.tanggal, data_spk_service.iat, data_spk_service.tipe_pajak, data_spk_service.no_spk, data_spk_service.id_teknisi, 'Service' as tipe_spk, data_customer.nama, data_customer.telepon, data_spk_service.status, data_spk_service.id_pengeluaran_material
              FROM data_spk_service
              JOIN data_customer ON data_customer.id = data_spk_service.id_pelanggan
              LEFT JOIN data_pengeluaran_material ON data_pengeluaran_material.id = data_spk_service.id_pengeluaran_material
              WHERE {$service}{$where}
          UNION ALL
              SELECT data_spk_survey.id, data_spk_survey.tanggal, data_spk_survey.iat, data_spk_survey.tipe_pajak, data_spk_survey.no_spk, data_spk_survey.id_teknisi, 'Survey' as tipe_spk, data_customer.nama, data_customer.telepon, data_spk_survey.status, data_spk_survey.id_pengeluaran_material
              FROM data_spk_survey
              JOIN data_customer ON data_customer.id = data_spk_survey.id_pelanggan
              LEFT JOIN data_pengeluaran_material ON data_pengeluaran_material.id = data_spk_survey.id_pengeluaran_material
              WHERE {$survey}{$where}
          ) data_spk_pemasangan
          ".($order_by ? "ORDER BY $order_by" : "")."
          ".($perpage ? "LIMIT $offset, $perpage" : "")."
      ");
   }

   public function getproses($tipe_spk, $id) {
      $this->db->select("data_spk_{$tipe_spk}.id, data_spk_{$tipe_spk}.tanggal, data_spk_{$tipe_spk}.tipe_pajak, data_spk_{$tipe_spk}.no_spk, data_spk_{$tipe_spk}.id_pelanggan, data_spk_{$tipe_spk}.catatan, data_spk_{$tipe_spk}.status, data_customer.nama, data_customer.telepon, data_customer.email, data_customer.alamat");
      $this->db->from("data_spk_{$tipe_spk}");
      $this->db->join("data_customer", "data_customer.id = data_spk_{$tipe_spk}.id_pelanggan");
      $this->db->where("data_spk_{$tipe_spk}.id", $id);
      $result = $this->db->get()->row();
       return $result;
   }

   public function getitem($id) {
      $this->db->select("data_pengeluaran_material_item.*, master_stock.nama, master_stock.satuan");
      $this->db->from("data_pengeluaran_material_item");
      $this->db->join("master_stock", 'master_stock.id = data_pengeluaran_material_item.id_stock');
      $this->db->where("data_pengeluaran_material_item.id_pengeluaran_material", $id);
      $this->db->order_by("iat ASC");
      $result = $this->db->get()->result();
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
