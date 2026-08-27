	<?php
	$koneksi= new mysqli("localhost","root","","petpal");

	$id_nota_konsul = $_GET['id_nota_konsul'];
	$ambildata = $koneksi->query("SELECT * FROM nota_konsul JOIN hewan ON nota_konsul.id_hewan = hewan.id_hewan 
	JOIN pengguna ON hewan.id_pengguna = pengguna.id_pengguna
	WHERE id_nota_konsul = '$id_nota_konsul'");
	$pengguna = $ambildata->fetch_assoc();
	?>

	<main>
	<section class="featured-places">
		<div class="container">
			<h2>Resep Obat</h2>
			<h5>Silahkan isi resep obat jika Anda ingin menambahkan obat. Jika tidak, silahkan klik tombol kembali untuk kembali ke beranda.</h5>

			<form method="POST" style="border: 1px solid #ddd; padding: 20px; border-radius: 10px; box-shadow: 0px 0px 10px 0px rgba(0,0,0,0.1);">
				<div class="row">
					<div class="col-md-4">
						<div class="form-group">
							<label for="id_nota_konsul">ID Nota Konsultasi:</label>
							<input type="text" readonly value="<?php echo $_GET["id_nota_konsul"]; ?>" class="form-control" id="id_nota_konsul">
						</div>
						<div class="form-group">
							<label for="nama">Nama Dokter:</label>
							<input type="text" readonly value="<?php echo $_SESSION["dokter"]["nama_dokter"]; ?>" class="form-control" id="nama">
						</div>
						<div class="form-group">
							<label for="nama">Jenis Hewan:</label>
							<input type="text" value="<?php echo $pengguna['jenis_hewan']; ?>" class="form-control" id="nama">
						</div>
						<div class="form-group">
							<label for="nama">Umur Hewan:</label>
							<input type="text" value="<?php echo $pengguna['umur_hewan']; ?>" class="form-control" id="nama">
						</div>
					</div>

					<div class="row">
						<div class="col-md-4">
							<div class="form-group">
								<label for="searchobat">Search Obat:</label>
								<input type="text" class="form-control" id="searchobat" placeholder="Search...">
							</div>

							<div class="form-group" style="max-height: 200px; overflow-y: auto;">
								<label for="id_obat">Obat :</label>
								<?php
								$ambil = $koneksi->query("SELECT * FROM obat");
								while ($obat = $ambil->fetch_assoc()) {
									?>
									<div class="form-check obat-item">
										<input type="checkbox" class="form-check-input" name="id_obat[]" value="<?php echo $obat['id_obat']; ?>" id="obat_<?php echo $obat['id_obat']; ?>">
										<label class="form-check-label" for="<?php echo $obat['id_obat']; ?>">
											<?php echo $obat['nama_obat']; ?>
										</label>
									</div>
								<?php } ?>
							</div>
						</div>

						<div class="col-md-4">
							<div class="form-group">
								<label for="ket_tambahan">Keterangan Tambahan :</label>
								<input type="text" class="form-control" name="ket_tambahan" required>
							</div>
						</div>
					</div>
				
				<div class="row">
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
								<button class="btn btn-purple" name="resep">Buat Resep</button>
							</div>
						</div>
					</div>
				</div>
			</form>
				<?php
					if (isset($_POST['resep'])) {

					$id_nota_konsul = $_GET ['id_nota_konsul'];
					$ambildata = $koneksi->query("SELECT * FROM nota_konsul JOIN hewan ON nota_konsul.id_hewan = hewan.id_hewan 
						WHERE id_nota_konsul = '$id_nota_konsul'");
					$pecah = $ambildata->fetch_assoc();
					$tanggal_resep=$pecah['tanggal_konsul'];
					$ket_tambahan = $_POST['ket_tambahan'];

					$query=mysqli_query($koneksi, "SELECT max(id_resep_obat) as kodeTerbesar FROM resep_obat");
					$data=mysqli_fetch_array($query);
					$id_resep_obat=$data['kodeTerbesar'];
					$urutan=(int) substr($id_resep_obat,3,3);
					$urutan++;
					$huruf="R";
					$id_resep_obat = $huruf . sprintf("%03s", $urutan);

					$id_status_bayar_obat="SBO03";
					$id_pengguna = $pecah['id_pengguna'];
					$sql = "INSERT INTO resep_obat (id_resep_obat,id_pengguna,id_nota_konsul,tanggal_resep,id_status_bayar_obat,ket_tambahan) 
						VALUES ('$id_resep_obat','$id_pengguna','$id_nota_konsul','$tanggal_resep','$id_status_bayar_obat','$ket_tambahan')";
						if (mysqli_query($koneksi, $sql)) {
							echo "New record created successfully";
						} else {
							echo "Error: " . $sql . "<br>" . mysqli_error($koneksi);
						}
						$total_harga=0;
					foreach($_POST['id_obat'] as $id_obat)
					{
						$ambilobat = $koneksi->query("SELECT * FROM obat  
						WHERE id_obat = '$id_obat'");
						$obat = $ambilobat->fetch_assoc();
						$harga_obat=$obat['harga_obat'];
						$sql = "INSERT INTO pembelian_obat (id_resep_obat,id_obat,sub_harga_obat,sub_qty) 
								VALUES ('$id_resep_obat','$id_obat','$harga_obat','1')";
						$total_harga+=$harga_obat;	
					

						$updatetotal = "UPDATE resep_obat SET total_bayar_resep = '$total_harga' WHERE id_resep_obat = '$id_resep_obat'";
						mysqli_query($koneksi, $updatetotal);
						if (mysqli_query($koneksi, $sql))
						{ 
							echo "<script>location='index.php?halaman=index.php?halaman=resep_obat;</script>";
						} else {
							echo "Error: " . $sql . "<br>" . mysqli_error($koneksi);
						}

					
						}	echo "<script>location='index.php?halaman=resep_obat';</script>";
					}
				
				
					?>
		</div>
	</section>
	</main>
	<script>
	$(document).ready(function(){
		$('#searchObat').on('input', function(){
			var searchTerm = $(this).val().toLowerCase();

			$('.obat-item').each(function(){
				var label = $(this).find('.form-check-label').text().toLowerCase();

				if(label.includes(searchTerm)){
					$(this).show();
				} else {
					$(this).hide();
				}
			});
		});
	});
	</script>
					
