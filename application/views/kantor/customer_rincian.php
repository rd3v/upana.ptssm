				<div class="m-grid__item m-grid__item--fluid m-wrapper">
					<!-- BEGIN: Subheader -->
					<div class="m-subheader ">
						<div class="d-flex align-items-center">
							<div class="mr-auto">
								<h3 class="m-subheader__title m-subheader__title--separator">
									Rincian Pelanggan
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
										<a href="<?= base_url() ?>kantor/customer/rincian/<?= $data->id ?>" class="m-nav__link">
											<span class="m-nav__link-text">
												Rincian
											</span>
										</a>
									</li>
								</ul>
							</div>
						</div>
					</div>
					<!-- END: Subheader -->
					<div class="m-content">

						<!-- Daftar AC Milik Pelanggan  -->
						<div class="row">
							<div class="col-xl-12">
								<div class="m-portlet m-portlet--mobile">
									<div class="m-portlet__head header">
										<h3 class="header-pesanan">
										</h3><br>
										<h3 class="header-pesanan-no"> 
											Rincian Pelanggan
										</h3><br><br>
										<div class="info row">
											<div class="col-sm">
												<p id="id_pelanggan">
													<i class="">ID :</i> <?= $data->id ?>
												</p> 
												<p id="nama_pelanggan">
													<i class="flaticon-users"> </i> <?= $data->nama ?>
												</p>
												<p id="no_telpon">
													<i class="fa fa-phone"> </i> <?= $data->telepon ?>
												</p>
											</div>
											<div class="col-sm">
												<p id="email_pelanggan"><i class="fa fa-envelope-o "> </i> aldi4rifaldi@gmail.com</p> 
												<p id="alamat_pelanggan"><i class="flaticon-placeholder-1"> </i> <?= $data->alamat ?></p>
												<p>Tipe : <span id="tipe_pelanggan"><?php if($data->tipe == 1) { echo "Korporasi"; } elseif($data->tipe == 2) { echo "Personal"; } ?></span></p>
											</div>
										</div>	
							</div>
							<div class="m-portlet__body">
								
								<button onclick="window.location.href='<?= base_url() ?>kantor/customer/riwayat/<?= $data->id ?>'" class="btn btn-success">
									<i class="fa fa-paper-plane-o"></i> Riwayat Pekerjaan
								</button>
							</div>
							<div class="m-portlet__body">
								<div class="list_item_pemasangan">
									<div class="m-portlet__head-title row" style="margin-bottom: 20px;">
										<div class="col-6">
											<h4>
												List AC
											</h4>	
										</div>
										<div align="right" class="col-6">
											<button style="width: 200px"  data-toggle="modal" data-target="#modal_tambah_item" type="button" class="btn btn-success">+ Tambah Item</button>	
										</div>
										<div class=" col-md-6 ">
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
								<table class="table" id="tbl_item_ac">
									<thead>
										<tr>
											<th>No</th>
											<th>ID Unit</th>
											<th>Nama Barang</th>
											<th>Type Barang</th>
											<th>Merek</th>
											<th>Aksi</th>
										</tr>
									</thead>
									<tbody>
										
									</tbody>
								</table>
							</div>
						</div>

					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end:: Body -->
	<!-- Modal here --> 
	<div class="modal fade" id="modal_tambah_item"  role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">
						+ Tambah Item
					</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">
							&times;
						</span>
					</button>
				</div>
				<div class="modal-body">
					<div class="form-group m-form__group row">
						<label for="example-text-input" class="col-3 col-form-label">
							Nama Barang
						</label>
						<div class="col-9">
							<div class="input-group">
								<input name="name_item" type="text" class="form-control m-input" value="AC Daikin" >
								<div class="input-group-append">
								</div>
							</div>
						</div>
					</div>

					<div class="form-group m-form__group row">
						<label for="example-text-input" class="col-3 col-form-label">
							Type Barang
						</label>
						<div class="col-9">
							<div class="input-group">
								<input name="name_item" type="text" class="form-control m-input" value="Ac Indoor" >
								<div class="input-group-append">
								</div>
							</div>
						</div>
					</div>
					<div class="form-group m-form__group row">
						<label for="example-text-input" class="col-3 col-form-label">
							Merek Barang
						</label>
						<div class="col-9">
							<div class="input-group">
								<input name="name_item" type="text" class="form-control m-input" value="Panasonic" >
								<div class="input-group-append">
								</div>
							</div>
						</div>
					</div>

					<div class="form-group m-form__group row">
						<label for="example-text-input" class="col-3 col-form-label">
							ID Unit
						</label>
						<div class="col-9">
							<div class="input-group">
								<input name="jumlah_barang" type="number" class="form-control m-input" value="01" aria-describedby="basic-addon2">
								<div class="input-group-append">
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">
						Tutup
					</button>
					<button id="btn_tambah_item" data-dismiss="modal" type="button" class="btn btn-primary">
						Tambahkan
					</button>
				</div>
			</div>
		</div>
	</div>

	<div class="modal fade" id="modal_edit_item"  role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">
						Edit Item
					</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">
							&times;
						</span>
					</button>
				</div>
				<div class="modal-body">
					<div class="form-group m-form__group row">
						<label for="example-text-input" class="col-3 col-form-label">
							Nama Barang
						</label>
						<div class="col-9">
							<div class="input-group">
								<input name="name_item" type="text" class="form-control m-input" value="AC Daikin" >
								<div class="input-group-append">
								</div>
							</div>
						</div>
					</div>

					<div class="form-group m-form__group row">
						<label for="example-text-input" class="col-3 col-form-label">
							Type Barang
						</label>
						<div class="col-9">
							<div class="input-group">
								<input name="name_item" type="text" class="form-control m-input" value="Ac Indoor" >
								<div class="input-group-append">
								</div>
							</div>
						</div>
					</div>
					<div class="form-group m-form__group row">
						<label for="example-text-input" class="col-3 col-form-label">
							Merek Barang
						</label>
						<div class="col-9">
							<div class="input-group">
								<input name="name_item" type="text" class="form-control m-input" value="Panasonic" >
								<div class="input-group-append">
								</div>
							</div>
						</div>
					</div>

					<div class="form-group m-form__group row">
						<label for="example-text-input" class="col-3 col-form-label">
							ID Unit
						</label>
						<div class="col-9">
							<div class="input-group">
								<input name="jumlah_barang" type="number" class="form-control m-input" value="12123122" aria-describedby="basic-addon2">
								<div class="input-group-append">
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">
						Tutup
					</button>
					<button id="btn_tambah_item" data-dismiss="modal" type="button" class="btn btn-primary">
						Simpan
					</button>
				</div>
			</div>
		</div>
	</div>

	<!-- Modal End Here -->