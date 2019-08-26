<!DOCTYPE html>
<html lang="en" >
<!-- begin::Head -->
<head>
    <meta charset="utf-8" />
    <title>
        Print Surat Jalan
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

        .table {
            min-height : 500px !important;
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

        .surat_jalan td, th {
            padding: 10px;
        }

        th {
            background-color: #eaeaea;
        }

        table {
            margin: 20px;
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
                                    SURAT JALAN
                                </h2>
                                <h4>No Surat : <span name="no_surat_jalan"><?=$data['data']->no_surat?></span></h4>
                                <h4>Tanggal : <span name="tanggal_surat"><?=tgl_indo($data['data']->tanggal)?></span></h4>
                                <h5>Tipe Pajak : <span name="tipe_pajak"><?=($data['data']->tipe_pajak == 1 ? 'Pajak' : 'Non-Pajak')?></span></h5>
                            </div>
                            <div class="col-xl-12 row">
                                <div align="center" class="col-sm">
                                    <h4>Pemesan</h4>
                                    <h5>Nama : <span name="nama_pemesan"><?=$data['customer']->nama?></span></h5>
                                    <h5>Alamat : <span name="alamat_pemesan"><?=$data['customer']->alamat?></span></h5>
                                    <h5>Telpon : <span name="telpon_pemesan"><?=$data['customer']->telepon?></span></h5>
                                </div>
                                <div align="center" class="col-sm">
                                    <h4>Penerima</h4>
                                    <h5>Nama : <span name="nama_penerima"><?=$data['customer']->nama?></span></h5>
                                    <h5>Alamat : <span name="alamat_penerima"><?=$data['customer']->alamat?></span></h5>
                                    <h5>Telpon : <span name="telpon_penerima"><?=$data['customer']->telepon?></span></h5   >
                                </div>
                            </div>
                        </div>
                        <div class="m-portlet__body">
                            <!--end: Search Form -->
                            <!--begin: Datatable -->
                            <!-- <div class="m_datatable" id="local_data"></div> -->
                            <p>Kami kirimkan barang-barang tersebut dibawah ini dengan kendaraan <span id="merek_kendaraan"><?=$data['data']->kendaraan?></span> No. <span id="dd_kendaraan"><?=$data['data']->nopol?></span></p>
                            <table style="width: 100%" class="surat_jalan" id="table_surat_jalan">
                                <thead>
                                    <tr>
                                        <th>Qty</th>
                                        <th>Satuan</th>
                                        <th>Nama Barang</th>
                                    </tr>
                                </thead>
                                <tbody>
<?php foreach ($data['item'] as $row) { $stock = $this->crud->gd('master_stock', ['id' => $row->id_stock]);
 ?>
                                    <tr>
                                        <td><?=$row->jumlah?></td>
                                        <td>Unit</td>
                                        <td><?=$stock->nama?></td>
                                    </tr>
<?php } ?>
                                </tbody>
                            </table>
                            <!--end: Datatable -->
                            <div class="row">
                                <div align="center" class="col-sm">
                                    <p>Tanda Terima</p>
                                    <br>
                                    <br>
                                    <br>
                                    <br>
                                    <div style="width: 15vw;border-bottom: 1px solid black"></div>
                                </div>
                                <div align="center" class="col-sm">
                                    <p>Hormat Kami</p>
                                    <br>
                                    <br>
                                    <br>
                                    <br>
                                    <div style="width: 15vw;border-bottom: 1px solid black"></div>
                                </div>
                            </div>
                            <div style="margin-top: 90px" class="form-group m-form__group row">
                                <label  class="col-xl-12 col-form-label">
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
    var tbl_rincian_surat_jalan = $('#tbl_rincian_surat_jalan').mDatatable({
        data: {
            saveState: {cookie: false},
                    /*type: 'remote',
                    source: {
                      read: {
                        // sample GET method
                        method: 'GET',
                        url: 'https://keenthemes.com/metronic/preview/inc/api/datatables/demos/default.php',
                        map: function(raw) {
                          // sample data mapping
                          var dataSet = raw;
                          if (typeof raw.data !== 'undefined') {
                            dataSet = raw.data;
                          }
                          return dataSet;
                        },
                      },
                    },
                    pageSize: 10,
                    serverPaging: true,
                    serverFiltering: true,
                    serverSorting: true,*/
                },
                // layout definition
                layout: {
                    theme: 'default', // datatable theme
                    class: '', // custom wrapper class
                    scroll: true, // enable/disable datatable scroll both horizontal and vertical when needed.
                    // height: 450, // datatable's body's fixed height
                    footer: false // display/hide footer
                },

                // column sorting
                sortable: false,
                search: {
                    input: $('#generalSearch'),
                },
                columns: [

                {
                    field: 'Qty',
                    textAlign: 'center',

                },
                {
                    field: 'Satuan',
                    textAlign: 'center',

                },
                {
                    field: 'Nama Barang',
                    textAlign: 'center',

                }

                ],
            });
        </script>
        <script type="text/javascript">
            var delayInMilliseconds = 1000; //1 second

            setTimeout(function() {
                print();
                close();
            }, delayInMilliseconds);
        </script>
        </html>
