    <?php
    $keyword="";
    $status_bayar_konsul="";
    $status_konsul="";
    $tanggal_mulai = "";
    $tanggal_selesai = "";
    $status_konsul = "";
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
        $strc[]="nota_konsul.tanggal_konsul BETWEEN '$tanggal_mulai' AND '$tanggal_selesai' ";
        $jmlh++;
    }
    
    if (isset($_POST['keyword']))
    {
        $keyword=$_POST['keyword'];
        $strc[]="nota_konsul.id_status_konsul LIKE '%$keyword%'";
        $jmlh++;
    }

    if (isset($_POST['status_bayar']))
    {
        $status_bayar_konsul=$_POST['status_bayar'];
        $strc[]="nota_konsul.id_status_bayar_konsul = '$status_bayar_konsul'";
        $jmlh++;
    }

    if (isset($_POST['status_konsul']))
    {
        $status_konsul=$_POST['status_konsul'];
        $strc[]="nota_konsul.id_status_konsul = '$status_konsul'";
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
    
    $query = "SELECT * FROM nota_konsul
    JOIN hewan ON nota_konsul.id_hewan = hewan.id_hewan
    JOIN dokter ON nota_konsul.id_dokter = dokter.id_dokter
    JOIN jenis_bayar_konsul ON nota_konsul.id_jenis_bayar_konsul = jenis_bayar_konsul.id_jenis_bayar_konsul
    JOIN status_bayar_konsul ON nota_konsul.id_status_bayar_konsul = status_bayar_konsul.id_status_bayar_konsul
    JOIN status_konsul ON nota_konsul.id_status_konsul = status_konsul.id_status_konsul
    JOIN pengguna ON hewan.id_pengguna = pengguna.id_pengguna $strw";
    $ambil = mysqli_query($koneksi, $query);
    $resnum = mysqli_num_rows($ambil);
    
    $pecah2 = $koneksi->query("SELECT * FROM status_bayar_konsul");
    $pecah1 = $koneksi->query("SELECT * FROM status_konsul");
    
    
    $koneksi= new mysqli("localhost","root","","petpal");

    ?>
    <main>
        <section class="riwayat">
            <div class="container">
                <div class="row">
                    <div class="col-md-10">
                        <div style="color: black">
                            <center><h2>Daftar Konsultasi</h2></center>
                        </div>
                    </div>
                </div>
                <form action="index.php?halaman=nota_konsul" method="post" class="form">
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
                <label>Status Bayar Konsul:</label>
                <select class="form-control" name="status_bayar" value = "<?php echo $row['id_status_bayar_konsul'] ?>">
                    <option selected disabled>-- PILIH STATUS BAYAR KONSUL -- </option>
                    <?php while ($row = mysqli_fetch_assoc($pecah2)) { ?>
                        <option value="<?php echo $row['id_status_bayar_konsul']; ?>"> <?php echo $row['jenis_status_bayar_konsul']; ?></option>
                    <?php } ?>
                </select>
            </div>
        </div>

        <div class="col-md-2">
            <div class="form-group">
                <label>Status Konsul:</label>
                <select class="form-control" name="status_konsul" value = "<?php echo $row['id_status_konsul'] ?>">
                    <option selected disabled>-- PILIH STATUS KONSUL -- </option>
                    <?php while ($row = mysqli_fetch_assoc($pecah1)) { ?>
                        <option value="<?php echo $row['id_status_konsul']; ?>"> <?php echo $row['ket_status_konsul']; ?></option>
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
                            <th><center>Nomor Nota Konsul</th>
                            <th><center>Tanggal</th>
                            <th><center>Nama Pengguna</th>
                            <th><center>Jenis Hewan</th>
                            <th><center>Nama Hewan</th>
                            <th><center>Nama Dokter</th>
                            <th><center>Jenis Pembayaran</th>
                            <th><center> Status Pembayaran</th>
                            <th><center> Bukti Pembayaran</th>
                            <th><center> Status Konsultasi</th>
                                <th><center>Aksi</th>

                        </tr>
                    </thead>
                    <tbody>
                    <?php $nomor=1;?>
                    <?php
                    
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
                        <td>
                            <?php if (isset($pecah["bukti_bayar_konsul"])) : ?>
                                <img src="../pembayaran/<?php echo $pecah['bukti_bayar_konsul']; ?>" width="100">
                            <?php endif; ?>
                        </td>
                        <td><?php echo $pecah["ket_status_konsul"]; ?></td>
                        <td><a href="index.php?halaman=detail&id_nota_konsul=<?php echo $pecah["id_nota_konsul"] ?>" class="btn btn-purple">Detail</a>
                        <a href="edit_nota_konsul.php?halaman=edit_nota_konsul&id_nota_konsul=<?php echo $pecah['id_nota_konsul'] ?>" class="btn btn-purple">Edit</a></td>

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