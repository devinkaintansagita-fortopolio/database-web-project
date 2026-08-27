<?php
session_start ();
include 'koneksi.php';

$provinsi = "";
$kota = "";
$kecamatan = "";
$provinsi = "";
$strq = "";
$strw = "";
$jmlget = 0;

    if(isset($_GET['provinsi'])){
        $provinsi = $_GET['provinsi'];
        $strc[] = "kecamatan.id_provinsi= '$provinsi'";
        $jmlget++;
    }
	if(isset($_GET['kota'])){
        $kota = $_GET['kota'];
	    $strc[] = "kecamatan.id_kota= '$kota'";
        $jmlget++;
    }
	if(isset($_GET['kecamatan'])){
        $kecamatan = $_GET['kecamatan'];
	    $strc[] = "provinsi.id_kecamatan= '$kecamatan'";
        $jmlget++;
    }
	if(isset($_GET['provinsi'])){
        $kecamatan = $_GET['provinsi'];
	    $strc[] = "pengguna.id_provinsi= '$provinsi'";
        $jmlget++;
    }

    $i = 1;
    if($jmlget > 0){
      $strw = "WHERE ";
      foreach($strc as $strs){
        $strw .= $strs;
        if($i < $jmlget){
          $strw .= " AND ";
          $i++;
        }
      }
    }

    $query = "SELECT * FROM pengguna 
    INNER JOIN kelurahan ON pengguna.id_kelurahan=kelurahan.id_kelurahan $strw";
    $result=mysqli_query($koneksi,$query);
    $resnum = mysqli_num_rows($result);

    $query_prov = "SELECT * FROM provinsi";
    $result_prov = mysqli_query($koneksi,$query_prov);

	$query_kota = "SELECT * FROM kota";
	$result_kota = mysqli_query($koneksi,$query_kota);

	$query_kec = "SELECT * FROM kecamatan";
	$result_kec = mysqli_query($koneksi,$query_kec);

	$query_kel = "SELECT * FROM provinsi";
	$result_kel = mysqli_query($koneksi,$query_kel);

    $title = "PETPAL";
	
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
            background-image: url('assets/images/bg2.jpg');
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
													$query=mysqli_query($koneksi, "SELECT max(id_pengguna) as kodeTerbesar FROM pengguna");
													$data=mysqli_fetch_array($query);
													$id_pengguna=$data['kodeTerbesar'];
													$urutan=(int) substr($id_pengguna,3,3);
													$urutan++;
													$huruf="P";
													$id_pengguna = $huruf . sprintf("%03s", $urutan);
												?>
												<div class="form-group">
												<i class="ace-icon fa fa-user"></i>
													<input type="text" class="form-control" name="username_pengguna" placeholder="Masukkan Username">
												</div>
												<div class="form-group">
												<i class="ace-icon fa fa-pencil-square-o"></i>	
													<input type="text" class="form-control" name="nama_pengguna" placeholder="Masukkan Nama">
												</div>
												<div class="form-group">
												<i class="ace-icon fa fa-lock"></i>
													<input type="password" class="form-control" name="password_pengguna"placeholder="Masukkan Password">
												</div>
												<div class="form-group">
												<i class="ace-icon fa  fa-globe"></i>
													<input type="text" class="form-control" name="alamat_pengguna"placeholder="Masukkan Alamat">
												</div>
												<div class="form-group">
												<i class="ace-icon fa  fa-globe"></i>
													<input type="text" class="form-control" name="no_telepon"placeholder="Masukkan No Telepon">
												</div>
												<div class="form-group">
												<i class="ace-icon fa  fa-globe"></i>
													<input type="text" class="form-control" name="email"placeholder="Masukkan Email">
												</div>
												<div class="form-group">
													<i class="ace-icon fa fa-briefcase"></i>
														<select class="form-control" name="id_provinsi" id="id_provinsi">
														<?php while($row = mysqli_fetch_assoc($result_prov)){?>
														<option value="<?php echo $row['id_provinsi']; ?>">
														<?php echo $row['nama_provinsi'];?>
														<?php }?>
														</select>
												</div>
												<div class="form-group">
													<i class="ace-icon fa fa-briefcase"></i>
														<select class="form-control" name="id_kota" id="id_kota">
														<option></option>
														</select>
												</div>
												<div class="form-group">
													<i class="ace-icon fa fa-briefcase"></i>
														<select class="form-control" name="id_kecamatan" id="id_kecamatan">
														<option></option>
														</select>
												</div>
												<div class="form-group">
													<i class="ace-icon fa fa-briefcase"></i>
														<select class="form-control" name="id_kelurahan" id="id_kelurahan">
														<option></option>
														</select>
												</div>
												<label class="block">
													<input type="checkbox" class="ace" />
														<span class="lbl purple">
															Saya Menyetujui
															<a href="#">Perjanjian pengguna</a>
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
												
												$username_pengguna = $_POST["username_pengguna"];
												$password_pengguna = $_POST["password_pengguna"];
												$nama_pengguna = $_POST["nama_pengguna"];
												$alamat_pengguna = $_POST["alamat_pengguna"];
												$no_telepon = $_POST["no_telepon"];
												$email = $_POST["email"];
												$id_provinsi = $_POST["id_provinsi"];
												$id_kota = $_POST["id_kota"];
												$id_kecamatan = $_POST["id_kecamatan"];
												$id_kelurahan = $_POST["id_kelurahan"];

												$ambil = $koneksi->query("SELECT * FROM pengguna WHERE username_pengguna='$username_pengguna'");
												$cocok = $ambil->num_rows;

												if ($cocok == 1) {
													echo "<script>alert('Pendaftaran GAGAL, Username sudah digunakan');</script>";
													echo "<meta http-equiv='refresh' content='1;url=registrasi.php'>";
												} else {
													$koneksi->query("INSERT INTO pengguna (id_pengguna, Username_pengguna, Password_pengguna, Nama_pengguna, alamat_pengguna, no_telepon, email, ID_kelurahan) 
																	VALUES ('$id_pengguna', '$username_pengguna', '$password_pengguna', '$nama_pengguna', '$alamat_pengguna', '$no_telepon', '$email', '$id_kelurahan')");

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
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js" type="text/javascript"></script>
	<script>window.jQuery || document.write('<script src="js/vendor/jquery-1.11.2.min.js"><\/script>')</script>

    <script src="js/vendor/bootstrap.min.js"></script>

    <script src="js/datepicker.js"></script>
    <script src="js/plugins.js"></script>
    <script src="js/main.js"></script>
    <script src="js/jquery.js"></script>
    <script>
	$(document).ready(function() {
        $('#id_provinsi').change(function() {
                var id_provinsi = $(this).val();
                $.ajax({
                    type: 'POST',
                    url: 'ambilkota.php',
                    data: 'id_provinsi=' + id_provinsi,
                    success: function(response) {
                        $('#id_kota').html(response);
                    }
                });
        });
		$('#id_kota').change(function() {
                var id_kota = $(this).val();
                $.ajax({
                    type: 'POST',
                    url: 'ambilkecamatan.php',
                    data: 'id_kota=' + id_kota,
                    success: function(response) {
                        $('#id_kecamatan').html(response);
                    }
                });
        });
		$('#id_kecamatan').change(function() {
            var id_kecamatan = $(this).val();
            $.ajax({
                type: 'POST',
                url: 'ambilkelurahan.php',
                data: 'id_kecamatan=' + id_kecamatan,
                success: function(response) {
                    $('#id_kelurahan').html(response);
                }
            });
        });	
	});
    </script> 
</body>
</html>
