<?php
$query = "SELECT * FROM obat";
$result = mysqli_query($koneksi, $query);
?>

<div class="consultation-message">
    <h2>Apakah anda ingin membeli Obat atau Vitamin?</h2>
    <p>Temukan obat yang sesuai dengan kebutuhan anda. Silahkan beli obat sekarang!</p>
</div>

<section class="konten">
<div class="container">
<div class="row">
    <form class="form-inline" role="search" method="post" action="beranda.php?halaman=cari_jenis_obat">
        <div class="col-10">
            <table border="0">
                <tr>
                    <td>
                        <div class="form-group">
                            <input type="text" class="form-control" name="keyword" placeholder="Masukkan Pencarian" autofocus autocomplete="off">
                        </div>
                    </td>
                    <td>
                        <button class="btn btn-purple" name="cari"> Cari ... </button>
                    </td>
                </tr>
            </table>
        </div>
    </form>
</div>
<br>
<div class="row">
    <form class="form-inline" role="search" method="post" action="beranda.php?halaman=cari_jenis_obat">
        <div class="row">
            <div class="col-md-12 col-lg-2 products-number-sort" >
                <div class="products-sort-by mt-2 mt-lg-0" width="15">
                    <select class="form-control" name="id_jenis_obat" id="id_jenis_obat" required>
                        <option selected disabled>-- Pilih Jenis Obat -- </option>
                            <?php
                            while($row = mysqli_fetch_assoc($result_obat)){
                                ?>
                                <option value="<?php echo $row['id_jenis_obat']; ?>">
                                    <?php echo $row['nama_jenis_obat'];?>
                                </option>
                            <?php }?>
                    </select>
                </div>
            </div>

            <div class="form-group">
                <button class="btn btn-purple" type="submit" name="cari_spesialis"> Cari ... </button>
            </div>
        </div>
    </form>
</div>
</div>
</section>

<br><br>

<section class="konten">
    <div class="container">
        <div class="row">
            <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                <div class="col-md-4">
                    <div class="thumbnail">
                        <img src="foto_obat/<?php echo $row['foto_obat']; ?>" width="300" alt="">
                        <div class="caption">
                            <h3><?php echo $row['nama_obat']; ?></h3>
                            <h6>Rp. <?php echo number_format($row['harga_obat']); ?></h6>
                            <a href="beli.php?id_obat=<?php echo $row['id_obat']; ?>" class="btn btn-purple">Beli</a>
                            <a href="detailobat.php?id_obat=<?php echo $row['id_obat']; ?>" class="btn btn-purple">Detail</a>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</section>

<div class="button-section" style="text-align: center; margin-top: 20px;">
    <a href="beranda.php" class="btn btn-purple" style="background-color: #8e44ad; color: white; padding: 10px 20px; border-radius: 5px; text-decoration: none;"> Kembali </a>
</div>

<br><br>
