<div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-dark">Status Konsultasi</h6>
</div>
<form class="form-inline" role="search" method="post" action="index.php?halaman=cari_status_konsul">
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
                    <th>ID Status Konsultasi</th>
                    <th>Keterangan Status Konsultasi</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                    $ambildata = mysqli_query($koneksi, "SELECT * FROM status_konsul ORDER BY id_status_konsul DESC");
                    $No = 1;
                    while ($db = $ambildata->fetch_assoc()) {
                ?>
                    <tr>
                        <td><?php echo $No ?></td>
                        <td><?php echo $db['id_status_konsul']; ?></td>
                        <td><?php echo $db['ket_status_konsul']; ?></td>
                        <td>  
                            <a href="hapus_status_konsul.php?id_status_konsul=<?php echo $db['id_status_konsul'] ?>" onclick="return confirm('Apakah anda yakin ingin menghapus data?')" name="hapus" class="btn btn-purple">Hapus</a>   
                            <a href="edit_status_konsul.php?halaman=edit_status_konsul&id_status_konsul=<?php echo $db['id_status_konsul'] ?>" class="btn btn- btn-purple">Edit</a>
                        </td>
                    </tr>
                <?php 
                    $No++;
                    } 
                ?> 
            </tbody>
        </table>
        <a href="index.php?halaman=tambah_status_konsul" class="btn btn-purple">Tambah Data</a>
    </div>
</div>
