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

$query=mysqli_query($koneksi, "SELECT * FROM status_bayar_obat WHERE id_status_bayar_obat LIKE '%$keyword%'")
?>

<div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-dark">Status Bayar obat</h6>
                        </div>
                                    <form class="form-inline" role="search" method="post" action="indexadmin.php?halaman=cari_status_bayar_obat">
                                    <div class="col-10">
                                    <table border="0">
                                    <tr>
                                        <td><div class="form-group">
                                            <input type="text" class="form-control" name="keyword" placeholder="Masukkan Pencarian" autofocus autocomplete="off"></input>
                                        <td><button class="btn btn-blue" name="cari"> Cari ... </button>
                                        </div>
                                    </tr>
                                    </table>
                                    </div>
                                </form>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered text-light" id="dataTable" width="100%" cellspacing="50"style="background-color: primary;">
                                    <thead>
                                        <tr>
                                             <th>No</th>
                                          <th>Status Bayar obat</th>
                                          <th>Jenis Status Bayar obat</th>
                                          <th>Option</th>
                                        </tr>
                                <tbody>
                                <?php $No=1; ?>
                                    <?php $ambildata=$koneksi->query("SELECT * FROM status_bayar_obat WHERE 
                                id_status_bayar_obat LIKE '%$keyword%' OR
                                jenis_status_bayar_obat LIKE '%$keyword%'");?>
                                    <?php while($pecah = $ambildata->fetch_assoc()){?>
                                               <tr>
                                               <td><?php echo $No?></td>
                                               <td><?php echo $pecah['id_status_bayar_obat'];?></td>
                                               <td><?php echo $pecah['jenis_status_bayar_obat'];?></td>
                                                    
                                                    <td><a href ="hapus_status_bayar_obat.php?id_status_bayar_obat=<?php echo $pecah['id_status_bayar_obat']?>" onclick ="return confirm ('Apakah anda yakin ingin menghapus data?')"name="hapus" class="btn btn-blue">Delete</a>   
                                                    <a href ="edit_status_bayar_obat.php?halaman=edit_status_bayar_obat&id_status_bayar_obat=<?php echo $pecah['id_status_bayar_obat']?>" class="btn btn- btn-blue">Edit</a>
                                        <?php $No++;
                                        }
                                        ?> 
                                        </tbody>
                                    </thead>
                                </table>
                                <a href="tambah_status_bayar_obat.php?halaman=tambah_status_bayar_obat" class = "btn btn-blue"> Tambah Data </a>
                            </div>