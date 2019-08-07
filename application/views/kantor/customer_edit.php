<div class="m-grid__item m-grid__item--fluid m-wrapper">
				<!-- BEGIN: Subheader -->
				<div class="m-subheader ">
					<div class="d-flex align-items-center">
						<div class="mr-auto">
							<h3 class="m-subheader__title m-subheader__title--separator">
								 Pelanggan
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
									<a href="<?= base_url() ?>kantor/customer" class="m-nav__link">
										<span class="m-nav__link-text">
											Pelanggan
										</span>
									</a>
								</li>
								<li class="m-nav__separator">
									-
								</li>
								<li class="m-nav__item">
									<a href="<?= base_url() ?>kantor/customer/edit/<?= $data->id ?>" class="m-nav__link">
										<span class="m-nav__link-text">
											Edit Data
										</span>
									</a>
								</li>
							</ul>
						</div>
						<div>
							
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
											Edit Data Pelanggan
										</h3>
									</div>
								</div>
							</div>
							<!--begin::Form-->
							<form class="m-form m-form--fit m-form--label-align-right">
								<div class="m-portlet__body">
									<div class="form-group m-form__group row">
										<label  class="col-2 col-form-label">
											ID Pelanggan
										</label>
										<div class="col-10">
											<input  class="form-control m-input" type="text" value="<?= $data->id ?>" id="id_pelanggan" readonly>
										</div>
									</div>
									<div  class="form-group m-form__group row">
										<label  class="col-2 col-form-label">
											Nama Pelanggan
										</label>
										<div class="col-10">
											<input  class="form-control m-input" type="text" value="<?= $data->nama ?>" name="nama_pelanggan" id="nama_pelanggan">
										</div>
									</div>
									<div class="form-group m-form__group row">
										<label  class="col-2 col-form-label">
											Nomor Telepon
										</label>
										<div class="col-10">
											<input class="form-control m-input" type="number" value="<?= $data->telepon ?>" name="telepon_pelanggan" id="telepon_pelanggan">
										</div>
									</div>
									<div class="form-group m-form__group row">
										<label  class="col-2 col-form-label">
											Alamat
										</label>
										<div class="col-10">
											<input class="form-control m-input" type="text" value="<?= $data->alamat ?>" name="alamat_pelanggan" id="alamat_pelanggan">
										</div>

									</div>
									<div style="margin-top: 20px" align="center">
										<button id="btn_edit_data_pelanggan" type="button" class="btn btn-primary">
											Edit Data Pelanggan
										</button>
									</div>
									</button>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end:: Body -->



	<!--  Begin::Modals -->
	<div class="modal fade" id="modal_tambah_pemasangan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
							Nama Barang
						</label>
						<div class="col-10">
							<select style="width: 100%" class="form-control" name="nama_barang">
								<option value="1">
									AC Split 1/2 PK Malaysia
								</option>
								<option value="2">
									AC Daikin 1 PK 
								</option>
								<option value="3">
									AC Split 1 PK Thailand
								</option>
							</select>
						</div>
					</div> 
					<div class="form-group m-form__group row">
						<label for="example-text-input" class="col-2 col-form-label">
							Jumlah
						</label>
						<div class="col-10">
							<div class="input-group">
								<input name="jumlah_barang" type="text" class="form-control m-input" value="2" aria-describedby="basic-addon2">
								<div class="input-group-append">
									<span class="input-group-text" id="basic-addon2">
										Unit
									</span>
								</div>
							</div>
						</div>
					</div>
					<div class="form-group m-form__group row">
						<label for="example-text-input" class="col-2 col-form-label">
							Keterangan
						</label>
						<div class="col-10">
							<textarea class="form-control m-input m-input--solid" name="keterangan" rows="3"></textarea>
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
	<!-- End::Modals -->