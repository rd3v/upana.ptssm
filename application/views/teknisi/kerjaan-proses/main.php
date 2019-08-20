        <div class="m-content">
            <div>
                <div  style="width: 100vw" class="col-xl-12">
                    <div class="m-portlet warna-merah m-portlet--bordered-semi m-portlet--skin-dark m-portlet--full-height ">
                        <div class="m-portlet__body body_menu_3a row">
                            <div align="left"  class="col-4">
                                <span>
                                    <i style="font-size: 4rem; color: white; margin-top: 10px" class="fa fa-refresh"></i>
                                </span>
                            </div>
                            <div style="margin-top: 20px" align="right"  class="col-8">
                                <h3>Kerjaan Masuk</h3>
                            </div>
                            <!--begin::Widget 7-->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div  class="row">
            <div class="col-xl-12">
                <div align="center">
<?php foreach ($data['data'] as $row) { ?>
                    <div  align="left" class="m-portlet m-portlet--mobile list-kerjaan" id="item-<?=strtolower($row->tipe_spk).'-'.$row->id?>" style="width: 97vw;">
                        <div class="row">
                            <div class="col-8" onclick="location.href='<?=site_url('teknisi/rincian-spk/'.strtolower($row->tipe_spk).'/'.$row->id)?>'">
                                <p id="nama_pelanggan[0]" class="nama-pelanggan"><?=$row->nama?></p>
                                <p id="tipe_kerjaan[0]" class="tipe-kerjaan"><?=$row->tipe_spk?></p>
                            </div>
                            <div class="col-4">
                                <button  class="btn btn-primary warna-biru" onclick="location.href='<?=site_url('teknisi/kerjaan-proses/'.strtolower($row->tipe_spk).'/'.$row->id)?>'">
                                    Proses >>
                                </button>
                            </div>
                        </div>
                    </div>
<?php } ?>
                </div>
                <div class="bagian-previous">
                    <a style="margin-left: 10px" href="javascript:history.back()" class="previous">&laquo; Previous</a>
                </div>
            </div>
        </div>

        <script type="text/javascript">
            function kerjakan(tipe_spk, id_spk) {
                swal({
                    title: 'Apakah anda yakin ingin mengerjakan tugas ini?',
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Ya, Kerjakan!',
                    cancelButtonText: 'Tutup',
                    preConfirm: function() {
                        return new Promise(function(resolve) {
                            $.post('<?=site_url('teknisi/kerjaan-proses/kerjakan')?>', {
                                'tipe_spk': tipe_spk,
                                'id_spk': id_spk
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
                            show_toast('Kerjaan ini telah dipindahkan ke menu "On Going".', 'success');
                            $('#item-'+tipe_spk+'-'+id_spk).remove();
                        } else {
                            show_toast('Data gagal ter-update.', 'error');
                        }
                    }
                });
            }
        </script>
