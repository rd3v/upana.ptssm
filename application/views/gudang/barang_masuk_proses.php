				<div class="m-grid__item m-grid__item--fluid m-wrapper">
					<!-- BEGIN: Subheader -->
					<div class="m-subheader ">
						<div class="d-flex align-items-center">
							<div class="mr-auto">
								<h3 class="m-subheader__title m-subheader__title--separator">
									Proses Barang Masuk
								</h3>
								<ul class="m-subheader__breadcrumbs m-nav m-nav--inline">
									<li class="m-nav__item m-nav__item--home">
										<a href="<?= base_url() ?>gudang" class="m-nav__link m-nav__link--icon">
											<i class="m-nav__link-icon la la-home"></i>
										</a>
									</li>
									<li class="m-nav__separator">
										-
									</li>
									<li class="m-nav__item">
										<a href="<?= base_url() ?>gudang/barang/masuk" class="m-nav__link">
											<span class="m-nav__link-text">
												Barang Masuk
											</span>
										</a>
									</li>
									<li class="m-nav__separator">
										-
									</li>
									<li class="m-nav__item">
										<a href="<?= base_url() ?>gudang/barang/proses/" class="m-nav__link">
											<span class="m-nav__link-text">
												Proses
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
												<h3 class="m-portlet__head-text">
													List Item
												</h3>
											</div>
										</div>
									</div>
									<div class="m-portlet__body">
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
											<table class="table " id="tbl_proses_barang_masuk">
												<thead>
													<tr>
														<th>No</th>
														<th>Kode Barang</th>
														<th>Nama Barang</th>
														<th>Serial Number</th>
													</tr>
												</thead>
												<tbody>
													<?php 
													$no = 1;
													for ($i=0; $i < $data['jumlah_barang']->jumlah; $i++) { ?> 
															<tr>
																<td><?= $no; ?></td>
																<td><?= $data['jumlah_barang']->kode ?></td>
																<td><?= $data['jumlah_barang']->nama ?></td>
																<td >
																  	<input class="inputs" required type="text" name="serial<?= $no; ?>" class="form-control m-input" placeholder="">	
																</td>
															</tr>
													<?php 
													$no++;
														}
													 ?>
												</tbody>
												
											</table>
											<div align="center">
												<button type="submit" id="btn_simpan" class="btn btn-success">Simpan</button>	
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<script>
				var kode = '<?= $data['jumlah_barang']->kode ?>';
				var no = '<?= $no; ?>';
			</script>
			<!-- end:: Body -->