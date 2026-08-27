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

$query=mysqli_query($koneksi, "SELECT * FROM pengguna WHERE id_pengguna LIKE '%$keyword%'")
?>

<div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-dark">Data Pengguna</h6>
                        </div>
                                    <form class="form-inline" role="search" method="post" action="index.php?halaman=cari_pengguna">
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
                                          <th>ID Pengguna</th>
                                          <th>Username Pengguna</th>
                                          <th>Password Pengguna</th>
                                          <th>Nama Pengguna</th>
                                          <th>Alamat Pengguna</th>
                                          <th>No Telepon Pengguna</th>
                                          <th>Email Pengguna</th>
                                          <th>Nama Hewan</th> 
                                          <th>Nama Kelurahan</th>
                                          <th>Option</th>
                                        </tr>
                                <tbody>
                                <?php $No=1; ?>
                                    <?php $ambildata=$koneksi->query("SELECT * FROM pengguna  JOIN kelurahan ON pengguna.id_kelurahan=kelurahan.id_kelurahan WHERE  
                                id_pengguna LIKE '%$keyword%' OR
                                username_pengguna LIKE '%$keyword%' OR
                                password_pengguna LIKE '%$keyword%' OR
                                nama_pengguna LIKE '%$keyword%' OR
                                alamat_pengguna LIKE '%$keyword%' OR
                                no_telepon_pengguna LIKE '%$keyword%' OR
                                email_pengguna LIKE '%$keyword%' OR
                                nama_kelurahan LIKE '%$keyword%'");?>
                                    <?php while($pecah = $ambildata->fetch_assoc()){?>
                                               <tr>
                                               <td><?php echo $No?></td>
                                               <td><?php echo $pecah['id_pengguna'];?></td>
                                               <td><?php echo $pecah['username_pengguna'];?></td>
                                               <td><?php echo $pecah['password_pengguna'];?></td>
                                               <td><?php echo $pecah['nama_pengguna'];?></td>
                                               <td><?php echo $pecah['alamat_pengguna'];?></td>
                                               <td><?php echo $pecah['no_telepon_pengguna'];?></td>
                                               <td><?php echo $pecah['email_pengguna'];?></td>
                                                <td><?php echo $pecah['nama_kelurahan'];?></td>
                                                    
                                                    <td><a href ="hapus_pengguna.php?id_pengguna=<?php echo $pecah['id_pengguna']?>" onclick ="return confirm ('Apakah anda yakin ingin menghapus data?')"name="hapus" class="btn btn-purple">Hapus</a>   
                                        <?php $No++;
                                        }
                                        ?> 
                                        </tbody>
                                    </thead>
                                </table>
                            </div>