                <div class="m-grid__item m-grid__item--fluid m-wrapper">
                    <!-- BEGIN: Subheader -->
                    <div class="m-subheader ">
                        <div class="d-flex align-items-center">
                            <div class="mr-auto">
                                <h3 class="m-subheader__title m-subheader__title--separator">
                                    Surat Jalan
                                </h3>
                                <ul class="m-subheader__breadcrumbs m-nav m-nav--inline">
                                    <li class="m-nav__item m-nav__item--home">
                                        <a href="<?=site_url('admin/dashboard')?>" class="m-nav__link m-nav__link--icon">
                                            <i class="m-nav__link-icon la la-home"></i>
                                        </a>
                                    </li>
                                    <li class="m-nav__separator">
                                        -
                                    </li>
                                    <li class="m-nav__item">
                                        <a href="<?=site_url('master/gudang/surat-jalan')?>" class="m-nav__link">
                                            <span class="m-nav__link-text">
                                                Surat Jalan
                                            </span>
                                        </a>
                                    </li>
                                    <li class="m-nav__separator">
                                        -
                                    </li>
                                    <li class="m-nav__item">
                                        <a href="<?=site_url('master/gudang/surat-jalan/tambah?id='.$this->input->get('id', TRUE))?>" class="m-nav__link">
                                            <span class="m-nav__link-text">
                                                Tambah
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
                                    <div class="m-portlet__head">
                                        <div class="m-portlet__head-caption">
                                            <div class="m-portlet__head-title">
                                                <span class="m-portlet__head-icon m--hide">
                                                    <i class="la la-gear"></i>
                                                </span>
                                                <h3 class="m-portlet__head-text">
                                                    Tambah Surat Jalan (Non-SPK)
                                                </h3>
                                            </div>
                                        </div>
                                    </div>
                                    <!--begin::Form-->
                                    <form class="m-form m-form--fit m-form--label-align-right">
                                        <div class="m-portlet__body">
                                            <div class="form-group m-form__group row">
                                                <label  class="col-2 col-form-label">
                                                    No. Surat
                                                </label>
                                                <div class="col-10">
                                                    <input class="form-control m-input" type="text" id="no_surat" />
                                                </div>
                                            </div>
                                            <div class="form-group m-form__group row">
                                                <label  class="col-2 col-form-label">
                                                    Tipe Gudang
                                                </label>
                                                <div class="col-10">
                                                    <select disabled="disabled" class="form-control m-input m-input--square" id="tipe_pajak">
                                                        <option value="0">
                                                            Gudang (Non-Pajak)
                                                        </option>
                                                        <option value="1">
                                                            Toko (Pajak)
                                                        </option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group m-form__group row">
                                                <label class="col-2 col-form-label">
                                                    Tanggal Terbit
                                                </label>
                                                <div class="col-10">
                                                    <input class="form-control m-input" type="date" id="tanggal" />
                                                </div>
                                            </div>
                                            <div class="form-group m-form__group row">
                                                <label  class="col-2 col-form-label">
                                                    Nama Pelanggan
                                                </label>
                                                <div class="col-10">
                                                    <select style="width: 100%" class="form-control m-select2 dropdown_search" id="id_pelanggan" onchange="set_pelanggan(this)">
                                                        <option value=""></option>
                                                        <?php
                                                            foreach ($data['customer'] as $value) { ?>
                                                                <option value="<?=$value['id']?>" data-telepon="<?=$value['telepon']?>" data-email="<?=$value['email']?>" data-alamat="<?=$value['alamat']?>"><?=$value['nama']?></option>
                                                        <?php }
                                                         ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group m-form__group row">
                                                <label  class="col-2 col-form-label">
                                                    Nomer Telpon
                                                </label>
                                                <div class="col-10">
                                                    <input disabled="" class="form-control m-input" type="tel" id="telepon">
                                                </div>
                                            </div>
                                            <div class="form-group m-form__group row">
                                                <label for="example-email-input" class="col-2 col-form-label">
                                                    E-mail
                                                </label>
                                                <div class="col-10">
                                                    <input disabled="" class="form-control m-input" type="email" id="email">
                                                </div>
                                            </div>
                                            <div class="form-group m-form__group row">
                                                <label  class="col-2 col-form-labelel">
                                                    Alamat
                                                </label>
                                                <div class="col-10">
                                                    <input disabled="" class="form-control m-input" type="text" id="alamat">
                                                </div>
                                            </div>
                                            <div class="form-group m-form__group row">
                                                <label  class="col-2 col-form-label">
                                                    Kendaraan
                                                </label>
                                                <div class="col-10">
                                                    <input class="form-control m-input" type="text" id="kendaraan">
                                                </div>
                                            </div>
                                            <div class="form-group m-form__group row">
                                                <label  class="col-2 col-form-label">
                                                    Plat Nomor
                                                </label>
                                                <div class="col-10">
                                                    <input class="form-control m-input" type="text" id="nopol">
                                                </div>
                                            </div>
                                            <div class="form-group m-form__group row">
                                                <label  class="col-2 col-form-label">
                                                    Catatan
                                                </label>
                                                <div class="col-10">
                                                    <textarea style="resize: none" class="form-control m-input " id="catatan" rows="3"></textarea>
                                                </div>
                                            </div>
                                            <div class="form-group m-form__group row">
                                                <label  class="col-2 col-form-label">
                                                    Status
                                                </label>
                                                <div class="col-10">
                                                    <select class="col-8 form-control m-input" id="status">
                                                    <option value="1">Aktif</option>
                                                    <option value="0">Tidak Aktif (Batal)</option>

                                                </select>
                                                </div>
                                            </div>


                                    <div align="center">

                                    </div>
                                </div>
                            </form>
                            <div class="m-portlet__body">
                                <div class="list_item_pemasangan">
                                    <div class="m-portlet__head-title row" style="margin-bottom: 20px;">
                                        <div class="col-6">
                                            <h4>
                                                List Item Unit
                                            </h4>
                                        </div>

                                    </div>
                                <div style="margin: 20px" align="right">
                                    <button data-toggle="modal" data-target="#form-modal" type="button" class="btn btn-success btn_pemasangan" onclick="modify_item('')"> + Tambah Item</button>
                                </div>
                                    <table class="table m-datatable-item" id="tbl_item_pesanan">
                                        <tr>
                                            <!-- <th>No</th> -->
                                            <th>Nama Item</th>
                                            <th>Kode</th>
                                            <th>Serial Number</th>
                                            <th>Aksi</th>
                                        </tr>
                                        <tbody id="items">
<?php
$i = 1;
foreach ($data['item'] as $row) {
    $stock = $this->crud->gd('master_stock', ['id' => $row->id_stock]);
    $serial = $this->crud->gw('data_invoice_masuk_list_barang_serial', ['id_stock' => $row->id_stock]);
    for ($j = 1; $j <= $row->jumlah; $j++) {
?>
                                        <tr class="item-<?=$row->id?>">
                                            <!-- <td><?=$i?></td> -->
                                            <td><?=$stock->nama?></td>
                                            <td><?=$stock->kode?></td>
                                            <td>
                                                <select class="stock-item">
                                                    <option value="0">--------</option>
<?php foreach ($serial as $row2) { ?>
                                                    <option value="<?=$row2->id?>"><?=$row2->serial?></option>
<?php } ?>
                                                </select>
                                            </td>
                                            <td>
                                                <button class="btn btn-danger" onclick="delete_item('<?=$row->id?>')">Hapus</buttton>
                                            </td>
                                        </tr>
<?php $i++; }} ?>
                                       </tbody>
                                    </table>
                                </div>

                                    <div align="center">
                                        <button style="margin-top: 50px" type="button" class="btn btn-primary btn_pemasangan" onclick="submit_form()">Terbitkan Surat Jalan</button>
                                    </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end:: Body -->
    <!--  Begin::Modals -->
    <div class="modal fade" id="form-modal" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="form-title">
                        Tambah Item
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
                            Nama / Kode Barang
                        </label>
                        <div class="col-9">
                            <select style="width: 100%" class="form-control m-select2 dropdown_search" id="item_kode">
                                <option value="">-</option>
                                <?php
                                foreach ($data['stock'] as $value) { ?>
                                    <option value="<?= $value['id'] ?>"><?= $value['kode'] ?> || <?= $value['nama'] ?></option>
                            <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group m-form__group row">
                        <label for="example-text-input" class="col-3 col-form-label">
                            Jumlah
                        </label>
                        <div class="col-9">
                            <div class="input-group">
                                <input id="item_jumlah" type="number" class="form-control m-input" aria-describedby="basic-addon2">
                                <div class="input-group-append">
                                    <span class="input-group-text" id="basic-addon2">
                                        Unit
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="hidden" id="id_surat" value="<?=$this->input->get('id', TRUE)?>" />
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">
                        Tutup
                    </button>
                    <button type="button" class="btn btn-primary" onclick="submit_item()">
                        Tambahkan
                    </button>
                </div>
            </div>
        </div>
    </div>
    <!-- End::Modals -->

    <script>
        function modify_item(id) {
            $('#item_kode').val('');
            $('#item_jumlah').val('');

            if (id == '') {
                $('#form-title').html('Tambah Item');
            } else {
                $('#form-title').html('Edit Item');
            }
        }

        function submit_item() {
            $(this).prop('disabled', true);
            $('.file-loading').show();

            $.post('<?=site_url('gudang/surat-jalan/submit-item')?>', {
                'id': '',
                'id_surat': $('#id_surat').val(),
                'id_stock': $('#item_kode').val(),
                'jumlah': $('#item_jumlah').val()
            }, function(result, status) {
                if (status == 'success') {
                    $(this).prop('disabled', false);
                    $('.file-loading').hide();

                    if (result.success) {
                        $('#form-modal').modal('hide');
                        show_toast('Data berhasil '+(result.add ? 'ditambah' : 'diubah')+'.', 'success');

                        if (result.add) {
                            // var counter = <?=$i?>;

                            for (var i = 0; i < result.data.jumlah; i++) {
                                var serial = '';
                                result.serial.forEach(function(item, index){
                                    serial += '<option value="'+item.id+'">'+item.serial+'</option>';
                                });

                                $('#items').append(''+
                                    '<tr class="item-'+result.data.id+'">'+
                                        // '<td>'+counter+'</td>'+
                                        '<td>'+result.data.nama+'</td>'+
                                        '<td>'+result.data.kode+'</td>'+
                                        '<td>'+
                                            '<select class="stock-item">'+
                                                '<option value="0">--------</option>'+serial+
                                            '</select>'+
                                        '</td>'+
                                        '<td><button class="btn btn-danger" onclick="delete_item(\''+result.data.id+'\')">Hapus</buttton></td>'+
                                    '</tr>'
                                );

                                // counter++;
                            }
                        }
                    } else {
                        $('.btn-error-form').removeClass('btn-primary');
                        $('.btn-error-form').addClass('btn-danger');

                        if (result.error.id_stock) $('#item_kode').addClass('is-invalid');
                        if (result.error.jumlah) $('#item_jumlah').addClass('is-invalid');
                    }
                } else show_toast('Data gagal dikirim.', 'error');
            });
        }

        function delete_item(id) {
            swadel({
                preConfirm: function() {
                    return new Promise(function(resolve) {
                        $.post('<?=site_url('gudang/surat-jalan/delete-item')?>', {
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
                        $('.item-'+id).remove();
                    } else {
                        show_toast('Data gagal dihapus.', 'error');
                    }
                }
            });
        }

        function set_pelanggan(el) {
            $('#telepon').val($(el).find(':selected').data('telepon'));
            $('#email').val($(el).find(':selected').data('email'));
            $('#alamat').val($(el).find(':selected').data('alamat'));
        }

        function submit_form() {
            $(this).prop('disabled', true);
            $('.file-loading').show();

            var item = '';
            $('.stock-item').each(function() {
                item += $(this).val()+',';
            });

            $.post('<?=site_url('gudang/surat-jalan/submit-form')?>', {
                'action': 'add',
                'id': '<?=$this->input->get('id', TRUE)?>',
                'no_surat': $('#no_surat').val(),
                'id_spk': '0',
                'tipe_pajak': $('#tipe_pajak').val(),
                'tanggal': $('#tanggal').val(),
                'id_pelanggan': $('#id_pelanggan').val(),
                'kendaraan': $('#kendaraan').val(),
                'nopol': $('#nopol').val(),
                'catatan': $('#catatan').val(),
                'status': $('#status').val(),
                'item': item
            }, function(result, status) {
                if (status == 'success') {
                    $(this).prop('disabled', false);
                    $('.file-loading').hide();

                    if (result.success) {
                        show_toast('Data berhasil '+(result.add ? 'ditambah' : 'diubah')+'.', 'success');
                        Swal.fire('Surat Jalan Telah Terbit!', 'Surat Jalan yang Anda buat telah diterbitkan.', 'success');
                        location.href='<?=site_url('master/gudang/surat-jalan')?>';
                    } else {
                        $('.btn-error-form').removeClass('btn-primary');
                        $('.btn-error-form').addClass('btn-danger');

                        if (result.error.no_surat) $('#no_surat').addClass('is-invalid');
                        if (result.error.tipe_pajak) $('#tipe_pajak').addClass('is-invalid');
                        if (result.error.tanggal) $('#tanggal').addClass('is-invalid');
                        if (result.error.id_pelanggan) $('#id_pelanggan').addClass('is-invalid');
                        if (result.error.kendaraan) $('#kendaraan').addClass('is-invalid');
                        if (result.error.nopol) $('#nopol').addClass('is-invalid');
                        if (result.error.catatan) $('#catatan').addClass('is-invalid');
                        if (result.error.status) $('#status').addClass('is-invalid');
                    }
                } else show_toast('Data gagal dikirim.', 'error');
            });
        }
    </script>
