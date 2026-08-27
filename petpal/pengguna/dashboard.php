<div class="row">
        <div class="col-xs-12">
            <div class="white alert alert-block alert-default btn-purple">
                <button type="button" class="close" data-dismiss="alert">
                    <i class="ace-icon fa fa-times"></i>
                </button>

                <i class="ace-icon fa fa-check white"></i>
                Selamat datang di
                <strong class="white">
                PETPAL
                </strong>,
        tempat dengan pelayan terbaik untuk hewan peliharaan. Pastikan Anda bekerja dengan baik untuk memberikan pelayanan yang memuaskan bagi pengguna. Selalu periksa jalannya web secara berkala untuk memastikan web terhindar dari kesalahan dan dapat dijalankan dimanapun dan kapanpun.
            </div>
        </div><!-- /.col -->
    </div><!-- /.row -->
    <div class="consultation-message" style="text-align: center; padding: -20px; max-width: 600px; margin: 0 auto;">
        <h2 style="font-size: 24px; margin-bottom: 5px;">Solusi Kesehatan Hewan Terbaik</h2>
        <p style="font-size: 16px;">Temukan dokter spesialis terbaik untuk konsultasi kebutuhan kesehatan hewan Anda. Mulai konsultasi sekarang!</p>
    </div>

    <br><br>

    <section class="konten" style="background-color: #f8f9fa; padding: 10px 0;">
        <div class="container" style="max-width: 800px;">
            <div class="row">
                <?php 
                $menuItems = array(
                    array("Konsultasi", "konsultasi.png", "index.php?halaman=dokter"),
                    array("Obat dan Vitamin", "obat.png", "index.php?halaman=obat"),
                );

                foreach ($menuItems as $item) {
                ?>
                    <div class="col-md-6">
                        <div class="thumbnail" style="background-color: #fff; border: 1px solid #ddd; padding: 10px; text-align: center; box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);">
                            <a href="<?php echo $item[2]; ?>">
                                <img src="assets/images/<?php echo $item[1]; ?>" alt="<?php echo $item[0]; ?>" style="width: 70%; margin-bottom: 5px;">
                                <div class="caption center">
                                    <h3 style="font-size: 16px;"><?php echo $item[0]; ?></h3>
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
