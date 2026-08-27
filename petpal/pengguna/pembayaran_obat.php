<?php
session_start();
$koneksi= new mysqli("localhost","root","","petpal");

$idpem= $_GET["id_resep_obat"];
$ambil=$koneksi->query("SELECT *FROM resep_obat WHERE id_resep_obat='$idpem'");
$detpem=$ambil->fetch_assoc();

include 'header.php';
?>
<main>
	<div class="container">
		<?php $ambil=$koneksi->query("SELECT * FROM jenis_bayar_obat INNER JOIN resep_obat ON jenis_bayar_obat.id_jenis_bayar_obat=resep_obat.id_jenis_bayar_obat");
			while ($perjenis = $ambil->fetch_assoc()){ ?>
		<br/><p>Kirim bukti pembayaran anda disini</p>
		<div class="alert alert-purple"> Silakan melakukan pembayaran Rp. <?php echo number_format($perjenis['total_bayar_resep']);?> ke: <?php echo $perjenis['tujuan'];?><br>
				<strong><?php echo $perjenis['nama_jenis_bayar_obat'];?></strong>
			<?php } ?>
		</div>

		<form method="post" enctype="multipart/form-data">
			<div class="form-group">
				<label> Bukti Pembayaran </label>
				<input  type="file" class="form-control" name="bukti" required>
				<p class="text-danger"> Foto bukti bayar obat harus .JPG Maks.2MB </p>
			</div>
			<button class="btn btn-purple" name="kirim">Kirim</button>
			<a href="riwayat_beli_obat.php" class="btn btn-purple">Kembali </a>
		</form>
	</div>

	<?php
	if(isset($_POST["kirim"]))
	{
		$namabukti=$_FILES["bukti"]["name"];
		$lokasibukti=$_FILES["bukti"]["tmp_name"];
		$namafiks=date("Y-m-d").$namabukti;
		move_uploaded_file($lokasibukti,"../pembayaran/$namafiks");

		$tanggal=date("Y-m-d");
		$kode="SBO01";

		$koneksi->query("UPDATE resep_obat SET bukti_bayar_obat='$namafiks', id_status_bayar_obat='$kode' WHERE id_resep_obat='$idpem'");			

		echo "<script>alert('Silahkan Tunggu Admin Memproses Pembayaran');</script>";
		echo "<script>location='index.php?halaman=riwayat_beli_obat';</script>";
	}
	?>
</main>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js" type="text/javascript"></script>
<script>window.jQuery || document.write('<script src="js/vendor/jquery-1.11.2.min.js"><\/script>')</script>

	<script src="js/vendor/bootstrap.min.js"></script>

	<script src="js/datepicker.js"></script>
	<script src="js/plugins.js"></script>
	<script src="js/main.js"></script>
</body>
</html>