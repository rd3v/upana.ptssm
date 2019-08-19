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
										<a href="<?= base_url() ?>finance/invoice/masuk" class="m-nav__link m-nav__link--icon">
											<i class="m-nav__link-icon la la-home"></i>
										</a>
									</li>
									<li class="m-nav__separator">
										-
									</li>
									<li class="m-nav__item">
										<a href="<?= base_url() ?>finance/stock" class="m-nav__link">
											<span class="m-nav__link-text">
												Stock
											</span>
										</a>
									</li>
									<li class="m-nav__separator">
										-
									</li>
									<li class="m-nav__item">
										<a href="<?= base_url() ?>finance/stock/rincian/<?= $data->id ?>" class="m-nav__link">
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
														<button onclick="window.location.href='<?= base_url() ?>gudang/stock/rincian_barang/<?= $data->id ?>'" class="btn btn-primary">
															Rincian
														</button>
													</div>
												</div>
											</div>
										</div>
									</div>
									<div class="m-portlet__body jenis_barang">
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
												<input disabled="" class="form-control m-input" type="text" value="<?= $data->satuan ?>" id="satuan_barang">
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
														$tempat = "Toko";
													} else if($data->tipe_gudang == 2) {
														$tempat = "Kantor";
													}

												 ?>
												<input disabled="" class="form-control m-input" type="text" value="<?= $tempat ?>" id="no_kartu">
											</div>
										</div>
										<table class="table" id="tbl_rincian_stock">
											<thead>
												<tr>
													<th>Tanggal</th>
													<th>No Surat Jalan</th>
													<th>Pemesan</th>
													<th>Masuk</th>
													<th>Keluar</th>
													<th>Sisa</th>
												</tr>
											</thead>
											<tbody>
												<tr>
													<td>08/12/2012</td>
													<td>-</td>
													<td>PT. Mss Jakarta</td>
													<td>100 unit</td>
													<td>-</td>
													<td>100 unit</td>
												</tr>
											</tbody>
										</table>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- end:: Body -->
			<!-- begin::Footer -->