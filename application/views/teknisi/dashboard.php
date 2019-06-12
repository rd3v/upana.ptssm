<body class="m-page--fluid m--skin- m-content--skin-light2 m-header--fixed m-header--fixed-mobile m-aside-left--enabled m-aside-left--skin-dark m-aside-left--offcanvas m-footer--push m-aside--offcanvas-default">
		<!-- begin:: Page -->
		<div class="m-subheader ">
			<div class="d-flex align-items-center">
				<div class="mr-auto col-sm">
					<a href="<?= base_url() ?>teknisi"><img style="height: auto; width: 80px;" src="<?= base_url() ?>assets/img/logo_2.png"></a>
				</div>
				<div align="right" class="col-sm">
					
					<div class="dropdown">
						<button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							<span style="color: #30bcb8;font-size: 2.5rem" class="fa fa-user-circle-o"></span>					
						</button>
						<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
							<a class="dropdown-item" href="#">Ganti Password</a>
							<a class="dropdown-item" href="<?= base_url() ?>teknisi/logout">Logout</a>
						</div>
					</div>
					
				</div>
			</div>
		</div>
		<div class="m-content">
			<div >
				<div onclick="window.location.href = 'kerjaan_masuk.html';" style="width: 94vw" class="col-xl-12 ">
					<div class="m-portlet warna-merah m-portlet--bordered-semi m-portlet--skin-dark m-portlet--full-height ">
						<div class="m-portlet__body body_menu_1 row menu_utama" style="background-image:url(http://localhost/ptssm/app/teknisi/assets/img/menu_1.png)">
							<div align="left" class="col-4">
								<span>
									<i style="font-size: 6rem; color: white;" class="fa fa-briefcase"></i>
								</span>
							</div>
							<div align="right"  class="col-8">
								<h3>Kerjaan Masuk</h3>
								<small>untuk melihat kerjaan masuk silahkan klik button ini</small>
							</div>
							<!--begin::Widget 7-->
						</div>
					</div>
				</div>
				<div onclick="window.location.href = 'on_going.html';" style="width: 94vw" class="col-xl-12 ">
					<div class="m-portlet warna-merah m-portlet--bordered-semi m-portlet--skin-dark m-portlet--full-height ">
						<div class="m-portlet__body body_menu_3 row menu_utama" style="background-image:url(http://localhost/ptssm/app/teknisi/assets/img/menu_3.png)">
							<div align="left"  class="col-4">
								<span>
									<i style="font-size: 6rem; color: white;" class="fa fa-refresh"></i>
								</span>
							</div>
							<div align="right"  class="col-8">
								<h3>On Going</h3>
								<small>untuk melihat kerjaan yang sedang dikerjakan klik button ini</small>
							</div>
							<!--begin::Widget 7-->
						</div>
					</div>
				</div>
				<div onclick="window.location.href = 'tugas_selesai.html';" style="width: 94vw" class="col-xl-12 ">
					<div class="m-portlet warna-merah m-portlet--bordered-semi m-portlet--skin-dark m-portlet--full-height ">
						<div class="m-portlet__body body_menu_2 row menu_utama" style="background-image:url(http://localhost/ptssm/app/teknisi/assets/img/menu_2.png)">
							<div align="left"  class="col-4">
								<span>
									<i style="font-size: 6rem; color: white;" class="fa 	fa-check"></i>
								</span>
							</div>
							<div align="right"  class="col-8">
								<h3>Tugas Selesai</h3>
								<small>untuk melihat kerjaan yang selesai silahkan klik button ini</small>
							</div>
							<!--begin::Widget 7-->
						</div>
					</div>
				</div>
			</div>
		</div>