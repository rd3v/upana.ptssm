<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengeluaran_material extends MY_Controller {

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

        $content['data'] = [];

        $footer['data'] = [
            "route" => $this->getRoute()
        ];

        $this->load->view('master/header_menu2',$this->header);
        $this->load->view('master/gudang/pengeluaran-material/main',$content);
        $this->load->view('master/footer2',$footer);
    }

    public function lists($status) {
        $this->load->model('gudang/PengeluaranMaterialModel');

        $generalSearch = $this->input->post('query[generalSearch]');

        $where = '';
        if ($generalSearch) $where = ' AND ('.cari_query($generalSearch, ['data_pengeluaran_material.catatan']).')';

        $total = $this->PengeluaranMaterialModel->getspk($status, $where)->num_rows();

        $page = $this->input->post('pagination[page]') ? (int) $this->input->post('pagination[page]') : 1;
        $perpage = $this->input->post('pagination[perpage]') ? (int) $this->input->post('pagination[perpage]') : 10;
        $pages = ceil($total / $perpage);
        $offset = (($page - 1) * $perpage);
        $field = $this->input->post('sort[field]') ? $this->input->post('sort[field]') : 'iat';
        $sort = $this->input->post('sort[sort]') ? $this->input->post('sort[sort]') : 'desc';

        $meta = array('page' => $page, 'pages' => $pages, 'perpage' => $perpage, 'total' => $total, 'sort' => $sort, 'field' => $field);

        $data = $this->PengeluaranMaterialModel->getspk($status, $where, $field.' '.$sort, $perpage, $offset)->result();

        $this->sendResponse(['success' => TRUE, 'meta' => $meta, 'data' => $data]);
    }

    public function proses($tipe_spk, $id_spk, $id = '') {
        if (!$id) {
            $id = acak_id('data_pengeluaran_material', 'id')['id'];
            redirect(site_url('gudang/pengeluaran-material/proses/'.$tipe_spk.'/'.$id_spk.'/'.$id), 'refresh');
            return;
        }

        $this->load->model('gudang/PengeluaranMaterialModel');

        $content['data'] = [
            'tipe_spk'  => $tipe_spk,
            'id_spk'    => $id_spk,
            'id'        => $id,
            'data'      => $this->PengeluaranMaterialModel->getproses($tipe_spk, $id_spk),
            'material'  => $this->crud->gwo('master_stock', ['kategori' => 'material'], 'nama ASC')
        ];

        $footer['data'] = [
            "route" => $this->getRoute()
        ];

        $this->load->view('master/header_menu2',$this->header);
        $this->load->view('master/gudang/pengeluaran-material/proses',$content);
        $this->load->view('master/footer2',$footer);
    }

    public function edit($id) {
        $this->load->model('gudang/PengeluaranMaterialModel');
        $data = $this->crud->gd('data_pengeluaran_material', ['id' => $id]);

        if ($data) {
            $content['data'] = [
                'tipe_spk'  => $data->tipe_spk,
                'id_spk'    => $data->id_spk,
                'id'        => $id,
                'data'      => $this->PengeluaranMaterialModel->getproses($data->tipe_spk, $data->id_spk),
                'data2'     => $data,
                'material'  => $this->crud->gwo('master_stock', ['kategori' => 'material'], 'nama ASC')
            ];

            $footer['data'] = [
                "route" => $this->getRoute()
            ];

            $this->load->view('master/header_menu2',$this->header);
            $this->load->view('master/gudang/pengeluaran-material/edit',$content);
            $this->load->view('master/footer2',$footer);
        }
    }

    public function items($id_pengeluaran_material) {
        $this->load->model('gudang/PengeluaranMaterialModel');
        return $this->sendResponse(['success' => TRUE, 'data' => $this->PengeluaranMaterialModel->getitem($id_pengeluaran_material)]);
    }

    public function rincian($id) {
        $this->load->model('gudang/PengeluaranMaterialModel');
        $data = $this->crud->gd('data_pengeluaran_material', ['id' => $id]);

        if ($data) {
            $content['data'] = [
                'tipe_spk'  => $data->tipe_spk,
                'id_spk'    => $data->id_spk,
                'id'        => $id,
                'data'      => $this->PengeluaranMaterialModel->getproses($data->tipe_spk, $data->id_spk),
                'data2'     => $data
            ];

            $footer['data'] = [
                "route" => $this->getRoute()
            ];

            $this->load->view('master/header_menu2',$this->header);
            $this->load->view('master/gudang/pengeluaran-material/rincian',$content);
            $this->load->view('master/footer2',$footer);
        }
    }

    public function cetak($id) {
        $this->load->model('gudang/PengeluaranMaterialModel');
        $data = $this->crud->gd('data_pengeluaran_material', ['id' => $id]);

        if ($data) {
            $content['data'] = [
                'tipe_spk'  => $data->tipe_spk,
                'id_spk'    => $data->id_spk,
                'id'        => $id,
                'data'      => $this->PengeluaranMaterialModel->getproses($data->tipe_spk, $data->id_spk),
                'data2'     => $data,
                'item'      => $this->PengeluaranMaterialModel->getitem($id)
            ];

            $footer['data'] = [
                "route" => $this->getRoute()
            ];

            $this->load->view('master/gudang/pengeluaran-material/print',$content);
        }
    }

    public function submit_item() {
        $valid = $this->form_validation;
        $valid->set_error_delimiters('', '');
        $valid->set_rules('id_stock', 'ID Stock', 'required|trim');
        $valid->set_rules('pengeluaran', 'Pengeluaran', 'required|trim');
        // $valid->set_rules('kembali', 'Retur', 'trim');
        $valid->set_rules('id_pengeluaran_material', 'ID Pengeluaran Material', 'required|trim');

        if ($valid->run() === FALSE) {
            return $this->sendResponse([
                'success'   => FALSE,
                'error'     => array(
                    'id_stock'                  => form_error('id_stock'),
                    'pengeluaran'               => form_error('pengeluaran'),
                    // 'kembali'                   => form_error('kembali'),
                    'id_pengeluaran_material'   => form_error('id_pengeluaran_material')
                )
            ]);
        } else {
            $input = $this->input->post(NULL, TRUE);

            if (!$input['id']) {
                $insert = array(
                    'id_stock'                  => $input['id_stock'],
                    'pengeluaran'               => $input['pengeluaran'],
                    // 'kembali'                   => $input['kembali'],
                    'id_pengeluaran_material'   => $input['id_pengeluaran_material'],
                    'iat'                       => date('Y-m-d H:i:s')
                );

                $this->crud->i('data_pengeluaran_material_item', $insert);

                $insert['id'] = $this->db->insert_id();

                return $this->sendResponse([
                    'success'   => TRUE,
                    'add'       => TRUE,
                    'rows'      => $this->crud->cw('data_pengeluaran_material_item', ['id_pengeluaran_material' => $input['id_pengeluaran_material']]),
                    'data'      => $insert,
                    'item'      => $this->crud->gd('master_stock', ['id' => $insert['id_stock']])
                ]);
            } else {
                $data = $this->crud->gd('data_pengeluaran_material_item', ['id' => $input['id']]);

                if ($data) {
                    $update = array(
                        'id_stock'                  => $input['id_stock'],
                        'pengeluaran'               => $input['pengeluaran'],
                        // 'kembali'                   => $input['kembali'],
                        'id_pengeluaran_material'   => $input['id_pengeluaran_material']
                    );

                    $this->crud->u('data_pengeluaran_material_item', $update, ['id' => $input['id']]);

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
        $data = $this->crud->gd('data_pengeluaran_material_item', $where);

        if ($data) {
            $this->crud->d('data_pengeluaran_material_item', $where);

            return $this->sendResponse(['success' => TRUE]);
        }

        return $this->sendResponse(['success' => FALSE]);
    }

    public function submit_form() {
        $valid = $this->form_validation;
        $valid->set_error_delimiters('', '');
        $valid->set_rules('catatan', 'Catatan', 'trim');
        $valid->set_rules('status', 'Status', 'required|trim');

        if ($valid->run() === FALSE) {
            return $this->sendResponse([
                'success'   => FALSE,
                'error'     => array(
                    'catatan'   => form_error('catatan'),
                    'status'    => form_error('status')
                )
            ]);
        } else {
            $input = $this->input->post(NULL, TRUE);

            if ($input['action'] == 'add') {
                $insert = array(
                    'id'        => $input['id'],
                    'tipe_spk'  => $input['tipe_spk'],
                    'id_spk'    => $input['id_spk'],
                    'tanggal'   => $input['tanggal'],
                    'catatan'   => $input['catatan'],
                    'status'    => $input['status'],
                    'iat'       => date('Y-m-d H:i:s')
                );

                $this->crud->i('data_pengeluaran_material', $insert);
                $this->crud->u('data_spk_'.strtolower($input['tipe_spk']), ['id_pengeluaran_material' => $input['id']], ['id' => $input['id_spk']]);

                return $this->sendResponse([
                    'success'   => TRUE,
                    'add'       => TRUE
                ]);
            } else {
                $data = $this->crud->gd('data_pengeluaran_material', ['id' => $input['id']]);

                if ($data) {
                    $update = array(
                        'catatan'   => $input['catatan'],
                        'status'    => $input['status']
                    );

                    $this->crud->u('data_pengeluaran_material', $update, ['id' => $input['id']]);

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
