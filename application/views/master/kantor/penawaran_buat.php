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
										<a href="<?= site_url() ?>admin/dashboard" class="m-nav__link m-nav__link--icon">
											<i class="m-nav__link-icon la la-home"></i>
										</a>
									</li>
									<li class="m-nav__separator">
										-
									</li>
									<li class="m-nav__item">
										<a href="<?= site_url() ?>admin/kantor/penawaran" class="m-nav__link">
											<span class="m-nav__link-text">
												Penawaran
											</span>
										</a>
									</li>
									<li class="m-nav__separator">
										-
									</li>
									<li class="m-nav__item">
										<a href="<?= site_url() ?>admin/kantor/penawaran/create" class="m-nav__link">
											<span class="m-nav__link-text">
												Buat Penawaran
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
													Buat Penawaran
												</h3>
											</div>
										</div>
									</div>
									<!--begin::Form-->
									<form class="m-form m-form--fit m-form--label-align-right">
										<div class="m-portlet__body">
											<div class="form-group m-form__group row">
												<label  class="col-2 col-form-label">
													Tipe Pajak
												</label>
												<div class="col-10">
													<select disabled class="form-control m-input m-input--square" id="tipe_pajak">
														<option active value="2">
															Pajak (Kantor)
														</option>
													</select>
												</div>
											</div>
											<div class="form-group m-form__group row">
												<label  class="col-2 col-form-label">
													Reff
												</label>
												<div class="col-10">
													<input class="form-control m-input" type="text" id="no_reff">
												</div>
											</div>
											<div class="form-group m-form__group row">
												<label class="col-2 col-form-label">
													Tanggal
												</label>
												<div class="col-10">
													<input class="form-control m-input" type="date" id="tanggal_pembuatan_spk">
												</div>
											</div>
											<div class="form-group m-form__group row">
												<label  class="col-2 col-form-label">
													Penerima
												</label>
												<div class="col-10">
													<input class="form-control m-input" type="text" id="nama_penerima">
												</div>
											</div>
											<div class="form-group m-form__group row">
												<label  class="col-2 col-form-label">
													Perihal
												</label>
												<div class="col-10">
													<input class="form-control m-input" type="text" id="perihal">
												</div>
											</div>
											<div class="m-portlet__body">
												<div class="m-portlet__head-title">
													<h3 align="center" class="m-portlet__head-text">
														List Item Penawaran
													</h3><br>
													<div style="padding: 10px" align="right">
														<button type="button" data-toggle="modal" data-target="#modal_tambah_item_penawaran" class="btn btn-primary modal_tambah_item_penawaran">
															Tambah Item
														</button>	
													</div>
													
												</div>
												<table class="table" id="tbl_item_penawaran">
													<thead>
														<tr>
															<th>No</th>
															<th>Type</th>
															<th>Model</th>
															<th>Btu/hr</th>
															<th>Daya Listrik(w)</th>
															<th>Jumlah(unit)</th>
															<th>Harga</th>
															<th>Aksi</th>
														</tr>
													</thead>
													<tbody></tbody>
												</table>
											</div>
										</div>
									</form>
									<div class="m-portlet__body">
										<div class="m-portlet__head-title">
											<h3 align="center" class="m-portlet__head-text">
												Jasa Pemasangan dan Material AC
											</h3>
											<div style="padding: 10px" align="right">
												<button type="button" data-toggle="modal" data-target="#modal_tambah_pekerjaan" class="btn btn-primary">
													Tambah Pekerjaan
												</button>	
											</div>
										</div>
										<table class="table" id="tbl_jasa_pemasangan">
											<thead>
												<tr>
													<th>No</th>
													<th>Urian Pekerjaan</th>
													<th>Model</th>
													<th>Jumlah</th>
													<th>Harga</th>
													<th>Total Harga</th>
													<th>Aksi</th>
												</tr>
											</thead>
											<tbody></tbody>
										</table>

										<table style="width: 100%" class="tg">
											<tr>
												<th style="width: 10%" class="tg-s268" ></th>
												<th style="width: 50%" class="tg-s268" ></th>
												<th style="width: 20%" class="tg-s268" >Sub Total</th>
												<th id="sub_total" style="width: 20%" class="tg-s268" ></th>
											</tr>
											<tr>
												<th style="width: 10%" class="tg-s268" ></th>
												<th style="width: 50%" class="tg-s268" ></th>
												<th style="width: 20%" class="tg-s268" >Total Unit + Instalasi</th>
												<th id="total_keseluruhan" style="width: 20%" class="tg-s268" ></th>
											</tr>
										</table>
										<div align="center">
											<button disabled id="btn_buat_penawaran" type="button" class="btn btn-primary btn_pemasangan">Buat Penawaran</button>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- end:: Body -->
			<!--  Begin::Modals -->
			<div class="modal fade" id="modal_tambah_item_penawaran" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="exampleModalLabel">
								Tambah Pemasangan
							</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">
									&times;
								</span>
							</button>
						</div>
						<div class="modal-body">
							<div class="form-group m-form__group row">
								<label for="example-text-input" class="col-2 col-form-label">
									Type
								</label>
								<div class="col-10">
									<select style="width: 100%" class="form-control m-select2 dropdown_search" name="type_penawaran_barang" title="Barang">
										<option active></option>
										<?php 
											foreach ($data['get_listitem'] as $value) { ?>
												<option value="<?= $value['id'] ?>"><?= $value['kode'] ?> || <?= $value['nama'] ?></option>	
										<?php }
										 ?>
									</select>
								</div>
							</div>
							<div class="form-group m-form__group row">
								<label for="example-text-input" class="col-2 col-form-label">
									Model 
								</label>
								<div class="col-10">
									<input class="form-control m-input" readonly type="text" name="model_stock">
									
								</div>
							</div>
							<div class="form-group m-form__group row">
								<label for="example-text-input" class="col-2 col-form-label">
									Btu/hr
								</label>
								<div class="col-10">
									<input class="form-control m-input" type="number" value="" id="btu" name="btu">
								</div>
							</div>
							<div class="form-group m-form__group row">
								<label for="example-text-input" class="col-2 col-form-label">
									Daya Listrik(w)
								</label>
								<div class="col-10">
									<input class="form-control m-input" type="number" value="" id="daya_listrik" name="daya_listrik">
								</div>
							</div>

							<div class="form-group m-form__group row">
								<label for="example-text-input" class="col-2 col-form-label">
									Harga
								</label>
								

								<div class="col-10">
									<div class="input-group">
										<div class="input-group-append">
											<span class="input-group-text" id="basic-addon2">
												Rp
											</span>
										</div>
										<input name="harga_item" type="number" disabled class="form-control m-input" aria-describedby="basic-addon2">
									</div>
								</div>
							</div>


							<div class="form-group m-form__group row">
								<label for="example-text-input" class="col-2 col-form-label">
									Jumlah
								</label>
								<div class="col-10">
									<div class="input-group">
										<input name="jumlah_barang" type="number" class="form-control m-input" aria-describedby="basic-addon2">
										<div class="input-group-append">
											<span class="input-group-text" id="basic-addon2">
												Unit
											</span>
										</div>
									</div>
								</div>
							</div>
							
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-secondary" data-dismiss="modal">
								Tutup
							</button>
							<button id="btn_tambah_pemasangan" data-dismiss="modal" type="button" class="btn btn-primary">
								Tambahkan
							</button>
						</div>
					</div>
				</div>
			</div>

			<div class="modal fade" id="modal_tambah_pekerjaan" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="exampleModalLabel">
								Tambah Pekerjaan
							</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">
									&times;
								</span>
							</button>
						</div>
						<div class="modal-body">
							<div class="form-group m-form__group row">
								<label for="example-text-input" class="col-2 col-form-label">
									Uriaan Pekerjaan
								</label>
								<div class="col-10">
									<select style="width: 100%" class="form-control m-select2 dropdown_search" name="type_penawaran_jasa">
										<option active></option>
										<?php 
											foreach ($data['get_jasapemasangan_materialac'] as $value) { ?>
												<option value="<?= $value['id'] ?>"><?= $value['nama'] ?></option>	
										<?php }
										 ?>
									</select>
								</div>
							</div>
							<div class="form-group m-form__group row">
								<label for="example-text-input" class="col-2 col-form-label">
									Model 
								</label>
								<div class="col-10">
									<input type="text" name="model_jasa" class="form-control" readonly>
									<!-- <select style="width: 100%" class="form-control m-select2 dropdown_search" name="model_jasa" disabled>
									</select> -->
								</div>
							</div>
							<div class="form-group m-form__group row">
								<label for="example-text-input" class="col-2 col-form-label">
									Jumlah
								</label>
								<div class="col-10">
									<div class="input-group">
										<input name="jumlah_jasa" type="text" class="form-control m-input" aria-describedby="basic-addon2">
										<input type="hidden" name="harga_jasa">
										<div class="input-group-append">
											<span class="input-group-text" id="basic-addon2">
												Unit
											</span>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-secondary" data-dismiss="modal">
								Tutup
							</button>
							<button id="btn_tambah_pekerjaan" data-dismiss="modal" type="button" class="btn btn-primary">
								Tambahkan
							</button>
						</div>
					</div>
				</div>
			</div>
			<!-- End::Modals -->