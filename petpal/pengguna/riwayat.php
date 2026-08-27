<?php

$koneksi= new mysqli("localhost","root","","petpal");

$id_pengguna = $_SESSION['pengguna']['id_pengguna'];
$sqli = "SELECT * FROM nota_konsul WHERE id_hewan = '$id_pengguna' ";
$queryi = $koneksi->query($sqli);

?>
<main>
<section class="riwayat">
	<div class="container">
		<div class="row">
			<div class="col-md-10">
				<div style="color: black">
					<h2>Riwayat Konsultasi</h2>
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
					<th><center>Nomor Nota Konsul</th>
					<th><center>Tanggal Pembayaran</th>
					<th><center>Nama Hewan</th>
					<th><center>Nama Dokter</th>
					<th><center>Jenis Pembayaran</th>
					<th><center>Status Pembayaran</th>
					<th><center>Status Konsultasi</th>
						<th><center>Aksi</th>

				</tr>
			</thead>
			<tbody>
				<?php $nomor=1;?>
				<?php
					$id_pengguna = $_SESSION['pengguna']['id_pengguna'];
					$ambil = $koneksi->query("SELECT * FROM nota_konsul 
					JOIN hewan ON nota_konsul.id_hewan = hewan.id_hewan
					JOIN dokter ON nota_konsul.id_dokter = dokter.id_dokter
					JOIN jenis_bayar_konsul ON nota_konsul.id_jenis_bayar_konsul = jenis_bayar_konsul.id_jenis_bayar_konsul
					JOIN status_bayar_konsul ON nota_konsul.id_status_bayar_konsul = status_bayar_konsul.id_status_bayar_konsul
					JOIN status_konsul ON nota_konsul.id_status_konsul = status_konsul.id_status_konsul
					WHERE id_pengguna='$id_pengguna'");
					while ($pecah = $ambil->fetch_assoc()) {
				?>
				<tr>
					<td><?php echo $nomor;?></td>
					<td><?php echo $pecah["id_nota_konsul"]; ?></td>
					<td><?php echo date("d F Y",strtotime($pecah["tanggal_konsul"])); ?></td>
					<td><?php echo $pecah["nama_hewan"]; ?></td>
					<td><?php echo $pecah["nama_dokter"]; ?></td>
					<td><?php echo $pecah["ket_jenis_bayar_konsul"]; ?></td>
					<td><?php echo $pecah["jenis_status_bayar_konsul"]; ?></td>
					<td><?php echo $pecah["ket_status_konsul"]; ?></td>
					<td>
                        <?php
                            if ($pecah["jenis_status_bayar_konsul"] == 'Sudah Bayar') {
                                if ($pecah["ket_status_konsul"] != 'Sudah Selesai') {
                                    echo '<a href="index.php?halaman=detail&id_nota_konsul=' . $pecah["id_nota_konsul"] . '" class="btn btn-purple">Hasil Diagnosa</a>';
                                } else {
                                    echo '<button class="btn btn-disabled" disabled>Hasil Diagnosa</button>';
                                }
                            } else {
                                echo '<button class="btn btn-disabled" disabled>Hasil Diagnosa</button>';
                            }
                        ?>
                    </td>
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