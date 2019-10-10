<!DOCTYPE html>
<html lang="en" >
<!-- begin::Head -->
<head>
    <meta charset="utf-8" />
    <title>
        Print Pengeluaran Material
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
                min-height : 275px !important;
            }

            th {
                font-size: 1.7rem !important;
                border: 1px solid black !important;
            }

            td {
                font-size: 1.7rem !important;
                border: 1px solid black;
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
                min-height: 0 !important;
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
        .m-datatable__pager-info {
            display: none;
        }


        th {
            background-color: #eaeaea;
        }


        @media print {
            th {
                background-color: #eaeaea;
                -webkit-print-color-adjust: exact;

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
                                    PENGELUARAN MATERIAL
                                </h2>
                                <h4>No Surat : <span name="no_surat_pengeluaran_material"><?=$data['data']->no_spk?></span></h4>
                                <h4>Tanggal : <span name="tanggal_surat"><?=tgl_indo($data['data']->tanggal)?></span></h4>
                                <h5>Tipe Pajak : <span name="tipe_pajak"><?=($data['data']->tipe_pajak == 1 ? 'Pajak' : 'Non-Pajak')?></span></h5>
                            </div>
                            <div style="margin-top: 20px" class="info row">
                                <div align="center" class="col-sm">
                                    <h5>Pelanggan : <span name="nama_pelanggan"><?=$data['data']->nama?></span></h5>
                                    <h5>Telpon : <span name="telpon_pelanggan"><?=$data['data']->telepon?></span></h5>
                                    <h5>Alamat: <span name="alamat_pelanggan"><?=$data['data']->alamat?></span></h5>

                                </div>
                                <div align="center" class="col-sm">
                                    <h5>Keterangan:</h5>
                                    <h5>
                                        <span name="keterangan_pesanan"><?=$data['data']->catatan?></span>
                                    </h5>
                                    <h5>Penanggung Jawab Gudang: <span name="admin_gudang"></span></h5>
                                </div>
                            </div>
                        </div>
                        <!--begin::Form-->
                        <form class="m-form m-form--fit m-form--label-align-right">
                            <div class="m-portlet m-portlet--mobile">
                                <div class="m-portlet__body tablenya">
                                    <!--begin: Datatable -->
                                    <table class="table" id="tbl_material">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Nama Material</th>
                                                <th>Teknisi</th>
                                                <th>Kostumer</th>
                                                <th>Pengeluaran</th>
                                                <th>Retur</th>
                                                <th>Total</th>
                                            </tr>
                                        </thead>
                                        <tbody>
<?php $i = 1; foreach ($data['item'] as $row) { ?>
                                            <tr>
                                                <td><?=$i?></td>
                                                <td><?=$row->nama?></td>
                                                <td><?=($row->id_teknisi ? '<i class="fa fa-check"> </i>' : '')?></td>
                                                <td><?=($row->id_pelanggan ? '<i class="fa fa-check"> </i>' : '')?></td>
                                                <td><?=($row->pengeluaran.' '.$row->satuan)?></td>
                                                <td><?=($row->kembali.' '.$row->satuan)?></td>
                                                <td><?=(($row->pengeluaran - $row->kembali).' '.$row->satuan)?></td>
                                            </tr>
<?php $i++; } ?>
                                            </tbody>
                                        </table>
                                        <div style="margin-left: 15%">
                                            <div class="col-xl-12 row">
                                                <div align="center" class="col-sm">
                                                    <div class="container-ttd-head" >
                                                        <p align="Center">Teknisi :</p>
                                                    </div>
                                                    <br>
                                                    <br>
                                                    <br>
                                                    <br>
                                                    <br>
                                                    <br>
                                                    <div class="container-ttd" >
                                                        <p name="cs_menangani" align="Center"></p>
                                                    </div>
                                                </div>
                                                <div align="center" class="col-sm">
                                                    <div class="container-ttd-head" >
                                                        <p align="Center">Penerima :</p>
                                                    </div>
                                                    <br>
                                                    <br>
                                                    <br>
                                                    <br>
                                                    <br>
                                                    <br>
                                                    <div class="container-ttd" >
                                                        <p name="cs_menangani" align="Center"><?=$data['data']->nama?></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div style="margin-top: 90px" class="form-group m-form__group ">
                                            <label  class="col-xl-12 col-form-label">
                                                Catatan
                                            </label>
                                            <div class="col-xl-12">
                                                <textarea style="resize: none" class="form-control m-input " id="catatan" rows="3" disabled><?=$data['data2']->catatan?></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
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
