<div class="m-grid__item m-grid__item--fluid m-wrapper">
					<!-- BEGIN: Subheader -->
					<div class="m-subheader ">
						<div class="d-flex align-items-center">
							<div class="mr-auto">
								<h3 class="m-subheader__title m-subheader__title--separator">
									Stock
								</h3>
								<ul class="m-subheader__breadcrumbs m-nav m-nav--inline">
									<li class="m-nav__item m-nav__item--home">
										<a href="<?= base_url() ?>admin/finance/invoice/masuk" class="m-nav__link m-nav__link--icon">
											<i class="m-nav__link-icon la la-home"></i>
										</a>
									</li>
									<li class="m-nav__separator">
										-
									</li>
									<li class="m-nav__item">
										<a href="<?= base_url() ?>admin/finance/stock" class="m-nav__link">
											<span class="m-nav__link-text">
												Stock
											</span>
										</a>
									</li>
									<li class="m-nav__separator">
										-
									</li>
									<li class="m-nav__item">
										<a href="<?= base_url() ?>admin/finance/stock/rincian/<?= $data->id ?>" class="m-nav__link">
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
								<div class="m-portlet">
									<div class="m-portlet__head">
										<div class="m-portlet__head-caption">
											<div class="m-portlet__head-title col-xl-12">
												<div style="margin-top: 20px" class=" row">
													<div class="col-sm">
														<h3 class="m-portlet__head-text">
															Kartu Stock Barang
														</h3>
													</div>
													<div align="right" class="col-sm">
														<button onclick="window.location.href='<?= base_url() ?>admin/gudang/stock/rincian_barang/<?= $data->id ?>'" class="btn btn-primary">
															Rincian
														</button>
													</div>
												</div>
											</div>
										</div>
									</div>
									<div class="m-portlet__body jenis_barang">
										
										<div class="row">
											
										<div class="col-8">
											
											<div class="form-group m-form__group row">
												<label  class="col-2 col-form-label">
													Jenis Barang
												</label>
												<div class="col-10">
													<input disabled="" class="form-control m-input" type="text" value="<?= $data->nama ?>" id="jenis_barang">
												</div>
											</div>
											<div class="form-group m-form__group row">
												<label  class="col-2 col-form-label">
													Satuan
												</label>
												<div class="col-10">
													<input disabled="" class="form-control m-input" type="text" value="<?= strtoupper($data->satuan) ?>" id="satuan_barang">
												</div>
											</div>
											<div class="form-group m-form__group row">
												<label  class="col-2 col-form-label">
													Kode 
												</label>
												<div class="col-10">
													<input disabled="" class="form-control m-input" type="text" value="<?= $data->kode ?>" id="no_kartu">
												</div>
											</div>
											<div class="form-group m-form__group row">
												<label  class="col-2 col-form-label">
													Gudang 
												</label>
												<div class="col-10">
													<?php 

														if($data->tipe_gudang == 1) {
															$tempat = "TOKO";
														} else if($data->tipe_gudang == 2) {
															$tempat = "KANTOR";
														}

													 ?>
													<input disabled="" class="form-control m-input" type="text" value="<?= $tempat ?>" id="no_kartu">
												</div>
											</div>

										</div>

										<div class="col-4 text-center">
											<div style="padding: 0.5em;border-radius: 0.5em;background-color: #f4f4fb; color: #000">
												<p style="font-size: 2.5em;font-weight: bold;font-family: arial;margin-bottom: 0">Sisa stock</p>
												<p style="font-size:5.5em;font-weight: bold; margin: 0"><?= $sisa ?></p>
											</div>
										</div>

									</div>

										<br>
										<hr>
										<br>

										<div class="row">
											<div class="col-md-6 text-center">
												<h4 style="font-weight: bold">MASUK</h4>
												
										<table class="table" id="tbl_rincian_stock_masuk">
											<thead>
												<tr>
													<th>Tanggal</th>
													<th>Invoice Masuk</th>
													<th>Pemesan</th>
													<th>Jumlah</th>
												</tr>
											</thead>
											<tbody>
												<?php 
												foreach ($item_masuk as $value) {
													$tanggal = explode("-",$value['tanggal']);
												 ?>
												<tr>
													<td><?= $tanggal[2]."/".$tanggal[1]."/".$tanggal[0] ?></td>
													<td><?= $value['no_invoice'] ?></td>
													<td><?= $value['nama'] ?></td>
													<td><?= $value['jumlah'] ?></td>
												</tr>
												<?php 
												}
												 ?>
											</tbody>
										</table>

											</div>
											<div class="col-md-6 text-center">
												<h4 style="font-weight: bold">KELUAR</h4>

										<table class="table" id="tbl_rincian_stock_keluar">
											<thead>
												<tr>
													<th>Tanggal</th>
													<th>No Surat Jalan</th>
													<th>Pemesan</th>
													<th>Jumlah</th>
												</tr>
											</thead>
											<tbody>
												<?php 
												foreach ($item_keluar as $value) {
													$tanggal = explode("-",$value['tanggal']);
												 ?>
												<tr>
													<td><?= $tanggal[2]."/".$tanggal[1]."/".$tanggal[0] ?></td>
													<td><?= $value['no_surat'] ?></td>
													<td><?= $value['nama'] ?></td>
													<td><?= ($value['jumlah']) ?></td>
												</tr>
												<?php 
												}
												 ?>
											</tbody>
										</table>

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
			<!-- begin::Footer -->