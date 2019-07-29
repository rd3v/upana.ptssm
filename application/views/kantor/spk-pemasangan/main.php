<div class="m-grid__item m-grid__item--fluid m-wrapper">
					<!-- BEGIN: Subheader -->
					<div class="m-subheader ">
						<div class="d-flex align-items-center">
							<div class="mr-auto">
								<h3 class="m-subheader__title m-subheader__title--separator">
									SPK Pemasangan
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
										<a href="#" class="m-nav__link">
											<span class="m-nav__link-text">
												Manajemen Pesanan
											</span>
										</a>
									</li>
									<li class="m-nav__separator">
										-
									</li>
									<li class="m-nav__item">
										<a href="<?= base_url() ?>kantor/spk-pemasangan" class="m-nav__link">
											<span class="m-nav__link-text">
												SPK Pemasangan
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
																	List SPK Pemasangan
																</h3>
																<button onclick="window.location.href = '<?= site_url() ?>kantor/spk-pemasangan/tambah?id=<?=$new_id['id']?>';" type="button" class="btn btn-success btn_tambah_spk"> + Tambah SPK</button>
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
										<table class="table" id="datatable">
											<thead>
												<tr>
													<th>No</th>
													<th>Terbit</th>
													<th>No SPK</th>
													<th>Nama Pelanggan</th>
													<th>No Telpon</th>
													<th>Status</th>
													<th>Aksi</th>
												</tr>
											</thead>
											<tbody></tbody>
										</table>
										<!--end: Datatable -->
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- end:: Body -->

			<script>
				var datatable = $('#datatable').mDatatable({
					data: {
						saveState: {cookie: false},
						type: 'remote',
				        source: {
				          read: {
				            method: 'POST',
				            url: '<?=site_url()?>kantor/spk-pemasangan/getdata',
				            map: function(raw) {
				              // sample data mapping
				              var dataSet = raw;
				              if (typeof raw.data !== 'undefined') {
				                dataSet = raw.data;
				              }
				              return dataSet;
				            },
				          },
				        },
				        pageSize: 10,
				        serverPaging: true,
				        serverFiltering: true,
				        serverSorting: true,
				    },
					// layout definition
					layout: {
						theme: 'default', // datatable theme
						class: '', // custom wrapper class
						scroll: true, // enable/disable datatable scroll both horizontal and vertical when needed.
						// height: 450, // datatable's body's fixed height
						footer: false // display/hide footer
					},

					// column sorting
					sortable: false,
					search: {
						input: $('#generalSearch'),
					},
					columns: [

					{
						field: 'no',
						textAlign: 'center',
						template: function(data, type, row, meta) {
							return data.getIndex() + 1;
						}
					},
					{
						field: 'tanggal',
						textAlign: 'center',
						type:'date',
						template: function(data, type, row, meta) {
							var tanggal = data.tanggal.split("-");
							return tanggal[2] + "-" + tanggal[1] + "-" + tanggal[0];
						}
					},
					{
						field: 'no_spk',
						textAlign: 'center',

					},
					{
						field: 'nama',
						textAlign: 'center',
					},
					{
						field: 'telepon',
						textAlign: 'center',
					},
					{
						field: 'status',
						textAlign: 'center',
					},
					{
						field: 'aksi',
						textAlign: 'center',
						template: function(data) {
							var btnedit = "<a href='<?= site_url() ?>kantor/spk-pemasangan/edit/"+data.id+"' class='btn btn-sm btn-info' style='color:white; width:70px;'>Edit</a>";
							var btnrincian = "<a href='<?= site_url() ?>kantor/spk-pemasangan/rincian/"+data.id+"' class='btn btn-sm btn-primary' style='color:white; width:70px;'>Rincian</a>";
							return btnrincian + " " + btnedit;
						}
					}

					],
				});
			</script>
