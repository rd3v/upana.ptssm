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
                                        <a href="<?=site_url('gudang')?>" class="m-nav__link m-nav__link--icon">
                                            <i class="m-nav__link-icon la la-home"></i>
                                        </a>
                                    </li>
                                    <li class="m-nav__separator">
                                        -
                                    </li>
                                    <li class="m-nav__item">
                                        <a href="<?=site_url('gudang/surat-jalan')?>" class="m-nav__link">
                                            <span class="m-nav__link-text">
                                                Surat Jalan
                                            </span>
                                        </a>
                                    </li>
                                    <li class="m-nav__separator">
                                        -
                                    </li>
                                    <li class="m-nav__item">
                                        <a href="<?=site_url('gudang/surat-jalan/proses/'.$data['data']->id)?>" class="m-nav__link">
                                            <span class="m-nav__link-text">
                                                Proses
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
                                                    Tambah Surat jalan
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
                                                        <option value="0" <?=($data['data']->tipe_pajak == '0' ? 'selected' : '')?>>
                                                            Gudang (Non-Pajak)
                                                        </option>
                                                        <option value="1" <?=($data['data']->tipe_pajak == '1' ? 'selected' : '')?>>
                                                            Toko (Pajak)
                                                        </option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group m-form__group row">
                                                <label  class="col-2 col-form-label">
                                                    No. SPK
                                                </label>
                                                <div class="col-10">
                                                    <input class="form-control m-input" type="text" value="<?=$data['data']->no_spk?>" id="no_spk" disabled />
                                                </div>
                                            </div>
                                            <div class="form-group m-form__group row">
                                                <label class="col-2 col-form-label">
                                                    Tanggal Terbit
                                                </label>
                                                <div class="col-10">
                                                    <input class="form-control m-input" type="date" value="<?=$data['data']->tanggal?>" id="tanggal" disabled />
                                                </div>
                                            </div>
                                            <div class="form-group m-form__group row">
                                                <label  class="col-2 col-form-label">
                                                    Nama Pelanggan
                                                </label>
                                                <div class="col-10">
                                                    <input type="hidden" value="<?=$data['data']->id_pelanggan?>" id="id_pelanggan">
                                                    <input disabled="" class="form-control m-input" type="text" value="<?=$data['data']->nama?>" id="nama">
                                                </div>
                                            </div>
                                            <div class="form-group m-form__group row">
                                                <label  class="col-2 col-form-label">
                                                    Nomer Telpon
                                                </label>
                                                <div class="col-10">
                                                    <input disabled="" class="form-control m-input" type="tel" value="<?=$data['data']->telepon?>" id="telepon">
                                                </div>
                                            </div>
                                            <div class="form-group m-form__group row">
                                                <label for="example-email-input" class="col-2 col-form-label">
                                                    E-mail
                                                </label>
                                                <div class="col-10">
                                                    <input disabled="" class="form-control m-input" type="email" value="<?=$data['data']->email?>" id="email">
                                                </div>
                                            </div>
                                            <div class="form-group m-form__group row">
                                                <label  class="col-2 col-form-labelel">
                                                    Alamat
                                                </label>
                                                <div class="col-10">
                                                    <input disabled="" class="form-control m-input" type="text" value="<?=$data['data']->alamat?>" id="alamat">
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
                                                    <textarea style="resize: none" class="form-control m-input " id="catatan" rows="3"><?=$data['data']->catatan?></textarea>
                                                </div>
                                            </div>
                                            <div class="form-group m-form__group row">
                                                <label  class="col-2 col-form-label">
                                                    Status
                                                </label>
                                                <div class="col-10">
                                                    <select class="col-8 form-control m-input" id="status">
                                                    <option value="1">Aktif</option>
                                                    <option value="3">Tidak Aktif (Batal)</option>

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
                                                List Item Pemasangan
                                            </h4>
                                        </div>

                                    </div>
                                    <table class="table m-datatable-item" id="tbl_item_pesanan">
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Item</th>
                                            <th>Kode</th>
                                            <th>Serial Number</th>
                                        </tr>
<?php
$i = 1;
foreach ($data['item'] as $row) {
    $serial = $this->crud->gw('data_invoice_masuk_list_barang_serial', ['kode_list_barang' => $row->kode]);
    for ($j = 1; $j <= $row->jumlah; $j++) {
?>
                                        <tr>
                                            <td><?=$i?></td>
                                            <td><?=$row->nama?></td>
                                            <td><?=$row->kode?></td>
                                            <td>
                                                <select class="stock-item">
                                                    <option value="0">--------</option>
<?php foreach ($serial as $row2) { ?>
                                                    <option value="<?=$row2->id?>"><?=$row2->serial?></option>
<?php } ?>
                                                </select>
                                            </td>
                                        </tr>
<?php $i++; }} ?>
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

    <script>
        function submit_form() {
            $(this).prop('disabled', true);
            $('.file-loading').show();

            var item = '';
            $('.stock-item').each(function() {
                item += $(this).val()+',';
            });

            $.post('<?=site_url('gudang/surat-jalan/submit-form')?>', {
                'action': 'add',
                'id': '',
                'no_surat': $('#no_surat').val(),
                'id_spk': '<?=$data['data']->id?>',
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
                        location.href='<?=site_url('gudang/surat-jalan')?>';
                    } else {
                        $('.btn-error-form').removeClass('btn-primary');
                        $('.btn-error-form').addClass('btn-danger');

                        if (result.error.kendaraan) $('#kendaraan').addClass('is-invalid');
                        if (result.error.nopol) $('#nopol').addClass('is-invalid');
                        if (result.error.catatan) $('#catatan').addClass('is-invalid');
                        if (result.error.status) $('#status').addClass('is-invalid');
                    }
                } else show_toast('Data gagal dikirim.', 'error');
            });
        }
    </script>
