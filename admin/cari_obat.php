<?php
include ('koneksi.php');

if(isset($_POST['cari']))
{
	$_SESSION['session_pencarian']=$_POST["keyword"];
	$keyword=$_SESSION['session_pencarian'];
}
else
{
	$keyword=$_SESSION['session_pencarian'];
}

$query=mysqli_query($koneksi, "SELECT * FROM obat WHERE id_obat LIKE '%$keyword%'")
?>

<div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-dark">Data Obat</h6>
                        </div>
                                    <form class="form-inline" role="search" method="post" action="index.php?halaman=cari_obat">
                                    <div class="col-10">
                                    <table border="0">
                                    <tr>
                                        <td><div class="form-group">
                                            <input type="text" class="form-control" name="keyword" placeholder="Masukkan Pencarian" autofocus autocomplete="off"></input>
                                        <td><button class="btn btn-purple" name="cari"> Cari ... </button>
                                        </div>
                                    </tr>
                                    </table>
                                    </div>
                                </form>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered text-light" id="dataTable" width="100%" cellspacing="50"style="background-color: Pink;">
                                    <thead>
                                        <tr>
                                             <th>No</th>
                                          <th>ID Obat</th>
                                          <th>Nama Obat</th>
                                          <th>Jenis Obat</th>
                                          <th>Harga Obat</th>
                                          <th>Aturan Pakai</th>
                                          <th>Efek Samping</th>
                                          <th>Dosis Obat</th>
                                          <th>Foto Obat</th>
                                          <th>Option</th>
                                        </tr>
                                <tbody>
                                <?php $No=1; ?>
                                    <?php $ambildata=$koneksi->query("SELECT * FROM obat  JOIN spesialis ON obat.id_spesialis=spesialis.id_spesialis WHERE  
                                id_obat LIKE '%$keyword%' OR
                                nama_obat LIKE '%$keyword%' OR
                                jenis_obat LIKE '%$keyword%' OR
                                harga_obat LIKE '%$keyword%' OR
                                aturan_pakai LIKE '%$keyword%' OR
                                efek_samping LIKE '%$keyword%'
                                dosis LIKE '%$keyword%' OR
                                foto_obat LIKE '%$keyword%'");?>
                                    <?php while($pecah = $ambildata->fetch_assoc()){?>
                                               tr>
                                               <tr>
                                                   <td><?php echo $No?></td>
                                                   <td><?php echo $db['id_obat'];?></td>
                                                   <td><?php echo $db['nama_obat'];?></td>
                                                   <td><?php echo $db['jenis_obat'];?></td>
                                                   <td>Rp.<?php echo number_format($db['harga_obat']);?></td>
                                                    <td><?php echo $db['aturan_pakai'];?></td>
                                                    <td><?php echo $db['efek_samping'];?></td>
                                                    <td><?php echo $db['dosis'];?></td>
                                                    <td> <img src="../foto_obat/<?php echo $db['foto_obat'];?>" width="100"></td>

                                                    <td><a href ="hapus_obat.php?id_obat=<?php echo $pecah['id_obat']?>" onclick ="return confirm ('Apakah anda yakin ingin menghapus data?')"name="hapus" class="btn btn-purple">Hapus</a>
                                                    <a href ="edit_obat.php?halaman=edit_obat&id_obat=<?php echo $db['id_obat']?>" class="btn btn- btn-purple">Edit</a>    
                                        <?php $No++;
                                        }
                                        ?> 
                                        </tbody>
                                    </thead>
                                </table>
                                <a href="index.php?halaman=tambah_obat" class = "btn btn-purple"> Tambah Data </a>
                            </div>