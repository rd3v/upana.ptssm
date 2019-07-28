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
										<a href="<?= site_url() ?>kantor/spk-pemasangan" class="m-nav__link">
											<span class="m-nav__link-text">
												SPK Pemasangan
											</span>
										</a>
									</li>
									<li class="m-nav__separator">
										-
									</li>
									<li class="m-nav__item">
										<a href="<?= site_url() ?>kantor/spk-pemasangan/tambah?id=<?=$this->input->get('id', TRUE)?>" class="m-nav__link">
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
													Tambah SPK Pemasangan
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


								</div>
							</form>
							<div class="m-portlet__body">
								<div class="m-portlet__head-title">
									<h3 align="center" class="m-portlet__head-text">
										List Item Pemasangan
									</h3><br>


								</div>
								<div style="margin: 20px" align="right">
									<button data-toggle="modal" data-target="#form-modal" type="button" class="btn btn-success btn_pemasangan" onclick="modify_item('')"> + Tambah Item Pemasangan</button>
								</div>
								<table class="table">
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
									<tbody id="items">
<?php $i = 1; foreach ($data['item'] as $row) { ?>
										<tr id="item-<?=$row->id?>">
											<td><?=$i?></td>
											<td><?=$row->kode?></td>
											<td><?=$row->nama?></td>
											<td><?=$row->jumlah?></td>
											<td><?=$row->keterangan?></td>
											<td><button class="btn btn-danger" onclick="delete_item('<?=$row->id?>')">Hapus</button></td>
										</tr>
<?php $i++; } ?>
									</tbody>
								</table>
								<div align="center">
									<button type="button" class="btn btn-primary btn_pemasangan" onclick="submit_form()"> >> Simpan Data / Terbitkan >></button>
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
	<div class="modal fade" id="form-modal" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="form-title">
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
							<select style="width: 100%" class="form-control m-select2 dropdown_search" id="item_kode">
								<option value="">-</option>
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
								<input id="item_jumlah" type="number" class="form-control m-input" aria-describedby="basic-addon2">
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
							<textarea class="form-control m-input m-input--solid" id="item_keterangan" rows="3"></textarea>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<input type="hidden" id="id_spk" value="<?=$this->input->get('id', TRUE)?>" />
					<button type="button" class="btn btn-secondary" data-dismiss="modal">
						Tutup
					</button>
					<button type="button" class="btn btn-primary" onclick="submit_item()">
						Tambahkan
					</button>
				</div>
			</div>
		</div>
	</div>
	<!-- End::Modals -->

	<script>
        function modify_item(id) {
            $('#item_kode').val('');
            $('#item_jumlah').val('');
            $('#item_keterangan').val('');

            if (id == '') {
                $('#form-title').html('Tambah Pemasangan');
            } else {
                $('#form-title').html('Edit Pemasangan');
            }
        }

        function submit_item() {
            $(this).prop('disabled', true);
            $('.file-loading').show();

            $.post('<?=site_url('kantor/spk-pemasangan/submit-item')?>', {
                'id': '',
                'id_spk': $('#id_spk').val(),
                'kode': $('#item_kode').val(),
                'jumlah': $('#item_jumlah').val(),
                'keterangan': $('#item_keterangan').val()
            }, function(result, status) {
                if (status == 'success') {
                    $(this).prop('disabled', false);
                    $('.file-loading').hide();

                    if (result.success) {
                        $('#form-modal').modal('hide');
                        show_toast('Data berhasil '+(result.add ? 'ditambah' : 'diubah')+'.', 'success');

                        if (result.add) {
	                        $('#items').append(''+
	                       		'<tr id="item-'+result.data.id+'">'+
	                       			'<td>'+result.rows+'</td>'+
	                       			'<td>'+result.data.kode+'</td>'+
	                       			'<td>'+result.data.nama+'</td>'+
	                       			'<td>'+result.data.jumlah+'</td>'+
	                       			'<td>'+result.data.keterangan+'</td>'+
	                       			'<td><button class="btn btn-danger" onclick="delete_item(\''+result.data.id+'\')">Hapus</buttton></td>'+
	                       		'</tr>'
	                        );
                        }
                    } else {
                        $('.btn-error-form').removeClass('btn-primary');
                        $('.btn-error-form').addClass('btn-danger');

                        if (result.error.kode) $('#item_kode').addClass('is-invalid');
                        if (result.error.jumlah) $('#item_jumlah').addClass('is-invalid');
                        if (result.error.keterangan) $('#item_keterangan').addClass('is-invalid');
                    }
                } else show_toast('Data gagal dikirim.', 'error');
            });
        }

        function delete_item(id) {
            swadel({
                preConfirm: function() {
                    return new Promise(function(resolve) {
                        $.post('<?=site_url('kantor/spk-pemasangan/delete-item')?>', {
                            'id': id
                        }, function(result, status) {
                            if (status == 'success') {
                                resolve(result);
                            }
                        });
                    });
                }
            }).then(function(result) {
                if (result.value) {
                    if (result.value.success) {
                        show_toast('Data berhasil dihapus.', 'success');
                        $('#item-'+id).remove();
                    } else {
                        show_toast('Data gagal dihapus.', 'error');
                    }
                }
            });
        }

        function set_pelanggan(el) {
        	$('#telepon').val($(el).find(':selected').data('telepon'));
        	$('#email').val($(el).find(':selected').data('email'));
        	$('#alamat').val($(el).find(':selected').data('alamat'));
        }

        function submit_form() {
            $(this).prop('disabled', true);
            $('.file-loading').show();

            $.post('<?=site_url('kantor/spk-pemasangan/submit-form')?>', {
            	'action': 'add',
                'id': '<?=$this->input->get('id', TRUE)?>',
                'tipe_pajak': $('#tipe_pajak').val(),
                'no_spk': $('#no_spk').val(),
                'tanggal': $('#tanggal').val(),
                'id_pelanggan': $('#id_pelanggan').val(),
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
                        location.href='<?=site_url('kantor/spk-pemasangan')?>';
                    } else {
                        $('.btn-error-form').removeClass('btn-primary');
                        $('.btn-error-form').addClass('btn-danger');

                        if (result.error.tipe_pajak) $('#tipe_pajak').addClass('is-invalid');
                        if (result.error.no_spk) $('#no_spk').addClass('is-invalid');
                        if (result.error.tanggal) $('#tanggal').addClass('is-invalid');
                        if (result.error.id_pelanggan) $('#id_pelanggan').addClass('is-invalid');
                        if (result.error.waktu_pengerjaan) $('#waktu_pengerjaan').addClass('is-invalid');
                        if (result.error.catatan) $('#catatan').addClass('is-invalid');
                        if (result.error.status) $('#status').addClass('is-invalid');
                    }
                } else show_toast('Data gagal dikirim.', 'error');
            });
        }
	</script>
