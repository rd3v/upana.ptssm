<!DOCTYPE html>
<html lang="en" >
<!-- begin::Head -->
<head>
	<meta charset="utf-8" />
	<title>
		Print Penawaran
	</title>
	<meta name="description" content="Latest updates and statistic charts">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<!--begin::Web font -->
	<script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.16/webfont.js"></script>
	<script>
		WebFont.load({
			google: {"families":["Poppins:300,400,500,600,700","Roboto:300,400,500,600,700"]},
			active: function() {
				sessionStorage.fonts = true;
			}
		});
	</script>
	<!--end::Web font -->
	<!--begin::Base Styles -->  
	<!--begin::Page Vendors -->
	<link href="<?= base_url() ?>assets/vendors/custom/fullcalendar/fullcalendar.bundle.css" rel="stylesheet" type="text/css" />
	<!--end::Page Vendors -->
	<link href="<?= base_url() ?>assets/vendors/base/vendors.bundle.css" rel="stylesheet" type="text/css" />
	<link href="<?= base_url() ?>assets/demo/default/base/style.bundle.css" rel="stylesheet" type="text/css" />
	<!-- begin:: Style tambahan -->
	<link href="<?= base_url() ?>assets/demo/default/base/pelangi-style.css" rel="stylesheet" type="text/css">
	<link href="<?= base_url() ?>assets/demo/default/base/sejuk-sukses-style.css" rel="stylesheet" type="text/css">
	<!-- <link href="../assets/demo/default/base/card-a5.css" rel="stylesheet" type="text/css" -->
	<!-- end:: Style tambahan -->
	<!--end::Base Styles -->
	<link rel="shortcut icon" href="<?= base_url() ?>assets/demo/default/media/img/logo/favicon.ico" />
	<style>
		.m-datatable.m-datatable--default > .m-datatable__pager > .m-datatable__pager-info {
			display: none !important;
		}
		.tg  {border-collapse:collapse;border-spacing:0;}
		.tg td{font-family:Arial, sans-serif;font-size:14px;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:black;}
		.tg th{font-family:Arial, sans-serif;font-size:14px;font-weight:normal;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:black;}
		.tg .tg-s268{
			text-align:center;
			font-size: 1.2rem;
			font-weight: 600;
		}
		.tlu {
			border-top: transparent !important;
		}

	</style>
	<style>
		@media print {

			.table {
				min-height : 300px !important;
			}

			th {
				font-size: 1.7rem !important;
			}

			td {
				font-size: 1rem !important;
			}

			
			label {
				font-size: 1.6rem !important;
			}
			input {
				font-size: 1.6rem !important;
			}
			h3 {
				font-size: 2rem !important;
			}

			.font-print {
				font-size: 1.8rem !important;
			}

			.m-portlet .m-portlet__body {
				padding: 2.2rem 2.2rem;
			}

			.informasinya {
				padding-bottom: .1rem !important;
			}

			.col-form-label {
				padding-top : 0px !important;
				padding-bottom: 0px !important;
			}

			.m-datatable__table {
				min-height: 40px !important;
			}

			.input_nama_material {
				background-color: rgba(255,255,255,.0) !important;
				border-color: rgba(255,255,255,.0)!important;
			}

			.input_material {
				background-color: rgba(255,255,255,.0) !important;
				border-color: rgba(255,255,255,.0)!important;
			}

			.m-datatable__pager-info{
				display: none;
			}

			.tg th{font-family:Arial, sans-serif;font-size:14px;font-weight:normal;padding: 0px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:black;}

			.ttd {
				margin-left:80vw;
			}

			p {
				font-size: 10px;
			}

		}

	</style>
</head>
<!-- end::Head -->
<!-- end::Body -->
<body class="m-page--fluid m--skin- m-content--skin-light2 m-header--fixed m-header--fixed-mobile m-aside-left--enabled m-aside-left--skin-dark m-aside-left--offcanvas m-footer--push m-aside--offcanvas-default">
	<div class="m-content">
		<div class="face face-front">
			<div class="row">
				<div class="col-xl-12">
					<div class="m-portlet m-portlet--tab">
						<div class="m-portlet__head header">
							<div style="margin-top: 10px" align="center">
								<table>
									<tr>
										<td>
											<img style="height: auto;width: 150px" src="<?= base_url() ?>assets/img/logo ssm2.png">
											
											<p style="text-align: center; font-size: 8px"> Jl. Sungai Cilendu No. 34-32 Makassar <br> Telp: 0411-3622999-3613218, Fax : 0411-3628899</p>
											
										</td>
										
									</tr>
								</table>
								<hr>
								
								
								


								<!-- <h5>Tipe Pajak : <span name="tipe_pajak">Non-Pajak</span></h5> -->
							</div>
							<div style="margin-top: 10px" >
								<div class="col-sm-12">
								<p style="text-align : right;">Reff : <?= $data->reff ?> <br> Hal : Penawaran Harga AC <br> Lamp : 1 Lembar</p>
									<p>
										Perihal : <span name="perihal"><?= $data->perihal ?></span>
									</p>
									<p>
										Kepada Yth, <br>
										<span name="nama_penerima"><b><?= $data->penerima ?></b></span>
									</p>

								</div>
								
							</div>	
						</div>
						<div class="m-portlet__body">
							<h4 align="center">
								Item
							</h4>
							<table style="width: 100%" class="tg">
								<tr style="background-color: blue; color: white;">
									<td style="" class="tg-s268" > <strong> No</strong></td>
									<td style="" class="tg-s268" > <strong>Type</strong></td>
									<td style="" class="tg-s268" ><strong> Model</strong></td>
									<td style="" class="tg-s268" > <strong>Btu/hr</strong></td>
									<td style="" class="tg-s268" > <strong>Daya Listrik (W)</strong></td>
									<td style="" class="tg-s268" > <strong>Q'ty</strong></td>
									<td style="" class="tg-s268" > <strong>Harga</strong></td>
									<td style="" class="tg-s268" > <strong>Total Harga</strong></td>
								</tr>
								<?php 

									$subtotal = 0;
									$total = 0;

									$no = 1;
									foreach ($data->list_item as $value) { ?>
										<tr>
											<th class="text-center" ><?= $no; ?></th>
											<th class="text-center"><?= $value['tipe']; ?></th>
											<th class="text-center"><?= $value['model']; ?></th>
											<th class="text-center"><?= $value['btu_hr']; ?></th>
											<th class="text-center"><?= $value['daya_listrik']; ?></th>
											<th class="text-center"><?= $value['jumlah']; ?></th>
											<th class="text-center">Rp.<?= number_format($value['harga']); ?></th>
											<th class="text-center">Rp.<?= number_format($value['harga'] * $value['jumlah']); ?></th>
										</tr>
								<?php 
									$subtotal += $value['harga'] * $value['jumlah'];
									$no++; 
								} ?>
							</table>
							<h4 style="margin-top: 25px" align="center">
								Jasa Pemasangan dan Material
							</h4>
							<table style="width: 100%" class="tg">
								<tr style="background-color: blue; color: white">
									<td style="" class="text-center" ><strong>No</strong></td>
									<td style="" class="text-center" ><strong>Uraian Pekerjaan</strong></td>
									<td style="" class="text-center" ><strong>Model</strong></td>
									<td style="" class="text-center" ><strong>Q'ty</strong></td>
									<td style="" class="text-center" ><strong>Harga</strong></td>
									<td style="" class="text-center" ><strong>Total Harga</strong></td>
								</tr>
								<?php 
									$jasa_pemasangan = 0;
									$noo = 1;
									foreach ($data->jasa_pemasangan as $value) { ?>
										<tr>
											<th class="text-center" ><?= $noo; ?></th>
											<th class="text-center"><?= $value['uraian_pekerjaan']; ?></th>
											<th class="text-center"><?= $value['model']; ?></th>
											<th class="text-center"><?= $value['jumlah']; ?></th>
											<th class="text-center">Rp.<?= number_format($value['harga']); ?></th>
											<th class="text-center">Rp.<?= number_format($value['total'] * $value['jumlah']); ?></th>
										</tr>
								<?php 
									$jasa_pemasangan += $value['total'] * $value['jumlah'];
									$noo++; 
								} 

									$total += $subtotal + $jasa_pemasangan;

								?>
								<tr>
									<td  colspan="5" style="text-align: right;" class="tg-s260" >Subtotal</td>
								
x									<td style="" class="text-center" >Rp.<?= number_format($subtotal); ?></td>
								</tr>
								<tr style="background-color: orange; ">
									<td  colspan="4" style="text-align: right;" class="tg-s260" ><strong>Pemasangan + Instalasi dan Material </strong> </td>
								
									<td style="" class="text-right"> <strong> Total</strong> </td>
									<td style="" class="text-center"><strong>Rp.<?= number_format($total); ?></strong> </td>
								</tr>
							</table>
						</div>
						<div style="margin-left: 50px;">
							<h5>Keterangan :</h5> <br>
							<p>
								* Harga instalasi tersebut sudah termasuk pekerjaan instalasi pipa refrigrant, kabel kontrol, instalasi remote controller
							<br>
								* Harga tersebut sudah termasuk PPN 10%
							<br>
								* Harga tersebut sesuai dengan BQ yang kami tawarkan, apabila tidak sesuai maka, akan diperhitungkan
							<br>
								* Syarat pembayaran unit cash
							<br>
								* Syarat pembayaran instalasi 30% dan sisanya setelah instalasi
							<br>
								* Garansi resmi daikin 12 bulan sparepart & jasa dan 36 bulan compressor
							<br>
								* Garansi Jasa Instalasi 3 Bulan
							<br>
								* Harga tersebut diatas tidak termasuk MCB & Kabel Power
							<br>
								* Harga tersebut tidak terkait, sewaktu-waktu dapat berubah tanpa pemberitahuan sebelumnya
							<br>
								Demikian penawaaran harga dari kami, atas perhatian dan kerjasama yang baik kami ucapkan terimakasih.
							</p>
						</div>
						<div class="row ttd">
							<div class="col-xl-3 offset-xl-9">
								<p>Makassar,              </p>
								<p>Hormat Kami</p><br><br><br>
								<p><u><b>Ricky Yapardhana</b></u></p>
								<p>Direktur</p>
							</div>
						</div>
					</div>
				</div>	
			</div>
		</div>
	</div>
</body>
<!-- end::Body -->
<script src="<?= base_url() ?>assets/vendors/base/vendors.bundle.js" type="text/javascript"></script>
<script src="<?= base_url() ?>assets/demo/default/base/scripts.bundle.js" type="text/javascript"></script>
<script src="<?= base_url() ?>assets/app/js/dashboard.js" type="text/javascript"></script>

<script type="text/javascript">
			var delayInMilliseconds = 1000; //1 second

			setTimeout(function() {
				print();	
			}, delayInMilliseconds);
		</script> 
		</html>
