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
					
			<?php } 
				
				if($data['route'] == "finance/invoice/masuk/tambah") { ?>
					$("li#invoice_masuk").addClass("m-menu__item--active");

					$('#btn_simpan_data').click(function(e) {

						$.ajax({
							url:"<?= base_url() ?>finance/invoice/masuk/tambahsubmit",
							type:"post",
							data:{
								no_invoice:$("#no_invoice").val(),
								tanggal_pembuatan_invoice:$("#tanggal_pembuatan_invoice").val(),
								tanggal_pembuatan_invoice:$("#tanggal_pembuatan_invoice").val(),
								nama_supplier:$("#nama_supplier").val(),
								no_telpon:$("#no_telpon").val(),
								email_supllier:$("#email_supllier").val(),
								alamat_supllier:$("#alamat_supllier").val(),
								npwp_supllier:$("#npwp_supllier").val(),
								status:$("select#status").val(),
								gudang:$("select#gudang").val(),
							},
							dataType:"json"
						}).done(function(res) {
							swal("Berhasil!", "Data Invoice Telah Tersimpan","success");
						}).fail(function(res) {
							
						});
					});
					
					$('#btn_tambah').click(function(e) {
						swal("Berhasil!", "data yang anda inputkan telah dimasukkan ke list item barang", "success");
					});					

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
								// url: "http://localhost/ptssm/app2/kantor/customer/getdata",
								url: "https://projects.upanastudio.com/ptssm/app/kantor/customer/getdata",
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
								// url: 'http://localhost/ptssm/app2/kantor/customer/getdataac/' + id,
								url: 'https://projects.upanastudio.com/ptssm/app/kantor/customer/getdataac/' + id,
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
		
				<?php }				

				# END GUDANG
?>
					
		</script>
	</body>
    </html>