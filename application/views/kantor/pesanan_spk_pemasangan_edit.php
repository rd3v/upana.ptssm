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
										<a href="<?= site_url() ?>kantor" class="m-nav__link m-nav__link--icon">
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
										<a href="<?= site_url() ?>kantor/order/spk-pemasangan" class="m-nav__link">
											<span class="m-nav__link-text">
												SPK Pemasangan
											</span>
										</a>
									</li>
									<li class="m-nav__separator">
										-
									</li>
									<li class="m-nav__item">
										<a href="<?= site_url() ?>kantor/order/spk-pemasangan/tambah" class="m-nav__link">
											<span class="m-nav__link-text">
												Edit
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
									<div class="m-portlet__head">
										<div class="m-portlet__head-caption">
											<div class="m-portlet__head-title">
												<span class="m-portlet__head-icon m--hide">
													<i class="la la-gear"></i>
												</span>
												<h3 class="m-portlet__head-text">
													Edit SPK Pemasangan
												</h3>
											</div>
										</div>
									</div>
									<!--begin::Form-->
									<form class="m-form m-form--fit m-form--label-align-right">
										<div class="m-portlet__body">
											<div class="form-group m-form__group row">
												<label  class="col-2 col-form-label">
													Tipe Pajak
												</label>
												<div class="col-10">
													<select disabled class="form-control m-input m-input--square" id="tipe_pajak" name="tipe_pajak">
														<option active value="1">
															Pajak
														</option>
													</select>
												</div>
											</div>
											<div class="form-group m-form__group row">
												<label  class="col-2 col-form-label">
													No. SPK
												</label>
												<div class="col-10">
													<input class="form-control m-input" type="text" placeholder="Contoh : 0037/SSM/SPK-PSG/MKS/III/2019" id="no_spk" value="<?= $data['SpkPemasangan']->no_spk ?>">
												</div>
											</div>
											<div class="form-group m-form__group row">
												<label class="col-2 col-form-label">
													Tanggal
												</label>
												<div class="col-10">
													<input class="form-control m-input" type="date" value="<?= $data['SpkPemasangan']->tanggal ?>" id="tanggal_pembuatan_spk">
												</div>
											</div>
											<div class="form-group m-form__group row">
												<label  class="col-2 col-form-label">
													Nama Pelanggan
												</label>
												<div class="col-10">
													<select style="width: 100%" class="form-control m-select2 dropdown_search" name="nama_pelanggan">
														<option value=""></option>
														<?php 
															foreach ($data['customer'] as $value) { ?>
																<option value="<?= $value['id'] ?>" <?= $data['SpkPemasangan']->nama_pelanggan == $value['id'] ? 'selected':''  ?>><?= $value['nama'] ?></option>	
														<?php }
														 ?>
													</select>
												</div>
											</div>
											<div class="form-group m-form__group row">
												<label  class="col-2 col-form-label">
													Nomor Telpon
												</label>
												<div class="col-10">
													<input readonly class="form-control m-input" type="tel" name="no_telpon" id="no_telpon" value="<?= $data['SpkPemasangan']->telepon ?>">
												</div>
											</div>
											<div class="form-group m-form__group row">
												<label for="example-email-input" class="col-2 col-form-label">
													Email
												</label>
												<div class="col-10">
													<input readonly class="form-control m-input" type="email" name="email_pelanggan" id="email_pelanggan" value="<?= $data['SpkPemasangan']->email ?>">
												</div>
											</div>
											<div class="form-group m-form__group row">
												<label  class="col-2 col-form-label">
													Alamat
												</label>
												<div class="col-10">
													<input readonly class="form-control m-input" type="text" id="alamat_pelanggan" name="alamat_pelanggan" value="<?= $data['SpkPemasangan']->alamat ?>">
												</div>
											</div>
									
									<div class="form-group m-form__group row">
										<label class="col-2 col-form-label">
											Waktu Pengerjaan
										</label>
										<div class="col-10">
											<input class="form-control m-input" type="datetime-local" value="<?= $data['SpkPemasangan']->waktu_pengerjaan ?>" id="tgl_mulai" >
										</div>
									</div>
									<div  class="form-group m-form__group row">
										<label class="col-2 col-form-label">
											Catatan
										</label>
										<div class="col-10">
											<textarea style="resize: none" class="form-control m-input " id="catatan" name="catatan" rows="3"><?= $data['SpkPemasangan']->catatan ?></textarea>
										</div>
									</div>

									<div class="form-group m-form__group row">
										<label  class="col-2 col-form-label">
											Status
										</label>
										<div class="col-10">
											<select class="form-control m-input m-input--square" id="status" name="status">
												<option value=""></option>
												<option value="0" <?= $data['SpkPemasangan']->status == "0" ? 'selected':'' ?>>
													Aktif
												</option>
												<option value="1" <?= $data['SpkPemasangan']->status == "1" ? 'selected':'' ?>>
													Progress
												</option>
												<option value="2" <?= $data['SpkPemasangan']->status == "2" ? 'selected':'' ?>>
													Selesai
												</option>
												<option value="3" <?= $data['SpkPemasangan']->status == "3" ? 'selected':'' ?>>
													Batal
												</option>
											</select>
										</div>
									</div>

									
								</div>
							</form>
							<div class="m-portlet__body">
								<div class="m-portlet__head-title">
									<h3 align="center" class="m-portlet__head-text">
										List Item Pemasangan
									</h3><br>


								</div>
								<div style="margin: 20px" align="right">
									<button data-toggle="modal" data-target="#modal_tambah_pemasangan" type="button" class="btn btn-success btn_pemasangan"> + Tambah Item Pemasangan</button>
								</div>
								<table class="table" id="tbl_item_pemasangan">
									<thead>
										<tr>
											<th>No</th>
											<th>Kode Barang</th>
											<th>Nama Barang</th>
											<th>Jumlah</th>
											<th>Keterangan</th>
											<th>Aksi</th>
										</tr>
									</thead>
									<tbody>
										<?php 
										$no = 1;
										foreach ($data['SpkPemasanganItem'] as $value) { ?>
												<tr>
													<td><?= $no; ?></td>
													<td><?= $value['kode'] ?></td>
													<td><?= $value['nama'] ?></td>
													<td><?= $value['jumlah'] ?></td>
													<td><?= $value['keterangan'] ?></td>
													<td>
<a class='btn btn-sm btn-danger btn_hapus' style='color:white; width:80px;' data-index='<?= $no ?>'>Hapus</a>
													</td>
												</tr>
										<?php $no++; } ?>
									</tbody>
								</table>
								<div align="center">
									<button id="btn_terbitkan_spk" type="button" class="btn btn-primary btn_pemasangan"> >> Update Data >></button>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end:: Body -->
	<!--  Begin::Modals -->
	<div class="modal fade" id="modal_tambah_pemasangan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">
						Tambah Pemasangan
					</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">
							&times;
						</span>
					</button>
				</div>
				<div class="modal-body">
					<div class="form-group m-form__group row">
						<label for="example-text-input" class="col-3 col-form-label">
							Nama / Kode Barang
						</label>
						<div class="col-9">
							<select style="width: 100%" class="form-control m-select2 dropdown_search" name="nama_barang_modal">
								<?php 
								foreach ($data['stock'] as $value) { ?>
									<option value="<?= $value['kode'] ?>||<?= $value['nama'] ?>"><?= $value['kode'] ?> || <?= $value['nama'] ?></option>
							<?php } ?>
							</select>
						</div>
					</div>
					<div class="form-group m-form__group row">
						<label for="example-text-input" class="col-3 col-form-label">
							Jumlah
						</label>
						<div class="col-9">
							<div class="input-group">
								<input name="jumlah_barang" type="number" class="form-control m-input" aria-describedby="basic-addon2">
								<div class="input-group-append">
									<span class="input-group-text" id="basic-addon2">
										Unit
									</span>
								</div>
							</div>
						</div>
					</div>
					<div class="form-group m-form__group row">
						<label for="example-text-input" class="col-3 col-form-label">
							Keterangan
						</label>
						<div class="col-9">
							<textarea class="form-control m-input m-input--solid" id="item_keterangan" name="item_keterangan" rows="3"></textarea>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">
						Tutup
					</button>
					<button disabled id="btn_tambah_pemasangan" data-dismiss="modal" type="button" class="btn btn-primary">
						Tambahkan
					</button>
				</div>
			</div>
		</div>
	</div>
	<!-- End::Modals -->