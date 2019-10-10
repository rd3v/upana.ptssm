<div class="m-grid__item m-grid__item--fluid m-wrapper">
					<!-- BEGIN: Subheader -->
					<div class="m-subheader ">
						<div class="d-flex align-items-center">
							<div class="mr-auto">
								<h3 class="m-subheader__title m-subheader__title--separator">
									Penawaran
								</h3>
								<ul class="m-subheader__breadcrumbs m-nav m-nav--inline">
									<li class="m-nav__item m-nav__item--home">
										<a href="<?= base_url() ?>admin/dashboard" class="m-nav__link m-nav__link--icon">
											<i class="m-nav__link-icon la la-home"></i>
										</a>
									</li>
									<li class="m-nav__separator">
										-
									</li>
									<li class="m-nav__item">
										<a href="<?= base_url() ?>admin/kantor/penawaran" class="m-nav__link">
											<span class="m-nav__link-text">
												Penawaran
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
																	List Penawaran
																</h3>
																<button onclick="window.location.href = '<?= site_url() ?>admin/kantor/penawaran/create';" type="button" class="btn btn-success btn_tambah_spk">Buat Penawaran</button>
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
										<!-- <div class="m_datatable" id="local_data"></div> -->
										<table class="table" id="tbl_list_penawaran">
											<thead>
												<tr>
													<th>No</th>
													<th>Tanggal</th>
													<th>Reff</th>
													<th>Kostumer</th>
													<th>Perihal</th>
													<th>Aksi</th>
												</tr>
											</thead>
											<tbody></tbody>
										</table>
										<!--end: Datatable -->
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- end:: Body -->