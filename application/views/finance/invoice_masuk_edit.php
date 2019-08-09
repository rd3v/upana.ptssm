<!DOCTYPE html>

	<html lang="en" >
	<!-- begin::Head -->
	<head>
		<meta charset="utf-8">
		<title>
			ADMIN <?= strtoupper($data['user']['accesstype']) ?>
		</title>
		<meta name="description" content="Sejuk Sukses Mandiri">
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

			var base_url = '<?=base_url()?>';
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
					font-size: 1.1rem;
					font-weight: 600;
					background-color: #2f39ad;
					color: white
				}
				.tg .tg-s269{
					text-align:center;
					font-size: 1.1rem;
					font-weight: 600;
					background-color: #2fad33;
					color: white
				}
				.tg .tg-s260{
					text-align:center;
					font-size: 1rem;
					font-weight: 600;
				}
				.tlu {
					border-top: transparent !important;
				}
			</style>

	</head>
	<!-- end::Head -->
	<!-- end::Body -->
	<body class="m-page--fluid m--skin- m-content--skin-light2 m-header--fixed m-header--fixed-mobile m-aside-left--enabled m-aside-left--skin-dark m-aside-left--offcanvas m-footer--push m-aside--offcanvas-default">
		<!-- begin:: Page -->
		<div class="m-grid m-grid--hor m-grid--root m-page">
			<!-- BEGIN: Header -->
			<header class="m-grid__item    m-header "  data-minimize-offset="200" data-minimize-mobile-offset="200" >
				<div class="m-container m-container--fluid m-container--full-height">
					<div class="m-stack m-stack--ver m-stack--desktop">
						<div class="m-stack m-stack--ver m-stack--desktop">
							<!-- BEGIN: Brand -->
							<div class="m-stack__item m-brand  m-brand--skin-dark ">
								<div class="m-stack m-stack--ver m-stack--general">
									<div class="m-stack__item m-stack__item--middle m-brand__logo">
										<a href="<?= base_url() ?>" class="m-brand__logo-wrapper">
											<img alt="" src="<?= base_url() ?>assets/demo/default/media/img/logo/Logo_pt_ssm.png"/>
										</a>
									</div>
									<div class="m-stack__item m-stack__item--middle m-brand__tools">
										<!-- BEGIN: Left Aside Minimize Toggle -->
										<a href="javascript:;" id="m_aside_left_minimize_toggle" class="m-brand__icon m-brand__toggler m-brand__toggler--left m--visible-desktop-inline-block">
											<span></span>
										</a>
										<!-- END -->
										<!-- BEGIN: Responsive Aside Left Menu Toggler -->
										<a href="javascript:;" id="m_aside_left_offcanvas_toggle" class="m-brand__icon m-brand__toggler m-brand__toggler--left m--visible-tablet-and-mobile-inline-block">
											<span></span>
										</a>
										<!-- END -->
										<!-- BEGIN: Responsive Header Menu Toggler -->
										<a id="m_aside_header_menu_mobile_toggle" href="javascript:;" class="m-brand__icon m-brand__toggler m--visible-tablet-and-mobile-inline-block">
											<span></span>
										</a>
										<!-- END -->
										<!-- BEGIN: Topbar Toggler -->
										<a id="m_aside_header_topbar_mobile_toggle" href="javascript:;" class="m-brand__icon m--visible-tablet-and-mobile-inline-block">
											<i class="flaticon-more"></i>
										</a>
										<!-- BEGIN: Topbar Toggler -->
									</div>
								</div>
							</div>
							<!-- END: Brand -->
							<div class="m-stack__item m-stack__item--fluid m-header-head" id="m_header_nav">
								<!-- BEGIN: Horizontal Menu -->
								<div id="m_header_menu" class="m-header-menu m-aside-header-menu-mobile m-aside-header-menu-mobile--offcanvas  m-header-menu--skin-light m-header-menu--submenu-skin-light m-aside-header-menu-mobile--skin-dark m-aside-header-menu-mobile--submenu-skin-dark "  >
									<?php
										switch($data['user']['accesstype']) {
											case "kantor":
												echo "<img style='display: inline; float: left; height: 60px; width: auto' src='".base_url()."assets/demo/default/media/img/misc/admin_kantor.png'>";
											break;
											case "finance":
												echo "<img style='display: inline; float: left; height: 60px; width: auto' src='".base_url()."assets/demo/default/media/img/misc/admin_finance.png'>";
											break;
											case "hrd":
												echo "<img style='display: inline; float: left; height: 60px; width: auto' src='".base_url()."assets/demo/default/media/img/misc/hrd.png'>";
											break;
											case "gudang":
												echo "<img style='display: inline; float: left; height: 60px; width: auto' src='".base_url()."assets/demo/default/media/img/misc/Asset 5@2x.png'>";
											break;
										}
									?>
								</div>
								<!-- END: Horizontal Menu -->
								<!-- BEGIN: Topbar -->
								<div id="m_header_topbar" class="m-topbar  m-stack m-stack--ver m-stack--general">
									<div class="m-stack__item m-topbar__nav-wrapper inline">
										<ul class="m-topbar__nav m-nav m-nav--inline">
											<li class="m-nav__item m-topbar__user-profile m-topbar__user-profile--img  m-dropdown m-dropdown--medium m-dropdown--arrow m-dropdown--header-bg-fill m-dropdown--align-right m-dropdown--mobile-full-width m-dropdown--skin-light" data-dropdown-toggle="click">
												<div class="user_wrapper">
													<p style="margin-top: 12px"><i class="fa fa-user"> </i> <?= $data['user']['name'] ?></p>
												</div>
											</li>
											<li class="m-nav__item m-topbar__user-profile m-topbar__user-profile--img  m-dropdown m-dropdown--medium m-dropdown--arrow m-dropdown--header-bg-fill m-dropdown--align-right m-dropdown--mobile-full-width m-dropdown--skin-light" data-dropdown-toggle="click">
												<div class="logout_wrapper">
													<a margin-right: 10px;" href="<?= base_url() ?>logout" onclick="return confirm('Keluar Aplikasi ?')" class="btn m-btn--pill btn-secondary m-btn m-btn--custom m-btn--label-brand m-btn--bolder">
														Logout
													</a>
												</div>
											</li>
										</ul>
									</div>
								</div>
								<!-- END: Topbar -->
							</div>
						</div>
					</div>
				</div>
			</header>
			<!-- END: Header -->
			<!-- begin::Body -->
			<div class="m-grid__item m-grid__item--fluid m-grid m-grid--ver-desktop m-grid--desktop m-body">
				<!-- BEGIN: Left Aside -->
				<button class="m-aside-left-close  m-aside-left-close--skin-dark " id="m_aside_left_close_btn">
					<i class="la la-close"></i>
				</button>
				<div id="m_aside_left" class="m-grid__item	m-aside-left  m-aside-left--skin-dark ">
					<!-- BEGIN: Aside Menu -->
					<div id="m_ver_menu" class="m-aside-menu  m-aside-menu--skin-dark m-aside-menu--submenu-skin-dark" data-menu-vertical="true" data-menu-scrollable="false" data-menu-dropdown-timeout="500" >
						<!-- ASIDE MENU DISINI -->
						<ul class="m-menu__nav  m-menu__nav--dropdown-submenu-arrow ">

							<?php
								switch($data['user']['accesstype']) {
									case "kantor": ?>

										<li id="dashboard" class="m-menu__item " aria-haspopup="true" >
											<a  href="<?= base_url() ?>kantor" class="m-menu__link ">
												<i class="m-menu__link-icon flaticon-line-graph"></i>
												<span class="m-menu__link-title">
													<span class="m-menu__link-wrap">
														<span class="m-menu__link-text">
															Dashboard
														</span>
													</span>
												</span>
											</a>
										</li>
										<!-- Manajemen Pelanggan -->
										<li id="customer" class="m-menu__item " aria-haspopup="true" >
											<a  href="<?= base_url() ?>kantor/customer" class="m-menu__link ">
												<i class="m-menu__link-icon fa 	fa-user-circle-o"></i>
												<span class="m-menu__link-title">
													<span class="m-menu__link-wrap">
														<span class="m-menu__link-text">
															Manajemen Pelanggan
														</span>
													</span>
												</span>
											</a>
										</li>
										<!-- Manajemen Pesanan-->
										<li id="order" class="m-menu__item m-menu__item--submenu" aria-haspopup="true" data-menu-submenu-toggle="hover">
											<a href="#" class="m-menu__link m-menu__toggle">
												<i class="m-menu__link-icon flaticon-folder-2"></i>
												<span class="m-menu__link-text">
													Manajemen Pesanan
												</span>
												<i style="font-size: 1.5rem" class="m-menu__ver-arrow fa fa-caret-right"></i>
											</a>
											<div class="m-menu__submenu " style="">
												<span class="m-menu__arrow"></span>
												<ul class="m-menu__subnav">
													<li class="m-menu__item  m-menu__item--parent" aria-haspopup="true">
														<span class="m-menu__link">
															<span class="m-menu__link-text">
																Pesanan
															</span>
														</span>
													</li>
													<li id="spk-pemasangan" class="m-menu__item " aria-haspopup="true">
														<a href="<?= base_url() ?>kantor/spk-pemasangan" class="m-menu__link ">
															<i class="m-menu__link-bullet m-menu__link-bullet--dot">
																<span></span>
															</i>
															<span class="m-menu__link-text">
																SPK Pemasangan
															</span>
														</a>
													</li>
													<li id="spk-service" class="m-menu__item " aria-haspopup="true">
														<a href="<?= base_url() ?>kantor/spk-service"  class="m-menu__link ">
															<i class="m-menu__link-bullet m-menu__link-bullet--dot">
																<span></span>
															</i>
															<span class="m-menu__link-text">
																SPK Service
															</span>
														</a>
													</li>
													<li id="spk-free" class="m-menu__item " aria-haspopup="true">
														<a href="<?= base_url() ?>kantor/spk-free"  class="m-menu__link ">
															<i class="m-menu__link-bullet m-menu__link-bullet--dot">
																<span></span>
															</i>
															<span class="m-menu__link-text">
																SPK Free
															</span>
														</a>
													</li>
													<li id="spk-komplain" class="m-menu__item " aria-haspopup="true">
														<a href="<?= base_url() ?>kantor/spk-komplain"  class="m-menu__link ">
															<i class="m-menu__link-bullet m-menu__link-bullet--dot">
																<span></span>
															</i>
															<span class="m-menu__link-text">
																SPK Komplain
															</span>
														</a>
													</li>
													<li id="spk-survey" class="m-menu__item " aria-haspopup="true">
														<a href="<?= base_url() ?>kantor/spk-survey"  class="m-menu__link ">
															<i class="m-menu__link-bullet m-menu__link-bullet--dot">
																<span></span>
															</i>
															<span class="m-menu__link-text">
																SPK Survey
															</span>
														</a>
													</li>
												</ul>
											</div>
										</li>
										<!-- Manajemen Penawaran -->
										<li id="offer" class="m-menu__item" aria-haspopup="true" >
											<a  href="<?= base_url() ?>kantor/penawaran" class="m-menu__link ">
												<i class="m-menu__link-icon fa 	fa-handshake-o"></i>
												<span class="m-menu__link-title">
													<span class="m-menu__link-wrap">
														<span class="m-menu__link-text">
															Manajemen Penawaran
														</span>
													</span>
												</span>
											</a>
										</li>
										<!-- Manajemen Stock -->
										<li id="stock" class="m-menu__item" aria-haspopup="true" >
											<a  href="<?= base_url() ?>kantor/stock" class="m-menu__link ">
												<i class="m-menu__link-icon flaticon-list-1"></i>
												<span class="m-menu__link-title">
													<span class="m-menu__link-wrap">
														<span class="m-menu__link-text">
															Manajemen Stock
														</span>
													</span>
												</span>
											</a>
										</li>
										<!-- Harga Item dan Jasa -->
										<li id="price" class="m-menu__item" aria-haspopup="true" >
											<a  href="<?= base_url() ?>kantor/price" class="m-menu__link ">
												<i class="m-menu__link-icon la la-list"></i>
												<span class="m-menu__link-title">
													<span class="m-menu__link-wrap">
														<span class="m-menu__link-text">
															Manajemen Harga
														</span>
													</span>
												</span>
											</a>
										</li>

									<?php
									break;
									case "finance": ?>

										<!--Invoice Masuk-->
										<li id="invoice_masuk" class="m-menu__item" aria-haspopup="true" >
											<a  href="<?= base_url() ?>finance/invoice/masuk" class="m-menu__link ">
												<i class="m-menu__link-icon fa 	fa-wpforms"></i>
												<span class="m-menu__link-title">
													<span class="m-menu__link-wrap">
														<span class="m-menu__link-text">
															Invoice Masuk
														</span>
													</span>
												</span>
											</a>
										</li>


										<!-- Manajemen Barang -->
										<!--Manajemen Invoice Keluar-->
										<li id="invoice_keluar" class="m-menu__item m-menu__item--submenu" aria-haspopup="true" data-menu-submenu-toggle="hover">
											<a href="#" class="m-menu__link m-menu__toggle">
												<i class="m-menu__link-icon flaticon-folder-2"></i>
												<span class="m-menu__link-text">
													Manajemen Invoice Keluar
												</span>
												<i style="font-size: 1.5rem" class="m-menu__ver-arrow fa fa-caret-right"></i>
											</a>
											<div class="m-menu__submenu " style="">
												<span class="m-menu__arrow"></span>
												<ul class="m-menu__subnav">
													<li class="m-menu__item  m-menu__item--parent" aria-haspopup="true">
														<span class="m-menu__link">
															<span class="m-menu__link-text">
																Manajemen Invoice Keluar
															</span>
														</span>
													</li>
													<li id="invoice_keluar_barang" class="m-menu__item " aria-haspopup="true">
														<a href="<?= base_url() ?>finance/invoice/keluar/barang" class="m-menu__link ">
															<i class="m-menu__link-bullet m-menu__link-bullet--dot">
																<span></span>
															</i>
															<span class="m-menu__link-text">
																Invoice Barang
															</span>
														</a>
													</li>
													<li id="invoice_keluar_material" class="m-menu__item " aria-haspopup="true">
														<a href="<?= base_url() ?>finance/invoice/keluar/material"  class="m-menu__link ">
															<i class="m-menu__link-bullet m-menu__link-bullet--dot">
																<span></span>
															</i>
															<span class="m-menu__link-text">
																Invoice Material
															</span>
														</a>
													</li>
												</ul>
											</div>
										</li>

										<!-- Management Stock -->
										<li id="stock" class="m-menu__item  " aria-haspopup="true" >
											<a href="<?= base_url() ?>finance/stock" class="m-menu__link ">
												<i class="m-menu__link-icon  flaticon-open-box"></i>
												<span class="m-menu__link-title">
													<span class="m-menu__link-wrap">
														<span class="m-menu__link-text">
															Management Stock
														</span>
													</span>
												</span>
											</a>
										</li>
										<!-- Manajemen Harga -->
										<li id="price" class="m-menu__item" aria-haspopup="true" >
											<a href="<?= base_url() ?>finance/price" class="m-menu__link ">
												<i class="m-menu__link-icon la la-list"></i>
												<span class="m-menu__link-title">
													<span class="m-menu__link-wrap">
														<span class="m-menu__link-text">
															Manajemen Harga
														</span>
													</span>
												</span>
											</a>
										</li>

									<?php
									break;
									case "hrd": ?>

										<!-- Manajemen Penugasan -->
										<li id="manajemen-penugasan" class="m-menu__item" aria-haspopup="true" >
											<a href="<?= base_url() ?>hrd" class="m-menu__link ">
												<i class="m-menu__link-icon fa fa-puzzle-piece"></i>
												<span class="m-menu__link-title">
													<span class="m-menu__link-wrap">
														<span class="m-menu__link-text">
															Manajemen Penugasan
														</span>
													</span>
												</span>
											</a>
										</li>
										<!-- Kepuasan Pelanggan -->
										<li id="kepuasan-pelanggan" class="m-menu__item" aria-haspopup="true" >
											<a  href="<?= base_url() ?>hrd/kepuasan-pelanggan" class="m-menu__link ">
												<i class="m-menu__link-icon fa 	fa-thumbs-up"></i>
												<span class="m-menu__link-title">
													<span class="m-menu__link-wrap">
														<span class="m-menu__link-text">
															Kepuasan Pelanggan
														</span>
													</span>
												</span>
											</a>
										</li>
										<!-- Manajemen User -->
										<li id="manajemen-user" class="m-menu__item  " aria-haspopup="true" >
											<a  href="<?= base_url() ?>hrd/manajemen/user" class="m-menu__link ">
												<i class="m-menu__link-icon fa 		fa-user-o"></i>
												<span class="m-menu__link-title">
													<span class="m-menu__link-wrap">
														<span class="m-menu__link-text">
															Manajemen User
														</span>
													</span>
												</span>
											</a>
										</li>
									<?php
									break;
									case "gudang": ?>

										<!-- DASHBOARD -->
										<li id="dashboard" class="m-menu__item" aria-haspopup="true" >
											<a  href="<?= base_url() ?>gudang" class="m-menu__link ">
												<i class="m-menu__link-icon flaticon-line-graph"></i>
												<span class="m-menu__link-title">
													<span class="m-menu__link-wrap">
														<span class="m-menu__link-text">
															Dashboard
														</span>
													</span>
												</span>
											</a>
										</li>
										<!-- Barang Masuk -->
										<li id="barang" class="m-menu__item" aria-haspopup="true" >
											<a  href="<?= base_url() ?>gudang/barang/masuk" class="m-menu__link ">
												<i class="m-menu__link-icon fa fa-shopping-cart"></i>
												<span class="m-menu__link-title">
													<span class="m-menu__link-wrap">
														<span class="m-menu__link-text">
															Barang Masuk
														</span>
													</span>
												</span>
											</a>
										</li>
										<!-- Surat jalan-->
										<li id="surat" class="m-menu__item" aria-haspopup="true" >
											<a  href="<?= base_url() ?>gudang/surat-jalan" class="m-menu__link ">
												<i class="m-menu__link-icon flaticon-transport"></i>
												<span class="m-menu__link-title">
													<span class="m-menu__link-wrap">
														<span class="m-menu__link-text">
															Surat jalan
														</span>
													</span>
												</span>
											</a>
										</li>
										<!-- Pengeluaran Material -->
										<li id="material" class="m-menu__item" aria-haspopup="true" >
											<a  href="<?= base_url() ?>gudang/material/keluar" class="m-menu__link ">
												<i class="m-menu__link-icon la 	la-stack-overflow"></i>
												<span class="m-menu__link-title">
													<span class="m-menu__link-wrap">
														<span class="m-menu__link-text">
															Pengeluaran Material
														</span>
													</span>
												</span>
											</a>
										</li>
										<!-- Inventory-->
										<li id="inventory" class="m-menu__item" aria-haspopup="true" >
											<a  href="<?= base_url() ?>gudang/inventory" class="m-menu__link ">
												<i class="m-menu__link-icon fa 	fa-cube"></i>
												<span class="m-menu__link-title">
													<span class="m-menu__link-wrap">
														<span class="m-menu__link-text">
															Inventory
														</span>
													</span>
												</span>
											</a>
										</li>
										<!-- Stock -->
										<li id="stock-manajemen" class="m-menu__item" aria-haspopup="true" >
											<a  href="<?= base_url() ?>gudang/stock/manajemen" class="m-menu__link ">
												<i class="m-menu__link-icon flaticon-list-1"></i>
												<span class="m-menu__link-title">
													<span class="m-menu__link-wrap">
														<span class="m-menu__link-text">
															Manajemen Stock
														</span>
													</span>
												</span>
											</a>
										</li>
										<!-- Master Stock -->
										<li id="stock-master" class="m-menu__item" aria-haspopup="true" >
											<a  href="<?= base_url() ?>gudang/stock/master" class="m-menu__link ">
												<i class="m-menu__link-icon flaticon-open-box"></i>
												<span class="m-menu__link-title">
													<span class="m-menu__link-wrap">
														<span class="m-menu__link-text">
															Master stock
														</span>
													</span>
												</span>
											</a>
										</li>

									<?php
									break;
									case "teknisi":

									break;
								}
							?>


						</ul>
					</div>
					<!-- END: Aside Menu -->
				</div>
				<!-- END: Left Aside -->

<div class="m-grid__item m-grid__item--fluid m-wrapper">
					<!-- BEGIN: Subheader -->
					<div class="m-subheader ">
						<div class="d-flex align-items-center">
							<div class="mr-auto">
								<h3 class="m-subheader__title m-subheader__title--separator">
									Invoice Masuk
								</h3>
								<ul class="m-subheader__breadcrumbs m-nav m-nav--inline">
									<li class="m-nav__item m-nav__item--home">
										<a href="<?= base_url() ?>finance/invoice/masuk" class="m-nav__link m-nav__link--icon">
											<i class="m-nav__link-icon la la-home"></i>
										</a>
									</li>
									<li class="m-nav__separator">
										-
									</li>
									<li class="m-nav__item">
										<a href="<?= base_url() ?>finance/invoice/masuk" class="m-nav__link">
											<span class="m-nav__link-text">
												Invoice Masuk
											</span>
										</a>
									</li>

									<li class="m-nav__separator">
										-
									</li>
									<li class="m-nav__item">
										<a href="<?= base_url() ?>finance/invoice/masuk/edit/<?= $data['result']->no_invoice ?>" class="m-nav__link">
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
									<div class="input_invoice_barang">
										<div class="m-portlet__head">
											<div class="m-portlet__head-caption">
												<div class="m-portlet__head-title">
													<span class="m-portlet__head-icon m--hide">
														<i class="la la-gear"></i>
													</span>
													<h3 class="m-portlet__head-text">
														Input Invoice Masuk
													</h3>
												</div>
											</div>
										</div>
										<!--begin::Form-->
										<form class="m-form m-form--fit m-form--label-align-right">
											<div class="m-portlet__body">
												<input type="hidden" name="invoice_id" value="<?= $data['result']->id ?>" id="invoice_id">
												<div class="form-group m-form__group row">
													<label  class="col-2 col-form-label">
														No. Invoice
													</label>
													<div class="col-10">
														<input readonly class="form-control m-input" type="text" id="no_invoice" value="<?= $data['result']->no_invoice ?>">
													</div>
												</div>
												<div class="form-group m-form__group row">
													<label class="col-2 col-form-label">
														Tanggal Invoice
													</label>
													<div class="col-10">
														
														<input class="form-control m-input" type="date" id="tanggal_pembuatan_invoice" value="<?= $data['result']->tanggal ?>">
													</div>
												</div>
												
												<div class="form-group m-form__group row">
													<label  class="col-2 col-form-label">
														Nama Supplier
													</label>
													<div class="col-10">
														<input class="form-control m-input" type="text" id="nama_supplier" value="<?= $data['result']->nama_supplier ?>">
													</div>
												</div>
												<div class="form-group m-form__group row">
													<label  class="col-2 col-form-label">
														Nomor Telpon
													</label>
													<div class="col-10">
														<input class="form-control m-input" type="number" id="no_telpon" value="<?= $data['result']->telepon ?>">
													</div>
												</div>
												<div class="form-group m-form__group row">
													<label for="example-email-input" class="col-2 col-form-label">
														Email
													</label>
													<div class="col-10">
														<input class="form-control m-input" type="email" id="email_supplier" value="<?= $data['result']->email ?>">
													</div>
												</div>
												<div class="form-group m-form__group row">
													<label  class="col-2 col-form-label">
														Alamat
													</label>
													<div class="col-10">
														<input class="form-control m-input" type="text" id="alamat_supplier" value="<?= $data['result']->alamat ?>">
													</div>
												</div>
												<div class="form-group m-form__group row">
													<label  class="col-2 col-form-label">
														NPWP Supplier
													</label>
													<div class="col-10">
														<input class="form-control m-input" type="text" id="npwp_supplier" value="<?= $data['result']->npwp_supplier ?>">
													</div>
												</div>
												<div class="form-group m-form__group row">
													<label  class="col-2 col-form-label">
														Status
													</label>
													<div class="col-10">
														<select style="width: 100%" class="form-control" name="Status" id="status">
															<option value=""></option>
															<option <?= $data['result']->status == "0" ? "selected":"" ?> value="0">
																Belum Lunas
															</option>
															<option <?= $data['result']->status == "1" ? "selected":"" ?> value="1">
																Lunas
															</option>
														</select>
													</div>
												</div>
												<div class="form-group m-form__group row">
													<label  class="col-2 col-form-label">
														Gudang
													</label>
													<div class="col-10">
														<select style="width: 100%" class="form-control" name="gudang" id="gudang">
															<option value=""></option>
															<option <?= $data['result']->gudang == "1" ? "selected":"" ?> value="1">
																Toko <italic>(Non Pajak)</italic>
															</option>
															<option <?= $data['result']->gudang == "2" ? "selected":"" ?> value="2">
																Kantor <italic>(Pajak)</italic>
															</option>
														</select>
													</div>
												</div>
												<div style="margin-top: 20px" align="center">
													<button data-toggle="modal" data-target="#modal_tambah_item" type="button" class="btn btn-success btn_pemasangan"> + Tambah Item</button>
												</div>
											</div>
										</form>
										<div class="m-portlet__body">
											<div class="m-portlet__head-title">
												<h3 align="center" class="m-portlet__head-text">
													List Item Barang
												</h3><br>
											</div>
											<table class="table" id="tbl_list_invoice_masuk">
												<thead class="thead-light">
													<tr>
														<th>No</th>
														<th>Nama </th>
														<th>Kode </th>
														<th>Qty </th>
														<th>Harga Jual</th>
														<th>Potongan Harga</th>
														<th>Total Harga</th>
														<th>Aksi</th>
													</tr>
												</thead>
												<tbody>
													<?php 
														$no = 0;
														foreach ($data['result']->list_barang as $value) { ?>
															<tr>
																<td><?= ($no+1) ?></td>
																<td><?= $value['nama'] ?></td>
																<td><?= $value['kode'] ?></td>
																<td><?= $value['jumlah'] ?></td>
																<td>Rp.<?= number_format($value['harga_jual']) ?></td>
																<td><?= number_format($value['potongan_harga']) ?> %</td>
																<td>Rp.<?= number_format($value['total_harga']) ?></td>
																<td>
<button type='button' class='btn btn-sm btn-info finance_btn_edit' data-toggle='modal' data-id='<?= $value['id'] ?>' data-kode='<?= $value['kode'] ?>' data-qty='<?= $value['jumlah'] ?>' data-satuan='<?= $value['satuan'] ?>' data-harga_jual='<?= $value['harga_jual'] ?>' data-potongan_harga='<?= $value['potongan_harga'] ?>' data-total_harga='<?= $value['total_harga'] ?>' data-target='#modal_edit_item' title='Edit Data'> <i class='fa fa-pencil-square'></i></button>
<button type='button' class='btn btn-sm btn-danger finance_btn_hapus' data-nama='<?= $value['nama'] ?>' data-id='<?= $value['id'] ?>' data-toggle='modal m-popover' title='Hapus'> <i class='fa fa-trash'></i> </button>
																</td>
															</tr>	
													<?php }

													 ?>
												</tbody>
												<tfoot>
												<tr>
													<td></td>
													<td></td>
													<td></td>
													<td></td>
													<td></td>
													<td></td>
													<th align="right">SUB TOTAL</th>
													<th><span id="sub_total">Rp.0</span></th>
												</tr>
												<tr>
													<td></td>
													<td></td>
													<td></td>
													<td></td>
													<td></td>
													<td></td>
													<th align="right">PPN 10%</th>
													<th><span id="ppn">Rp.0</span></th>
												</tr>
												<tr>
													<td></td>
													<td></td>
													<td></td>
													<td></td>
													<td></td>
													<td></td>
													<th align="right">TOTAL TAGIHAN</th>
													<th><span id="total_tagihan">Rp.0</span></th>
												</tr>																					
												</tfoot>
											</table>
											
											<!--end: Datatable -->
											<div align="center">
												<button style="margin-top: 20px;width: 300px" type="button" class="btn btn-success" id="btn_simpan_data">
													>> Simpan Data >>
												</button>	
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

			<!-- Modal : Tambah Item -->
			<div class="modal fade" id="modal_tambah_item"   role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="exampleModalLabel">
								Tambah Barang
							</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">
									&times;
								</span>
							</button>
						</div>
						<div class="modal-body">
							<div class="form-group m-form__group row">
								<label class="col-3 col-form-label">
									Nama / Kode Item
								</label>
								<div class="col-9">
									<input type="hidden" name="no_invoice_data_invoice_masuk" id="no_invoice_data_invoice_masuk" value="<?= $data['result']->no_invoice ?>">
									<select class="form-control m-select2 dropdown_search select2-hidden-accessible" name="nama_item" style="width:100%">
										<option value=""></option>
										<?php 
											foreach($data['stock'] as $stock) { ?>
												<option value="<?= $stock['kode'] ?>"><?= $stock['nama']." (".$stock['kode'].")" ?></option>
										<?php }
										?>
									</select>
								</div>
							</div>
							<div class="form-group m-form__group row">
								<label  class="col-3 col-form-label">
									Qty
								</label>
								<div class="col-9">
									<input class="form-control m-input" type="number" placeholder="Contoh: 20" value="0" name="jumlah_item" id="jumlah_item">
								</div>
							</div>
							<div class="form-group m-form__group row">
								<label  class="col-3 col-form-label">
									Satuan
								</label>
								<div class="col-9">
									<input class="form-control" name="satuan" readonly>
								</div>
							</div>
							<div class="form-group m-form__group row">
								<label class="col-3 col-form-label">
									Harga Jual
								</label>
								<div class="col-9">
									<input class="form-control m-input" type="text" placeholder="Contoh: 3.130.000" value="0" name="harga_jual" id="harga_jual">
								</div>
							</div>							
							<div class="form-group m-form__group row">
								<label  class="col-3 col-form-label">
									Potongan Harga (%)
								</label>
								<div class="col-9">
									<input class="form-control m-input" type="number" value="0" placeholder="Contoh: 12" name="potongan_harga_item" id="potongan_harga_item">
								</div>
							</div>
							<div class="form-group m-form__group row">
								<label  class="col-3 col-form-label">
									Total Harga
								</label>
								<div class="col-9">
									<input readonly class="form-control m-input" type="number" value="0" placeholder="Contoh: 4.900.000" name="total_harga_item" id="total_harga_item">
								</div>
							</div>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-secondary" data-dismiss="modal">
								Tutup
							</button>
							<button id="finance_btn_tambah" type="button" class="btn btn-primary" data-dismiss="modal" disabled>
								Tambah
							</button>
						</div>
					</div>
				</div>
			</div>

			<!-- Modal Edit --> 
			<div class="modal fade" id="modal_edit_item" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="exampleModalLabel">
								Edit Barang
							</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">
									&times;
								</span>
							</button>
						</div>
						<div class="modal-body">
						<div class="form-group m-form__group row">
								
								<input type="hidden" value="" name="id">
								<input type="hidden" value="" name="nama">

								<label class="col-3 col-form-label">
									Nama / Kode Item
								</label>
								<div class="col-9">
									<select class="form-control m-select2 dropdown_search select2-hidden-accessible" name="edit_nama_item" disabled style="width:100%">
										<option value=""></option>
										<?php 
											foreach($data['stock'] as $stock) { ?>
												<option value="<?= $stock['kode'] ?>"><?= $stock['nama']." (".$stock['kode'].")" ?></option>
										<?php }
										?>
									</select>
								</div>
							</div>
							<div class="form-group m-form__group row">
								<label  class="col-3 col-form-label">
									Qty
								</label>
								<div class="col-9">
									<input class="form-control m-input" type="number" placeholder="Contoh: 20" name="edit_jumlah_item" id="edit_jumlah_item">
								</div>
							</div>
							<div class="form-group m-form__group row">
								<label  class="col-3 col-form-label">
									Satuan
								</label>
								<div class="col-9">
									<input class="form-control" name="edit_satuan" readonly>
								</div>
							</div>
							<div class="form-group m-form__group row">
								<label class="col-3 col-form-label">
									Harga Jual
								</label>
								<div class="col-9">
									<input class="form-control m-input" type="text" placeholder="Contoh: 3.130.000" name="edit_harga_jual" id="edit_harga_jual">
								</div>
							</div>							
							<div class="form-group m-form__group row">
								<label  class="col-3 col-form-label">
									Potongan Harga (%)
								</label>
								<div class="col-9">
									<input class="form-control m-input" type="number" placeholder="Contoh: 12" name="edit_potongan_harga_item" id="edit_potongan_harga_item">
								</div>
							</div>
							<div class="form-group m-form__group row">
								<label  class="col-3 col-form-label">
									Total Harga
								</label>
								<div class="col-9">
									<input class="form-control m-input" type="number" readonly placeholder="Contoh: 4.900.000" name="edit_total_harga_item" id="edit_total_harga_item">
									<input type="hidden" type="text" name="edit_total_harga_item_temp">
								</div>
							</div>							
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-secondary" data-dismiss="modal">
								Tutup
							</button>
							<button id="finance_btn_edit" type="button" class="btn btn-primary" data-dismiss="modal">
								Update
							</button>
						</div>
					</div>
				</div>
			</div>

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

					var listitem = [];
					var subtotal = 0;
					var ppn = 0;
					var total = 0;
					var tagihan = {};
					
					<?php 
						foreach ($data['result']->list_barang as $value) { ?>
							listitem.push({
								no_invoice_data_invoice_masuk:"<?= $value['no_invoice_data_invoice_masuk'] ?>",
								nama:"<?= $value['nama'] ?>",
								kode:"<?= $value['kode'] ?>",
								jumlah:"<?= $value['jumlah'] ?>",
								satuan:"<?= $value['satuan'] ?>",
								harga_jual:"<?= $value['harga_jual'] ?>",
								potongan_harga:"<?= $value['potongan_harga'] ?>",
								total_harga:"<?= $value['total_harga'] ?>"
							});
							subtotal += parseInt("<?= $value['total_harga'] ?>");
					<?php } ?>
							ppn += subtotal * 0.10;
							total += subtotal + ppn;

						$("#sub_total").html("Rp."+subtotal.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ","));
						$("#ppn").html("Rp."+ppn.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ","));
						$("#total_tagihan").html("Rp."+total.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ","));

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
								url:"<?= base_url() ?>finance/invoice/masuk/updatessubmit",
								type:"post",
								data:{
									// Invoice Masuk
									id:$("#invoice_id").val(),
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
									tagihan:tagihan

								},
								dataType:"json"
							}).done(function(res) {
								console.log(res);

								swal({
								title:res.title,
								text:res.text,
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
								field:"satuan, nama"
							},
							dataType:"json"
						}).done(function(res) {
							$("input[name=satuan]").val(res.satuan);
							$("input[name=nama]").val(res.nama);
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
								field:"nama,satuan"
							},
							dataType:"json"
						}).done(function(res) {
							$("input[name=edit_satuan]").val(res.satuan);
							$("input[name=nama]").val(res.nama);
						}).fail(function(res) {
							console.log(res);
						});

						if($(this).val() != "" && $("input[name=jumlah_item]").val() != "" && $("input[name='harga_jual']").val() != "" && $("input[name='potongan_harga_item']").val()) {
							$("button#finance_btn_tambah").removeAttr("disabled");
						} else {
							$("button#finance_btn_tambah").attr("disabled", "disabled");
						}
					});


					$("input[name=jumlah_item]").on('input', function() {
						var qty = parseInt($(this).val());
						var harga_jual = parseInt($("input[name=harga_jual]").val());
						var potongan_harga = parseInt($("input[name=potongan_harga_item]").val());
						var diskon = (potongan_harga/100) * harga_jual;
						var total_harga = (qty * harga_jual) - diskon;
						$("input[name=total_harga_item]").val(total_harga);
					});

					$("input[name=harga_jual]").on('input', function() {
						var qty = parseInt($("input[name=jumlah_item]").val());
						var harga_jual = parseInt($(this).val());
						var potongan_harga = parseInt($("input[name=potongan_harga_item]").val());
						var diskon = (potongan_harga/100) * harga_jual;
						var total_harga = (qty * harga_jual) - diskon;
						$("input[name=total_harga_item]").val(total_harga);
					});

					$("input[name=potongan_harga_item]").on('input', function() {
						var qty = parseInt($("input[name=jumlah_item]").val());
						var harga_jual = parseInt($("input[name=harga_jual]").val());
						var potongan_harga = parseInt($(this).val());
						var diskon = (potongan_harga/100) * harga_jual;
						var total_harga = (qty * harga_jual) - diskon;
						$("input[name=total_harga_item]").val(total_harga);
					});


					$('button#finance_btn_tambah').click(function() {
						var no_invoice_data_invoice_masuk = $("input[name=no_invoice_data_invoice_masuk]").val();

						var nama = $("input[name=nama]").val();
						var kode = $("select[name=nama_item]").val();
						var jumlah = $("input[name=jumlah_item]").val();
						var harga_jual = $("input[name=harga_jual]").val();
						var potongan_harga = $("input[name=potongan_harga_item]").val();
						var total_harga = $("input[name=total_harga_item]").val();

						if(!confirm('Tambah Data ?')) return false;

						var data = {
							"no_invoice_data_invoice_masuk":no_invoice_data_invoice_masuk,
							"nama":nama,
							"kode":kode,
							"jumlah":jumlah,
							"harga_jual":harga_jual,
							"potongan_harga":potongan_harga,
							"total_harga":total_harga
						};

						$.ajax({
								url:"<?= base_url() ?>finance/invoice/masuk/tambahitem",
								type:"post",
								data:{
									"mydata":data
								},
								dataType:"json"
							}).done(function(res) {
								console.log(res);
								swal({
								title:res.title,
								text:res.text,
								type:res.status,
								confirmButtonText: 'Ok'
								}).then(function(result) {
									if (result.value) {
										document.location = '<?= base_url() ?>finance/invoice/masuk/edit/<?= $data['result']->no_invoice ?>';
									}
								});
							}).fail(function(res) {
								console.log(res);
							});
					});

					$("button#finance_btn_edit").click(function() {
						
						var id = $("input[name=id]").val();
						var nama = $("input[name=nama]").val();
						var kode = $("select[name=edit_nama_item]").val();
						var jumlah = $("input[name=edit_jumlah_item]").val();
						var harga_jual = $("input[name=edit_harga_jual]").val();
						var potongan_harga = $("input[name=edit_potongan_harga_item]").val();
						var total_harga = $("input[name=edit_total_harga_item]").val();

						if(!confirm('Update Data '+kode+' ?')) return false;

						var data = {
							"id":id,
							"nama":nama,
							"kode":kode,
							"jumlah":jumlah,
							"harga_jual":harga_jual,
							"potongan_harga":potongan_harga,
							"total_harga":total_harga
						};

						$.ajax({
								url:"<?= base_url() ?>finance/invoice/masuk/updateitem",
								type:"post",
								data:{
									"mydata":data
								},
								dataType:"json"
							}).done(function(res) {
								console.log(res);
								swal({
								title:res.title,
								text:res.text,
								type:res.status,
								confirmButtonText: 'Ok'
								}).then(function(result) {
									if (result.value) {
										document.location = '<?= base_url() ?>finance/invoice/masuk/edit/<?= $data['result']->no_invoice ?>';
									}
								});
							}).fail(function(res) {
								console.log(res);
							});

					});

					var my_total_harga = 0;
					$(document).on('click','.finance_btn_edit',function() {
						var id = $(this).data("id");
						var kode = $(this).data("kode");
						var qty = $(this).data("qty");
						var harga_jual = $(this).data("harga_jual");
						var potongan_harga = $(this).data("potongan_harga");
						var total_harga = $(this).data("total_harga");
						
						my_total_harga += total_harga;

						$("input[name=id]").val(id);
						$("select[name=edit_nama_item]").val(kode).change();
						$("input[name=edit_jumlah_item]").val(qty);
						$("input[name=edit_harga_jual]").val(harga_jual);
						$("input[name=edit_potongan_harga_item]").val(potongan_harga);
						$("input[name=edit_total_harga_item]").val(total_harga);
						
					});

					$("input[name=edit_jumlah_item]").on('input', function() {
						var qty = parseInt($(this).val());
						var harga_jual = parseInt($("input[name=edit_harga_jual]").val());
						var potongan_harga = parseInt($("input[name=edit_potongan_harga_item]").val());
						var diskon = (potongan_harga/100) * harga_jual;
						var total_harga = (qty * harga_jual) - diskon;
						$("input[name=edit_total_harga_item]").val(total_harga);
					});

					$("input[name=edit_harga_jual]").on('input', function() {
						var qty = parseInt($("input[name=edit_jumlah_item]").val());
						var harga_jual = parseInt($(this).val());
						var potongan_harga = parseInt($("input[name=edit_potongan_harga_item]").val());
						var diskon = (potongan_harga/100) * harga_jual;
						var total_harga = (qty * harga_jual) - diskon;
						$("input[name=edit_total_harga_item]").val(total_harga);
					});

					$("input[name=edit_potongan_harga_item]").on('input', function() {
						var qty = parseInt($("input[name=edit_jumlah_item]").val());
						var harga_jual = parseInt($("input[name=edit_harga_jual]").val());
						var potongan_harga = parseInt($(this).val());
						var diskon = (potongan_harga/100) * harga_jual;
						var total_harga = (qty * harga_jual) - diskon;
						$("input[name=edit_total_harga_item]").val(total_harga);
					});					

					$(document).on('click','.finance_btn_hapus', function() {
						var id = $(this).data("id");

						if(!confirm('Hapus Item '+$(this).data('nama')+' ?')) return false;

						$.ajax({
								url:"<?= base_url() ?>finance/invoice/masuk/hapusitem",
								type:"post",
								data:{
									id:id,
								},
								dataType:"json"
							}).done(function(res) {
								console.log(res);

								swal({
								title:res.title,
								text:res.text,
								type:res.status,
								confirmButtonText: 'Ok'
								}).then(function(result) {
									if (result.value) {
										document.location = '<?= base_url() ?>finance/invoice/masuk/edit/<?= $data['result']->no_invoice ?>';
									}
								});

							}).fail(function(res) {
								console.log(res);
							});

					});

				</script>

			</body>
		</html>