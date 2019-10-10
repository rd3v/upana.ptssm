<div class="m-grid__item m-grid__item--fluid m-wrapper">
					<!-- BEGIN: Subheader -->
					<div class="m-subheader ">
						<div class="d-flex align-items-center">
							<div class="mr-auto">
								<h3 class="m-subheader__title m-subheader__title--separator">
									Tambah Inventory
								</h3>
								<ul class="m-subheader__breadcrumbs m-nav m-nav--inline">
									<li class="m-nav__item m-nav__item--home">
										<a href="<?= site_url() ?>admin/dashboard" class="m-nav__link m-nav__link--icon">
											<i class="m-nav__link-icon la la-home"></i>
										</a>
									</li>
									<li class="m-nav__separator">
										-
									</li>
									<li class="m-nav__item">
										<a href="<?= site_url() ?>admin/gudang/inventory" class="m-nav__link">
											<span class="m-nav__link-text">
												Inventory
											</span>
										</a>
									</li>
									<li class="m-nav__separator">
										-
									</li>
									<li class="m-nav__item">
										<a href="<?= site_url() ?>admin/gudang/inventory/tambah" class="m-nav__link">
											<span class="m-nav__link-text">
												Tambah
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
								<div class="m-portlet m-portlet--tab">
									<div class="m-portlet__head">
										<div class="m-portlet__head-caption">
											<div class="m-portlet__head-title">
												<span class="m-portlet__head-icon m--hide">
													<i class="la la-gear"></i>
												</span>
												<h3 class="m-portlet__head-text">
													Tambah Item Inventory
												</h3>
											</div>
										</div>
									</div>
									<!--begin::Form-->
							<form action="<?= site_url() ?>admin/gudang/inventory/submit" enctype="multipart/form-data" class="m-form m-form--fit m-form--label-align-right" method="post" id="tambah_inventory">
										<div class="m-portlet__body">
											<div class="form-group m-form__group row">
												<label  class="col-2 col-form-label">
													ID Barang
												</label>
												<div class="col-10">
													<input class="form-control m-input" type="text" value="" id="id_barang" name="id_barang">
												</div>
											</div>
											<div class="form-group m-form__group row">
												<label class="col-2 col-form-label">
													Nama Barang
												</label>
												<div class="col-10">
													<input class="form-control m-input" type="text" value="" id="nama_barang" name="nama_barang">
												</div>
											</div>
											<div class="form-group m-form__group row">
												<label  class="col-2 col-form-label">
													No Seri
												</label>
												<div class="col-10">
													<input class="form-control m-input" type="text" value="" id="no_seri" name="no_seri">
												</div>
											</div>
											<div class="form-group m-form__group row">
												<label  class="col-2 col-form-label">
													Kondisi
												</label>
												<div class="col-10">
													<select name="kondisi" class="form-control" id="kondisi">
														<option value="">-- Pilih --</option>
														<option value="baik">BAIK</option>
														<option value="rusak">RUSAK</option>
													</select>
												</div>
											</div>
											
											<div align="center" style="margin-top: 30px" class="offset-lg-3 col-lg-6">
												<img style="display: none" id="image-preview" alt="image preview"/>
												<br/>
												<input type="file" id="image_source" name="image_source" onchange="previewImage();"/>
											</div>
											<div style="margin-top: 20px" align="center">
												<button disabled type="button" class="btn btn-success btn_pemasangan" id="btn_tambah_item_inventory">Tambah Item</button>
											</div>
										</div>
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>