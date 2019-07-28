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
										<a href="<?= base_url() ?>gudang" class="m-nav__link m-nav__link--icon">
											<i class="m-nav__link-icon la la-home"></i>
										</a>
									</li>
									<li class="m-nav__separator">
										-
									</li>
									<li class="m-nav__item">
										<a href="<?= base_url() ?>gudang/inventory" class="m-nav__link">
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
													List Pengeluaran Material <br><?php 
													if($this->session->flashdata('status')) {
														echo "<div class='alert alert-".$this->session->flashdata('status')."'>".$this->session->flashdata('flsh_msg')."</div>";
													} ?>
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
								<button onclick="window.location.href = '<?= site_url() ?>gudang/inventory/tambah';" type="button" class="btn btn-success btn_tambah_spk">Tambah Item Inventory</button>
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
									<?php 
									if(!isset($data['inventory']['tersedia'])) { ?>
										<tr>
											<td colspan="6" class="text-center">Tidak ada Material yang Tersedia</td>
										</tr>
									<?php } else {
										$no = 1;

									for ($i=0; $i < count($data['inventory']['tersedia']); $i++) { ?>
											<tr>
												<td><?= $no; ?></td>
												<td><?= $data['inventory']['tersedia'][$i]['id']; ?></td>
												<td><?= $data['inventory']['tersedia'][$i]['nama']; ?></td>
												<td><?= $data['inventory']['tersedia'][$i]['no_seri']; ?></td>
												<td>
													<img style="width: 150px !important" src="<?= base_url() ?>assets/img/<?= $data['inventory']['tersedia'][$i]['gambar']; ?>" alt="<?= $data['inventory']['tersedia'][$i]['gambar']; ?>">
															
												</td>
												<td>
													<select name="set_peminjam" id="set_peminjam" class="form-control">
														<option value="">Tersedia</option>
														<?php 

															foreach ($data['teknisi'] as $value) { ?>

																<option data-id="<?= $data['inventory']['tersedia'][$i]['id'] ?>" data-nama="<?= $data['inventory']['tersedia'][$i]['nama'] ?>" value="<?= $value['id'] ?>"><?= $value['name'] ?></option>

														<?php }

														 ?>
													</select>
												</td>
												<td>
													<a target="_blank" href="<?= site_url() ?>gudang/inventory/barcode/<?= $data['inventory']['tersedia'][$i]['no_seri'] ?>" class="btn btn-sm btn-secondary btn_print_barcode"  style="color:black; width:40px;">
														<i class="fa fa-barcode"></i>
													</a>
													<a href="<?= site_url() ?>gudang/inventory/edit/<?= $data['inventory']['tersedia'][$i]['id'] ?>" class="btn btn-sm btn-secondary"  style="color:black; width:40px;">
														<i class="fa fa-edit"></i>
													</a>
													<a class="btn btn-sm btn-secondary btn_hapus"  style="color:black; width:40px;" data-id="<?= $data['inventory']['tersedia'][$i]['id'] ?>" data-nama="<?= $data['inventory']['tersedia'][$i]['nama'] ?>" data-gambar="<?= $data['inventory']['tersedia'][$i]['gambar'] ?>">
														<i class="fa fa-trash-o"></i>
													</a>
												</td>
											</tr>
									<?php $no++; } } ?>
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
																<?php 
									if(!isset($data['inventory']['dipinjam'])) { ?>
										<tr>
											<td colspan="6" class="text-center">Tidak ada Material yang Dipinjam</td>
										</tr>
									<?php } else {
										$no = 1;

									$no = 1;
									for ($i=0; $i < count($data['inventory']['dipinjam']); $i++) { ?>
											<tr>
												<td><?= $no; ?></td>
												<td><?= $data['inventory']['dipinjam'][$i]['id']; ?></td>
												<td><?= $data['inventory']['dipinjam'][$i]['nama']; ?></td>
												<td><?= $data['inventory']['dipinjam'][$i]['no_seri']; ?></td>
												<td>
													<img style="width:100px !important" src="<?= base_url() ?>assets/img/<?= $data['inventory']['dipinjam'][$i]['gambar']; ?>" alt="<?= $data['inventory']['dipinjam'][$i]['gambar']; ?>">
															
												</td>
												<td>
												<?php 
													foreach ($data['teknisi'] as $value) {
														if($value['id'] == $data['inventory']['dipinjam'][$i]['teknisi_id']) { ?>
															<td><?= $value['name'] ?></td>
													<?php break; } 
													}
												?>
												</td>
												<td>
													<button class="btn btn-success btn_selesai" data-id="<?= $data['inventory']['dipinjam'][$i]['id'] ?>" data-nama="<?= $data['inventory']['dipinjam'][$i]['nama'] ?>">
														Selesai
													</button>
												</td>
												</tr>
												<?php $no++; } } ?>
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