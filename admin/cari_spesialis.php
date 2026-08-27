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

$query=mysqli_query($koneksi, "SELECT * FROM spesialis WHERE id_spesialis LIKE '%$keyword%'")
?>

<div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-dark">Data Spesialis</h6>
                        </div>
                                    <form class="form-inline" role="search" method="post" action="index.php?halaman=cari_spesialis">
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
                                          <th>ID Spesialis</th>
                                          <th>Nama Spesialis</th>
                                          <th>Nama Jenis Spesialis</th>
                                          <th>Option</th>
                                        </tr>
                                <tbody>
                                <?php $No=1; ?>
                                    <?php $ambildata=$koneksi->query("SELECT * FROM spesialis JOIN jenis_spesialis ON spesialis.id_jenis_spesialis=jenis_spesialis.id_jenis_spesialis WHERE 
                                id_spesialis LIKE '%$keyword%' OR
                                nama_spesialis LIKE '%$keyword%' OR
                                nama_jenis_spesialis LIKE '%$keyword%'");?>
                                    <?php while($pecah = $ambildata->fetch_assoc()){?>
                                               <tr>
                                               <td><?php echo $No?></td>
                                               <td><?php echo $pecah['id_spesialis'];?></td>
                                               <td><?php echo $pecah['nama_spesialis'];?></td>
                                               <td><?php echo $pecah['nama_jenis_spesialis'];?></td>
                                                    
                                                    <td><a href ="hapus_spesialis.php?id_spesialis=<?php echo $pecah['id_spesialis']?>" onclick ="return confirm ('Apakah anda yakin ingin menghapus data?')"name="hapus" class="btn btn-purple">Delete</a>   
                                                    <a href ="edit_spesialis.php?halaman=edit_spesialis&id_spesialis=<?php echo $pecah['id_spesialis']?>" class="btn btn- btn-purple">Edit</a>
                                        <?php $No++;
                                        }
                                        ?> 
                                        </tbody>
                                    </thead>
                                </table>
                                <a href="tambah_spesialis.php?halaman=tambah_spesialis" class = "btn btn-purple"> Tambah Data </a>
                            </div>