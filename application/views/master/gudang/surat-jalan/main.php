<div class="m-grid__item m-grid__item--fluid m-wrapper">
					<!-- BEGIN: Subheader -->
					<div class="m-subheader ">
						<div class="d-flex align-items-center">
							<div class="mr-auto">
								<h3 class="m-subheader__title m-subheader__title--separator">
									Surat Jalan
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
										<a href="<?= base_url() ?>master/gudang/surat-jalan" class="m-nav__link">
											<span class="m-nav__link-text">
												Surat Jalan
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
																	List Surat Jalan
																</h3>

																<button onclick="window.location.href = '<?=site_url('master/gudang/surat-jalan/tambah?id='.$data['new_id']['id'])?>';" type="button" class="btn btn-success btn_tambah_spk"> + Tambah Surat Jalan (Tanpa SPK)</button>

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
										<ul class="nav nav-tabs" role="tablist">
											<li class="nav-item">
												<a class="nav-link active" data-toggle="tab" href="#m_tabs_1_1" data-target="#m_tabs_1_1">Antrian</a>
											</li>

											<li class="nav-item">
												<a class="nav-link" data-toggle="tab" href="#m_tabs_1_2" data-target="#m_tabs_1_2">Terbit </a>
											</li>
											<li class="nav-item">
												<a class="nav-link " data-toggle="tab" href="#m_tabs_1_3" data-target="#m_tabs_1_3">Batal</a>
											</li>
										</ul>
										<div class="tab-content">
											<div class="tab-pane active" id="m_tabs_1_1" role="tabpanel">
												<!-- <div class="m_datatable" id="local_data"></div> -->
												<table class="table " id="tbl_antrian"></table>
												<!--end: Datatable -->

											</div>

											<div class="tab-pane" id="m_tabs_1_2" role="tabpanel">

												<!-- <div class="m_datatable" id="local_data"></div> -->
												<table class="table " id="tbl_telah_terbit"></table>
												<!--end: Datatable -->

											</div>
											<div class="tab-pane" id="m_tabs_1_3" role="tabpanel">
												<!-- <div class="m_datatable" id="local_data"></div> -->
												<table class="table " id="tbl_batal"></table>
												<!--end: Datatable -->
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

			<script>
				var tbl_antrian = $('#tbl_antrian').mDatatable({
					data: {
						saveState: {cookie: false},
						type: 'remote',
				        source: {
				          read: {
				            method: 'POST',
				            url: '<?=site_url('gudang/surat-jalan/lists/0')?>'
				          },
				        },
				        pageSize: 10,
				        serverPaging: true,
				        serverFiltering: true,
				        serverSorting: true,
				    },
					sortable: false,
					search: {
						input: $('#generalSearch'),
					},
					columns: [
						{
							field: '#',
							title: 'No.',
							textAlign: 'center',
							template: function(data, type, row, meta) {
	                            return ((row.getCurrentPage() - 1) * row.getPageSize()) + data.getIndex() + 1;
							}
						}, {
							field: 'tanggal',
							title: 'Tanggal',
							textAlign: 'center',
							template: function(data) {
								return tgl_indo(data.tanggal);
							}
						}, {
							field: 'no_spk',
							title: 'No. SPK',
							textAlign: 'center',

						}, {
							field: 'tipe_pajak',
							title: 'Gudang',
							textAlign: 'center',
							template: function(data) {
								return (data.tipe_pajak == '1' ? 'Toko (Pajak)' : 'Kantor (Non-Pajak)');
							}
						}, {
							field: 'nama',
							title: 'Nama Pelanggan',
							textAlign: 'center',
						}, {
							field: 'aksi',
							title: 'Aksi',
							textAlign: 'center',
							template: function(data) {
								return '<a href="<?=site_url('admin/gudang/surat-jalan/proses/')?>'+data.id+'" class="btn btn-sm btn-info" style="color:white; width:80px;">Proses >> </a>';
							}
						}
					]
				});

				var tbl_telah_terbit = $('#tbl_telah_terbit').mDatatable({
					data: {
						saveState: {cookie: false},
						type: 'remote',
				        source: {
				          read: {
				            method: 'POST',
				            url: '<?=site_url('gudang/surat-jalan/lists/1')?>'
				          },
				        },
				        pageSize: 10,
				        serverPaging: true,
				        serverFiltering: true,
				        serverSorting: true,
				    },
					sortable: false,
					search: {
						input: $('#generalSearch'),
					},
					columns: [
						{
							field: '#',
							title: 'No.',
							textAlign: 'center',
							template: function(data, type, row, meta) {
	                            return ((row.getCurrentPage() - 1) * row.getPageSize()) + data.getIndex() + 1;
							}
						}, {
							field: 'tanggal',
							title: 'Tanggal',
							textAlign: 'center',
							template: function(data) {
								return tgl_indo(data.tanggal);
							}
						}, {
							field: 'no_surat',
							title: 'No. Surat',
							textAlign: 'center',
						}, {
							field: 'no_spk',
							title: 'No. SPK',
							textAlign: 'center',
						}, {
							field: 'tipe_pajak',
							title: 'Gudang',
							textAlign: 'center',
							template: function(data) {
								return (data.tipe_pajak == '1' ? 'Toko (Pajak)' : 'Kantor (Non-Pajak)');
							}
						}, {
							field: 'nama',
							title: 'Nama Pelanggan',
							textAlign: 'center',
						}, {
							field: 'aksi',
							title: 'Aksi',
							textAlign: 'center',
							width: 180,
							template: function(data) {
								return '<a href="<?=site_url('master/gudang/surat-jalan/edit/')?>'+data.id_surat_jalan+'" class="btn btn-sm btn-primary" style="color:white;">Edit</a> '+
									'<a href="<?=site_url('master/gudang/surat-jalan/rincian/')?>'+data.id_surat_jalan+'" class="btn btn-sm btn-primary" style="color:white;">Rincian</a>';
							}
						}
					]
				});

				var tbl_batal = $('#tbl_batal').mDatatable({
					data: {
						saveState: {cookie: false},
						type: 'remote',
				        source: {
				          read: {
				            method: 'POST',
				            url: '<?=site_url('master/gudang/surat-jalan/lists/2')?>'
				          },
				        },
				        pageSize: 10,
				        serverPaging: true,
				        serverFiltering: true,
				        serverSorting: true,
				    },
					sortable: false,
					search: {
						input: $('#generalSearch'),
					},
					columns: [
						{
							field: '#',
							title: 'No.',
							textAlign: 'center',
							template: function(data, type, row, meta) {
	                            return ((row.getCurrentPage() - 1) * row.getPageSize()) + data.getIndex() + 1;
							}
						}, {
							field: 'tanggal',
							title: 'Tanggal',
							textAlign: 'center',
							template: function(data) {
								return tgl_indo(data.tanggal);
							}
						}, {
							field: 'no_surat',
							title: 'No. Surat',
							textAlign: 'center',
						}, {
							field: 'no_spk',
							title: 'No. SPK',
							textAlign: 'center',
						}, {
							field: 'tipe_pajak',
							title: 'Gudang',
							textAlign: 'center',
							template: function(data) {
								return (data.tipe_pajak == '1' ? 'Toko (Pajak)' : 'Kantor (Non-Pajak)');
							}
						}, {
							field: 'nama',
							title: 'Nama Pelanggan',
							textAlign: 'center',
						}, {
							field: 'aksi',
							title: 'Aksi',
							textAlign: 'center',
							width: 180,
							template: function(data) {
								return '<a href="<?=site_url('master/gudang/surat-jalan/edit/')?>'+data.id_surat_jalan+'" class="btn btn-sm btn-primary" style="color:white;">Edit</a> '+
									'<a href="<?=site_url('master/gudang/surat-jalan/rincian/')?>'+data.id_surat_jalan+'" class="btn btn-sm btn-primary" style="color:white;">Rincian</a>';
							}
						}
					]
				});
			</script>
