<?php
  session_start ();
  $db_host="localhost";
  $db_user="root";
  $db_pass="";
  $db_name="petpal";
  $koneksi = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta charset="utf-8" />
		<title>Dokter | Beranda</title>

		<meta name="description" content="overview &amp; stats" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />

		<link rel="stylesheet" href="assets/css/bootstrap.min.css" />
		<link rel="stylesheet" href="assets/font-awesome/4.5.0/css/font-awesome.min.css" />

		<link rel="stylesheet" href="assets/css/fonts.googleapis.com.css" />

		<link rel="stylesheet" href="assets/css/ace.min.css" class="ace-main-stylesheet" id="main-ace-style" />

		<link rel="stylesheet" href="assets/css/ace-skins.min.css" />
		<link rel="stylesheet" href="assets/css/ace-rtl.min.css" />

		<script src="assets/js/ace-extra.min.js"></script>

	</head>

	<body class="no-skin">
		<div id="navbar" class="navbar navbar-default          ace-save-state">
			<div class="navbar clearfix btn-purple btn-sm" id="navbar-container">
				<button type="button" class="navbar-toggle menu-toggler pull-left" id="menu-toggler" data-target="#sidebar">
					<span class="sr-only">Toggle sidebar</span>

					<span class="icon-bar"></span>

					<span class="icon-bar"></span>

					<span class="icon-bar"></span>
				</button>

				<div class="navbar-header pull-left">
					<a href="index.php" class="navbar-brand">
						<small>
							<img src="../icons/8.png" alt=" " style="width: 45px; height: auto; margin-right: 5px;">
							<span class="menu-text">PETPAL</span>
							<b class="arrow fa fa-angle-down purple"></b>
						</small>
					</a>
				</div>

				<div class="navbar-buttons navbar-header pull-right" role="navigation">
					<ul class="nav ace-nav">
						<li class="light-pink dropdown-modal">
							<a data-toggle="dropdown" href="#" class="dropdown-toggle">
								<img class="nav-user-photo" src="assets/images/avatars/avatar2.png" alt="Jason's Photo" />
								<span class="bigger-110 grey user-info">
									Dokter </span>

								<i class="ace-icon fa fa-caret-down"></i>
							</a>

							<ul class="user-menu dropdown-menu-right dropdown-menu dropdown-purple dropdown-caret dropdown-close">
								<li>
									<a href="logout.php">
										<i class="purple ace-icon fa fa-power-off"></i>
										Keluar
									</a>
								</li>
							</ul>
						</li>
					</ul>
				</div>
			</div>
		</div>

		<div class="main-container ace-save-state" id="main-container">
			<script type="text/javascript">
				try{ace.settings.loadState('main-container')}catch(e){}
			</script>

			<div id="sidebar" class="sidebar                  responsive                    ace-save-state">
				<script type="text/javascript">
					try{ace.settings.loadState('sidebar')}catch(e){}
				</script>

				<ul class="nav nav-list">
					<li class="active">
						<a href="index.php">
							<img src="../icons/14.png" alt=" " style="width: 27px; height: auto; margin-right: 5px;">
							<span class="menu-text"> Beranda </span>
						</a>
						<b class="arrow"></b>
					</li>

					<li class="">
						<a href="#" class="dropdown-toggle">
							<img src="../icons/19.png" alt=" " style="width: 25px; height: auto; margin-right: 5px;">
							<span class="menu-text"> Konsultasi </span>
							<b class="arrow fa fa-angle-down purple"></b>
						</a>

						<b class="arrow"></b>
						<ul class="submenu">
							<li class="nav-item">
								<a class="collapse-item" href="index.php?halaman=nota_konsul">Riwayat Konsultasi</a>
								<b class="arrow purple"></b>
							</li>
							<li class="nav-item">
								<a class="collapse-item" href="index.php?halaman=data_penyakit">Diagnosa yang Dikeluarkan</a>
								<b class="arrow purple"></b>
							</li>
						</ul>
					</li>

					<li class="">
						<a href="#" class="dropdown-toggle">
							<img src="../icons/21.png" alt=" " style="width: 30px; height: auto; margin-right: 5px;">
							<span class="menu-text"> Resep Obat</span>
							<b class="arrow fa fa-angle-down purple"></b>
						</a>

						<b class="arrow"></b>
						<ul class="submenu">
							<li class="nav-item">
								<a class="collapse-item" href="index.php?halaman=resep_obat">Riwayat pemberian Resep</a>
								<b class="arrow purple"></b>
							</li>						
						</ul>
					</li>
				</ul>

				<div class="sidebar-toggle sidebar-collapse" id="sidebar-collapse">
					<i id="sidebar-toggle-icon" class="ace-icon fa fa-angle-double-left ace-save-state" data-icon1="ace-icon fa fa-angle-double-left" data-icon2="ace-icon fa fa-angle-double-right"></i>
				</div>
			</div>

			<div class="main-content">
				<div class="main-content-inner">
					<div class="breadcrumbs ace-save-state" id="breadcrumbs">
						<ul class="breadcrumb">
							<li>
								<i class="ace-icon fa fa-home home-icon purple"></i>
								<a href="#">Menu</a>
							</li>
							<li class="active purple">Beranda</li>
						</ul>
					</div>

					<div class="page-content">
						<div class="ace-settings-container" id="ace-settings-container">
							<div class="btn btn-app btn-xs btn-warning ace-settings-btn" id="ace-settings-btn">
								<i class="ace-icon fa fa-cog bigger-130"></i>
							</div>
						</div>

						<div class="page-header">
							<h1>
								Beranda
								<small>
									<i class="ace-icon fa fa-angle-double-right purple"></i>
									Layanan Kesehatan Terhadap Hewan
								</small>
							</h1>
						</div>
				
						<div class="container-fluid">
						<?php
							if (isset($_GET['halaman']))
							{
								if($_GET['halaman']=="nota_konsul")
								{
									include 'nota_konsul.php';
								}
								else if($_GET['halaman']=="cari_nota_konsul")
								{
									include 'cari_nota_konsul.php';
								}
								else if($_GET['halaman']=="edit_nota_konsul")
								{
									include 'edit_nota_konsul.php';
								}
								else if($_GET['halaman']=="nota_penyakit")
								{
									include 'nota_penyakit.php';
								}
								else if($_GET['halaman']=="cari_nota_penyakit")
								{
									include 'cari_nota_penyakit.php';
								}
								else if($_GET['halaman']=="tambah_nota_penyakit")
								{
									include 'tambah_nota_penyakit.php';
								}
								else if($_GET['halaman']=="resep_obat")
								{
									include 'resep_obat.php';
								}
								else if($_GET['halaman']=="detail")
								{
									include 'detail.php';
								}
								else if($_GET['halaman']=="resep")
								{
									include 'resep.php';
								}
								else if($_GET['halaman']=="data_penyakit")
								{
									include 'data_penyakit.php';
								}
								else if($_GET['halaman']=="detailresepobat")
								{
									include 'detailresepobat.php';
								}
							}
							else
							{
								include 'dashboard.php';
							}

							?>                     
						</div>
					</div>
				</div>
			</div>

			<div class="footer">
				<div class="footer-inner">
					<div class="footer-content">
						<span class="bigger-120">
							<span class="purple bolder">PETPAL</span>
							Application &copy; 2023
						</span>

						&nbsp; &nbsp;
						<span class="action-buttons">
							<a href="#">
								<i class="ace-icon fa fa-twitter-square purple bigger-150"></i>
							</a>

							<a href="#">
								<i class="ace-icon fa fa-facebook-square purple bigger-150"></i>
							</a>

							<a href="#">
								<i class="ace-icon fa fa-instagram purple bigger-150"></i>
							</a>

							<a href="#">
								<i class="ace-icon fa fa-phone purple bigger-150"></i>
							</a>
						</span>
					</div>
				</div>
			</div>

			<a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
				<i class="ace-icon fa fa-angle-double-up icon-only bigger-110"></i>
			</a>
		</div>
		<script src="assets/js/jquery-2.1.4.min.js"></script>
		<script type="text/javascript">
			if('ontouchstart' in document.documentElement) document.write("<script src='assets/js/jquery.mobile.custom.min.js'>"+"<"+"/script>");
		</script>
		<script src="assets/js/bootstrap.min.js"></script>
		<script src="assets/js/jquery-ui.custom.min.js"></script>
		<script src="assets/js/jquery.ui.touch-punch.min.js"></script>
		<script src="assets/js/jquery.easypiechart.min.js"></script>
		<script src="assets/js/jquery.sparkline.index.min.js"></script>
		<script src="assets/js/jquery.flot.min.js"></script>
		<script src="assets/js/jquery.flot.pie.min.js"></script>
		<script src="assets/js/jquery.flot.resize.min.js"></script>
		<script src="assets/js/ace-elements.min.js"></script>
		<script src="assets/js/ace.min.js"></script>
		<script type="text/javascript"></script>
	</body>
</html>