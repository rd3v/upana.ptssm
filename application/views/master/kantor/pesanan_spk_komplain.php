<div class="m-grid__item m-grid__item--fluid m-wrapper">
					<!-- BEGIN: Subheader -->
					<div class="m-subheader ">
						<div class="d-flex align-items-center">
							<div class="mr-auto">
								<h3 class="m-subheader__title m-subheader__title--separator">
									SPK Komplain
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
										<a href="<?= base_url() ?>kantor/order/spk-komplain" class="m-nav__link">
											<span class="m-nav__link-text">
												SPK Komplain
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
										<ul class="nav nav-pills" role="tablist">
											<li class="nav-item">
												<a class="nav-link active" data-toggle="tab" href="#m_tabs_buat_spk_komplain">
													Buat SPK Komplain
												</a>
											</li>
											<li class="nav-item">
												<a class="nav-link" data-toggle="tab" href="#m_tabs_list_spk_komplain">
													SPK Komplain Terbit
												</a>
											</li>
										</ul>
										<div class="tab-content">
											<div class="tab-pane active" id="m_tabs_buat_spk_komplain" role="tabpanel">
												<div class="m-form m-form--label-align-right m--margin-top-20 m--margin-bottom-30">
													<div class="row align-items-center">
														<div class="col-md-12">
															<div class="form-group m-form__group row align-items-center">
																<div class="col-md-4">
																	<div class="m-portlet__head-title">
																		<h3 class="m-portlet__head-text">
																			Buat SPK Komplain 
																		</h3>
																	</div>
																</div>
															</div>
														</div>
													</div>
													<div class="form-group m-form__group row">
														<label  class="col-2 col-form-label">
															No. SPK
														</label>
														<div class="col-10">
															<select style="width: 100%" class="form-control m-select2 dropdown_search" name="nama_pelanggan">
																<option value="0">
																	--Pilih No SPK--
																</option>
																<option value="1">
																	0037/SSM/SPK-PSG/MKS/III/2019
																</option>
																<option value="2">
																	0038/SSM/SPK-PSG/MKS/III/2019
																</option>
																<option value="3">
																	0040/SSM/SPK-PSG/MKS/III/2019
																</option>
																<option value="4">
																	0041/SSM/SPK-PSG/MKS/III/2019
																</option>
															</select>
														</div>
													</div>
													<div class="form-group m-form__group row">
														<label class="col-2 col-form-label">
															Nama Pelanggan
														</label>
														<div class="col-10">
															<input disabled="" class="form-control m-input" type="text" value="Ibu Ani" id="nama_pelanggan">
														</div>
													</div>
													<div class="form-group m-form__group row">
														<label class="col-2 col-form-label">
															Telpon
														</label>
														<div  class="col-10">
															<input disabled="" class="form-control m-input" type="text" value="085145322xxx" id="telpon_pelanggan">
														</div>
													</div>
													<div class="form-group m-form__group row">
														<label class="col-2 col-form-label">
															Alamat
														</label>
														<div class="col-10">
															<input disabled="" class="form-control m-input" type="text" value="Jl. Angkasa 5, Panaikang, Makassar" id="alamat_pelanggan">
														</div>
													</div>
													<div class="form-group m-form__group row">
														<label class="col-2 col-form-label">
															Keterangan Komplain
														</label>
														<div class="col-10">
															<textarea  style="resize: none;font-size: 1.2rem" class="form-control m-input" name="keterangan_komplain"rows="3">Pipa Bocor dan Remote Ac tidak berfungsi</textarea>
														</div>
													</div>
													<div  class="form-group m-form__group row">
														<label  class="col-2 col-form-label">
															Catatan
														</label>
														<div class="col-10">
															<textarea style="resize: none" class="form-control m-input " id="catatan" rows="3">lorem ipsum dolor sit amet</textarea>
														</div>
													</div>
													<div style="margin-top: 20px" align="center">
														<button id="btn_terbitkan_spk" type="button" class="btn btn-primary btn_pemasangan">Terbitkan SPK</button>
													</div>
												</div>
											</div>
											<div class="tab-pane " id="m_tabs_list_spk_komplain" role="tabpanel">
												<div class="m-form m-form--label-align-right m--margin-top-20 m--margin-bottom-30">
													<div class="row align-items-center">
														<div class="col-md-12">
															<div class="form-group m-form__group row align-items-center">
																<div class="col-md-4">
																	<div class="m-portlet__head-title">
																		<h3 class="m-portlet__head-text">
																			List SPK Komplain
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
												<table class="table" id="tbl_list_komplain">
													<thead>
														<tr>
															<th>No</th>
															<th>Tanggal</th>
															<th>No SPK</th>
															<th>Nama Pelanggan</th>
															<th>No Telpon</th>
															<th>Aksi</th>
														</tr>
													</thead>
													<tbody>
														<tr>
															<td>1</td>
															<td>20/19/2018</td>
															<td>1923102301</td>
															<td>Bpk. Hendy</td>
															<td>085145322137</td>
															<td>
																<a href="rincian_spk_komplain.html" class="btn btn-sm btn-primary" style="color:white; width:80px;">Rincian</a>
															</td>
														</tr>
														<tr>
															<td>2</td>
															<td>20/19/2018</td>
															<td>1923102301</td>
															<td>Bpk. Suminto</td>
															<td>085145322137</td>
															<td>
																<a href="rincian_spk_komplain.html" class="btn btn-sm btn-primary" style="color:white; width:80px;">Rincian</a>
															</td>
														</tr>
														<tr>
															<td>3</td>
															<td>20/19/2018</td>
															<td>1923102301</td>
															<td>Bpk. Suminto</td>
															<td>085145322137</td>
															<td>
																<a href="rincian_spk_komplain.html" class="btn btn-sm btn-primary" style="color:white; width:80px;">Rincian</a>
															</td>
														</tr>
														<tr>
															<td>4</td>
															<td>20/19/2018</td>
															<td>1923102301</td>
															<td>Ibu Ida</td>
															<td>085145322137</td>
															<td>
																<a href="rincian_spk_komplain.html" class="btn btn-sm btn-primary" style="color:white; width:80px;">Rincian</a>
															</td>
														</tr>
														<tr>
															<td>5</td>
															<td>20/19/2018</td>
															<td>1923102301</td>
															<td>Ibu Sry</td>
															<td>085145322137</td>
															<td>
																<a href="rincian_spk_komplain.html" class="btn btn-sm btn-primary" style="color:white; width:80px;">Rincian</a>
															</td>
														</tr>
													</tbody>
												</table>
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