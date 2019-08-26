        <link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/teknisi-css/keadaan_style.css">

        <div class="judul-header" align="center">
            <h3 class="judul" >Keadaan Sebelum</h3>
        </div>
    </div>
    <div style="margin-top: 20px" class="col-sm-12">
        <div align="center">
            <a href="<?=site_url('teknisi/pemasangan/tambah-item/sebelum/'.$data['data']->id)?>" class="btn btn-primary btn_tambah_foto"><i class="fa fa-plus"></i>
                Tambah Foto
            </a>
        </div>
        <div style="padding: 0px" class="kt-portlet__body">
            <div class="isi-content">
<?php foreach ($data['item'] as $row) { ?>
                <div class="portlet-ac" id="item-<?=$row->id?>">
                    <div class="row">
                        <div class="col-4">
                            <img class="gambar_ac" src="<?=upload_url('pengerjaan/item').$row->foto_sebelum?>">
                        </div>
                        <div class="col-8">
                            <div class="form-group">
                                <h5><?=$row->nama?></h5>
                                <hr>
                                <p>Sebelum :  <?=$row->keterangan_sebelum?></p>
                                <p style="text-align: right"> <a href="javascript:;" onclick="delete_item('<?=$row->id?>')"> <i class="fa fa-trash"></i> Hapus </a> </p>
                            </div>
                        </div>
                    </div>
                </div>
<?php } ?>
            </div>
            <a href="<?=site_url('teknisi/pemasangan/sesudah/'.$data['id_spk'])?>" id="btn_selanjutnya" class="btn btn-success">
                >> 3. Proses Selanjutnya >>
            </a>
        </div>

        <script type="text/javascript">

            function delete_item(id) {
                swadel({
                    preConfirm: function() {
                        return new Promise(function(resolve) {
                            $.post('<?=site_url('teknisi/pemasangan/delete-item')?>', {
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
                            $('#item-'+result.value.id).remove();
                        } else {
                            show_toast('Data gagal dihapus.', 'error');
                        }
                    }
                });
            }
        </script>
