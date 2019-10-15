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
										<a href="<?= base_url() ?>" class="m-nav__link m-nav__link--icon">
											<i class="m-nav__link-icon la la-home"></i>
										</a>
									</li>
									<li class="m-nav__separator">
										-
									</li>
									<li class="m-nav__item">
										<a href="<?= base_url() ?>price" class="m-nav__link">
											<span class="m-nav__link-text">
												Manajemen harga
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
														<div>
															<button style="margin-top: 15px;margin-left: 30px" class="btn btn-primary" data-toggle="modal" data-target="#m_tambah_data_harga">
																+ Tambah Data Harga
															</button>
														</div>
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
																<th>Harga Toko</th>
																<th>Modal</th>
																<th>Keterangan</th>
																<th>Aksi</th>
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
														<div>
															<button style="margin-top: 15px;margin-left: 30px" class="btn btn-primary" data-toggle="modal" data-target="#m_tambah_data_harga_jasa">
																+ Tambah Data Harga Jasa
															</button>
														</div>
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
																<th>Nama Barang</th>
																<th>Tipe</th>
																<th>Merek</th>
																<th>Harga Partai</th>
																<th>Harga Toko</th>
																<th>Modal</th>
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
			</div>
			<!-- end:: Body -->
			<!--begin::Modal-->
			<!-- Modal : TAMBAH DATA HARGA -->
			<div class="modal fade" id="m_tambah_data_harga"   role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="exampleModalLabel">
								Tambah Data Harga
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
									Kategori
								</label>
								<div class="col-9">
									<select disabled class="form-control" name="barang"> 
										<option active value="barang">Barang</option>
									</select>
								</div>
							</div>
							<div class="form-group m-form__group row">
								<label class="col-3 col-form-label">
									Kode / Nama Item
								</label>
								<div class="col-9">
									<select style="width: 100%" class="form-control m-select2 dropdown_search select2-hidden-accessible" name="kode_item" tabindex="-1" aria-hidden="true">
										<?php 
											foreach ($data as $value) { 
												if($value['kategori'] == "unit") { ?>
												<option value="<?= $value['id'] ?>"><?= $value['kode'] ?> || <?= $value['nama'] ?></option>
										<?php 
												}
											}
										 ?>
									</select>
								</div>
							</div>
							<div class="form-group m-form__group row">
								<label  class="col-3 col-form-label">
									Modal
								</label>
								<div class="col-9">
									<input class="form-control m-input" type="number" value="" id="harga_modal">
								</div>
							</div>
							<div class="form-group m-form__group row">
								<label  class="col-3 col-form-label">
									Harga Partai
								</label>
								<div class="col-9">
									<input class="form-control m-input" type="number" value="" id="harga_partai">
								</div>
							</div>
							<div class="form-group m-form__group row">
								<label  class="col-3 col-form-label">
									Harga Toko
								</label>
								<div class="col-9">
									<input class="form-control m-input" type="number" value="" id="harga_kantor">
								</div>
							</div>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-secondary" data-dismiss="modal">
								Tutup
							</button>
							<button disabled id="btn_tambah" type="button" class="btn btn-primary" data-dismiss="modal">
								Tambah
							</button>
						</div>
					</div>
				</div>
			</div>
			<!-- Modal : EDIT DATA HARGA -->
			<div class="modal fade" id="m_edit_data_harga" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="exampleModalLabel">
								Edit Harga
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
									Kode Item
								</label>
								<div class="col-9">
									<select disabled class="form-control" name="edit_barang"> 
										<option active value="barang">Barang</option>
									</select>
								</div>
							</div>
							<div class="form-group m-form__group row">
								<label  class="col-3 col-form-label">
									Kode / Nama item
								</label>
								<div class="col-9">
									<select disabled style="width: 100%" class="form-control m-select2 dropdown_search select2-hidden-accessible edit_kode_item" name="edit_kode_item" tabindex="-1" aria-hidden="true">
										<?php 
											foreach ($data as $value) { 
												if($value['kategori'] == "unit") { ?>
												<option value="<?= $value['id'] ?>"><?= $value['kode'] ?> || <?= $value['nama'] ?></option>
										<?php 
												}
											}
										 ?>
									</select>
								</div>
							</div>
							<div class="form-group m-form__group row">
								<label  class="col-3 col-form-label">
									Modal
								</label>
								<div class="col-9">
									<input class="form-control m-input" type="number" value="" id="edit_harga_modal">
								</div>
							</div>
							<div class="form-group m-form__group row">
								<label  class="col-3 col-form-label">
									Harga Partai
								</label>
								<div class="col-9">
									<input class="form-control m-input" type="number" value="" id="edit_harga_partai">
								</div>
							</div>
							<div class="form-group m-form__group row">
								<label  class="col-3 col-form-label">
									Harga Toko
								</label>
								<div class="col-9">
									<input class="form-control m-input" type="number" value="" id="edit_harga_toko">
								</div>
							</div>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-secondary" data-dismiss="modal">
								Tutup
							</button>
							<button id="btn_selesai_edit" type="button" class="btn btn-primary" data-dismiss="modal">
								Selesai
							</button>
						</div>
					</div>
				</div>
			</div>
			<!-- Modal : TAMBAH DATA HARGA Jasa -->
			<div class="modal fade" id="m_tambah_data_harga_jasa"   role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="exampleModalLabel">
								Tambah Data Harga
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
									Kode Item
								</label>
								<div class="col-9">
									<select disabled class="form-control" name="jasa"> 
										<option active value="jasa">Jasa</option>
									</select>
								</div>
							</div>
							<div class="form-group m-form__group row">
								<label  class="col-3 col-form-label">
									Kode / Nama item
								</label>
								<div class="col-9">
									<select style="width: 100%" class="form-control m-select2 dropdown_search select2-hidden-accessible" name="edit_kode_item_jasa" tabindex="-1" aria-hidden="true">
										<?php 
											foreach ($data as $value) { 
												if($value['kategori'] == "jasa") { ?>
												<option value="<?= $value['id'] ?>"><?= $value['kode'] ?> || <?= $value['nama'] ?></option>
										<?php 
												}
											}
										 ?>
									</select>
								</div>
							</div>
							<div class="form-group m-form__group row">
								<label  class="col-3 col-form-label">
									Modal
								</label>
								<div class="col-9">
									<input class="form-control m-input" type="number" value="" id="harga_modal">
								</div>
							</div>
							<div class="form-group m-form__group row">
								<label  class="col-3 col-form-label">
									Harga Partai
								</label>
								<div class="col-9">
									<input class="form-control m-input" type="number" value="" id="harga_partai">
								</div>
							</div>
							<div class="form-group m-form__group row">
								<label  class="col-3 col-form-label">
									Harga Toko
								</label>
								<div class="col-9">
									<input class="form-control m-input" type="number" value="" id="harga_toko_jasa">
								</div>
							</div>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-secondary" data-dismiss="modal">
								Tutup
							</button>
							<button id="btn_tambah_harga_jasa" type="button" class="btn btn-primary" data-dismiss="modal">
								Tambah
							</button>
						</div>
					</div>
				</div>
			</div>
			<!-- Modal : EDIT DATA HARGA Jasa -->
			<div class="modal fade" id="m_edit_data_harga_jasa" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="exampleModalLabel">
								Edit Harga
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
									Kode Item
								</label>
								<div class="col-9">
									<select disabled class="form-control" name="edit_jasa"> 
										<option active value="jasa">Jasa</option>
									</select>
								</div>
							</div>
							<div class="form-group m-form__group row">
								<label  class="col-3 col-form-label">
									Kode / Nama item
								</label>
								<div class="col-9">
									<select style="width: 100%" class="form-control m-select2 dropdown_search select2-hidden-accessible" name="edit_kode_item_jasa" tabindex="-1" aria-hidden="true">
										<?php 
											foreach ($data as $value) { 
												if($value['kategori'] == "jasa") { ?>
												<option value="<?= $value['id'] ?>"><?= $value['kode'] ?> || <?= $value['nama'] ?></option>
										<?php 
												}
											}
										 ?>
									</select>
								</div>
							</div>
							<div class="form-group m-form__group row">
								<label class="col-3 col-form-label">
									Modal
								</label>
								<div class="col-9">
									<input class="form-control m-input" type="number" value="" id="edit_harga_modal_jasa">
								</div>
							</div>
							<div class="form-group m-form__group row">
								<label  class="col-3 col-form-label">
									Harga Partai
								</label>
								<div class="col-9">
									<input class="form-control m-input" type="number" value="" id="edit_harga_partai_jasa">
								</div>
							</div>
							<div class="form-group m-form__group row">
								<label  class="col-3 col-form-label">
									Harga Toko
								</label>
								<div class="col-9">
									<input class="form-control m-input" type="number" value="" id="edit_harga_toko_jasa">
								</div>
							</div>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-secondary" data-dismiss="modal">
								Tutup
							</button>
							<button id="btn_selesai_edit_harga_jasa" type="button" class="btn btn-primary" data-dismiss="modal">
								Selesai
							</button>
						</div>
					</div>
				</div>
			</div>
			<!--end::Modal-->