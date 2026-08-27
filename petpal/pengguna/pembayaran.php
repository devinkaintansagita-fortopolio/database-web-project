<?php
session_start();
$koneksi= new mysqli("localhost","root","","petpal");

$idpem= $_GET["id_nota_konsul"];
$ambil=$koneksi->query("SELECT *FROM nota_konsul WHERE id_nota_konsul='$idpem'");
$detpem=$ambil->fetch_assoc();

$id_hewan=$detpem["id_hewan"];

include 'header.php';
?>
<main>
	<div class="container">
		<?php $ambil=$koneksi->query("SELECT * FROM jenis_bayar_konsul INNER JOIN nota_konsul ON jenis_bayar_konsul.id_jenis_bayar_konsul=nota_konsul.id_jenis_bayar_konsul INNER JOIN dokter ON dokter.id_dokter=nota_konsul.id_dokter WHERE nota_konsul.id_nota_konsul='$_GET[id_nota_konsul]'");
			while ($perjenis = $ambil->fetch_assoc()){ ?>
		<br/><p>Kirim bukti pembayaran anda disini</p>
		<div class="alert alert-purple"> Silakan melakukan pembayaran Rp. <?php echo number_format($perjenis['tarif_dokter']);?> ke: <?php echo $perjenis['tujuan'];?><br>
				<strong><?php echo $perjenis['ket_jenis_bayar_konsul'];?></strong>
			<?php } ?>
		</div>

		<form method="post" enctype="multipart/form-data">
			<div class="form-group">
				<label> Bukti Pembayaran </label>
				<input  type="file" class="form-control" name="bukti" required>
				<p class="text-danger"> Foto bukti bayar konsultasi harus .JPG Maks.2MB </p>
			</div>
			<button class="btn btn-purple" name="kirim">Kirim</button>
			<a href="riwayat.php" class="btn btn-purple">Kembali </a>
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
		$kode="SBK01";

		$koneksi->query("UPDATE nota_konsul SET bukti_bayar_konsul='$namafiks', id_status_bayar_konsul='$kode' WHERE id_nota_konsul='$idpem'");			

		echo "<script>alert('Silahkan Tunggu Admin Memproses Pembayaran');</script>";
		echo "<script>location='index.php?halaman=riwayat';</script>";
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