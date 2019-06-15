<div class="m-grid__item m-grid__item--fluid m-wrapper">
					<!-- BEGIN: Subheader -->
					<div class="m-subheader ">
						<div class="d-flex align-items-center">
							<div class="mr-auto">
								<h3 class="m-subheader__title m-subheader__title--separator">
									Rincian Invoice Masuk
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
										<a href="<?= base_url() ?>finance/invoice/masuk/rincian/<?= $data['invoice']['data_invoice']->no_invoice ?>" class="m-nav__link">
											<span class="m-nav__link-text">
												Rincian
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
									<div class="m-portlet__head header">
										<h2 style="margin-top: 30px" align="left" class="header-pesanan">
											Invoice Masuk
										</h2><br>
										<div class="info row">
											<div class="col-sm">
												<p>
													No Invoice : <span id="no_invoice"><?= $data['invoice']['data_invoice']->no_invoice ?></span>
												</p>
												<p>
													Status : <span id="status_invoice"><?= $data['invoice']['data_invoice']->no_invoice == 0 ? "BELUM LUNAS":"LUNAS" ?></span>
												</p>
												<p id="tanggal_surat">
                                                    <?php
                                                    $tanggal = explode("-",$data['invoice']['data_invoice']->tanggal);
                                                    ?>
													<i class="flaticon-calendar-2"> </i><?= $tanggal[2]."/".$tanggal[1]."/".$tanggal[0] ?>
												</p> 
												<p id="nama_pelanggan">
													<i class="flaticon-users"> </i> <?= strtoupper($data['invoice']['data_invoice']->nama_supplier) ?>
												</p>
												<p id="gudang">
													<i class="fa fa-home"> </i> <?= $data['invoice']['data_invoice']->gudang == 0 ? "":"" ?>
												</p>
												
											</div>
											<div class="col-sm">
												<p id="email_pelanggan"><i class="fa fa-envelope-o "> </i> <?= $data['invoice']['data_invoice']->email ?></p> 
												<p id="no_telpon">
													<i class="fa fa-phone"> </i> <?= $data['invoice']['data_invoice']->telepon ?>
												</p>
												<p id="alamat_pelanggan"><i class="flaticon-placeholder-1"> </i> <?= $data['invoice']['data_invoice']->alamat ?></p>
												
											</div>
										</div>	
									</div>
									<div class="m-portlet__body">
										<!--end: Search Form -->
										<!--begin: Datatable -->
										<!-- <div class="m_datatable" id="local_data"></div> -->
										<table class="table">
											<thead>
												<tr>
													<th>No</th>
													<th>Nama Barang</th>
													<th>Jumlah Barang</th>
													<th>Harga Jual</th>
													<th>Potongan Harga</th>
													<th>Total Harga</th>
												</tr>
											</thead>
											<tbody>
                                                <?php
                                                    $no = 1;
                                                    foreach($data['invoice']['data_invoice_list_barang'] as $value) { ?>
												<tr>
													<td><?= $no ?></td>
													<td><?= $value['nama'] ?></td>
													<td><?= $value['jumlah'] ?></td>
													<td>Rp.<?= number_format($value['harga_jual']) ?></td>
													<td><?= $value['potongan_harga'] ?> %</td>
													<td>Rp.<?= number_format($value['total_harga']) ?></td>
                                                </tr>
                                                    <?php $no++; } ?>
											</tbody>
										</table>
										<table style="width: 100%" class="tg">
											<tr>
												<th style="width: 10%" class="tg-s268"></th>
												<th style="width: 10%" class="tg-s268"></th>
												<th style="width: 20%" class="tg-s268"></th>
												<th style="width: 20%" class="tg-s268"></th>
												<th id="sub_total" align="right" style="width: 25%" class="tg-s268">SUB TOTAL</th>
												<th style="width: 15%" class="tg-s268">Rp.<?= number_format($data['invoice']['data_invoice']->subtotal) ?></th>
											</tr>
											<tr>
												<th style="width: 10%" class="tg-s268"></th>
												<th style="width: 10%" class="tg-s268"></th>
												<th style="width: 20%" class="tg-s268"></th>
												<th style="width: 20%" class="tg-s268"></th>
												<th id="ppn" align="right" style="width: 25%" class="tg-s268">PPN 10%</th>
												<th style="width: 15%" class="tg-s268"><?= $data['invoice']['data_invoice']->ppn ?> %</th>
											</tr>
											<tr>
												<th style="width: 10%" class="tg-s268"></th>
												<th style="width: 10%" class="tg-s268"></th>
												<th style="width: 20%" class="tg-s268"></th>
												<th style="width: 20%" class="tg-s268"></th>
												<th id="total_tagihan" align="right" style="width: 25%" class="tg-s268">TOTAL TAGIHAN</th>
												<th style="width: 15%" class="tg-s268">Rp.<?= number_format($data['invoice']['data_invoice']->total) ?></th>
											</tr>
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
			<!-- Modal : TAMBAH ITEM -->
			<div class="modal fade" id="modal_tambah_barang"   role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
								<label  class="col-3 col-form-label">
									Nama Barang
								</label>
								<div class="col-9">
									<select style="width: 100%" class="form-control m-select2 dropdown_search select2-hidden-accessible" name="nama_item" tabindex="-1" aria-hidden="true">
										<option value="1" >
											AC 1
										</option>
										<option value="2">
											AC 2
										</option>
										<option value="3">
											AC 3
										</option>
									</select>
								</div>
							</div>
							<div class="form-group m-form__group row">
								<label  class="col-3 col-form-label">
									Qty
								</label>
								<div class="col-9">
									<input class="form-control m-input" type="number" value="20" id="jumlah_item">
								</div>
							</div>
							<div class="form-group m-form__group row">
								<label  class="col-3 col-form-label">
									Satuan
								</label>
								<div class="col-9">
									<select disabled="" style="width: 100%" class="form-control m-select2 dropdown_search select2-hidden-accessible" name="satuan" tabindex="-1" aria-hidden="true">
										<option elected="" value="1" >
											Unit
										</option>
										<option s value="2">
											Meter
										</option>
										<option value="3">
											Pcs
										</option>
									</select>
								</div>
							</div>
							<div class="form-group m-form__group row">
								<label  class="col-3 col-form-label">
									Harga
								</label>
								<div class="col-9">
									<input class="form-control m-input" type="text" value="Rp4,900,000" id="harga_item">
								</div>
							</div>
							<div class="form-group m-form__group row">
								<label  class="col-3 col-form-label">
									Harga Khusus
								</label>
								<div class="col-9">
									<input class="form-control m-input" type="text" value="Rp3,200,000" id="harga_khusus">
								</div>
							</div>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-secondary" data-dismiss="modal">
								Tutup
							</button>
							<button id="btn_tambah" type="button" class="btn btn-primary" data-dismiss="modal">
								Tambah
							</button>
						</div>
					</div>
				</div>
			</div>