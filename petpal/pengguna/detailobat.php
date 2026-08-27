<div class="card" style="border-radius: 15px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);">
    <div class="card-header py-1" style="background-color: #ffc0cb; border-top-left-radius: 15px; border-top-right-radius: 15px;">
        <center><h2 class="m-0 font-weight-bold text-dark">Nota Pembelian Obat</h2></center>
    </div>
    <div class="card-body" style="background-color: #f9f9f9; border-bottom-left-radius: 15px; border-bottom-right-radius: 15px; padding: 20px;">
        <?php
        $id_resep_obat = $_GET['id_resep_obat'];
            $ambildata = mysqli_query($koneksi, "SELECT * FROM resep_obat 
            JOIN status_bayar_obat ON resep_obat.id_status_bayar_obat=status_bayar_obat.id_status_bayar_obat 
            JOIN jenis_bayar_obat ON resep_obat.id_jenis_bayar_obat=jenis_bayar_obat.id_jenis_bayar_obat 
            JOIN apotek ON resep_obat.id_apotek=apotek.id_apotek 
            JOIN pengguna ON resep_obat.id_pengguna = pengguna.id_pengguna
            WHERE resep_obat.id_resep_obat = '$id_resep_obat'");
        $No = 1;

        while ($db = $ambildata->fetch_assoc()) {; 
            ?>
            <div class="nota-container" style="background-color: #fff; border-radius: 15px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); padding: 20px; margin-bottom: 20px;">
                <div class="table-container" style="margin: 20px 0;">
                    <table style="width: 100%; border-collapse: collapse;">
                        <thead>
                            <tr>
                                <th style="border: 1px solid #ddd; padding: 10px; width: 18%;">Nama Pengguna</th>
                                <th style="border: 1px solid #ddd; padding: 10px; width: 18%;">Tanggal Resep</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td style="border: 1px solid #ddd; padding: 10px;"><?php echo $db['nama_pengguna']; ?></td>
                                <td style="border: 1px solid #ddd; padding: 10px;"><?php echo $db['tanggal_resep']; ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <br>
                <h4>Rincian Pembelian Obat</h4>
                <h6>Silahkan ambil obat Anda di Apotek pilihan Anda dengan menunjukkan nota pembelian obat</h6>
                <table style="width: 100%; border-collapse: collapse; margin-top: 20px;">
                    <thead>
                        <tr style="background-color: #f2f2f2;">
                            <th style="border: 1px solid #dddddd; text-align: left; padding: 8px;">No. </th>
                            <th style="border: 1px solid #dddddd; text-align: left; padding: 8px;">Nama Obat</th>
                            <th style="border: 1px solid #dddddd; text-align: left; padding: 8px;">Sub Quantity</th>
                            <th style="border: 1px solid #dddddd; text-align: left; padding: 8px;">Sub Harga Obat</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        $id_resep_obat = $_GET['id_resep_obat'];
                        $ambil = $koneksi->query("SELECT * FROM pembelian_obat WHERE id_resep_obat='$id_resep_obat'");
                        $nomor = 1; // Inisialisasi nomor
                        while ($data = $ambil->fetch_assoc()) {?>
                            <tr style="border: 1px solid #dddddd;">
                                <td style="border: 1px solid #dddddd; text-align: left; padding: 8px;"><?php echo $nomor; ?></td>
                                <td style="border: 1px solid #dddddd; text-align: left; padding: 8px;"><?php echo $data['id_obat']; ?></td>
                                <td style="border: 1px solid #dddddd; text-align: left; padding: 8px;"><?php echo $data['sub_qty']; ?></td>
                                <td style="border: 1px solid #dddddd; text-align: left; padding: 8px;">Rp. <?php echo $data['sub_harga_obat']; ?></td>
                            </tr>
                        <?php 
                        $nomor++; // Increment nomor setiap kali loop
                        } ?>
                    </tbody>
                </table>

                <div class="large-box" style="background-color: #f0f0f0; border-radius: 15px; padding: 20px; margin-top: 20px; display: flex; justify-content: space-between; flex-wrap: wrap;">
                    <div class="info-section" style="border: 1px solid #ccc; padding: 10px; margin-bottom: 15px; width: 48%;">
                        <h4>Informasi Obat</h4>
                        <p><strong>ID Nota Obat:</strong> <?php echo isset($db['id_resep_obat']) ? $db['id_resep_obat'] : ''; ?></p>
                        <p><strong>Tanggal Resep:</strong> <?php echo isset($db['tanggal_resep']) ? $db['tanggal_resep'] : ''; ?></p>
                        <p><strong>Total Bayar resep:</strong> Rp. <?php echo isset($db['total_bayar_resep']) ? $db['total_bayar_resep'] : ''; ?></p>
                    </div>

                    <div class="info-section" style="border: 1px solid #ccc; padding: 10px; margin-bottom: 15px; width: 48%;">
                        <h4>Informasi Pembayaran</h4>
                        <p><strong>Status Bayar Obat:</strong> <?php echo isset($db['jenis_status_bayar_obat']) ? $db['jenis_status_bayar_obat'] : ''; ?></p>
                        <p><strong>Jenis Bayar Obat:</strong> <?php echo isset($db['nama_jenis_bayar_obat']) ? $db['nama_jenis_bayar_obat'] : ''; ?></p>
                        <?php if (isset($db['bukti_bayar_obat'])): ?>
                            <p><strong>Bukti Bayar Obat:</strong>
                                <span id="showImage" style="color: blue; cursor: pointer; text-decoration: underline;">Lihat Bukti Bayar</span>
                                <div id="imageContainer" style="display: none;">
                                    <img src="../pembayaran/<?php echo $db['bukti_bayar_obat']; ?>" width="100">
                                </div>
                            </p>
                            <script>
                                document.getElementById('showImage').addEventListener('click', function () {
                                    document.getElementById('imageContainer').style.display = 'block';
                                });
                            </script>
                        <?php endif; ?>
                        </p>
                    </div>
                </div>

                <div class="button-section" style="margin-top: 20px; text-align: center;">
                    <a href="index.php?halaman=riwayat_beli_obat" class="btn btn-purple"> Kembali </a>
                </div>
            </div>

            <hr>

            <?php
            $No++;
        }
        ?>
    </div>
</div>