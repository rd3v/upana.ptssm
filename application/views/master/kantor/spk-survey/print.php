<!DOCTYPE html>
<html lang="en" >
<!-- begin::Head -->
<head>
    <meta charset="utf-8" />
    <title>
        Print SPK Servis
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
    <style>
        @media print {

            .table {
                min-height : 300px !important;
            }

            th {
                font-size: 1.7rem !important;
            }

            td {
                font-size: 1.3rem !important;
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

            .tg th{font-family:Arial, sans-serif;font-size:14px;font-weight:normal;padding: 0px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:black;}

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
                            <div style="margin-top: 5px" align="center">
                                <table>
                                    <tr>
                                        <td>
                                            <img style="height: auto;width: 200px;margin: 30px;" src="<?=base_url()?>assets/demo/default/media/img/misc/logo_print.png">

                                        </td>
                                        <td>
                                            <h2 class="header-pesanan">
                                                SPK SERVIS
                                            </h2>
                                            <h4>No Surat : <span name="no_surat_jalan">0037/SSM/SPK-PSG/MKS/III/2019</span></h4>
                                            <h4>Tanggal : <span name="tanggal_surat">20/11/2019</span></h4>
                                            <h5>Tipe Pajak : <span name="tipe_pajak">Non-Pajak</span></h5>

                                        </td>
                                    </tr>
                                </table>

                                <hr>




                            </div>
                            <div style="margin-top: 10px" class="info row">
                                <div align="left" class="col-sm-6">
                                    <p>Nama Pelanggan: <span name="nama_pelanggan">Ahmad Rifaldi</span></p>
                                    <p>Telpon: <span name="telpon_pelanggan"> 085-145-322-137</span></p>
                                    <p>Tanggal Mulai: <span name="tgl_mulai"> 23/03/19 10.10</span></p>
                                    <p>Tanggal Selesai: <span name="tgl_selesai"> 24/03/19 11.10</span></p>
                                </div>
                                <div align="left" class="col-sm-6">
                                    <p>Alamat: <span name="alamat_pelanggan"> Jl. Poros Malino, Griya Riski Abadi blok C6</span></p>
                                    <p>Teknisi: <span name="nama_teknisi"> Ridwan</span></p>
                                    <p>Tipe Pajak: <span name="tipe_pajak">Non-Pajak</span></p>
                                    <p>Status: <span name="status_spk">SELESAI</span></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="m-portlet__body">
                        <h4 align="center">
                            Keterangan Pekerjaan
                        </h4>
                        <textarea disabled="" style="resize: none" class="form-control m-input m-input--solid" id="keterngan_pekerjaan" rows="4">2 unit servis pembersihan ac</textarea>
                    </div>
                    <div class="m-portlet__body">
                        <h4 align="center">
                            Pengecekan Awal
                        </h4>
                        <table style="width: 100%" class="tg">
                            <tr>
                                <th style="width: 30%" class="tg-s268" rowspan="2">Komponen</th>
                                <th style="width: 20%" class="tg-s268" colspan="2">Kondisi</th>
                                <th style="width: 50%" class="tg-s268" rowspan="2">Keterangan</th>
                            </tr>
                            <tr>
                                <td style="width: 10%" class="tg-s268">Ok</td>
                                <td style="width: 10%" class="tg-s268">Trouble</td>
                            </tr>
                            <tr>
                                <td class="tg-s268" colspan="3">Indoor Unit</td>
                                <td class="tg-s268" colspan="1"></td>
                            </tr>
                            <tr>
                                <td class="tg-s268">Evaporator</td>
                                <td  class="tg-s268"><span id="evaporator_ok" class="fa fa-check" style="display: block"></span></td>
                                <td class="tg-s268"><span  id="evaportaro_trouble" class="fa fa-check" style="display: none"></span></td>
                                <td id="evaporator_keterangan" class="tg-s268"></td>
                            </tr>
                            <tr>
                                <td class="tg-s268">Sensor</td>
                                <td  class="tg-s268"><span id="sensor_ok" class="fa fa-check" style="display: block"></span></td>
                                <td class="tg-s268"><span  id="sensor_trouble" class="fa fa-check" style="display: none"></span></td>
                                <td id="sensor_keterangan" class="tg-s268"></td>
                            </tr>
                            <tr>
                                <td class="tg-s268">Fan Motor Indoor</td>
                                <td  class="tg-s268"><span id="fanmotor_indoor_ok" class="fa fa-check" style="display: none"></span></td>
                                <td class="tg-s268"><span  id="fanmotor_indoor_trouble" class="fa fa-check" style="display: block"></span></td>
                                <td id="fanmotor_indoor_keterangan" class="tg-s268">Ganti</td>
                            </tr>
                            <tr>
                                <td class="tg-s268">Dynamo Swing</td>
                                <td  class="tg-s268"><span id="" class="fa fa-check" style="display: block"></span></td>
                                <td class="tg-s268"><span  id="" class="fa fa-check" style="display: none"></span></td>
                                <td id="" class="tg-s268"></td>
                            </tr>
                            <tr>
                                <td class="tg-s268">Pipa Drain</td>
                                <td  class="tg-s268"><span id="" class="fa fa-check" style="display: none"></span></td>
                                <td class="tg-s268"><span  id="" class="fa fa-check" style="display: block"></span></td>
                                <td id="" class="tg-s268">Diperbaiki</td>
                            </tr>
                            <tr>
                                <td class="tg-s268" colspan="3">Outdoor Unit</td>
                                <td class="tg-s268" colspan="1"></td>
                            </tr>
                            <tr>
                                <td class="tg-s268">Kondensor</td>
                                <td  class="tg-s268"><span id="" class="fa fa-check" style="display: block;"></span></td>
                                <td class="tg-s268"><span  id="" class="fa fa-check" style="display: none"></span></td>
                                <td id="" class="tg-s268"></td>
                            </tr>
                            <tr>
                                <td class="tg-s268">Motor Fan Outdoor</td>
                                <td  class="tg-s268"><span id="" class="fa fa-check" style="display: block;"></span></td>
                                <td class="tg-s268"><span  id="" class="fa fa-check" style="display: none"></span></td>
                                <td id="" class="tg-s268"></td>
                            </tr>
                            <tr>
                                <td class="tg-s268">Kapasitor</td>
                                <td  class="tg-s268"><span id="" class="fa fa-check" style="display: block;"></span></td>
                                <td class="tg-s268"><span  id="" class="fa fa-check" style="display: none"></span></td>
                                <td id="" class="tg-s268"></td>
                            </tr>
                            <tr>
                                <td class="tg-s268">Kondensor fan</td>
                                <td  class="tg-s268"><span id="" class="fa fa-check" style="display: block;"></span></td>
                                <td class="tg-s268"><span  id="" class="fa fa-check" style="display: none"></span></td>
                                <td id="" class="tg-s268"></td>
                            </tr>
                            <tr>
                                <td class="tg-s268">Over Load</td>
                                <td  class="tg-s268"><span id="" class="fa fa-check" style="display: block;"></span></td>
                                <td class="tg-s268"><span  id="" class="fa fa-check" style="display: none"></span></td>
                                <td id="" class="tg-s268"></td>
                            </tr>
                            <tr>
                                <td class="tg-s268">Kompressor</td>
                                <td  class="tg-s268"><span id="" class="fa fa-check" style="display: block;"></span></td>
                                <td class="tg-s268"><span  id="" class="fa fa-check" style="display: none"></span></td>
                                <td id="" class="tg-s268"></td>
                            </tr>
                            <tr>
                                <td class="tg-s268">Pipa</td>
                                <td  class="tg-s268"><span id="" class="fa fa-check" style="display: block;"></span></td>
                                <td class="tg-s268"><span  id="" class="fa fa-check" style="display: none"></span></td>
                                <td id="" class="tg-s268"></td>
                            </tr>
                            <tr>
                                <td class="tg-s268" colspan="4">
                                    Kondisi Kompressor (detail)
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-s268">Cek</td>
                                <td class="tg-s268">Sebelum</td>
                                <td class="tg-s268">Sesudah</td>
                                <td class="tg-s268" rowspan="3"></td>
                            </tr>
                            <tr>
                                <td class="tg-s268">Low Press</td>
                                <td id="low_press_sebelum" class="tg-s268">23</td>
                                <td id="low_press_sebelum" class="tg-s268">30</td>
                            </tr>
                            <tr>
                                <td class="tg-s268">High Press</td>
                                <td id="high_press_sebelum" class="tg-s268">40</td>
                                <td id="high_press_sebelum" class="tg-s268">50</td>
                            </tr>
                        </table>
                        <table style="width: 100%" class="tg">
                            <tr>
                                <td style="border-top: transparent;" class="tg-s268" colspan="6">
                                    Cleaning Indoor - Outdoor
                                </td>
                            </tr>
                            <tr >
                                <td style="width: 20%" class="tg-s268">Evaporato/kondensor</td>
                                <td style="width: 13.3%" id="" class="tg-s268">-</td>
                                <td style="width: 20%" class="tg-s268">Casing Indoor</td>
                                <td style="width: 13.3%" id="" class="tg-s268">-</td>
                                <td style="width: 20%" class="tg-s268">Filter Udara</td>
                                <td style="width: 13.3%" id="" class="tg-s268">-</td>
                            </tr>
                            <tr>
                                <td style="width: 20%" class="tg-s268">Fan Blower</td>
                                <td style="width: 13.3%" id="" class="tg-s268">-</td>
                                <td style="width: 20%" class="tg-s268">Bak drain</td>
                                <td style="width: 13.3%" id="" class="tg-s268">-</td>
                                <td style="width: 20%" class="tg-s268">Saluaran drain</td>
                                <td style="width: 13.3%" id="" class="tg-s268">-</td>
                            </tr>
                            <tr>
                                <td style="width: 20%" class="tg-s268">Kompresor</td>
                                <td style="width: 13.3%" id="" class="tg-s268">-</td>
                                <td style="width: 20%" class="tg-s268">Fan Blade</td>
                                <td style="width: 13.3%" id="" class="tg-s268">-</td>
                                <td style="width: 20%" class="tg-s268">Casing outdoor</td>
                                <td style="width: 13.3%" id="" class="tg-s268">-</td>
                            </tr>
                        </table>
                        <table style="width: 100%" class="tg tlu">
                            <tr>
                                <td style="border-top: transparent;" class="tg-s268" colspan="4">
                                    Standart Instalasi Unit
                                </td>
                            </tr>
                            <tr>
                                <td style="width: 30%" class="tg-s268">1. Brecket in/outdoor</td>
                                <td style="width: 20%" id="" class="tg-s268">-</td>
                                <td style="width: 30%" class="tg-s268">4. Instalasi listrik/wiring</td>
                                <td style="width: 20%" id="" class="tg-s268">-</td>
                            </tr>
                            <tr>
                                <td style="width: 30%" class="tg-s268">2. Penempatan Unit in/outdoor</td>
                                <td style="width: 20%" id="" class="tg-s268">-</td>
                                <td style="width: 30%" class="tg-s268">5. Panjang Pipa Instalasi</td>
                                <td style="width: 20%" id="" class="tg-s268">-</td>
                            </tr>
                            <tr>
                                <td style="width: 30%" class="tg-s268">3. Hamaflex/insulation</td>
                                <td style="width: 20%" id="" class="tg-s268">-</td>
                                <td style="width: 30%" class="tg-s268">6. Lain-lain</td>
                                <td style="width: 20%" id="" class="tg-s268">-</td>
                            </tr>
                        </table>
                        <table style="width: 100%" class="tg">
                            <tr>
                                <td style="border-top: transparent;" class="tg-s268" colspan="5">
                                    Standart Instalasi Unit
                                </td>
                            </tr>
                            <tr>
                                <td style="width: 20%" class="tg-s268">

                                </td>
                                <td style="width: 20%" class="tg-s268">
                                    AMP
                                </td>
                                <td style="width: 20%" class="tg-s268">
                                    Volt
                                </td>
                                <td style="width: 20%" class="tg-s268">
                                    Suhu
                                </td>
                                <td style="width: 20%" class="tg-s268">
                                    Status
                                </td>
                            </tr>
                            <tr>
                                <td style="width: 20%" class="tg-s268">
                                    Sebelum
                                </td>
                                <td style="width: 20%" class="tg-s268">
                                    -
                                </td>
                                <td style="width: 20%" class="tg-s268">
                                    -
                                </td>
                                <td style="width: 20%" class="tg-s268">
                                    -
                                </td>
                                <td style="width: 20%" class="tg-s268">
                                    -
                                </td>
                            </tr>
                            <tr>
                                <td style="width: 20%" class="tg-s268">
                                    Sesudah
                                </td>
                                <td style="width: 20%" class="tg-s268">
                                    -
                                </td>
                                <td style="width: 20%" class="tg-s268">
                                    -
                                </td>
                                <td style="width: 20%" class="tg-s268">
                                    -
                                </td>
                                <td style="width: 20%" class="tg-s268">
                                    -
                                </td>
                            </tr>
                            <tr>
                                <td style="width: 20%" class="tg-s268">
                                    Rekomendasi
                                </td>
                                <td style="width: 20%" class="tg-s268">
                                    -
                                </td>
                                <td style="width: 20%" class="tg-s268">
                                    -
                                </td>
                                <td style="width: 20%" class="tg-s268">
                                    -
                                </td>
                                <td style="width: 20%" class="tg-s268">
                                    -
                                </td>
                            </tr>
                        </table>
                    </div>
                    <div style="margin-top: 30px" class="m-portlet__body">
                        <div  class="form-group m-form__group row">
                            <label  class="col-xl-12">
                                Catatan
                            </label>
                            <div class="col-xl-12">
                                <textarea disabled="" style="resize: none" class="form-control m-input " id="catatan" rows="3">lorem ipsum dolor sit amet</textarea>
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
    var tbl_list_item_masuk = $('#tbl_rincian_spk_pemasangan').mDatatable({
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
                    field: 'No',
                    textAlign: 'center',

                },
                {
                    field: 'Nama Barang',
                    textAlign: 'center',
                },
                {
                    field: 'Jumlah',
                    textAlign: 'center',
                },
                {
                    field: 'Keterangan',
                    textAlign: 'center',
                }

                ],
            });
        </script>
        <script type="text/javascript">
            var delayInMilliseconds = 1000; //1 second

            setTimeout(function() {
                print();
            }, delayInMilliseconds);
        </script>
        </html>
