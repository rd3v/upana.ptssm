        <style>
            #canvasInAPerfectWorld {
                background-color: #ededed;
            }
        </style>
        <style>
            .m-datatable.m-datatable--default > .m-datatable__pager > .m-datatable__pager-info {
                display: none !important;
            }
            .tg  {border-collapse:collapse;border-spacing:0;}
            .tg td{font-family:Arial, sans-serif;font-size:14px;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:black;}
            .tg th{font-family:Arial, sans-serif;font-size:14px;font-weight:normal;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:black;}
            .tg .tg-s268{
                text-align:center;
                font-size: 1.2rem;
                font-weight: 600;
            }
            .tlu {
                border-top: transparent !important;
            }

        </style>

        <script src="<?=base_url()?>assets/teknisi-css/assets/js/signature.js"></script>

        <div class="m-content">
            <div class="row">
                <div class="col-xl-12">
                    <div class="m-portlet m-portlet--mobile">
                        <div class="m-portlet__body" style="width: 100vw">
                            <div class="m-form m-form--label-align-right m--margin-top-20 m--margin-bottom-30">
                                <div class="row align-items-center">
                                    <div class="col-md-12 m--margin-bottom-20">
                                        <div >
                                            <h4 align="center">
                                                List Item
                                            </h4>
                                            <table style="width: 100%" class="tg">
                                                <thead>
                                                    <tr>
                                                        <th style="width: 50%" class="tg-s268" >Nama item</th>
                                                        <th style="width: 25%" class="tg-s268" >Qty</th>
                                                        <th style="width: 25%" class="tg-s268" >Satuan</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
<?php foreach ($data['item'] as $row) { $stock = $this->crud->gd('master_stock', ['id' => $row->id_stock]); ?>
                                                    <tr>
                                                        <th style="width: 50%" class="tg-s268" ><?=$stock->nama?></th>
                                                        <th style="width: 25%" class="tg-s268" ><?=$row->jumlah?></th>
                                                        <th style="width: 25%" class="tg-s268" >Unit</th>
                                                    </tr>
<?php } ?>
<?php foreach ($data['material'] as $row) { ?>
                                                    <tr>
                                                        <th style="width: 50%" class="tg-s268" ><?=$row->nama?></th>
                                                        <th style="width: 25%" class="tg-s268" ><?=$row->pengeluaran?></th>
                                                        <th style="width: 25%" class="tg-s268" ><?=$row->satuan?></th>
                                                    </tr>
<?php } ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="info row">
                                            <div class="col-sm">
                                                <h3>Respon Konsumen</h3>
                                            </div>
                                            <div class="col-sm">
                                                <div align="center">
                                                    <label>Tanda Tangan Kostumer</label>

                                                    <div style=" width: 100%;border: 1px solid #3a87ad;" id="canvas">
                                                        Canvas is not supported.
                                                    </div>

                                                    <script>
                                                        zkSignature.capture();
                                                    </script>


                                                    <label id="nama_pelanggan"><?=$data['data']->nama?></label>
                                                </div>
                                                <button id="clear">clear</button>
                                            </div>
                                            <div style="margin-top: 20px" class="col-sm">
                                                <h5>Komentar</h5>
                                                <textarea style="resize: none" class="form-control m-input m-input--air" id="komentar" rows="3"></textarea>
                                            </div>
                                            <div style="margin-top: 20px; " class="m-radio-inline col-xl-12 row">
                                                <div align="center" class="col-4">
                                                    <span style="font-size: 5rem" class="fa fa-frown-o"></span><br>
                                                    <label style="margin-left:10px" class="m-radio">
                                                        <input type="radio" id="kepuasan[]" name="kepuasan[]" value="1">
                                                        <span></span>
                                                    </label>
                                                </div>
                                                <div align="center" class="col-4">
                                                    <span style="font-size: 5rem" class="fa     fa-meh-o"></span><br>
                                                    <label style="margin-left:10px" class="m-radio">
                                                        <input type="radio" id="kepuasan[]" name="kepuasan[]" value="2">
                                                        <span></span>
                                                    </label>
                                                </div>
                                                <div align="center" class="col-4">
                                                    <span style="font-size: 5rem" class="fa     fa-smile-o"></span><br>
                                                    <label style="margin-left:10px" class="m-radio">
                                                        <input type="radio" id="kepuasan[]" name="kepuasan[]" value="3">
                                                        <span></span>
                                                    </label>
                                                </div>
                                                <div align="center" style="margin-top: 20px" class="col-sm">
                                                    <p>Saya mengisi form ini setelah mengecek semua AC yang telah di service/pasang dan menyatakan pekerjaan ini telah selesai setelah menekan tombol dibawah</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div align="center">
                                <button style="height: 60px;width: 300px; margin-top: 30px" type="button" class="btn btn-primary warna-biru btn_selesai" onclick="submit_form()">
                                    Selesai
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script type="text/javascript">
            function submit_form() {
                $(this).prop('disabled', true);
                $('.file-loading').show();

                $.post('<?=site_url('teknisi/kerjaan-proses/submit-form')?>', {
                    'id': '<?=$data['data']->id?>',
                    'tipe_spk': '<?=$data['tipe_spk']?>',
                    'id_spk': '<?=$data['id_spk']?>',
                    'komentar': $('#komentar').val(),
                    'kepuasan': $("input[name='kepuasan[]']:checked"). val()
                }, function(result, status) {
                    if (status == 'success') {
                        $(this).prop('disabled', false);
                        $('.file-loading').hide();

                        if (result.success) {
                            Swal.fire('Data Telah Tersimpan!', 'Data yang Anda buat telah disimpan.', 'success');
                            location.href='<?=site_url('teknisi/kerjaan-selesai')?>';
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
