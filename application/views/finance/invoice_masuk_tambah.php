<div class="m-grid__item m-grid__item--fluid m-wrapper">
					<!-- BEGIN: Subheader -->
					<div class="m-subheader ">
						<div class="d-flex align-items-center">
							<div class="mr-auto">
								<h3 class="m-subheader__title m-subheader__title--separator">
									Invoice Masuk
								</h3>
								<ul class="m-subheader__breadcrumbs m-nav m-nav--inline">
									<li class="m-nav__item m-nav__item--home">
										<a href="<?= base_url() ?>finance/invoice/masuk" class="m-nav__link m-nav__link--icon">
											<i class="m-nav__link-icon la la-home"></i>
										</a>
									</li>
									<li class="m-nav__separator">
										-
									</li>
									<li class="m-nav__item">
										<a href="<?= base_url() ?>finance/invoice/masuk" class="m-nav__link">
											<span class="m-nav__link-text">
												Invoice Masuk
											</span>
										</a>
									</li>

									<li class="m-nav__separator">
										-
									</li>
									<li class="m-nav__item">
										<a href="<?= base_url() ?>finance/invoice/masuk/tambah" class="m-nav__link">
											<span class="m-nav__link-text">
												Tambah
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
								<div class="m-portlet m-portlet--tab">
									<div class="input_invoice_barang">
										<div class="m-portlet__head">
											<div class="m-portlet__head-caption">
												<div class="m-portlet__head-title">
													<span class="m-portlet__head-icon m--hide">
														<i class="la la-gear"></i>
													</span>
													<h3 class="m-portlet__head-text">
														Input Invoice Masuk
													</h3>
												</div>
											</div>
										</div>
										<!--begin::Form-->
										<form class="m-form m-form--fit m-form--label-align-right">
											<div class="m-portlet__body">
												<div class="form-group m-form__group row">
													<label  class="col-2 col-form-label">
														No. Invoice
													</label>
													<div class="col-10">
														<input class="form-control m-input" type="text" id="no_invoice">
													</div>
												</div>
												<div class="form-group m-form__group row">
													<label class="col-2 col-form-label">
														Tanggal Invoice
													</label>
													<div class="col-10">
														<input class="form-control m-input" type="date" id="tanggal_pembuatan_invoice">
													</div>
												</div>
												
												<div class="form-group m-form__group row">
													<label  class="col-2 col-form-label">
														Nama Supplier
													</label>
													<div class="col-10">
														<input class="form-control m-input" type="text" id="nama_supplier">
													</div>
												</div>
												<div class="form-group m-form__group row">
													<label  class="col-2 col-form-label">
														Nomor Telpon
													</label>
													<div class="col-10">
														<input class="form-control m-input" type="number" id="no_telpon">
													</div>
												</div>
												<div class="form-group m-form__group row">
													<label for="example-email-input" class="col-2 col-form-label">
														Email
													</label>
													<div class="col-10">
														<input class="form-control m-input" type="email" id="email_supplier">
													</div>
												</div>
												<div class="form-group m-form__group row">
													<label  class="col-2 col-form-label">
														Alamat
													</label>
													<div class="col-10">
														<input class="form-control m-input" type="text" id="alamat_supplier">
													</div>
												</div>
												<div class="form-group m-form__group row">
													<label  class="col-2 col-form-label">
														NPWP Supplier
													</label>
													<div class="col-10">
														<input class="form-control m-input" type="text" id="npwp_supplier">
													</div>
												</div>
												<div class="form-group m-form__group row">
													<label  class="col-2 col-form-label">
														Status
													</label>
													<div class="col-10">
														<select style="width: 100%" class="form-control" name="Status" id="status">
															<option value=""></option>
															<option value="0">
																Belum Lunas
															</option>
															<option value="1">
																Lunas
															</option>
														</select>
													</div>
												</div>
												<div class="form-group m-form__group row">
													<label  class="col-2 col-form-label">
														Gudang
													</label>
													<div class="col-10">
														<select style="width: 100%" class="form-control" name="gudang" id="gudang">
															<option value=""></option>
															<option value="1">
																Toko <italic>(Non Pajak)</italic>
															</option>
															<option value="2">
																Kantor <italic>(Pajak)</italic>
															</option>
														</select>
													</div>
												</div>
												<div style="margin-top: 20px" align="center">
													<button data-toggle="modal" data-target="#modal_tambah_item" type="button" class="btn btn-success btn_pemasangan"> + Tambah Item</button>
												</div>
											</div>
										</form>
										<div class="m-portlet__body">
											<div class="m-portlet__head-title">
												<h3 align="center" class="m-portlet__head-text">
													List Item Barang
												</h3><br>
											</div>
											<table class="table" id="tbl_list_invoice_masuk">
												<thead class="thead-light">
													<tr>
														<th>No</th>
														<th>Nama </th>
														<th>Kode </th>
														<th>Qty </th>
														<th>Harga Jual</th>
														<th>Potongan Harga</th>
														<th>Total Harga</th>
														<th>Aksi</th>
													</tr>
												</thead>
												<tbody></tbody>
												<tfoot>
												<tr>
													<td></td>
													<td></td>
													<td></td>
													<td></td>
													<td></td>
													<td></td>
													<th align="right">SUB TOTAL</th>
													<th><span id="sub_total">Rp.0</span></th>
												</tr>
												<tr>
													<td></td>
													<td></td>
													<td></td>
													<td></td>
													<td></td>
													<td></td>
													<th align="right">PPN 10%</th>
													<th><span id="ppn">Rp.0</span></th>
												</tr>
												<tr>
													<td></td>
													<td></td>
													<td></td>
													<td></td>
													<td></td>
													<td></td>
													<th align="right">TOTAL TAGIHAN</th>
													<th><span id="total_tagihan">Rp.0</span></th>
												</tr>																					
												</tfoot>
											</table>
											
											<!--end: Datatable -->
											<div align="center">
												<button style="margin-top: 20px;width: 300px" type="button" class="btn btn-success" id="btn_simpan_data">
													>> Simpan Data >>
												</button>	
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
			<!-- Modal : TAMBAH ITEM -->
			<div class="modal fade" id="modal_tambah_item"   role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="exampleModalLabel">
								Tambah Barang
							</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">
									&times;
								</span>
							</button>
						</div>
						<div class="modal-body">
							<div class="form-group m-form__group row">
								<label class="col-3 col-form-label">
									Nama / Kode Item
								</label>
								<div class="col-9">
									<select class="form-control m-select2 dropdown_search select2-hidden-accessible" name="nama_item" style="width:100%">
										<option selected value=""></option>
										<?php 
											foreach($data['stock'] as $stock) { ?>
												<option value="<?= $stock['kode'] ?>"><?= $stock['nama']." (".$stock['kode'].")" ?></option>
										<?php }
										?>
									</select>
								</div>
							</div>
							<div class="form-group m-form__group row">
								<label  class="col-3 col-form-label">
									Qty
								</label>
								<div class="col-9">
									<input class="form-control m-input" type="number" placeholder="Contoh: 20" value="0" name="jumlah_item" id="jumlah_item">
								</div>
							</div>
							<div class="form-group m-form__group row">
								<label  class="col-3 col-form-label">
									Satuan
								</label>
								<div class="col-9">
									<input class="form-control" name="satuan" readonly>
								</div>
							</div>
							<div class="form-group m-form__group row">
								<label class="col-3 col-form-label">
									Harga Jual
								</label>
								<div class="col-9">
									<input class="form-control m-input" type="text" placeholder="Contoh: 3.130.000" value="0" name="harga_jual" id="harga_jual">
								</div>
							</div>							
							<div class="form-group m-form__group row">
								<label  class="col-3 col-form-label">
									Potongan Harga (%)
								</label>
								<div class="col-9">
									<input class="form-control m-input" type="number" value="" placeholder="Contoh: 12" name="potongan_harga_item" id="potongan_harga_item">
								</div>
							</div>
							<div class="form-group m-form__group row">
								<label  class="col-3 col-form-label">
									Total Harga
								</label>
								<div class="col-9">
									<input readonly class="form-control m-input" type="number" placeholder="Contoh: 4.900.000" name="total_harga_item" id="total_harga_item">
								</div>
							</div>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-secondary" data-dismiss="modal">
								Tutup
							</button>
							<button id="finance_btn_tambah" type="button" class="btn btn-primary" data-dismiss="modal" disabled>
								Tambah
							</button>
						</div>
					</div>
				</div>
			</div>

			<!-- Modal Edit --> 
			<div class="modal fade" id="modal_edit_item" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="exampleModalLabel">
								Edit Barang
							</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">
									&times;
								</span>
							</button>
						</div>
						<div class="modal-body">
						<div class="form-group m-form__group row">
								<label class="col-3 col-form-label">
									Nama / Kode Item
								</label>
								<div class="col-9">
									<input type="hidden" name="edit_index">
									<select class="form-control m-select2 dropdown_search select2-hidden-accessible" name="edit_nama_item" style="width:100%">
										<option selected value=""></option>
										<?php 
											foreach($data['stock'] as $stock) { ?>
												<option value="<?= $stock['kode'] ?>"><?= $stock['nama']." (".$stock['kode'].")" ?></option>
										<?php }
										?>
									</select>
								</div>
							</div>
							<div class="form-group m-form__group row">
								<label  class="col-3 col-form-label">
									Qty
								</label>
								<div class="col-9">
									<input class="form-control m-input" type="number" placeholder="Contoh: 20" name="edit_jumlah_item" id="edit_jumlah_item">
								</div>
							</div>
							<div class="form-group m-form__group row">
								<label  class="col-3 col-form-label">
									Satuan
								</label>
								<div class="col-9">
									<input class="form-control" name="edit_satuan" readonly>
								</div>
							</div>
							<div class="form-group m-form__group row">
								<label class="col-3 col-form-label">
									Harga Jual
								</label>
								<div class="col-9">
									<input class="form-control m-input" type="text" placeholder="Contoh: 3.130.000" name="edit_harga_jual" id="edit_harga_jual">
								</div>
							</div>							
							<div class="form-group m-form__group row">
								<label  class="col-3 col-form-label">
									Potongan Harga (%)
								</label>
								<div class="col-9">
									<input class="form-control m-input" type="number" placeholder="Contoh: 12" name="edit_potongan_harga_item" id="edit_potongan_harga_item">
								</div>
							</div>
							<div class="form-group m-form__group row">
								<label  class="col-3 col-form-label">
									Total Harga
								</label>
								<div class="col-9">
									<input class="form-control m-input" type="number" readonly placeholder="Contoh: 4.900.000" name="edit_total_harga_item" id="edit_total_harga_item">
									<input type="hidden" type="text" name="edit_total_harga_item_temp">
								</div>
							</div>							
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-secondary" data-dismiss="modal">
								Tutup
							</button>
							<button disabled id="finance_btn_edit" type="button" class="btn btn-primary" data-dismiss="modal">
								Update
							</button>
						</div>
					</div>
				</div>
			</div>