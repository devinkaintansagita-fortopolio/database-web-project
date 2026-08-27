<?php

$koneksi= new mysqli("localhost","root","","petpal");
$ambil=$koneksi->query("SELECT * FROM nota_konsul JOIN hewan ON nota_konsul.id_hewan = hewan.id_hewan WHERE id_nota_konsul='$_GET[id_nota_konsul]'");
$array = $ambil->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta charset="utf-8" />
		<title>Beranda | PETPAL</title>
		<meta name="description" content="overview &amp; stats" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
		<link rel="stylesheet" href="assets/css/bootstrap.min.css" />
		<link rel="stylesheet" href="assets/font-awesome/4.5.0/css/font-awesome.min.css" />
		<link rel="stylesheet" href="assets/css/fonts.googleapis.com.css" />
		<link rel="stylesheet" href="assets/css/ace.min.css" class="ace-main-stylesheet" id="main-ace-style" />
		<link rel="stylesheet" href="assets/css/ace-skins.min.css" />
		<link rel="stylesheet" href="assets/css/ace-rtl.min.css" />
		<script src="assets/js/ace-extra.min.js"></script>
        <style>
        .carousel-inner img {
            width: 100%;
            height: auto;
        }
        .wide-image {
            width: 100%;
        }
        </style>
	</head>

    <body class="container-fluid">
    <div id="navbar" class="navbar navbar-default          ace-save-state">
        <div class="navbar clearfix btn-purple btn-sm" id="navbar-clearfix">
            <button type="button" class="navbar-toggle menu-toggler pull-left" id="menu-toggler" data-target="#sidebar">
                <span class="sr-only">Toggle sidebar</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

            <div class="navbar-header pull-left">
                <a href="beranda.php" class="navbar-brand">
                    <small>
                        <i class="ace-icon fa fa-tachometer"></i>
                        PETPAL
                    </small>
                </a>
            </div>
        </div>
    </div>	
	
	<br><br>

	<main>
		<section class="featured-places">
			<div class="container">
				<h2>Nota Penyakit</h2>
				<hr>
				<form method="POST" style="border: 1px solid #ddd; padding: 20px; border-radius: 10px; box-shadow: 0px 0px 10px 0px rgba(0,0,0,0.1);">
					<div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="nama">ID Nota Konsultasi :</label>
                                <input type="text" readonly value="<?php echo $array["id_nota_konsul"];?>" class="form-control" id="id_nota_konsul">
                            </div>
                        </div>

						<div class="col-md-4">
							<div class="form-group">
								<label for="nama">Jenis Hewan:</label>
								<input type="text" readonly value="<?php echo $array["jenis_hewan"]; ?>" class="form-control" id="nama">
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-md-4">
							<div class="form-group">
								<label for="nama">Ras Hewan:</label>
								<input type="text" readonly value="<?php echo $array["ras_hewan"]; ?>" class="form-control" id="nama">
							</div>
						</div>

						<div class="col-md-4">
							<div class="form-group">
								<label for="nama">Umur Hewan:</label>
								<input type="text" readonly value="<?php echo $array["umur_hewan"]; ?>" class="form-control" id="nama">
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-md-4">
							<div class="form-group">
								<label for="nama">Keluhan:</label>
								<input type="text" readonly value="<?php echo $array["keluhan"]; ?>" class="form-control" id="nama">
							</div>
						</div>
						
						<div class="col-md-4">
							<div class="form-group">
								<label for="searchPenyakit">Search Penyakit:</label>
								<input type="text" class="form-control" id="searchPenyakit" placeholder="Search...">
							</div>

							<div class="form-group" style="max-height: 200px; overflow-y: auto;">
								<label for="id_penyakit">Penyakit :</label>
								<?php
								$ambil = $koneksi->query("SELECT * FROM penyakit");
								while ($penyakit = $ambil->fetch_assoc()) {
									?>
									<div class="form-check penyakit-item">
										<input type="checkbox" class="form-check-input" name="id_penyakit[]" value="<?php echo $penyakit['id_penyakit']; ?>" id="penyakit_<?php echo $penyakit['id_penyakit']; ?>">
										<label class="form-check-label" for="<?php echo $penyakit['id_penyakit']; ?>">
											<?php echo $penyakit['nama_penyakit']; ?>
										</label>
									</div>
								<?php } ?>
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-md-8">
							<div class="form-group">
								<label for="penanganan">Penanganan :</label>
								<input type="text" class="form-control" name="penanganan" required>
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
									<button class="btn btn-purple" name="diagnosa">Diagnosa</button>
								</div>
							</div>
						</div>
					</div>
				</form>

               <?php
			   if(isset($_POST['diagnosa']))
			   {
			   	$penanganan = $_POST['penanganan'];
				
				if (isset($_POST['diagnosa'])) {
					$id_nota_konsul = $_GET["id_nota_konsul"];
					$ambil = $koneksi->query("SELECT * FROM nota_konsul JOIN metode_konsul ON nota_konsul.id_metode_konsul=metode_konsul.id_metode_konsul WHERE id_nota_konsul='$_GET[id_nota_konsul]'");
                	$array = $ambil->fetch_assoc();
					$id_status_konsul = $array['id_status_konsul'];
					$id_metode_konsul = $array['id_metode_konsul'];
					foreach ($_POST['id_penyakit'] as $value) {
						$sql = "INSERT INTO nota_penyakit (id_nota_konsul,id_penyakit,penanganan) 
								VALUES ('$id_nota_konsul','$value','$penanganan')";
								mysqli_query($koneksi, $sql);
						if ($id_metode_konsul == 'MK02') {
							$updateStatusSql = "UPDATE nota_konsul SET id_status_konsul = 'SK02' WHERE id_nota_konsul = '$id_nota_konsul'";
							mysqli_query($koneksi, $updateStatusSql);
							echo "<script>
									alert('Nota Penyakit berhasil dibuat.');
									location='index.php?halaman=data_penyakit';
								</script>";
						} else {
							$updateStatusSql = "UPDATE nota_konsul SET id_status_konsul = 'SK02' WHERE id_nota_konsul = '$id_nota_konsul'";
							mysqli_query($koneksi, $updateStatusSql);
							echo "<script>
									alert('Nota Penyakit berhasil dibuat. Lanjut ke laman resep.');
									location='index.php?halaman=resep&id_nota_konsul=$id_nota_konsul';
								</script>";
						}

						$ambil = $koneksi->query("SELECT * FROM nota_konsul WHERE id_nota_konsul= '$id_nota_konsul' ");
						$arrayjenis = $ambil->fetch_assoc();

						$no = 0;
					}
				}

				}
                ?>
			</div>
		</section>
	</main>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js" type="text/javascript"></script>
	<script>window.jQuery || document.write('<script src="js/vendor/jquery-1.11.2.min.js"><\/script>')</script>

	<script src="js/vendor/bootstrap.min.js"></script>
	<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

	<script src="js/datepicker.js"></script>
	<script src="js/plugins.js"></script>
	<script src="js/main.js"></script>
	<script src="js/jquery.js"></script>
	<script>
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
			$('#searchPenyakit').on('input', function(){
				var searchTerm = $(this).val().toLowerCase();

				$('.penyakit-item').each(function(){
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

</body>
</html>