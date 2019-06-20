<div class="m-grid__item m-grid__item--fluid m-wrapper">
					<!-- BEGIN: Subheader -->
					<div class="m-subheader ">
						<div class="d-flex align-items-center">
							<div class="mr-auto">
								<h3 class="m-subheader__title m-subheader__title--separator">
									Management Stock
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
										<a href="<?= base_url() ?>stock" class="m-nav__link">
											<span class="m-nav__link-text">
												Master Stock
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
											<div class="m-portlet__head-title">
												<h3 class="m-portlet__head-text">
													List Stock
												</h3>
											</div>
										</div>
									</div>
									<div class="m-portlet__body">
										<ul class="nav nav-pills" role="tablist">
											<li class="nav-item">
												<a class="nav-link active" data-toggle="tab" href="#tab_gudang_kantor">
													Gudang Kantor
												</a>
											</li>
											<li class="nav-item">
												<a class="nav-link" data-toggle="tab" href="#tab_gudang_toko">
													Gudang Toko
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
											<div class="tab-pane active" id="tab_gudang_kantor" role="tabpanel">
												<table class="table" id="tbl_list_stock_gudang_kantor">
													<thead>
														<tr>
															<th>No</th>
															<th>Kategori</th>
															<th>Kode</th>
															<th>Nama Barang</th>
															<th>Tipe</th>
															<th>Merek</th>
															<th>Jumlah</th>
															<th>Satuan</th>
															<th>Status</th>
															<th>Keterangan</th>
															<th>Aksi</th>
														</tr>
													</thead>
													<tbody></tbody>
												</table>
											</div>
											<div class="tab-pane" id="tab_gudang_toko" role="tabpanel">
												<table class="table" id="tbl_list_stock_gudang_toko">
													<thead>
														<tr>
															<th>No</th>
															<th>Kategori</th>
															<th>Kode</th>
															<th>Nama Barang</th>
															<th>Tipe</th>
															<th>Merek</th>
															<th>Jumlah</th>
															<th>Satuan</th>
															<th>Status</th>
															<th>Keterangan</th>
															<th>Aksi</th>
														</tr>
													</thead>
													<tbody></tbody>
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