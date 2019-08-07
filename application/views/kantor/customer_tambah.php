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
										<a href="<?= base_url() ?>kantor/customer/tambah" class="m-nav__link">
											<span class="m-nav__link-text">
												Tambah Pelanggan
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
													Tambah Pelanggan
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
													<input readonly class="form-control m-input" type="text" value="<?= $data['id'] ?>" name="id_pelanggan" id="id_pelanggan">
												</div>
											</div>
											<div class="form-group m-form__group row">
												<label  class="col-2 col-form-label">
													Nama Pelanggan
												</label>
												<div class="col-10">
													<input class="form-control m-input" type="text" name="nama_pelanggan" id="nama_pelanggan" placeholder="contoh: Bpk. Hendy">
												</div>
											</div>
											<div class="form-group m-form__group row">
												<label  class="col-2 col-form-label">
													Nomor Telepon
												</label>
												<div class="col-10">
													<input class="form-control m-input" type="number" name="telepon_pelanggan" id="telepon_pelanggan" placeholder="contoh: 08212734xxxx">
												</div>
											</div>
											<div class="form-group m-form__group row">
												<label  class="col-2 col-form-label">
													Alamat
												</label>
												<div class="col-10">
													<input class="form-control m-input" type="text" name="alamat_pelanggan" id="alamat_pelanggan" placeholder="contoh: Jl. Poros Malino, Komplek Griya Riski Abadi C6">
												</div>

											</div>
											<div class="form-group m-form__group row">
												<div class="col-12">
                                                    <fieldset class="gllpLatlonPicker">
                                                        <br/><div>Geser marker untuk menentukan lokasi di peta:</div>
	                                                    <div class="gllpMap" style="width: 100%; height: 500px;">Google Maps</div><br/>
	                                                    <input type="hidden" class="gllpLatitude" id="lat" value="-5.152367300387836" />
	                                                    <input type="hidden" class="gllpLongitude" id="lon" value="119.44765090942383" />
	                                                    <input type="hidden" class="gllpZoom" value="13" />
	                                                </fieldset>
												</div>
											</div>

											<div class="form-group m-form__group row">
												<label  class="col-2 col-form-label">
													Tipe Pelanggan
												</label>
												<div class="col-10">
													<div class="m-radio-inline">
														<label class="m-radio">
															<input type="radio" name="tipe_pelanggan" value="1" checked>
															Korporasi
															<span></span>
														</label>
														<label class="m-radio">
															<input type="radio" name="tipe_pelanggan" value="2">
															Personal
															<span></span>
														</label>
													</div>
												</div>
											</div>
											<div style="margin-top: 20px" align="center">
												<button id="btn_tambah_data_pelanggan" type="button" class="btn btn-primary" disabled>
													Tambah Data Pelanggan
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

		<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDGWlOWmWq1SyVuPJvCZBWoXgvcPR__QKk" type="text/javascript"></script>
        <link rel="stylesheet" href="<?=base_url()?>assets/vendors/custom/jquery-latitude-longitude-picker-gmaps/css/jquery-gmaps-latlon-picker.css" rel="stylesheet" />
        <script src="<?=base_url()?>assets/vendors/custom/jquery-latitude-longitude-picker-gmaps/js/jquery-gmaps-latlon-picker.js"></script>
