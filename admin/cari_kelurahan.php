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

$query=mysqli_query($koneksi, "SELECT * FROM kelurahan WHERE id_kelurahan LIKE '%$keyword%'")
?>

<div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-dark">Data kelurahan</h6>
                        </div>
                                    <form class="form-inline" role="search" method="post" action="index.php?halaman=cari_kelurahan">
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
                                          <th>ID Kelurahan</th>
                                          <th>Nama Kelurahan</th>
                                          <th>Nama Kecamatan</th> 
                                          <th>Option</th>
                                        </tr>
                                <tbody>
                                <?php $No=1; ?>
                                    <?php $ambildata=$koneksi->query("SELECT * FROM kelurahan  JOIN kecamatan ON kelurahan.id_kecamatan=kecamatan.id_kecamatan WHERE  
                                id_kelurahan LIKE '%$keyword%' OR
                                nama_kelurahan LIKE '%$keyword%' OR
                                nama_kecamatan LIKE '%$keyword%'");?> 
                                    <?php while($pecah = $ambildata->fetch_assoc()){?>
                                               <tr>
                                               <td><?php echo $No?></td>
                                               <td><?php echo $pecah['id_kelurahan'];?></td>
                                               <td><?php echo $pecah['nama_kelurahan'];?></td>
                                               <td><?php echo $pecah['nama_kecamatan'];?></td>
                                                
                                                    <td><a href ="hapus_kelurahan.php?id_kelurahan=<?php echo $pecah['id_kelurahan']?>" onclick ="return confirm ('Apakah anda yakin ingin menghapus data?')"name="hapus" class="btn btn-purple">Hapus</a>   
                                                    <a href ="edit_kelurahan.php?halaman=edit_kelurahan&id_kelurahan=<?php echo $db['id_kelurahan']?>" class="btn btn- btn-purple">Edit</a>   
                                        <?php $No++;
                                        }
                                        ?> 
                                        </tbody>
                                    </thead>
                                </table>
                                <a href="index.php?halaman=tambah_kelurahan" class="btn btn-purple">Tambah Data</a>
                            </div>