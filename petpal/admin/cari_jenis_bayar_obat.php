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

$query=mysqli_query($koneksi, "SELECT * FROM jenis_bayar_obat WHERE id_jenis_bayar_obat LIKE '%$keyword%'")
?>

<div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-dark">Data Jenis Bayar Obat</h6>
                        </div>
                                    <form class="form-inline" role="search" method="post" action="index.php?halaman=cari_jenis_bayar_obat">
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
                                          <th>ID Jenis Bayar Obat</th>
                                          <th>Nama Jenis Bayar Obat</th>
                                          <th>Keterangan Metode Bayar Obat</th> 
                                          <th>Option</th>
                                        </tr>
                                <tbody>
                                <?php $No=1; ?>
                                    <?php $ambildata=$koneksi->query("SELECT * FROM jenis_bayar_obat JOIN metode_bayar_Obat ON jenis_bayar_obat.id_metode_bayar_Obat=metode_bayar_Obat.id_metode_bayar_Obat WHERE  
                                id_jenis_bayar_obat LIKE '%$keyword%' OR
                                nama_jenis_bayar_obat LIKE '%$keyword%' OR
                                ket_metode_bayar_Obat LIKE '%$keyword%'");?> 
                                    <?php while($pecah = $ambildata->fetch_assoc()){?>
                                               <tr>
                                               <td><?php echo $No?></td>
                                               <td><?php echo $pecah['id_jenis_bayar_obat'];?></td>
                                               <td><?php echo $pecah['nama_jenis_bayar_obat'];?></td>
                                               <td><?php echo $pecah['ket_metode_bayar_Obat'];?></td>
                                                
                                                    <td><a href ="hapus_jenis_bayar_obat.php?id_jenis_bayar_obat=<?php echo $pecah['id_jenis_bayar_obat']?>" onclick ="return confirm ('Apakah anda yakin ingin menghapus data?')"name="hapus" class="btn btn-purple">Hapus</a>
                                                    <a href ="edit_jenis_bayar_obat.php?halaman=edit_jenis_bayar_obat&id_jenis_bayar_obat=<?php echo $db['id_jenis_bayar_obat']?>" class="btn btn- btn-purple">Edit</a>   
                                        <?php $No++;
                                        }
                                        ?> 
                                        </tbody>
                                    </thead>
                                </table>
                                <a href="index.php?halaman=tambah_jenis_bayar_obat" class="btn btn-purple">Tambah Data</a>
                            </div>