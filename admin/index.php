<?php
session_start();
$db_host="localhost";
$db_user="root";
$db_pass="";
$db_name="petpal";

$koneksi=mysqli_connect($db_host,$db_user,$db_pass,$db_name);

if (!isset($_SESSION['admin']))
{
	echo "<script>alert('Anda harus login');</script>";
	echo "<script>location='login.php';</script>";
}
include 'header.php';

?>

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
							<span class="menu-text">Beranda</span>
							<b class="arrow fa fa-angle-down purple"></b>
						</a>

						<b class="arrow"></b>
					</li>

					<li class="">
						<a href="#" class="dropdown-toggle">
							<img src="../icons/22.png" alt=" " style="width: 25px; height: auto; margin-right: 5px;">
							<span class="menu-text">Data Pengguna</span>
							<b class="arrow fa fa-angle-down purple"></b>
						</a>

						<b class="arrow"></b>

						<ul class="submenu">
							<li class="nav-item">
								<a class="collapse-item" href="index.php?halaman=pengguna">Informasi Pengguna</a>
								<b class="arrow purple"></b>
							</li>

							<li class="nav-item">
								<a class="collapse-item" href="index.php?halaman=hewan">Informasi Peliharaan</a>
								<b class="arrow purple"></b>
							</li>

							<li class="nav-item">
								<a class="collapse-item" href="index.php?halaman=kelurahan">Kelurahan</a>
								<b class="arrow purple"></b>
							</li>

							<li class="nav-item">
								<a class="collapse-item" href="index.php?halaman=kecamatan">Kecamatan</a>
								<b class="arrow purple"></b>
							</li>

							<li class="nav-item">
								<a class="collapse-item" href="index.php?halaman=kota">Kota</a>
								<b class="arrow purple"></b>
							</li>

							<li class="nav-item">
								<a class="collapse-item" href="index.php?halaman=provinsi">Provinsi</a>
								<b class="arrow purple"></b>
							</li>
						</ul>
					</li>

					<li class="">
						<a href="#" class="dropdown-toggle">
							<img src="../icons/17.png" alt=" " style="width: 25px; height: auto; margin-right: 5px;">
							<span class="menu-text">Data Dokter</span>
							<b class="arrow fa fa-angle-down purple"></b>
						</a>

						<b class="arrow"></b>

						<ul class="submenu">
							<li class="nav-item">
								<a class="collapse-item" href="index.php?halaman=dokter">Informasi Dokter</a>
								<b class="arrow purple"></b>
							</li>

							<li class="nav-item">
								<a class="collapse-item" href="index.php?halaman=spesialis">Informasi Spesialis</a>
								<b class="arrow purple"></b>
							</li>

							<li class="nav-item">
								<a class="collapse-item" href="index.php?halaman=jenis_spesialis">Informasi Jenis Spesialis</a>
								<b class="arrow purple"></b>
							</li>
						</ul>
					</li>

					<li class="">
						<a href="#" class="dropdown-toggle">
							<img src="../icons/18.png" alt=" " style="width: 25px; height: auto; margin-right: 5px;">
							<span class="menu-text">Data Apotek</span>
							<b class="arrow fa fa-angle-down purple"></b>
						</a>

						<b class="arrow"></b>

						<ul class="submenu">
							<li class="">
								<a class="collapse-item" href="index.php?halaman=apotek">Informasi Apotek</a>
								<b class="arrow purple"></b>
							</li>
						</ul>
					</li>

					<li class="">
						<a href="#" class="dropdown-toggle">
							<img src="../icons/15.png" alt=" " style="width: 25px; height: auto; margin-right: 5px;">
							<span class="menu-text">Data Transaksi</span>
							<b class="arrow fa fa-angle-down purple"></b>
						</a>

						<b class="arrow"></b>

						<ul class="submenu">
							<li class="">
								<a class="collapse-item" href="index.php?halaman=nota_konsul">Transaksi Konsultasi</a>
								<b class="arrow purple"></b>
							</li>
							<li class="">
								<a class="collapse-item" href="index.php?halaman=resep_obat">Transaksi Obat</a>
								<b class="arrow purple"></b>
							</li>
						</ul>
					</li>

					<li class="">
						<a href="#" class="dropdown-toggle">
							<img src="../icons/19.png" alt=" " style="width: 25px; height: auto; margin-right: 5px;">
							<span class="menu-text">Data Konsultasi</span>
							<b class="arrow fa fa-angle-down purple"></b>
						</a>

						<b class="arrow purple"></b>

						<ul class="submenu">
							<li class="">
								<a class="collapse-item" href="index.php?halaman=nota_penyakit">Nota Penyakit</a>
								<b class="arrow purple"></b>
							</li>
							<li class="">
								<a class="collapse-item" href="index.php?halaman=penyakit">Penyakit</a>
								<b class="arrow purple"></b>
							</li>
							<li class="">
								<a class="collapse-item" href="index.php?halaman=jenis_penyakit">Jenis Penyakit</a>
								<b class="arrow purple"></b>
							</li>
							<li class="">
								<a class="collapse-item" href="index.php?halaman=status_konsul">Status Konsultasi</a>
								<b class="arrow purple"></b>
							</li>
							<li class="">
								<a class="collapse-item" href="index.php?halaman=metode_konsul">Metode Konsultasi</a>
								<b class="arrow purple"></b>
							</li>
						</ul>
					</li>

					<li class="">
						<a href="#" class="dropdown-toggle">
							<img src="../icons/21.png" alt=" " style="width: 30px; height: auto; margin-right: 5px;">
							<span class="menu-text">Data Obat</span>
							<b class="arrow fa fa-angle-down purple"></b>
						</a>
						<b class="arrow purple"></b>

						<ul class="submenu">
							<li class="">
								<a class="collapse-item" href="index.php?halaman=pembelian_obat">Pembelian Obat</a>
								<b class="arrow purple"></b>
							</li>
							<li class="">
								<a class="collapse-item" href="index.php?halaman=obat">Obat</a>
								<b class="arrow purple"></b>
							</li>
							<li class="">
								<a class="collapse-item" href="index.php?halaman=jenis_obat">Jenis Obat</a>
								<b class="arrow purple"></b>
							</li>
						</ul>
					</li>

					<li class="">
						<a href="#" class="dropdown-toggle">
							<img src="../icons/24.png" alt=" " style="width: 30px; height: auto; margin-right: 5px;">
							<span class="menu-text">Data Pembayaran</span>
							<b class="arrow fa fa-angle-down purple"></b>
						</a>
						<b class="arrow purple"></b>

						<ul class="submenu">
							<li class="">
								<a class="collapse-item" href="index.php?halaman=metode_bayar_konsul">Metode Bayar Konsultasi</a>
								<b class="arrow purple"></b>
							</li>
							<li class="">
								<a class="collapse-item" href="index.php?halaman=metode_bayar_obat">Metode Bayar Obat</a>
								<b class="arrow purple"></b>
							</li>
							<li class="">
								<a class="collapse-item" href="index.php?halaman=jenis_bayar_konsul">Jenis Bayar Konsultasi</a>
								<b class="arrow purple"></b>
							</li>
							<li class="">
								<a class="collapse-item" href="index.php?halaman=jenis_bayar_obat">Jenis Bayar Obat</a>
								<b class="arrow purple"></b>
							</li>
						</ul>
					</li>

					<li class="">
						<a href="#" class="dropdown-toggle">
							<img src="../icons/26.png" alt=" " style="width: 28px; height: auto; margin-right: 5px;">
							<span class="menu-text"> Data Status Bayar </span>
							<b class="arrow fa fa-angle-down purple"></b>
						</a>
						<b class="arrow purple"></b>

						<ul class="submenu">
							<li class="">
								<a class="collapse-item" href="index.php?halaman=status_bayar_konsul">Status Bayar Konsultasi</a>
								<b class="arrow purple"></b>
							</li>
							<li class="">
								<a class="collapse-item" href="index.php?halaman=status_bayar_obat">Status Bayar Obat</a>
								<b class="arrow purple"></b>
							</li>
						</ul>
					</li>

					<li class="">
						<a href="#" class="dropdown-toggle">
							<img src="../icons/23.png" alt=" " style="width: 30px; height: auto; margin-right: 5px;">
							<span class="menu-text"> Laporan </span>
							<b class="arrow fa fa-angle-down purple"></b>
						</a>
						<b class="arrow purple"></b>

						<ul class="submenu">
							<li class="">
								<a class="collapse-item" href="index.php?halaman=laporan">Laporan</a>
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
								if($_GET['halaman']=="pengguna")
								{
									include 'pengguna.php';
								}
								else if($_GET['halaman']=="cari_pengguna")
								{
									include 'cari_pengguna.php';
								}
								else if($_GET['halaman']=="hapus_pengguna")
								{
									include 'hapus_pengguna.php';
								}
								else if($_GET['halaman']=="hewan")
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
								else if($_GET['halaman']=="kelurahan")
								{
									include 'kelurahan.php';
								}
								else if($_GET['halaman']=="cari_kelurahan")
								{
									include 'cari_kelurahan.php';
								}
								else if($_GET['halaman']=="hapus_kelurahan")
								{
									include 'hapus_kelurahan.php';
								}
								else if($_GET['halaman']=="edit_kelurahan")
								{
									include 'edit_kelurahan.php';
								}
								else if($_GET['halaman']=="tambah_kelurahan")
								{
									include 'tambah_kelurahan.php';
								}
								else if($_GET['halaman']=="kecamatan")
								{
									include 'kecamatan.php';
								}
								else if($_GET['halaman']=="cari_kecamatan")
								{
									include 'cari_kecamatan.php';
								}
								else if($_GET['halaman']=="hapus_kecamatan")
								{
									include 'hapus_kecamatan.php';
								}
								else if($_GET['halaman']=="edit_kecamatan")
								{
									include 'edit_kecamatan.php';
								}
								else if($_GET['halaman']=="tambah_kecamatan")
								{
									include 'tambah_kecamatan.php';
								}
								else if($_GET['halaman']=="kota")
								{
									include 'kota.php';
								}
								else if($_GET['halaman']=="cari_kota")
								{
									include 'cari_kota.php';
								}
								else if($_GET['halaman']=="hapus_kota")
								{
									include 'hapus_kota.php';
								}
								else if($_GET['halaman']=="edit_kota")
								{
									include 'edit_kota.php';
								}
								else if($_GET['halaman']=="tambah_kota")
								{
									include 'tambah_kota.php';
								}
								else if($_GET['halaman']=="provinsi")
								{
									include 'provinsi.php';
								}
								else if($_GET['halaman']=="cari_provinsi")
								{
									include 'cari_provinsi.php';
								}
								else if($_GET['halaman']=="hapus_provinsi")
								{
									include 'hapus_provinsi.php';
								}
								else if($_GET['halaman']=="edit_provinsi")
								{
									include 'edit_provinsi.php';
								}
								else if($_GET['halaman']=="tambah_provinsi")
								{
									include 'tambah_provinsi.php';
								}
								else if($_GET['halaman']=="dokter")
								{
									include 'dokter.php';
								}
								else if($_GET['halaman']=="cari_dokter")
								{
									include 'cari_dokter.php';
								}
								else if($_GET['halaman']=="hapus_dokter")
								{
									include 'hapus_dokter.php';
								}
								else if($_GET['halaman']=="jenis_spesialis")
								{
									include 'jenis_spesialis.php';
								}
								else if($_GET['halaman']=="cari_jenis_spesialis")
								{
									include 'cari_jenis_spesialis.php';
								}
								else if($_GET['halaman']=="hapus_jenis_spesialis")
								{
									include 'hapus_jenis_spesialis.php';
								}
								else if($_GET['halaman']=="edit_jenis_spesialis")
								{
									include 'edit_jenis_spesialis.php';
								}
								else if($_GET['halaman']=="tambah_jenis_spesialis")
								{
									include 'tambah_jenis_spesialis.php';
								}
								else if($_GET['halaman']=="spesialis")
								{
									include 'spesialis.php';
								}
								else if($_GET['halaman']=="cari_spesialis")
								{
									include 'cari_spesialis.php';
								}
								else if($_GET['halaman']=="hapus_spesialis")
								{
									include 'hapus_spesialis.php';
								}
								else if($_GET['halaman']=="edit_spesialis")
								{
									include 'edit_spesialis.php';
								}
								else if($_GET['halaman']=="tambah_spesialis")
								{
									include 'tambah_spesialis.php';
								}
								else if($_GET['halaman']=="apotek")
								{
									include 'apotek.php';
								}
								else if($_GET['halaman']=="cari_apotek")
								{
									include 'cari_apotek.php';
								}
								else if($_GET['halaman']=="hapus_apotek")
								{
									include 'hapus_apotek.php';
								}
								else if($_GET['halaman']=="edit_apotek")
								{
									include 'edit_apotek.php';
								}
								else if($_GET['halaman']=="tambah_apotek")
								{
									include 'tambah_apotek.php';
								}
								else if($_GET['halaman']=="obat")
								{
									include 'obat.php';
								}
								else if($_GET['halaman']=="cari_obat")
								{
									include 'cari_obat.php';
								}
								else if($_GET['halaman']=="hapus_obat")
								{
									include 'hapus_obat.php';
								}
								else if($_GET['halaman']=="tambah_obat")
								{
									include 'tambah_obat.php';
								}
								else if($_GET['halaman']=="edit_obat")
								{
									include 'edit_obat.php';
								}
								else if($_GET['halaman']=="nota_konsul")
								{
									include 'nota_konsul.php';
								}
								else if($_GET['halaman']=="cari_nota_konsul")
								{
									include 'cari_nota_konsul.php';
								}
								else if($_GET['halaman']=="hapus_nota_konsul")
								{
									include 'hapus_nota_konsul.php';
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
								else if($_GET['halaman']=="hapus_nota_penyakit")
								{
									include 'hapus_nota_penyakit.php';
								}
								else if($_GET['halaman']=="penyakit")
								{
									include 'penyakit.php';
								}
								else if($_GET['halaman']=="cari_penyakit")
								{
									include 'cari_penyakit.php';
								}
								else if($_GET['halaman']=="hapus_penyakit")
								{
									include 'hapus_penyakit.php';
								}
								else if($_GET['halaman']=="edit_penyakit")
								{
									include 'edit_penyakit.php';
								}
								else if($_GET['halaman']=="tambah_penyakit")
								{
									include 'tambah_penyakit.php';
								}
								else if($_GET['halaman']=="status_konsul")
								{
									include 'status_konsul.php';
								}
								else if($_GET['halaman']=="cari_status_konsul")
								{
									include 'cari_status_konsul.php';
								}
								else if($_GET['halaman']=="hapus_status_konsul")
								{
									include 'hapus_status_konsul.php';
								}
								else if($_GET['halaman']=="tambah_status_konsul")
								{
									include 'tambah_status_konsul.php';
								}
								else if($_GET['halaman']=="resep_obat")
								{
									include 'resep_obat.php';
								}
								else if($_GET['halaman']=="cari_resep_obat")
								{
									include 'cari_resep_obat.php';
								}
								else if($_GET['halaman']=="hapus_resep_obat")
								{
									include 'hapus_resep_obat.php';
								}
								else if($_GET['halaman']=="edit_resep_obat")
								{
									include 'edit_resep_obat.php';
								}
								else if($_GET['halaman']=="pembelian_obat")
								{
									include 'pembelian_obat.php';
								}
								else if($_GET['halaman']=="cari_pembelian_obat")
								{
									include 'cari_pembelian_obat.php';
								}
								else if($_GET['halaman']=="hapus_pembelian_obat")
								{
									include 'hapus_pembelian_obat.php';
								}
								else if($_GET['halaman']=="jenis_bayar_konsul")
								{
									include 'jenis_bayar_konsul.php';
								}
								else if($_GET['halaman']=="cari_jenis_bayar_konsul")
								{
									include 'cari_jenis_bayar_konsul.php';
								}
								else if($_GET['halaman']=="hapus_jenis_bayar_konsul")
								{
									include 'hapus_jenis_bayar_konsul.php';
								}
								else if($_GET['halaman']=="edit_jenis_bayar_konsul")
								{
									include 'edit_jenis_bayar_konsul.php';
								}
								else if($_GET['halaman']=="tambah_jenis_bayar_konsul")
								{
									include 'tambah_jenis_bayar_konsul.php';
								}
								else if($_GET['halaman']=="jenis_bayar_obat")
								{
									include 'jenis_bayar_obat.php';
								}
								else if($_GET['halaman']=="cari_jenis_bayar_obat")
								{
									include 'cari_jenis_bayar_obat.php';
								}
								else if($_GET['halaman']=="hapus_jenis_bayar_obat")
								{
									include 'hapus_jenis_bayar_obat.php';
								}
								else if($_GET['halaman']=="edit_jenis_bayar_obat")
								{
									include 'edit_jenis_bayar_obat.php';
								}
								else if($_GET['halaman']=="tambah_jenis_bayar_obat")
								{
									include 'tambah_jenis_bayar_obat.php';
								}
								else if($_GET['halaman']=="status_bayar_konsul")
								{
									include 'status_bayar_konsul.php';
								}
								else if($_GET['halaman']=="cari_status_bayar_konsul")
								{
									include 'cari_status_bayar_konsul.php';
								}
								else if($_GET['halaman']=="hapus_status_bayar_konsul")
								{
									include 'hapus_status_bayar_konsul.php';
								}
								else if($_GET['halaman']=="edit_status_bayar_konsul")
								{
									include 'edit_status_bayar_konsul.php';
								}
								else if($_GET['halaman']=="tambah_status_bayar_konsul")
								{
									include 'tambah_status_bayar_konsul.php';
								}
								else if($_GET['halaman']=="status_bayar_obat")
								{
									include 'status_bayar_obat.php';
								}
								else if($_GET['halaman']=="cari_status_bayar_obat")
								{
									include 'cari_status_bayar_obat.php';
								}
								else if($_GET['halaman']=="hapus_status_bayar_obat")
								{
									include 'hapus_status_bayar_obat.php';
								}
								else if($_GET['halaman']=="edit_status_bayar_obat")
								{
									include 'edit_status_bayar_obat.php';
								}
								else if($_GET['halaman']=="tambah_status_bayar_obat")
								{
									include 'tambah_status_bayar_obat.php';
								}
								else if($_GET['halaman']=="metode_bayar_konsul")
								{
									include 'metode_bayar_konsul.php';
								}
								else if($_GET['halaman']=="cari_metode_bayar_konsul")
								{
									include 'cari_metode_bayar_konsul.php';
								}
								else if($_GET['halaman']=="hapus_metode_bayar_konsul")
								{
									include 'hapus_metode_bayar_konsul.php';
								}
								else if($_GET['halaman']=="edit_metode_bayar_konsul")
								{
									include 'edit_metode_bayar_konsul.php';
								}
								else if($_GET['halaman']=="tambah_metode_bayar_konsul")
								{
									include 'tambah_metode_bayar_konsul.php';
								}
								else if($_GET['halaman']=="metode_bayar_obat")
								{
									include 'metode_bayar_obat.php';
								}
								else if($_GET['halaman']=="cari_metode_bayar_obat")
								{
									include 'cari_metode_bayar_obat.php';
								}
								else if($_GET['halaman']=="hapus_metode_bayar_obat")
								{
									include 'hapus_metode_bayar_obat.php';
								}
								else if($_GET['halaman']=="edit_metode_bayar_obat")
								{
									include 'edit_metode_bayar_obat.php';
								}
								else if($_GET['halaman']=="tambah_metode_bayar_obat")
								{
									include 'tambah_metode_bayar_obat.php';
								}
								else if($_GET['halaman']=="detail")
								{
									include 'detail.php';
								}
								else if($_GET['halaman']=="detail_obat")
								{
									include 'detail_obat.php';
								}
								else if($_GET['halaman']=="laporan_konsul")
								{
									include 'laporan_konsul.php';
								}
								else if($_GET['halaman']=="laporan_penyakit")
								{
									include 'laporan_penyakit.php';
								}
								else if($_GET['halaman']=="laporan_dokter")
								{
									include 'laporan_dokter.php';
								}
								else if($_GET['halaman']=="detail_obat")
								{
									include 'detail_obat.php';
								}
								else if($_GET['halaman']=="laporan_hewan")
								{
									include 'laporan_hewan.php';
								}
								else if($_GET['halaman']=="jenis_penyakit")
								{
									include 'jenis_penyakit.php';
								}
								else if($_GET['halaman']=="cari_jenis_penyakit")
								{
									include 'cari_jenis_penyakit.php';
								}
								else if($_GET['halaman']=="hapus_jenis_penyakit")
								{
									include 'hapus_jenis_penyakit.php';
								}
								else if($_GET['halaman']=="edit_jenis_penyakit")
								{
									include 'edit_jenis_penyakit.php';
								}
								else if($_GET['halaman']=="tambah_jenis_penyakit")
								{
									include 'tambah_jenis_penyakit.php';
								}
								else if($_GET['halaman']=="jenis_obat")
								{
									include 'jenis_obat.php';
								}
								else if($_GET['halaman']=="cari_jenis_obat")
								{
									include 'cari_jenis_obat.php';
								}
								else if($_GET['halaman']=="hapus_jenis_obat")
								{
									include 'hapus_jenis_obat.php';
								}
								else if($_GET['halaman']=="edit_jenis_obat")
								{
									include 'edit_jenis_obat.php';
								}
								else if($_GET['halaman']=="tambah_jenis_obat")
								{
									include 'tambah_jenis_obat.php';
								}
								else if($_GET['halaman']=="laporan_spesialis")
								{
									include 'laporan_spesialis.php';
								}
								else if($_GET['halaman']=="laporan_spesialis_favorit")
								{
									include 'laporan_spesialis_favorit.php';
								}
								else if($_GET['halaman']=="laporan_dokter0")
								{
									include 'laporan_dokter0.php';
								}
								else if($_GET['halaman']=="laporan")
								{
									include 'laporan.php';
								}
								else if($_GET['halaman']=="laporan_bayar_konsul")
								{
									include 'laporan_bayar_konsul.php';
								}
								else if($_GET['halaman']=="laporan_bayar_obat")
								{
									include 'laporan_bayar_obat.php';
								}
								else if($_GET['halaman']=="laporan_pembayaran_konsul")
								{
									include 'laporan_pembayaran_konsul.php';
								}
								else if($_GET['halaman']=="laporan_pembayaran_obat")
								{
									include 'laporan_pembayaran_obat.php';
								}
								else if($_GET['halaman']=="metode_konsul")
								{
									include 'metode_konsul.php';
								}
								else if($_GET['halaman']=="cari_metode_konsul")
								{
									include 'cari_metode_konsul.php';
								}
								else if($_GET['halaman']=="hapus_metode_konsul")
								{
									include 'hapus_metode_konsul.php';
								}
								else if($_GET['halaman']=="edit_metode_konsul")
								{
									include 'edit_metode_konsul.php';
								}
								else if($_GET['halaman']=="tambah_metode_konsul")
								{
									include 'tambah_metode_konsul.php';
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