
<div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-dark">Resep Obat</h6>
</div>
<form class="form-inline" role="search" method="post" action="index.php?halaman=cari_resep_obat">
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
<div class="card-body">
    <div class="table-responsive">
        <table class="table table-bordered text-light" id="dataTable" width="100%" cellspacing="50" style="background-color: Pink;">
            <thead>
                <tr>
                    <th>No</th>
                    <th>ID Resep Obat</th>
                    <th>Tanggal Resep</th>
                    <th>Total Bayar Resep</th>
                    <th>Nama Pengguna</th>
                    <th>ID Nota Konsultasi</th>
                    <th>Status Bayar Obat</th>
                    <th>Option</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $id_pengguna = $_SESSION["pengguna"]['id_pengguna'];
                $ambildata = mysqli_query($koneksi, "SELECT * FROM resep_obat 
                JOIN nota_konsul ON resep_obat.id_nota_konsul=nota_konsul.id_nota_konsul
                JOIN pengguna ON resep_obat.id_pengguna = pengguna.id_pengguna
                JOIN status_bayar_obat ON resep_obat.id_status_bayar_obat = status_bayar_obat.id_status_bayar_obat
                WHERE resep_obat.id_pengguna = '$id_pengguna'");
                $No = 1;
                while ($db = mysqli_fetch_assoc($ambildata)) {
                ?>
                    <tr>
                        <td><?php echo $No ?></td>
                        <td><?php echo $db['id_resep_obat']; ?></td>
                        <td><?php echo $db['tanggal_resep']; ?></td>
                        <td>Rp. <?php echo $db['total_bayar_resep']; ?></td>
                        <td><?php echo $db['nama_pengguna']; ?></td>
                        <td><?php echo $db['id_nota_konsul']; ?></td>
                        <td><?php echo $db['jenis_status_bayar_obat']; ?></td>
                        <td><a href="index.php?halaman=detailresepobat&id_resep_obat=<?php echo $db["id_resep_obat"]?>" class="btn btn-purple">Resep Obat</a>
                        <?php
                            if ($db["jenis_status_bayar_obat"] != 'Sudah Bayar') {
                                if ($db["jenis_status_bayar_obat"] != 'Sedang Diverifikasi') {
                                    echo '<a href="index.php?halaman=bayar&id_resep_obat=' . $db["id_resep_obat"] . '" class="btn btn-purple">Bayar</a>';
                                } else {
                                    echo '<button class="btn btn-disabled" disabled>Bayar</button>';
                                }
                            } else {
                                echo '<button class="btn btn-disabled" disabled>Bayar</button>';
                            }
                            ?>
                            </td>  
                        </td>
                    </tr>
                <?php
                    $No++;
                }
                ?>
            </tbody>
        </table>
    </div>
</div>
