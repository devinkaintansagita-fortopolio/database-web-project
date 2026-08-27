    <div class="consultation-message">
        <h2>Solusi Kesehatan Hewan Terbaik</h2>
        <p>Temukan dokter spesialis terbaik untuk konsultasi kebutuhan kesehatan Anda. Mulai konsultasi sekarang!</p>
    </div>   
    <br><br>  
    <section class="konten">
        <div class="container">
            <div class="row">
                <?php 
                $menuItems = array(
                    array("Konsultasi", "konsultasi.png", "beranda.php?halaman=konsultasi"),
                    array("Obat dan Vitamin", "obat.png", "beranda.php?halaman=obat"),
                );

                foreach ($menuItems as $item) {
                ?>
                    <div class="col-md-6">
                        <div class="thumbnail">
                            <a href="<?php echo $item[2]; ?>">
                                <img src="assets/images/<?php echo $item[1]; ?>" alt="<?php echo $item[0]; ?>" style="width:50%">
                                <div class="caption center">
                                    <h3><?php echo $item[0]; ?></h3>
                                </div>
                            </a>
                        </div>
                    </div>
                <?php 
                } 
                ?>
            </div>
        </div>
        <br><br><br>
    </section>