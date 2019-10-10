<div class="m-grid__item m-grid__item--fluid m-wrapper">
					<!-- BEGIN: Subheader -->
					<div class="m-subheader ">
						<div class="d-flex align-items-center">
							<div class="mr-auto">
								<h3 class="m-subheader__title m-subheader__title--separator">
									Manajemen Penugasan
								</h3>
								<ul class="m-subheader__breadcrumbs m-nav m-nav--inline">
									<li class="m-nav__item m-nav__item--home">
										<a href="<?=site_url('admin/dashboard')?>" class="m-nav__link m-nav__link--icon">
											<i class="m-nav__link-icon la la-home"></i>
										</a>
									</li>
									<li class="m-nav__separator">
										-
									</li>
									<li class="m-nav__item">
										<a href="<?=site_url('admin/hrd')?>" class="m-nav__link">
											<span class="m-nav__link-text">
												Penugasan
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
										<!--begin: Search Form -->
										<div class="m-form m-form--label-align-right m--margin-top-20 m--margin-bottom-30">
											<div class="row align-items-center">
												<div class="col-md-12">
													<div class="form-group m-form__group row align-items-center">
														<div class="col-md-6">
															<div class="m-portlet__head-title">
																<h3 class="m-portlet__head-text">
																	Daftar SPK untuk ditugaskan
																</h3>
															</div>
														</div>
														<div class="col-md-4 offset-md-2">
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


										<ul class="nav nav-tabs" role="tablist">
											<li class="nav-item">
												<a class="nav-link active" data-toggle="tab" href="#m_tabs_1_1" data-target="#m_tabs_1_1">Antrian</a>
											</li>

											<li class="nav-item">
												<a class="nav-link" data-toggle="tab" href="#m_tabs_1_2">Terbit </a>
											</li>
											<li class="nav-item">
												<a class="nav-link " data-toggle="tab" href="#m_tabs_1_3">Batal</a>
											</li>
										</ul>

										<div class="tab-content">
											<div class="tab-pane active" id="m_tabs_1_1" role="tabpanel">
												<!--begin: antrian table -->

												<table class="table" id="tbl_manajemen_1">
													<thead>
														<tr>
															<th>No</th>
															<th>Tanggal</th>
															<th>No SPK</th>
															<th>Tipe SPK</th>
															<th>Pelanggan</th>
															<th>Teknisi</th>
															<th>Status</th>
															<th>Aksi</th>
														</tr>
													</thead>
													<tbody>
<?php
$status = ['Aktif', 'Progress', 'Selesai', 'Batal'];
$i = 1;
foreach ($data['antrian'] as $row) {
?>
														<tr>
															<td><?=$i?></td>
															<td><?=tgl_indo($row->tanggal)?></td>
															<td><?=$row->no_spk?></td>
															<td><?=$row->tipe_spk?></td>
															<td><?=$row->nama?></td>
															<td><?=($row->id_teknisi ? $row->id_teknisi : '-')?></td>
															<td><?=$status[$row->status]?></td>
															<td>
																<button  class="btn btn-sm btn-primary"  data-toggle="modal" data-target="#proses_item" type="button"  style="color:white; width:80px;" onclick="modify_form('<?=$row->id?>', '<?=strtolower($row->tipe_spk)?>', '<?=$row->id_teknisi?>')">Proses >>
																</button>
															</td>
														</tr>
<?php $i++; } ?>
													</tbody>
												</table>
												<!--end: Datatable -->

											</div>

											<div class="tab-pane" id="m_tabs_1_2" role="tabpanel">
												<!--begin: terbit table -->
												<table class="table" id="tbl_manajemen_2">
													<thead>
														<tr>
															<th>No</th>
															<th>Tanggal</th>
															<th>No SPK</th>
															<th>Tipe SPK</th>
															<th>Pelanggan</th>
															<th>Teknisi</th>
															<th>Status</th>
															<th>Aksi</th>
														</tr>
													</thead>
													<tbody>
<?php
$i = 1;
foreach ($data['terbit'] as $row) {
	$teknisi = [];
	$id_teknisi = explode(',', $row->id_teknisi);
	for ($j = 0; $j < sizeof($id_teknisi); $j++) {
		array_push($teknisi, $this->crud->gda('users', ['id' => $id_teknisi[$j]])['name']);
	}
?>
														<tr>
															<td><?=$i?></td>
															<td><?=tgl_indo($row->tanggal)?></td>
															<td><?=$row->no_spk?></td>
															<td><?=$row->tipe_spk?></td>
															<td><?=$row->nama?></td>
															<td><?=($row->id_teknisi ? implode(', ', $teknisi) : '-')?></td>
															<td><?=$status[$row->status]?></td>
															<td>
																<button  class="btn btn-sm btn-primary"  data-toggle="modal" data-target="#proses_item" type="button"  style="color:white; width:80px;" onclick="modify_form('<?=$row->id?>', '<?=strtolower($row->tipe_spk)?>', '<?=$row->id_teknisi?>')"> <i class="fa fa-edit"></i> Edit
																</button>

																<a href="<?=site_url('master/hrd/dashboard/rincian-spk/'.strtolower($row->tipe_spk).'/'.$row->id)?>" class="btn btn-sm btn-success" role="button"  style="color:white; width:80px;"> <i class="fa fa-eye"></i> Rincian
																</a>
															</td>
														</tr>
<?php $i++; } ?>
													</tbody>
												</table>
												<!--end: Datatable -->

											</div>
											<div class="tab-pane" id="m_tabs_1_3" role="tabpanel">
												<table class="table" id="tbl_manajemen_3">
													<thead>
														<tr>
															<th>No</th>
															<th>Tanggal</th>
															<th>No SPK</th>
															<th>Tipe SPK</th>
															<th>Pelanggan</th>
															<th>Teknisi</th>
															<th>Status</th>
															<th>Aksi</th>
														</tr>
													</thead>
													<tbody>
<?php
$i = 1;
foreach ($data['batal'] as $row) {
	$teknisi = [];
	$id_teknisi = explode(',', $row->id_teknisi);
	for ($j = 0; $j < sizeof($id_teknisi); $j++) {
		array_push($teknisi, $this->crud->gda('users', ['id' => $id_teknisi[$j]])['name']);
	}
?>
														<tr>
															<td><?=$i?></td>
															<td><?=tgl_indo($row->tanggal)?></td>
															<td><?=$row->no_spk?></td>
															<td><?=$row->tipe_spk?></td>
															<td><?=$row->nama?></td>
															<td><?=($row->id_teknisi ? implode(', ', $teknisi) : '-')?></td>
															<td><?=$status[$row->status]?></td>
															<td>
																<a href="<?=site_url('master/hrd/dashboard/rincian-spk/'.strtolower($row->tipe_spk).'/'.$row->id)?>" class="btn btn-sm btn-success" role="button"  style="color:white; width:80px;"> <i class="fa fa-eye"></i> Rincian
																</a>
															</td>
														</tr>
<?php $i++; } ?>
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
		<!-- modal tambah item -->
		<div class="modal fade" id="proses_item"  role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel">
							Proses Item Penugasan
						</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">
								&times;
							</span>
						</button>
					</div>
					<div class="modal-body">
						<form class="m-form" id="form-teknisi">
							<div class="m-form__group form-group">

								<label >Tugas Diberikan Kepada</label>

								<div class="m-checkbox-list">
<?php foreach ($data['teknisi'] as $row) { ?>
									<label class="m-checkbox">
										<input type="checkbox" id="item-<?=$row->id?>" name="<?=$row->id?>"> <?=$row->name?>
										<span></span>
									</label>
<?php } ?>
								</div>
							</div>

						</form>

					</div>
					<div class="modal-footer">
						<input type="hidden" id="id">
						<input type="hidden" id="id_teknisi">
						<input type="hidden" id="tipe_spk">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">
							Batal
						</button>
						<button id="btn_tambah_item" type="button" class="btn btn-primary" onclick="submit_form()">
							Simpan
						</button>
					</div>
				</div>
			</div>
		</div>

		<script>
			function modify_form(id_spk, tipe_spk, id_teknisi) {
				var id = id_teknisi.split(',');

				$('#id').val(id_spk);
				$('#id_teknisi').val(id_teknisi);
				$('#tipe_spk').val(tipe_spk);
                $('input[type=checkbox]').prop('checked', false);

				if (id.length > 0) {
					for (var i = 0; i < id.length; i++) {
						$('#item-'+id[i]).prop('checked', true);
					}
				}
			}

            function submit_form() {
                $(this).prop('disabled', true);
                $('.file-loading').show();

                $.post('<?=site_url('admin/hrd/dashboard/submit-form')?>', {
                	'id': $('#id').val(),
                	'tipe_spk': $('#tipe_spk').val(),
                	'id_teknisi': $('#id_teknisi').val(),
                    'teknisi': $('#form-teknisi').serialize()
                }, function(result, status) {
                    if (status == 'success') {
                        $(this).prop('disabled', false);
                        $('.file-loading').hide();

                        if (result.success) {
                            $('#form-modal').modal('hide');
                            show_toast('Data berhasil '+(result.add ? 'ditambah' : 'diubah')+'.', 'success');
                            location.href = '<?=site_url('hrd')?>';
                        } else {
                        	Swal.fire('Teknisi harus dipilih!', '', 'error');
                        }
                    } else show_toast('Data gagal dikirim.', 'error');
                });
        	}
		</script>

