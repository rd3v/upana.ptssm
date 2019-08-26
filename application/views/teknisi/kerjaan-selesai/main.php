        <div class="m-content">
            <div>
                <div  style="width: 100vw" class="col-xl-12">
                    <div class="m-portlet warna-merah m-portlet--bordered-semi m-portlet--skin-dark m-portlet--full-height ">
                        <div class="m-portlet__body body_menu_2a row">
                            <div align="left"  class="col-4">
                                <span>
                                    <i style="font-size: 4rem; color: white; margin-top: 10px" class="fa fa-check"></i>
                                </span>
                            </div>
                            <div style="margin-top: 20px" align="right"  class="col-8">
                                <h3>Tugas Selesai</h3>
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
                    <div  align="left" class="m-portlet m-portlet--mobile list-kerjaan" id="list_kerjaan[0]" style="width: 97vw;">
                        <div class="row">
                            <div class="col-8">
                                <p id="nama_pelanggan[0]" class="nama-pelanggan"><?=$row->nama?></p>
                                <p id="tipe_kerjaan[0]" class="tipe-kerjaan"><?=$row->tipe_spk?></p>
                            </div>
                            <div class="col-4">
                                <button onclick="window.location.href = '<?=site_url('teknisi/kerjaan-selesai/rincian/'.strtolower($row->tipe_spk).'/'.$row->id)?>';"  class="btn btn-primary warna-biru btn_rincian">
                                    Rincian
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
