<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pemasangan extends MY_Controller {

    private $header = [];

    public function __construct() {
		parent::__construct();
		$this->load->library('session');
        $this->load->helper('url');
        if($this->session->userdata('id') == null) {
            redirect(base_url()."login",'refresh');
        }
        $this->header['data'] = [
            "user" => [
                "id" => $this->session->userdata('id'),
                "name" => $this->session->userdata('name'),
                "email" => $this->session->userdata('email'),
                "accesstype" => $this->session->userdata('accesstype')
            ]
        ];
    }

    public function index() {

    }

    public function sebelum($id_spk) {
        // $this->load->model('teknisi/KerjaanMasukModel');
        $data = $this->crud->gd('data_pengerjaan_teknisi', ['tipe_spk' => 'pemasangan', 'id_spk' => $id_spk]);

        if ($data) {
            $content['data'] = [
                'id_spk'    => $id_spk,
                'data'      => $data,
                // 'item'      => $this->crud->gw('data_spk_pemasangan_item', ['id_spk' => $id_spk]),
                'item'      => $this->crud->gw('data_pengerjaan_teknisi_item', ['id_pengerjaan' => $data->id])
            ];

            $footer['data'] = [
                "route" => $this->getRoute()
            ];

            $this->load->view('teknisi/header_menu',$this->header);
            $this->load->view('teknisi/pemasangan/sebelum',$content);
            $this->load->view('teknisi/footer',$footer);
        }
    }

    public function sesudah($id_spk) {
        // $this->load->model('teknisi/KerjaanMasukModel');
        $data = $this->crud->gd('data_pengerjaan_teknisi', ['tipe_spk' => 'pemasangan', 'id_spk' => $id_spk]);

        if ($data) {
            $content['data'] = [
                'id_spk'    => $id_spk,
                'data'      => $data,
                // 'item'      => $this->crud->gw('data_spk_pemasangan_item', ['id_spk' => $id_spk]),
                'item'      => $this->crud->gw('data_pengerjaan_teknisi_item', ['id_pengerjaan' => $data->id, 'foto_sesudah !=' => ''])
            ];

            $footer['data'] = [
                "route" => $this->getRoute()
            ];

            $this->load->view('teknisi/header_menu',$this->header);
            $this->load->view('teknisi/pemasangan/sesudah',$content);
            $this->load->view('teknisi/footer',$footer);
        }
    }

    public function tambah_item($kondisi, $id) {
        $data = $this->crud->gd('data_pengerjaan_teknisi', ['id' => $id]);

        if ($data) {
            $valid = $this->form_validation;
            $valid->set_error_delimiters('<i style="color: red;">', '</i>');
            $valid->set_rules('nama', 'Nama Item', 'required|trim|strip_tags',
                              array('required' => 'Wajib diisi.'));
            $valid->set_rules('keterangan_'.$kondisi, 'Keterangan', 'required|trim|strip_tags',
                              array('required' => 'Wajib diisi.'));

            $content['data'] = [
                'kondisi'   => $kondisi,
                'data'      => $data,
                'item'      => $this->crud->gwo('data_pengerjaan_teknisi_item', ['id_pengerjaan' => $data->id, 'foto_sesudah' => ''], 'iat ASC')
            ];

            if ($valid->run() === FALSE) {
                $this->load->view('teknisi/pemasangan/tambah-item', $content);
            } else {
                $photo = upload_image('foto', 'tambah', 'pengerjaan/item', '', $content, TRUE, 'teknisi/pemasangan/tambah-item');

                // Masuk ke database
                if ($photo !== FALSE) {
                    $input = $this->input->post(NULL, TRUE); // sanitasi data inputan

                    if ($kondisi == 'sebelum') {
                        $insert = array(
                            'id'                    => acak_id('data_pengerjaan_teknisi_item', 'id')['id'],
                            'id_pengerjaan'         => $id,
                            'nama'                  => $input['nama'],
                            'foto_'.$kondisi        => $photo,
                            'keterangan_'.$kondisi  => $input['keterangan_'.$kondisi],
                            'iat'                   => date('Y-m-d H:i:s')
                        );

                        $this->crud->i('data_pengerjaan_teknisi_item', $insert);
                    } elseif ($kondisi == 'sesudah') {
                        $update = array(
                            'foto_'.$kondisi        => $photo,
                            'keterangan_'.$kondisi  => $input['keterangan_'.$kondisi]
                        );

                        $this->crud->u('data_pengerjaan_teknisi_item', $update, ['id' => $input['nama']]);
                    }

                    redirect(site_url('teknisi/pemasangan/'.$kondisi.'/'.$data->id_spk));
                }
            }
        }
    }

    public function delete_item() {
        $input = $this->input->post(NULL, TRUE);
        $where = array('id' => $input['id']);
        $data = $this->crud->gd('data_pengerjaan_teknisi_item', $where);

        if ($data) {
            if ($data->foto_sebelum != '' AND file_exists(upload_path('pengerjaan/item').$data->foto_sebelum)) unlink(upload_path('pengerjaan/item').$data->foto_sebelum);
            if ($data->foto_sebelum != '' AND file_exists(upload_path('pengerjaan/item/thumbs').$data->foto_sebelum)) unlink(upload_path('pengerjaan/item/thumbs').$data->foto_sebelum);
            if ($data->foto_sesudah != '' AND file_exists(upload_path('pengerjaan/item').$data->foto_sesudah)) unlink(upload_path('pengerjaan/item').$data->foto_sesudah);
            if ($data->foto_sesudah != '' AND file_exists(upload_path('pengerjaan/item/thumbs').$data->foto_sesudah)) unlink(upload_path('pengerjaan/item/thumbs').$data->foto_sesudah);
            $this->crud->d('data_pengerjaan_teknisi_item', $where);

            return $this->sendResponse(['success' => TRUE, 'id' => $input['id']]);
        }

        return $this->sendResponse(['success' => FALSE]);
    }
}
