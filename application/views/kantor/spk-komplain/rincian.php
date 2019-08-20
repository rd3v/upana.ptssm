                <div class="m-grid__item m-grid__item--fluid m-wrapper">
                    <!-- BEGIN: Subheader -->
                    <div class="m-subheader ">
                        <div class="d-flex align-items-center">
                            <div class="mr-auto">
                                <h3 class="m-subheader__title m-subheader__title--separator">
                                    Rincian SPK Komplain
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
                                        <a href="<?= site_url() ?>kantor/spk-komplain" class="m-nav__link">
                                            <span class="m-nav__link-text">
                                                SPK Komplain
                                            </span>
                                        </a>
                                    </li>
                                    <li class="m-nav__separator">
                                        -
                                    </li>
                                    <li class="m-nav__item">
                                        <a href="<?= site_url() ?>kantor/spk-komplain/rincian/<?=$data['data']->id?>" class="m-nav__link">
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
                                        <button onclick="window.open('<?= site_url() ?>kantor/spk-komplain/cetak/<?=$data['data']->id?>')" style="padding: 5px;width: 200px" class="btn btn-primary">
                                            Print SPK Komplain
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
                                                <p>Tipe Pajak : <span id="tipe_pajak">Non-Pajak</span></p>

                                                <p>No Invoice : <span id="nama_teknisi">002/SSM/02/2019</span></p>
                                                <p>Surat Jalan : <span>SJ/SSM/IX/2019 </span></p>
                                                <p>Surat <br> Pengeluaran <br> Material : <span> -  </span></p>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="m-portlet__body">
                                        <h4 align="center">
                                            Keterangan Komplain
                                        </h4>
                                        <textarea disabled="" style="resize: none" class="form-control m-input m-input--solid" rows="3"><?=$data['data']->keterangan?></textarea>
                                    </div>
                                    <div class="m-portlet__body">
                                        <h4 align="center">Respon</h4>
                                        <h5>Customer, Puaskah anda dengan service kami?</h5>
                                        <div class="m-radio-inline">
                                            <label class="m-radio">
                                                <input type="radio" name="kepuasan_servis_pelanggan" disabled="" value="1" <?=($data['data']->kepuasan === '1' ? 'checked' : '')?>>
                                                <b>Ya</b>
                                                <span></span>
                                            </label>
                                            <label class="m-radio">
                                                <input disabled="" type="radio" name="kepuasan_servis_pelanggan" value="0" <?=($data['data']->kepuasan === '0' ? 'checked' : '')?>>
                                                <b>Tidak</b>
                                                <span></span>
                                            </label>
                                        </div>
                                        <h5>Komentar :</h5>
                                        <textarea style="resize: none;font-size: 1.2rem !important;text-align: center;" class="form-control m-input m-input--solid" disabled="" name="komentar_pelanggan"rows="3"><?=$data['data']->komentar?></textarea>
                                    </div>
                                    <div class="m-portlet__body">
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
            </div>
            <!-- end:: Body -->
