        <link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/teknisi-css/keadaan_style.css">

        <div class="judul-header-sesudah" align="center">
            <h3 class="judul" >Keadaan Sesudah</h3>
        </div>
    </div>
    <div style="margin-top: 20px" class="col-sm-12">
        <div align="center">
            <a href="<?=site_url('teknisi/pemasangan/tambah-item/sesudah/'.$data['data']->id)?>" class="btn btn-success btn_tambah_foto"><i class="fa fa-plus"></i>
                Tambah Foto
            </a>
        </div>
        <div style="padding: 0px" class="kt-portlet__body">
            <div class="isi-content">
<?php foreach ($data['item'] as $row) { ?>
                <div class="portlet-ac">
                    <div class="row">
                        <div  class="col-4">
                            <img class="gambar_ac" src="<?=upload_url('pengerjaan/item').$row->foto_sesudah?>">
                        </div>
                        <div class="col-8">
                            <div class="form-group">
                                <h5><?=$row->nama?></h5>
                                <hr>
                                <p>Sebelum :  <?=$row->keterangan_sebelum?></p>
                                <p>Sesudah :  <?=$row->keterangan_sesudah?></p>
                            </div>
                        </div>
                    </div>
                </div>
<?php } ?>
            </div>
            <a href="<?=site_url('teknisi/kerjaan-proses/tanda-terima/'.$data['data']->tipe_spk.'/'.$data['data']->id_spk)?>" id="btn_selanjutnya" class="btn btn-success">
                >> 4. Form Serah Terima >>
            </a>
        </div>
