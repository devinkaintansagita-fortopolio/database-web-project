<?php
$koneksi=new mysqli("localhost","root","","petpal");

if(!isset($_SESSION["pengguna"]))
{
	echo "<script>alert('Anda Harus Login Terlebih Dahulu');</script>";
	echo "<script>location='login.php';</script>";
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>bayar </title>
	<link rel="stylesheet" href="app/assets/css/bootstrap.css">
</head>

<?php include 'header.php'?>
<section class="konten">
	
	<div class="container">
	<h1> Check Out </h1>
		<table class= "table table-bordered" style="background-color:pink;" >
			<thead>
				<tr>
					<th>No.</th>
					<th>Nama Obat</th>
					<th>harga_obat</th>
					<th>Jumlah</th>
					<th>Sub Total</th>
				</tr>
			</thead>
			<tbody>
				<?php $nomor=1;?>
				<?php $total_bayar_resep=0;?>
				<?php $jumlah1=0;?>
                <?php $id_resep_obat = $_GET['id_resep_obat'];
                $ambil = $koneksi->query("SELECT * FROM pembelian_obat 
                JOIN resep_obat ON resep_obat.id_resep_obat = pembelian_obat.id_resep_obat
                JOIN obat ON pembelian_obat.id_obat = obat.id_obat
                 WHERE resep_obat.id_resep_obat = '$id_resep_obat'");
                while ($pecah = $ambil->fetch_assoc()) {?>
				<tr>
					<td><?php echo $nomor;?></td>
					<td><?php echo $pecah["nama_obat"];?> </td>
					<td>Rp.<?php echo number_format($pecah['harga_obat']);?> </td>
					<td><?php echo $pecah['sub_qty']; ?></td>
					<td>Rp.<?php echo number_format($pecah['sub_harga_obat']);?> </td>
				</tr>
				<?php } ?>
			</tbody>
			<tfoot>
				<tr>
					<th colspan="4"> Total Bayar Resep</th>
					<th>Rp.<?php 
                    
                    $resep= $koneksi->query("SELECT * FROM resep_obat
                 WHERE resep_obat.id_resep_obat = '$id_resep_obat'");
                  while ($pecah = $resep->fetch_assoc()) {
                    echo number_format($pecah['total_bayar_resep']);
                  }
                 ?>
                 
				</tr>
			</tfoot>
		</table>
		
		<form method="post">
			<div class="row">
				<div class="col-md-5">
					<label>Nama Pengguna:</label>
					<div class="form-group">
						<input type="text" readonly value="<?php echo $_SESSION["pengguna"]["nama_pengguna"]?>" class="form-control">
					</div>
				</div>

				<div class="col-md-5">
					<label>Alamat Pengguna:</label>
					<div class="form-group">
						<input type="text" readonly value="<?php echo $_SESSION["pengguna"]["alamat_pengguna"]?>" class="form-control">
					</div>
				</div>
			</div>

			<div class="row">
				<div class="col-md-5">
					<label>Metode Pembayaran:</label>
					<select class="form-control" name="id_metode_bayar_obat" id="id_metode_bayar_obat" required>
						<option value="">Pilih Metode Pembayaran</option>
						<?php
							$ambil = $koneksi->query("SELECT * FROM metode_bayar_obat");
							while ($pembayaran = $ambil->fetch_assoc()) {
								?>
								<option value="<?php echo $pembayaran['id_metode_bayar_obat']; ?>">
									<?php echo $pembayaran['ket_metode_bayar_obat'];?>
								</option>
						<?php }?>
					</select>
				</div>

				<div class="col-md-5">
					<label>Jenis Pembayaran:</label>
					<select class="form-control" name="id_jenis_bayar_obat" id="id_jenis_bayar_obat" required>
						<option value="">Pilih Jenis Pembayaran</option>
						<option></option>
					</select>
				</div>
			</div>

			<br>
			<div class="row">
				<div class="col-md-5">
					<label>Provinsi:</label>
					<select class="form-control" name="id_provinsi" id="id_provinsi" required>
						<option value="">Pilih Provinsi</option>
						<?php
							$ambil = $koneksi->query("SELECT * FROM provinsi");
							while ($prov = $ambil->fetch_assoc()) {
								?>
								<option value="<?php echo $prov['id_provinsi']; ?>">
									<?php echo $prov['nama_provinsi'];?>
								</option>
						<?php }?>
					</select>
				</div>
				
				<div class="col-md-5">
					<label>Kota:</label>
					<select class="form-control" name="id_kota" id="id_kota" required>
						<option value="">Pilih Kota</option>
						<option></option>
					</select>
				</div>

				<div class="col-md-5">
					<label>Apotek:</label>
					<select class="form-control" name="id_apotek" id="id_apotek" required>
						<option value="">Pilih Apotek</option>
						<option></option>
					</select>
				</div>
			</div>

			<br>
			<center><button class="btn btn-purple" name="bayar">Bayar</button><center>
		</form>
			
		<?php
		if(isset($_POST["bayar"]))
		{
			$id_pengguna=$_SESSION["pengguna"]["id_pengguna"];
			$id_jenis_bayar_obat=$_POST["id_jenis_bayar_obat"];
			$id_apotek=$_POST["id_apotek"];
			$tanggal_resep=date("Y-m-d");
			
            $koneksi->query("UPDATE resep_obat SET id_jenis_bayar_obat='$id_jenis_bayar_obat',
            id_apotek='$id_apotek' WHERE id_resep_obat='$id_resep_obat'");
			
			echo "<script>alert('Pembelian Sukses');</script>";
			echo "<script>location='pembayaran_obat.php?id_resep_obat=$id_resep_obat';</script>";
		}
		?>
		
	</div>
</section>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js" type="text/javascript"></script>
<script>window.jQuery || document.write('<script src="js/vendor/jquery-1.11.2.min.js"><\/script>')</script>

	<script src="js/vendor/bootstrap.min.js"></script>

	<script src="js/datepicker.js"></script>
	<script src="js/plugins.js"></script>
	<script src="js/main.js"></script>
	<script src="js/jquery.js"></script>
	<script>

		$(document).ready(function() {
			$('#id_metode_bayar_obat').change(function() {
				var id_metode_bayar_obat = $(this).val();

				$.ajax({
					type: 'POST',
					url: 'ambilmetode2.php',
					data: 'id_metode_bayar_obat='+id_metode_bayar_obat,
					success: function(response) {
						$('#id_jenis_bayar_obat').html (response);
					}
				});
			})
			$('#id_provinsi').change(function() {
				var id_provinsi = $(this).val();

				$.ajax({
					type: 'POST',
					url: 'ambilkota.php',
					data: 'id_provinsi='+id_provinsi,
					success: function(response) {
						$('#id_kota').html (response);
					}
				});
			})
			$('#id_kota').change(function() {
				var id_kota = $(this).val();

				$.ajax({
					type: 'POST',
					url: 'ambilapotek.php',
					data: 'id_kota='+id_kota,
					success: function(response) {
						$('#id_apotek').html (response);
					}
				});
			})
		});
	</script>
</body>
</html>