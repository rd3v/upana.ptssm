<div class="m-grid__item m-grid__item--fluid m-wrapper">
					<!-- BEGIN: Subheader -->
					<div class="m-subheader ">
						<div class="d-flex align-items-center">
							<div class="mr-auto">
								<h3 class="m-subheader__title m-subheader__title--separator">
									Dashboard
								</h3>
								<ul class="m-subheader__breadcrumbs m-nav m-nav--inline">
									<li class="m-nav__item m-nav__item--home">
										<a href="<?= base_url() ?>" class="m-nav__link m-nav__link--icon">
											<i class="m-nav__link-icon la la-home"></i>
										</a>
									</li>
								</ul>
							</div>
						</div>
					</div>
					<!-- END: Subheader -->
					<div class="m-content">
						<div class="row">
							<div class="col-xl-6">
								<div class="m-portlet m--bg-accent-kuning m-portlet--bordered-semi m-portlet--skin-dark m-portlet--full-height ">
									<div class="m-portlet__head">
										<div class="m-portlet__head-caption">
											<div class="m-portlet__head-title">
												<h3 style="font-size: 2rem" class="m-portlet__head-text">
													Total Surat Jalan
												</h3>
											</div>
										</div>
									</div>
									<div class="m-portlet__body">
										<div align="left" style="display:inline-block" class="col-8">
											<span>
												<i style="font-size: 4.4rem; color: rgba(0,0,0,.2);" class="fa fa-file-text-o"></i>
											</span>
										</div>
										<!--begin::Widget 7-->
										<div style="display:inline-block" align="right"  class=" m-widget7 m-widget7--skin-dark">
											<span  id="total_surat_jalan" class="item-font">92</span> Surat
										</div>
									</div>
								</div>
							</div>
							<div class="col-xl-6">
								<div class="m-portlet m--bg-accent-biru m-portlet--bordered-semi m-portlet--skin-dark m-portlet--full-height ">
									<div class="m-portlet__head">
										<div class="m-portlet__head-caption">
											<div class="m-portlet__head-title">
												<h3 style="font-size: 1.4rem" class="m-portlet__head-text">
													Total Bukti Pengeluaran Material
												</h3>
											</div>
										</div>
									</div>
									<div class="m-portlet__body">
										<div align="left" style="display:inline-block" class="col-8">
											<span>
												<i style="font-size: 4.4rem; color: rgba(0,0,0,.2);" class="fa fa-file-text-o"></i>
											</span>
										</div>
										<div style="display:inline-block" align="right"  class=" m-widget7 m-widget7--skin-dark">
											<span  id="total_bukti_pengeluaran_material" class="item-font">70</span> Surat
										</div>
									</div>
								</div>
							</div>
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
																	List Item Masuk
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
										<table  class="table" id="tbl_list_item_masuk">
											 <thead >
												<tr>
													<th>No</th>
													<th>Tanggal</th>
													<th>Kode</th>
													<th>No Seri</th>
													<th>Nama Barang</th>
													<th>Tipe</th>
													<th>Merek</th>
													<th>Kategori </th>
													<th>Satuan</th>
													<th>Keterangan</th>
												</tr>
											</thead>
											<tbody>
												<tr>
													<td>1</td>
													<td>20/19/2018</td>
													<td>#14253617</td>
													<td>1105791</td>
													<td>Thermistor RKD25GVM</td>
													<td>Thermistor</td>
													<td>Daikin</td>
													<td>Unit</td>
													<td>unit</td>
													<td>-</td>
												</tr>
												<tr>
													<td>2</td>
													<td>20/19/2018</td>
													<td>#14253617</td>
													<td>1105791</td>
													<td>Thermistor RKD25GVM</td>
													<td>Thermistor</td>
													<td>Daikin</td>
													<td>Unit</td>
													<td>unit</td>
													<td>-</td>
												</tr>
												<tr>
													<td>3</td>
													<td>20/19/2018</td>
													<td>#14253617</td>
													<td>1105791</td>
													<td>Thermistor RKD25GVM</td>
													<td>Thermistor</td>
													<td>Daikin</td>
													<td>Material</td>
													<td>unit</td>
													<td>-</td>
												</tr>
												<tr>
													<td>4</td>
													<td>20/19/2018</td>
													<td>#14253617</td>
													<td>1105791</td>
													<td>Thermistor RKD25GVM</td>
													<td>Thermistor</td>
													<td>Daikin</td>
													<td>Material</td>
													<td>unit</td>
													<td>-</td>
												</tr>
												<tr>
													<td>5</td>
													<td>20/19/2018</td>
													<td>#14253617</td>
													<td>1105791</td>
													<td>Thermistor RKD25GVM</td>
													<td>Thermistor</td>
													<td>Daikin</td>
													<td>Unit</td>
													<td>unit</td>
													<td>-</td>
												</tr>
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