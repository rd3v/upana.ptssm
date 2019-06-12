<div class="m-grid__item m-grid__item--fluid m-wrapper">
					<!-- BEGIN: Subheader -->
					<div class="m-subheader ">
						<div class="d-flex align-items-center">
							<div class="mr-auto">
								<h3 class="m-subheader__title m-subheader__title--separator">
									Manajemen Invoice Keluar | Barang
								</h3>
								<ul class="m-subheader__breadcrumbs m-nav m-nav--inline">
									<li class="m-nav__item m-nav__item--home">
										<a href="<?= base_url() ?>" class="m-nav__link m-nav__link--icon">
											<i class="m-nav__link-icon la la-home"></i>
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
																	List Invoice Barang
																</h3>
																<button onclick="window.location.href = 'tambah_invoice_barang.html';" type="button" class="btn btn-success ">+ tambah Invoice (tanpa SPK)</button>
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
												<!--begin: antrian table -->
									
												<table class="table" id="tbl_list_invoice_barang">
													<thead>
														<tr>
															<th>No</th>
															<th>Jatuh Tempo</th>
															<th>No SPK </th>
															<th>No Surat Jalan</th>
															<th>Bank Tujuan</th>
															<th>Pelanggan</th>
															<th>Aksi</th>
														</tr>
													</thead>
													<tbody>
														<tr>
															<td>1</td>
															<td>20/19/2018</td>
															<td>21/SPK-PSG/PT-SSM/I/2019</td>
															<td>-</td>
															<td> BRI 123456</td>
															<td>Bpk. Hendy</td>
															<td>
																<a href="proses_invoice_keluar.html" class="btn btn-sm btn-primary" style="color:white; width:80px;">Proses >> </a>
															</td>
														</tr>

														<tr>
															<td>1</td>
															<td>20/19/2018</td>
															<td>21/SPK-PSG/PT-SSM/I/2019</td>
															<td>-</td>
															<td>-</td>
															<td>Bpk. Tono</td>
															<td>
																<a href="proses_invoice_keluar.html" class="btn btn-sm btn-primary" style="color:white; width:80px;">Proses >> </a>
															</td>
														</tr>
														
													</tbody>
												</table>
												<!--end: Datatable -->
													
											</div>
											
											<div class="tab-pane" id="m_tabs_1_2" role="tabpanel">
												<!--begin: terbit table -->

												<table class="table" id="tbl_list_invoice_barang">
													<thead>
														<tr>
															<th>No</th>
															<th>Tanggal</th>
															<th>Jatuh Tempo</th>
															<th>No Invoice</th>
															<th>Nama Pelanggan</th>
															<th>Tipe</th>
															<th>Nilai</th>
															<th>Aksi</th>
														</tr>
													</thead>
													<tbody>
														<tr>
															<td>1</td>
															<td>20/19/2018</td>
															<td>25/11/2018</td>
															<td>1923102301</td>
															<td>Bpk. Hendy</td>
															<td>Pajak</td>
															<td>Lunas</td>
															<td>
																<a href="rincian_invoice_barang.html" class="btn btn-sm btn-primary" style="color:white; width:80px;">Rincian</a>
															</td>
														</tr>
														<tr>
															<td>2</td>
															<td>20/19/2018</td>
															<td>25/11/2018</td>
															<td>1923102301</td>
															<td>Bpk. Hendy</td>
															<td>Pajak</td>
															<td>Lunas</td>
															<td>
																<a href="rincian_invoice_barang.html" class="btn btn-sm btn-primary" style="color:white; width:80px;">Rincian</a>
															</td>
														</tr>
														<tr>
															<td>3</td>
															<td>20/19/2018</td>
															<td>25/11/2018</td>
															<td>1923102301</td>
															<td>Bpk. Hendy</td>
															<td>Pajak</td>
															<td>Lunas</td>
															<td>
																<a href="rincian_invoice_barang.html" class="btn btn-sm btn-primary" style="color:white; width:80px;">Rincian</a>
															</td>
														</tr>
														<tr>
															<td>4</td>
															<td>20/19/2018</td>
															<td>25/11/2018</td>
															<td>1923102301</td>
															<td>Bpk. Hendy</td>
															<td>Pajak</td>
															<td>Lunas</td>
															<td>
																<a href="rincian_invoice_barang.html" class="btn btn-sm btn-primary" style="color:white; width:80px;">Rincian</a>
															</td>
														</tr>
														<tr>
															<td>5</td>
															<td>20/19/2018</td>
															<td>25/11/2018</td>
															<td>1923102301</td>
															<td>Bpk. Hendy</td>
															<td>Non-Pajak</td>
															<td>Lunas</td>
															<td>
																<a href="rincian_invoice_barang.html" class="btn btn-sm btn-primary" style="color:white; width:80px;">Rincian</a>
															</td>
														</tr>
													</tbody>
												</table>
												<!--end: Datatable -->
												


											</div>
											<div class="tab-pane" id="m_tabs_1_3" role="tabpanel">
												
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
			<!-- Modal : TAMBAH ITEM -->
			<div class="modal fade" id="modal_tambah_barang"   role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="exampleModalLabel">
								Tambah Barang
							</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">
									&times;
								</span>
							</button>
						</div>
						<div class="modal-body">
							<div class="form-group m-form__group row">
								<label  class="col-3 col-form-label">
									Nama Barang
								</label>
								<div class="col-9">
									<select style="width: 100%" class="form-control m-select2 dropdown_search select2-hidden-accessible" name="nama_item" tabindex="-1" aria-hidden="true">
										<option value="1" >
											AC 1
										</option>
										<option value="2">
											AC 2
										</option>
										<option value="3">
											AC 3
										</option>
									</select>
								</div>
							</div>
							<div class="form-group m-form__group row">
								<label  class="col-3 col-form-label">
									Qty
								</label>
								<div class="col-9">
									<input class="form-control m-input" type="number" value="20" id="jumlah_item">
								</div>
							</div>
							<div class="form-group m-form__group row">
								<label  class="col-3 col-form-label">
									Satuan
								</label>
								<div class="col-9">
									<select disabled="" style="width: 100%" class="form-control m-select2 dropdown_search select2-hidden-accessible" name="satuan" tabindex="-1" aria-hidden="true">
										<option elected="" value="1" >
											Unit
										</option>
										<option s value="2">
											Meter
										</option>
										<option value="3">
											Pcs
										</option>
									</select>
								</div>
							</div>
							<div class="form-group m-form__group row">
								<label  class="col-3 col-form-label">
									Harga
								</label>
								<div class="col-9">
									<input class="form-control m-input" type="text" value="Rp4,900,000" id="harga_item">
								</div>
							</div>
							<div class="form-group m-form__group row">
								<label  class="col-3 col-form-label">
									Harga Khusus
								</label>
								<div class="col-9">
									<input class="form-control m-input" type="text" value="Rp3,200,000" id="harga_khusus">
								</div>
							</div>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-secondary" data-dismiss="modal">
								Tutup
							</button>
							<button id="btn_tambah" type="button" class="btn btn-primary" data-dismiss="modal">
								Tambah
							</button>
						</div>
					</div>
				</div>
			</div>