                <div class="m-grid__item m-grid__item--fluid m-wrapper">
                    <!-- BEGIN: Subheader -->
                    <div class="m-subheader ">
                        <div class="d-flex align-items-center">
                            <div class="mr-auto">
                                <h3 class="m-subheader__title m-subheader__title--separator">
                                    Rincian SPK Pemasangan
                                </h3>
                                <ul class="m-subheader__breadcrumbs m-nav m-nav--inline">
                                    <li class="m-nav__item m-nav__item--home">
                                        <a href="index.html" class="m-nav__link m-nav__link--icon">
                                            <i class="m-nav__link-icon la la-home"></i>
                                        </a>
                                    </li>
                                    <li class="m-nav__separator">
                                        -
                                    </li>
                                    <li class="m-nav__item">
                                        <a href="#" class="m-nav__link">
                                            <span class="m-nav__link-text">
                                                Manajemen Pesanan
                                            </span>
                                        </a>
                                    </li>
                                    <li class="m-nav__separator">
                                        -
                                    </li>
                                    <li class="m-nav__item">
                                        <a href="<?= site_url() ?>kantor/spk-pemasangan" class="m-nav__link">
                                            <span class="m-nav__link-text">
                                                SPK Pemasangan
                                            </span>
                                        </a>
                                    </li>
                                    <li class="m-nav__separator">
                                        -
                                    </li>
                                    <li class="m-nav__item">
                                        <a href="<?= site_url() ?>kantor/spk-pemasangan/rincian/<?=$data['data']->id?>" class="m-nav__link">
                                            <span class="m-nav__link-text">
                                                Rincian
                                            </span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- END: Subheader -->
                    <div class="m-content">
                        <div class="row">
                            <div class="col-xl-12">
                                <div class="m-portlet m-portlet--mobile">
                                    <div class="m-portlet__head header">
                                        <h3 class="header-pesanan">
                                        </h3><br>
                                        <button onclick="window.open('<?= site_url() ?>kantor/spk-pemasangan/cetak/<?=$data['data']->id?>')" style="padding: 5px;width: 200px" class="btn btn-primary">
                                            Print SPK Pemasangan
                                        </button>
                                        <h3 name="no_surat_jalan" class="header-pesanan-no">
                                            <i class="fa fa-check-circle"> </i> <?=$data['data']->no_spk?>
                                        </h3><br><br>
                                        <div class="info row">
                                            <div class="col-sm-4">
                                                <h5>Detail Pelanggan</h5>
                                                <hr>
                                                <p id="tanggal_surat">
                                                    <i class="flaticon-calendar-2"> </i><?=tgl_indo($data['data']->tanggal)?>
                                                </p>
                                                <p id="nama_pelanggan">
                                                    <i class="flaticon-users"> </i> <?=$data['customer']->nama?> (<?=$data['customer']->id?>)
                                                </p>
                                                <p id="no_telpon">
                                                    <i class="fa fa-phone"> </i> <?=$data['customer']->telepon?>
                                                </p>
                                                <p id="email_pelanggan"><i class="fa fa-envelope-o "> </i> <?=$data['customer']->email?>
                                                </p>
                                                <p id="alamat_pelanggan"><i class="flaticon-placeholder-1"> </i> <?=$data['customer']->alamat?>
                                                </p>
                                                <p> Tipe Pelanggan : <?=($data['customer']->tipe == 1 ? 'Korporasi' : 'Personal')?></p>

                                            </div>
                                            <div class="col-sm">
                                                <h5>Pekerjaan</h5>
                                                <hr>
                                                <p>
                                                    Tanggal Mulai :
                                                    <span id="tgl_mulai"><?=format_tgl($data['data']->waktu_pengerjaan, TRUE)?></span>
                                                </p>
                                                <p>
                                                    Tanggal Selesai : <span id="tgl_selesai">25/03/19 11.15</span>
                                                </p>
<?php $status = ['Aktif', 'Progress', 'Selesai', 'Batal']; ?>
                                                <p>Teknisi : <span id="nama_teknisi">Ridwan</span></p>
                                                <p>Status : <span id="status_spk"><?=$status[$data['data']->status]?></span></p>
                                                <p>Kepuasan Konsumen: <span id="puas">Puas</span></p>
                                                <p>Catatan : <span> <?=$data['data']->catatan?></span>
                                                </p>
                                            </div>

                                            <hr>

                                            <div class="col-sm-4">
                                                <h5>Keuangan</h5>
                                                <hr>
                                                <p>Tipe Pajak : <span id="tipe_pajak"><?=($data['data']->tipe_pajak == 1 ? 'Pajak' : 'Non-Pajak')?></span></p>

                                                <p>No Invoice : <span id="nama_teknisi">002/SSM/02/2019</span></p>
                                                <p>Surat Jalan : <span>SJ/SSM/IX/2019 </span></p>
                                                <p>Surat <br> Pengeluaran <br> Material : <span> -  </span></p>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="m-portlet__body">
                                        <!--end: Search Form -->
                                        <!--begin: Datatable -->
                                        <!-- <div class="m_datatable" id="local_data"></div> -->
                                        <table class="table" id="tbl_rincian_spk_pemasangan">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Nama Barang</th>
                                                    <th>Jumlah</th>
                                                    <th>Keterangan</th>
                                                </tr>
                                            </thead>
                                            <tbody>
<?php $i = 1; foreach ($data['item'] as $row) { ?>
                                                <tr>
                                                    <td><?=$i?></td>
                                                    <td><?=$row->nama?></td>
                                                    <td><?=$row->jumlah?></td>
                                                    <td><?=$row->keterangan?></td>
                                                </tr>
<?php $i++; } ?>
                                            </tbody>
                                        </table>
                                        <!--end: Datatable -->
                                    </div>
                                    <div class="m-portlet__body">
                                        <div  class="form-group m-form__group row">
                                            <label  class="col-xl-12">
                                                Catatan
                                            </label>
                                            <div class="col-xl-12">
                                                <textarea disabled="" style="resize: none" class="form-control m-input " id="catatan" rows="3">lorem ipsum dolor sit amet</textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="m-portlet__body gambar_pemasangan">
                                        <div class="m-accordion__item">
                                            <div class="m-accordion__item-head collapsed" role="tab" id="m_accordion_1_item_3_head" data-toggle="collapse" href="#m_accordion_1_item_3_body" aria-expanded="    false">
                                                <span class="m-accordion__item-title">
                                                    <button class="btn btn-primary">
                                                        Lihat Gambar Pemasangan
                                                    </button>
                                                </span>
                                                <span class="m-accordion__item-mode"></span>
                                            </div>
                                            <div class="m-accordion__item-body collapse" id="m_accordion_1_item_3_body" class=" " role="tabpanel" aria-labelledby="m_accordion_1_item_3_head" data-parent="#m_accordion_1">
                                                <div class="m-accordion__item-content">
                                                    <div class="row">
                                                        <div class="heading col-sm">
                                                            <h5 align="center">Sebelum</h5>
                                                        </div>
                                                        <div class="heading col-sm">
                                                            <h5 align="center">Sesudah</h5>
                                                        </div>
                                                    </div>
                                                    <div id="item[0]" class="row">
                                                        <div class=" col-sm">
                                                            <img name="gambar_sebelum" class="gambar" src="https://s1.bukalapak.com/img/1376695601/w-1000/LG_AC_INVERTER_3_4_PK_T08EMV1_TERMURAH.jpg">

                                                        </div>
                                                        <div class=" col-sm">
                                                            <img name="gambar_sesudah" class="gambar" src="https://s1.bukalapak.com/img/1376695601/w-1000/LG_AC_INVERTER_3_4_PK_T08EMV1_TERMURAH.jpg">

                                                        </div>
                                                    </div>
                                                    <div id="item[1]" class="row">
                                                        <div class=" col-sm">
                                                            <img name="gambar_sebelum" class="gambar" src="http://cdn2.tstatic.net/tribunnews/foto/bank/images/20141027_213611_air-conditioner-ac.jpg">
                                                        </div>
                                                        <div class=" col-sm">
                                                            <img name="gambar_sesudah" class="gambar" src="http://cdn2.tstatic.net/tribunnews/foto/bank/images/20141027_213611_air-conditioner-ac.jpg">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end:: Body -->
