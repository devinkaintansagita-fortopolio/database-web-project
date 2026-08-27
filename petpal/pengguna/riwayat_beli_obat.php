<?php
$koneksi= new mysqli("localhost","root","","petpal");

$id_pengguna = $_SESSION['pengguna']['id_pengguna'];
$sqli = "SELECT * FROM resep_obat WHERE id_resep_obat = '$id_pengguna' ";
$queryi = $koneksi->query($sqli);

?>
<main>
<section class="riwayat">
	<div class="container">
		<div class="row">
			<div class="col-md-10">
				<div style="color: black">
					<h2>Riwayat Pembelian Obat</h2>
					<div class="table-container" style="margin: 20px 0;">
						<table style="width: 100%; border-collapse: collapse;">
						<tr>
							<th style="border: 1px solid #ddd; padding: 8px; text-align: left;">Nama Pengguna :</th>
							<th style="border: 1px solid #ddd; padding: 8px; text-align: left;">No telepon Pengguna :</th>
							<th style="border: 1px solid #ddd; padding: 8px; text-align: left;">Email Pengguna :</th>
						</tr>
						<?php
							$id_pengguna=$_SESSION['pengguna']['id_pengguna'];
							$ambil = $koneksi->query("SELECT * FROM pengguna WHERE id_pengguna='$id_pengguna'");
							$pecah = $ambil->fetch_assoc();
							?>
							<tr>
								<td style="border: 1px solid #ddd; padding: 8px;"><?php echo $pecah['nama_pengguna']; ?></td>
								<td style="border: 1px solid #ddd; padding: 8px;"><?php echo $pecah['no_telepon']; ?></td>
								<td style="border: 1px solid #ddd; padding: 8px;"><?php echo $pecah['email']; ?></td>
							</tr>
					</div>
				</div>
			</div>
		</div>

	<table class="table" style='background : pink' >
	<br>
			<thead>
				<tr>
					<th><center>No</th>
					<th><center>Nomor Pembelian Obat</th>
					<th><center>Tanggal Pembayaran</th>
					<th><center>Nama Pengguna</th>
					<th><center>Nama Apotek</th>
					<th><center>Jenis Pembayaran</th>
					<th><center>Status Pembayaran</th>
						<th><center>Aksi</th>

				</tr>
			</thead>
			<tbody>
				<?php $nomor=1;?>
				<?php
					$ambil = $koneksi->query("SELECT * FROM resep_obat 
					JOIN pengguna ON resep_obat.id_pengguna = pengguna.id_pengguna
					JOIN apotek ON resep_obat.id_apotek = apotek.id_apotek
					JOIN jenis_bayar_obat ON resep_obat.id_jenis_bayar_obat = jenis_bayar_obat.id_jenis_bayar_obat
					JOIN status_bayar_obat ON resep_obat.id_status_bayar_obat = status_bayar_obat.id_status_bayar_obat");
					while ($pecah = $ambil->fetch_assoc()) {
				?>
				<tr>
					<td><?php echo $nomor;?></td>
					<td><?php echo $pecah["id_resep_obat"]; ?></td>
					<td><?php echo date("d F Y",strtotime($pecah["tanggal_resep"])); ?></td>
					<td><?php echo $pecah["nama_pengguna"]; ?></td>
					<td><?php echo $pecah["nama_apotek"]; ?></td>
					<td><?php echo $pecah["nama_jenis_bayar_obat"]; ?></td>
					<td><?php echo $pecah["jenis_status_bayar_obat"]; ?></td>
					<td><a href="index.php?halaman=detailobat&id_resep_obat=<?php echo $pecah["id_resep_obat"]?>" class="btn btn-purple">Rincian</a></td>
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