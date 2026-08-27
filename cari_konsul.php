<?php
include ('koneksi.php');

if (isset($_POST['cari_spesialis'])) {
    $_SESSION['session_pencarian_spesialis'] = $_POST["id_spesialis"];
}

$id_spesialis = isset($_SESSION['session_pencarian_spesialis']) ? $_SESSION['session_pencarian_spesialis'] : '';

$query = "SELECT * FROM dokter WHERE id_spesialis = '$id_spesialis'";
$result = mysqli_query($koneksi, $query);
?>

<section class="konten">
    <div class="container">
        <div class="row">
        <?php
		$ambil=$koneksi->query("SELECT*FROM spesialis WHERE id_spesialis='$id_spesialis'");
		$pecah=$ambil->fetch_assoc();
		$spesialis=$pecah["nama_spesialis"];
		?>
            <?php while($row = mysqli_fetch_assoc($result)) { ?>
                <div class="col-md-4">
                    <div class="thumbnail">
                        <img src="foto_dokter/<?php echo $row['foto_dokter']; ?>" width="300" alt="">
                        <div class="caption">
                            <h3><?php echo $row['nama_dokter']; ?></h3>
                            <h3><?php echo $pecah['nama_spesialis']; ?></h3>
                            <h6>Rp. <?php echo number_format($row['tarif_dokter']); ?></h6>
                            <a href="pengguna/konsultasi.php?id_dokter=<?php echo $row['id_dokter']; ?>" class="btn btn-purple">Konsultasi</a>
                            <a href="detail.php?id_dokter=<?php echo $row['id_dokter']; ?>" class="btn btn-purple">Detail</a>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
    <br>
</section>

<div class="button-section" style="text-align: center; margin-top: 20px;">
    <a href="beranda.php?halaman=konsultasi" class="btn btn-purple" style="background-color: #8e44ad; color: white; padding: 10px 20px; border-radius: 5px; text-decoration: none;"> Kembali </a>
</div>

<br><br>