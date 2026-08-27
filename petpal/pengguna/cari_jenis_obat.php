<?php
include('koneksi.php');

$query_obat = "SELECT * FROM jenis_obat";
$result_obat = mysqli_query($koneksi, $query_obat);

if (isset($_POST['cari_spesialis'])) {
    $id_jenis_obat = $_POST['id_jenis_obat'];
    $query = "SELECT * FROM obat WHERE id_jenis_obat = '$id_jenis_obat'";
    $result = mysqli_query($koneksi, $query);
}
?>

    <div class="consultation-message">
        <h2>Apakah anda ingin membeli Obat atau Vitamin?</h2>
        <p>Temukan obat yang sesuai dengan kebutuhan anda. Silahkan beli obat sekarang!</p>
    </div>

    <br><br>

    <section class="konten">
        <div class="container">
            <div class="row">
                <?php
                $count = 0;

                while ($row = mysqli_fetch_assoc($result)) {
                    if ($count % 3 == 0) {
                        echo '<div class="row">';
                    }
                ?>
                    <div class="col-md-3">
                        <div class="thumbnail">
                            <img src="../foto_obat/<?php echo $row['foto_obat']; ?>" width="300" alt="">
                            <div class="caption">
                                <h3><?php echo $row['nama_obat']; ?></h3>
                                <h6>Rp. <?php echo number_format($row['harga_obat']); ?></h6>
                                <a href="beli.php?id_obat=<?php echo $row['id_obat']; ?>" class="btn btn-purple">Beli</a>
                                <a href="detailobat2.php?id_obat=<?php echo $row['id_obat']; ?>" class="btn btn-purple">Detail</a>
                            </div>
                        </div>
                    </div>
                <?php
                    $count++;
                    if ($count % 3 == 0) {
                        echo '</div>';
                    }
                } ?>

                <?php
                if ($count % 3 != 0) {
                    echo '</div>';
                }
                ?>
            </div>
        </div>
    </section>

    <div class="button-section" style="text-align: center; margin-top: 20px;">
        <a href="index.php?halaman=obat" class="btn btn-purple" style="background-color: #8e44ad; color: white; padding: 10px 20px; border-radius: 5px; text-decoration: none;"> Kembali </a>
    </div>

    <br><br>

</body>

</html>
