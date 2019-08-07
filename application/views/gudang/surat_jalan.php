<div class="m-grid__item m-grid__item--fluid m-wrapper">
					<!-- BEGIN: Subheader -->
					<div class="m-subheader ">
						<div class="d-flex align-items-center">
							<div class="mr-auto">
								<h3 class="m-subheader__title m-subheader__title--separator">
									Surat Jalan
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
										<a href="<?= base_url() ?>surat/jalan" class="m-nav__link">
											<span class="m-nav__link-text">
												Surat Jalan
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
									<div class="m-portlet__body">
										<!--begin: Search Form -->
										<div class="m-form m-form--label-align-right m--margin-top-20 m--margin-bottom-30">
											<div class="row align-items-center">
												<div class="col-md-12">
													<div class="form-group m-form__group row align-items-center">
														<div class="col-md-4">
															<div class="m-portlet__head-title">
																<h3 class="m-portlet__head-text">
																	List Surat Jalan
																</h3>

																<button onclick="window.location.href = 'tambah_surat_jalan_non.html';" type="button" class="btn btn-success btn_tambah_spk"> + Tambah Surat Jalan (Tanpa SPK)</button>

															</div>
														</div>
														<div class="col-md-4 offset-md-4">
															<div class="m-input-icon m-input-icon--left">
																<input type="text" class="form-control m-input m-input--solid" placeholder="Search..." id="generalSearch">
																<span class="m-input-icon__icon m-input-icon__icon--left">
																	<span>
																		<i class="la la-search"></i>
																	</span>
																</span>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
										<!--end: Search Form -->
										<!--begin: Datatable -->
										<ul class="nav nav-tabs" role="tablist">
											<li class="nav-item">
												<a class="nav-link active" data-toggle="tab" href="#" data-target="#m_tabs_1_1">Antrian</a>
											</li>
											
											<li class="nav-item">
												<a class="nav-link" data-toggle="tab" href="#m_tabs_1_2">Terbit </a>
											</li>
											<li class="nav-item">
												<a class="nav-link " data-toggle="tab" href="#m_tabs_1_3">Batal</a>
											</li>
										</ul>
										<div class="tab-content">
											<div class="tab-pane active" id="m_tabs_1_1" role="tabpanel">
												<!-- <div class="m_datatable" id="local_data"></div> -->
												<table class="table " id="">
													<thead>
														<tr>
															<th>No</th>
															<th>Tanggal</th>
															<th>No SPK</th>
															<th>Gudang</th>
															<th>Nama Pelanggan</th>
															<th>Aksi</th>
														</tr>
													</thead>
													<tbody>
														<tr>
															<td>1</td>
															<td>20/11/19</td>
															<td>#1/SPK-PSG/PT-SSM/I/2019</td>
															<td>Toko (Pajak)</td>
															<td>Pak hendy</td>
															<td><a href="tambah_surat_jalan_spk.html" class="btn btn-sm btn-info" style="color:white; width:80px;">Proses >> </a></td>
														</tr>
														<tr>
															<td>2</td>
															<td>20/11/19</td>
															<td>#1/SPK-PSG/PT-SSM/I/2019</td>
															<td>Toko (Pajak)</td>
															<td>Pak hendy</td>
															<td><a href="tambah_surat_jalan_spk.html" class="btn btn-sm btn-info" style="color:white; width:80px;">Proses >> </a></td>
														</tr>
														<tr>
															<td>3</td>
															<td>20/11/19</td>
															<td>#3/SPK-PSG/PT-SSM/I/2019</td>
															<td>Kantor (Non-Pajak)</td>
															<td>Pak hendy</td>
															<td><a href="tambah_surat_jalan_spk.html" class="btn btn-sm btn-info" style="color:white; width:80px;">Proses >> </a></td>
														</tr>
														<tr>
															<td>4</td>
															<td>20/11/19</td>
															<td>#4/SPK-PSG/PT-SSM/I/2019</td>
															<td>Kantor (Non-Pajak)</td>
															<td>Pak hendy</td>
															<td><a href="tambah_surat_jalan_spk.html" class="btn btn-sm btn-info" style="color:white; width:80px;">Proses >> </a></td>
														</tr>
														<tr>
															<td>5</td>
															<td>20/11/19</td>
															<td>#5/SPK-PSG/PT-SSM/I/2019</td>
															<td>Kantor (Non-Pajak)</td>
															<td>Pak hendy</td>
															<td><a href="tambah_surat_jalan_spk.html" class="btn btn-sm btn-info" style="color:white; width:80px;">Proses >> </a></td>
														</tr>
													</tbody>
												</table>
												<!--end: Datatable -->
												
											</div>
											
											<div class="tab-pane" id="m_tabs_1_2" role="tabpanel">

												<!-- <div class="m_datatable" id="local_data"></div> -->
												<table class="table " id="tbl_list_surat_jalan_terbit">
													<thead>
														<tr>
															<th>No</th>
															<th>Tanggal</th>
															<th>No Surat</th>
															<th>No SPK</th>
															<th>Gudang</th>
															<th>Nama Pelanggan</th>
															<th>Aksi</th>
														</tr>
													</thead>
													<tbody>
														<tr>
															<td>1</td>
															<td>20/11/19</td>
															<td>5/SJ/TK-SSM/I/2019</td>
															<td>#1/SPK-PSG/PT-SSM/I/2019</td>
															<td>Kantor (Non-Pajak)</td>
															<td>Pak hendy</td>
															<td>
																<a href="edit_surat_jalan.html" class="btn btn-sm btn-primary" style="color:white; width:50px;">Edit</a>

																<a href="rincian_surat_jalan.html" class="btn btn-sm btn-primary" style="color:white; width:50px;">Rincian</a>
															</td>
														</tr>
														<tr>
															<td>2</td>
															<td>20/11/19</td>
															<td>5/SJ/TK-SSM/I/2019</td>
															<td>#1/SPK-PSG/PT-SSM/I/2019</td>
															<td>Kantor (Non-Pajak)</td>
															<td>Pak hendy</td>
															<td>
																<a href="edit_surat_jalan.html" class="btn btn-sm btn-primary" style="color:white; width:50px;">Edit</a>

																<a href="rincian_surat_jalan.html" class="btn btn-sm btn-primary" style="color:white; width:50px;">Rincian</a>
															</td>
														</tr>
														<tr>
															<td>3</td>
															<td>20/11/19</td>
															<td>5/SJ/TK-SSM/I/2019</td>
															<td> - </td>
															<td>Kantor (Non-Pajak)</td>
															<td>Pak hendy</td>
															<td>
																<a href="edit_surat_jalan.html" class="btn btn-sm btn-primary" style="color:white; width:50px;">Edit</a>

																<a href="rincian_surat_jalan.html" class="btn btn-sm btn-primary" style="color:white; width:50px;">Rincian</a>
															</td>
														</tr>
														<tr>
															<td>4</td>
															<td>20/11/19</td>
															<td>/4SJ/TK-SSM/I/2019</td>
															<td> - </td>
															<td>Toko (Pajak)</td>
															<td>Pak hendy</td>
															<td>
																<a href="edit_surat_jalan.html" class="btn btn-sm btn-primary" style="color:white; width:50px;">Edit</a>

																<a href="rincian_surat_jalan.html" class="btn btn-sm btn-primary" style="color:white; width:50px;">Rincian</a>
															</td>
														</tr>
														<tr>
															<td>5</td>
															<td>20/11/19</td>
															<td>5/SJ/TK-SSM/I/2019</td>
															<td> - </td>
															<td>Toko (Pajak)</td>
															<td>Pak hendy</td>
															<td>
																<a href="edit_surat_jalan.html" class="btn btn-sm btn-primary" style="color:white; width:50px;">Edit</a>

																<a href="rincian_surat_jalan.html" class="btn btn-sm btn-primary" style="color:white; width:50px;">Rincian</a>

															</td>
														</tr>
													</tbody>
												</table>
												<!--end: Datatable -->
												




											</div>
											<div class="tab-pane" id="m_tabs_1_3" role="tabpanel">
												<!-- <div class="m_datatable" id="local_data"></div> -->
												<table class="table " id="tbl_list_surat_jalan_batal">
													<thead>
														<tr>
															<th>No</th>
															<th>Tanggal</th>
															<th>No Surat</th>
															<th>No SPK</th>
															<th>Gudang</th>
															<th>Nama Pelanggan</th>
															<th>Aksi</th>
														</tr>
													</thead>
													<tbody>
														<tr>
															<td>1</td>
															<td>20/11/19</td>
															<td>5/SJ/TK-SSM/I/2019</td>
															<td>#1/SPK-PSG/PT-SSM/I/2019</td>
															<td>Kantor (Non-Pajak)</td>
															<td>Pak hendy</td>
															<td>
																<a href="rincian_surat_jalan.html" class="btn btn-sm btn-primary" style="color:white; width:50px;">Edit</a>

																<a href="rincian_surat_jalan.html" class="btn btn-sm btn-primary" style="color:white; width:50px;">Rincian</a>
															</td>
														</tr>
														<tr>
															<td>2</td>
															<td>20/11/19</td>
															<td>5/SJ/TK-SSM/I/2019</td>
															<td>#1/SPK-PSG/PT-SSM/I/2019</td>
															<td>Kantor (Non-Pajak)</td>
															<td>Pak hendy</td>
															<td>
																<a href="rincian_surat_jalan.html" class="btn btn-sm btn-primary" style="color:white; width:50px;">Edit</a>
																<a href="rincian_surat_jalan.html" class="btn btn-sm btn-primary" style="color:white; width:50px;">Rincian</a>
															</td>
														</tr>
														<tr>
															<td>3</td>
															<td>20/11/19</td>
															<td>5/SJ/TK-SSM/I/2019</td>
															<td> - </td>
															<td>Kantor (Non-Pajak)</td>
															<td>Pak hendy</td>
															<td>
																<a href="rincian_surat_jalan.html" class="btn btn-sm btn-primary" style="color:white; width:50px;">Edit</a>
																<a href="rincian_surat_jalan.html" class="btn btn-sm btn-primary" style="color:white; width:50px;">Rincian</a>
															</td>
														</tr>
														<tr>
															<td>4</td>
															<td>20/11/19</td>
															<td>/4SJ/TK-SSM/I/2019</td>
															<td> - </td>
															<td>Toko (Pajak)</td>
															<td>Pak hendy</td>
															<td>
																<a href="rincian_surat_jalan.html" class="btn btn-sm btn-primary" style="color:white; width:50px;">Edit</a>
																<a href="rincian_surat_jalan.html" class="btn btn-sm btn-primary" style="color:white; width:50px;">Rincian</a>
															</td>
														</tr>
														<tr>
															<td>5</td>
															<td>20/11/19</td>
															<td>5/SJ/TK-SSM/I/2019</td>
															<td> - </td>
															<td>Toko (Pajak)</td>
															<td>Pak hendy</td>
															<td>
																<a href="rincian_surat_jalan.html" class="btn btn-sm btn-primary" style="color:white; width:50px;">Edit</a>
																<a href="rincian_surat_jalan.html" class="btn btn-sm btn-primary" style="color:white; width:50px;">Rincian</a>
															</td>
														</tr>
													</tbody>
												</table>
												<!--end: Datatable -->
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