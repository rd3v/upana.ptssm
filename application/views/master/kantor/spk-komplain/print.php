<!DOCTYPE html>
<html lang="en" >
<!-- begin::Head -->
<head>
    <meta charset="utf-8" />
    <title>
        Print SPK Pemasangan
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
    <!-- <link href="<?=base_url()?>assets/demo/default/base/card-a5.css" rel="stylesheet" type="text/css" -->
    <!-- end:: Style tambahan -->
    <!--end::Base Styles -->
    <link rel="shortcut icon" href="<?=base_url()?>assets/demo/default/media/img/logo/favicon.ico" />
    <style>
        @media print {

            .table {
                min-height : 300px !important;
            }

            th {
                font-size: 1.7rem !important;
            }

            td {
                font-size: 1.5rem !important;
            }

            p {
                font-size: 1.8rem !important;
            }
            label {
                font-size: 1.6rem !important;
            }
            input {
                font-size: 1.6rem !important;
            }
            h3 {
                font-size: 2rem !important;
            }

            .font-print {
                font-size: 1.8rem !important;
            }

            .m-portlet .m-portlet__body {
                padding: 2.2rem 2.2rem;
            }

            .informasinya {
                padding-bottom: .1rem !important;
            }

            .col-form-label {
                padding-top : 0px !important;
                padding-bottom: 0px !important;
            }

            .m-datatable__table {
                min-height: 40px !important;
            }

            .input_nama_material {
                background-color: rgba(255,255,255,.0) !important;
                border-color: rgba(255,255,255,.0)!important;
            }

            .input_material {
                background-color: rgba(255,255,255,.0) !important;
                border-color: rgba(255,255,255,.0)!important;
            }

            .m-datatable__pager-info{
                display: none;
            }

        }

    </style>
</head>
<!-- end::Head -->
<!-- end::Body -->
<body class="m-page--fluid m--skin- m-content--skin-light2 m-header--fixed m-header--fixed-mobile m-aside-left--enabled m-aside-left--skin-dark m-aside-left--offcanvas m-footer--push m-aside--offcanvas-default">
    <div class="m-content">
        <div class="face face-front">
            <div class="row">
                <div class="col-xl-12">
                    <div class="m-portlet m-portlet--tab">
                        <div class="m-portlet__head header">
                            <div style="margin-top: 10px" align="center">
                                <img style="height: auto;width: 280px" src="<?=base_url()?>assets/demo/default/media/img/misc/logo_print.png">
                                <h2 class="header-pesanan">
                                    SPK KOMPLAIN
                                </h2>
                                <h4>No Surat : <span name="no_surat_jalan"><?=$data['data']->no_spk?></span></h4>
                                <h4>Tanggal : <span name="tanggal_surat"><?=tgl_indo($data['data']->tanggal)?></span></h4>
                                <h5>Tipe Pajak : <span name="tipe_pajak">Non-Pajak</span></h5>
                            </div>
                            <div style="margin-top: 20px" class="info row">
                                <div align="center" class="col-sm">
                                    <h5>Nama Pelanggan: <span name="nama_pelanggan"><?=$data['customer']->nama?> (<?=$data['customer']->id?>)</span></h5>
                                    <h5>Telpon: <span name="telpon_pelanggan"> <?=$data['customer']->telepon?></span></h5>
                                    <h5>Tanggal Mulai: <span name="tgl_mulai"> <?=format_tgl($data['data']->waktu_pengerjaan, TRUE)?></span></h5>
                                    <h5>Tanggal Selesai: <span name="tgl_selesai"> 24/03/19 11.10</span></h5>
                                </div>
<?php $status = ['Aktif', 'Progress', 'Selesai', 'Batal']; ?>
                                <div align="center" class="col-sm">
                                    <h5>Alamat: <span name="alamat_pelanggan"> <?=$data['customer']->alamat?></span></h5>
                                    <h5>Teknisi: <span name="nama_teknisi"> Ridwan</span></h5>
                                    <h5>Status: <span name="status_spk"><?=$status[$data['data']->status]?></span></h5>
                                </div>
                            </div>
                        </div>
                        <div class="m-portlet__body">
                            <h4 align="center">Keterangan Komplain</h4>
                            <textarea style="resize: none;font-size: 1.8rem !important;text-align: center;" class="form-control m-input m-input--solid" name="keterangan_komplain"rows="5"><?=$data['data']->keterangan?></textarea>
                        </div>
                        <div class="m-portlet__body">
                            <h4 align="center">Respon</h4>
                            <h5>Customer, Puaskh anda dengan service kami ?</h5>
                            <div class="m-radio-inline">
                                <label class="m-radio">
                                    <input type="radio" name="kepuasan_servis_pelanggan" disabled="" value="1" <?=($data['data']->kepuasan === '1' ? 'checked' : '')?>>
                                    <b>Ya</b>
                                    <span></span>
                                </label>
                                <label class="m-radio">
                                    <input disabled="" type="radio" name="kepuasan_servis_pelanggan" value="2" <?=($data['data']->kepuasan === '0' ? 'checked' : '')?>>
                                    <b>Tidak</b>
                                    <span></span>
                                </label>
                            </div>
                            <h5>Komentar :</h5>
                            <textarea style="resize: none;font-size: 1.8rem !important;text-align: center;" class="form-control m-input m-input--solid" disabled="" name="komentar_pelanggan"rows="3"><?=$data['data']->komentar?></textarea>
                        </div>
                        <div class="row col-xl-12">
                            <div align="center" class="col-sm">
                                <h5>Nama, Paraf dan Cap Perusahaan</h5>
                                <br>
                                <br>
                                <br>
                                <br>
                                <div style="width: 15vw;border-bottom: 1px solid black"></div>
                            </div>
                            <div align="center" class="col-sm">
                                <h5>Nama, Paraf Teknisi/Sopir</h5>
                                <br>
                                <br>
                                <br>
                                <br>
                                <div style="width: 15vw;border-bottom: 1px solid black"></div>
                            </div>
                            <div align="center" class="col-sm">
                                <h5>Nama, Paraf Marketing</h5>
                                <br>
                                <br>
                                <br>
                                <br>
                                <div style="width: 15vw;border-bottom: 1px solid black"></div>
                            </div>
                            <div align="center" class="col-sm">
                                <h5>Nama, Paraf dan Cap Admin</h5>
                                <br>
                                <br>
                                <br>
                                <br>
                                <div style="width: 15vw;border-bottom: 1px solid black"></div>
                            </div>
                        </div>
                        <div style="margin-top: 30px" class="m-portlet__body">
                            <div  class="form-group m-form__group row">
                                <label  class="col-xl-12">
                                    Catatan
                                </label>
                                <div class="col-xl-12">
                                    <textarea disabled="" style="resize: none" class="form-control m-input " id="catatan" rows="3"><?=$data['data']->catatan?></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
<!-- end::Body -->
<script src="<?=base_url()?>assets/vendors/base/vendors.bundle.js" type="text/javascript"></script>
<script src="<?=base_url()?>assets/demo/default/base/scripts.bundle.js" type="text/javascript"></script>
<script src="<?=base_url()?>assets/app/js/dashboard.js" type="text/javascript"></script>
<script type="text/javascript">
    var delayInMilliseconds = 1000; //1 second

    setTimeout(function() {
        print();
        close();
    }, delayInMilliseconds);
</script>

        </html>
