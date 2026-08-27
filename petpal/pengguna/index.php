<?php
session_start ();
include 'koneksi.php';

$jenis_spesialis = "";
$spesialis = "";
$strq = "";
$strw = "";
$jmlget = 0;

if(isset($_GET['jenis_spesialis'])){
	$jenis_spesialis = $_GET['jenis_spesialis'];
	$strc[] = "spesialis.id_jenis_spesialis= '$jenis_spesialis'";
	$jmlget++;
}
if(isset($_GET['spesialis'])){
	$spesialis = $_GET['spesialis'];
	$strc[] = "dokter.id_spesialis= '$spesialis'";
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

$query = "SELECT * FROM dokter 
JOIN spesialis ON dokter.id_spesialis=spesialis.id_spesialis 
INNER JOIN jenis_spesialis ON spesialis.id_jenis_spesialis=jenis_spesialis.id_jenis_spesialis $strw";
$result=mysqli_query($koneksi,$query);
$resnum = mysqli_num_rows($result);

$query_kel = "SELECT * FROM spesialis";
$result_kel = mysqli_query($koneksi,$query_kel);

$query_jen = "SELECT * FROM jenis_spesialis";
$result_jen = mysqli_query($koneksi,$query_jen);

$query_obat = "SELECT * FROM jenis_obat";
$result_obat = mysqli_query($koneksi,$query_obat);

    $title = "PETPAL";

if (!isset($_SESSION['pengguna']))
{
	echo "<script>alert('Anda harus login');</script>";
	echo "<script>location='login.php';</script>";
}
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta charset="utf-8" />
		<title>Pengguna | Beranda</title>
		<meta name="description" content="overview &amp; stats" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
		<link rel="stylesheet" href="assets/css/bootstrap.min.css" />
		<link rel="stylesheet" href="assets/font-awesome/4.5.0/css/font-awesome.min.css" />
		<link rel="stylesheet" href="assets/css/fonts.googleapis.com.css" />
		<link rel="stylesheet" href="assets/css/ace.min.css" class="ace-main-stylesheet" id="main-ace-style" />
		<link rel="stylesheet" href="assets/css/ace-skins.min.css" />
		<link rel="stylesheet" href="assets/css/ace-rtl.min.css" />
		<link rel="stylesheet" href="assets/css/styles.css">
		<script src="assets/js/ace-extra.min.js"></script>
	</head>

    <body class="container-fluid">
		<div id="navbar" class="navbar navbar-default          ace-save-state">
			<div class="navbar clearfix btn-purple btn-sm" id="navbar-clearfix">
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
							<img class="nav-user-photo" src="assets/images/avatars/avatar2.png" alt="User Photo" />
							<span class="user-info">
								<i class="ace-icon fa fa-caret-down"></i>
							</span>
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
				try{ace.settings.loadState('main-container')}catch(e){}main-
			</script>

			<div id="sidebar" class="sidebar                  responsive                    ace-save-state">
				<script type="text/javascript">
					try{ace.settings.loadState('sidebar')}catch(e){}
				</script>

				<ul class="nav nav-list">
					<li class="active">
						<a href="index.php">
							<img src="../icons/14.png" alt=" " style="width: 27px; height: auto; margin-right: 5px;">
							<span class="menu-text">Beranda</span>
							<b class="arrow fa fa-angle-down purple"></b>
						</a>

						<b class="arrow"></b>
					</li>

					<li class="">
						<a href="#" class="dropdown-toggle">
							<img src="../icons/20.png" alt=" " style="width: 25px; height: auto; margin-right: 5px;">
							<span class="menu-text">Data Peliharaan</span>
							<b class="arrow fa fa-angle-down purple"></b>
						</a>

						<b class="arrow"></b>

						<ul class="submenu">
							<li class="nav-item">
								<a class="collapse-item" href="index.php?halaman=hewan">Peliharaan</a>
								<b class="arrow purple"></b>
							</li>
						</ul>
					</li>

					<li class="">
						<a href="#" class="dropdown-toggle">
							<img src="../icons/19.png" alt=" " style="width: 25px; height: auto; margin-right: 5px;">
							<span class="menu-text">Catatan Konsultasi</span>
							<b class="arrow fa fa-angle-down purple"></b>
						</a>

						<b class="arrow purple"></b>

						<ul class="submenu">
							<li class="">
								<a class="collapse-item" href="index.php?halaman=riwayat">Riwayat Konsultasi</a>
								<b class="arrow purple"></b>
							</li>
						</ul>
					</li>

					<li class="">
						<a href="#" class="dropdown-toggle">
							<img src="../icons/21.png" alt=" " style="width: 30px; height: auto; margin-right: 5px;">
							<span class="menu-text">Pembelian Obat</span>
							<b class="arrow fa fa-angle-down purple"></b>
						</a>
						<b class="arrow purple"></b>

						<ul class="submenu">
							<li class="">
								<a class="collapse-item" href="index.php?halaman=resep_obat">Resep Obat</a>
								<b class="arrow purple"></b>
							</li>
						</ul>
						<ul class="submenu">
							<li class="">
								<a class="collapse-item" href="index.php?halaman=riwayat_beli_obat">Riwayat Pembelian Obat</a>
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
								if($_GET['halaman']=="hewan")
								{
									include 'hewan.php';
								}
								else if($_GET['halaman']=="cari_hewan")
								{
									include 'cari_hewan.php';
								}
								else if($_GET['halaman']=="hapus_hewan")
								{
									include 'hapus_hewan.php';
								}
								else if($_GET['halaman']=="edit_hewan")
								{
									include 'edit_hewan.php';
								}
								else if($_GET['halaman']=="tambah_hewan")
								{
									include 'tambah_hewan.php';
								}
								else if($_GET['halaman']=="dokter")
								{
									include 'dokter.php';
								}
								else if($_GET['halaman']=="riwayat")
								{
									include 'riwayat.php';
								}
								else if($_GET['halaman']=="riwayat_beli_obat")
								{
									include 'riwayat_beli_obat.php';
								}
								else if($_GET['halaman']=="detail")
								{
									include 'detail.php';
								}
								else if($_GET['halaman']=="detailobat")
								{
									include 'detailobat.php';
								}
								else if($_GET['halaman']=="detailobat2")
								{
									include 'detailobat2.php';
								}
								else if($_GET['halaman']=="obat")
								{
									include 'obat.php';
								}
								else if($_GET['halaman']=="cari_konsul")
								{
									include 'cari_konsul.php';
								}
								else if($_GET['halaman']=="cari_jenis_obat")
								{
									include 'cari_jenis_obat.php';
								}
								else if($_GET['halaman']=="resep_obat")
								{
									include 'resep_obat.php';
								}
								else if($_GET['halaman']=="beli_obat")
								{
									include 'beli_obat.php';
								}
								else if($_GET['halaman']=="bayar")
								{
									include 'bayar.php';
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