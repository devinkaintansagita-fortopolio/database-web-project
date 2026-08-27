<?php
    $koneksi= new mysqli("localhost","root","","petpal");
?>
    <main>
        <section class="riwayat">
            <div class="container">
                <div class="row">
                    <div class="col-md-8">
                        <div style="color: black">
                            <center><h2>Daftar Konsultasi</h2></center>
                        </div>
                    </div>
                </div>
                <div class="pink-container">
                    <div class="table-responsive">
                        <table class="table" style="max-width: 80%;">
                        <thead>
                            <tr>
                                <th><center>No</th>
                                <th><center>Nomor Nota Konsul</th>
                                <th><center>Tanggal</th>
                                <th><center>Nama Pengguna</th>
                                <th><center>Jenis Hewan</th>
                                <th><center>Nama Hewan</th>
                                <th><center>Nama Dokter</th>
                                <th><center>Jenis Pembayaran</th>
                                <th><center> Status Pembayaran</th>
                                <th><center> Status Konsultasi</th>
                                    <th><center>Detail</th>
                                    <th><center>Diagnosa</th>

                            </tr>
                        </thead>
                        <tbody>
                        <?php $nomor=1;?>
                        <?php
                            $id_dokter = $_SESSION["dokter"]["id_dokter"];
                            $ambil = $koneksi->query("SELECT * FROM nota_konsul
                            JOIN hewan ON nota_konsul.id_hewan = hewan.id_hewan
                            JOIN dokter ON nota_konsul.id_dokter = dokter.id_dokter
                            JOIN jenis_bayar_konsul ON nota_konsul.id_jenis_bayar_konsul = jenis_bayar_konsul.id_jenis_bayar_konsul
                            JOIN status_bayar_konsul ON nota_konsul.id_status_bayar_konsul = status_bayar_konsul.id_status_bayar_konsul
                            JOIN status_konsul ON nota_konsul.id_status_konsul = status_konsul.id_status_konsul
                            JOIN pengguna ON hewan.id_pengguna = pengguna.id_pengguna
                            WHERE nota_konsul.id_dokter = '$id_dokter'");
                        
                        while ($pecah = $ambil->fetch_assoc()) {
                        
                        ?>
                        <tr>
                            <td><?php echo $nomor; ?></td>
                            <td><?php echo $pecah["id_nota_konsul"]; ?></td>
                            <td><?php echo date("d F Y", strtotime($pecah["tanggal_konsul"])); ?></td>
                            <td><?php echo $pecah["nama_pengguna"]; ?></td>
                            <td><?php echo $pecah["jenis_hewan"]; ?></td>
                            <td><?php echo $pecah["nama_hewan"]; ?></td>
                            <td><?php echo $pecah["nama_dokter"]; ?></td>
                            <td><?php echo $pecah["ket_jenis_bayar_konsul"]; ?></td>
                            <td><?php echo $pecah["jenis_status_bayar_konsul"]; ?></td>
                            <td><?php echo $pecah["ket_status_konsul"]; ?></td>
                            <td><a href="index.php?halaman=detail&id_nota_konsul=<?php echo $pecah["id_nota_konsul"] ?>" class="btn btn-purple">Rincian Konsultasi</a></td>
                            <td>
                            <?php
                            if ($pecah["jenis_status_bayar_konsul"] == 'Sudah Bayar') {
                                if ($pecah["id_status_konsul"] == 'SK01' OR $pecah["id_status_konsul"] == "SK03") {
                                    echo '<a href="index.php?halaman=nota_penyakit&id_nota_konsul=' . $pecah["id_nota_konsul"] . '" class="btn btn-purple">Diagnosa</a>';
                                } else {
                                    echo '<button class="btn btn-disabled" disabled>Diagnosa</button>';
                                }
                            } else {
                                echo '<button class="btn btn-disabled" disabled>Diagnosa</button>';
                            }
                            ?>
                            </td>  
                        </tr>

                        <?php $nomor++; ?>
                        <?php } ?>
                        </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </section>
    </main>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js" type="text/javascript"></script>
        <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.11.2.min.js"><\/script>')</script>

            <script src="js/vendor/bootstrap.min.js"></script>

            <script src="js/datepicker.js"></script>
            <script src="js/plugins.js"></script>
            <script src="js/main.js"></script>
        </body>
        </html>

        