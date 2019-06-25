<div class="m-grid__item m-grid__item--fluid m-wrapper">
					<!-- BEGIN: Subheader -->
					<div class="m-subheader ">
						<div class="d-flex align-items-center">
							<div class="mr-auto">
								<h3 class="m-subheader__title m-subheader__title--separator">
									Master Stock
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
										<a href="<?= base_url() ?>gudang/stock/master" class="m-nav__link">
											<span class="m-nav__link-text">
												Master Stock
											</span>
										</a>
									</li>
								</ul>
							</div>
						</div>
					</div>
<div class="m-content">
						<div class="row">
							<div class="col-xl-12">
								<div class="m-portlet">
									<div class="m-portlet__head">
										<div class="m-portlet__head-caption">
											<div class="m-portlet__head-title">
												<span class="m-portlet__head-icon m--hide">
													<i class="la la-gear"></i>
												</span>
												<h3 class="m-portlet__head-text">
													Input Master Stock <br><?php if($this->session->flashdata('status')) {
														echo "<div class='alert alert-".$this->session->flashdata('status')."'>".$this->session->flashdata('flsh_msg')."</div>";
													} ?>
												</h3>
											</div>
										</div>
									</div>
									<!--begin::Form-->
									<form id="formstockedit" action="<?= site_url() ?>gudang/stock/master/editsubmit" method="post" enctype="multipart/form-data" class="form">
										<div class="m-portlet__body">
											<div class="form-group m-form__group row">
												<div class="col-lg-6">
													<label>
														Kode*:
													</label>
													<input type="text" name="input_kode_barang" class="form-control m-input" value="<?= $data->kode ?>" readonly>

												</div>
												
												<div class="col-lg-6">
													<label>
														Kategori*:
													</label>
													<select style="width: 100%" class="form-control" name="kategori_item">
														<option value="">
															-- Pilih Kategori --
														</option>
														<option value="unit" <?php if($data->kategori == "unit") { echo "selected"; } ?>>
															Unit
														</option>
														<option value="material" <?php if($data->kategori == "material") { echo "selected"; } ?>>
															Material
														</option>
														<option value="sparepart" <?php if($data->kategori == "sparepart") { echo "selected"; } ?>>
															Sparepart
														</option>
														<option value="jasa" <?php if($data->kategori == "jasa") { echo "selected"; } ?>>
															Jasa
														</option>
													</select>
												</div>
												<div class="col-lg-6">
													<label class="">
														Nama*:
													</label>
													<input type="text" name="nama_barang" class="form-control m-input" placeholder="nama barang" value="<?= $data->nama ?>">
												</div>
												<div class="col-lg-6">
													<label class="">
														Satuan *:
													</label>
													<input type="text" name="input_satuan_barang" class="form-control m-input" placeholder="satuan barang" value="<?= $data->satuan ?>">
												</div>
												<div class="col-lg-6">
													<label class="">
														Stock Minimal*:
													</label>
													<input type="number" name="stock_minimal" class="form-control m-input" value="<?= $data->stock ?>">
												</div>
												<div class="col-lg-6">
													<label class="">
														Tipe:
													</label>
													<input type="text" name="tipe" class="form-control m-input" value="<?= $data->tipe ?>">

												</div>
												<div class="col-lg-6">
													<label class="">
														Merek:
													</label>
													<input type="text" name="merek" class="form-control m-input" value="<?= $data->merk ?>">
													
												</div>
												<div class="col-lg-6">
													<label class="">
														Tipe Gudang*:
													</label>
													<select style="width: 100%" class="form-control " name="tipe_gudang">
														<option value=""></option>
														<option value="1" <?php if($data->tipe_gudang == "1") { echo "selected"; } ?>>
															Toko (Pajak)
														</option>
														<option value="2" <?php if($data->tipe_gudang == "2") { echo "selected"; } ?>>
															Kantor (Non Pajak)
														</option>
														
													</select>
												</div>

												<div class="col-lg-6">
													<label class="">
														BTU/hr:
													</label>
													<input type="text" name="btu" class="form-control m-input" value="<?= $data->btu ?>">
													
												</div>

												<div class="col-lg-6">
													<label class="">
														Daya Listrik:
													</label>
													<input type="text" name="daya" class="form-control m-input" value="<?= $data->daya_listrik ?>">
													
												</div>
												<div class="col-lg-6">
													<label class="">
														Keterangan:
													</label>
													<textarea style="resize: none;" class="form-control" name="keterangan_barang" id="keterangan_barang" rows="5"><?= $data->keterangan ?></textarea>
												</div>
												<div align="center" style="margin-top: 30px" class="offset-lg-3 col-lg-6">
													
													<img src="<?= base_url() ?>assets/img/<?= $data->gambar ?>" id="image-preview-edit" alt="image preview"/>
													<br/>
													<input type="file" id="image_source_edit" name="image_source_edit" onchange="previewImage();"/>
												</div>
												<div class="offset-lg-3 col-lg-6">
													<br>
													<button type="button" style="width:inherit;" class="btn btn-primary" id="btn_update">Update</button>
												</div>
											</div>
										</div>
									</form>
									</div>
							</div>
						</div>
					</div>
				</div>
			</div>
