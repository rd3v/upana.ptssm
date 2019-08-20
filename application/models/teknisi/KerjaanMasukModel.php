<?php
defined('BASEPATH') or exit('No direct script access allowed');

class KerjaanMasukModel extends CI_Model {

   public function getspk($id_teknisi, $status) {
    if ($status == '0') {
      $pemasangan = "data_spk_pemasangan.tipe = '1' AND data_spk_pemasangan.status = '0' AND (".cari_query($id_teknisi, ['data_spk_pemasangan.id_teknisi']).")";
      $free = "data_spk_pemasangan.tipe = '0' AND data_spk_pemasangan.status = '0' AND (".cari_query($id_teknisi, ['data_spk_pemasangan.id_teknisi']).")";
      $service = "data_spk_service.status = '0' AND (".cari_query($id_teknisi, ['data_spk_service.id_teknisi']).")";
      $survey = "data_spk_survey.status = '0' AND (".cari_query($id_teknisi, ['data_spk_survey.id_teknisi']).")";
    } elseif ($status == '1') {
      $pemasangan = "data_spk_pemasangan.tipe = '1' AND data_spk_pemasangan.status = '1' AND (".cari_query($id_teknisi, ['data_spk_pemasangan.id_teknisi']).") AND data_pengerjaan_teknisi.status = '0'";
      $free = "data_spk_pemasangan.tipe = '0' AND data_spk_pemasangan.status = '1' AND (".cari_query($id_teknisi, ['data_spk_pemasangan.id_teknisi']).") AND data_pengerjaan_teknisi.status = '0'";
      $service = "data_spk_service.status = '1' AND (".cari_query($id_teknisi, ['data_spk_service.id_teknisi']).") AND data_pengerjaan_teknisi.status = '0'";
      $survey = "data_spk_survey.status = '1' AND (".cari_query($id_teknisi, ['data_spk_survey.id_teknisi']).") AND data_pengerjaan_teknisi.status = '0'";
    } elseif ($status == '2') {
      $pemasangan = "data_spk_pemasangan.tipe = '1' AND data_spk_pemasangan.status = '2' AND (".cari_query($id_teknisi, ['data_spk_pemasangan.id_teknisi']).") AND data_pengerjaan_teknisi.status = '1'";
      $free = "data_spk_pemasangan.tipe = '0' AND data_spk_pemasangan.status = '2' AND (".cari_query($id_teknisi, ['data_spk_pemasangan.id_teknisi']).") AND data_pengerjaan_teknisi.status = '1'";
      $service = "data_spk_service.status = '2' AND (".cari_query($id_teknisi, ['data_spk_service.id_teknisi']).") AND data_pengerjaan_teknisi.status = '1'";
      $survey = "data_spk_survey.status = '2' AND (".cari_query($id_teknisi, ['data_spk_survey.id_teknisi']).") AND data_pengerjaan_teknisi.status = '1'";
    }

      return $this->db->query("
          SELECT * FROM (
              SELECT data_spk_pemasangan.id, data_spk_pemasangan.iat, data_spk_pemasangan.tanggal, data_spk_pemasangan.tipe_pajak, data_spk_pemasangan.no_spk, data_spk_pemasangan.id_teknisi, 'Pemasangan' as tipe_spk, data_customer.nama, data_customer.telepon, data_spk_pemasangan.status, data_pengerjaan_teknisi.id as id_pengerjaan
              FROM data_spk_pemasangan
              JOIN data_customer ON data_customer.id = data_spk_pemasangan.id_pelanggan
              LEFT JOIN data_pengerjaan_teknisi ON data_pengerjaan_teknisi.id_spk = data_spk_pemasangan.id
              WHERE {$pemasangan}
          UNION ALL
              SELECT data_spk_pemasangan.id, data_spk_pemasangan.iat, data_spk_pemasangan.tanggal, data_spk_pemasangan.tipe_pajak, data_spk_pemasangan.no_spk, data_spk_pemasangan.id_teknisi, 'Free' as tipe_spk, data_customer.nama, data_customer.telepon, data_spk_pemasangan.status, data_pengerjaan_teknisi.id as id_pengerjaan
              FROM data_spk_pemasangan
              JOIN data_customer ON data_customer.id = data_spk_pemasangan.id_pelanggan
              LEFT JOIN data_pengerjaan_teknisi ON data_pengerjaan_teknisi.id_spk = data_spk_pemasangan.id
              WHERE {$free}
          UNION ALL
              SELECT data_spk_service.id, data_spk_service.tanggal, data_spk_service.iat, data_spk_service.tipe_pajak, data_spk_service.no_spk, data_spk_service.id_teknisi, 'Service' as tipe_spk, data_customer.nama, data_customer.telepon, data_spk_service.status, data_pengerjaan_teknisi.id as id_pengerjaan
              FROM data_spk_service
              JOIN data_customer ON data_customer.id = data_spk_service.id_pelanggan
              LEFT JOIN data_pengerjaan_teknisi ON data_pengerjaan_teknisi.id_spk = data_spk_service.id
              WHERE {$service}
          UNION ALL
              SELECT data_spk_survey.id, data_spk_survey.tanggal, data_spk_survey.iat, data_spk_survey.tipe_pajak, data_spk_survey.no_spk, data_spk_survey.id_teknisi, 'Survey' as tipe_spk, data_customer.nama, data_customer.telepon, data_spk_survey.status, data_pengerjaan_teknisi.id as id_pengerjaan
              FROM data_spk_survey
              JOIN data_customer ON data_customer.id = data_spk_survey.id_pelanggan
              LEFT JOIN data_pengerjaan_teknisi ON data_pengerjaan_teknisi.id_spk = data_spk_survey.id
              WHERE {$survey}
          ) data_spk_pemasangan
          ORDER BY iat DESC
      ")->result();
   }

   public function getdetail($tipe_spk, $id) {
      $this->db->select("data_spk_{$tipe_spk}.id, data_spk_{$tipe_spk}.tanggal, data_spk_{$tipe_spk}.tipe_pajak, data_spk_{$tipe_spk}.no_spk, data_spk_{$tipe_spk}.id_pelanggan, data_spk_{$tipe_spk}.catatan, data_spk_{$tipe_spk}.status, data_customer.nama, data_customer.telepon, data_customer.email, data_customer.alamat, data_customer.lat, data_customer.lon");
      $this->db->from("data_spk_{$tipe_spk}");
      $this->db->join("data_customer", "data_customer.id = data_spk_{$tipe_spk}.id_pelanggan");
      $this->db->where("data_spk_{$tipe_spk}.id", $id);
      $result = $this->db->get()->row();
       return $result;
   }

   public function getmaterial($id) {
      $this->db->select("data_pengeluaran_material_item.*, master_stock.nama, master_stock.satuan");
      $this->db->from("data_pengeluaran_material_item");
      $this->db->join("master_stock", 'master_stock.id = data_pengeluaran_material_item.id_stock');
      $this->db->where("data_pengeluaran_material_item.id_pengeluaran_material", $id);
      $this->db->order_by("iat ASC");
      $result = $this->db->get()->result();
      return $result;
   }

   public function getitem($id) {
      $this->db->select("data_pengerjaan_teknisi_item.*, master_stock.nama, master_stock.satuan");
      $this->db->from("data_pengerjaan_teknisi_item");
      $this->db->join("master_stock", 'master_stock.id = data_pengerjaan_teknisi_item.id_stock');
      $this->db->where("data_pengerjaan_teknisi_item.id_teknisi", $id);
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
