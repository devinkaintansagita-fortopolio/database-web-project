<?php
session_start();
$koneksi= new mysqli("localhost","root","","petpal");

$id_dokter = $_SESSION['dokter']['id_dokter'];
$sqli = "SELECT * FROM nota_konsul WHERE id_hewan = '$id_dokter' ";
$queryi = $koneksi->query($sqli);

if (!isset($_SESSION['dokter']))
{
	echo "<script>alert('Anda harus login');</script>";
	echo "<script>location='login.php';</script>";
	header('location=login.php');
	exit();
}
include 'header.php';
?>
<main>
<section class="riwayat">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div style="color: black">
					<center><h2>Riwayat <?php echo $_SESSION["pengguna"]["nama_pengguna"]; ?></h2></center>
				</div>
			</div>
		</div>

	<table class="table">
			<thead>
				<tr>
					<th><center>No</th>
					<th><center>Nomor Nota Konsul</th>
					<th><center>Tanggal Pembayaran</th>
					<th><center>Nama Hewan</th>
					<th><center>Jenis Pembayaran</th>
					<th><center> Status Pembayaran</th>
					<th><center> Status Konsultasi</th>
						<th><center>Aksi</th>

				</tr>
			</thead>
			<tbody>
				<?php $nomor=1;?>
				<?php
					//mendapatkan id pelanggan yg login dari session
					$id_dokter = $_SESSION['dokter']['id_dokter'];
					$ambil = $koneksi->query("SELECT * FROM nota_konsul 
					JOIN hewan ON nota_konsul.id_hewan = hewan.id_hewan
					JOIN jenis_bayar_konsul ON nota_konsul.id_jenis_bayar_konsul = jenis_bayar_konsul.id_jenis_bayar_konsul
					JOIN status_bayar_konsul ON nota_konsul.id_status_bayar_konsul = status_bayar_konsul.id_status_bayar_konsul
					JOIN status_konsul ON nota_konsul.id_status_konsul = status_konsul.id_status_konsul
					WHERE id_dokter='$id_dokter'");
					while ($pecah = $ambil->fetch_assoc()) {
				?>
				<tr>
					<td><?php echo $nomor;?></td>
					<td><?php echo $pecah["id_nota_konsul"]; ?></td>
					<td><?php echo date("d F Y",strtotime($pecah["tanggal_konsul"])); ?></td>
					<td><?php echo $pecah["nama_hewan"]; ?></td>
					<td><?php echo $pecah["ket_jenis_bayar_konsul"]; ?></td>
					<td><?php echo $pecah["jenis_status_bayar_konsul"]; ?></td>
					<td><?php echo $pecah["ket_status_konsul"]; ?></td>
					<td><a href="detail.php?id_dokter=<?php echo $pecah["id_dokter"]?>" class="btn btn-purple">Detail</a></td>
				</tr>
				<?php $nomor++; ?>
				<?php } ?>
			</tbody>
		</table>
	

	</div>
</section>
	</main>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js" type="text/javascript"></script>
	<script>window.jQuery || document.write('<script src="js/vendor/jquery-1.11.2.min.js"><\/script>')</script>

		<script src="js/vendor/bootstrap.min.js"></script>

		<script src="js/datepicker.js"></script>
		<script src="js/plugins.js"></script>
		<script src="js/main.js"></script>
	</body>
	</html>