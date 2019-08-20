        <div class="m-content">
            <div class="row">
                <div class="col-xl-12">
                    <div class="bagian-previous">
                        <a style="margin-left: 10px" href="javascript:history.back()" class="previous">&laquo;  Kembali </a>
                    </div>
                    <div class="m-portlet m-portlet--mobile">
                        <div class="m-portlet__body" style="width: 100vw">
                            <div class="m-form m-form--label-align-right m--margin-top-20 m--margin-bottom-30">
                                <div class="row align-items-center">
                                    <div class="col-md-12">
                                        <div class="info row informasi">
                                            <div class="col-md-12 row">
                                                <h3 class="col-8">Pemasangan</h3>

                                                <p class="col-8" id="id_pelanggan">
                                                    <i class="">No SPK :</i> <?=$data['data']->no_spk?>
                                                </p>
                                                <p class="col-8" id="tanggal_surat">
                                                    <i class="flaticon-calendar-2"> </i><?=tgl_indo($data['data']->tanggal)?>
                                                </p>
                                                <p class="col-8" id="nama_pelanggan">
                                                    <i class="flaticon-users"> </i> <?=$data['data']->nama?>
                                                </p>
                                                <p class="col-8" id="no_telpon">
                                                     <i class="fa fa-phone"> </i> <a href="tel:<?=$data['data']->telepon?>"> <?=$data['data']->telepon?> </a>
                                                </p>
                                            </div>
                                            <div class="col-md-12 row">
                                                <p class="col-8" id="email_pelanggan"><i class="fa fa-envelope-o "> </i> <?=$data['data']->email?></p>
                                                <p class="col-8" id="alamat_pelanggan"><i class="flaticon-placeholder-1"> </i> <?=$data['data']->alamat?></p>
                                                <p><a href="https://www.google.com/maps/search/?api=1&query=<?=$data['data']->lat?>,<?=$data['data']->lon?>">Lihat di Peta</a></p>

                                            </div>
                                        </div>
                                        <div style="margin-top: 20px" class="info row">
                                            <div class="col-sm">
                                                <h5 > <u> Item Pemasangan </u></h5>
                                            </div>
                                            <div class="col-sm">
<?php foreach ($data['item'] as $row) { ?>
                                                <table style="width: 100%; border-bottom: 1px solid rgba(0,0,0,.1)">
                                                    <thead>
                                                        <tr>
                                                            <th style="width: 60%"><?=$row->nama.' '.$row->jumlah?> buah</th>
                                                        </tr>
                                                    </thead>
                                                </table>
<?php } ?>
                                            </div>
                                        </div>
                                        <div style="margin-top: 20px" class="info row">
                                            <div class="col-sm">
                                                <h5>Material</h5>
                                            </div>
                                            <div class="col-sm">
<?php foreach ($data['material'] as $row) { ?>
                                                <table style="width: 100%; border-bottom: 1px solid rgba(0,0,0,.1)">
                                                    <thead>
                                                        <tr>
                                                            <th style="width: 60%"><?=$row->nama.' '.$row->pengeluaran.' '.$row->satuan?></th>

                                                        </tr>
                                                    </thead>
                                                </table>
<?php } ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div align="center">
                        <button onclick="window.location.href = 'keadaan_sebelum.html';"  style="height: 60px;width: 300px"  type="button" class="btn btn-primary warna-biru">
                            2. Proses Pemasangan >>
                        </button>
                    </div>
                </div>
            </div>
        </div>
