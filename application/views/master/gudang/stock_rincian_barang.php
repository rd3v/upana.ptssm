<div class="m-grid__item m-grid__item--fluid m-wrapper">
					<!-- BEGIN: Subheader -->
					<div class="m-subheader ">
						<div class="d-flex align-items-center">
							<div class="mr-auto">
								<h3 class="m-subheader__title m-subheader__title--separator">
									Stock
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
										<a href="stock.html" class="m-nav__link">
											<span class="m-nav__link-text">
												Stock
											</span>
										</a>
									</li>
									<li class="m-nav__separator">
										-
									</li>
									<li class="m-nav__item">
										<a href="<?= site_url() ?>admin/gudang/stock/rincian/<?= $data->id ?>" class="m-nav__link">
											<span class="m-nav__link-text">
												Rincian
											</span>
										</a>
									</li>
									<li class="m-nav__separator">
										-
									</li>
									<li class="m-nav__item">
										<a href="<?= site_url() ?>admin/gudang/stock/rincian_barang/<?= $data->id ?>" class="m-nav__link">
											<span class="m-nav__link-text">
												Barang
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
											<div class="m-portlet__head-title col-xl-12">
												<div style="margin-top: 20px" class=" row">
													<div class="col-sm">
														<h3 class="m-portlet__head-text">
															Rincian Kartu Stock Barang
														</h3>
													</div>
													
												</div>
											</div>
										</div>
									</div>
									<div class="m-portlet__body">
										<div class="form-group m-form__group row">
											<label  class="col-2 col-form-label">
												Jenis Barang
											</label>
											<div class="col-md-5">
												<input disabled="" class="form-control m-input" type="text" value="<?= $data->result->nama ?>" id="jenis_barang">
											</div>
											<div class="offset-md-1 col-md-4">
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

										<table class="table" id="tbl_rincian_stock">
											<thead>
												<tr>
													<th>No Seri</th>
													<th>Tanggal Masuk</th>
													<th>Tanggal Keluar</th>
												</tr>
											</thead>
											<tbody>
												<?php 

													foreach ($data->list_barang as $value) { ?>

													<tr>
														<td><?= $value->serial ?></td>
														<td><?= date("d/m/Y",strtotime($value->tanggal_masuk)) ?></td>
														<td><?= date("d/m/Y",strtotime($value->tanggal_keluar)) ?></td>
													</tr>

												<?php }

												 ?>
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