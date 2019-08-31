<div class="m-grid__item m-grid__item--fluid m-wrapper">
					<!-- BEGIN: Subheader -->
					<div class="m-subheader ">
						<div class="d-flex align-items-center">
							<div class="mr-auto">
								<h3 class="m-subheader__title m-subheader__title--separator">
									Pengeluaran Material
								</h3>
								<ul class="m-subheader__breadcrumbs m-nav m-nav--inline">
									<li class="m-nav__item m-nav__item--home">
										<a href="<?= site_url('gudang') ?>" class="m-nav__link m-nav__link--icon">
											<i class="m-nav__link-icon la la-home"></i>
										</a>
									</li>
									<li class="m-nav__separator">
										-
									</li>
									<li class="m-nav__item">
										<a href="<?= site_url('gudang/pengeluaran-material') ?>" class="m-nav__link">
											<span class="m-nav__link-text">
												Pengeluaran Material
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
													List Pengeluaran Material
												</h3>
											</div>
										</div>
									</div>
									<div class="m-portlet__body">
										<ul class="nav nav-pills" role="tablist">
											<li class="nav-item">
												<a class="nav-link active" data-toggle="tab" href="#tab_antrian">
													Antrian
												</a>
											</li>
											<li class="nav-item">
												<a class="nav-link" data-toggle="tab" href="#tab_telah_terbit">
													Telah Terbit
												</a>
											</li>
											<li class="nav-item">
												<a class="nav-link" data-toggle="tab" href="#tab_batal">
													Batal
												</a>
											</li>
										</ul>

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
										<div class="tab-content">
											<div class="tab-pane active" id="tab_antrian" role="tabpanel">
												<table class="table responsive" id="tbl_antrian"></table>
											</div>
											<div class="tab-pane" id="tab_telah_terbit" role="tabpanel">
												<table class="table" id="tbl_telah_terbit"></table>
											</div>
											<div class="tab-pane" id="tab_batal" role="tabpanel">
												<table class="table" id="tbl_batal"></table>
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

			<script>
				var tbl_antrian = $('#tbl_antrian').mDatatable({
					data: {
						saveState: {cookie: false},
						type: 'remote',
				        source: {
				          read: {
				            method: 'POST',
				            url: '<?=site_url('gudang/pengeluaran-material/lists/0')?>'
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
							field: 'nama',
							title: 'Nama Pelanggan',
							textAlign: 'center',
						}, {
							field: 'tipe_pajak',
							title: 'Gudang',
							textAlign: 'center',
							template: function(data) {
								return (data.tipe_pajak == '1' ? 'Toko (Pajak)' : 'Kantor (Non-Pajak)');
							}
						}, {
							field: 'tipe_spk',
							title: 'Tipe SPK',
							textAlign: 'center',
						}, {
							field: 'aksi',
							title: 'Aksi',
							textAlign: 'center',
							template: function(data) {
								return '<a href="<?=site_url('gudang/pengeluaran-material/proses/')?>'+data.tipe_spk.toLowerCase()+'/'+data.id+'" class="btn btn-sm btn-primary btn_material" style="color:white;">Set Material >></a>';
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
				            url: '<?=site_url('gudang/pengeluaran-material/lists/1')?>'
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
							field: 'nama',
							title: 'Nama Pelanggan',
							textAlign: 'center',
						}, {
							field: 'tipe_pajak',
							title: 'Gudang',
							textAlign: 'center',
							template: function(data) {
								return (data.tipe_pajak == '1' ? 'Toko (Pajak)' : 'Kantor (Non-Pajak)');
							}
						}, {
							field: 'tipe_spk',
							title: 'Tipe SPK',
							textAlign: 'center',
						}, {
							field: 'aksi',
							title: 'Aksi',
							textAlign: 'center',
							width: 180,
							template: function(data) {
								return '<a href="<?=site_url('gudang/pengeluaran-material/edit/')?>'+data.id_pengeluaran_material+'" class="btn btn-sm btn-primary btn_material" style="color:white; width:80px;">Edit </a> '+
									'<a href="<?=site_url('gudang/pengeluaran-material/rincian/')?>'+data.id_pengeluaran_material+'" class="btn btn-sm btn-primary btn_material" style="color:white; width:80px;">Rincian</a>';
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
				            url: '<?=site_url('gudang/pengeluaran-material/lists/2')?>'
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
							field: 'nama',
							title: 'Nama Pelanggan',
							textAlign: 'center',
						}, {
							field: 'tipe_pajak',
							title: 'Gudang',
							textAlign: 'center',
							template: function(data) {
								return (data.tipe_pajak == '1' ? 'Toko (Pajak)' : 'Kantor (Non-Pajak)');
							}
						}, {
							field: 'tipe_spk',
							title: 'Tipe SPK',
							textAlign: 'center',
						}, {
							field: 'aksi',
							title: 'Aksi',
							textAlign: 'center',
							width: 180,
							template: function(data) {
								return '<a href="<?=site_url('gudang/pengeluaran-material/edit/')?>'+data.id_pengeluaran_material+'" class="btn btn-sm btn-primary btn_material" style="color:white; width:80px;">Edit </a> '+
									'<a href="<?=site_url('gudang/pengeluaran-material/rincian/')?>'+data.id_pengeluaran_material+'" class="btn btn-sm btn-primary btn_material" style="color:white; width:80px;">Rincian</a>';
							}
						}
					]
				});
			</script>
