<?php
defined('BASEPATH') or exit('No direct script access allowed');

class PelangganModel extends CI_Model {

   public function getdatakepuasan() {
      return $this->db->query("
          SELECT * FROM (
              SELECT data_spk_pemasangan.id, data_spk_pemasangan.iat, data_spk_pemasangan.tanggal, data_spk_pemasangan.tipe_pajak, data_spk_pemasangan.no_spk, data_spk_pemasangan.id_teknisi, 'Pemasangan' as tipe_spk, data_customer.nama, data_customer.telepon, data_spk_pemasangan.status, data_spk_pemasangan.kepuasan
              FROM data_spk_pemasangan
              JOIN data_customer ON data_customer.id = data_spk_pemasangan.id_pelanggan
              WHERE data_spk_pemasangan.tipe = '1'
          UNION ALL
              SELECT data_spk_pemasangan.id, data_spk_pemasangan.iat, data_spk_pemasangan.tanggal, data_spk_pemasangan.tipe_pajak, data_spk_pemasangan.no_spk, data_spk_pemasangan.id_teknisi, 'Free' as tipe_spk, data_customer.nama, data_customer.telepon, data_spk_pemasangan.status, data_spk_pemasangan.kepuasan
              FROM data_spk_pemasangan
              JOIN data_customer ON data_customer.id = data_spk_pemasangan.id_pelanggan
              WHERE data_spk_pemasangan.tipe = '0'
          UNION ALL
              SELECT data_spk_service.id, data_spk_service.tanggal, data_spk_service.iat, data_spk_service.tipe_pajak, data_spk_service.no_spk, data_spk_service.id_teknisi, 'Service' as tipe_spk, data_customer.nama, data_customer.telepon, data_spk_service.status, data_spk_service.kepuasan
              FROM data_spk_service
              JOIN data_customer ON data_customer.id = data_spk_service.id_pelanggan
          ) data_spk_pemasangan
          ORDER BY iat DESC
      ")->result();
   }
}
