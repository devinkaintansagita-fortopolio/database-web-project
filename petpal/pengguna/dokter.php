<div class="consultation-message">
<h2>Ingin Konsultasi dengan Dokter?</h2>
<p>Temukan dokter spesialis terbaik untuk kebutuhan kesehatan hewan peliharaan Anda. Mulai konsultasi sekarang!</p>
</div>  

<section class="konten">
<div class="container">
<div class="row">
    <form class="form-inline" role="search" method="post" action="index.php?halaman=cari_konsul">
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
    <form class="form-inline" role="search" method="post" action="index.php?halaman=cari_konsul">
        <div class="row">
            <div class="col-md-12 col-lg-2 products-number-sort" >
                <div class="products-sort-by mt-2 mt-lg-0" width="15">
                    <select class="form-control" name="id_jenis_spesialis" id="id_jenis_spesialis" required>
                        <option selected disabled>-- Pilih Jenis Spesialis -- </option>
                            <?php
                            while($row = mysqli_fetch_assoc($result_jen)){
                                ?>
                                <option value="<?php echo $row['id_jenis_spesialis']; ?>">
                                    <?php echo $row['nama_jenis_spesialis'];?>
                                </option>
                            <?php }?>
                    </select>
                </div>
            </div>

            <div class="col-md-12 col-lg-2 products-number-sort">
                <div class="products-sort-by mt-2 mt-lg-0">
                    <select class="form-control" name="id_spesialis" id="id_spesialis" required>
                        <option selected disabled>-- Pilih Spesialis -- </option>
                        <option></option>
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
            <?php
            $count = 0; 

            while ($row = mysqli_fetch_assoc($result)) {
                if ($count % 3 == 0) {
                    echo '<div class="row">';
                }
            ?>
                <div class="col-md-3">
                    <div class="thumbnail">
                        <img src="../foto_dokter/<?php echo $row['foto_dokter']; ?>" width="300" alt="">
                        <div class="caption">
                        <h3><?php echo $row['nama_dokter']; ?></h3>
                        <h4><?php echo $row['nama_spesialis']; ?></h4>
                        <h5><?php echo $row['nama_jenis_spesialis']; ?></h5>
                        <h6>Rp. <?php echo number_format($row['tarif_dokter']); ?></h6>
                        <a href="konsultasi.php?id_dokter=<?php echo $row['id_dokter']; ?>" class="btn btn-purple">Konsultasi</a>
                        <a href="detail.php?id_dokter=<?php echo $row['id_dokter']; ?>" class="btn btn-purple">Detail</a>
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
    <a href="index.php" class="btn btn-purple" style="background-color: #8e44ad; color: white; padding: 10px 20px; border-radius: 5px; text-decoration: none;"> Kembali </a>
</div>

<br><br>

