<div class="m-grid__item m-grid__item--fluid m-wrapper">
					<!-- BEGIN: Subheader -->
					<div class="m-subheader ">
						<div class="d-flex align-items-center">
							<div class="mr-auto">
								<h3 class="m-subheader__title m-subheader__title--separator">
									SPK Service
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
										<a href="<?= site_url() ?>kantor/spk-service" class="m-nav__link">
											<span class="m-nav__link-text">
												SPK Service
											</span>
										</a>
									</li>
									<li class="m-nav__separator">
										-
									</li>
									<li class="m-nav__item">
										<a href="<?= site_url() ?>kantor/spk-service/edit/<?=$data['data']->id?>" class="m-nav__link">
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
													Edit SPK Service
												</h3>
											</div>
										</div>
									</div>
									<!--begin::Form-->
									<form class="m-form m-form--fit m-form--label-align-right">
										<div class="m-portlet__body">
											<div class="form-group m-form__group row">
												<label  class="col-3 col-form-label">
													Tipe Pajak
												</label>
												<div class="col-9">
													<select disabled class="form-control m-input m-input--square" id="tipe_pajak" name="tipe_pajak">
														<option active value="1">
															Pajak
														</option>
													</select>
												</div>
											</div>
											<div class="form-group m-form__group row">
												<label  class="col-3 col-form-label">
													No. SPK
												</label>
												<div class="col-9">
													<input class="form-control m-input" type="text" placeholder="Contoh : 0037/SSM/SPK-PSG/MKS/III/2019" id="no_spk" value="<?=$data['data']->no_spk?>">
												</div>
											</div>
                                            <div class="form-group m-form__group row">
                                                <label  class="col-3 col-form-label">
                                                    No. PO
                                                </label>
                                                <div class="col-9">
                                                    <input class="form-control m-input" type="text" placeholder="" id="no_po" value="<?=$data['data']->no_po?>">
                                                </div>
                                            </div>
											<div class="form-group m-form__group row">
												<label class="col-3 col-form-label">
													Tanggal
												</label>
												<div class="col-9">
													<input class="form-control m-input" type="date" id="tanggal" value="<?=$data['data']->tanggal?>">
												</div>
											</div>
											<div class="form-group m-form__group row">
												<label  class="col-3 col-form-label">
													Nama Pelanggan
												</label>
												<div class="col-9">
													<select style="width: 100%" class="form-control m-select2 dropdown_search" id="id_pelanggan" onchange="set_pelanggan(this)">
														<option value=""></option>
														<?php
															foreach ($data['customer'] as $value) { ?>
																<option value="<?=$value['id']?>" data-telepon="<?=$value['telepon']?>" data-email="<?=$value['email']?>" data-alamat="<?=$value['alamat']?>" <?=($data['data']->id_pelanggan == $value['id'] ? 'selected' : '')?>><?=$value['nama']?></option>
														<?php }
														 ?>
													</select>
												</div>
											</div>
											<div class="form-group m-form__group row">
												<label  class="col-3 col-form-label">
													Nomor Telpon
												</label>
												<div class="col-9">
													<input readonly class="form-control m-input" type="tel" name="no_telpon" id="telepon">
												</div>
											</div>
											<div class="form-group m-form__group row">
												<label for="example-email-input" class="col-3 col-form-label">
													Email
												</label>
												<div class="col-9">
													<input readonly class="form-control m-input" type="email" name="email_pelanggan" id="email">
												</div>
											</div>
											<div class="form-group m-form__group row">
												<label  class="col-3 col-form-label">
													Alamat
												</label>
												<div class="col-9">
													<input readonly class="form-control m-input" type="text" id="alamat" name="alamat_pelanggan">
												</div>
											</div>
        									<div class="form-group m-form__group row">
        										<label class="col-3 col-form-label">
        											Waktu Pengerjaan
        										</label>
        										<div class="col-9">
        											<input class="form-control m-input" type="datetime-local" id="waktu_pengerjaan" value="<?=str_replace(' ', 'T', $data['data']->waktu_pengerjaan)?>">
        										</div>
        									</div>
                                            <div class="form-group m-form__group row">
                                                <label class="col-3 col-form-label">
                                                    Penanggung Jawab Pihak II
                                                </label>
                                                <div class="col-9">
                                                    <input class="form-control m-input" type="text" id="penanggung_jawab_ii" value="<?=$data['data']->penanggung_jawab_ii?>">
                                                </div>
                                            </div>
        									<div  class="form-group m-form__group row">
        										<label class="col-3 col-form-label">
        											Catatan
        										</label>
        										<div class="col-9">
        											<textarea style="resize: none" class="form-control m-input " id="catatan" name="catatan" rows="3"><?=$data['data']->catatan?></textarea>
        										</div>
        									</div>

        									<div class="form-group m-form__group row">
        										<label  class="col-3 col-form-label">
        											Status
        										</label>
        										<div class="col-9">
        											<select class="form-control m-input m-input--square" id="status" name="status">
        												<option active value=""></option>
        												<option value="0" <?=($data['data']->status == '0' ? 'selected' : '')?>>
        													Aktif
        												</option>
        												<option value="1" <?=($data['data']->status == '1' ? 'selected' : '')?>>
        													Progress
        												</option>
        												<option value="2" <?=($data['data']->status == '2' ? 'selected' : '')?>>
        													Selesai
        												</option>
        												<option value="3" <?=($data['data']->status == '3' ? 'selected' : '')?>>
        													Batal
        												</option>
        											</select>
        										</div>
        									</div>
        								</div>
        							</form>
                                </div>
                                <div class="m-portlet m-portlet--tab" id="list-item" style="display: none;">
                                    <div class="m-portlet__head">
                                        <div class="m-portlet__head-caption">
                                            <div class="m-portlet__head-title">
                                                <span class="m-portlet__head-icon m--hide">
                                                    <i class="la la-gear"></i>
                                                </span>
                                                <h3 class="m-portlet__head-text">
            										List Item Service
                                                </h3>
                                            </div>
                                        </div>
                                    </div>
        							<div class="m-portlet__body">
                                        <form id="form-items">
            								<table class="table">
            									<thead>
            										<tr>
            											<th>No</th>
            											<th>ID Unit</th>
            											<th>Nama Barang</th>
            											<th>Tipe Barang</th>
            											<th>Merk</th>
            											<th>Survey</th>
            										</tr>
            									</thead>
            									<tbody id="items">
            									</tbody>
            								</table>
                                        </form>
                                        <div style="margin-top: 20px" align="center">
                                            <button id="" type="button" class="btn btn-primary btn_pemasangan" onclick="submit_form()">Terbitkan SPK</button>
                                        </div>
        							</div>
        						</div>
        					</div>
        				</div>
        			</div>
        		</div>
        	</div>
        	<!-- end:: Body -->

        	<script>
                var selected;

                $(document).ready(function(){
                    var items = '<?=$data['data']->item?>';
                    selected = items.split(',');
                    set_pelanggan($('#id_pelanggan'));
                });

                function set_pelanggan(el) {
                	$('#telepon').val($(el).find(':selected').data('telepon'));
                	$('#email').val($(el).find(':selected').data('email'));
                	$('#alamat').val($(el).find(':selected').data('alamat'));
                    $('#items').empty();
                    $('#list-item').hide();

                    $.post('<?=site_url('kantor/spk-service/getdataac/')?>' + $(el).val(), {
                    }, function(result, status) {
                        if (status == 'success') {
                            if (result.success) {
                                $('#list-item').show();
                                result.data.forEach(function(item, index) {
                                    $('#items').append(''+
                                        '<tr>'+
                                            '<td>'+(index+1)+'</td>'+
                                            '<td>'+item.id+'</td>'+
                                            '<td>'+item.nama+'</td>'+
                                            '<td>'+item.tipe+'</td>'+
                                            '<td>'+item.merk+'</td>'+
                                            '<td><label class="m-checkbox"><input type="checkbox" id="item-'+item.id+'" name="'+item.id+'" '+(selected.indexOf(item.id) != -1 ? 'checked' : '')+'> <span></span></label></td>'+
                                        '</tr>');
                                });
                            }
                        }
                    });
                }

                function submit_form() {
                    $(this).prop('disabled', true);
                    $('.file-loading').show();

                    $.post('<?=site_url('kantor/spk-service/submit-form')?>', {
                    	'action': 'edit',
                        'id': '<?=$data['data']->id?>',
                        'tipe_pajak': $('#tipe_pajak').val(),
                        'no_spk': $('#no_spk').val(),
                        'no_po': $('#no_po').val(),
                        'tanggal': $('#tanggal').val(),
                        'id_pelanggan': $('#id_pelanggan').val(),
                        'waktu_pengerjaan': $('#waktu_pengerjaan').val(),
                        'penanggung_jawab_ii': $('#penanggung_jawab_ii').val(),
                        'catatan': $('#catatan').val(),
                        'status': $('#status').val(),
                        'item': $('#form-items').serialize()
                    }, function(result, status) {
                        if (status == 'success') {
                            $(this).prop('disabled', false);
                            $('.file-loading').hide();

                            if (result.success) {
                                show_toast('Data berhasil '+(result.add ? 'ditambah' : 'diubah')+'.', 'success');
                                Swal.fire('SPK Telah Terbit!', 'SPK yang Anda buat telah diterbitkan.', 'success');
                                location.href='<?=site_url('kantor/spk-service')?>';
                            } else {
                                $('.btn-error-form').removeClass('btn-primary');
                                $('.btn-error-form').addClass('btn-danger');

                                if (result.error.tipe_pajak) $('#tipe_pajak').addClass('is-invalid');
                                if (result.error.no_spk) $('#no_spk').addClass('is-invalid');
                                if (result.error.no_po) $('#no_po').addClass('is-invalid');
                                if (result.error.tanggal) $('#tanggal').addClass('is-invalid');
                                if (result.error.id_pelanggan) $('#id_pelanggan').addClass('is-invalid');
                                if (result.error.waktu_pengerjaan) $('#waktu_pengerjaan').addClass('is-invalid');
                                if (result.error.penanggung_jawab_ii) $('#penanggung_jawab_ii').addClass('is-invalid');
                                if (result.error.catatan) $('#catatan').addClass('is-invalid');
                                if (result.error.status) $('#status').addClass('is-invalid');
                            }
                        } else show_toast('Data gagal dikirim.', 'error');
                    });
                }
        	</script>
