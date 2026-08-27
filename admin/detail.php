<div class="card" style="border-radius: 15px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);">
    <div class="card-header py-1" style="background-color: #ffc0cb; border-top-left-radius: 15px; border-top-right-radius: 15px;">
        <center><h2 class="m-0 font-weight-bold text-dark">Nota Konsultasi</h2></center>
    </div>
    <div class="card-body" style="background-color: #f9f9f9; border-bottom-left-radius: 15px; border-bottom-right-radius: 15px; padding: 20px;">
        <?php
        $id_nota_konsul = mysqli_real_escape_string($koneksi, $_GET['id_nota_konsul']);

        $query = "SELECT * FROM nota_konsul 
            JOIN status_bayar_konsul ON nota_konsul.id_status_bayar_konsul=status_bayar_konsul.id_status_bayar_konsul 
            JOIN jenis_bayar_konsul ON nota_konsul.id_jenis_bayar_konsul=jenis_bayar_konsul.id_jenis_bayar_konsul 
            JOIN hewan ON nota_konsul.id_hewan=hewan.id_hewan 
            JOIN dokter ON nota_konsul.id_dokter=dokter.id_dokter 
            JOIN status_konsul ON nota_konsul.id_status_konsul=status_konsul.id_status_konsul 
            JOIN pengguna ON hewan.id_pengguna = pengguna.id_pengguna
            JOIN spesialis ON dokter.id_spesialis = spesialis.id_spesialis
            LEFT JOIN nota_penyakit ON nota_konsul.id_nota_konsul = nota_penyakit.id_nota_konsul
            LEFT JOIN penyakit ON nota_penyakit.id_penyakit = penyakit.id_penyakit
            WHERE nota_konsul.id_nota_konsul = ?";

        $stmt = mysqli_prepare($koneksi, $query);
        mysqli_stmt_bind_param($stmt, 's', $id_nota_konsul);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        while ($db = mysqli_fetch_assoc($result)) { 
            ?>
            <div class="nota-container" style="background-color: #fff; border-radius: 15px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); padding: 20px; margin-bottom: 20px;">
                <div class="table-container" style="margin: 20px 0;">
                    <table style="width: 100%; border-collapse: collapse;">
                        <thead>
                            <tr>
                                <th style="border: 1px solid #ddd; padding: 10px; width: 18%;">Nama Pengguna</th>
                                <th style="border: 1px solid #ddd; padding: 10px; width: 18%;">Nama Hewan</th>
                                <th style="border: 1px solid #ddd; padding: 10px; width: 18%;">Nama Dokter</th>
                                <th style="border: 1px solid #ddd; padding: 10px; width: 17%;">Spesialis</th>
                                <th style="border: 1px solid #ddd; padding: 10px; width: 17%;">Tarif dokter</th>
                                <th style="border: 1px solid #ddd; padding: 10px; width: 17%;">Tanggal konsultasi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td style="border: 1px solid #ddd; padding: 10px;"><?php echo $db['nama_pengguna']; ?></td>
                                <td style="border: 1px solid #ddd; padding: 10px;"><?php echo $db['nama_hewan']; ?></td>
                                <td style="border: 1px solid #ddd; padding: 10px;"><?php echo $db['nama_dokter']; ?></td>
                                <td style="border: 1px solid #ddd; padding: 10px;"><?php echo $db['nama_spesialis']; ?></td>
                                <td style="border: 1px solid #ddd; padding: 10px;">Rp. <?php echo number_format($db['tarif_dokter']); ?></td>
                                <td style="border: 1px solid #ddd; padding: 10px;"><?php echo $db['tanggal_konsul']; ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div class="large-box" style="background-color: #f0f0f0; border-radius: 15px; padding: 20px; margin-top: 20px; display: flex; justify-content: space-between; flex-wrap: wrap;">
                    <div class="info-section" style="border: 1px solid #ccc; padding: 10px; margin-bottom: 15px; width: 48%;">
                        <h4>Informasi Konsultasi</h4>
                        <?php $id_nota_konsul = $_GET['id_nota_konsul']; ?>
                        <p><strong>ID Nota Konsultasi:</strong> <?php echo $id_nota_konsul; ?></p>
                        <p><strong>Tanggal Konsultasi:</strong> <?php echo isset($db['tanggal_konsul']) ? $db['tanggal_konsul'] : ''; ?></p>
                        <p><strong>Keluhan/Gejala:</strong> <?php echo isset($db['keluhan']) ? $db['keluhan'] : ''; ?></p>
                        <p><strong>Status Konsultasi:</strong> <?php echo isset($db['ket_status_konsul']) ? $db['ket_status_konsul'] : ''; ?></p>
                        <?php if (isset($db['foto_konsul'])): ?>
                            <p><strong>Foto Konsultasi:</strong>
                                <span id="showImage" style="color: blue; cursor: pointer; text-decoration: underline;">Lihat Foto Konsultasi</span>
                                <div id="imageContainer" style="display: none;">
                                    <img src="../foto_konsul/<?php echo $db['foto_konsul']; ?>" width="100">
                                </div>
                            </p>
                            <script>
                                document.getElementById('showImage').addEventListener('click', function () {
                                    document.getElementById('imageContainer').style.display = 'block';
                                });
                            </script>
                        <?php endif; ?>
                    </div>

                    <div class="info-section" style="border: 1px solid #ccc; padding: 10px; margin-bottom: 15px; width: 48%;">
                        <h4>Informasi Pembayaran</h4>
                        <p><strong>Status Bayar Konsultasi:</strong> <?php echo isset($db['jenis_status_bayar_konsul']) ? $db['jenis_status_bayar_konsul'] : ''; ?></p>
                        <p><strong>Jenis Bayar Konsultasi:</strong> <?php echo isset($db['ket_jenis_bayar_konsul']) ? $db['ket_jenis_bayar_konsul'] : ''; ?></p>
                        <?php if (isset($db['bukti_bayar_konsul'])): ?>
                            <p><strong>Bukti Bayar Konsultasi:</strong>
                                <span id="showImage" style="color: blue; cursor: pointer; text-decoration: underline;">Lihat Bukti Bayar</span>
                                <div id="imageContainer" style="display: none;">
                                    <img src="../pembayaran/<?php echo $db['bukti_bayar_konsul']; ?>" width="100">
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

                    <div class="info-section" style="border: 1px solid #ccc; padding: 10px; margin-bottom: 15px; width: 48%;">
                        <h4>Informasi Hewan</h4>
                        <p><strong>Nama Hewan:</strong> <?php echo isset($db['id_hewan']) ? $db['nama_hewan'] : ''; ?></p>
                        <p><strong>Jenis Hewan:</strong> <?php echo isset($db['jenis_hewan']) ? $db['jenis_hewan'] : ''; ?></p>
                        <p><strong>Umur Hewan:</strong> <?php echo isset($db['umur_hewan']) ? $db['umur_hewan'] : ''; ?></p>
                        <p><strong>Ras Hewan:</strong> <?php echo isset($db['ras_hewan']) ? $db['ras_hewan'] : ''; ?></p>
                    </div>

                    <div class="info-section" style="border: 1px solid #ccc; padding: 10px; margin-bottom: 15px; width: 48%;">
                        <h4>Informasi Balasan</h4>

                        <?php
                        $id_nota_konsul = mysqli_real_escape_string($koneksi, $db['id_nota_konsul']);

                        $query_diseases = "SELECT penyakit.nama_penyakit, penyakit.ket_penyakit, nota_penyakit.penanganan 
                                        FROM nota_penyakit
                                        JOIN penyakit ON nota_penyakit.id_penyakit = penyakit.id_penyakit
                                        WHERE nota_penyakit.id_nota_konsul = '$id_nota_konsul'";

                        $result_diseases = mysqli_query($koneksi, $query_diseases);

                        if (mysqli_num_rows($result_diseases) > 0) {
                            while ($disease = mysqli_fetch_assoc($result_diseases)) {
                                ?>
                                <div>
                                    <strong>Penyakit:</strong>
                                    <p><?php echo $disease['nama_penyakit']; ?></p>
                                    <p><strong>Keterangan Penyakit:</strong> <?php echo $disease['ket_penyakit']; ?></p>
                                </div>
                                <?php
                            }
                        } else {
                            echo "<p>Belum ada balasan</p>";
                        }
                        ?>
                        <p><strong>Penanganan:</strong> <?php echo isset($db['penanganan']) ? $db['penanganan'] : ''; ?></p>
                    </div>
                </div>

                <div class="button-section" style="margin-top: 20px; text-align: center;">
                    <a href="index.php?halaman=nota_konsul" class="btn btn-purple"> Kembali </a>
                </div>
            </div>

            <hr>

            <?php
        }
        ?>
    </div>
</div>