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
										<a href="<?= site_url() ?>master/dashboard" class="m-nav__link m-nav__link--icon">
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
										<a href="<?= site_url() ?>master/kantor/spk-komplain" class="m-nav__link">
											<span class="m-nav__link-text">
												SPK Komplain
											</span>
										</a>
									</li>
									<li class="m-nav__separator">
										-
									</li>
									<li class="m-nav__item">
										<a href="<?= site_url() ?>master/kantor/spk-komplain/tambah?id=<?=$this->input->get('id', TRUE)?>" class="m-nav__link">
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
									<div class="m-portlet__head">
										<div class="m-portlet__head-caption">
											<div class="m-portlet__head-title">
												<span class="m-portlet__head-icon m--hide">
													<i class="la la-gear"></i>
												</span>
												<h3 class="m-portlet__head-text">
													Tambah SPK Komplain
												</h3>
											</div>
										</div>
									</div>
									<!--begin::Form-->
									<form class="m-form m-form--fit m-form--label-align-right">
										<div class="m-portlet__body">
											<div class="form-group m-form__group row">
												<label  class="col-2 col-form-label">
													No. SPK
												</label>
												<div class="col-10">
													<input class="form-control m-input" type="text" placeholder="Contoh : 0037/SSM/SPK-PSG/MKS/III/2019" id="no_spk">
												</div>
											</div>
											<div class="form-group m-form__group row">
												<label class="col-2 col-form-label">
													Tanggal
												</label>
												<div class="col-10">
													<input class="form-control m-input" type="date" value="" id="tanggal">
												</div>
											</div>
											<div class="form-group m-form__group row">
												<label  class="col-2 col-form-label">
													Nama Pelanggan
												</label>
												<div class="col-10">
													<select style="width: 100%" class="form-control m-select2 dropdown_search" id="id_pelanggan" onchange="set_pelanggan(this)">
														<option value=""></option>
														<?php
															foreach ($data['customer'] as $value) { ?>
																<option value="<?=$value['id']?>" data-telepon="<?=$value['telepon']?>" data-email="<?=$value['email']?>" data-alamat="<?=$value['alamat']?>"><?=$value['nama']?></option>
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
													<input readonly class="form-control m-input" type="tel" name="no_telpon" id="telepon">
												</div>
											</div>
											<div class="form-group m-form__group row">
												<label for="example-email-input" class="col-2 col-form-label">
													Email
												</label>
												<div class="col-10">
													<input readonly class="form-control m-input" type="email" name="email_pelanggan" id="email">
												</div>
											</div>
											<div class="form-group m-form__group row">
												<label  class="col-2 col-form-label">
													Alamat
												</label>
												<div class="col-10">
													<input readonly class="form-control m-input" type="text" id="alamat" name="alamat_pelanggan">
												</div>
											</div>
                                            <div  class="form-group m-form__group row">
                                                <label class="col-2 col-form-label">
                                                    Keterangan Komplain
                                                </label>
                                                <div class="col-10">
                                                    <textarea style="resize: none" class="form-control m-input " id="keterangan" name="keterangan" rows="3"></textarea>
                                                </div>
                                            </div>
        									<div class="form-group m-form__group row">
        										<label class="col-2 col-form-label">
        											Waktu Pengerjaan
        										</label>
        										<div class="col-10">
        											<input class="form-control m-input" type="datetime-local" id="waktu_pengerjaan">
        										</div>
        									</div>
        									<div  class="form-group m-form__group row">
        										<label class="col-2 col-form-label">
        											Catatan
        										</label>
        										<div class="col-10">
        											<textarea style="resize: none" class="form-control m-input " id="catatan" name="catatan" rows="3"></textarea>
        										</div>
        									</div>

        									<div class="form-group m-form__group row">
        										<label  class="col-2 col-form-label">
        											Status
        										</label>
        										<div class="col-10">
        											<select class="form-control m-input m-input--square" id="status" name="status">
        												<option active value=""></option>
        												<option value="0">
        													Aktif
        												</option>
        												<option value="1">
        													Progress
        												</option>
        												<option value="2">
        													Selesai
        												</option>
        												<option value="3">
        													Batal
        												</option>
        											</select>
        										</div>
        									</div>
                                            <div style="margin-top: 20px;" align="center">
                                                <button id="" type="button" class="btn btn-primary btn_pemasangan" onclick="submit_form()">Terbitkan SPK</button>
                                            </div>
        								</div>
        							</form>
                                </div>
        					</div>
        				</div>
        			</div>
        		</div>
        	</div>
        	<!-- end:: Body -->

        	<script>
                function set_pelanggan(el) {
                	$('#telepon').val($(el).find(':selected').data('telepon'));
                	$('#email').val($(el).find(':selected').data('email'));
                	$('#alamat').val($(el).find(':selected').data('alamat'));
                }

                function submit_form() {
                    $(this).prop('disabled', true);
                    $('.file-loading').show();

                    $.post('<?=site_url('kantor/spk-komplain/submit-form')?>', {
                    	'action': 'add',
                        'id': '<?=$this->input->get('id', TRUE)?>',
                        'no_spk': $('#no_spk').val(),
                        'tanggal': $('#tanggal').val(),
                        'id_pelanggan': $('#id_pelanggan').val(),
                        'keterangan': $('#keterangan').val(),
                        'waktu_pengerjaan': $('#waktu_pengerjaan').val(),
                        'catatan': $('#catatan').val(),
                        'status': $('#status').val()
                    }, function(result, status) {
                        if (status == 'success') {
                            $(this).prop('disabled', false);
                            $('.file-loading').hide();

                            if (result.success) {
                                show_toast('Data berhasil '+(result.add ? 'ditambah' : 'diubah')+'.', 'success');
                                Swal.fire('SPK Telah Terbit!', 'SPK yang Anda buat telah diterbitkan.', 'success');
                                location.href='<?=site_url('master/kantor/spk-komplain')?>';
                            } else {
                                $('.btn-error-form').removeClass('btn-primary');
                                $('.btn-error-form').addClass('btn-danger');

                                if (result.error.no_spk) $('#no_spk').addClass('is-invalid');
                                if (result.error.tanggal) $('#tanggal').addClass('is-invalid');
                                if (result.error.id_pelanggan) $('#id_pelanggan').addClass('is-invalid');
                                if (result.error.keterangan) $('#keterangan').addClass('is-invalid');
                                if (result.error.waktu_pengerjaan) $('#waktu_pengerjaan').addClass('is-invalid');
                                if (result.error.catatan) $('#catatan').addClass('is-invalid');
                                if (result.error.status) $('#status').addClass('is-invalid');
                            }
                        } else show_toast('Data gagal dikirim.', 'error');
                    });
                }
        	</script>
