<?php
session_start();
$koneksi= new mysqli("localhost","root","","petpal");

if (!isset($_SESSION['pengguna']))
{
	echo "<script>alert('Anda harus login');</script>";
	echo "<script>location='login.php';</script>";
	$_SESSION['konsul'] = $_GET['id_dokter'];
	exit();
}

$ambil=$koneksi->query("SELECT * FROM dokter WHERE id_dokter='$_GET[id_dokter]'");
$arraydokter = $ambil->fetch_assoc();
$id_dokter = $arraydokter['id_dokter'];
$tanggal_konsul=date("Y-m-d");

$id_pengguna = $_SESSION['pengguna']['id_pengguna'];
$query_cek_hewan = $koneksi->query("SELECT * FROM hewan WHERE id_pengguna='$id_pengguna'");
$jumlah_hewan = $query_cek_hewan->num_rows;

include 'header.php';

?>

<main>
	<section class="featured-places">
		<div class="container">

			<h2>Nota Konsultasi</h2>
			<div class="table-container" style="margin: 20px 0;">
				<table style="width: 100%; border-collapse: collapse;">
					<thead>
						<tr>
							<th style="border: 1px solid #ddd; padding: 7px; width: 20%;">Nama dokter</th>
							<th style="border: 1px solid #ddd; padding: 7px; width: 30%;">Spesialis</th>
							<th style="border: 1px solid #ddd; padding: 7px; width: 15%;">Tarif dokter</th>
							<th style="border: 1px solid #ddd; padding: 7px; width: 15%;">Tanggal konsultasi</th>
							<th style="border: 1px solid #ddd; padding: 7px; width: 20%;">Total</th>
						</tr>
					</thead>
					<tbody>
						<?php
						$tanggal = date('d-m-Y');

						$ambil = $koneksi->query("SELECT dokter.*, spesialis.nama_spesialis 
							FROM dokter 
							JOIN spesialis ON dokter.id_spesialis = spesialis.id_spesialis 
							WHERE dokter.id_dokter='$_GET[id_dokter]'");

						$pecah = $ambil->fetch_assoc();
						$id_metode_bayar_konsul = $pecah['tarif_dokter'];
						$nama_spesialis = $pecah['nama_spesialis'];
						?>
						<tr>
							<table border="1" style="border-collapse: collapse; width: 100%;">
								<tr>
									<td style="border: 1px solid #ddd; padding: 7px; width: 20%;"><?php echo $pecah['nama_dokter']; ?></td>
									<td style="border: 1px solid #ddd; padding: 7px; width: 30%;"><?php echo $pecah['nama_spesialis']; ?></td>
									<td style="border: 1px solid #ddd; padding: 7px; width: 15%;">Rp. <?php echo number_format($pecah['tarif_dokter']); ?></td>
									<td style="border: 1px solid #ddd; padding: 7px; width: 15%;"><?php echo $tanggal; ?></td>
									<td style="border: 1px solid #ddd; padding: 7px; width: 20%;">Rp. <?php echo number_format($pecah['tarif_dokter']); ?></td>
								</tr>
							</table>
						</tr>
					</tbody>
					<tfoot>
						<table>
							<tr>
								<th colspan="4" style="border: 1px solid #ddd; padding: 10px; font-weight: bold;">Total</th>
								<th style="border: 1px solid #ddd; padding: 10px; width: 8.45%; font-weight: bold;">Rp. <?php echo number_format($pecah['tarif_dokter']) ?></th>
							</tr>
						</table>
					</tfoot>
				</table>
			</div>

			<form method="POST" enctype="multipart/form-data" style="border: 1px solid #ddd; padding: 20px; border-radius: 10px; box-shadow: 0px 0px 10px 0px rgba(0,0,0,0.1);">
				<div class="row">
					<div class="col-md-4">
						<div class="form-group">
							<label for="nama">Nama:</label>
							<input type="text" readonly value="<?php echo $_SESSION["pengguna"]["nama_pengguna"]; ?>" class="form-control" id="nama">
						</div>
					</div>

					<div class="col-md-4">
						<div class="form-group">
							<label for="jenis_hewan">Hewan:</label>
							<?php if ($jumlah_hewan > 0) { ?>
								<select class="form-control" name="id_hewan" id="id_hewan">
									<option value="">Pilih Hewan</option>
									<?php
									$ambil_hewan = $koneksi->query("SELECT * FROM hewan WHERE id_pengguna='$id_pengguna'");
									while ($pembayaran = $ambil_hewan->fetch_assoc()) {
										?>
										<option value="<?php echo $pembayaran['id_hewan']; ?>">
											<?php echo $pembayaran['nama_hewan']; ?>
											- <?php echo $pembayaran['jenis_hewan']; ?>
										</option>
									<?php } ?>
								</select>
							<?php } else { 
								echo "<script>alert('Anda Belum Mempunyai Hewan');</script>";
								echo "<script>location='index.php?halaman=tambah_hewan';</script>";
								$_SESSION['konsul'] = $_GET['id_dokter'];
								exit();
							 } ?>
						</div>
					</div>

					<div class="col-md-4">
						<label>Metode Pembayaran :</label>
						<select class="form-control" name="id_metode_bayar_konsul" id="id_metode_bayar_konsul">
							<option value="">Pilih Metode Pembayaran</option>
							<?php
							$ambil=$koneksi->query("SELECT * FROM metode_bayar_konsul");
							while($pembayaran=$ambil->fetch_assoc()){
								?>
								<option value="<?php echo $pembayaran['id_metode_bayar_konsul']; ?>">
									<?php echo $pembayaran['ket_metode_bayar_konsul'];?>
								</option>
							<?php }?>
						</select>
					</div>
					
					<div class="col-md-4">
						<label>Jenis Pembayaran :</label>
						<select class="form-control" name="id_jenis_bayar_konsul" id="id_jenis_bayar_konsul">
							<option value="">Pilih Jenis Pembayaran</option>
							<option></option>
						</select>
					</div>
					<div class="col-md-4">
						<label>Metode Konsultasi :</label>
						<select class="form-control" name="id_metode_konsul" id="id_metode_konsul">
							<option value="">Pilih Metode Konsultasi</option>
							<?php
							$ambil=$koneksi->query("SELECT * FROM metode_konsul");
							while($metode=$ambil->fetch_assoc()){
								?>
								<option value="<?php echo $metode['id_metode_konsul']; ?>">
									<?php echo $metode['nama_metode_konsul'];?>
								</option>
							<?php }?>
						</select>
					</div>
					<div class="form-group">
					<label for="file">Pilih Foto:</label>
       				<input type="file" name="file" accept="image/*" required>
					<p class="text-danger"> Foto bukti harus .JPG maks.2MB </p>
					</div>
					<div class="col-md-8">
						<div class="form-group">
							<label for="keluhan">Keluhan:</label>
							<input type="text" class="form-control" name="keluhan">
						</div>
					</div>

					<div class="col-md-5 mt-3">
						<div class="clearfix">
							<div class="float-left">
								<a href="index.php" class="btn btn-purple">Kembali</a>
							</div>
						</div>
					</div>

					<div class="col-md-5 offset-md-2 mt-3">
						<div class="clearfix">
							<div class="float-right">
								<button class="btn btn-purple" name="konsultasi">Konsultasi</button>
							</div>
						</div>
					</div>
				</div>
			</form>

			<?php
			if(isset($_POST['konsultasi']))
			{	
				unset($_SESSION['konsul']);
				$id_hewan=$_POST["id_hewan"];
				$keluhan=$_POST["keluhan"];
				$id_metode_konsul = $_POST['id_metode_konsul'];
				$id_jenis_bayar_konsul=$_POST["id_jenis_bayar_konsul"]; 

				$ambil=$koneksi->query("SELECT * FROM hewan WHERE id_hewan= '$id_hewan' ");
				$arrayjenis=$ambil->fetch_assoc();

				$query=mysqli_query($koneksi, "SELECT max(id_nota_konsul) as kodeTerbesar FROM nota_konsul");
				$data=mysqli_fetch_array($query);
				$id_nota_konsul=$data['kodeTerbesar'];
				$urutan=(int) substr($id_nota_konsul,3,3);
				$urutan++;
				$huruf="N";
				$id_nota_konsul = $huruf . sprintf("%03s", $urutan);

				$namabukti = $_FILES['file']['name'];
				$lokasibukti = $_FILES['file']['tmp_name'];
				$namafiks=date("Y-m-d") . $namabukti;
				$folder_upload = '../foto_konsul/';
   				$lokasi_file = $folder_upload . $namafiks;
				move_uploaded_file($lokasibukti,$lokasi_file);

				$id_status_bayar_konsul="SBK03";
				$id_status_konsul="SK01";

				$sql = "INSERT INTO nota_konsul (id_nota_konsul,tanggal_konsul,keluhan,id_status_bayar_konsul,id_jenis_bayar_konsul,id_hewan,id_dokter,id_metode_konsul,id_status_konsul, foto_konsul) 
				VALUES ('$id_nota_konsul','$tanggal_konsul','$keluhan','$id_status_bayar_konsul','$id_jenis_bayar_konsul','$id_hewan','$id_dokter','$id_metode_konsul','$id_status_konsul','$namafiks')";
				if (mysqli_query($koneksi, $sql)) {
					echo "New record created successfully";
				} else {
					echo "Error: " . $sql . "<br>" . mysqli_error($koneksi);
				}

				echo "<script>location='pembayaran.php?id_nota_konsul=$id_nota_konsul';</script>";
			}
			?>
		</div>
	</section>
</main>

<?php include 'footer.php';?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js" type="text/javascript"></script>
<script>window.jQuery || document.write('<script src="js/vendor/jquery-1.11.2.min.js"><\/script>')</script>
	<script type="text/javascript">
		const myModal = document.getElementById('myModal')
		const myInput = document.getElementById('myInput')

		myModal.addEventListener('shown.bs.modal', () => {
			myInput.focus()
		})
	</script>
	<script src="js/vendor/bootstrap.min.js"></script>

	<script src="js/datepicker.js"></script>
	<script src="js/plugins.js"></script>
	<script src="js/main.js"></script>
	<script src="js/jquery.js"></script>
	<script src="assets/js/bootbox.js"></script>
	<script>
			$("#bootbox-regular").on(ace.click_event, function() {
					bootbox.prompt("What is your name?", function(result) {
						if (result === null) {

						} else {
							
						}
					});
				});
		$(document).ready(function() {
			$('#id_metode_bayar_konsul').change(function() {
				var id_metode_bayar_konsul = $(this).val();

				$.ajax({
					type: 'POST',
					url: 'ambilmetode.php',
					data: 'id_metode_bayar_konsul='+id_metode_bayar_konsul,
					success: function(response) {
						$('#id_jenis_bayar_konsul').html (response);
					}
				});
			})
			$('#jenis_hewan').change(function() {
				var jenis_hewan = $(this).val();

				$.ajax({
					type: 'POST',
					url: 'ambilhewan.php',
					data: 'jenis_hewan='+jenis_hewan,
					success: function(response) {
						$('nama_hewan').html (response);
					}
				});
			})
		});
	</script>


</body>
</html>