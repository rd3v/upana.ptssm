    <!DOCTYPE html>
    <html lang="en" >
    <!-- begin::Head -->
    <head>
        <meta charset="utf-8" />
        <title>
            Teknisi | Dashboard
        </title>
        <meta name="description" content="Latest updates and statistic charts">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <!--begin::Web font -->
        <script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.16/webfont.js"></script>
        <script>
            WebFont.load({
                google: {"families":["Poppins:300,400,500,600,700","Roboto:300,400,500,600,700"]},
                active: function() {
                    sessionStorage.fonts = true;
                }
            });
        </script>
        <!--end::Web font -->
        <!--begin::Base Styles -->
        <!--begin::Page Vendors -->
        <link href="<?=base_url()?>assets/vendors/custom/fullcalendar/fullcalendar.bundle.css" rel="stylesheet" type="text/css" />
        <!--end::Page Vendors -->
        <link href="<?=base_url()?>assets/vendors/base/vendors.bundle.css" rel="stylesheet" type="text/css" />
        <link href="<?=base_url()?>assets/demo/default/base/style.bundle.css" rel="stylesheet" type="text/css" />
        <!-- begin:: Style tambahan -->
        <link href="<?=base_url()?>assets/demo/default/base/pelangi-style.css" rel="stylesheet" type="text/css">
        <link href="<?=base_url()?>assets/demo/default/base/sejuk-sukses-style.css" rel="stylesheet" type="text/css">
        <link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/teknisi-css/mobile_teknisi.css">
        <link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/teknisi-css/keadaan_style.css">
        <!-- end:: Style tambahan -->
        <!--end::Base Styles -->
        <link rel="shortcut icon" href="<?=base_url()?>assets/demo/default/media/img/logo/favicon.ico" />

        <style type="text/css">
            .swal2-icon.swal2-question { font-size: 13px; line-height: 65px; }
            .swal2-icon.swal2-warning { font-size: 13px; line-height: 65px; }
            .swal2-icon.swal2-info { font-size: 13px; line-height: 65px; }
            .swal2-icon.swal2-error { font-size: 13px; line-height: 65px; }
        </style>

        <!--begin::Base Scripts -->
        <script src="<?=base_url()?>assets/vendors/base/vendors.bundle.js" type="text/javascript"></script>
        <script src="<?=base_url()?>assets/demo/default/base/scripts.bundle.js" type="text/javascript"></script>
        <!--end::Base Scripts -->

        <script src="<?=base_url()?>assets/vendors/custom/sweetalert2/sweetalert2.all.min.js"></script>
        <script src="<?=base_url()?>assets/vendors/custom/promise-polyfill/promise.min.js"></script>
        <script src="<?=base_url()?>assets/app/js/helper.js" type="text/javascript"></script>

    </head>
    <!-- end::Head -->
    <!-- end::Body -->
    <body class="m-page--fluid m--skin- m-content--skin-light2 m-header--fixed m-header--fixed-mobile m-aside-left--enabled m-aside-left--skin-dark m-aside-left--offcanvas m-footer--push m-aside--offcanvas-default">
        <!-- begin:: Page -->

        <div class="judul-header-tambah-ac" align="center">
            <h3 class="judul" >Tambah Ac</h3>
        </div>
    </div>
    <div style="margin-top: 20px" class="col-sm-12">
        <form class="kt-form" method="POST" enctype="multipart/form-data" action="<?=site_url('teknisi/pemasangan/tambah-item/'.$data['kondisi'].'/'.$data['data']->id)?>">
            <div style="padding: 0px" class="kt-portlet__body">
                <div class="isi-content">
                    <div align="center" class="image-view">
                        <img id="tempat_foto" src="https://www.absolutefencinggear.com/shopping/images/Not_available.jpg">
                    </div>
                    <div class="uploaded">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="foto" name="foto" accept="image/*" onchange="readURL(this);">
                            <label class="custom-file-label" for="customFile">Pilih file foto</label>
                            <?=(isset($error_upload) ? $error_upload : '')?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Nama Item</label>
<?php if ($data['kondisi'] == 'sebelum') { ?>
                        <input type="text" class="form-control"  placeholder="input nama ac" id="nama" name="nama" value="<?=set_value('nama')?>">
<?php } else { ?>
                        <select class="form-control" name="nama">
                            <option value="">-</option>
<?php foreach ($data['item'] as $row) { ?>
                            <option value="<?=$row->id?>" <?=set_select('nama', $row->id)?>><?=$row->nama?></option>
<?php } ?>
                        </select>
<?php } ?>
                        <?=form_error('nama')?>
                    </div>
                    <div class="form-group form-group-last">
                        <label>Keterangan</label>
                        <textarea class="form-control" id="keterangan_<?=$data['kondisi']?>" name="keterangan_<?=$data['kondisi']?>" rows="5" placeholder="input keterangan.."><?=set_value('keterangan_'.$data['kondisi'])?></textarea>
                        <?=form_error('keterangan_'.$data['kondisi'])?>
                    </div>
                </div>
            </div>
            <div align="right" class="kt-portlet__foot">
                <a onclick="goBack()" style="padding:10px 20px" class="btn btn-warning">Batal</a>
                <button type="submit" style="padding:10px 20px" class="btn btn-success">Simpan</button>
            </div>
        </form>
        <!--begin::Page Snippets -->
        <script src="<?=base_url()?>assets/app/js/dashboard.js" type="text/javascript"></script>
        <!--end::Page Snippets -->
        <script>
            function readURL(input) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();

                    reader.onload = function (e) {
                        $('#tempat_foto')
                        .attr('src', e.target.result);
                    };

                    reader.readAsDataURL(input.files[0]);
                }
            }
        </script>
        <script>
            function goBack() {
                window.history.back();
            }
        </script>

    </body>
    <!-- end::Body -->
    </html>
