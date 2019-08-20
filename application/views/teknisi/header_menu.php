	<!DOCTYPE html>
	<html lang="en" >
	<!-- begin::Head -->
	<head>
		<meta charset="utf-8" />
		<title>
			Teknisi | Dashboard
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
		<link href="<?=base_url()?>assets/vendors/custom/fullcalendar/fullcalendar.bundle.css" rel="stylesheet" type="text/css" />
		<!--end::Page Vendors -->
		<link href="<?=base_url()?>assets/vendors/base/vendors.bundle.css" rel="stylesheet" type="text/css" />
		<link href="<?=base_url()?>assets/demo/default/base/style.bundle.css" rel="stylesheet" type="text/css" />
		<!-- begin:: Style tambahan -->
        <link href="<?=base_url()?>assets/demo/default/base/pelangi-style.css" rel="stylesheet" type="text/css">
        <link href="<?=base_url()?>assets/demo/default/base/sejuk-sukses-style.css" rel="stylesheet" type="text/css">
		<link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/teknisi-css/mobile_teknisi.css">
		<!-- end:: Style tambahan -->
		<!--end::Base Styles -->
		<link rel="shortcut icon" href="<?=base_url()?>assets/demo/default/media/img/logo/favicon.ico" />

		<style type="text/css">
            .swal2-icon.swal2-question { font-size: 13px; line-height: 65px; }
            .swal2-icon.swal2-warning { font-size: 13px; line-height: 65px; }
            .swal2-icon.swal2-info { font-size: 13px; line-height: 65px; }
            .swal2-icon.swal2-error { font-size: 13px; line-height: 65px; }
		</style>

		<!--begin::Base Scripts -->
		<script src="<?=base_url()?>assets/vendors/base/vendors.bundle.js" type="text/javascript"></script>
		<script src="<?=base_url()?>assets/demo/default/base/scripts.bundle.js" type="text/javascript"></script>
		<!--end::Base Scripts -->

        <script src="<?=base_url()?>assets/vendors/custom/sweetalert2/sweetalert2.all.min.js"></script>
        <script src="<?=base_url()?>assets/vendors/custom/promise-polyfill/promise.min.js"></script>
        <script src="<?=base_url()?>assets/app/js/helper.js" type="text/javascript"></script>

	</head>
	<!-- end::Head -->
	<!-- end::Body -->
	<body class="m-page--fluid m--skin- m-content--skin-light2 m-header--fixed m-header--fixed-mobile m-aside-left--enabled m-aside-left--skin-dark m-aside-left--offcanvas m-footer--push m-aside--offcanvas-default">
		<!-- begin:: Page -->
		<div class="m-subheader ">
			<div class="d-flex align-items-center">
				<div class="mr-auto col-sm">
					<a href="<?=site_url('teknisi')?>"><img style="height: auto; width: 200px;" src="<?=base_url()?>assets/teknisi-css/assets/img/logo-mobile.png"></a>
				</div>
				<div align="right" class="col-sm">

					<div class="dropdown">
						<button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							<span style="color: #30bcb8;font-size: 2.5rem" class="fa fa-user-circle-o"></span>
						</button>
						<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
							<!-- <a class="dropdown-item" href="#">Ganti Password</a> -->
							<a class="dropdown-item" href="<?= base_url() ?>teknisi/logout">Logout</a>
						</div>
					</div>

				</div>
			</div>
		</div>
