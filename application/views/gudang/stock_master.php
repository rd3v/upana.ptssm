<div class="m-grid__item m-grid__item--fluid m-wrapper">
					<!-- BEGIN: Subheader -->
					<div class="m-subheader ">
						<div class="d-flex align-items-center">
							<div class="mr-auto">
								<h3 class="m-subheader__title m-subheader__title--separator">
									Master Stock
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
										<a href="<?= base_url() ?>gudang/stock/master" class="m-nav__link">
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
												<span class="m-portlet__head-icon m--hide">
													<i class="la la-gear"></i>
												</span>
												<h3 class="m-portlet__head-text">
													Input Master Stock <br><?php if($this->session->flashdata('status')) {
														echo "<div class='alert alert-".$this->session->flashdata('status')."'>".$this->session->flashdata('flsh_msg')."</div>";
													} ?>
												</h3>
											</div>
										</div>
									</div>
									<!--begin::Form-->
									<form id="formstock" action="<?= site_url() ?>gudang/stock/master/tambahsubmit" method="post" enctype="multipart/form-data" class="form">
										<div class="m-portlet__body">
											<div class="form-group m-form__group row">
												<div class="col-lg-6">
													<label>
														Kode*:
													</label>
													<input type="text" name="input_kode_barang" class="form-control m-input" placeholder="kode barang">
												</div>
												
												<div class="col-lg-6">
													<label>
														Kategori*:
													</label>
													<select style="width: 100%" class="form-control m-select2 dropdown_search" name="kategori_item">
														<option value="">
															-- Pilih Kategori --
														</option>
														<option value="1">
															Unit
														</option>
														<option value="2">
															Material
														</option>
														<option value="3">
															Sparepart
														</option>
														<option value="4">
															Jasa
														</option>
													</select>
												</div>
												<div class="col-lg-6">
													<label class="">
														Nama*:
													</label>
													<input type="text" name="nama_barang" class="form-control m-input" placeholder="nama barang">
												</div>
												<div class="col-lg-6">
													<label class="">
														Satuan *:
													</label>
													<input type="text" name="input_satuan_barang" class="form-control m-input" placeholder="satuan barang">
												</div>
												<div class="col-lg-6">
													<label class="">
														Stock Minimal*:
													</label>
													<input type="number" name="stock_minimal" class="form-control m-input">
												</div>
												<div class="col-lg-6">
													<label class="">
														Tipe:
													</label>
													<input type="text" name="tipe" class="form-control m-input">

												</div>
												<div class="col-lg-6">
													<label class="">
														Merek:
													</label>
													<input type="text" name="merek" class="form-control m-input">
													
												</div>
												<div class="col-lg-6">
													<label class="">
														Tipe Gudang*:
													</label>
													<select style="width: 100%" class="form-control " name="tipe_gudang">
														<option value=""></option>
														<option value="1">
															Toko (Pajak)
														</option>
														<option value="2">
															Kantor (Non Pajak)
														</option>
														
													</select>
												</div>

												<div class="col-lg-6">
													<label class="">
														BTU/hr:
													</label>
													<input type="text" name="btu" class="form-control m-input">
													
												</div>

												<div class="col-lg-6">
													<label class="">
														Daya Listrik:
													</label>
													<input type="text" name="daya" class="form-control m-input">
													
												</div>
												<div class="col-lg-6">
													<label class="">
														Keterangan:
													</label>
													<textarea style="resize: none;" class="form-control" name="keterangan_barang" id="keterangan_barang" rows="5"></textarea>
												</div>
												<div align="center" style="margin-top: 30px" class="offset-lg-3 col-lg-6">
													<img style="display: none" id="image-preview" alt="image preview"/>
													<br/>
													<input type="file" id="image_source" name="image_source" onchange="previewImage();"/>
												</div>
												<div class="offset-lg-3 col-lg-6">
													<br>
													<button type="button" style="width:inherit;" class="btn btn-success" id="btn_tambah">Tambahkan</button>
												</div>
											</div>
										</div>
									</form>
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
																		List Master Stock
																	</h3>
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
											<table class="table" id="tbl_list_master_stock">
												<thead>
													<tr>
														<th>No</th>
														<th>Kategori</th>
														<th>Kode</th>
														<th>Nama Item</th>
														<th>Gudang</th>
														<th>Tipe</th>
														<th>Merek</th>
														<th>Limit</th>
														<th>Satuan</th>
														<th>Keterangan</th>
														<th>Gambar</th>
														<th>Aksi</th>
													</tr>
												</thead>
												<tbody></tbody>
											</table>
											<!--end: Datatable -->
										</div>
									</div>
									<!--end::Form-->
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- end:: Body -->