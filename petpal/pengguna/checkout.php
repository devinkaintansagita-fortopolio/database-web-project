<?php
session_start();
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
	<title>Checkout </title>
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
				<?php foreach ($_SESSION['keranjang'] as $id_obat=> $jumlah):?>
				<?php
					$ambil=$koneksi->query("SELECT*FROM obat WHERE id_obat='$id_obat'");
					$pecah=$ambil->fetch_assoc();
					$sub_harga_obat=$pecah["harga_obat"]*$jumlah;
				?>
				<tr>
					<td><?php echo $nomor;?></td>
					<td><?php echo $pecah["nama_obat"];?> </td>
					<td>Rp.<?php echo number_format($pecah['harga_obat']);?> </td>
					<td><?php echo $jumlah; ?></td>
					<td>Rp.<?php echo number_format($sub_harga_obat);?> </td>
				</tr>
				<?php $nomor++;?>
				<?php $total_bayar_resep+=$sub_harga_obat;?>
				<?php $jumlah1+=$jumlah;?>
				<?php endforeach ?>
			</tbody>
			<tfoot>
				<tr>
					<th colspan="4"> Total Bayar Resep</th>
					<th>Rp.<?php echo number_format( $total_bayar_resep)?>
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
			</div>

			<br>
			<div class="row">
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
			<center><button class="btn btn-purple" name="checkout">Check Out</button><center>
		</form>
			
		<?php $ambil=$koneksi->query("SELECT*FROM resep_obat  
		JOIN status_bayar_obat ON resep_obat.id_status_bayar_obat=status_bayar_obat.id_status_bayar_obat ");?>
			
		<?php
		if(isset($_POST["checkout"]))
		{
			$id_pengguna=$_SESSION["pengguna"]["id_pengguna"];
			$id_jenis_bayar_obat=$_POST["id_jenis_bayar_obat"];
			$id_apotek=$_POST["id_apotek"];
			$tanggal_resep=date("Y-m-d");
			
			$query=mysqli_query($koneksi, "SELECT max(id_resep_obat) as kodeTerbesar FROM resep_obat");
			$data=mysqli_fetch_array($query);
			$id_resep_obat=$data['kodeTerbesar'];
			$urutan=(int) substr($id_resep_obat,3,3);
			$urutan++;
			$huruf="R";
			$id_resep_obat = $huruf . sprintf("%03s", $urutan);

			$id_status_bayar_obat="SBO03";
			
			$pembelian = $koneksi->query("INSERT INTO resep_obat (id_resep_obat, tanggal_resep, id_jenis_bayar_obat, id_status_bayar_obat, total_bayar_resep, id_apotek, id_pengguna) 
			VALUES ('$id_resep_obat','$tanggal_resep', '$id_jenis_bayar_obat', '$id_status_bayar_obat','$total_bayar_resep', '$id_apotek', '$id_pengguna')");
			if(!$pembelian) //If query couldnt be executed
			{
			echo "ERROR"; //Display information about why wasnt executed (eg. Error: couldnt find table)
			echo("<meta http-equiv='refresh' content='1'>");
			}
			$ambil=$koneksi->query("SELECT*FROM resep_obat");
			$pecahh=$ambil->fetch_assoc();
			$idresep_obat=$pecahh['id_resep_obat'];
			
			foreach ($_SESSION["keranjang"] as $id_obat => $qty) {
				$ambil_obat = $koneksi->query("SELECT * FROM obat WHERE id_obat='$id_obat'");
				$pecah_obat = $ambil_obat->fetch_assoc();
		
				$sub_qty = $qty; 
				$sub_harga_obat = $pecah_obat["harga_obat"] * $sub_qty; 
		
				$koneksi->query("INSERT INTO pembelian_obat (id_resep_obat, id_obat, sub_qty, sub_harga_obat) 
					VALUES ('$id_resep_obat', '$id_obat', '$sub_qty', '$sub_harga_obat')");
			}
				unset($_SESSION['keranjang']);
			
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