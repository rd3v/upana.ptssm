<div class="m-grid__item m-grid__item--fluid m-wrapper">
					<!-- BEGIN: Subheader -->
					<div class="m-subheader ">
						<div class="d-flex align-items-center">
							<div class="mr-auto">
								<h3 class="m-subheader__title m-subheader__title--separator">
									Harga Item
								</h3>
								<ul class="m-subheader__breadcrumbs m-nav m-nav--inline">
									<li class="m-nav__item m-nav__item--home">
										<a href="<?= base_url() ?>kantor" class="m-nav__link m-nav__link--icon">
											<i class="m-nav__link-icon la la-home"></i>
										</a>
									</li>
									<li class="m-nav__separator">
										-
									</li>
									<li class="m-nav__item">
										<a href="<?= base_url() ?>kantor/price" class="m-nav__link">
											<span class="m-nav__link-text">
												Harga item
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
									<div class="m-portlet__body">
										<ul class="nav nav-pills" role="tablist">
											<li class="nav-item">
												<a class="nav-link active" data-toggle="tab" href="#m_tabs_list_harga_item">
													Harga Item
												</a>
											</li>
											<li class="nav-item">
												<a class="nav-link" data-toggle="tab" href="#m_tabs_list_harga_jasa">
													Harga Jasa
												</a>
											</li>
										</ul>
									</div>
									<div class="tab-content">
										<div class="tab-pane active" id="m_tabs_list_harga_item" role="tabpanel">
											<div class="m-portlet__head">
												<div class="m-portlet__head-caption">
													<div class="m-portlet__head-title ">
														<h3 class="m-portlet__head-text">
															List Harga
														</h3>
													</div>
												</div>
											</div>
											<div class="m-portlet__body">
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
												<div>
													<table class="table" id="tbl_list_harga">
														<thead>
															<tr>
																<th>No</th>
																<th>Kode</th>
																<th>Nama Barang</th>
																<th>Tipe</th>
																<th>Merek</th>
																<th>Harga Partai</th>
																<th>Harga kantor</th>
																<th>Modal</th>
																<th>Keterangan</th>
																<!-- <th>Aksi</th> -->
															</tr>
														</thead>
														<tbody></tbody>
													</table>
												</div>
											</div>
										</div>
										<div class="tab-pane" id="m_tabs_list_harga_jasa" role="tabpanel">
											<div class="m-portlet__head">
												<div class="m-portlet__head-caption">
													<div class="m-portlet__head-title ">
														<h3 class="m-portlet__head-text">
															List Harga Jasa
														</h3>
													</div>
												</div>
											</div>
											<div class="m-portlet__body">
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
												<div>
													<table class="table" id="tbl_list_harga_jasa">
														<thead>
															<tr>
																<th>No</th>
																<th>Kode</th>
																<th>No Seri</th>
																<th>Nama Barang</th>
																<th>Tipe</th>
																<th>Merek</th>
																<th>Harga Partai</th>
																<th>Harga kantor</th>
																<th>Modal</th>
																<th>Keterangan</th>
																<!-- <th>Aksi</th> -->
															</tr>
														</thead>
														<tbody>
															<tr>
																<td>1</td>
																<td>#14253617</td>
																<td>Thermistor RKD25GVM</td>
																<td>Thermistor</td>
																<td>Daikin</td>
																<td>Rp3,200,00</td>
																<td>Rp3,100,00</td>
																<td>Rp2,900,00</td>
																<td>-</td>
																<!-- <td>
																	<a class="btn btn-sm btn-primary" style="color:white; width:80px;" data-toggle="modal" data-target="#m_edit_data_harga_jasa">Edit</a>
																</td> -->
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
					</div>
				</div>
			</div>
			<!-- end:: Body -->
