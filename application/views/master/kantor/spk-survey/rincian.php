                <div class="m-grid__item m-grid__item--fluid m-wrapper">
                    <!-- BEGIN: Subheader -->
                    <div class="m-subheader ">
                        <div class="d-flex align-items-center">
                            <div class="mr-auto">
                                <h3 class="m-subheader__title m-subheader__title--separator">
                                    Rincian SPK Service
                                </h3>
                                <ul class="m-subheader__breadcrumbs m-nav m-nav--inline">
                                    <li class="m-nav__item m-nav__item--home">
                                        <a href="<?= site_url() ?>master/dashboard" class="m-nav__link m-nav__link--icon">
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
                                        <a href="<?= site_url() ?>master/kantor/spk-service" class="m-nav__link">
                                            <span class="m-nav__link-text">
                                                SPK Service
                                            </span>
                                        </a>
                                    </li>
                                    <li class="m-nav__separator">
                                        -
                                    </li>
                                    <li class="m-nav__item">
                                        <a href="<?= site_url() ?>master/kantor/spk-service/rincian/<?=$data['data']->id?>" class="m-nav__link">
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
                                        <button onclick="window.open('<?= site_url() ?>master/kantor/spk-service/cetak/<?=$data['data']->id?>')" style="padding: 5px;width: 200px" class="btn btn-primary">
                                            Print SPK Service
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
                                        <h4 align="center">
                                            Keterangan Pekerjaan
                                        </h4>
                                        <textarea disabled="" style="resize: none" class="form-control m-input m-input--solid" rows="3"><?=$data['data']->keterangan?></textarea>
                                    </div>
                                </div>
                            </div>
<?php $i = 1; foreach ($data['item'] as $row) { $item = $this->crud->gd('data_ac', ['id' => $row->id_ac]); ?>
                            <div class="col-sm-6">
                                <div class="m-portlet m-portlet--brand m-portlet--head-solid-bg m-portlet--bordered">
                                    <div class="m-portlet__head">
                                        <div class="m-portlet__head-caption">
                                            <div class="m-portlet__head-title">
                                                <span class="m-portlet__head-icon">
                                                    <i class="flaticon-placeholder-2"></i>
                                                </span>
                                                <h3 class="m-portlet__head-text">
                                                    <?=$item->nama?>
                                                </h3>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="m-portlet__body">
                                        <table class="tg">
                                          <tr>
                                            <th></th>
                                            <th>Pressure</th>
                                            <th>Ampere</th>
                                            <th>Volt</th>
                                            <th>Keterangan</th>
                                          </tr>
                                          <tr>
                                            <td class="">Sebelum</td>
                                            <td class=""><?=$row->sebelum_pressure?></td>
                                            <td class=""><?=$row->sebelum_ampere?></td>
                                            <td class=""><?=$row->sebelum_volt?></td>
                                            <td class=""><?=$row->sebelum_keterangan?></td>
                                          </tr>
                                          <tr>
                                            <td class="">Sesudah</td>
                                            <td class=""><?=$row->setelah_pressure?></td>
                                            <td class=""><?=$row->setelah_ampere?></td>
                                            <td class=""><?=$row->setelah_volt?></td>
                                            <td class=""><?=$row->setelah_keterangan?></td>
                                          </tr>

                                        </table>
                                    </div>
                                </div>
                            </div>
<?php $i++; } ?>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end:: Body -->
