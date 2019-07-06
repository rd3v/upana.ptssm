<div class="m-grid__item m-grid__item--fluid m-wrapper">
					<!-- BEGIN: Subheader -->
					<div class="m-subheader ">
						<div class="d-flex align-items-center">
							<div class="mr-auto">
								<h3 class="m-subheader__title m-subheader__title--separator">
									Riwayat Pelanggan
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
										<a href="<?= base_url() ?>kantor/customer/rincian/<?= $data['id'] ?>" class="m-nav__link">
											<span class="m-nav__link-text">
												Rincian
											</span>
										</a>
									</li>
									<li class="m-nav__separator">
										-
									</li>
									<li class="m-nav__item">
										<a href="<?= base_url() ?>kantor/customer/riwayat/<?= $data['id'] ?>" class="m-nav__link">
											<span class="m-nav__link-text">
												Riwayat
											</span>
										</a>
									</li>
								</ul>
							</div>
						</div>
					</div>
					<!-- END: Subheader -->
					<div class="m-content">
						<div class="col-xl-12">
							<div class="m-portlet m-portlet--mobile">
								<div class="m-portlet__body">
									<!--begin: Search Form -->
									<div class="m-form m-form--label-align-right m--margin-top-20 m--margin-bottom-30">
										<div class="row align-items-center">
											<div class="col-md-12">
												<div class="form-group m-form__group row align-items-center">
													<div class="col-md-4">
														<div class="info row">
															<div class="col-sm-12">
																<p id="id_pelanggan">
																	<i class="">ID :</i> <?= $data['user']->id ?>
																</p>
																<p id="nama_pelanggan">
																	<i class="flaticon-users"> </i> <?= $data['user']->nama ?>
																</p>
																<p id="no_telpon">
																	<i class="fa fa-phone"> </i> <?= $data['user']->telepon ?>
																</p>
															</div>

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
									<table class="table" id="tbl_spk_pemasangan">
										<thead>
											<tr>
												<th>No</th>
												<th>Mulai</th>
												<th>Selesai</th>
												<th>No SPK</th>
												<th>Jenis SPK</th>
												<th>Kepuasan </th>
												<th>Status</th>
												<th>Aksi</th>
											</tr>
										</thead>
										<tbody>
<?php
$i = 1;
$status = ['Aktif', 'Progress', 'Selesai', 'Batal'];
foreach ($data['riwayat'] as $row) { ?>
											<tr>
												<td><?=$i?></td>
												<td><?=tgl_indo($row['mulai'])?></td>
												<td><?=tgl_indo($row['selesai'])?></td>
												<td><?=$row['nomor_spk']?></td>
												<td><?=$row['jenis_spk']?></td>
												<td><?=$row['kepuasan']?></td>
												<td><?=$status[$row['status']]?></td>
												<td>
													<a href="<?=site_url('kantor/order/spk-service/rincian/'.$row['nomor_spk'])?>" class="btn btn-sm btn-primary" style="color:white; width:80px;">Rincian</a>
												</td>
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
			<!-- end:: Body -->
