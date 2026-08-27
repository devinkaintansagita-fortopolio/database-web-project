<?php
  session_start ();
  $db_host="localhost";
  $db_user="root";
  $db_pass="";
  $db_name="petpal";
  $koneksi = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
?>
<html lang="en">
	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta charset="utf-8" />
		<title>Register Page | PetPal-WebConsulting</title>
		<meta name="description" content="User login page" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
		<link rel="stylesheet" href="assets/css/bootstrap.min.css" />
		<link rel="stylesheet" href="assets/font-awesome/4.5.0/css/font-awesome.min.css" />
		<link rel="stylesheet" href="assets/css/fonts.googleapis.com.css" />
		<link rel="stylesheet" href="assets/css/ace.min.css" />
		<link rel="stylesheet" href="assets/css/ace-rtl.min.css" />
		<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
		<script src="https://cdn.jsdelivr.net/jquery.validation/1.19.3/jquery.validate.min.js"></script>
		<style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        .login100-form {
            max-width: 400px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .wrap-input100 {
            position: relative;
            width: 100%;
            margin-bottom: 20px;
        }

        .label-input100 {
            font-size: 16px;
            color: #333;
            position: absolute;
            top: 10px;
            left: 10px;
            transition: all 0.3s;
        }

        .input100 {
            width: 100%;
            padding: 10px;
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        .input100:focus + .focus-input100::after {
            width: calc(100% - 20px);
        }

        .focus-input100::after {
            content: "";
            display: block;
            position: absolute;
            bottom: 0;
            left: 10px;
            width: 0;
            height: 2px;
            background: #purple; /* Ganti warna sesuai keinginan */
            transition: width 0.3s;
        }

        .login100-form-btn {
            width: 100%;
            padding: 10px;
            font-size: 16px;
            color: #fff;
            background-color: #purple; /* Ganti warna sesuai keinginan */
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

		body {
            background-image: url('assets/images/bg3.jpg');
            background-size: cover;
       		background-position: center;
           	background-repeat: no-repeat;
            height: 100vh; 
            margin: 0; 
        }
    </style>
	</head>
    	
	<body class="login-layout">
		<div class="main-container">
			<div class="main-content">
				<div class="row">
					<div class="col-sm-10 col-sm-offset-1">
						<div class="login-container">
							<div class="center">
								<h1>
									<i class="ace-icon fa fa-tachometer white"></i>
									<span class="purple">PETPAL</span>
									<span class="white" id="id-text2">Application</span>
								</h1>
								<h4 class="purple" id="id-company-text">&copy; 2023</h4>
							</div>
							<div class="space-6"></div>
							<div class="position-relative">
								<div id="login-box" class="login-box visible widget-box no-border">
									<div class="widget-body">
										<div class="widget-main">
											<h6 class="header black lighter bigger pink">
												<i class="ace-icon glyphicon glyphicon-pencil purple"></i>
												Silahkan Mendaftar dengan Memasukkan Informasi yang Sesuai
											</h6>
											<form method = "post" enctype ="multipart/form-data">
												<?php 
													$query=mysqli_query($koneksi, "SELECT max(id_admin) as kodeTerbesar FROM admin");
													$data=mysqli_fetch_array($query);
													$id_admin=$data['kodeTerbesar'];
													$urutan=(int) substr($id_admin,2,3);
													$urutan++;
													$huruf="A";
													$id_admin = $huruf . sprintf("%03s", $urutan);
												?>
												<div class="form-group">
												<i class="ace-icon fa fa-user"></i>
													<input type="text" class="form-control" name="username_admin" placeholder="Masukkan Username">
												</div>
												<div class="form-group">
												<i class="ace-icon fa fa-pencil-square-o"></i>	
													<input type="text" class="form-control" name="nama_admin" placeholder="Masukkan Nama">
												</div>
												<div class="form-group">
												<i class="ace-icon fa fa-lock"></i>
													<input type="password" class="form-control" name="password_admin"placeholder="Masukkan Password">
												</div>
												<label class="block">
													<input type="checkbox" class="ace" />
														<span class="lbl purple">
															Saya Menyetujui
															<a href="#">Perjanjian Pengguna</a>
														</span>
												</label>
												<div class="space-10"></div>

												<div class="clearfix">
													<button type="reset" class="width-30 pull-left btn btn-sm">
														<i class="ace-icon fa fa-refresh"></i>
														<span class="bigger-110">Reset</span>
													</button>
												</div>
												<br>
												<center><button class="btn btn-purple" name="save"> Daftar </button></center>
												</br> 
											</form>
											<?php
											if (isset($_POST['save'])) {
												
												$username_admin = $_POST["username_admin"];
												$password_admin = $_POST["password_admin"];
												$nama_admin = $_POST["nama_admin"];

												$ambil = $koneksi->query("SELECT * FROM admin WHERE Username_Admin='$username_admin'");
												$cocok = $ambil->num_rows;

												if ($cocok == 1) {
													echo "<script>alert('Pendaftaran GAGAL, Username sudah digunakan');</script>";
													echo "<meta http-equiv='refresh' content='1;url=registrasi.php'>";
												} else {
													$koneksi->query("INSERT INTO admin (ID_Admin, Username_Admin, Password_Admin, Nama_Admin, no_telepon, email) 
																	VALUES ('$id_admin', '$username_admin', '$password_admin', '$nama_admin', '$no_telepon', '$email')");

													echo "<script>alert('Pendaftaran Berhasil, Silahkan Login');</script>";
													echo "<meta http-equiv='refresh' content='1;url=login.php'>";
												}
											}
											?>
										</div>
										<div class="toolbar btn-purple" style="display: flex; justify-content: center;">
											<div class="toolbar center btn-purple">
												<a href="login.php" class="back-to-login-link white">
													<i class="ace-icon fa fa-arrow-left white"></i>
													Kembali ke Masuk
												</a>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	<script src="assets/js/jquery-2.1.4.min.js"></script>
			<script type="text/javascript">
				if('ontouchstart' in document.documentElement) document.write("<script src='assets/js/jquery.mobile.custom.min.js'>"+"<"+"/script>");
			</script>
			<script type="text/javascript">
				jQuery(function($) {
				$(document).on('click', '.toolbar a[data-target]', function(e) {
					e.preventDefault();
					var target = $(this).data('target');
					$('.widget-box.visible').removeClass('visible');
					$(target).addClass('visible');
				});
				});
			</script>
	</body>
</html>