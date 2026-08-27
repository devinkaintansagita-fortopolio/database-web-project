<?php
    $keyword="";
    $status_bayar_obat="";
    $tanggal_mulai = "";
    $tanggal_selesai = "";
    $strq = "";
    $strw = "";
    $jmlh = 0;
    
    if (isset($_POST['tanggal_mulai']))
    {
        if (isset($_POST['tanggal_selesai']))
        {
            $tanggal_selesai=$_POST['tanggal_selesai'];
        }
        else
        {
            $tanggal_selesai=date("Y-m-d");
        }
        $tgl_mulai=$_POST['tanggal_mulai'];
        $strc[]="resep_obat.tanggal_resep BETWEEN '$tanggal_mulai' AND '$tanggal_selesai' ";
        $jmlh++;
    }

    if (isset($_POST['status_bayar']))
    {
        $status_bayar_obat=$_POST['status_bayar'];
        $strc[]="resep_obat.id_status_bayar_obat = '$status_bayar_obat'";
        $jmlh++;
    }

    $i = 1;
    if ($jmlh > 0) {
        $strw = "WHERE ";
        foreach ($strc as $strs) {
            $strw .= $strs;
            if ($i < $jmlh) {
                $strw .= " AND ";
                $i++; 
            }
        }
    }
    
    $query = "SELECT * FROM resep_obat
    JOIN pengguna ON resep_obat.id_pengguna = pengguna.id_pengguna
    JOIN apotek ON resep_obat.id_apotek = apotek.id_apotek
    JOIN jenis_bayar_obat ON resep_obat.id_jenis_bayar_obat = jenis_bayar_obat.id_jenis_bayar_obat
    JOIN status_bayar_obat ON resep_obat.id_status_bayar_obat = status_bayar_obat.id_status_bayar_obat $strw";
    $ambil = mysqli_query($koneksi, $query);
    $resnum = mysqli_num_rows($ambil);
    
    $pecah2 = $koneksi->query("SELECT * FROM status_bayar_obat");
    
    $koneksi= new mysqli("localhost","root","","petpal");

    ?>
    <main>
        <section class="riwayat">
            <div class="container">
                <div class="row">
                    <div class="col-md-10">
                        <div style="color: black">
                            <center><h2>Daftar Pembelian obat</h2></center>
                        </div>
                    </div>
                </div>
                <form action="index.php?halaman=pembelian_obat" method="post" class="form">
    <br>
    <div class="col-md-2">
        <div class="form-group">
            <label>Tanggal Mulai :</label>
            <input type="date" class="form-control" name="tanggal_mulai" value="<?php echo $tanggal_mulai?>" required>
        </div>
    </div>
    <div class="col-md-2">
        <div class="form-group">
            <label>Tanggal Selesai :</label>
            <input type="date" class="form-control" name="tanggal_selesai" value="<?php echo $tanggal_selesai?>" required>
        </div>
    </div>

    <div class="col-md-2">
            <div class="form-group">
                <label>Status Bayar obat:</label>
                <select class="form-control" name="status_bayar" value = "<?php echo $row['id_status_bayar_obat'] ?>">
                    <option selected disabled>-- PILIH STATUS BAYAR obat -- </option>
                    <?php while ($row = mysqli_fetch_assoc($pecah2)) { ?>
                        <option value="<?php echo $row['id_status_bayar_obat']; ?>"> <?php echo $row['jenis_status_bayar_obat']; ?></option>
                    <?php } ?>
                </select>
            </div>
        </div>

        
        <div class="col-md-2">
            <br />
            <input type="submit" class="btn btn-purple mb-4" name="submit" value="Search">
        </div>
    </div>
</form>
                <div class="table-responsive">
                    <table class="table" style="max-width: 80%;">
                    <thead>
                        <tr>
                            <th><center>No</th>
                            <th><center>Nomor Pembelian obat</th>
                            <th><center>Tanggal Pembayaran</th>
                            <th><center>Total Bayar Resep</th>
                            <th><center>Nama Pengguna</th>
                            <th><center>Nama Apotek</th>
                            <th><center>Jenis Pembayaran</th>
                            <th><center> Status Pembayaran</th>

                        </tr>
                    </thead>
                    <tbody>
                    <?php $nomor=1;?>
                    <?php
                    
                    while ($pecah = $ambil->fetch_assoc()) {
                    
                    ?>
                    <tr>
                        <td><?php echo $nomor; ?></td>
                        <td><?php echo $pecah["id_resep_obat"]; ?></td>
                        <td><?php echo date("d F Y", strtotime($pecah["tanggal_resep"])); ?></td>
                        <td><?php echo $pecah["total_bayar_resep"]; ?></td>
                        <td><?php echo $pecah["nama_pengguna"]; ?></td>
                        <td><?php echo $pecah["nama_apotek"]; ?></td>
                        <td><?php echo $pecah["nama_jenis_bayar_obat"]; ?></td>
                        <td><?php echo $pecah["jenis_status_bayar_obat"]; ?></td>
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