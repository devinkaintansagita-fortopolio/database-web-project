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
		<title>Login Page | PetPal-WebConsulting</title>
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
												Silahkan Masukkan Informasi yang Sesuai
											</h6>
											<form class="login100-form validate-form" method="post" style="padding-top:20px; padding-bottom:40px;">
					                            <div class="wrap-input100 validate-input m-b-26" data-validate="Username is required">
													<i class="ace-icon fa fa-user"></i>
                                                    <input class="input100" type="text" name="username_pengguna" placeholder="Masukkan Username">
                                                    <span class="focus-input100"></span>
                                                </div>
												<div class="wrap-input100 validate-input m-b-26" data-validate = "Password is required">
													<i class="ace-icon fa fa-lock"></i>
                                                    <input class="input100" type="password" name="password_pengguna" placeholder="Masukkan Password">
                                                    <span class="focus-input100"></span>
                                                </div>
												<div class="space-6"></div>
												<div class="flex-sb-m w-full p-b-30">
													<div class="contact100-form-checkbox">
                                                        <input class="input-checkbox100" id="ckb1" type="checkbox" name="remember-me">
														<label class="label-checkbox100" for="ckb1">Ingat Saya</label>
													</div>
                                                </div>
												<div class="space-8"></div>
                                                <div class="container-login100-form-btn center">
                                                <button type="submit" name="login" class="login100-form-btn white btn-purple">Masuk</button>
                                                </div>
                                            </form>

											<div class="space-6"></div>
											
                                            <?php
                                                if (isset($_POST["login"]))
                                                {
                                                    $username=$_POST["username_pengguna"];
                                                    $password=$_POST["password_pengguna"];
                                                    $ambil=$koneksi->query("SELECT * FROM pengguna
                                                        WHERE username_pengguna='$username' AND password_pengguna='$password'");
                                                    $akunyangcocok=$ambil->num_rows;
                                                    if($akunyangcocok==1)
                                                    {
                                                        $akun=$ambil->fetch_assoc();
                                                        $_SESSION["pengguna"]=$akun;
                                                        echo "<script>alert('Anda sukses login');</script>";
                                                        echo "<script>location='index.php';</script>";

                                                        if(isset($_SESSION['konsul']) )
                                                        {
                                                            $id_dokter = $_SESSION['konsul'];
                                                            echo "<script>alert('Lanjutkan Konsultasi');</script>";
                                                            echo "<script>location='konsultasi.php?id_dokter=$id_dokter';</script>";
                                                            
                                                        }
                                                        else 
                                                        {
                                                            echo "<meta http-equiv='refresh' content='1;url=index.php'>";
                                                        }
                                                    }
                                                    else
                                                    {
                                                        echo "<script>alert('Anda gagal login, silahkan periksa kembali akun anda');</script>";
                                                        echo "<script>location='login.php';</script>";
                                                    }
                                                }
                                            ?>
										</div>
											<div class="toolbar btn-purple" style="display: flex; justify-content: center;">
												<div class="toolbar center btn-purple">
                                                    <a href="register.php" class="back-to-login-link white">
                                                        Daftar
                                                        <i class="ace-icon fa fa-arrow-right white"></i>
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