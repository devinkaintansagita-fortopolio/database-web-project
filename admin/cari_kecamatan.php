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

$query=mysqli_query($koneksi, "SELECT * FROM kecamatan WHERE id_kecamatan LIKE '%$keyword%'")
?>

<div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-dark">Data Kecamatan</h6>
                        </div>
                                    <form class="form-inline" role="search" method="post" action="index.php?halaman=cari_kecamatan">
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
                                          <th>ID Kecamatan</th>
                                          <th>Nama Kecamatan</th>
                                          <th>Nama Kota</th> 
                                          <th>Option</th>
                                        </tr>
                                <tbody>
                                <?php $No=1; ?>
                                    <?php $ambildata=$koneksi->query("SELECT * FROM kecamatan  JOIN kota ON kecamatan.id_kota=kota.id_kota WHERE  
                                id_kecamatan LIKE '%$keyword%' OR
                                nama_kecamatan LIKE '%$keyword%' OR
                                nama_kota LIKE '%$keyword%'");?> 
                                    <?php while($pecah = $ambildata->fetch_assoc()){?>
                                               <tr>
                                               <td><?php echo $No?></td>
                                               <td><?php echo $pecah['id_kecamatan'];?></td>
                                               <td><?php echo $pecah['nama_kecamatan'];?></td>
                                               <td><?php echo $pecah['nama_kota'];?></td>
                                                
                                                    <td><a href ="hapus_kecamatan.php?id_kecamatan=<?php echo $pecah['id_kecamatan']?>" onclick ="return confirm ('Apakah anda yakin ingin menghapus data?')"name="hapus" class="btn btn-purple">Delete</a>   
                                        <?php $No++;
                                        }
                                        ?> 
                                        </tbody>
                                    </thead>
                                </table>
                            </div>