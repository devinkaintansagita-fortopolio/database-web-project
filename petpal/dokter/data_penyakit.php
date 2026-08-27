<?php
    $koneksi= new mysqli("localhost","root","","petpal");
?>
    <main>
        <section class="riwayat">
            <div class="container">
                <div class="row">
                    <div class="col-md-10">
                        <div style="color: black">
                            <center><h2>Daftar Diagnosa</h2></center>
                        </div>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table" style="max-width: 80%;">
                    <thead>
                        <tr>
                            <th><center>No</th>
                            <th><center>ID Nota Konsul</th>
                            <th><center>Nama Penyakit</th>
                            <th><center>Penanganan</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php $nomor=1;?>
                    <?php
                        $id_dokter = $_SESSION["dokter"]["id_dokter"];
                        $ambil = $koneksi->query("SELECT *
                        FROM nota_penyakit
                        JOIN nota_konsul ON nota_konsul.id_nota_konsul = nota_penyakit.id_nota_konsul
                        JOIN penyakit ON penyakit.id_penyakit = nota_penyakit.id_penyakit
                        WHERE nota_konsul.id_dokter = '$id_dokter'");
                    
                    while ($pecah = $ambil->fetch_assoc()) {
                    
                    ?>
                    <tr>
                        <td><?php echo $nomor; ?></td>
                        <td><?php echo $pecah["id_nota_konsul"]; ?></td>
                        <td><?php echo $pecah["nama_penyakit"]; ?></td>
                        <td><?php echo $pecah["penanganan"]; ?></td>
                        <td>
                    </tr>

                    <?php $nomor++; ?>
                    <?php } ?>
                </tbody>
                    </table>
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