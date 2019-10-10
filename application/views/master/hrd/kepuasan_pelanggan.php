<div class="m-grid__item m-grid__item--fluid m-wrapper">
					<!-- BEGIN: Subheader -->
					<div class="m-subheader ">
						<div class="d-flex align-items-center">
							<div class="mr-auto">
								<h3 class="m-subheader__title m-subheader__title--separator">
									Kepuasan Pelanggan
								</h3>
								<ul class="m-subheader__breadcrumbs m-nav m-nav--inline">
									<li class="m-nav__item m-nav__item--home">
										<a href="<?= site_url() ?>admin/dashboard" class="m-nav__link m-nav__link--icon">
											<i class="m-nav__link-icon la la-home"></i>
										</a>
									</li>
								</ul>
							</div>
						</div>
					</div>
					<!-- END: Subheader -->
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
														<div class="col-md-6">
															<div class="m-portlet__head-title">
																<h3 class="m-portlet__head-text">
																	Kepuasan Pelanggan
																</h3>
															</div>
														</div>
														<div class="col-md-4 offset-md-2">
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

										<!--begin: terbit table -->
												<table class="table table-striped- table-bordered table-hover" id="tbl_spk_pemasangan">
													<thead>
														<tr>
															<th>No</th>
															<th>Tanggal</th>
															<th>No SPK</th>
															<th>Tipe SPK</th>
															<th>Pelanggan</th>
															<th>Teknisi</th>
															<th>Status</th>
															<th>Kepuasan Customer</th>
														</tr>
													</thead>
													<tbody>
<?php
$status = ['Aktif', 'Progress', 'Selesai', 'Batal'];
$i = 1;
foreach ($data['data'] as $row) {
	$teknisi = [];
	$id_teknisi = explode(',', $row->id_teknisi);
	for ($j = 0; $j < sizeof($id_teknisi); $j++) {
		array_push($teknisi, $this->crud->gda('users', ['id' => $id_teknisi[$j]])['name']);
	}

	if ($row->kepuasan == 0) {
		$kepuasan = 'Tidak Puas <i class="fa fa-frown-o"></i>';
	} elseif ($row->kepuasan == 1) {
		$kepuasan = 'Biasa Saja <i class="fa fa-meh-o"></i>';
	} else {
		$kepuasan = 'Puas <i class="fa fa-smile-o"></i>';
	}
?>
														<tr>
															<td><?=$i?></td>
															<td><?=tgl_indo($row->tanggal)?></td>
															<td><?=$row->no_spk?></td>
															<td><?=$row->tipe_spk?></td>
															<td><?=$row->nama?></td>
															<td><?=($row->id_teknisi ? implode(', ', $teknisi) : '-')?></td>
															<td><?=$status[$row->status]?></td>
															<td><?=($row->status == 2 ? $kepuasan : 'Belum Ada Data')?></td>
														</tr>
<?php $i++; } ?>
													</tbody>
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
