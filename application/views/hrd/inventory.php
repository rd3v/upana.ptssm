<div class="m-grid__item m-grid__item--fluid m-wrapper">
					<!-- BEGIN: Subheader -->
					<div class="m-subheader ">
						<div class="d-flex align-items-center">
							<div class="mr-auto">
								<h3 class="m-subheader__title m-subheader__title--separator">
									Inventory
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
										<a href="<?= base_url() ?>inventory" class="m-nav__link">
											<span class="m-nav__link-text">
												Inventory
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
												<a class="nav-link active" data-toggle="tab" href="#tab_tersedia">
													Tersedia
												</a>
											</li>
											<li class="nav-item">
												<a class="nav-link " data-toggle="tab" href="#tab_dipinjam">
													Dipinjam
												</a>
											</li>
										</ul>
										<div class="tab-content">
											<div class="tab-pane active" id="tab_tersedia" role="tabpanel">
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
																					List Inventory
																				</h3>
																				<button onclick="window.location.href = 'tambah_inventory.html';" type="button" class="btn btn-success btn_tambah_spk">Tambah Item Inventory</button>
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
														<table class="table" id="tbl_list_item_inventory">
															<thead>
																<tr>
																	<th>No</th>
																	<th>ID Barang</th>
																	<th>Nama Barang</th>
																	<th>No Seri</th>
																	<th>Gambar</th>
																	<th>Set Peminjam</th>
																	<th>Aksi</th>
																</tr>
															</thead>
															<tbody>
																<tr>
																	<td>1</td>
																	<td>#14253617</td>
																	<td>Item A</td>
																	<td>1309D4211</td>
																	<td>
																		<img class="gambar_inventory" src="https://www.static-src.com/wcsstore/Indraprastha/images/catalog/full//1027/alexander_alexander-step-ladder-aluminium-tangga--135-cm-_full02.jpg">
																	</td>
																	<td> 
																		<select class="form-control s-input s-input--square" id="pilih_status">
																			<option>Tersedia</option>
																			<option>Pak Tarno(T21)</option>
																			<option>Sulaiman (T22)</option>
																			<option>Kadir(T33)</option>
																			<option>Bso(T44)</option>
																		</select>
																	</td>
																	<td>
																		<a href="print_barcode_inventory.html" class="btn btn-sm btn-secondary btn_print_barcode"  style="color:black; width:40px;">
																			<i class="fa fa-barcode"></i>
																		</a>
																		<a href="edit_inventory.html" class="btn btn-sm btn-secondary btn_edit"  style="color:black; width:40px;">
																			<i class="fa fa-edit"></i>
																		</a>
																		<a class="btn btn-sm btn-secondary btn_hapus"  style="color:black; width:40px;">
																			<i class="fa fa-trash-o"></i>
																		</a>
																	</td>
																</tr>
																<tr>
																	<td>2</td>
																	<td>#14253617</td>
																	<td>Item A</td>
																	<td>1309D4211</td>
																	
																	<td>
																		<img class="gambar_inventory" src="https://www.arrowasiaindonesia.com/wp-content/uploads/2018/01/Sledge-Hammers.jpg">
																	</td>
																	<td> 
																		<select class="form-control s-input s-input--square" id="pilih_status2">
																			<option>Tersedia</option>
																			<option>Pak Tarno(T21)</option>
																			<option>Sulaiman (T22)</option>
																			<option>Kadir(T33)</option>
																			<option>Bso(T44)</option>
																		</select>
																	</td>
																	<td>
																		<a href="print_barcode_inventory.html" class="btn btn-sm btn-secondary btn_print_barcode"  style="color:black; width:40px;">
																			<i class="fa fa-barcode"></i>
																		</a>
																		<a href="edit_pelanggan.html" class="btn btn-sm btn-secondary btn_edit"  style="color:black; width:40px;">
																			<i class="fa fa-edit"></i>
																		</a>
																		<a class="btn btn-sm btn-secondary btn_hapus"  style="color:black; width:40px;">
																			<i class="fa fa-trash-o"></i>
																		</a>
																	</td>
																</tr>
																<tr>
																	<td>3</td>
																	<td>#14253617</td>
																	<td>Item A</td>
																	<td>1309D4211</td>

																	<td>
																		<img class="gambar_inventory" src="http://3.bp.blogspot.com/-kVUpOGrIOTY/Tcq8E3U3ZMI/AAAAAAAAAQM/SHca5UdzM-k/s1600/JET-CLEANER.JPG">
																	</td>
																	<td> 
																		<select class="form-control s-input s-input--square" id="pilih_status3">
																			<option>Tersedia</option>
																			<option>Pak Tarno(T21)</option>
																			<option>Sulaiman (T22)</option>
																			<option>Kadir(T33)</option>
																			<option>Bso(T44)</option>
																		</select>
																	</td>
																	<td>
																		<a href="print_barcode_inventory.html" class="btn btn-sm btn-secondary btn_print_barcode"  style="color:black; width:40px;">
																			<i class="fa fa-barcode"></i>
																		</a>
																		<a href="edit_pelanggan.html" class="btn btn-sm btn-secondary btn_edit"  style="color:black; width:40px;">
																			<i class="fa fa-edit"></i>
																		</a>
																		<a class="btn btn-sm btn-secondary btn_hapus"  style="color:black; width:40px;">
																			<i class="fa fa-trash-o"></i>
																		</a>
																	</td>
																</tr>
																<tr>
																	<td>4</td>
																	<td>#14253617</td>
																	<td>Item A</td>
																	<td>1309D4211</td>
																	<td>
																		<img class="gambar_inventory" src="http://www.omegaacmobil.com/wp-content/uploads/2013/07/BENGKEL-SERVICE-AC-MOBIL-AVANZA-SURABAYA-0852.5858.6262.jpg">
																	</td>
																	<td> 
																		<select class="form-control s-input s-input--square" id="pilih_status4">
																			<option>Tersedia</option>
																			<option>Pak Tarno(T21)</option>
																			<option>Sulaiman (T22)</option>
																			<option>Kadir(T33)</option>
																			<option>Bso(T44)</option>
																		</select>
																	</td>
																	<td>
																		<a href="print_barcode_inventory.html" class="btn btn-sm btn-secondary btn_print_barcode"  style="color:black; width:40px;">
																			<i class="fa fa-barcode"></i>
																		</a>
																		<a href="edit_pelanggan.html" class="btn btn-sm btn-secondary btn_edit"  style="color:black; width:40px;">
																			<i class="fa fa-edit"></i>
																		</a>
																		<a class="btn btn-sm btn-secondary btn_hapus"  style="color:black; width:40px;">
																			<i class="fa fa-trash-o"></i>
																		</a>
																	</td>
																</tr>
																<tr>
																	<td>5</td>
																	<td>#14253617</td>
																	<td>Item A</td>
																	<td>1309D4211</td>
																	<td>
																		<img class="gambar_inventory" src="https://www.tokootomotif.com/wp-content/uploads/2018/07/3-in-1-Tube-Bender-Pembengkok-Pipa-14-516-38-07-707-SELLERY5-300x366.jpg">
																	</td>
																	<td> 
																		<select class="form-control s-input s-input--square" id="pilih_status4">
																			<option>Tersedia</option>
																			<option>Pak Tarno(T21)</option>
																			<option>Sulaiman (T22)</option>
																			<option>Kadir(T33)</option>
																			<option>Bso(T44)</option>
																		</select>
																	</td>
																	<td>
																		<a href="print_barcode_inventory.html" class="btn btn-sm btn-secondary btn_print_barcode"  style="color:black; width:40px;">
																			<i class="fa fa-barcode"></i>
																		</a>
																		<a href="edit_pelanggan.html" class="btn btn-sm btn-secondary btn_edit"  style="color:black; width:40px;">
																			<i class="fa fa-edit"></i>
																		</a>
																		<a class="btn btn-sm btn-secondary btn_hapus"  style="color:black; width:40px;">
																			<i class="fa fa-trash-o"></i>
																		</a>
																	</td>
																</tr>
															</tbody>
														</table>
														<!--end: Datatable -->
													</div>
												</div>
											</div>
											<div class="tab-pane " id="tab_dipinjam" role="tabpanel">
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
																					List Peminjaman
																				</h3>
																			</div>
																		</div>
																		<div class="col-md-4 offset-md-4">
																			<div class="m-input-icon m-input-icon--left">
																				<input type="text" class="form-control m-input m-input--solid" placeholder="Search..." id="generalSearch2">
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
														<table class="table" id="tbl_list_item_peminjaman">
															<thead>
																<tr>
																	<th>No</th>
																	<th>ID Barang</th>
																	<th>Nama Barang</th>
																	<th>No Seri</th>
																	<th>Gambar</th>
																	<th>Status</th>
																	<th>Aksi</th>
																</tr>
															</thead>
															<tbody>
																<tr>
																	<td>1</td>
																	<td>#14253617</td>
																	<td>Item A</td>
																	<td>1309D4211</td>
																	<td>
																		<img class="gambar_inventory" src="https://www.static-src.com/wcsstore/Indraprastha/images/catalog/full//1027/alexander_alexander-step-ladder-aluminium-tangga--135-cm-_full02.jpg">
																	</td>
																	
																	<td>Aldi</td>
																	<td>
																		<button class="btn btn-success btn_selesai">
																			Selesai
																		</button>
																	</td>
																</tr>
																<tr>
																	<td>2</td>
																	<td>#14253617</td>
																	<td>Item A</td>
																	<td>1309D4211</td>
																	<td>
																		<img class="gambar_inventory" src="https://www.arrowasiaindonesia.com/wp-content/uploads/2018/01/Sledge-Hammers.jpg">
																	</td>
																	<td>Rifal</td>
																	<td>
																		<button class="btn btn-success btn_selesai">
																			Selesai
																		</button>
																	</td>
																</tr>
																<tr>
																	<td>3</td>
																	<td>#14253617</td>
																	<td>Item A</td>
																	<td>1309D4211</td>
																	<td>
																		<img class="gambar_inventory" src="http://3.bp.blogspot.com/-kVUpOGrIOTY/Tcq8E3U3ZMI/AAAAAAAAAQM/SHca5UdzM-k/s1600/JET-CLEANER.JPG">
																	</td>
																	<td>Fascal</td>
																	<td>
																		<button class="btn btn-success btn_selesai">
																			Selesai
																		</button>
																	</td>
																</tr>
																<tr>
																	<td>4</td>
																	<td>#14253617</td>
																	<td>Item A</td>
																	<td>1309D4211</td>
																	<td>
																		<img class="gambar_inventory" src="http://www.omegaacmobil.com/wp-content/uploads/2013/07/BENGKEL-SERVICE-AC-MOBIL-AVANZA-SURABAYA-0852.5858.6262.jpg">
																	</td>
																	<td>Rifal</td>
																	<td>
																		<button class="btn btn-success btn_selesai">
																			Selesai
																		</button>
																	</td>
																</tr>
																<tr>
																	<td>5</td>
																	<td>#14253617</td>
																	<td>Item A</td>
																	<td>1309D4211</td>
																	<td>
																		<img class="gambar_inventory" src="https://www.tokootomotif.com/wp-content/uploads/2018/07/3-in-1-Tube-Bender-Pembengkok-Pipa-14-516-38-07-707-SELLERY5-300x366.jpg">
																	</td>
																	<td>Fascal</td>
																	<td>
																		<button class="btn btn-success btn_selesai">
																			Selesai
																		</button>
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
								<!--end::Portlet-->
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- end:: Body -->