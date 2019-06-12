<div class="m-grid__item m-grid__item--fluid m-wrapper">
					<!-- BEGIN: Subheader -->
					<div class="m-subheader ">
						<div class="d-flex align-items-center">
							<div class="mr-auto">
								<h3 class="m-subheader__title m-subheader__title--separator">
									Pengeluaran Material
								</h3>
								<ul class="m-subheader__breadcrumbs m-nav m-nav--inline">
									<li class="m-nav__item m-nav__item--home">
										<a href="<?= base_url() ?>" class="m-nav__link m-nav__link--icon">
											<i class="m-nav__link-icon la la-home"></i>
										</a>
									</li>
									<li class="m-nav__separator">
										-
									</li>
									<li class="m-nav__item">
										<a href="<?= base_url() ?>material/keluar" class="m-nav__link">
											<span class="m-nav__link-text">
												Pengeluaran Material
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
								<!--begin::Portlet-->
								<div class="m-portlet">
									<div class="m-portlet__head">
										<div class="m-portlet__head-caption">
											<div class="m-portlet__head-title">
												<h3 class="m-portlet__head-text">
													List Pengeluaran Material
												</h3>
											</div>
										</div>
									</div>
									<div class="m-portlet__body">
										<ul class="nav nav-pills" role="tablist">
											<li class="nav-item">
												<a class="nav-link active" data-toggle="tab" href="#tab_antrian">
													Antrian
												</a>
											</li>
											<li class="nav-item">
												<a class="nav-link" data-toggle="tab" href="#tab_telah_terbit">
													Telah Terbit
												</a>
											</li>
											<li class="nav-item">
												<a class="nav-link" data-toggle="tab" href="#tab_batal">
													Batal
												</a>
											</li>
										</ul>
										
										<div style="display: inline;" class="col-md-12">
											<div class="m-input-icon m-input-icon--left">
												<input type="text" class="form-control m-input m-input--solid" placeholder="Search..." id="generalSearch">
												<span class="m-input-icon__icon m-input-icon__icon--left">
													<span>
														<i class="la la-search"></i>
													</span>
												</span>
											</div>
										</div>
										<div class="tab-content">
											<div class="tab-pane active" id="tab_antrian" role="tabpanel">
												<table class="table responsive" id="tbl_antrian">
													<thead>
														<tr>
															<th>No</th>
															<th>Tanggal</th>
															<th>No SPK</th>
															<th>Nama Pelanggan</th>
															<th>Gudang</th>
															<th>Tipe SPK</th>
															<th>Aksi</th>
														</tr>
													</thead>
													<tbody>
														<tr>
															<td>1</td>
															<td>20/19/2018</td>
															<td>005/SSM/SPK-PSG/MKS/III/2019</td>
															<td>Ibu Heni</td>
															<td>Kantor</td>
															<td>Pemasangan</td>
															<td>
																<a href="form_pengeluaran_material.html" class="btn btn-sm btn-primary btn_material" style="color:white;">Set Material >>
																</a>
																
															</td>
														</tr>
														<tr>
															<td>2</td>
															<td>20/19/2018</td>
															<td>005/SSM/SPK-SVC/MKS/II/2019</td>
															<td>Ibu Heni</td>
															<td>Kantor</td>
															<td>Servis</td>
															<td>
																<a href="form_pengeluaran_material.html" class="btn btn-sm btn-primary btn_material" style="color:white;">Set Material >></a>
																
															</td>
														</tr>
														<tr>
															<td>3</td>
															<td>20/19/2018</td>
															<td>005/SSM/SPK-PSG/MKS/III/2019</td>
															<td>Ibu Heni</td>
															<td>Kantor</td>
															<td>Free</td>
															<td>
																<a href="form_pengeluaran_material.html" class="btn btn-sm btn-primary btn_material" style="color:white;">Set Material >></a>
																
															</td>
														</tr>
														<tr>
															<td>4</td>
															<td>20/19/2018</td>
															<td>005/SSM/SPK-PSG/MKS/III/2019</td>
															<td>Ibu Heni</td>
															<td>Toko</td>
															<td>Survey</td>
															<td>
																<a href="form_pengeluaran_material.html" class="btn btn-sm btn-primary btn_material" style="color:white;">Set Material >></a>
																
															</td>
														</tr>
														<tr>
															<td>5</td>
															<td>20/19/2018</td>
															<td>005/SSM/SPK-PSG/MKS/III/2019</td>
															<td>Ibu Heni</td>
															<td>Toko</td>
															<td>Pemasangan</td>
															<td>
																<a href="form_pengeluaran_material.html" class="btn btn-sm btn-primary btn_material" style="color:white;">Set Material >></a>
																
															</td>
														</tr>
													</tbody>
												</table>
											</div>
											<div class="tab-pane" id="tab_telah_terbit" role="tabpanel">
												<table class="table" id="tbl_telah_terbit">
													<thead>
														<tr>
															<th>No</th>
															<th>Tanggal</th>
															<th>No SPK</th>
															<th>Nama Pelanggan</th>
															<th>Gudang</th>
															<th>Tipe SPK</th>
															<th>Aksi</th>
														</tr>
													</thead>
													<tbody>
														<tr>
															<td>1</td>
															<td>20/19/2018</td>
															<td>005/SSM/SPK-PSG/MKS/III/2019</td>
															<td>Ibu Heni</td>
															<td>Kantor</td>
															<td>Pemasangan</td>
															<td>
																<a href="form_pengeluaran_material.html" class="btn btn-sm btn-primary btn_material" style="color:white; width:80px;">Edit </a>

																<a href="rincian_pengeluaran_material.html" class="btn btn-sm btn-primary btn_material" style="color:white; width:80px;">Rincian</a>
															</td>
														</tr>
														<tr>
															<td>2</td>
															<td>20/19/2018</td>
															<td>005/SSM/SPK-SVC/MKS/II/2019</td>
															<td>Ibu Heni</td>
															<td>Kantor</td>
															<td>Servis</td>
															<td>
																<a href="form_pengeluaran_material.html" class="btn btn-sm btn-primary btn_material" style="color:white; width:80px;">Edit </a>
																<a href="rincian_pengeluaran_material.html" class="btn btn-sm btn-primary btn_material" style="color:white; width:80px;">Rincian</a>
															</td>
														</tr>
														<tr>
															<td>3</td>
															<td>20/19/2018</td>
															<td>005/SSM/SPK-PSG/MKS/III/2019</td>
															<td>Ibu Heni</td>
															<td>Kantor</td>
															<td>Free</td>
															<td>
																<a href="form_pengeluaran_material.html" class="btn btn-sm btn-primary btn_material" style="color:white; width:80px;">Edit </a>
																<a href="rincian_pengeluaran_material.html" class="btn btn-sm btn-primary btn_material" style="color:white; width:80px;">Rincian</a>
															</td>
														</tr>
														<tr>
															<td>4</td>
															<td>20/19/2018</td>
															<td>005/SSM/SPK-PSG/MKS/III/2019</td>
															<td>Ibu Heni</td>
															<td>Kantor</td>
															<td>Survey</td>
															<td>
																<a href="form_pengeluaran_material.html" class="btn btn-sm btn-primary btn_material" style="color:white; width:80px;">Edit </a>
																<a href="rincian_pengeluaran_material.html" class="btn btn-sm btn-primary btn_material" style="color:white; width:80px;">Rincian</a>
															</td>
														</tr>
														<tr>
															<td>5</td>
															<td>20/19/2018</td>
															<td>005/SSM/SPK-PSG/MKS/III/2019</td>
															<td>Ibu Heni</td>
															<td>Kantor</td>
															<td>Pemasangan</td>
															<td>
																<a href="form_pengeluaran_material.html" class="btn btn-sm btn-primary btn_material" style="color:white; width:80px;">Edit </a>
																<a href="rincian_pengeluaran_material.html" class="btn btn-sm btn-primary btn_material" style="color:white; width:80px;">Rincian</a>
															</td>
														</tr>
													</tbody>
												</table>
											</div>
											<div class="tab-pane" id="tab_batal" role="tabpanel">
												<table class="table" id="tbl_batal">
													<thead>
														<tr>
															<th>No</th>
															<th>Tanggal</th>
															<th>No SPK</th>
															<th>Nama Pelanggan</th>
															<th>Gudang</th>
															<th>Tipe SPK</th>
															<th>Aksi</th>
														</tr>
													</thead>
													<tbody>
														<tr>
															<td>1</td>
															<td>20/19/2018</td>
															<td>005/SSM/SPK-PSG/MKS/III/2019</td>
															<td>Ibu Heni</td>
															<td>Toko</td>
															<td>Pemasangan</td>
															<td>
																<a href="form_pengeluaran_material.html" class="btn btn-sm btn-primary btn_material" style="color:white; width:80px;">Edit </a>
																<a href="batal_pengeluaran_material.html" class="btn btn-sm btn-primary btn_material" style="color:white; width:80px;">Rincian</a>
															</td>
														</tr>
														<tr>
															<td>2</td>
															<td>20/19/2018</td>
															<td>005/SSM/SPK-SVC/MKS/II/2019</td>
															<td>Ibu Heni</td>
															<td>Toko</td>
															<td>Servis</td>
															<td>
																<a href="form_pengeluaran_material.html" class="btn btn-sm btn-primary btn_material" style="color:white; width:80px;">Edit </a>
																<a href="batal_pengeluaran_material.html" class="btn btn-sm btn-primary btn_material" style="color:white; width:80px;">Rincian</a>
															</td>
														</tr>
														<tr>
															<td>3</td>
															<td>20/19/2018</td>
															<td>005/SSM/SPK-PSG/MKS/III/2019</td>
															<td>Ibu Heni</td>
															<td>Toko</td>
															<td>Free</td>
															<td>
																<a href="form_pengeluaran_material.html" class="btn btn-sm btn-primary btn_material" style="color:white; width:80px;">Edit </a>
																<a href="batal_pengeluaran_material.html" class="btn btn-sm btn-primary btn_material" style="color:white; width:80px;">Rincian</a>
															</td>
														</tr>
														<tr>
															<td>4</td>
															<td>20/19/2018</td>
															<td>005/SSM/SPK-PSG/MKS/III/2019</td>
															<td>Ibu Heni</td>
															<td>Toko</td>
															<td>Survey</td>
															<td>
																<a href="form_pengeluaran_material.html" class="btn btn-sm btn-primary btn_material" style="color:white; width:80px;">Edit </a>
																<a href="batal_pengeluaran_material.html" class="btn btn-sm btn-primary btn_material" style="color:white; width:80px;">Rincian</a>
															</td>
														</tr>
														<tr>
															<td>5</td>
															<td>20/19/2018</td>
															<td>005/SSM/SPK-PSG/MKS/III/2019</td>
															<td>Ibu Heni</td>
															<td>Toko</td>
															<td>Pemasangan</td>
															<td>
																<a href="form_pengeluaran_material.html" class="btn btn-sm btn-primary btn_material" style="color:white; width:80px;">Edit </a>
																<a href="rincian_pengeluaran_material.html" class="btn btn-sm btn-primary btn_material" style="color:white; width:80px;">Rincian</a>
															</td>
														</tr>
													</tbody>
												</table>
											</div>
										</div>
									</div>
								</div>
								<!--end::Portlet-->
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- end:: Body -->