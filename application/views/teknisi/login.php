<!DOCTYPE html>
<html>
<head>
	<title>Teknisi | Login</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/teknisi-css/teknisi-style.css">
</head>
<body>
	<div align="center" class="logo">
			<img src="<?= base_url() ?>assets/img/logo ssm.png">
		</div>
	<div class="wrap-login">
		<div class="portlet-login col-xl-12">
				<div align="center" class="header-text">
					<label class="text-login">
						Sukses Sejuk Mandiri Login
					</label>
					<h3 style="padding:10px" id="message"></h3>
				</div>
				<div class="user-input margin-bawah">
					<label>
						Username :
					</label>
					<input type="text" class="form-control" id="user-input"  placeholder="Masukkan Username">
				</div>
				<div class="password-input margin-bawah">
					<label>
						Password :
					</label>
					<input type="password" class="form-control" id="password-input"  placeholder="Masukkan Password">
				</div>
				<div align="center" class="btn-login">
					<button class="btn btn_login btn-color-green">
						Login
					</button>
				</div>
		</div>
	</div>
</body>
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script>
	$(".btn_login").click(function() {
		var username = $("#user-input").val();
		var password = $("#password-input").val();
		$.ajax({
			url:"http://localhost/ptssm/app2/teknisi/checklogin",
			// url:"https://projects.upanastudio.com/ptssm/app/teknisi/checklogin",
			type:"get",
			data:{
				username:username,
				password:password
			},
			dataType:"json"
		}).done(function(res) {
			if(res) {
				$("#message").removeClass("alert-danger");
				$("#message").addClass("alert-success");
				$("#message").text("Selamat Datang");
				setTimeout(function() {
					document.location = 'http://localhost/ptssm/app2/teknisi';
					// document.location = 'https://projects.upanastudio.com/ptssm/app/teknisi';
				},1500);
			} else {
				$("#message").removeClass("alert-success");
				$("#message").addClass("alert-danger");
				$("#message").text("Username atau Password Salah");
				setTimeout(function() {	
					$("#message").removeClass("alert-danger");
					$("#message").text("");
				},1500);
			}
		}).fail(function(res) {
			console.log(res);
		});
	});
</script>
</html>