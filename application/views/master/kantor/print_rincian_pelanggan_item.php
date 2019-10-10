<!DOCTYPE html>
<html lang="en" >
<!-- begin::Head -->
<head>
	<meta charset="utf-8" />
	<title>
		Barcode item Pelanggan
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
	<link href="<?=site_url()?>assets/vendors/custom/fullcalendar/fullcalendar.bundle.css" rel="stylesheet" type="text/css" />
	<!--end::Page Vendors -->
	<link href="<?=site_url()?>assets/vendors/base/vendors.bundle.css" rel="stylesheet" type="text/css" />
	<link href="<?=site_url()?>assets/demo/default/base/style.bundle.css" rel="stylesheet" type="text/css" />
	<!-- begin:: Style tambahan -->
	<link href="<?=site_url()?>assets/demo/default/base/pelangi-style.css" rel="stylesheet" type="text/css">
	<link href="<?=site_url()?>assets/demo/default/base/sejuk-sukses-style.css" rel="stylesheet" type="text/css">
	<!-- <link href="<?=site_url()?>assets/demo/default/base/card-a5.css" rel="stylesheet" type="text/css" -->
	<!-- end:: Style tambahan -->
	<!--end::Base Styles -->
	<link rel="shortcut icon" href="<?=site_url()?>assets/demo/default/media/img/logo/favicon.ico" />


<style type="text/css">
.tg  {border-collapse:collapse;border-spacing:0;border-color:#ccc;}
.tg td{font-family:Arial, sans-serif;font-size:14px;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:#ccc;color:#333;background-color:#fff;}
.tg th{font-family:Arial, sans-serif;font-size:14px;font-weight:normal;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:#ccc;color:#333;background-color:#f0f0f0;}
.tg .tg-0pky{border-color:inherit;text-align:left;vertical-align:top}
</style>
</head>
<!-- end::Head -->
<!-- end::Body -->
<body class="m-page--fluid m--skin- m-content--skin-light2 m-header--fixed m-header--fixed-mobile m-aside-left--enabled m-aside-left--skin-dark m-aside-left--offcanvas m-footer--push m-aside--offcanvas-default">
	<div class="m-content">
		<div class="face face-front">
			<div class="row">
				<div class="col-xl-12">

					<table class="tg">
					  <tr>
					    <th class="tg-0pky" rowspan="2">
					    	<img style="margin-top: 20px;" width="100" src="<?=site_url()?>assets/demo/default/media/img/misc/logo_print.png">

					    </th>
					    <th class="tg-0pky">
					    	<img width="100" src="<?=site_url('kantor/customer/generate-barcode?d='.$data->id.'&sy=1&sx=1&ts=3&th=12')?>">
					   </th>
					  </tr>
					  <tr>
					    <td class="tg-0pky"><?=$data->id?></td>
					  </tr>
					</table>

				</div>
			</div>
		</div>
	</div>
</body>
<!-- end::Body -->
<script src="<?=site_url()?>assets/vendors/base/vendors.bundle.js" type="text/javascript"></script>
<script src="<?=site_url()?>assets/demo/default/base/scripts.bundle.js" type="text/javascript"></script>
<script src="<?=site_url()?>assets/app/js/dashboard.js" type="text/javascript"></script>
<script type="text/javascript">
	print();
	close();
</script>
</html>
