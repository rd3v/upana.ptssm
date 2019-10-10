                <div class="m-grid__item m-grid__item--fluid m-wrapper">
                    <!-- BEGIN: Subheader -->
                    <div class="m-subheader ">
                        <div class="d-flex align-items-center">
                            <div class="mr-auto">
                                <h3 class="m-subheader__title m-subheader__title--separator">
                                    Form Pengeluaran Material
                                </h3>
                                <ul class="m-subheader__breadcrumbs m-nav m-nav--inline">
                                    <li class="m-nav__item m-nav__item--home">
                                        <a href="<?=site_url('gudang')?>" class="m-nav__link m-nav__link--icon">
                                            <i class="m-nav__link-icon la la-home"></i>
                                        </a>
                                    </li>
                                    <li class="m-nav__separator">
                                        -
                                    </li>
                                    <li class="m-nav__item">
                                        <a href="<?=site_url('gudang/pengeluaran-material')?>" class="m-nav__link">
                                            <span class="m-nav__link-text">
                                                Pengeluaran Material
                                            </span>
                                        </a>
                                    </li>
                                    <li class="m-nav__separator">
                                        -
                                    </li>
                                    <li class="m-nav__item">
                                        <a href="<?=site_url('gudang/pengeluaran-material/edit/'.$data['id'])?>" class="m-nav__link">
                                            <span class="m-nav__link-text">
                                                Form
                                            </span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- END: Subheader -->
                    <div class="m-content">
                        <div class="row">
                            <div class="col-xl-12">
                                <div class="m-portlet m-portlet--tab">
                                    <div class="m-portlet__head header">
                                        <h3 class="header-pesanan">
                                        </h3><br>
                                        <h3 name="no_surat_jalan" class="header-pesanan-no">
                                            <i class="fa fa-check-circle"> </i> <?=$data['data']->no_spk?>
                                </h3><br><br>
                                <div class="info row">
                                    <div class="col-sm">
                                        <p id="tanggal_surat"><i class="flaticon-calendar-2"> </i><?=tgl_indo($data['data']->tanggal)?></p>
                                        <p id="nama_pelanggan"><i class="flaticon-users"> </i> <?=$data['data']->nama?></p>
                                        <p id="no_telpon"><i class="fa fa-phone"> </i> <?=$data['data']->telepon?></p>
                                        <p> <i class="fa fa-home"></i> <?=($data['data']->tipe_pajak == 1 ? 'Toko (Pajak)' : 'Gudang (Non-Pajak)')?></p>
                                    </div>
                                    <div class="col-sm">
                                        <p id="email_pelanggan"><i class="fa fa-envelope-o "> </i> <?=$data['data']->email?></p>
                                        <p id="alamat_pelanggan"><i class="flaticon-placeholder-1"> </i> <?=$data['data']->alamat?></p>
                                        <p id="keterangan_pesanan"><i class="fa fa-suitcase"> </i> <?=$data['data']->catatan?></p>
                                    </div>
                                </div>
                            </div>
                            <form class="m-form m-form--fit m-form--label-align-right">
                                <div class="m-portlet__body">
                                    <div class="col-xl-12" style="margin-bottom: 20px">
                                        <label style="font-size: 1.5rem;font-weight: 500;" for="example-text-input" class="col-xl-9">
                                            Material
                                        </label>
                                        <button type="button" data-toggle="modal" data-target="#modal_tambah_material" class="btn btn-primary" class="col-xl-3">
                                            Tambah Material
                                        </button>
                                    </div>
                                    <div class="col-xl-12">
                                        <table class="table" id="tbl_material"></table>
                                        <div class="form-group m-form__group ">
                                            <label  class="col-xl-12 col-form-label">
                                                Catatan
                                            </label>
                                            <div class="col-xl-12">
                                                <textarea style="resize: none" class="form-control m-input " id="catatan" rows="3"><?=$data['data2']->catatan?></textarea>
                                            </div>
                                        </div>
                                        <div class="form-group m-form__group row">
                                            <label  class="col-2 col-form-label">
                                                Status
                                            </label>
                                            <div class="col-10">
                                                <select class="col-8 form-control m-input" id="status">
                                                    <option value="1" <?=($data['data2']->status == 1 ? 'selected' : '')?>>Aktif</option>
                                                    <option value="0" <?=($data['data2']->status == 0 ? 'selected' : '')?>>Tidak Aktif (Batal)</option>

                                                </select>
                                            </div>
                                        </div>

                                        <div style="margin-top: 20px" align="center">
                                            <button type="button" class="btn btn-success" onclick="submit_form()">Simpan Data Material</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <!-- <div class="m-portlet__body ">
                                <button onclick="window.location.href='print_pengeluaran_material.html'" style="display: block; margin-bottom: 10px" id="btn_print" class="btn btn-primary ">
                                    Print Bukti Pengeluaran
                                </button>
                                <button style="display: block;" id="btn_unggah_gambar" class="btn btn-primary">
                                    Unggah Gambar
                                </button>
                            </div> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end:: Body -->
    <!--  Begin::Modals -->
    <div class="modal fade" id="modal_tambah_material" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">
                        Pilih Material
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">
                            &times;
                        </span>
                    </button>
                </div>
                <div class="modal-body">

                    <div class="form-group m-form__group row">
                        <label for="example-text-input" class="col-3 col-form-label">
                            Kode / Nama Material
                        </label>
                        <div class="col-9">
                            <select style="width: 100%" class="form-control m-select2 dropdown_search select2-hidden-accessible" id="item_id" onchange="set_material(this)">
<?php foreach ($data['material'] as $row) { ?>
                                <option value="<?=$row->id?>" data-satuan="<?=$row->satuan?>">
                                    <?=$row->kode?> || <?=$row->nama?>
                                </option>
<?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group m-form__group row">
                        <label for="example-text-input" class="col-3 col-form-label">
                            Pengeluaran
                        </label>
                        <div class="col-3">
                            <div class="input-group input-group-sm">
                                <input type="number" class="form-control m-input" aria-describedby="basic-addon2" id="item_pengeluaran">
                                <div class="input-group-append">
                                    <span class="input-group-text item_satuan"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- <div class="form-group m-form__group row">
                        <label for="example-text-input" class="col-3 col-form-label">
                            Retur
                        </label>
                        <div class="col-3">
                            <div class="input-group input-group-sm">
                                <input type="number" class="form-control m-input" aria-describedby="basic-addon2" id="item_kembali">
                                <div class="input-group-append">
                                    <span class="input-group-text item_satuan"></span>
                                </div>
                            </div>
                        </div>
                    </div> -->

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">
                        Tutup
                    </button>
                    <button id="btn_tambah_material" type="button" class="btn btn-primary" onclick="submit_item()">
                        Tambahkan
                    </button>
                </div>
            </div>
        </div>
    </div>
    <!-- End::Modals -->


    <script>
        function submit_item() {
            $(this).prop('disabled', true);
            $('.file-loading').show();

            $.post('<?=site_url('gudang/pengeluaran-material/submit-item')?>', {
                'id': '',
                'id_stock': $('#item_id').val(),
                'pengeluaran': $('#item_pengeluaran').val(),
                'kembali': $('#item_kembali').val(),
                'id_pengeluaran_material': '<?=$data['id']?>'
            }, function(result, status) {
                if (status == 'success') {
                    $(this).prop('disabled', false);
                    $('.file-loading').hide();

                    if (result.success) {
                        $('#modal_tambah_material').modal('hide');
                        show_toast('Data berhasil '+(result.add ? 'ditambah' : 'diubah')+'.', 'success');
                        tbl_material.reload();
                    } else {
                        $('.btn-error-form').removeClass('btn-primary');
                        $('.btn-error-form').addClass('btn-danger');

                        if (result.error.id_stock) $('#item_id').addClass('is-invalid');
                        if (result.error.pengeluaran) $('#item_pengeluaran').addClass('is-invalid');
                        if (result.error.kembali) $('#item_pengeluaran').addClass('is-invalid');
                    }
                } else show_toast('Data gagal dikirim.', 'error');
            });
        }

        function delete_item(id) {
            swadel({
                preConfirm: function() {
                    return new Promise(function(resolve) {
                        $.post('<?=site_url('gudang/pengeluaran-material/delete-item')?>', {
                            'id': id
                        }, function(result, status) {
                            if (status == 'success') {
                                resolve(result);
                            }
                        });
                    });
                }
            }).then(function(result) {
                if (result.value) {
                    if (result.value.success) {
                        show_toast('Data berhasil dihapus.', 'success');
                        tbl_material.reload();
                    } else {
                        show_toast('Data gagal dihapus.', 'error');
                    }
                }
            });
        }

        function set_material(el) {
            $('#item_pengeluaran').val('');
            $('#item_kembali').val('');
            $('.item_satuan').html($(el).find(':selected').data('satuan'));
        }

        function submit_form() {
            $(this).prop('disabled', true);
            $('.file-loading').show();

            $.post('<?=site_url('gudang/pengeluaran-material/submit-form')?>', {
                'action': 'edit',
                'id': '<?=$data['id']?>',
                'tipe_spk': '<?=$data['tipe_spk']?>',
                'id_spk': '<?=$data['id_spk']?>',
                'tanggal': '<?=$data['data']->tanggal?>',
                'catatan': $('#catatan').val(),
                'status': $('#status').val()
            }, function(result, status) {
                if (status == 'success') {
                    $(this).prop('disabled', false);
                    $('.file-loading').hide();

                    if (result.success) {
                        show_toast('Data berhasil '+(result.add ? 'ditambah' : 'diubah')+'.', 'success');
                        Swal.fire('Data Telah Tersimpan!', 'Data yang Anda buat telah disimpan.', 'success');
                        location.href='<?=site_url('gudang/pengeluaran-material')?>';
                    } else {
                        $('.btn-error-form').removeClass('btn-primary');
                        $('.btn-error-form').addClass('btn-danger');

                        if (result.error.catatan) $('#catatan').addClass('is-invalid');
                        if (result.error.status) $('#status').addClass('is-invalid');
                    }
                } else show_toast('Data gagal dikirim.', 'error');
            });
        }
    </script>

<script type="text/javascript">
    var tbl_material = $('#tbl_material').mDatatable({
        data: {
            saveState: {cookie: false},
                    type: 'remote',
                    source: {
                      read: {
                        // sample GET method
                        method: 'GET',
                        url: '<?=site_url('gudang/pengeluaran-material/items/'.$data['id'])?>'
                      },
                    },
                    pageSize: 10,
                    serverPaging: true,
                    serverFiltering: true,
                    serverSorting: true,
                },
                sortable: false,
                search: {
                    input: $('#generalSearch'),
                },
                columns: [

                {
                    field: '#',
                    title: 'No.',
                    textAlign: 'center',
                    template: function(data, type, row, meta) {
                        return ((row.getCurrentPage() - 1) * row.getPageSize()) + data.getIndex() + 1;
                    }
                },
                {
                    field: 'nama',
                    title: 'Nama Material',
                    textAlign: 'center',
                    width:150
                },
                {
                    field: 'id_teknisi',
                    title: 'Teknisi',
                    textAlign: 'center',
                    width: 75,
                    template: function(data) {
                        return (data.id_teknisi != '0' ? '<i class="fa fa-check"> </i>' : '');
                    }
                },
                {
                    field: 'id_pelanggan',
                    title: 'Kostumer',
                    textAlign: 'center',
                    width: 75,
                    template: function(data) {
                        return (data.id_pelanggan != '0' ? '<i class="fa fa-check"> </i>' : '');
                    }
                },
                {
                    field: 'pengeluaran',
                    title: 'Pengeluaran',
                    textAlign: 'center',
                    template: function(data) {
                        return data.pengeluaran + ' ' + data.satuan;
                    }
                },
                {
                    field: 'kembali',
                    title: 'Retur',
                    textAlign: 'center',
                    template: function(data) {
                        return data.kembali + ' ' + data.satuan;
                    }
                },
                {
                    field: 'total',
                    title: 'Total',
                    textAlign: 'center',
                    template: function(data) {
                        return (data.pengeluaran - data.kembali) + ' ' + data.satuan;
                    }
                },
                {
                    field: 'aksi',
                    title: 'Aksi',
                    textAlign: 'center',
                    width: 200,
                    template: function(data) {
                        return '<button type="button" class="btn btn-sm btn-danger" onclick="delete_item(\''+data.id+'\')">Hapus</buttton>';
                    }
                }

                ],
            });
        </script>
