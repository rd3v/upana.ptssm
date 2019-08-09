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

		<link href="<?= base_url() ?>assets/vendors/base/vendors.bundle.css" rel="stylesheet" type="text/css" />
		<link href="<?= base_url() ?>assets/demo/default/base/style.bundle.css" rel="stylesheet" type="text/css" />
		<!-- begin:: Style tambahan -->
		<link href="<?= base_url() ?>assets/demo/default/base/pelangi-style.css" rel="stylesheet" type="text/css">
		<link href="<?= base_url() ?>assets/demo/default/base/sejuk-sukses-style.css" rel="stylesheet" type="text/css">
		<!-- end:: Style tambahan -->
		<!--end::Base Styles -->
		<link rel="shortcut icon" href="<?= base_url() ?>assets/demo/default/media/img/logo/favicon.ico" />

			<style>
			.col-lg-6 {
				margin-bottom: 1rem;
			}

			.m-form .m-form__group label {
				font-weight: 400;
				font-size: 1.1rem;
			}
			#image-preview{
				display:none;
				width : 250px;
				height : auto;
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
									Master Stock
								</h3>
								<ul class="m-subheader__breadcrumbs m-nav m-nav--inline">
									<li class="m-nav__item m-nav__item--home">
										<a href="<?= base_url() ?>gudang" class="m-nav__link m-nav__link--icon">
											<i class="m-nav__link-icon la la-home"></i>
										</a>
									</li>
									<li class="m-nav__separator">
										-
									</li>
									<li class="m-nav__item">
										<a href="<?= base_url() ?>gudang/stock/master" class="m-nav__link">
											<span class="m-nav__link-text">
												Master Stock
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
								<div class="m-portlet">
									<div class="m-portlet__head">
										<div class="m-portlet__head-caption">
											<div class="m-portlet__head-title">
												<span class="m-portlet__head-icon m--hide">
													<i class="la la-gear"></i>
												</span>
												<h3 class="m-portlet__head-text">
													Input Master Stock <br><?php if($this->session->flashdata('status')) {
														echo "<div class='alert alert-".$this->session->flashdata('status')."'>".$this->session->flashdata('flsh_msg')."</div>";
													} ?>
												</h3>
											</div>
										</div>
									</div>
									<!--begin::Form-->
									<form id="formstock" action="<?= site_url() ?>gudang/stock/master/tambahsubmit" method="post" enctype="multipart/form-data" class="form">
										<div class="m-portlet__body">
											<div class="form-group m-form__group row">
												<div class="col-lg-6">
													<label>
														Kode*:
													</label>
													<input type="text" name="input_kode_barang" class="form-control m-input" placeholder="kode barang">
												</div>
												
												<div class="col-lg-6">
													<label>
														Kategori*:
													</label>
													<select style="width: 100%" class="form-control m-select2 dropdown_search" name="kategori_item">
														<option value="">
															-- Pilih Kategori --
														</option>
														<option value="1">
															Unit
														</option>
														<option value="2">
															Material
														</option>
														<option value="3">
															Sparepart
														</option>
														<option value="4">
															Jasa
														</option>
													</select>
												</div>
												<div class="col-lg-6">
													<label class="">
														Nama*:
													</label>
													<input type="text" name="nama_barang" class="form-control m-input" placeholder="nama barang">
												</div>
												<div class="col-lg-6">
													<label class="">
														Satuan *:
													</label>
													<input type="text" name="input_satuan_barang" class="form-control m-input" placeholder="satuan barang">
												</div>
												<div class="col-lg-6">
													<label class="">
														Stock Minimal*:
													</label>
													<input type="number" name="stock_minimal" class="form-control m-input">
												</div>
												<div class="col-lg-6">
													<label class="">
														Tipe:
													</label>
													<input type="text" name="tipe" class="form-control m-input">

												</div>
												<div class="col-lg-6">
													<label class="">
														Merek:
													</label>
													<input type="text" name="merek" class="form-control m-input">
													
												</div>
												<div class="col-lg-6">
													<label class="">
														Tipe Gudang*:
													</label>
													<select style="width: 100%" class="form-control " name="tipe_gudang">
														<option value=""></option>
														<option value="1">
															Kantor (Pajak)
														</option>
														<option value="2">
															Toko (Non Pajak)
														</option>
														
													</select>
												</div>

												<div class="col-lg-6">
													<label class="">
														BTU/hr:
													</label>
													<input type="text" name="btu" class="form-control m-input">
													
												</div>

												<div class="col-lg-6">
													<label class="">
														Daya Listrik:
													</label>
													<input type="text" name="daya" class="form-control m-input">
													
												</div>
												<div class="col-lg-6">
													<label class="">
														Keterangan:
													</label>
													<textarea style="resize: none;" class="form-control" name="keterangan_barang" id="keterangan_barang" rows="5"></textarea>
												</div>
												<div align="center" style="margin-top: 30px" class="offset-lg-3 col-lg-6">
													<img style="display: none" id="image-preview" alt="image preview"/>
													<br/>
													<input type="file" id="image_source" name="image_source" onchange="previewImage();"/>
												</div>
												<div class="offset-lg-3 col-lg-6">
													<br>
													<button type="button" style="width:inherit;" class="btn btn-success" id="btn_tambah">Tambahkan</button>
												</div>
											</div>
										</div>
									</form>
									<div class="m-portlet m-portlet--mobile">
										<div class="m-portlet__body">
											<!--begin: Search Form -->
											<div class="m-form m-form--label-align-right m--margin-top-20 m--margin-bottom-30">
												<div class="row align-items-center">
													<div class="col-md-12">
														<div class="form-group m-form__group row align-items-center">
															<div class="col-md-4">
																<div class="m-portlet__head-title">
																	<h3 class="m-portlet__head-text">
																		List Master Stock
																	</h3>
																</div>
															</div>
															<div class="col-md-4 offset-md-4">
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
											<!--begin: Datatable -->
											<!-- <div class="m_datatable" id="local_data"></div> -->
											<table class="m_datatable">
												<thead>
													<tr>
														<th>No</th>
														<th>Kategori</th>
														<th>Kode</th>
														<th>Nama Item</th>
														<th>Gudang</th>
														<th>Tipe</th>
														<th>Merek</th>
														<th>Limit</th>
														<th>Satuan</th>
														<th>Keterangan</th>
														<th>Gambar</th>
														<th>Aksi</th>
													</tr>
												</thead>
												<tbody></tbody>
											</table>
											<!--end: Datatable -->
										</div>
									</div>
									<!--end::Form-->
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- end:: Body -->

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
		<!--begin::Page Snippets -->
		<script src="<?= base_url() ?>assets/app/js/dashboard.js" type="text/javascript"></script>
		<!--end::Page Snippets -->
		<script>

			$("li#stock-master").addClass("m-menu__item--active");
			var tbl_list_master_stock;
			tbl_list_master_stock = $('.m_datatable').mDatatable({
					data: {
						type: 'remote',
						source: {
							  read: {
							  	url: "<?= site_url() ?>gudang/stock/master/getdata",
							  	// url: 'https://projects.upanastudio.com/ptssm/app/gudang/stock/master/getdata',
					  		  },
						},
						serverPaging: true,
						serverFiltering: true,
						serverSorting: true,
						},
						layout: {
							theme: 'default',
							scroll: true,
						},
						sortable:true,
						search: {
							input: $('#generalSearch'),
						},
						columns: [
						{
							field: "no",
							template: function(data, type, row, meta) {
								return ((row.getCurrentPage() - 1) * row.getPageSize()) + type + 1;
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
								placeholder: "Pilih Kategori"
							});
							}

							return {
								init: function() {
									demos();
								}
							};
						}();

					jQuery(document).ready(function() {
						Select2.init();
					});


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

				</script>
			</body>
			</html>