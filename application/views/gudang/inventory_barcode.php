<!DOCTYPE html>
<html lang="en" >
<!-- begin::Head -->
<head>
	<meta charset="utf-8" />
	<title>
		Barcode item Inventory
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
	<link rel="shortcut icon" href="../assets/demo/default/media/img/logo/favicon.ico" />
	<style>
		@media print {

			.table {
				min-height : 275px !important;
			}

			th {
				font-size: 1.7rem !important;
			}

			td {
				font-size: 1.7rem !important;
			}

			p {
				font-size: 1.8rem !important;
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
				min-height: 0 !important;
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

			#barcode {
				height: auto;
				width: 600px;
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
					<div>
						<svg id="barcode"></svg>
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
<script src="<?= base_url() ?>assets/vendors/custom/jsbarcode/JsBarcode.all.min.js"></script>
<script type="text/javascript">
	print();
</script>
<script>
	JsBarcode("#barcode", "<?= $no_seri ?>");
</script>
</html>
