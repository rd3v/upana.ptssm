<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Surat_jalan extends MY_Controller {

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

        $content['data'] = [
            'new_id'    => acak_id('data_surat_jalan', 'id')
        ];

        $footer['data'] = [
            "route" => $this->getRoute()
        ];

        $this->load->view('header_menu2',$this->header);
        $this->load->view('gudang/surat-jalan/main',$content);
        $this->load->view('footer2',$footer);
    }

    public function lists($status) {
        $this->load->model('gudang/SuratJalanModel');

        $generalSearch = $this->input->post('query[generalSearch]');

        $where = '';
        if ($generalSearch) $where = ' AND ('.cari_query($generalSearch, ['data_surat_jalan.catatan']).')';

        $total = $this->SuratJalanModel->getspk($status, $where)->num_rows();

        $page = $this->input->post('pagination[page]') ? (int) $this->input->post('pagination[page]') : 1;
        $perpage = $this->input->post('pagination[perpage]') ? (int) $this->input->post('pagination[perpage]') : 10;
        $pages = ceil($total / $perpage);
        $offset = (($page - 1) * $perpage);
        $field = $this->input->post('sort[field]') ? $this->input->post('sort[field]') : 'iat';
        $sort = $this->input->post('sort[sort]') ? $this->input->post('sort[sort]') : 'desc';

        $meta = array('page' => $page, 'pages' => $pages, 'perpage' => $perpage, 'total' => $total, 'sort' => $sort, 'field' => $field);

        $data = $this->SuratJalanModel->getspk($status, $where, $field.' '.$sort, $perpage, $offset)->result();

        $this->sendResponse(['success' => TRUE, 'meta' => $meta, 'data' => $data]);
    }

    public function proses($id) {
        $this->load->model('gudang/SuratJalanModel');

        $content['data'] = [
            'data'  => $this->SuratJalanModel->getdetail($id),
            'item'  => $this->crud->gw('data_spk_pemasangan_item', ['id_spk' => $id])
        ];

        $footer['data'] = [
            "route" => $this->getRoute()
        ];

        $this->load->view('header_menu2',$this->header);
        $this->load->view('gudang/surat-jalan/proses',$content);
        $this->load->view('footer2',$footer);
    }

    public function tambah() {
        $this->load->model('kantor/CustomerModel');
        $this->load->model("kantor/MasterStockModel");

        $content['data'] = [
            'customer'  => $this->CustomerModel->getdata(),
            'stock'     => $this->MasterStockModel->getdata('unit'),
            'item'      => $this->crud->gw('data_spk_pemasangan_item', ['id_surat' => $this->input->get('id', TRUE)])
        ];

        $footer['data'] = [
            "route" => $this->getRoute()
        ];

        $this->load->view('header_menu2',$this->header);
        $this->load->view('gudang/surat-jalan/tambah',$content);
        $this->load->view('footer2',$footer);
    }

    public function edit($id) {
        $data = $this->crud->gd('data_surat_jalan', ['id' => $id]);

        if ($data) {
            $this->load->model('kantor/CustomerModel');
            $this->load->model("kantor/MasterStockModel");

            $content['data'] = [
                'data'      => $data,
                'customer'  => $this->CustomerModel->getdata(),
                'stock'     => $this->MasterStockModel->getdata('unit'),
                'item'      => $this->crud->gw('data_spk_pemasangan_item', ($data->id_spk ? ['id_spk' => $data->id_spk] : ['id_surat' => $id]))
            ];

            $footer['data'] = [
                "route" => $this->getRoute()
            ];

            $this->load->view('header_menu2',$this->header);
            $this->load->view('gudang/surat-jalan/edit',$content);
            $this->load->view('footer2',$footer);
        }
    }

    public function rincian($id) {
        $data = $this->crud->gd('data_surat_jalan', ['id' => $id]);

        if ($data) {
            $content['data'] = [
                'data'      => $data,
                'customer'  => $this->crud->gd('data_customer', ['id' => $data->id_pelanggan]),
                'item'      => $this->crud->gw('data_spk_pemasangan_item', ($data->id_spk ? ['id_spk' => $data->id_spk] : ['id_surat' => $id]))
            ];

            $footer['data'] = [
                "route" => $this->getRoute()
            ];

            $this->load->view('header_menu2',$this->header);
            $this->load->view('gudang/surat-jalan/rincian',$content);
            $this->load->view('footer2',$footer);
        }
    }

    public function cetak($id) {
        $data = $this->crud->gd('data_surat_jalan', ['id' => $id]);

        if ($data) {
            $content['data'] = [
                'data'      => $data,
                'customer'  => $this->crud->gd('data_customer', ['id' => $data->id_pelanggan]),
                'item'      => $this->crud->gw('data_spk_pemasangan_item', ($data->id_spk ? ['id_spk' => $data->id_spk] : ['id_surat' => $id]))
            ];

            $footer['data'] = [
                "route" => $this->getRoute()
            ];

            $this->load->view('gudang/surat-jalan/print',$content);
        }
    }

    public function submit_item() {
        $valid = $this->form_validation;
        $valid->set_error_delimiters('', '');
        $valid->set_rules('id_surat', 'ID Surat Jalan', 'required|trim');
        $valid->set_rules('id_stock', 'ID Stock Barang', 'required|trim');
        $valid->set_rules('jumlah', 'Jumlah Barang', 'required|trim');

        if ($valid->run() === FALSE) {
            return $this->sendResponse([
                'success'   => FALSE,
                'error'     => array(
                    'id_surat'  => form_error('id_surat'),
                    'id_stock'  => form_error('id_stock'),
                    'jumlah'    => form_error('jumlah')
                )
            ]);
        } else {
            $input = $this->input->post(NULL, TRUE);

            if (!$input['id']) {
                $insert = array(
                    'tipe'      => '0',
                    'id_surat'  => $input['id_surat'],
                    'id_stock'  => $input['id_stock'],
                    'jumlah'    => $input['jumlah']
                );

                $this->crud->i('data_spk_pemasangan_item', $insert);

                $insert['id'] = $this->db->insert_id();
                $stock = $this->crud->gd('master_stock', ['id' => $input['id_stock']]);
                $insert['kode'] = $stock->kode;
                $insert['nama'] = $stock->nama;

                return $this->sendResponse([
                    'success'   => TRUE,
                    'add'       => TRUE,
                    'data'      => $insert,
                    'serial'    => $this->crud->gw('data_invoice_masuk_list_barang_serial', ['id_stock' => $input['id_stock']])
                ]);
            } else {
                $data = $this->crud->gd('data_spk_pemasangan_item', ['id' => $input['id']]);

                if ($data) {
                    $update = array(
                        'id_surat'  => $input['id_surat'],
                        'id_stock'  => $input['id_stock'],
                        'jumlah'    => $input['jumlah']
                    );

                    $this->crud->u('data_spk_pemasangan_item', $update, ['id' => $input['id']]);

                    $update['id'] = $input['id'];

                    return $this->sendResponse([
                        'success'   => TRUE,
                        'add'       => FALSE
                    ]);
                } else {
                    return $this->sendResponse([
                        'success'   => FALSE
                    ]);
                }
            }
        }
    }

    public function delete_item() {
        $input = $this->input->post(NULL, TRUE);
        $where = array('id' => $input['id']);
        $data = $this->crud->gd('data_spk_pemasangan_item', $where);

        if ($data) {
            $this->crud->d('data_spk_pemasangan_item', $where);

            return $this->sendResponse(['success' => TRUE]);
        }

        return $this->sendResponse(['success' => FALSE]);
    }

    public function submit_form() {
        $valid = $this->form_validation;
        $valid->set_error_delimiters('', '');
        $valid->set_rules('no_surat', 'Nomor Surat', 'required|trim');
        $valid->set_rules('id_spk', 'ID SPK Pemasangan', 'required|trim');
        $valid->set_rules('tipe_pajak', 'Tipe Pajak', 'required|trim');
        $valid->set_rules('tanggal', 'Tanggal', 'required|trim');
        $valid->set_rules('id_pelanggan', 'Nama Pelanggan', 'required|trim');
        $valid->set_rules('kendaraan', 'Jenis Kendaraan', 'required|trim');
        $valid->set_rules('nopol', 'Plat Nomor', 'required|trim');
        $valid->set_rules('catatan', 'Catatan', 'trim');
        $valid->set_rules('status', 'Status', 'required|trim');
        $valid->set_rules('item', 'Serial Number', 'required|trim');

        if ($valid->run() === FALSE) {
            return $this->sendResponse([
                'success'   => FALSE,
                'error'     => array(
                    'no_surat'      => form_error('no_surat'),
                    'tipe_pajak'    => form_error('tipe_pajak'),
                    'tanggal'       => form_error('tanggal'),
                    'id_pelanggan'  => form_error('id_pelanggan'),
                    'kendaraan'     => form_error('kendaraan'),
                    'nopol'         => form_error('nopol'),
                    'catatan'       => form_error('catatan'),
                    'status'        => form_error('status')
                )
            ]);
        } else {
            $input = $this->input->post(NULL, TRUE);

            if ($input['action'] == 'add') {
                $insert = array(
                    'id'            => $input['id'],
                    'no_surat'      => $input['no_surat'],
                    'id_spk'        => $input['id_spk'],
                    'tipe_pajak'    => $input['tipe_pajak'],
                    'tanggal'       => $input['tanggal'],
                    'id_pelanggan'  => $input['id_pelanggan'],
                    'kendaraan'     => $input['kendaraan'],
                    'nopol'         => $input['nopol'],
                    'catatan'       => $input['catatan'],
                    'status'        => $input['status'],
                    'id_serial'     => $input['item'],
                    'iat'           => date('Y-m-d H:i:s')
                );

                $this->crud->i('data_surat_jalan', $insert);

                if ($input['id_spk']) $this->crud->u('data_spk_pemasangan', ['id_surat_jalan' => $insert['id']], ['id' => $input['id_spk']]);

                return $this->sendResponse([
                    'success'   => TRUE,
                    'add'       => TRUE
                ]);
            } else {
                $data = $this->crud->gd('data_surat_jalan', ['id' => $input['id']]);

                if ($data) {
                    $update = array(
                        'no_surat'      => $input['no_surat'],
                        'id_spk'        => $input['id_spk'],
                        'tipe_pajak'    => $input['tipe_pajak'],
                        'tanggal'       => $input['tanggal'],
                        'id_pelanggan'  => $input['id_pelanggan'],
                        'kendaraan'     => $input['kendaraan'],
                        'nopol'         => $input['nopol'],
                        'catatan'       => $input['catatan'],
                        'status'        => $input['status'],
                        'id_serial'     => $input['item']
                    );

                    $this->crud->u('data_surat_jalan', $update, ['id' => $input['id']]);

                    if ($input['id_spk']) $this->crud->u('data_spk_pemasangan', ['id_surat_jalan' => $input['id']], ['id' => $input['id_spk']]);

                    return $this->sendResponse([
                        'success'   => TRUE,
                        'add'       => FALSE
                    ]);
                } else {
                    return $this->sendResponse([
                        'success'   => FALSE
                    ]);
                }
            }
        }
    }
}
