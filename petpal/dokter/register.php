<?php
session_start ();
include 'koneksi.php';

$jenis_spesialis = "";
$spesialis = "";
$strq = "";
$strw = "";
$jmlget = 0;

    if(isset($_GET['spesialis'])){
        $spesialis = $_GET['spesialis'];
        $strc[] = "jenis_Spesialis.id_spesialis= '$spesialis'";
        $jmlget++;
    }
	if(isset($_GET['jenis_spesialis'])){
        $jenis_spesialis = $_GET['jenis_spesialis'];
	    $strc[] = "jenis_spesialis.id_jenis_spesialis= '$jenis_spesialis'";
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

    $query = "SELECT * FROM spesialis 
    JOIN jenis_spesialis ON jenis_spesialis.id_jenis_spesialis=spesialis.id_jenis_spesialis $strw";
    $result=mysqli_query($koneksi,$query);
    $resnum = mysqli_num_rows($result);

    $query_jen = "SELECT * FROM spesialis";
    $result_jen = mysqli_query($koneksi,$query_jen);

	$query_kel = "SELECT * FROM jenis_spesialis";
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
            background-image: url('assets/images/bg4.jpg');
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
													$query=mysqli_query($koneksi, "SELECT max(id_dokter) as kodeTerbesar FROM dokter");
													$data=mysqli_fetch_array($query);
													$id_dokter=$data['kodeTerbesar'];
													$urutan=(int) substr($id_dokter,3,3);
													$urutan++;
													$huruf="D";
													$id_dokter = $huruf . sprintf("%03s", $urutan);
												?>
												<div class="form-group">
												<i class="ace-icon fa fa-user"></i>
													<input type="text" class="form-control" name="username_dokter" placeholder="Masukkan Username">
												</div>
												<div class="form-group">
												<i class="ace-icon fa fa-pencil-square-o"></i>	
													<input type="text" class="form-control" name="nama_dokter" placeholder="Masukkan Nama">
												</div>
												<div class="form-group">
												<i class="ace-icon fa fa-lock"></i>
													<input type="password" class="form-control" name="password_dokter"placeholder="Masukkan Password">
												</div>
												<div class="form-group">
												<i class="ace-icon fa  fa-globe"></i>
													<input type="text" class="form-control" name="asal_instansi_dokter"placeholder="Masukkan Asal Instansi">
												</div>
												<div class="form-group">
												<i class="ace-icon fa fa-money"></i>
													<input type="text" class="form-control" name="tarif_dokter"placeholder="Masukkan Tarif">
												</div>
												<div class="form-group">
													<i class="ace-icon fa fa-briefcase"></i>
														<select class="form-control" name="id_jenis_spesialis" id="id_jenis_spesialis">
														<?php while($row = mysqli_fetch_assoc($result_kel)){?>
														<option value="<?php echo $row['id_jenis_spesialis']; ?>">
														<?php echo $row['nama_jenis_spesialis'];?>
														<?php }?>
														</select>
												</div>
												<div class="form-group">
													<i class="ace-icon fa fa-briefcase"></i>
														<select class="form-control" name="id_spesialis" id="id_spesialis">
														<option></option>
														</select>
												</div>
												<div class="form-group">
												<i class="ace-icon fa fa-camera"></i>
													<input  type="file" class="form-control" name="foto_dokter" required>
												</div>
												<label class="block">
													<input type="checkbox" class="ace" />
														<span class="lbl purple">
															Saya Menyetujui
															<a href="#">Perjanjian Dokter</a>
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
												$foto_dokter=isset($_FILES['foto_dokter']['name']) ? $_FILES['foto_dokter']['name']:'';
												$type=isset($_FILES['foto_dokter']['type']) ? $_FILES['foto_dokter']['type']:'';
												$temp=isset($_FILES['foto_dokter']['tmp_name']) ? $_FILES['foto_dokter']['tmp_name']:'';
												$error=isset($_FILES['foto_dokter']['error']) ? $_FILES['foto_dokter']['error']:'';
												$size=isset($_FILES['foto_dokter']['size']) ? $_FILES['foto_dokter']['size']:'';
												$simpan= "../foto_dokter/".$foto_dokter;
												if ($error > 0) 
												{
												  echo "<script>alert('ERROR !'); document.location.href='index.php?halaman=tambahbuku'; </script>";
												} 
												else 
												{
												  move_uploaded_file($temp, $simpan);
												}

												$username_dokter = $_POST["username_dokter"];
												$password_dokter = $_POST["password_dokter"];
												$nama_dokter = $_POST["nama_dokter"];
												$asal_instansi_dokter = $_POST["asal_instansi_dokter"];
												$tarif_dokter = $_POST["tarif_dokter"];
												$id_spesialis = $_POST["id_spesialis"];
												$id_jenis_spesialis = $_POST["id_jenis_spesialis"];

												$ambil = $koneksi->query("SELECT * FROM dokter WHERE username_dokter='$username_dokter'");
												$cocok = $ambil->num_rows;

												if ($cocok == 1) {
													echo "<script>alert('Pendaftaran GAGAL, Username sudah digunakan');</script>";
													echo "<meta http-equiv='refresh' content='1;url=registrasi.php'>";
												} else {
													$koneksi->query("INSERT INTO dokter (ID_dokter, Username_dokter, Password_dokter, Nama_dokter, Asal_Instansi_Dokter, ID_Spesialis, foto_dokter, Tarif_Dokter) 
																	VALUES ('$id_dokter', '$username_dokter', '$password_dokter', '$nama_dokter', '$asal_instansi_dokter', '$id_spesialis', '$foto_dokter', '$tarif_dokter')");

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
        $('#id_jenis_spesialis').change(function() {
                var id_jenis_spesialis = $(this).val();
                $.ajax({
                    type: 'POST',
                    url: 'cobadokter.php',
                    data: 'id_jenis_spesialis=' + id_jenis_spesialis,
                    success: function(response) {
                        $('#id_spesialis').html(response);
                    }
                });
            });
		});
    </script> 
</body>
</html>
