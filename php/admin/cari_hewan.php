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

$query=mysqli_query($koneksi, "SELECT * FROM hewan WHERE id_hewan LIKE '%$keyword%'")
?>

<div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-dark">Data Hewan</h6>
                        </div>
                                    <form class="form-inline" role="search" method="post" action="index.php?halaman=cari_hewan">
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
                                          <th>ID Hewan</th>
                                          <th>Nama Hewan</th>
                                          <th>Umur Hewan</th>
                                          <th>Ras Hewan</th>
                                          <th>Jenis Hewan</th>
                                          <th>Jenis Kelamin Hewan</th>
                                          <th>Berat Badan hewan</th> 
                                          <th>Nama Pengguna</th> 
                                          <th>Option</th>
                                        </tr>
                                <tbody>
                                <?php $No=1; ?>
                                    <?php $ambildata=$koneksi->query("SELECT * FROM hewan JOIN pengguna ON hewan.id_pengguna=pengguna.id_pengguna WHERE  
                                id_hewan LIKE '%$keyword%' OR
                                nama_hewan LIKE '%$keyword%' OR
                                umur_hewan LIKE '%$keyword%' OR
                                jenis_hewan LIKE '%$keyword%' OR
                                ras_hewan LIKE '%$keyword%' OR
                                nama_pengguna LIKE '%$keyword%'");?>
                                    <?php while($pecah = $ambildata->fetch_assoc()){?>
                                               <tr>
                                               <td><?php echo $No?></td>
                                               <td><?php echo $pecah['id_hewan'];?></td>
                                               <td><?php echo $pecah['nama_hewan'];?></td>
                                               <td><?php echo $pecah['umur_hewan'];?></td>
                                               <td><?php echo $pecah['jenis_hewan'];?></td>
                                               <td><?php echo $pecah['ras_hewan'];?></td>
                                                <td><?php echo $pecah['nama_pengguna'];?></td>
                                                
                                                    <td><a href ="hapus_hewan.php?id_hewan=<?php echo $pecah['id_hewan']?>" onclick ="return confirm ('Apakah anda yakin ingin menghapus data?')"name="hapus" class="btn btn-purple">Delete</a>   
                                        <?php $No++;
                                        }
                                        ?> 
                                        </tbody>
                                    </thead>
                                </table>
                            </div>