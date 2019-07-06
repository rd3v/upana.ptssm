<!DOCTYPE html>

	<html lang="en" >
	<!-- begin::Head -->
	<head>
		<meta charset="utf-8">
		<title>
			ADMIN <?= strtoupper($data['user']['accesstype']) ?>
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
											<img alt="" src="<?= base_url() ?>assets/demo/default/media/img/logo/logo_pt_ssm.png"/>
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
														<a href="<?= base_url() ?>kantor/order/spk-pemasangan" class="m-menu__link ">
															<i class="m-menu__link-bullet m-menu__link-bullet--dot">
																<span></span>
															</i>
															<span class="m-menu__link-text">
																SPK Pemasangan
															</span>
														</a>
													</li>
													<li id="spk-service" class="m-menu__item " aria-haspopup="true">
														<a href="<?= base_url() ?>kantor/order/spk-service"  class="m-menu__link ">
															<i class="m-menu__link-bullet m-menu__link-bullet--dot">
																<span></span>
															</i>
															<span class="m-menu__link-text">
																SPK Service
															</span>
														</a>
													</li>
													<li id="spk-free" class="m-menu__item " aria-haspopup="true">
														<a href="<?= base_url() ?>kantor/order/spk-free"  class="m-menu__link ">
															<i class="m-menu__link-bullet m-menu__link-bullet--dot">
																<span></span>
															</i>
															<span class="m-menu__link-text">
																SPK Free
															</span>
														</a>
													</li>
													<li id="spk-komplain" class="m-menu__item " aria-haspopup="true">
														<a href="<?= base_url() ?>kantor/order/spk-komplain"  class="m-menu__link ">
															<i class="m-menu__link-bullet m-menu__link-bullet--dot">
																<span></span>
															</i>
															<span class="m-menu__link-text">
																SPK Komplain
															</span>
														</a>
													</li>
													<li id="spk-survey" class="m-menu__item " aria-haspopup="true">
														<a href="<?= base_url() ?>kantor/order/spk-survey"  class="m-menu__link ">
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
										<!-- Master Stock -->
										<li id="stock" class="m-menu__item" aria-haspopup="true" >
											<a  href="<?= base_url() ?>kantor/stock" class="m-menu__link ">
												<i class="m-menu__link-icon flaticon-list-1"></i>
												<span class="m-menu__link-title">
													<span class="m-menu__link-wrap">
														<span class="m-menu__link-text">
															Master Stock
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
											<a  href="<?= base_url() ?>hrd/customer/kepuasan" class="m-menu__link ">
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
											<a  href="<?= base_url() ?>gudang/surat/jalan" class="m-menu__link ">
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
