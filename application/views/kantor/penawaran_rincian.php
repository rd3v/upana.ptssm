				<div class="m-grid__item m-grid__item--fluid m-wrapper">
					<!-- BEGIN: Subheader -->
					<div class="m-subheader ">
						<div class="d-flex align-items-center">
							<div class="mr-auto">
								<h3 class="m-subheader__title m-subheader__title--separator">
									Rincian Penawaran
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
										<a href="manajemen_penawaran.html" class="m-nav__link">
											<span class="m-nav__link-text">
												Penawaran
											</span>
										</a>
									</li>
									<li class="m-nav__separator">
										-
									</li>
									<li class="m-nav__item">
										<a href="rincian_penawaran.html" class="m-nav__link">
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
										<h3 style="text-align: center;" class="header-pesanan">
											PENAWARAN PT SUKSES SEJUK MANDIRI
										</h3><br>
										<button onclick="window.open('<?= site_url() ?>kantor/penawaran/print/<?= $data->reff ?>','_blank')" style="padding: 5px;width: 200px" class="btn btn-primary">
											Print Penawaran
										</button>
										<h3  class="header-pesanan-no"> 
											Reff : <span name="no_reff"><?= $data->reff ?></span>
										</h3><br><br>
										<div class="info row">
											<div class="col-sm">
												<p>Tipe Pajak : <span id="tipe_pajak"><?= $data->tipe_pajak ?></span></p>
												<p>
													Tanggal : <span name="tanggal_surat"><?php 
														$tanggal = explode("-",$data->tanggal);
														echo $tanggal[2]."/".$tanggal[1]."/".$tanggal[0]; 
													?></span>
												</p>
												<p>
													Hal : <span name="perihal"><?= $data->perihal ?></span>
												</p>
												<p>
													Kepada Yth, <br>
													<span name="nama_penerima"><b><?= $data->penerima ?></b></span>
												</p>

											</div>
											<div class="col-sm">
											</div>
										</div>	
									</div>
									<div class="m-portlet__body">
										<h4 align="center">
											Item
										</h4>
										<table style="width: 100%" class="tg">
											<tr>
												<th style="" class="tg-s268" >No</th>
												<th style="" class="tg-s268" >Type</th>
												<th style="" class="tg-s268" >Model</th>
												<th style="" class="tg-s268" >Btu/hr</th>
												<th style="" class="tg-s268" >Daya Listrik (W)</th>
												<th style="" class="tg-s268" >Q'ty</th>
												<th style="" class="tg-s268" >Harga</th>
												<th style="" class="tg-s268" >Total Harga</th>
											</tr>
											<?php 
												$no = 1;
												foreach ($data->list_item as $value) { ?>
													<tr>
														<th class="tg-s260" ><?= $no; ?></th>
														<th class="tg-s260"><?= $value['tipe']; ?></th>
														<th class="tg-s260"><?= $value['model']; ?></th>
														<th class="tg-s260"><?= $value['btu_hr']; ?></th>
														<th class="tg-s260"><?= $value['daya_listrik']; ?></th>
														<th class="tg-s260"><?= $value['jumlah']; ?></th>
														<th class="tg-s260">Rp.<?= number_format($value['harga']); ?></th>
														<th class="tg-s260">Rp.<?= number_format($value['harga'] * $value['jumlah']); ?></th>
													</tr>
											<?php $no++; } ?>
										</table>
										<h4 style="margin-top: 25px" align="center">
											Jasa Pemasangan dan Material
										</h4>
										<table style="width: 100%" class="tg">
											<tr>
												<th style="" class="tg-s269" >No</th>
												<th style="" class="tg-s269" >Uraian Pekerjaan</th>
												<th style="" class="tg-s269" >Model</th>
												<th style="" class="tg-s269" >Q'ty</th>
												<th style="" class="tg-s269" >Harga</th>
												<th style="" class="tg-s269" >Total Harga</th>
											</tr>
											<?php 
												$noo = 1;
												foreach ($data->jasa_pemasangan as $value) { ?>
													<tr>
														<th class="tg-s260" ><?= $noo; ?></th>
														<th class="tg-s260"><?= $value['uraian_pekerjaan']; ?></th>
														<th class="tg-s260"><?= $value['model']; ?></th>
														<th class="tg-s260"><?= $value['jumlah']; ?></th>
														<th class="tg-s260"><?= number_format($value['harga']); ?></th>
														<th class="tg-s260"><?= number_format($value['total'] * $value['jumlah']); ?></th>
													</tr>
											<?php $noo++; } ?>
										</table>
									</div>
									<div class="m-portlet__body">
										<h5>Keterangan :</h5> <br>
										<p>
											* Harga instalasi tersebut sudah termasuk pekerjaan instalasi pipa refrigrant, kabel kontrol, instalasi remote controller
										</p>
										<p>
											* Harga tersebut sudah termasuk PPN 10%
										</p>
										<p>
											* Harga tersebut sesuai dengan BQ yang kami tawarkan, apabila tidak sesuai maka, akan diperhitungkan
										</p>
										<p>
											* Syarat pembayaran unit cash
										</p>
										<p>
											* Syarat pembayaran instalasi 30% dan sisanya setelah instalasi
										</p>
										<p>
											* Garansi resmi daikin 12 bulan sparepart & jasa dan 36 bulan compressor
										</p>
										<p>
											* Garansi Jasa Instalasi 3 Bulan
										</p>
										<p>
											* Harga tersebut diatas tidak termasuk MCB & Kabel Power
										</p>
										<p>
											* Harga tersebut tidak terkait, sewaktu-waktu dapat berubah tanpa pemberitahuan sebelumnya
										</p>
										<p>
											Demikian penawaaran harga dari kami, atas perhatian dan kerjasama yang baik kami ucapkan terimakasih.
										</p>
									</div>
									<div class="row">
										<div class="col-xl-3 offset-xl-9">
											<p>Makassar,              </p>
											<p>Hormat Kami</p><br><br><br>
											<p><u><b>Ricky Yapardhana</b></u></p>
											<p>Direktur</p>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- end:: Body -->