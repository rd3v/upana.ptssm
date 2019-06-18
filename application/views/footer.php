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

				<?php } 
				
				if($data['route'] == "finance/price") { ?>
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
								url: "http://localhost/ptssm/app2/kantor/customer/getdata",
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
								url: 'http://localhost/ptssm/app2/kantor/customer/getdataac/' + id,
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
					
				<?php } if($data['route'] == "kantor/stock") { ?>
					$("li#stock").addClass("m-menu__item--active");
		
				<?php } if($data['route'] == "kantor/price") { ?>
					$("li#price").addClass("m-menu__item--active");
		
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
								
				<?php } if($data['route'] == "gudang/barang/masuk/proses/(:num)") { ?>
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
		
				<?php } if($data['route'] == "gudang/stock/manajemen") { ?>
					$("li#stock-manajemen").addClass("m-menu__item--active");
		
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
						var tbl_list_master_stock = $('#tbl_list_master_stock').mDatatable({
							data: {
					saveState: {cookie: false},
							type: 'remote',
							source: {
							  read: {
								// sample GET method
								method: 'GET',
								url: 'http://localhost/ptssm/app2/gudang/stock/master/getdata',
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
									field: 'daya_listrik',
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
										return "<a class='btn btn-sm btn-primary' style='color:white; width:80px;'>Edit</a><a class='btn btn-sm btn-secondary' style='width:80px;'>Hapus</a>"
									},
									textAlign: 'center',
								}

								],
							});

				<?php }				

				# END GUDANG
?>
					
		</script>
	</body>
    </html>