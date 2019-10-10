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
										<a href="<?= base_url() ?>admin/dashboard" class="m-nav__link m-nav__link--icon">
											<i class="m-nav__link-icon la la-home"></i>
										</a>
									</li>
									<li class="m-nav__separator">
										-
									</li>
									<li class="m-nav__item">
										<a href="<?= base_url() ?>admin/gudang/stock/master" class="m-nav__link">
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
															Kantor (Pajak)
														</option>
														<option value="2">
															Toko (Non Pajak)
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
											<table class="m_datatable">
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

						<!-- begin::Footer -->
			<footer class="m-grid__item		m-footer ">
				<div class="m-container m-container--fluid m-container--full-height m-page__container">
					<div class="m-stack m-stack--flex-tablet-and-mobile m-stack--ver m-stack--desktop">
						<div class="m-stack__item m-stack__item--left m-stack__item--middle m-stack__item--last">
							<span class="m-footer__copyright">
								Upa'na Studio
							</span>
						</div>

					</div>
				</div>
			</footer>
			<!-- end::Footer -->
		</div>
		<!-- end:: Page -->
		<!-- begin::Scroll Top -->
		<div class="m-scroll-top m-scroll-top--skin-top" data-toggle="m-scroll-top" data-scroll-offset="500"data-scroll-speed="300">
			<i class="la la-arrow-up"></i>
		</div>
		<!-- end::Scroll Top -->

		<!--begin::Base Scripts -->
		<script src="<?= base_url() ?>assets/vendors/base/vendors.bundle.js" type="text/javascript"></script>
		<script src="<?= base_url() ?>assets/demo/default/base/scripts.bundle.js" type="text/javascript"></script>
		<!--end::Base Scripts -->
		<!--begin::Page Snippets -->
		<script src="<?= base_url() ?>assets/app/js/dashboard.js" type="text/javascript"></script>
		<!--end::Page Snippets -->
		<script>

			$("li#stock-master").addClass("m-menu__item--active");
			var tbl_list_master_stock;
			tbl_list_master_stock = $('.m_datatable').mDatatable({
					data: {
						type: 'remote',
						source: {
							  read: {
							  	url: "<?= site_url() ?>gudang/stock/master/getdata",
							  	// url: 'https://projects.upanastudio.com/ptssm/app/gudang/stock/master/getdata',
					  		  },
						},
						serverPaging: true,
						serverFiltering: true,
						serverSorting: true,
						},
						layout: {
							theme: 'default',
							scroll: true,
						},
						sortable:true,
						search: {
							input: $('#generalSearch'),
						},
						columns: [
						{
							field: "no",
							template: function(data, type, row, meta) {
								return ((row.getCurrentPage() - 1) * row.getPageSize()) + type + 1;
							},
							textAlign: "center",
						},
						{
							field: "kategori",
							textAlign: "center",

						},
						{
							field: 'kode',
							textAlign: 'center',
						},
						{
							field: 'nama',
							textAlign: 'center',
						},
						{
							field: "tipe_gudang",
							template: function(data, type, row, meta) {
								var html = ""
								if(data.tipe_gudang == 1) {
									html = "Toko (Non Pajak)";
								} else if(data.tipe_gudang == 2) {
									html = "Kantor (Pajak)";
								}
								return html;
							},
							textAlign: "center",
						},
						{
							field: 'tipe',
							textAlign: 'center'
						},
						{
							field: 'merk',
							textAlign: 'center'
						},
						{
							field: 'stock',
							textAlign: 'center'
						},
						{
							field: 'satuan',
							textAlign: 'center'
						},
						{
							field: 'keterangan',
							textAlign: 'center',
						},
						{
							field: 'gambar',
							template: function(data, type, row, meta) {
								if(data.gambar == "" || data.gambar == null) {
									return "Tidak ada Gambar";
								} else {
									return "<img src='<?= base_url() ?>assets/img/"+data.gambar+"' width='75px'>";
								}
							},
							textAlign: 'center',
						},
						{
							field: 'aksi',
							template: function(data, type, row, meta) {
								return "<a href='<?= base_url() ?>admin/gudang/stock/master/edit/"+data.id + "' class='btn btn-sm btn-primary' style='color:white; width:80px;'>Edit</a><button data-id='"+data.id+"' class='btn btn-sm btn-secondary btnhapus' style='width:80px;'>Hapus</button>";
							},
							textAlign: 'center',
						}

						],
					});

					function previewImage() {
						document.getElementById("image-preview").style.display = "block";
						var oFReader = new FileReader();
						oFReader.readAsDataURL(document.getElementById("image_source").files[0]);

						oFReader.onload = function(oFREvent) {
							document.getElementById("image-preview").src = oFREvent.target.result;
						};
					};
					var Select2 = function() {
							var demos = function(){
							// basic
							$('.dropdown_search, .dropdown_search_validate').select2({
								placeholder: "Pilih Kategori"
							});
							}

							return {
								init: function() {
									demos();
								}
							};
						}();

					jQuery(document).ready(function() {
						Select2.init();
					});


					$('#btn_tambah').click(function() {

						var input_kode_barang = $("input[name=input_kode_barang]").val();
						var kategori_item = $("select[name=kategori_item] option:selected").val();
						var nama_barang = $("input[name=nama_barang]").val();
						var input_satuan_barang = $("input[name=input_satuan_barang]").val();
						var stock_minimal = $("input[name=stock_minimal]").val();

						if(input_kode_barang == "") {
							swal('Kode barang kosong !!!');
						} else if(kategori_item == "") {
							swal('Kategori barang kosong !!!');
						} else if(nama_barang == "") {
							swal('Nama barang kosong !!!');
						} else if(input_satuan_barang == "") {
							swal('Satuan barang kosong !!!');
						} else if(stock_minimal == "") {
							swal('Stock Minimal kosong !!!');
						} else {

							swal({
								title: 'Apakah anda yakin menambahkan barang ini?',
								type: 'warning',
								showCancelButton: true,
								confirmButtonText: 'Ya, Tambahkan!'
							}).then(function(result) {
								if (result.value) {

									$("#formstock").trigger("submit");

								}
							});

						}

					});

					$(document).on('click','.btnhapus',function() {
						var kode = $(this).data('id');
						if(!confirm('Hapus Data (Kode: ' + kode + ')')) return false;
						$.ajax({
							url:"<?= base_url() ?>gudang/stock/master/hapus",
							type:"post",
							data:{
								kode:kode
							},
							dataType:'json'
						}).done(function(res) {
							console.log(res);
							swal({
								title:res.title,
								message:res.message,
								type:res.status,
								confirmButtonText: 'Ok'
								}).then(function(result) {
									if (result.value) {
										document.location = '<?= base_url() ?>admin/gudang/stock/master';
									}
								});
						}).fail(function(res) {
							console.log(res);
						});
					});

				</script>
			</body>
			</html>