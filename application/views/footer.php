			<!-- begin::Footer -->
			<footer class="m-grid__item		m-footer ">
				<div class="m-container m-container--fluid m-container--full-height m-page__container">
					<div class="m-stack m-stack--flex-tablet-and-mobile m-stack--ver m-stack--desktop">
						<div class="m-stack__item m-stack__item--left m-stack__item--middle m-stack__item--last">
							<span class="m-footer__copyright">
								Upa'na Studio
							</span>
						</div>

					</div>
				</div>
			</footer>
			<!-- end::Footer -->
		</div>
		<!-- end:: Page -->
		<!-- begin::Scroll Top -->
		<div class="m-scroll-top m-scroll-top--skin-top" data-toggle="m-scroll-top" data-scroll-offset="500"data-scroll-speed="300">
			<i class="la la-arrow-up"></i>
		</div>
		<!-- end::Scroll Top -->

		<!--begin::Base Scripts -->
		<script src="<?= base_url() ?>assets/vendors/base/vendors.bundle.js" type="text/javascript"></script>
		<script src="<?= base_url() ?>assets/demo/default/base/scripts.bundle.js" type="text/javascript"></script>
		<!--end::Base Scripts -->
		<!--begin::Page Vendors -->
		<script src="<?= base_url() ?>assets/vendors/custom/fullcalendar/fullcalendar.bundle.js" type="text/javascript"></script>
		<!--end::Page Vendors -->
		<!--begin::Page Snippets -->
		<script src="<?= base_url() ?>assets/app/js/dashboard.js" type="text/javascript"></script>
		<!--end::Page Snippets -->
		<script>
<?php
			# FINANCE
			if($data['route'] == "finance/invoice/masuk") { ?>
				$("li#invoice_masuk").addClass("m-menu__item--active");
				var tbl_list_invoice_masuk = $('#tbl_list_invoice_masuk').mDatatable({
				data: {
					saveState: {cookie: false},
						type: 'remote',
				        source: {
				          read: {
				            // sample GET method
				            method: 'POST',
				            url: '<?= base_url() ?>finance/invoice/masuk/getdata',
				            map: function(raw) {
				              // sample data mapping
				              var dataSet = raw;
				              if (typeof raw.data !== 'undefined') {
				                dataSet = raw.data;
				              }
				              return dataSet;
				            },
				          },
				        },
				        pageSize: 10,
				        serverPaging: true,
				        serverFiltering: true,
				        serverSorting: true,
				    },
					// layout definition
					layout: {
						theme: 'default', // datatable theme
						class: '', // custom wrapper class
						scroll: true, // enable/disable datatable scroll both horizontal and vertical when needed.
						// height: 450, // datatable's body's fixed height
						footer: false, // display/hide footer
					},

					// column sorting
					sortable: true,
					filterable:true,
					search: {
						input: $('#generalSearch'),
					},
					columns: [
					{
						field: "no",
						template: function(data, type, row, meta) {
							return data.getIndex() + 1;
						},
						textAlign: "center",
					},
					{
						field: 'tanggal',
						textAlign: 'center',
						template: function(data) {
							var tanggal = data.tanggal.split("-");

							return tanggal[2] + "/" + tanggal[1] + "/" + tanggal[0];
						}
					},
					{
						field: 'no_invoice',
						textAlign: 'center',
					},
					{
						field: 'nama_supplier',
						textAlign: 'center',
					},
					{
						field: 'status',
						textAlign: 'center',
						template: function(data) {
							return data.status == 0 ? "Belum Lunas":"Lunas";
						}
					},
					{
						field: 'aksi',
						template: function(row) {
							var btnrincian = "<a href='<?= base_url() ?>finance/invoice/masuk/rincian/" + row.no_invoice + "' class='btn btn-sm btn-primary' style='color:white;' title='Rincian Data'><i class='fa fa-address-book-o'></i> Rincian</a> ";
							var btnedit = "<a href='<?= base_url() ?>finance/invoice/masuk/edit/" + row.no_invoice + "' class='btn btn-sm btn-info ' tyle='color:white;' title='Edit Data'><i class='fa fa-pencil-square'></i> Edit</a> ";
							var btnhapus = "<button type='button' class='btn btn-sm btn-danger btnhapus' data-no_invoice='"+row.no_invoice+"' title='Hapus Data'> <i class='fa fa-trash'></i> </button>";
							var html = btnrincian + btnedit + btnhapus;
							return html;
						},
						textAlign: "center"
					}

					],
				});

					$(document).on('click','.btnhapus',function() {
						var no_invoice = $(this).data('no_invoice');
						if(!confirm('Hapus Data Nomor Invoice : ' + no_invoice)) return false;
						$.ajax({
							url:"<?= base_url() ?>finance/invoice/masuk/hapus",
							type:"post",
							data:{
								no_invoice:no_invoice
							},
							dataType:'json'
						}).done(function(res) {
							console.log(res);
							swal({
								title:res.title,
								message:res.message,
								type:res.status,
								confirmButtonText: 'Ok'
								}).then(function(result) {
									if (result.value) {
										document.location = '<?= base_url() ?>finance/invoice/masuk';
									}
								});
						}).fail(function(res) {
							console.log(res);
						});
					});


			<?php }

				if($data['route'] == "finance/invoice/masuk/tambah") { ?>
					var Select2 = function() {
						var demos = function(){
						// basic
							$('.dropdown_search, .dropdown_search_validate').select2({
								placeholder: "Pilih item barang"
							});
						}
						var modalDemos = function() {
							$('#m_select2_modal').on('shown.bs.modal', function () {
						// basic
							$('.dropdown_search_modal').select2({
								placeholder: "Pilih item barang"
							});
						});
						}
						return {
							init: function() {
								demos();
								modalDemos();
							}
						};
					}();
					jQuery(document).ready(function() {
						Select2.init();
					});
					$("li#invoice_masuk").addClass("m-menu__item--active");
					$("table#tbl_list_invoice_masuk tbody").html("");

					var listitem = [];
					var subtotal = 0;
					var ppn = 0;
					var total = 0;
					var tagihan = {};

					$('#btn_simpan_data').click(function(e) {
						if(!confirm('Apakah data yang anda masukkan sudah benar ?')) return false;
						if($("#no_invoice").val() == "") {
							swal('Invoice Kosong!');
						} else if($("#tanggal_pembuatan_invoice").val() == "") {
							swal('Tanggal Invoice Kosong!');
						} else if($("#nama_supplier").val() == "") {
							swal('Nama Supplier Kosong!');
						} else if($("#no_telpon").val() == "") {
							swal('Nomor Telepon Kosong!');
						} else if($("#email_supplier").val() == "") {
							swal('Email Supplier Kosong!');
						} else if($("#alamat_supplier").val() == "") {
							swal('Alamat Supplier Kosong!');
						} else if($("#npwp_supplier").val() == "") {
							swal('NPWP Supplier Kosong!');
						} else if($("select#status").val() == "") {
							swal('Status Pembayaran Kosong!');
						} else if($("select#gudang").val() == "") {
							swal('Tipe Gudang Kosong!');
						} else if(listitem.length == 0) {
							swal('Mohon input list item barang');
						} else {

							tagihan.subtotal = subtotal;
							tagihan.ppn = ppn;
							tagihan.total = total;

							$.ajax({
								url:"<?= base_url() ?>finance/invoice/masuk/tambahsubmit",
								type:"post",
								data:{
									// Invoice Masuk
									no_invoice:$("#no_invoice").val(),
									tanggal:$("#tanggal_pembuatan_invoice").val(),
									nama_supplier:$("#nama_supplier").val(),
									telepon:$("#no_telpon").val(),
									email:$("#email_supplier").val(),
									alamat:$("#alamat_supplier").val(),
									npwp:$("#npwp_supplier").val(),
									status:$("select#status").val(),
									gudang:$("select#gudang").val(),

									// Invoice Masuk List barang
									listitem:listitem,
									tagihan:tagihan

								},
								dataType:"json"
							}).done(function(res) {
								console.log(res);

								swal({
								title:res.title,
								message:res.message,
								type:res.status,
								confirmButtonText: 'Ok'
								}).then(function(result) {
									if (result.value) {
										document.location = '<?= base_url() ?>finance/invoice/masuk';
									}
								});

							}).fail(function(res) {
								console.log(res);
							});

						}

					});

					// modal form tambah validation
					$("select[name='nama_item']").on("change", function() {
						$.ajax({
							url:"<?= base_url() ?>finance/invoice/masuk/getsatuan",
							type:"post",
							data:{
								kode:$(this).val(),
								field:"satuan"
							},
							dataType:"json"
						}).done(function(res) {
							$("input[name=satuan]").val(res.satuan);
						}).fail(function(res) {
							console.log(res);
						});

						if($(this).val() != "" && $("input[name=jumlah_item]").val() != "" && $("input[name='harga_jual']").val() != "" && $("input[name='potongan_harga_item']").val()) {
							$("button#finance_btn_tambah").removeAttr("disabled");
						} else {
							$("button#finance_btn_tambah").attr("disabled", "disabled");
						}
					});

					$("input[name='jumlah_item']").on("input", function() {
						if($(this).val() != "" && $("select[name=nama_item]").val() != "" && $("input[name='harga_jual']").val() != "" && $("input[name='potongan_harga_item']").val()) {
							$("button#finance_btn_tambah").removeAttr("disabled");
						} else {
							$("button#finance_btn_tambah").attr("disabled", "disabled");
						}
					});

					$("input[name='harga_jual']").on("input", function() {
						if($(this).val() != "" && $("select[name=nama_item]").val() != "" && $("select[name=jumlah_item]").val() != "" && $("input[name='potongan_harga_item']").val()) {
							$("button#finance_btn_tambah").removeAttr("disabled");
						} else {
							$("button#finance_btn_tambah").attr("disabled", "disabled");
						}
					});

					$("input[name='potongan_harga_item']").on("input", function() {
						if($(this).val() != "" && $("select[name=nama_item]").val() != "" && $("select[name=jumlah_item]").val() != "" && $("input[name='harga_jual']").val()) {
							$("button#finance_btn_tambah").removeAttr("disabled");
						} else {
							$("button#finance_btn_tambah").attr("disabled", "disabled");
						}
					});

					// end modal form tambah validation

					// modal form edit validation

					$("select[name='edit_nama_item']").on("change", function() {
						$.ajax({
							url:"<?= base_url() ?>finance/invoice/masuk/getsatuan",
							type:"post",
							data:{
								kode:$(this).val(),
								field:"satuan"
							},
							dataType:"json"
						}).done(function(res) {
							$("input[name=edit_satuan]").val(res.satuan);
						}).fail(function(res) {
							console.log(res);
						});

						if($(this).val() != "" && $("input[name=jumlah_item]").val() != "" && $("input[name='harga_jual']").val() != "" && $("input[name='potongan_harga_item']").val()) {
							$("button#finance_btn_tambah").removeAttr("disabled");
						} else {
							$("button#finance_btn_tambah").attr("disabled", "disabled");
						}
					});

					$("select[name='edit_nama_item']").on("change", function() {
						if($(this).val() != "" && $("input[name=edit_jumlah_item]").val() != "" && $("input[name='edit_harga_jual']").val() != "" && $("input[name='edit_potongan_harga_item']").val() && $("input[name='edit_total_harga_item']").val()) {
							$("button#finance_btn_edit").removeAttr("disabled");
						} else {
							$("button#finance_btn_edit").attr("disabled", "disabled");
						}
					});

					$("input[name='edit_jumlah_item']").on("input", function() {
						if($(this).val() != "" && $("select[name=edit_nama_item]").val() != "" && $("input[name='edit_harga_jual']").val() != "" && $("input[name='edit_potongan_harga_item']").val() && $("input[name='edit_total_harga_item']").val()) {
							$("button#finance_btn_edit").removeAttr("disabled");
						} else {
							$("button#finance_btn_edit").attr("disabled", "disabled");
						}
					});

					$("input[name='edit_harga_jual']").on("input", function() {
						if($(this).val() != "" && $("select[name=edit_nama_item]").val() != "" && $("select[name=edit_jumlah_item]").val() != "" && $("input[name='edit_potongan_harga_item']").val() && $("input[name='edit_total_harga_item']").val()) {
							$("button#finance_btn_edit").removeAttr("disabled");
						} else {
							$("button#finance_btn_edit").attr("disabled", "disabled");
						}
					});

					$("input[name='edit_potongan_harga_item']").on("input", function() {
						if($(this).val() != "" && $("select[name=edit_nama_item]").val() != "" && $("select[name=edit_jumlah_item]").val() != "" && $("input[name='edit_harga_jual']").val() && $("input[name='edit_total_harga_item']").val()) {
							$("button#finance_btn_edit").removeAttr("disabled");
						} else {
							$("button#finance_btn_edit").attr("disabled", "disabled");
						}
					});

					$("input[name='edit_total_harga_item']").on("input", function() {
						if($(this).val() != "" && $("select[name=edit_nama_item]").val() != "" && $("select[name=edit_jumlah_item]").val() != "" && $("input[name='edit_harga_jual']").val() && $("input[name='edit_potongan_harga_item']").val()) {
							$("button#finance_btn_edit").removeAttr("disabled");
						} else {
							$("button#finance_btn_edit").attr("disabled", "disabled");
						}
					});
					// end modal form edit validation

						var hg = 0;
						var ji = 0;
						var percent = 100;
					$("input#harga_jual").on("input", function() {
						hg = $(this).val();
						var has = ((hg * ji) * percent / 100);
						var hasi = (hg * ji) - hasi;
						$("input[name=total_harga_item]").val(hasi);
					});

					$("input#jumlah_item").on("input", function() {
						ji = $(this).val();
						var has = ((hg * ji) * percent / 100);
						var hasi = (hg * ji) - has;
						$("input[name=total_harga_item]").val(hasi);
					});

					$("input#potongan_harga_item").on('input', function() {
						percent = $(this).val();
						var has = ((hg * ji) * percent / 100);
						var hasi = (hg * ji) - has;
						$("input[name=total_harga_item]").val(hasi);
					});

					$('#finance_btn_tambah').click(function(e) {

						var kode_item = $("select[name=nama_item] option:selected").val();
						var nama_item = $("select[name=nama_item] option:selected").text();
						var namaitem = nama_item.split(" ");

						var jumlah_item = $("input#jumlah_item").val();
						var satuan = $("input[name=satuan]").val();
						var harga_jual = $("input#harga_jual").val();
						var potongan_harga_item = $("input#potongan_harga_item").val();
						var total_harga_item = $("input[name=total_harga_item]").val();

						subtotal += parseInt(total_harga_item);
						ppn += parseInt(total_harga_item) * 0.10;
						total = subtotal + ppn;

						listitem.push({
							no_invoice_data_invoice_masuk:$("#no_invoice").val(),
							nama:namaitem[0],
							kode:kode_item,
							jumlah:jumlah_item,
							satuan:satuan,
							harga_jual:harga_jual,
							potongan_harga:potongan_harga_item,
							total_harga:total_harga_item
						});

						var table_tbl_list_invoice_masuk = "";
						for(var i = 0;i < listitem.length;i++) {
							table_tbl_list_invoice_masuk += "<tr>";
							table_tbl_list_invoice_masuk += "<td>"+(i+1)+"</td>";
							table_tbl_list_invoice_masuk += "<td>"+listitem[i].nama+"</td>";
							table_tbl_list_invoice_masuk += "<td>"+listitem[i].kode+"</td>";
							table_tbl_list_invoice_masuk += "<td>"+Number(parseInt(listitem[i].jumlah).toFixed(1)).toLocaleString()+"</td>";
							table_tbl_list_invoice_masuk += "<td>Rp."+Number(parseInt(listitem[i].harga_jual).toFixed(1)).toLocaleString()+"</td>";
							table_tbl_list_invoice_masuk += "<td>"+listitem[i].potongan_harga+" %</td>";
							table_tbl_list_invoice_masuk += "<td>Rp."+Number(parseInt(listitem[i].total_harga).toFixed(1)).toLocaleString()+"</td>";
							var btn_edit = "<button type='button' class='btn btn-sm btn-info finance_btn_edit' data-toggle='modal' data-index='"+i+"' data-target='#modal_edit_item' title='Edit Data'> <i class='fa fa-pencil-square'></i></button>";
							var btn_delete = "<button type='button' class='btn btn-sm btn-danger finance_btn_hapus' data-index='"+i+"' data-toggle='modal m-popover' title='Hapus'> <i class='fa fa-trash'></i> </button>";
							table_tbl_list_invoice_masuk += "<td>" + btn_edit + btn_delete + "</td>";
							table_tbl_list_invoice_masuk += "</tr>";
						}
						$("table#tbl_list_invoice_masuk tbody").html(table_tbl_list_invoice_masuk);
						$("span#sub_total").text("Rp."+Number(subtotal.toFixed(1)).toLocaleString());
						$("span#ppn").text("Rp."+ppn);
						$("span#total_tagihan").text("Rp."+Number(total.toFixed(1)).toLocaleString());

						$("select[name=nama_item]").val('').change();
						$("input#jumlah_item").val(0);
						$("select[name=satuan]").val('').change();
						$("input#harga_jual").val(0);
						$("input#potongan_harga_item").val(0);
						$("input#total_harga_item").val("");

						swal("Berhasil!", "data yang anda inputkan telah dimasukkan ke list item barang", "success");
					});

					var edit_total_harga_item_temp1 = 0;
					var edit_total_harga_item_temp2 = 0;

					$(document).on('click','.finance_btn_edit',function() {
						var index = $(this).data("index");
						console.log("index " + index);
						$("input[name=edit_index]").val(index);
						$("select[name=edit_nama_item]").val(listitem[index].kode).change();
						$("input[name=edit_jumlah_item]").val(listitem[index].jumlah).change();
						$("select[name=edit_satuan]").val(listitem[index].satuan).change();
						$("input[name=edit_harga_jual]").val(listitem[index].harga_jual).change();
						$("input[name=edit_potongan_harga_item]").val(listitem[index].potongan_harga).change();
						$("input[name=edit_total_harga_item]").val(listitem[index].total_harga).change();
						edit_total_harga_item_temp1 = listitem[index].total_harga;
						edit_total_harga_item_temp2 = listitem[index].total_harga;
						console.log("edit_total_harga_item_temp1 : " + edit_total_harga_item_temp1);
						console.log("edit_total_harga_item_temp2 : " + edit_total_harga_item_temp2);
					});


					$("input[name=edit_total_harga_item]").on('input',function() {
						edit_total_harga_item_temp2 = $(this).val();
						console.log("edit_total_harga_item_temp2 : " + edit_total_harga_item_temp2);
					});

					$("button#finance_btn_edit").click(function() {

						var index = $("input[name=edit_index]").val();

						var edit_kode_item = $("select[name=edit_nama_item] option:selected").val();
						var edit_nama_item = $("select[name=edit_nama_item] option:selected").text();
						var editnamaitem = edit_nama_item.split(" ");

						var edit_jumlah_item = $("input[name=edit_jumlah_item]").val();
						var edit_satuan = $("select[name=edit_satuan]").val();
						var edit_harga_jual = $("input[name=edit_harga_jual]").val();
						var edit_potongan_harga = $("input[name=edit_potongan_harga_item]").val();

						listitem[index].nama = editnamaitem[0];
						listitem[index].kode = edit_kode_item;
						listitem[index].jumlah = edit_jumlah_item;
						listitem[index].harga = edit_harga_jual;
						listitem[index].potongan_harga = edit_potongan_harga;
						listitem[index].total_harga = edit_total_harga_item_temp2;
						console.log("edit_total_harga_item_temp1 : " + edit_total_harga_item_temp1);
						console.log("edit_total_harga_item_temp2 : " + edit_total_harga_item_temp2);

						if(edit_total_harga_item_temp1 == edit_total_harga_item_temp2) {
							var edit_table_tbl_list_invoice_masuk0 = "";
							for(var i = 0;i < listitem.length;i++) {
								edit_table_tbl_list_invoice_masuk0 += "<tr>";
								edit_table_tbl_list_invoice_masuk0 += "<td>"+(i+1)+"</td>";
								edit_table_tbl_list_invoice_masuk0 += "<td>"+listitem[i].nama+"</td>";
								edit_table_tbl_list_invoice_masuk0 += "<td>"+listitem[i].kode+"</td>";
								edit_table_tbl_list_invoice_masuk0 += "<td>"+Number(parseInt(listitem[i].jumlah).toFixed(1)).toLocaleString()+"</td>";
								edit_table_tbl_list_invoice_masuk0 += "<td>Rp."+Number(parseInt(listitem[i].harga_jual).toFixed(1)).toLocaleString()+"</td>";
								edit_table_tbl_list_invoice_masuk0 += "<td>"+listitem[i].potongan_harga+" %</td>";
								edit_table_tbl_list_invoice_masuk0 += "<td>Rp."+Number(parseInt(listitem[i].total_harga).toFixed(1)).toLocaleString()+"</td>";
								var btn_edit = "<button type='button' class='btn btn-sm btn-info finance_btn_edit' data-toggle='modal' data-index='"+i+"' data-target='#modal_edit_item' title='Edit Data'> <i class='fa fa-pencil-square'></i></button>";
								var btn_delete = "<button type='button' class='btn btn-sm btn-danger finance_btn_hapus' data-index='"+i+"' data-toggle='modal m-popover' title='Hapus'> <i class='fa fa-trash'></i> </button>";
								edit_table_tbl_list_invoice_masuk0 += "<td>" + btn_edit + btn_delete + "</td>";
								edit_table_tbl_list_invoice_masuk0 += "</tr>";
							}
							$("table#tbl_list_invoice_masuk tbody").html(edit_table_tbl_list_invoice_masuk0);
						} else if(edit_total_harga_item_temp1 > edit_total_harga_item_temp2) {

							subtotal -= (parseInt(edit_total_harga_item_temp1) - parseInt(edit_total_harga_item_temp2));
							ppn -= (parseInt(edit_total_harga_item_temp1) - parseInt(edit_total_harga_item_temp2)) * 0.10;
							total = subtotal + ppn;
							$("span#sub_total").text("Rp."+Number(subtotal.toFixed(1)).toLocaleString());
							$("span#ppn").text("Rp."+ppn);
							$("span#total_tagihan").text("Rp."+Number(total.toFixed(1)).toLocaleString());

							var edit_table_tbl_list_invoice_masuk1 = "";
							for(var i = 0;i < listitem.length;i++) {
								edit_table_tbl_list_invoice_masuk1 += "<tr>";
								edit_table_tbl_list_invoice_masuk1 += "<td>"+(i+1)+"</td>";
								edit_table_tbl_list_invoice_masuk1 += "<td>"+listitem[i].nama+"</td>";
								edit_table_tbl_list_invoice_masuk1 += "<td>"+listitem[i].kode+"</td>";
								edit_table_tbl_list_invoice_masuk1 += "<td>"+Number(parseInt(listitem[i].jumlah).toFixed(1)).toLocaleString()+"</td>";
								edit_table_tbl_list_invoice_masuk1 += "<td>Rp."+Number(parseInt(listitem[i].harga_jual).toFixed(1)).toLocaleString()+"</td>";
								edit_table_tbl_list_invoice_masuk1 += "<td>"+listitem[i].potongan_harga+" %</td>";
								edit_table_tbl_list_invoice_masuk1 += "<td>Rp."+Number(parseInt(listitem[i].total_harga).toFixed(1)).toLocaleString()+"</td>";
								var btn_edit = "<button type='button' class='btn btn-sm btn-info finance_btn_edit' data-toggle='modal' data-index='"+i+"' data-target='#modal_edit_item' title='Edit Data'> <i class='fa fa-pencil-square'></i></button>";
								var btn_delete = "<button type='button' class='btn btn-sm btn-danger finance_btn_hapus' data-index='"+i+"' data-toggle='modal m-popover' title='Hapus'> <i class='fa fa-trash'></i> </button>";
								edit_table_tbl_list_invoice_masuk1 += "<td>" + btn_edit + btn_delete + "</td>";
								edit_table_tbl_list_invoice_masuk1 += "</tr>";
							}
							$("table#tbl_list_invoice_masuk tbody").html(edit_table_tbl_list_invoice_masuk1);

						} else if(edit_total_harga_item_temp1 < edit_total_harga_item_temp2) {

							subtotal += (parseInt(edit_total_harga_item_temp2) - parseInt(edit_total_harga_item_temp1));
							ppn += (parseInt(edit_total_harga_item_temp2) - parseInt(edit_total_harga_item_temp1)) * 0.10;
							total = subtotal + ppn;
							$("span#sub_total").text("Rp."+Number(subtotal.toFixed(1)).toLocaleString());
							$("span#ppn").text("Rp."+ppn);
							$("span#total_tagihan").text("Rp."+Number(total.toFixed(1)).toLocaleString());

							var edit_table_tbl_list_invoice_masuk1 = "";
							for(var i = 0;i < listitem.length;i++) {
								edit_table_tbl_list_invoice_masuk1 += "<tr>";
								edit_table_tbl_list_invoice_masuk1 += "<td>"+(i+1)+"</td>";
								edit_table_tbl_list_invoice_masuk1 += "<td>"+listitem[i].nama+"</td>";
								edit_table_tbl_list_invoice_masuk1 += "<td>"+listitem[i].kode+"</td>";
								edit_table_tbl_list_invoice_masuk1 += "<td>"+Number(parseInt(listitem[i].jumlah).toFixed(1)).toLocaleString()+"</td>";
								edit_table_tbl_list_invoice_masuk1 += "<td>Rp."+Number(parseInt(listitem[i].harga).toFixed(1)).toLocaleString()+"</td>";
								edit_table_tbl_list_invoice_masuk1 += "<td>"+listitem[i].potongan_harga+" %</td>";
								edit_table_tbl_list_invoice_masuk1 += "<td>Rp."+Number(parseInt(listitem[i].total_harga).toFixed(1)).toLocaleString()+"</td>";
								var btn_edit = "<button type='button' class='btn btn-sm btn-info finance_btn_edit' data-toggle='modal' data-index='"+i+"' data-target='#modal_edit_item' title='Edit Data'> <i class='fa fa-pencil-square'></i></button>";
								var btn_delete = "<button type='button' class='btn btn-sm btn-danger finance_btn_hapus' data-index='"+i+"' data-toggle='modal m-popover' title='Hapus'> <i class='fa fa-trash'></i> </button>";
								edit_table_tbl_list_invoice_masuk1 += "<td>" + btn_edit + btn_delete + "</td>";
								edit_table_tbl_list_invoice_masuk1 += "</tr>";
							}
							$("table#tbl_list_invoice_masuk tbody").html(edit_table_tbl_list_invoice_masuk1);
						}

						edit_total_harga_item_temp1 = 0;
						edit_total_harga_item_temp2 = 0;
						console.log(edit_total_harga_item_temp1);
						console.log(edit_total_harga_item_temp2);
					});

					$(document).on('click','.finance_btn_hapus', function() {
						var index = $(this).data("index");

						var temp_subtotal = parseInt(listitem[index].total_harga);
						var temp_ppn = parseInt(listitem[index].total_harga) * 0.10;
						var temp_total = temp_subtotal + temp_ppn;

						subtotal -= temp_subtotal;
						ppn -= temp_ppn;
						total -= temp_total;

						$("span#sub_total").text("Rp."+Number(subtotal.toFixed(1)).toLocaleString());
						$("span#ppn").text("Rp."+ppn);
						$("span#total_tagihan").text("Rp."+Number(total.toFixed(1)).toLocaleString());

						listitem.splice(index,1);
						var new_table_tbl_list_invoice_masuk = "";
						for(var i = 0;i < listitem.length;i++) {
							new_table_tbl_list_invoice_masuk += "<tr>";
							new_table_tbl_list_invoice_masuk += "<td>"+(i+1)+"</td>";
							new_table_tbl_list_invoice_masuk += "<td>"+listitem[i].nama+"</td>";
							new_table_tbl_list_invoice_masuk += "<td>"+listitem[i].kode+"</td>";
							new_table_tbl_list_invoice_masuk += "<td>"+Number(parseInt(listitem[i].jumlah).toFixed(1)).toLocaleString()+"</td>";
							new_table_tbl_list_invoice_masuk += "<td>Rp."+Number(parseInt(listitem[i].harga_jual).toFixed(1)).toLocaleString()+"</td>";
							new_table_tbl_list_invoice_masuk += "<td>"+listitem[i].potongan_harga+" %</td>";
							new_table_tbl_list_invoice_masuk += "<td>Rp."+Number(parseInt(listitem[i].total_harga).toFixed(1)).toLocaleString()+"</td>";
							var btn_edit = "<button type='button' class='btn btn-sm btn-info finance_btn_edit' data-toggle='modal' data-index='"+i+"' data-target='#modal_edit_item' title='Edit Data'> <i class='fa fa-pencil-square'></i></button>";
							var btn_delete = "<button type='button' class='btn btn-sm btn-danger finance_btn_hapus' data-index='"+i+"' data-toggle='modal m-popover' title='Hapus'> <i class='fa fa-trash'></i> </button>";
							new_table_tbl_list_invoice_masuk += "<td>" + btn_edit + btn_delete + "</td>";
							new_table_tbl_list_invoice_masuk += "</tr>";
						}
						$("table#tbl_list_invoice_masuk tbody").html(new_table_tbl_list_invoice_masuk);

					});

				<?php }

				if($data['route'] == "finance/invoice/masuk/rincian/(:num)") { ?>
					$("li#invoice_masuk").addClass("m-menu__item--active");
					$("table#tbl_list_invoice_masuk tbody").html("");
				<?php }

				if($data['route'] == "finance/invoice/keluar/barang") { ?>
					$("li#invoice_keluar").addClass("m-menu__item--submenu m-menu__item--open m-menu__item--expanded");
					$("li#invoice_keluar_barang").addClass("m-menu__item--active");
				<?php }

				if($data['route'] == "finance/invoice/keluar/material") { ?>
					$("li#invoice_keluar").addClass("m-menu__item--submenu m-menu__item--open m-menu__item--expanded");
					$("li#invoice_keluar_material").addClass("m-menu__item--active");

				<?php }

				if($data['route'] == "finance/penawaran") { ?>
					$("li#offer").addClass("m-menu__item--active");

				<?php }

				if($data['route'] == "finance/stock") { ?>
					$("li#stock").addClass("m-menu__item--active");

				var tbl_list_stock_gudang_kantor = $('#tbl_list_stock_gudang_kantor').mDatatable({
				data: {
					saveState: {cookie: false},
					type: 'remote',
			        source: {
			          read: {
			            // sample GET method
			            method: 'POST',
			            url: '<?=site_url()?>finance/stock/getdatakantor',
			            // url: '<?=site_url()?>finance/stock/getdatatoko',
			            map: function(raw) {
			              // sample data mapping
			              var dataSet = raw;
			              if (typeof raw.data !== 'undefined') {
			                dataSet = raw.data;
			              }
			              return dataSet;
			            },
			          },
			        },
			        pageSize: 10,
			        serverPaging: true,
			        serverFiltering: true,
			        serverSorting: true,
			    },
				// layout definition
				layout: {
					theme: 'default', // datatable theme
					class: '', // custom wrapper class
					scroll: true, // enable/disable datatable scroll both horizontal and vertical when needed.
					// height: 450, // datatable's body's fixed height
					footer: false // display/hide footer
				},

				// column sorting
				sortable: true,
				search: {
					input: $('#generalSearch'),
				},
				columns: [

				{
					field: "no",
					template: function(data, type, row, meta) {
						return data.getIndex() + 1;
					},
					textAlign: 'center',
				},
				{
					field: 'kategori',
					textAlign: 'center',
				},
				{
					field: 'kode',
					textAlign: 'center',
				},
				{
					field: 'nama',
					textAlign: 'center',
				},
				{
					field: 'tipe',
					textAlign: 'center'
				},
				{
					field: 'merk',
					textAlign: 'center',
				},
				{
					field: 'stock',
					textAlign: 'center',
				},
				{
					field: 'satuan',
					textAlign: 'center',
				},
				{
					field: 'status',
					textAlign: 'center',
					template: function(data, type, row, meta) {
						var html = "";
						if(data.stock > 7) {
							html = "Tersedia";
						}  else if(data.stock <= 7) {
							html = "Hampir Habis";
						} else if(data.stock == 0) {
							html = "Habis";
						}
						return html;
					},
				},
				{
					field: 'keterangan',
					textAlign: 'center',
				},
				{
					field: 'aksi',
					textAlign: 'center',
					template:function(data) {
var html = "<a href='<?= base_url() ?>finance/stock/rincian/"+data.kode+"' class=\"btn btn-sm btn-primary\" style=\"color:white; width:80px;\">Rincian</a>";
						return html;
					}
				}

				],
			});



var tbl_list_stock_gudang_kantor = $('#tbl_list_stock_gudang_toko').mDatatable({
				data: {
					saveState: {cookie: false},
					type: 'remote',
			        source: {
			          read: {
			            // sample GET method
			            method: 'POST',
			            url: '<?=site_url()?>finance/stock/getdatatoko',
			            // url: '<?=site_url()?>finance/stock/getdatatoko',
			            map: function(raw) {
			              // sample data mapping
			              var dataSet = raw;
			              if (typeof raw.data !== 'undefined') {
			                dataSet = raw.data;
			              }
			              return dataSet;
			            },
			          },
			        },
			        pageSize: 10,
			        serverPaging: true,
			        serverFiltering: true,
			        serverSorting: true,
			    },
				// layout definition
				layout: {
					theme: 'default', // datatable theme
					class: '', // custom wrapper class
					scroll: true, // enable/disable datatable scroll both horizontal and vertical when needed.
					// height: 450, // datatable's body's fixed height
					footer: false // display/hide footer
				},

				// column sorting
				sortable: true,
				search: {
					input: $('#generalSearch'),
				},
				columns: [

				{
					field: "no",
					template: function(data, type, row, meta) {
						return data.getIndex() + 1;
					},
					textAlign: 'center',
				},
				{
					field: 'kategori',
					textAlign: 'center',
				},
				{
					field: 'kode',
					textAlign: 'center',
				},
				{
					field: 'nama',
					textAlign: 'center',
				},
				{
					field: 'tipe',
					textAlign: 'center'
				},
				{
					field: 'merk',
					textAlign: 'center',
				},
				{
					field: 'stock',
					textAlign: 'center',
				},
				{
					field: 'satuan',
					textAlign: 'center',
				},
				{
					field: 'status',
					textAlign: 'center',
					template: function(data, type, row, meta) {
						var html = "";
						if(data.stock > 7) {
							html = "Tersedia";
						}  else if(data.stock <= 7) {
							html = "Hampir Habis";
						} else if(data.stock == 0) {
							html = "Habis";
						}
						return html;
					},
				},
				{
					field: 'keterangan',
					textAlign: 'center',
				},
				{
					field: 'aksi',
					textAlign: 'center',
					template:function(data) {
var html = "<a href='<?= base_url() ?>finance/stock/rincian/"+data.kode+"' class=\"btn btn-sm btn-primary\" style=\"color:white; width:80px;\">Rincian</a>";
						return html;
					}
				}

				],
			});

				<?php } if($data['route'] == "finance/stock/rincian/(:num)") { ?>
						$("li#stock").addClass("m-menu__item--active");

var tbl_rincian_stock = $('#tbl_rincian_stock').mDatatable({
				data: {
					saveState: {cookie: false},
					/*type: 'remote',
			        source: {
			          read: {
			            // sample GET method
			            method: 'GET',
			            url: 'https://keenthemes.com/metronic/preview/inc/api/datatables/demos/default.php',
			            map: function(raw) {
			              // sample data mapping
			              var dataSet = raw;
			              if (typeof raw.data !== 'undefined') {
			                dataSet = raw.data;
			              }
			              return dataSet;
			            },
			          },
			        },
			        pageSize: 10,
			        serverPaging: true,
			        serverFiltering: true,
			        serverSorting: true,*/
			    },
				// layout definition
				layout: {
					theme: 'default', // datatable theme
					class: '', // custom wrapper class
					scroll: true, // enable/disable datatable scroll both horizontal and vertical when needed.
					// height: 450, // datatable's body's fixed height
					footer: false // display/hide footer
				},

				// column sorting
				sortable: false,
				search: {
					input: $('#generalSearch'),
				},
				columns: [

				{
					field: 'No',
					textAlign: 'center',
					width: 50
				},
				{
					field: 'Tanggal',
					textAlign: 'center',
					type:'date',
					format: 'DD/MM/YYYY',
				},
				{
					field: 'No Surat Jalan',
					textAlign: 'center',
				},
				{
					field: 'Pemesan',
					textAlign: 'center',
				},
				{
					field: 'Masuk',
					textAlign: 'center',
				},
				{
					field: 'Keluar',
					textAlign: 'center',
				},
				{
					field: 'Sisa',
					textAlign: 'center',
				}

				],
			});

				<?php } if($data['route'] == "finance/stock/rincian_barang/(:num)") { ?>
					$("li#stock").addClass("m-menu__item--active");

				var tbl_rincian_stock = $('#tbl_rincian_stock').mDatatable({
				data: {
					saveState: {cookie: false},
					/*type: 'remote',
			        source: {
			          read: {
			            // sample GET method
			            method: 'GET',
			            url: 'https://keenthemes.com/metronic/preview/inc/api/datatables/demos/default.php',
			            map: function(raw) {
			              // sample data mapping
			              var dataSet = raw;
			              if (typeof raw.data !== 'undefined') {
			                dataSet = raw.data;
			              }
			              return dataSet;
			            },
			          },
			        },
			        pageSize: 10,
			        serverPaging: true,
			        serverFiltering: true,
			        serverSorting: true,*/
			    },
				// layout definition
				layout: {
					theme: 'default', // datatable theme
					class: '', // custom wrapper class
					scroll: true, // enable/disable datatable scroll both horizontal and vertical when needed.
					// height: 450, // datatable's body's fixed height
					footer: false // display/hide footer
				},

				// column sorting
				sortable: false,
				search: {
					input: $('#generalSearch'),
				},
				columns: [
				{
					field: 'Tanggal Masuk',
					textAlign: 'center',
					type:'date',
					format: 'DD/MM/YYYY',
				},
				{
					field: 'Tanggal Keluar',
					textAlign: 'center',
					type:'date',
					format: 'DD/MM/YYYY',
				},
					{
					field: 'No Seri',
					textAlign: 'center',
				}


				],
			});

				<?php } if($data['route'] == "finance/price") { ?>

					$("li#price").addClass("m-menu__item--active");

				<?php }

				# END FINANCE

				# KANTOR

				if($data['route'] == "kantor") { ?>
					$("li#dashboard").addClass("m-menu__item--active");

				<?php }

				if($data['route'] == "kantor/customer") { ?>
					$("li#customer").addClass("m-menu__item--active");

					var tbl_list_pelanggan = $('#tbl_list_pelanggan').mDatatable({
						data: {
							saveState: {cookie: false},
							type: 'remote',
							source: {
							  read: {
								// sample GET method
								method: 'POST',
								url: "<?=site_url()?>kantor/customer/getdata",
								// url: "https://projects.upanastudio.com/ptssm/app/kantor/customer/getdata",
								map: function(raw) {
								  // sample data mapping
								  var dataSet = raw;
								  if (typeof raw.data !== 'undefined') {
									dataSet = raw.data;
								  }
								  return dataSet;
								},
							  },
							},
							pageSize: 10,
							serverPaging: true,
							serverFiltering: true,
							serverSorting: true,
							orderable: true,
							targets: 0
						},
						// layout definition
						layout: {
							theme: 'default', // datatable theme
							class: '', // custom wrapper class
							scroll: true, // enable/disable datatable scroll both horizontal and vertical when needed.
							// height: 450, // datatable's body's fixed height
							footer: false // display/hide footer
						},

						// column sorting
						sortable: false,
						search: {
							input: $('#generalSearch'),
						},
						columns: [
						{
							field: "no",
							template: function(data, type, row, meta) {
								return data.getIndex() + 1;
							},
							textAlign: "center",
						},
						{
							field: "id",
							textAlign: "center",
						},
						{
							field: 'nama',
							textAlign: "center"
						},
						{
							field: 'telepon',
							textAlign: "center"
						},
						{
							field: 'alamat',
							textAlign: "center"
						},
						{
							field: 'aksi',
							template: function(row) {
								var html = "<a href='<?= base_url() ?>kantor/customer/rincian/" + row.id + "' class='btn btn-sm btn-primary'  style='color:white;'><i class='fa fa-address-book-o'></i> Rincian</a> <a href='<?= base_url() ?>kantor/customer/edit/" + row.id + "' class='btn btn-sm btn-info ' tyle='color:white;'><i class='fa fa-pencil-square'></i> Edit</a>";
								return html;
							},
							textAlign: "center"
						}

						],
					});
				<?php } if($data['route'] == "kantor/customer/tambah") { ?>
					$("li#customer").addClass("m-menu__item--active");

					$("input[name='nama_pelanggan']").on("change", function() {
						if($(this).val() != "" && $("input[name=telepon_pelanggan]").val() != "" && $("input[name=alamat_pelanggan]").val() != "" && $("input[name='tipe_pelanggan']").is(":checked") == true) {
							$("button#btn_tambah_data_pelanggan").removeAttr("disabled");
						} else {
							$("button#btn_tambah_data_pelanggan").attr("disabled", "disabled");
						}
					});

					$("input[name='telepon_pelanggan']").on("change", function(){
						if($(this).val() != "" && $("input[name=nama_pelanggan]").val() != "" && $("input[name=alamat_pelanggan]").val() != "" && $("input[name='tipe_pelanggan']").is(":checked") == true) {
							$("button#btn_tambah_data_pelanggan").removeAttr("disabled");
						} else {
							$("button#btn_tambah_data_pelanggan").attr("disabled", "disabled");
						}
					});

					$("input[name='alamat_pelanggan']").on("change", function() {
						if($(this).val() != "" && $("input[name=nama_pelanggan]").val() != "" && $("input[name=telepon_pelanggan]").val() != "" && $("input[name='tipe_pelanggan']").is(":checked") == true) {
							$("button#btn_tambah_data_pelanggan").removeAttr("disabled");
						} else {
							$("button#btn_tambah_data_pelanggan").attr("disabled", "disabled");
						}
					});

					$('#btn_tambah_data_pelanggan').click(function(e) {
						var tipe_pelanggan = $("input[name=tipe_pelanggan]:checked").val();

							swal({
							title: 'Apakah anda yakin ingin menambah data pelanggan?',
							type: 'warning',
							showCancelButton: true,
							confirmButtonText: 'Ya, Tambahkan!'
							}).then(function(result) {
								if (result.value) {

									$.ajax({
										url:"<?= base_url() ?>kantor/customer/tambahsubmit",
										type:"post",
										data:{
											id:$("#id_pelanggan").val(),
											nama:$("#nama_pelanggan").val(),
											telepon:$("#telepon_pelanggan").val(),
											alamat:$("#alamat_pelanggan").val(),
											tipe:tipe_pelanggan
										},
										dataType:"json"
									}).done(function(res) {
										swal(
											res.title,
											res.message,
											res.status
										).then(function(result) {
											document.location = "<?= base_url() ?>kantor/customer";
										});
									}).fail(function(res) {
										console.log(res);
									});

								}
							});


					});
				<?php } if($data['route'] == "kantor/customer/edit/(:num)") { ?>
						$("li#customer").addClass("m-menu__item--active");

						$("input[name='nama_pelanggan']").on("change", function() {
							if($(this).val() != "" && $("input[name=telepon_pelanggan]").val() != "" && $("input[name=alamat_pelanggan]").val() != "") {
								$("button#btn_edit_data_pelanggan").removeAttr("disabled");
							} else {
								$("button#btn_edit_data_pelanggan").attr("disabled", "disabled");
							}
						});

						$("input[name='telepon_pelanggan']").on("change", function(){
							if($(this).val() != "" && $("input[name=nama_pelanggan]").val() != "" && $("input[name=alamat_pelanggan]").val() != "") {
								$("button#btn_edit_data_pelanggan").removeAttr("disabled");
							} else {
								$("button#btn_edit_data_pelanggan").attr("disabled", "disabled");
							}
						});

						$("input[name='alamat_pelanggan']").on("change", function() {
							if($(this).val() != "" && $("input[name=nama_pelanggan]").val() != "" && $("input[name=telepon_pelanggan]").val() != "") {
								$("button#btn_edit_data_pelanggan").removeAttr("disabled");
							} else {
								$("button#btn_edit_data_pelanggan").attr("disabled", "disabled");
							}
						});

						$('#btn_edit_data_pelanggan').click(function(e) {
							swal({
								title: 'Apakah anda yakin ingin mengedit data pelanggan?',
								type: 'warning',
								showCancelButton: true,
								confirmButtonText: 'Ya, Edit!'
							}).then(function(result) {
								if (result.value) {


									$.ajax({
										url:"<?= base_url() ?>kantor/customer/editsubmit",
										type:"post",
										data:{
											id:$("#id_pelanggan").val(),
											nama:$("#nama_pelanggan").val(),
											telepon:$("#telepon_pelanggan").val(),
											alamat:$("#alamat_pelanggan").val()
										},
										dataType:"json"
									}).done(function(res) {
										swal(
											res.title,
											res.message,
											res.status
										).then(function(result) {
											document.location = "<?= base_url() ?>kantor/customer";
										});
									}).fail(function(res) {
										console.log(res);
									});


								}
							});
						});
				<?php } if($data['route'] == "kantor/customer/rincian/(:num)") { ?>
					$("li#customer").addClass("m-menu__item--active");
					var id = "<?php echo $data['id'] ?>";
					var tbl_item_ac = $('#tbl_item_ac').mDatatable({
				data: {
					saveState: {cookie: false},
							type: 'remote',
							source: {
							  read: {
								// sample GET method
								method: 'GET',
								url: '<?=site_url()?>kantor/customer/getdataac/' + id,
								// url: 'https://projects.upanastudio.com/ptssm/app/kantor/customer/getdataac/' + id,
								map: function(raw) {
								  // sample data mapping
								  var dataSet = raw;
								  if (typeof raw.data !== 'undefined') {
									dataSet = raw.data;
								  }
								  return dataSet;
								},
							  },
							},
							pageSize: 10,
							serverPaging: true,
							serverFiltering: true,
							serverSorting: true,
						},
						// layout definition
						layout: {
							theme: 'default', // datatable theme
							class: '', // custom wrapper class
							scroll: true, // enable/disable datatable scroll both horizontal and vertical when needed.
							// height: 450, // datatable's body's fixed height
							footer: false // display/hide footer
						},

						// column sorting
						sortable: true,
						search: {
							input: $('#generalSearch'),
						},
						columns: [
						{
							field: "no",
							template: function(data, type, row, meta) {
								return data.getIndex() + 1;
							},
							textAlign: "center",
						},
						{
							field: 'id',
							textAlign: 'center',
						},
						{
							field: 'nama',
							textAlign: 'center',
						},
						{
							field: 'tipe',
							textAlign: 'center',
						},
						{
							field: 'merk',
							textAlign: 'center',
						},
						{
							field: 'aksi',
							textAlign: "center",
							template: function(data) {
								var html = "<button onclick=\"window.location.href='print_rincian_pelanggan.html'\" class='btn btn-primary '> <i class='fa fa-print'> </i></button> <button  class='btn btn-info' data-toggle='modal' data-target='#modal_edit_item'>Edit</button> <button  class='btn btn-danger' data-toggle='modal' data-target='#modal_edit_item' > <i class='fa fa-trash'></i></button>";
								return html;
							}
						}

						],
					});

				<?php } if($data['route'] == "kantor/customer/riwayat/(:num)") { ?>
					$("li#customer").addClass("m-menu__item--active");

				<?php } if($data['route'] == "kantor/order/spk-pemasangan") { ?>
					$("li#order").addClass("m-menu__item--submenu m-menu__item--open m-menu__item--expanded");
					$("li#spk-pemasangan").addClass("m-menu__item--active");


			var tbl_spk_pemasangan = $('#tbl_spk_pemasangan').mDatatable({
				data: {
					saveState: {cookie: false},
					type: 'remote',
			        source: {
			          read: {
			            method: 'POST',
			            url: '<?= site_url() ?>spk-pemasangan/getdata',
			            map: function(raw) {
			              // sample data mapping
			              var dataSet = raw;
			              if (typeof raw.data !== 'undefined') {
			                dataSet = raw.data;
			              }
			              return dataSet;
			            },
			          },
			        },
			        pageSize: 10,
			        serverPaging: true,
			        serverFiltering: true,
			        serverSorting: true,
			    },
				// layout definition
				layout: {
					theme: 'default', // datatable theme
					class: '', // custom wrapper class
					scroll: true, // enable/disable datatable scroll both horizontal and vertical when needed.
					// height: 450, // datatable's body's fixed height
					footer: false // display/hide footer
				},

				// column sorting
				sortable: false,
				search: {
					input: $('#generalSearch'),
				},
				columns: [

				{
					field: 'no',
					textAlign: 'center',
					template: function(data, type, row, meta) {
						return data.getIndex() + 1;
					}
				},
				{
					field: 'tanggal',
					textAlign: 'center',
					type:'date',
					template: function(data, type, row, meta) {
						var tanggal = data.tanggal.split("-");
						return tanggal[2] + "-" + tanggal[1] + "-" + tanggal[0];
					}
				},
				{
					field: 'no_spk',
					textAlign: 'center',

				},
				{
					field: 'nama_pelanggan',
					textAlign: 'center',
				},
				{
					field: 'telepon',
					textAlign: 'center',
				},
				{
					field: 'status',
					textAlign: 'center',
				},
				{
					field: 'aksi',
					textAlign: 'center',
					template: function(data) {
						var btnedit = "<a href='<?= site_url() ?>kantor/order/spk-pemasangan/edit/"+data.no_spk+"' class='btn btn-sm btn-info' style='color:white; width:70px;'>Edit</a>";
						var btnrincian = "<a href='' class='btn btn-sm btn-primary' style='color:white; width:70px;'>Rincian</a>";
						return btnrincian + " " + btnedit;
					}
				}

				],
			});



				<?php } if($data['route'] == "kantor/order/spk-pemasangan/tambah") { ?>
					$("li#order").addClass("m-menu__item--submenu m-menu__item--open m-menu__item--expanded");
					$("li#spk-pemasangan").addClass("m-menu__item--active");

					var item = [];

					$("select[name='nama_barang_modal']").on("change", function() {
						if($(this).val() != "" && $("input[name=jumlah_barang]").val() != "") {
							$("button#btn_tambah_pemasangan").removeAttr("disabled");
						} else {
							$("button#btn_tambah_pemasangan").attr("disabled", "disabled");
						}
					});

					$("input[name='jumlah_barang']").on("input", function() {
						if($(this).val() != "" && $("select[name=nama_barang_modal]").val() != "") {
							$("button#btn_tambah_pemasangan").removeAttr("disabled");
						} else {
							$("button#btn_tambah_pemasangan").attr("disabled", "disabled");
						}
					});



					// Simpan Validation

					$("select#tipe_pajak").on("change", function() {
						if($(this).val() != "" && $("input#no_spk").val() != "" && $("input#tanggal_pembuatan_spk").val() != "" && $("select[name=nama_pelanggan]").val() != "" && $("input#tgl_mulai").val() != "" && $("input[name=catatan]").val() != "" && $("select[name=status]").val() != "") {
							$("button#btn_terbitkan_spk").removeAttr("disabled");
						} else {
							$("button#btn_terbitkan_spk").attr("disabled", "disabled");
						}
					});

					$("input#no_spk").on("input", function() {
						if($(this).val() != "" && $("select#tipe_pajak").val() != "" && $("input#tanggal_pembuatan_spk").val() != "" && $("select[name=nama_pelanggan]").val() != "" && $("input#tgl_mulai").val() != "" && $("input[name=catatan]").val() != "" && $("select[name=status]").val() != "") {
							$("button#btn_terbitkan_spk").removeAttr("disabled");
						} else {
							$("button#btn_terbitkan_spk").attr("disabled", "disabled");
						}
					});

					$("input#tanggal_pembuatan_spk").on("input", function() {
						if($(this).val() != "" && $("select#tipe_pajak").val() != "" && $("input#no_spk").val() != "" && $("select[name=nama_pelanggan]").val() != "" && $("input#tgl_mulai").val() != "" && $("input[name=catatan]").val() != "" && $("select[name=status]").val() != "") {
							$("button#btn_terbitkan_spk").removeAttr("disabled");
						} else {
							$("button#btn_terbitkan_spk").attr("disabled", "disabled");
						}
					});

					$("select[name=nama_pelanggan]").on("change", function() {
						if($(this).val() != "" && $("input#no_spk").val() != "" && $("input#tanggal_pembuatan_spk").val() != "" && $("select#tipe_pajak").val() != "" && $("input#tgl_mulai").val() != "" && $("input[name=catatan]").val() != "" && $("select[name=status]").val() != "") {
							$("button#btn_terbitkan_spk").removeAttr("disabled");
						} else {
							$("button#btn_terbitkan_spk").attr("disabled", "disabled");
						}
					});


					$("input#tgl_mulai").on("input", function() {
						if($(this).val() != "" && $("select#tipe_pajak").val() != "" && $("input#no_spk").val() != "" && $("select[name=nama_pelanggan]").val() != "" && $("input#tanggal_pembuatan_spk").val() != "" && $("input[name=catatan]").val() != "" && $("select[name=status]").val() != "") {
							$("button#btn_terbitkan_spk").removeAttr("disabled");
						} else {
							$("button#btn_terbitkan_spk").attr("disabled", "disabled");
						}
					});

					$("#catatan").on("input", function() {
						if($(this).val() != "" && $("select#tipe_pajak").val() != "" && $("input#no_spk").val() != "" && $("select[name=nama_pelanggan]").val() != "" && $("input#tanggal_pembuatan_spk").val() != "" && $("input#tgl_mulai").val() != "" && $("select[name=status]").val() != "") {
							$("button#btn_terbitkan_spk").removeAttr("disabled");
						} else {
							$("button#btn_terbitkan_spk").attr("disabled", "disabled");
						}
					});

					$("select[name=status]").on("change", function() {
						if($(this).val() != "" && $("input#no_spk").val() != "" && $("input#tanggal_pembuatan_spk").val() != "" && $("select#tipe_pajak").val() != "" && $("input#tgl_mulai").val() != "" && $("input[name=catatan]").val() != "" && $("select[name=nama_pelanggan]").val() != "") {
							$("button#btn_terbitkan_spk").removeAttr("disabled");
						} else {
							$("button#btn_terbitkan_spk").attr("disabled", "disabled");
						}
					});

					// Simpan Validation


			$(document).on('click','.btn_hapus', function() {
				var index = $(this).data("index");

				swal({
					title: 'Apakah anda yakin menghapus item ini?',
					type: 'warning',
					showCancelButton: true,
					confirmButtonText: 'Ya,Hapus!'
				}).then(function(result) {
					if (result.value) {
						swal(
							'Dihapus!',
							'item telah dihapus dari item pemasangan',
							'success'
							)
					}
				});

				item.splice(index,1);

					var tbl_item_pemasangan_tbody_hapus = "";
					for(var i = 0;i < item.length;i++) {
						var barang = item[i].barang.split("||");
						var kode_barang = barang[0];
						var nama_barang = barang[1];
						tbl_item_pemasangan_tbody_hapus += "<tr>";
						tbl_item_pemasangan_tbody_hapus += "<td>" + (i+1) + "</td>";
						tbl_item_pemasangan_tbody_hapus += "<td>" + kode_barang + "</td>";
						tbl_item_pemasangan_tbody_hapus += "<td>" + nama_barang + "</td>";
						tbl_item_pemasangan_tbody_hapus += "<td>" + item[i].jumlah_barang + "</td>";
						tbl_item_pemasangan_tbody_hapus += "<td>" + item[i].keterangan + "</td>";
						tbl_item_pemasangan_tbody_hapus += "<td><a class='btn btn-sm btn-danger btn_hapus' style='color:white; width:80px;' data-index='"+i+"'>Hapus</a></td>";
						tbl_item_pemasangan_tbody_hapus += "</tr>";
					}

					$("table#tbl_item_pemasangan tbody").html(tbl_item_pemasangan_tbody_hapus);

					swal("Telah di Hapus!", "Data yang anda inputkan telah di hapus", "success");
					console.log(item);

			});

				var Select2 = function() {
				var demos = function() {
				 // basic
				 $('.dropdown_search, .dropdown_search_validate').select2({
				 	placeholder: "Select a state"
				 });
				}
				var modalDemos = function() {
					$('#m_select2_modal').on('shown.bs.modal', function () {
					// basic
						$('.dropdown_search_modal').select2({
							placeholder: "Select a state"
						});
					});
				}
				return {
					init: function() {
						demos();
						modalDemos();
					}
				};
			}();
			//== Initialization
			jQuery(document).ready(function() {
				Select2.init();
			});

			var SweetAlert2Demo = function() {

			//== Demos
			var initDemos = function() {

				$('#btn_terbitkan_spk').click(function(e) {
					if(!confirm('Apakah data yang anda inputkan sudah benar ?')) return false;
					if(item.length == 0) {
						swal("List Item Kosong", "Item Pemasangan Kosong","warning");

					} else {
						$.ajax({
							url:"<?= site_url() ?>spk_pemasangan_submit",
							type:"post",
							data:{
								tipe_pajak:$("select[name=tipe_pajak]").val(),
								no_spk:$("input#no_spk").val(),
								tanggal:$("input#tanggal_pembuatan_spk").val(),
								nama_pelanggan:$("select[name=nama_pelanggan]").val(),
								telepon:$("input[name=no_telpon]").val(),
								email:$("input[name=email_pelanggan]").val(),
								alamat:$("input[name=alamat_pelanggan]").val(),
								waktu_pengerjaan:$("input#tgl_mulai").val(),
								catatan:$("#catatan").val(),
								status:$("select[name=status]").val(),
								item:item
							},
							dataType:"json"
						}).done(function(res) {

							if(res.state) {

								swal({
									title:res.title,
									text:res.message,
									type:res.status,
									confirmButtonText: 'Ok'
									}).then(function(result) {

										if (result.value) {
											document.location = '<?= site_url() ?>kantor/order/spk-pemasangan';
										}
									});

							} else {

								swal({
									title:res.title,
									text:res.message,
									type:res.status,
									confirmButtonText: 'Ok'
								}).then(function(result) {});

							}

						}).fail(function(res) {
							swal("Error", "Terjadi Kesalahan","warning");
							console.log(res);
						});
					}
				});

				$('#btn_tambah_pemasangan').click(function(e) {

					item.push({
						"barang":$("select[name=nama_barang_modal]").val(),
						"jumlah_barang":$("input[name=jumlah_barang]").val(),
						"keterangan":$("#item_keterangan").val()
					});

					var tbl_item_pemasangan_tbody = "";
					for(var i = 0;i < item.length;i++) {
						var barang = item[i].barang.split("||");
						var kode_barang = barang[0];
						var nama_barang = barang[1];
						tbl_item_pemasangan_tbody += "<tr>";
						tbl_item_pemasangan_tbody += "<td>" + (i+1) + "</td>";
						tbl_item_pemasangan_tbody += "<td>" + kode_barang + "</td>";
						tbl_item_pemasangan_tbody += "<td>" + nama_barang + "</td>";
						tbl_item_pemasangan_tbody += "<td>" + item[i].jumlah_barang + "</td>";
						tbl_item_pemasangan_tbody += "<td>" + item[i].keterangan + "</td>";
						tbl_item_pemasangan_tbody += "<td><a class='btn btn-sm btn-danger btn_hapus' style='color:white; width:80px;' data-index='"+i+"'>Hapus</a></td>";
						tbl_item_pemasangan_tbody += "</tr>";
					}

					$("table#tbl_item_pemasangan tbody").html(tbl_item_pemasangan_tbody);

					swal("Telah ditambahkan!", "data yang anda inputkan telah tersimpan", "success");
					console.log(item);
					$("select[name=nama_barang_modal]").val("").change();
					$("input[name=jumlah_barang]").val("");
					$("#item_keterangan").val("");

				});
			};

			return {
					//== Init
					init: function() {
						initDemos();
					},
				};

			}();

			//== Class Initialization
			jQuery(document).ready(function() {
				SweetAlert2Demo.init();
			});


			$("select[name=nama_pelanggan]").change(function() {
					var id = $(this).val();
					$.ajax({
							url:"<?= site_url() ?>getcustomer",
							type:"post",
							data:{
								id:id
							},
							dataType:"json"
						}).done(function(res) {
							$("input[name=no_telpon]").val(res.telepon);
							$("input[name=email_pelanggan]").val(res.email);
							$("input[name=email_pelanggan]").val(res.email);
							$("input[name=alamat_pelanggan]").val(res.alamat);
						}).fail(function(res) {
							console.log(res);
						});
			});

				<?php } if($data['route'] == "kantor/order/spk-pemasangan/edit/(:num)") { ?>

				<?php } if($data['route'] == "kantor/order/spk-service") { ?>

					$("li#order").addClass("m-menu__item--submenu m-menu__item--open m-menu__item--expanded");
					$("li#spk-service").addClass("m-menu__item--active");

				<?php } if($data['route'] == "kantor/order/spk-free") { ?>
					$("li#order").addClass("m-menu__item--submenu m-menu__item--open m-menu__item--expanded");
					$("li#spk-free").addClass("m-menu__item--active");

				<?php } if($data['route'] == "kantor/order/spk-komplain") { ?>
					$("li#order").addClass("m-menu__item--submenu m-menu__item--open m-menu__item--expanded");
					$("li#spk-komplain").addClass("m-menu__item--active");

				<?php } if($data['route'] == "kantor/order/spk-survey") { ?>
					$("li#order").addClass("m-menu__item--submenu m-menu__item--open m-menu__item--expanded");
					$("li#spk-survey").addClass("m-menu__item--active");

				<?php } if($data['route'] == "kantor/penawaran") { ?>
					$("li#offer").addClass("m-menu__item--active");

			var tbl_list_penawaran = $('#tbl_list_penawaran').mDatatable({
				data: {
					saveState: {cookie: false},
					type: 'remote',
			        source: {
			          read: {
			            // sample GET method
			            method: 'POST',
			            url: '<?= site_url() ?>getalldatapenawaran',
			            map: function(raw) {
			              // sample data mapping
			              var dataSet = raw;
			              if (typeof raw.data !== 'undefined') {
			                dataSet = raw.data;
			              }
			              return dataSet;
			            },
			          },
			        },
			        pageSize: 10,
			        serverPaging: true,
			        serverFiltering: true,
			        serverSorting: true,
			    },
				// layout definition
				layout: {
					theme: 'default', // datatable theme
					class: '', // custom wrapper class
					scroll: true, // enable/disable datatable scroll both horizontal and vertical when needed.
					// height: 450, // datatable's body's fixed height
					footer: false // display/hide footer
				},

				// column sorting
				sortable: false,
				search: {
					input: $('#generalSearch'),
				},
				columns: [

				{
					field: 'no',
					textAlign: 'center',
					template: function(data, type, row, meta) {
						return data.getIndex() + 1;
					}
				},
				{
					field: 'tanggal',
					textAlign: 'center',
					template: function(data, type, row, meta) {
						var tanggal = data.tanggal.split("-");
						return tanggal[2] + "/" + tanggal[1] + "/" + tanggal[0];
					}
				},
				{
					field: 'reff',
					textAlign: 'center',
				},
				{
					field: 'penerima',
					textAlign: 'center',
				},
				{
					field: 'perihal',
					textAlign: 'center',
				},
				{
					field: 'aksi',
					textAlign: 'center',
					template: function(data) {
						var html = "<a href='<?= site_url() ?>kantor/penawaran/rincian/"+data.reff+"' class='btn btn-sm btn-primary' style='color:white; width:80px;' >Rincian</a>";
						return html;
					}
				}

				],
			});
				<?php } if($data['route'] == "kantor/penawaran/create") { ?>
					$("li#offer").addClass("m-menu__item--active");
					var data_tambah_item = [];
					var data_tambah_jasa = [];

					var sub_total = 0;
					var total_keseluruhan = 0;

					$("#sub_total").text("Rp."+sub_total.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ","));
					$("#total_keseluruhan").text("Rp."+total_keseluruhan.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ","));

					$("select#tipe_pajak").on("change", function() {
						if($(this).val() != "" && $("input#no_reff").val() != "" && $("input#tanggal_pembuatan_spk").val() != "" && $("input#nama_penerima").val() && $("input#perihal").val()) {
							$("button#btn_buat_penawaran").removeAttr("disabled");
						} else {
							$("button#btn_buat_penawaran").attr("disabled", "disabled");
						}
					});

					$("input#no_reff").on("input", function() {
						if($(this).val() != "" && $("select#tipe_pajak").val() != "" && $("input#tanggal_pembuatan_spk").val() != "" && $("input#nama_penerima").val() && $("input#perihal").val()) {
							$("button#btn_buat_penawaran").removeAttr("disabled");
						} else {
							$("button#btn_buat_penawaran").attr("disabled", "disabled");
						}
					});

					$("input#tanggal_pembuatan_spk").on("input", function() {
						if($(this).val() != "" && $("select#tipe_pajak").val() != "" && $("input#no_reff").val() != "" && $("input#nama_penerima").val() && $("input#perihal").val()) {
							$("button#btn_buat_penawaran").removeAttr("disabled");
						} else {
							$("button#btn_buat_penawaran").attr("disabled", "disabled");
						}
					});


					$("input#nama_penerima").on("input", function() {
						if($(this).val() != "" && $("select#tipe_pajak").val() != "" && $("input#no_reff").val() != "" && $("input#tanggal_pembuatan_spk").val() && $("input#perihal").val()) {
							$("button#btn_buat_penawaran").removeAttr("disabled");
						} else {
							$("button#btn_buat_penawaran").attr("disabled", "disabled");
						}
					});

					$("input#perihal").on("input", function() {
						if($(this).val() != "" && $("select#tipe_pajak").val() != "" && $("input#no_reff").val() != "" && $("input#tanggal_pembuatan_spk").val() && $("input#nama_penerima").val()) {
							$("button#btn_buat_penawaran").removeAttr("disabled");
						} else {
							$("button#btn_buat_penawaran").attr("disabled", "disabled");
						}
					});


					$("select[name=type_penawaran_barang]").change(function() {
						var id = $(this).val();

						$.ajax({
							url:"<?= site_url() ?>kantor/getmodel",
							type:"post",
							data:{id:id},
							dataType:"json"
						}).done(function(res) {
							// x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
							$("input[name=model_stock]").val(res.tipe);
							$("input[name=harga_item]").val(res.kantor);

						}).fail(function(res) {
							console.log(res);
							swal(
							'Terjadi Kesalahan',
							'Mohon Periksa koneksi atau Hubungi Admin',
							'warning'
							)
						});

					});

					$("select[name=type_penawaran_jasa]").change(function() {
						var id = $(this).val();

						$.ajax({
							url:"<?= site_url() ?>kantor/getmodel",
							type:"post",
							data:{id:id},
							dataType:"json"
						}).done(function(res) {

							$("input[name=model_jasa]").val(res.tipe);
							$("input[name=harga_jasa]").val(res.kantor);

						}).fail(function(res) {
							console.log(res);
							swal(
							'Terjadi Kesalahan',
							'Mohon Periksa koneksi atau Hubungi Admin',
							'warning'
							)
						});

					});

			$('.btn_hapus').click(function(e) {
				swal({
					title: 'Apakah anda yakin menghapus item ini?',
					type: 'warning',
					showCancelButton: true,
					confirmButtonText: 'Ya,Hapus!'
				}).then(function(result) {
					if (result.value) {
						swal(
							'Dihapus!',
							'item telah dihapus dari item pemasangan',
							'success'
							)
					}
				});
			});


			$('button#btn_tambah_pemasangan').click(function() {
				$("table#tbl_item_penawaran tbody").html("");

				data_tambah_item.push({
					"type_penawaran_barang":$("select[name=type_penawaran_barang] :selected").val(),
					"model_stock":$("input[name=model_stock]").val(),
					"btu":$("input[name=btu]").val(),
					"daya_listrik":$("input[name=daya_listrik]").val(),
					"harga_item":$("input[name=harga_item]").val(),
					"jumlah_barang":$("input[name=jumlah_barang]").val()
				});

				sub_total += parseInt($("input[name=jumlah_barang]").val()) * parseInt($("input[name=harga_item]").val());
				total_keseluruhan += parseInt($("input[name=jumlah_barang]").val()) * parseInt($("input[name=harga_item]").val());

				$("select[name=type_penawaran_barang]").val("");
				$("input[name=model_stock]").val("");
				$("input[name=btu]").val("");
				$("input[name=daya_listrik]").val("");
				$("input[name=harga_item]").val("");
				$("input[name=jumlah_barang]").val("");

					console.log(data_tambah_item);

					var tbl_item_penawaran = "";
					var no_index_penawaran = 0;
					for (var i = 0; i < data_tambah_item.length; i++) {

						tbl_item_penawaran += "<tr>";
						tbl_item_penawaran += "<td>"+(no_index_penawaran+1)+"</td>";
						tbl_item_penawaran += "<td>"+data_tambah_item[i].type_penawaran_barang+"</td>";
						tbl_item_penawaran += "<td>"+data_tambah_item[i].model_stock+"</td>";
						tbl_item_penawaran += "<td>"+data_tambah_item[i].btu+"</td>";
						tbl_item_penawaran += "<td>"+data_tambah_item[i].daya_listrik+"</td>";
						tbl_item_penawaran += "<td>"+data_tambah_item[i].jumlah_barang+"</td>";
						tbl_item_penawaran += "<td> Rp."+(data_tambah_item[i].harga_item).toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",") + "</td>";
						tbl_item_penawaran += "<td>" + "<button class='btn btn-danger btn_tambah_hapus' data-index='"+no_index_penawaran+"'> <i class='fa fa-trash'></i></button>" + "</td>";


						no_index_penawaran++;

					}

					$("#sub_total").text("Rp."+sub_total.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ","));
					$("#total_keseluruhan").text("Rp."+total_keseluruhan.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ","));

					$("table#tbl_item_penawaran tbody").html(tbl_item_penawaran);

				});

				$(document).on('click','.btn_tambah_hapus', function(e) {
					e.preventDefault();

					var index = $(this).data('index');

					console.log("before:" + sub_total);
					console.log("before:" + total_keseluruhan);

					sub_total -= parseInt(data_tambah_item[index].jumlah_barang) * parseInt(data_tambah_item[index].harga_item);
					total_keseluruhan -= parseInt(data_tambah_item[index].jumlah_barang) * parseInt(data_tambah_item[index].harga_item);

					console.log("after:" +sub_total);
					console.log("after:" +total_keseluruhan);

					data_tambah_item.splice(index,1);
					console.log(data_tambah_item);

					$("#sub_total").text("Rp."+sub_total.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ","));
					$("#total_keseluruhan").text("Rp."+total_keseluruhan.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ","));

					$("table#tbl_item_penawaran tbody").html("");
					var hapus_tbl_item_penawaran = "";
					var hapus_no_index_penawaran = 0;
					for (var i = 0; i < data_tambah_item.length; i++) {

						hapus_tbl_item_penawaran += "<tr>";
						hapus_tbl_item_penawaran += "<td>"+(hapus_no_index_penawaran+1)+"</td>";
						hapus_tbl_item_penawaran += "<td>"+data_tambah_item[i].type_penawaran_barang+"</td>";
						hapus_tbl_item_penawaran += "<td>"+data_tambah_item[i].model_stock+"</td>";
						hapus_tbl_item_penawaran += "<td>"+data_tambah_item[i].btu+"</td>";
						hapus_tbl_item_penawaran += "<td>"+data_tambah_item[i].daya_listrik+"</td>";
						hapus_tbl_item_penawaran += "<td>"+data_tambah_item[i].jumlah_barang+"</td>";
						hapus_tbl_item_penawaran += "<td>"+data_tambah_item[i].harga_item+"</td>";
						hapus_tbl_item_penawaran += "<td>" + "<button class='btn btn-danger btn_tambah_hapus' data-index='"+hapus_no_index_penawaran+"'> <i class='fa fa-trash'></i></button>" + "</td>";

						hapus_no_index_penawaran++;
					}

					$("table#tbl_item_penawaran tbody").html(hapus_tbl_item_penawaran);
				});


				$(document).on('click','.btn_jasa_hapus', function(e) {
					e.preventDefault();

					var index = $(this).data('index');

					total_keseluruhan -= parseInt(data_tambah_jasa[index].total);
					$("#total_keseluruhan").text("Rp."+total_keseluruhan.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ","));

					data_tambah_jasa.splice(index,1);

					console.log(data_tambah_jasa);

					$("table#tbl_item_pemasangan tbody").html("");
					var tbl_jasa_penawaran = "";
					var no_index_penawaran = 0;
					for (var i = 0; i < data_tambah_jasa.length; i++) {

						tbl_jasa_penawaran += "<tr>";
						tbl_jasa_penawaran += "<td>"+(no_index_penawaran+1)+"</td>";
						tbl_jasa_penawaran += "<td>"+data_tambah_jasa[i].uraian_pekerjaan+"</td>";
						tbl_jasa_penawaran += "<td>"+data_tambah_jasa[i].model+"</td>";
						tbl_jasa_penawaran += "<td>"+data_tambah_jasa[i].jumlah+"</td>";
						tbl_jasa_penawaran += "<td> Rp."+(data_tambah_jasa[i].harga).toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",") + "</td>";
						tbl_jasa_penawaran += "<td> Rp."+(data_tambah_jasa[i].total).toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",") + "</td>";

						tbl_jasa_penawaran += "<td>" + "<button class='btn btn-danger btn_jasa_hapus' data-index='"+no_index_penawaran+"'> <i class='fa fa-trash'></i></button>" + "</td>";
						no_index_penawaran++;
					}

					$("table#tbl_jasa_pemasangan tbody").html(tbl_jasa_penawaran);

				});


				$('#btn_tambah_pekerjaan').click(function(e) {
				e.preventDefault();

				$("table#tbl_jasa_pemasangan tbody").html("");
				data_tambah_jasa.push({
					"uraian_pekerjaan":$("select[name=type_penawaran_jasa] :selected").val(),
					"model":$("input[name=model_jasa]").val(),
					"jumlah":$("input[name=jumlah_jasa]").val(),
					"harga":$("input[name=harga_jasa]").val(),
					"total":parseInt($("input[name=jumlah_jasa]").val()) * parseInt($("input[name=harga_jasa]").val()),
				});

				total_keseluruhan += parseInt($("input[name=jumlah_jasa]").val()) * parseInt($("input[name=harga_jasa]").val());

				$("#total_keseluruhan").text("Rp."+total_keseluruhan.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ","));

				$("select[name=type_penawaran_jasa]").val("").change();
				$("input[name=model_jasa]").val("");
				$("input[name=jumlah_jasa]").val("");

					console.log(data_tambah_jasa);

					var tbl_jasa_penawaran = "";
					var no_index_penawaran = 0;
					for (var i = 0; i < data_tambah_jasa.length; i++) {

						tbl_jasa_penawaran += "<tr>";
						tbl_jasa_penawaran += "<td>"+(no_index_penawaran+1)+"</td>";
						tbl_jasa_penawaran += "<td>"+data_tambah_jasa[i].uraian_pekerjaan+"</td>";
						tbl_jasa_penawaran += "<td>"+data_tambah_jasa[i].model+"</td>";
						tbl_jasa_penawaran += "<td>"+data_tambah_jasa[i].jumlah+"</td>";
						tbl_jasa_penawaran += "<td> Rp."+(data_tambah_jasa[i].harga).toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",") + "</td>";
						tbl_jasa_penawaran += "<td> Rp."+(data_tambah_jasa[i].total).toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",") + "</td>";

						tbl_jasa_penawaran += "<td>" + "<button class='btn btn-danger btn_jasa_hapus' data-index='"+no_index_penawaran+"'> <i class='fa fa-trash'></i></button>" + "</td>";
						no_index_penawaran++;
					}

					$("table#tbl_jasa_pemasangan tbody").html(tbl_jasa_penawaran);

				});


			var SweetAlert2Demo = function() {

			//== Demos
			var initDemos = function() {

				$('#btn_buat_penawaran').click(function(e) {

					var tipe_pajak = $("#tipe_pajak").val();
					var reff = $("#no_reff").val();
					var tanggal = $("#tanggal_pembuatan_spk").val();
					var penerima = $("#nama_penerima").val();
					var perihal = $("#perihal").val();

					var data = {
						"tipe_pajak":tipe_pajak,
						"reff":reff,
						"tanggal":tanggal,
						"penerima":penerima,
						"perihal":perihal
					};

					if(data_tambah_item.length == 0) {
						swal('List Penawaran Kosong','Harap isi list penawaran','warning');
					} else if(data_tambah_jasa.length == 0) {
						swal('Jasa Pemasangan dan Material AC Kosong','Harap isi jasa pemasangan dan material ac','warning');
					} else {

						data.list_item_penawaran = data_tambah_item;
						data.jasa_pemasangan = data_tambah_jasa;

						swal({
							title: 'Apakah anda yakin menyimpan data ini?',
							type: 'warning',
							showCancelButton: true,
							confirmButtonText: 'Ya, Simpan'
						}).then(function(result) {
							if (result.value) {
								$.ajax({
									url:"<?= site_url() ?>kantor/penawaran/simpan",
									type:"post",
									data:data,
									cache:false
								}).done(function(res) {

									console.log(res);
									if(res.state) {

										swal({
											title: res.title,
											text: res.text,
											type: res.status
										}).then(function(result) {
											document.location = "<?= site_url() ?>kantor/penawaran";
										});

									} else {

										swal({
											title: res.title,
											text: res.text,
											type: res.status
										}).then(function(result) { });

									}

								}).fail(function(res) {
									console.log(res);
								});

							}
						});

					}

				});

			};

			return {
					//== Init
					init: function() {
						initDemos();
					},
				};
			}();

			//== Class Initialization
			jQuery(document).ready(function() {
				SweetAlert2Demo.init();
			});
		</script>
		<script>
			var Select2 = function() {
				var demos = function(){
				 // basic
				 $('.dropdown_search, .dropdown_search_validate').select2({
				 	placeholder: "Select a state"
				 });
				}
				var modalDemos = function(){
					$('#m_select2_modal').on('shown.bs.modal', function () {
				// basic
				$('.dropdown_search_modal').select2({
					placeholder: "Select a state"
				});
			});
				}
				return {
					init: function() {
						demos();
						modalDemos();
					}
				};
			}();
		//== Initialization
		jQuery(document).ready(function() {
			Select2.init();
		});



				<?php } if($data['route'] == "kantor/stock") { ?>
					$("li#stock").addClass("m-menu__item--active");

				<?php } if($data['route'] == "kantor/price") { ?>
					$("li#price").addClass("m-menu__item--active");

					var harga_barang = {};
					var harga_jasa = {};

					$("select[name='kode_item']").on("change", function() {
						if($(this).val() != "" && $("input#harga_modal").val() != "" && $("input#harga_partai").val() != "" && $("inputharga_kantor").val()) {
							$("button#btn_tambah").removeAttr("disabled");
						} else {
							$("button#btn_tambah").attr("disabled", "disabled");
						}
					});

					$("input#harga_modal").on("input", function() {
						if($(this).val() != "" && $("select[name=kode_item]").val() != "" && $("input#harga_partai").val() != "" && $("input#harga_kantor").val()) {
							$("button#btn_tambah").removeAttr("disabled");
						} else {
							$("button#btn_tambah").attr("disabled", "disabled");
						}
					});

					$("input#harga_partai").on("input", function() {
						if($(this).val() != "" && $("select[name=kode_item]").val() != "" && $("input#harga_modal").val() != "" && $("input#harga_kantor").val()) {
							$("button#btn_tambah").removeAttr("disabled");
						} else {
							$("button#btn_tambah").attr("disabled", "disabled");
						}
					});

					$("input#harga_kantor").on("input", function() {
						if($(this).val() != "" && $("select[name=kode_item]").val() != "" && $("input#harga_modal").val() != "" && $("input#harga_partai").val()) {
							$("button#btn_tambah").removeAttr("disabled");
						} else {
							$("button#btn_tambah").attr("disabled", "disabled");
						}
					});

					// JASA

					$("select[name='kode_item_jasa']").on("change", function() {
						if($(this).val() != "" && $("input#harga_modal_jasa").val() != "" && $("input#harga_partai_jasa").val() != "" && $("inputharga_kantor_jasa").val()) {
							$("button#btn_tambah_harga_jasa").removeAttr("disabled");
						} else {
							$("button#btn_tambah_harga_jasa").attr("disabled", "disabled");
						}
					});

					$("input#harga_modal_jasa").on("input", function() {
						if($(this).val() != "" && $("select[name=kode_item_jasa]").val() != "" && $("input#harga_partai_jasa").val() != "" && $("input#harga_kantor_jasa").val()) {
							$("button#btn_tambah_harga_jasa").removeAttr("disabled");
						} else {
							$("button#btn_tambah_harga_jasa").attr("disabled", "disabled");
						}
					});

					$("input#harga_partai_jasa").on("input", function() {
						if($(this).val() != "" && $("select[name=kode_item_jasa]").val() != "" && $("input#harga_modal_jasa").val() != "" && $("input#harga_kantor_jasa").val()) {
							$("button#btn_tambah_harga_jasa").removeAttr("disabled");
						} else {
							$("button#btn_tambah_harga_jasa").attr("disabled", "disabled");
						}
					});

					$("input#harga_kantor_jasa").on("input", function() {
						if($(this).val() != "" && $("select[name=kode_item_jasa]").val() != "" && $("input#harga_modal_jasa").val() != "" && $("input#harga_partai_jasa").val()) {
							$("button#btn_tambah_harga_jasa").removeAttr("disabled");
						} else {
							$("button#btn_tambah_harga_jasa").attr("disabled", "disabled");
						}
					});

				var Select2 = function() {
				var demos = function(){
				 // basic
				 $('.dropdown_search, .dropdown_search_validate').select2({
				 	placeholder: "Select a state"
				 });
				}
				var modalDemos = function(){
					$('#m_select2_modal').on('shown.bs.modal', function () {
				// basic
				$('.dropdown_search_modal').select2({
					placeholder: "Select a state"
				});
			});
				}
				return {
					init: function() {
						demos();
						modalDemos();
					}
				};
			}();
			//== Initialization
			jQuery(document).ready(function() {
				Select2.init();
			});


			var SweetAlert2Demo = function() {

			//== Demos
			var initDemos = function() {

				$('#btn_tambah').click(function(e) {
					$.ajax({
							url:"<?= site_url() ?>kantor/price/submit_barang",
							type:"post",
							data:{
								master_stock_id:$("select[name=kode_item]").val(),
								tipe:$("select[name=barang]").val(),
								modal:$("input#harga_modal").val(),
								partai:$("input#harga_partai").val(),
								kantor:$("input#harga_kantor").val(),
							},
							cache:false
						}).done(function(res) {

								swal({
									title: res.title,
									text: res.message,
									type: res.status
								}).then(function(result) {
									document.location = "<?= base_url() ?>kantor/price";
								});

						}).fail(function(res) {
							console.log(res);
						});
				});
				$('#btn_tambah_harga_jasa').click(function(e) {
					$.ajax({
							url:"<?= site_url() ?>kantor/price/submit_jasa",
							type:"post",
							data:{
								master_stock_id:$("select[name=kode_item_jasa]").val(),
								tipe:$("select[name=jasa]").val(),
								modal:$("input#harga_modal_jasa").val(),
								partai:$("input#harga_partai_jasa").val(),
								kantor:$("input#harga_kantor_jasa").val(),
							},
							cache:false
						}).done(function(res) {

								swal({
									title: res.title,
									text: res.message,
									type: res.status
								}).then(function(result) {
									document.location = "<?= base_url() ?>kantor/price";
								});

						}).fail(function(res) {
							console.log(res);
						});
				});
				$('#btn_selesai_edit').click(function(e) {
					swal("Berhasil!", "data harga item telah berhasil diedit","success");
				});
				$('#btn_selesai_edit_harga_jasa').click(function(e) {
					swal("Berhasil!", "data harga item telah berhasil diedit","success");
				});
			};

			return {
					//== Init
					init: function() {
						initDemos();
					},
				};
			}();

			//== Class Initialization
			jQuery(document).ready(function() {
				SweetAlert2Demo.init();
			});


			var tbl_list_harga = $('#tbl_list_harga').mDatatable({
				data: {
					saveState: {cookie: false},
					type: 'remote',
			        source: {
			          read: {
			            // sample GET method
			            method: 'POST',
			            url: '<?= site_url() ?>getpriceitem',
			            map: function(raw) {
			              // sample data mapping
			              var dataSet = raw;
			              if (typeof raw.data !== 'undefined') {
			                dataSet = raw.data;
			              }
			              return dataSet;
			            },
			          },
			        },
			        pageSize: 10,
			        serverPaging: true,
			        serverFiltering: true,
			        serverSorting: true,
			    },
				// layout definition
				layout: {
					theme: 'default', // datatable theme
					class: '', // custom wrapper class
					scroll: true, // enable/disable datatable scroll both horizontal and vertical when needed.
					// height: 450, // datatable's body's fixed height
					footer: false // display/hide footer
				},

				// column sorting
				sortable: false,
				search: {
					input: $('#generalSearch'),
				},
				columns: [

				{
					field: 'no',
					textAlign: 'center',
					template: function(data, type, row, meta) {
						return data.getIndex() + 1;
					}
				},
				{
					field: 'kode',
					textAlign: 'center',
				},
				{
					field: 'nama',
					textAlign: 'center',
				},
				{
					field: 'tipe',
					textAlign: 'center',
				},
				{
					field: 'merk',
					textAlign: 'center',
				},
				{
					field: 'partai',
					textAlign: 'center',
					template: function(data) {
						return "Rp." + parseInt(data.partai).toFixed(2).replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,");
					}
				},
				{
					field: 'kantor',
					textAlign: 'center',
					template: function(data) {
						return "Rp." + parseInt(data.kantor).toFixed(2).replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,");
					}
				},
				{
					field: 'modal',
					textAlign: 'center',
					template: function(data) {
						return "Rp." + parseInt(data.modal).toFixed(2).replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,");
					}
				},
				{
					field: 'keterangan',
					textAlign: 'center',
					template: function(data) {
						return "-";
					}
				},

				],
			});



				var tbl_list_harga_jasa = $('#tbl_list_harga_jasa').mDatatable({
				data: {
					saveState: {cookie: false},
					type: 'remote',
			        source: {
			          read: {
			            method: 'POST',
			            url: '<?= site_url() ?>getpricejasa',
			            map: function(raw) {
			              // sample data mapping
			              var dataSet = raw;
			              if (typeof raw.data !== 'undefined') {
			                dataSet = raw.data;
			              }
			              return dataSet;
			            },
			          },
			        },
			        pageSize: 10,
			        serverPaging: true,
			        serverFiltering: true,
			        serverSorting: true,
			    },
				// layout definition
				layout: {
					theme: 'default', // datatable theme
					class: '', // custom wrapper class
					scroll: true, // enable/disable datatable scroll both horizontal and vertical when needed.
					// height: 450, // datatable's body's fixed height
					footer: false // display/hide footer
				},

				// column sorting
				sortable: false,
				search: {
					input: $('#generalSearch'),
				},
				columns: [

				{
					field: 'no',
					textAlign: 'center',
					template: function(data, type, row, meta) {
						return data.getIndex() + 1;
					}
				},
				{
					field: 'kode',
					textAlign: 'center',
				},
				{
					field: 'No Seri',
					textAlign: 'center',
				},
				{
					field: 'nama',
					textAlign: 'center',
				},
				{
					field: 'tipe',
					textAlign: 'center',
				},
				{
					field: 'merk',
					textAlign: 'center',
				},
				{
					field: 'partai',
					textAlign: 'center',
					template: function(data) {
						return "Rp." + parseInt(data.partai).toFixed(2).replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,");
					}
				},
				{
					field: 'kantor',
					textAlign: 'center',
					template: function(data) {
						return "Rp." + parseInt(data.kantor).toFixed(2).replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,");
					}
				},
				{
					field: 'modal',
					textAlign: 'center',
					template: function(data) {
						return "Rp." + parseInt(data.modal).toFixed(2).replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,");
					}
				},
				{
					field: 'keterangan',
					textAlign: 'center',
					template: function(data) {
						return "-";
					}
				},
				{
					field: 'aksi',
					textAlign: 'center',
				}

				],
			});



				<?php } if($data['route'] == "kantor/penawaran/rincian/(:any)") { ?>
					$("li#offer").addClass("m-menu__item--active");
  			    <?php }

				# END KANTOR

				# HRD

			   if($data['route'] == "hrd") { ?>
					$("li#manajemen-penugasan").addClass("m-menu__item--active");

				<?php }

				if($data['route'] == "hrd/customer/kepuasan") { ?>
					$("li#kepuasan-pelanggan").addClass("m-menu__item--active");

				<?php }

				if($data['route'] == "hrd/manajemen/user") { ?>
					$("li#manajemen-user").addClass("m-menu__item--active");

				<?php }

				# END HRD

				# GUDANG

				if($data['route'] == "gudang") { ?>
					$("li#dashboard").addClass("m-menu__item--active");
				<?php } ?>

				<?php if($data['route'] == "gudang/barang/masuk") { ?>
					$("li#barang").addClass("m-menu__item--active");

				var tbl_list_barang_masuk = $('#tbl_list_barang_masuk').mDatatable({
				data: {
					saveState: {cookie: false},
					type: 'remote',
			        source: {
			          read: {
			            // sample GET method
			            method: 'POST',
			            url: "<?= base_url() ?>gudang/barang/masuk/getdata",
			            map: function(raw) {
			              // sample data mapping
			              var dataSet = raw;
			              if (typeof raw.data !== 'undefined') {
			                dataSet = raw.data;
			              }
			              return dataSet;
			            },
			          },
			        },
			        pageSize: 10,
			        serverPaging: true,
			        serverFiltering: true,
			        serverSorting: true,
			    },
				// layout definition
				layout: {
					theme: 'default', // datatable theme
					class: '', // custom wrapper class
					scroll: true, // enable/disable datatable scroll both horizontal and vertical when needed.
					// height: 450, // datatable's body's fixed height
					footer: false, // display/hide footer
					"autoWidth": false,
				},

				// column sorting
				sortable: false,
				search: {
					input: $('#generalSearch'),
				},
				columns: [

				{
					field: 'no',
					textAlign: 'center',
					template: function(data, type, row, meta) {
						return data.getIndex() + 1;
					}
				},
				{
					field: 'tanggal',
					textAlign: 'center',
					template: function(data, type, row, meta) {
						var tanggal = data.tanggal.split("-");
						return tanggal[2] + "/" + tanggal[1] + "/" + tanggal[0];
					}
				},
				{
					field: 'no_invoice',
					textAlign: 'center',
				},
				{
					field: 'gudang',
					textAlign: 'center',
					template: function(data, type, row, meta) {
						var gudang = data.gudang == 1 ? "Toko":"Kantor";
						return gudang;
					}
				},
				{
					field: 'kode',
					textAlign: 'center',
				},
				{
					field: 'nama',
					textAlign: 'center',
				},
				{
					field: 'jumlah',
					textAlign: 'center',
				},
				{
					field: 'aksi',
					textAlign: 'center',
					template: function(data) {
						var html = "<a href='<?= base_url() ?>gudang/barang/masuk/proses/" + (data.kode) + "' class='btn btn-sm btn-success btn_material' style='color:white;width:80px;'>proses</a>";
						return html;
					}
				}

				],
			});

				<?php } if($data['route'] == "gudang/barang/masuk/proses/(:any)") { ?>
					$("li#barang").addClass("m-menu__item--active");
					var serial = [];
					
					$('#btn_simpan').click(function(e) {

						for(var i = 1;i < no;i++) {
							serial.push({
								kode_list_barang:kode,
								serial:$("input[name=serial" + i + "]").val()
							});
						}

						swal({
							title: 'Apakah anda yakin menyimpan data ini?',
							type: 'warning',
							showCancelButton: true,
							confirmButtonText: 'Ya, Simpan'
						}).then(function(result) {
							if (result.value) {
								$.ajax({
									url:"<?= base_url() ?>gudang/barang/masuk/proses/simpan",
									type:"post",
									data:{serial:serial},
									cache:false
								}).done(function(res) {

										swal({
											title: res.title,
											message: res.message,
											type: res.status
										}).then(function(result) {
											document.location = "<?= base_url() ?>gudang/barang/masuk";
										});

								}).fail(function(res) {
									console.log(res);
								});

							}
						});
					});

				<?php } if($data['route'] == "gudang/surat/jalan") { ?>
					$("li#surat").addClass("m-menu__item--active");

				<?php } if($data['route'] == "gudang/material/keluar") { ?>
					$("li#material").addClass("m-menu__item--active");

				<?php } if($data['route'] == "gudang/inventory") { ?>
					$("li#inventory").addClass("m-menu__item--active");

						$(document).on('click', '.btn_selesai', function() {
							var id = $(this).data("id");
							var nama = $(this).data("nama");
							
							if(!confirm(nama + ' sudah di kembalikan ?')) return false;

							$.ajax({
								url:"<?= site_url() ?>gudang/inventory/kembalikan_pinjam",
								type:"post",
								data:{
									id:id
								},
								dataType:"json"
							}).done(function(res) {
								console.log(res);
								
								swal(res.title,res.text,res.status);
								setTimeout(function() {
									if(res.state) {
										location.reload();
									}
								},2000);

							}).fail(function(res) {
								console.log(res);
							});


						});

						$(document).on('click','.btn_hapus', function() {
							var id = $(this).data("id");
							var nama = $(this).data("nama");
							var gambar = $(this).data("gambar");

							if(!confirm(' Hapus Inventory '+nama+' ?')) return false;
							
							$.ajax({
								url:"<?= site_url() ?>gudang/inventory/hapus",
								type:"post",
								data:{
									id:id,
									gambar:gambar
								},
								dataType:"json"
							}).done(function(res) {
								console.log(res);
								
								swal(res.title,res.text,res.status);
								setTimeout(function() {
									if(res.state) {
										location.reload();
									}
								},1500);

							}).fail(function(res) {
								console.log(res);
							});

						});

						$("select[name=set_peminjam]").change(function() {
							var id = $(this).find(":selected").attr("data-id");
							var barang = $(this).find(":selected").attr("data-nama");
							var teknisi_id = $(this).val();

							if(teknisi_id == "") { } else {
								if(!confirm(' Pinjam barang '+barang+' ?')) return false;
								$.ajax({
									url:"<?= site_url() ?>gudang/inventory/pinjam",
									type:"post",
									data:{
										id:id,
										teknisi_id:teknisi_id
									},
									dataType:"json"
								}).done(function(res) {
									swal(res.title,res.text,res.status);
									setTimeout(function() {
										if(res.state) {
											location.reload();
										}
									},1500);

								}).fail(function(res) {
									console.log(res);
									swal(res.title,res.text,res.status);
								});
							}
							
						});

				<?php } if($data['route'] == "gudang/inventory/tambah") { ?>
					$("li#inventory").addClass("m-menu__item--active");		

					$("input[name='id_barang']").on("input", function() {
						if($(this).val() != "" && $("input[name='nama_barang']").val() != "" && $("input[name='no_seri']").val()) {
							$("button#btn_tambah_item_inventory").removeAttr("disabled");
						} else {
							$("button#btn_tambah_item_inventory").attr("disabled", "disabled");
						}
					});

					$("input[name='nama_barang']").on("input", function() {
						if($(this).val() != "" && $("input[name='id_barang']").val() != "" && $("input[name='no_seri']").val()) {
							$("button#btn_tambah_item_inventory").removeAttr("disabled");
						} else {
							$("button#btn_tambah_item_inventory").attr("disabled", "disabled");
						}
					});

					$("input[name='no_seri']").on("input", function() {
						if($(this).val() != "" && $("input[name='id_barang']").val() != "" && $("input[name='nama_barang']").val()) {
							$("button#btn_tambah_item_inventory").removeAttr("disabled");
						} else {
							$("button#btn_tambah_item_inventory").attr("disabled", "disabled");
						}
					});

					function previewImage() {
						document.getElementById("image-preview").style.display = "block";
						var oFReader = new FileReader();
						oFReader.readAsDataURL(document.getElementById("image_source").files[0]);

						oFReader.onload = function(oFREvent) {
							document.getElementById("image-preview").src = oFREvent.target.result;
						};
					};


					$("button#btn_tambah_item_inventory").click(function() {

						$("form#tambah_inventory").trigger('submit');

					});

				<?php } if($data['route'] == "gudang/inventory/edit/(:any)") { ?>
					$("li#inventory").addClass("m-menu__item--active");

					$("input[name='nama_barang']").on("input", function() {
						if($(this).val() != "" && $("input[name='no_seri']").val()) {
							$("button#btn_edit_item_inventory").removeAttr("disabled");
						} else {
							$("button#btn_edit_item_inventory").attr("disabled", "disabled");
						}
					});

					$("input[name='no_seri']").on("input", function() {
						if($(this).val() != "" && $("input[name='nama_barang']").val()) {
							$("button#btn_edit_item_inventory").removeAttr("disabled");
						} else {
							$("button#btn_edit_item_inventory").attr("disabled", "disabled");
						}
					});

					function previewImage() {
						document.getElementById("gambar_barang").style.display = "none";
						document.getElementById("image-preview").style.display = "block";
						var oFReader = new FileReader();
						oFReader.readAsDataURL(document.getElementById("image_source").files[0]);

						oFReader.onload = function(oFREvent) {
							document.getElementById("image-preview").src = oFREvent.target.result;
						};
					};


					$("button#btn_edit_item_inventory").click(function() {
						if(!confirm('Yakin ingin mengupdate data ini ?')) return false;
						$("form#edit_inventory").trigger('submit');
					});

				<?php } if($data['route'] == "gudang/stock/manajemen") { ?>
					$("li#stock-manajemen").addClass("m-menu__item--active");

				var tbl_list_stock_gudang_kantor = $('#tbl_list_stock_gudang_kantor').mDatatable({
				data: {
					saveState: {cookie: false},
					type: 'remote',
			        source: {
			          read: {
			            // sample GET method
			            method: 'POST',
			            url: '<?=site_url()?>finance/stock/getdatakantor',
			            // url: '<?=site_url()?>finance/stock/getdatatoko',
			            map: function(raw) {
			              // sample data mapping
			              var dataSet = raw;
			              if (typeof raw.data !== 'undefined') {
			                dataSet = raw.data;
			              }
			              return dataSet;
			            },
			          },
			        },
			        pageSize: 10,
			        serverPaging: true,
			        serverFiltering: true,
			        serverSorting: true,
			    },
				// layout definition
				layout: {
					theme: 'default', // datatable theme
					class: '', // custom wrapper class
					scroll: true, // enable/disable datatable scroll both horizontal and vertical when needed.
					// height: 450, // datatable's body's fixed height
					footer: false // display/hide footer
				},

				// column sorting
				sortable: true,
				search: {
					input: $('#generalSearch'),
				},
				columns: [

				{
					field: "no",
					template: function(data, type, row, meta) {
						return data.getIndex() + 1;
					},
					textAlign: 'center',
				},
				{
					field: 'kategori',
					textAlign: 'center',
				},
				{
					field: 'kode',
					textAlign: 'center',
				},
				{
					field: 'nama',
					textAlign: 'center',
				},
				{
					field: 'tipe',
					textAlign: 'center'
				},
				{
					field: 'merk',
					textAlign: 'center',
				},
				{
					field: 'stock',
					textAlign: 'center',
				},
				{
					field: 'satuan',
					textAlign: 'center',
				},
				{
					field: 'status',
					textAlign: 'center',
					template: function(data, type, row, meta) {
						var html = "";
						if(data.stock > 7) {
							html = "Tersedia";
						}  else if(data.stock <= 7) {
							html = "Hampir Habis";
						} else if(data.stock == 0) {
							html = "Habis";
						}
						return html;
					},
				},
				{
					field: 'keterangan',
					textAlign: 'center',
				},
				{
					field: 'aksi',
					textAlign: 'center',
					template:function(data) {
var html = "<a href='<?= base_url() ?>gudang/stock/rincian/"+data.kode+"' class=\"btn btn-sm btn-primary\" style=\"color:white; width:80px;\">Rincian</a>";
						return html;
					}
				}

				],
			});


var tbl_list_stock_gudang_kantor = $('#tbl_list_stock_gudang_toko').mDatatable({
				data: {
					saveState: {cookie: false},
					type: 'remote',
			        source: {
			          read: {
			            // sample GET method
			            method: 'POST',
			            url: '<?=site_url()?>finance/stock/getdatatoko',
			            // url: '<?=site_url()?>finance/stock/getdatatoko',
			            map: function(raw) {
			              // sample data mapping
			              var dataSet = raw;
			              if (typeof raw.data !== 'undefined') {
			                dataSet = raw.data;
			              }
			              return dataSet;
			            },
			          },
			        },
			        pageSize: 10,
			        serverPaging: true,
			        serverFiltering: true,
			        serverSorting: true,
			    },
				// layout definition
				layout: {
					theme: 'default', // datatable theme
					class: '', // custom wrapper class
					scroll: true, // enable/disable datatable scroll both horizontal and vertical when needed.
					// height: 450, // datatable's body's fixed height
					footer: false // display/hide footer
				},

				// column sorting
				sortable: true,
				search: {
					input: $('#generalSearch'),
				},
				columns: [

				{
					field: "no",
					template: function(data, type, row, meta) {
						return data.getIndex() + 1;
					},
					textAlign: 'center',
				},
				{
					field: 'kategori',
					textAlign: 'center',
				},
				{
					field: 'kode',
					textAlign: 'center',
				},
				{
					field: 'nama',
					textAlign: 'center',
				},
				{
					field: 'tipe',
					textAlign: 'center'
				},
				{
					field: 'merk',
					textAlign: 'center',
				},
				{
					field: 'stock',
					textAlign: 'center',
				},
				{
					field: 'satuan',
					textAlign: 'center',
				},
				{
					field: 'status',
					textAlign: 'center',
					template: function(data, type, row, meta) {
						var html = "";
						if(data.stock > 7) {
							html = "Tersedia";
						}  else if(data.stock <= 7) {
							html = "Hampir Habis";
						} else if(data.stock == 0) {
							html = "Habis";
						}
						return html;
					},
				},
				{
					field: 'keterangan',
					textAlign: 'center',
				},
				{
					field: 'aksi',
					textAlign: 'center',
					template:function(data) {
var html = "<a href='<?= base_url() ?>gudang/stock/rincian/"+data.kode+"' class=\"btn btn-sm btn-primary\" style=\"color:white; width:80px;\">Rincian</a>";
						return html;
					}
				}

				],
			});


				<?php } if($data['route'] == "gudang/stock/rincian/(:num)") { ?>
						$("li#stock-manajemen").addClass("m-menu__item--active");

var tbl_rincian_stock = $('#tbl_rincian_stock').mDatatable({
				data: {
					saveState: {cookie: false},
					/*type: 'remote',
			        source: {
			          read: {
			            // sample GET method
			            method: 'GET',
			            url: 'https://keenthemes.com/metronic/preview/inc/api/datatables/demos/default.php',
			            map: function(raw) {
			              // sample data mapping
			              var dataSet = raw;
			              if (typeof raw.data !== 'undefined') {
			                dataSet = raw.data;
			              }
			              return dataSet;
			            },
			          },
			        },
			        pageSize: 10,
			        serverPaging: true,
			        serverFiltering: true,
			        serverSorting: true,*/
			    },
				// layout definition
				layout: {
					theme: 'default', // datatable theme
					class: '', // custom wrapper class
					scroll: true, // enable/disable datatable scroll both horizontal and vertical when needed.
					// height: 450, // datatable's body's fixed height
					footer: false // display/hide footer
				},

				// column sorting
				sortable: false,
				search: {
					input: $('#generalSearch'),
				},
				columns: [

				{
					field: 'No',
					textAlign: 'center',
					width: 50
				},
				{
					field: 'Tanggal',
					textAlign: 'center',
					type:'date',
					format: 'DD/MM/YYYY',
				},
				{
					field: 'No Surat Jalan',
					textAlign: 'center',
				},
				{
					field: 'Pemesan',
					textAlign: 'center',
				},
				{
					field: 'Masuk',
					textAlign: 'center',
				},
				{
					field: 'Keluar',
					textAlign: 'center',
				},
				{
					field: 'Sisa',
					textAlign: 'center',
				}

				],
			});

				<?php } if($data['route'] == "gudang/stock/rincian_barang/(:num)") { ?>
						$("li#stock-manajemen").addClass("m-menu__item--active");

var tbl_rincian_stock = $('#tbl_rincian_stock').mDatatable({
				data: {
					saveState: {cookie: false},
					/*type: 'remote',
			        source: {
			          read: {
			            // sample GET method
			            method: 'GET',
			            url: 'https://keenthemes.com/metronic/preview/inc/api/datatables/demos/default.php',
			            map: function(raw) {
			              // sample data mapping
			              var dataSet = raw;
			              if (typeof raw.data !== 'undefined') {
			                dataSet = raw.data;
			              }
			              return dataSet;
			            },
			          },
			        },
			        pageSize: 10,
			        serverPaging: true,
			        serverFiltering: true,
			        serverSorting: true,*/
			    },
				// layout definition
				layout: {
					theme: 'default', // datatable theme
					class: '', // custom wrapper class
					scroll: true, // enable/disable datatable scroll both horizontal and vertical when needed.
					// height: 450, // datatable's body's fixed height
					footer: false // display/hide footer
				},

				// column sorting
				sortable: false,
				search: {
					input: $('#generalSearch'),
				},
				columns: [
				{
					field: 'Tanggal Masuk',
					textAlign: 'center',
					type:'date',
					format: 'DD/MM/YYYY',
				},
				{
					field: 'Tanggal Keluar',
					textAlign: 'center',
					type:'date',
					format: 'DD/MM/YYYY',
				},
					{
					field: 'No Seri',
					textAlign: 'center',
				}


				],
			});


				<?php } if($data['route'] == "gudang/stock/master") { ?>
					$("li#stock-master").addClass("m-menu__item--active");

					$('#btn_tambah').click(function() {

						var input_kode_barang = $("input[name=input_kode_barang]").val();
						var kategori_item = $("select[name=kategori_item] option:selected").val();
						var nama_barang = $("input[name=nama_barang]").val();
						var input_satuan_barang = $("input[name=input_satuan_barang]").val();
						var stock_minimal = $("input[name=stock_minimal]").val();

						if(input_kode_barang == "") {
							swal('Kode barang kosong !!!');
						} else if(kategori_item == "") {
							swal('Kategori barang kosong !!!');
						} else if(nama_barang == "") {
							swal('Nama barang kosong !!!');
						} else if(input_satuan_barang == "") {
							swal('Satuan barang kosong !!!');
						} else if(stock_minimal == "") {
							swal('Stock Minimal kosong !!!');
						} else {

							swal({
								title: 'Apakah anda yakin menambahkan barang ini?',
								type: 'warning',
								showCancelButton: true,
								confirmButtonText: 'Ya, Tambahkan!'
							}).then(function(result) {
								if (result.value) {

									$("#formstock").trigger("submit");

								}
							});

						}

					});

					function previewImage() {
						document.getElementById("image-preview").style.display = "block";
						var oFReader = new FileReader();
						oFReader.readAsDataURL(document.getElementById("image_source").files[0]);

						oFReader.onload = function(oFREvent) {
							document.getElementById("image-preview").src = oFREvent.target.result;
						};
					};
					var Select2 = function() {
							var demos = function(){
							// basic
							$('.dropdown_search, .dropdown_search_validate').select2({
								placeholder: "Select a state"
							});
							}
							var modalDemos = function(){
								$('#m_select2_modal').on('shown.bs.modal', function () {
							// basic
							$('.dropdown_search_modal').select2({
								placeholder: "Select a state"
							});
						});
							}
							return {
								init: function() {
									demos();
									modalDemos();
								}
							};
						}();
					//== Initialization
					jQuery(document).ready(function() {
						Select2.init();
					});


					$(document).on('click','.btnhapus',function() {
						var kode = $(this).data('id');
						if(!confirm('Hapus Data (Kode: ' + kode + ')')) return false;
						$.ajax({
							url:"<?= base_url() ?>gudang/stock/master/hapus",
							type:"post",
							data:{
								kode:kode
							},
							dataType:'json'
						}).done(function(res) {
							console.log(res);
							swal({
								title:res.title,
								message:res.message,
								type:res.status,
								confirmButtonText: 'Ok'
								}).then(function(result) {
									if (result.value) {
										document.location = '<?= base_url() ?>gudang/stock/master';
									}
								});
						}).fail(function(res) {
							console.log(res);
						});
					});


						var tbl_list_master_stock = $('#tbl_list_master_stock').mDatatable({
							data: {
					saveState: {cookie: false},
							type: 'remote',
							source: {
							  read: {
								// sample GET method
								method: 'GET',
								url: '<?=site_url()?>gudang/stock/master/getdata',
								// url: 'https://projects.upanastudio.com/ptssm/app/gudang/stock/master/getdata',
								map: function(raw) {
								  // sample data mapping
								  var dataSet = raw;
								  if (typeof raw.data !== 'undefined') {
									dataSet = raw.data;
								  }
								  return dataSet;
								},
							  },
							},
							pageSize: 10,
							serverPaging: true,
							serverFiltering: true,
							serverSorting: true,
						},
								// layout definition
								layout: {
									theme: 'default', // datatable theme
									class: '', // custom wrapper class
									scroll: true, // enable/disable datatable scroll both horizontal and vertical when needed.
									// height: 450, // datatable's body's fixed height
									footer: false, // display/hide footer
								},

								// column sorting
								sortable: true,
								search: {
									input: $('#generalSearch'),
								},
								columns: [

								{
									field: "no",
									template: function(data, type, row, meta) {
										return data.getIndex() + 1;
									},
									textAlign: "center",
								},
								{
									field: "kategori",
									textAlign: "center",

								},
								{
									field: 'kode',
									textAlign: 'center',
								},
								{
									field: 'nama',
									textAlign: 'center',
								},
								{
									field: "tipe_gudang",
									template: function(data, type, row, meta) {
										var html = ""
										if(data.tipe_gudang == 1) {
											html = "Toko (Non Pajak)";
										} else if(data.tipe_gudang == 2) {
											html = "Kantor (Pajak)";
										}
										return html;
									},
									textAlign: "center",
								},
								{
									field: 'tipe',
									textAlign: 'center'
								},
								{
									field: 'merk',
									textAlign: 'center'
								},
								{
									field: 'stock',
									textAlign: 'center'
								},
								{
									field: 'satuan',
									textAlign: 'center'
								},
								{
									field: 'keterangan',
									textAlign: 'center',
								},
								{
									field: 'gambar',
									template: function(data, type, row, meta) {
										if(data.gambar == "" || data.gambar == null) {
											return "Tidak ada Gambar";
										} else {
											return "<img src='<?= base_url() ?>assets/img/"+data.gambar+"' width='75px'>";
										}
									},
									textAlign: 'center',

								},
								{
									field: 'aksi',
									template: function(data, type, row, meta) {
										return "<a href='<?= base_url() ?>gudang/stock/master/edit/"+data.id + "' class='btn btn-sm btn-primary' style='color:white; width:80px;'>Edit</a><button data-id='"+data.id+"' class='btn btn-sm btn-secondary btnhapus' style='width:80px;'>Hapus</button>";
									},
									textAlign: 'center',
								}

								],
							});

				<?php } if($data['route'] == "gudang/stock/master/edit/(:num)") { ?>
					$("li#stock-master").addClass("m-menu__item--active");

					$('#btn_update').click(function() {

						var input_kode_barang = $("input[name=input_kode_barang]").val();
						var kategori_item = $("select[name=kategori_item] option:selected").val();
						var nama_barang = $("input[name=nama_barang]").val();
						var input_satuan_barang = $("input[name=input_satuan_barang]").val();
						var stock_minimal = $("input[name=stock_minimal]").val();

						if(input_kode_barang == "") {
							swal('Kode barang kosong !!!');
						} else if(kategori_item == "") {
							swal('Kategori barang kosong !!!');
						} else if(nama_barang == "") {
							swal('Nama barang kosong !!!');
						} else if(input_satuan_barang == "") {
							swal('Satuan barang kosong !!!');
						} else if(stock_minimal == "") {
							swal('Stock Minimal kosong !!!');
						} else {

							swal({
								title: 'Apakah anda yakin mengupdate barang ini?',
								type: 'warning',
								showCancelButton: true,
								confirmButtonText: 'Ya, Update!'
							}).then(function(result) {
								if (result.value) {

									$("#formstockedit").trigger("submit");

								}
							});

						}

					});


					function previewImage() {
						document.getElementById("image-preview-edit").style.display = "block";
						var oFReader = new FileReader();
						oFReader.readAsDataURL(document.getElementById("image_source_edit").files[0]);

						oFReader.onload = function(oFREvent) {
							document.getElementById("image-preview-edit").src = oFREvent.target.result;
						};
					};

					jQuery(document).ready(function() {

					});

				<?php }

				# END GUDANG
?>

		</script>
	</body>
    </html>
