                <div class="m-grid__item m-grid__item--fluid m-wrapper">
                    <!-- BEGIN: Subheader -->
                    <div class="m-subheader ">
                        <div class="d-flex align-items-center">
                            <div class="mr-auto">
                                <h3 class="m-subheader__title m-subheader__title--separator">
                                    Rincian Surat Jalan
                                </h3>
                                <ul class="m-subheader__breadcrumbs m-nav m-nav--inline">
                                    <li class="m-nav__item m-nav__item--home">
                                        <a href="<?=site_url('admin/dashboard')?>" class="m-nav__link m-nav__link--icon">
                                            <i class="m-nav__link-icon la la-home"></i>
                                        </a>
                                    </li>
                                    <li class="m-nav__separator">
                                        -
                                    </li>
                                    <li class="m-nav__item">
                                        <a href="<?=site_url('master/gudang/surat-jalan')?>" class="m-nav__link">
                                            <span class="m-nav__link-text">
                                                Surat Jalan
                                            </span>
                                        </a>
                                    </li>
                                    <li class="m-nav__separator">
                                        -
                                    </li>
                                    <li class="m-nav__item">
                                        <a href="<?=site_url('master/gudang/surat-jalan/rincian/'.$data['data']->id)?>" class="m-nav__link">
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
                                        <button onclick="window.open('<?=site_url('master/gudang/surat-jalan/cetak/'.$data['data']->id)?>')" style="padding: 5px;width: 150px" id="btn_print_surat_jalan" class="btn btn-primary">
                                            Print Surat Jalan
                                        </button>
                                        <h3 name="no_surat_jalan" class="header-pesanan-no">
                                            <i class="fa fa-check-circle"> </i> <?=$data['data']->no_surat?>
                                        </h3><br><br>
                                        <div class="info row">
                                            <div class="col-sm">
                                                <p id="tanggal_surat">
                                                    <i class="flaticon-calendar-2"> </i><?=tgl_indo($data['data']->tanggal)?>
                                                </p>
                                                <p id="nama_pelanggan">
                                                    <i class="flaticon-users"> </i> <?=$data['customer']->nama?>
                                                </p>
                                                <p id="no_telpon">
                                                    <i class="fa fa-phone"> </i> <?=$data['customer']->telepon?>
                                                </p>

                                            </div>
                                            <div class="col-sm">
                                                <p id="alamat_pelanggan"><i class="flaticon-placeholder-1"> </i> <?=$data['customer']->alamat?></p>
                                                <p>Tipe Pajak : <span id="tipe_pajak"><?=($data['data']->tipe_pajak == 1 ? 'Pajak' : 'Non-Pajak')?></span></p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="m-portlet__body">
                                        <!--end: Search Form -->
                                        <!--begin: Datatable -->
                                        <!-- <div class="m_datatable" id="local_data"></div> -->
                                        <p>Kami kirimkan barang-barang tersebut dibawah ini dengan kendaraan <span id="merek_kendaraan"><?=$data['data']->kendaraan?></span> No. <span id="dd_kendaraan"><?=$data['data']->nopol?></span></p>
                                        <table class="table" id="tbl_rincian_surat_jalan">
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
                                        <div class="form-group m-form__group row">
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
            </div>
            <!-- end:: Body -->
