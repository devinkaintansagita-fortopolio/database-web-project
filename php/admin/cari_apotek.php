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

$query=mysqli_query($koneksi, "SELECT * FROM apotek WHERE id_apotek LIKE '%$keyword%'")
?>

<div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-dark">Data Apotek</h6>
                        </div>
                                    <form class="form-inline" role="search" method="post" action="index.php?halaman=cari_apotek">
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
                                          <th>ID Apotek</th>
                                          <th>Nama Apotek</th>
                                          <th>Alamat Apotek</th>
                                          <th>Nama Kota</th>
                                          <th>Option</th>
                                        </tr>
                                <tbody>
                                <?php $No=1; ?>
                                    <?php $ambildata=$koneksi->query("SELECT * FROM apotek  JOIN spesialis ON apotek.id_spesialis=spesialis.id_spesialis WHERE  
                                id_apotek LIKE '%$keyword%' OR
                                nama_apotek LIKE '%$keyword%' OR
                                alamat_apotek LIKE '%$keyword%' OR
                                nama_kota LIKE '%$keyword%'");?>
                                    <?php while($pecah = $ambildata->fetch_assoc()){?>
                                               <tr>
                                               <td><?php echo $No?></td>
                                               <td><?php echo $pecah['id_apotek'];?></td>
                                               <td><?php echo $pecah['nama_apotek'];?></td>
                                               <td><?php echo $pecah['alamat_apotek'];?></td>
                                                <td><?php echo $pecah['nama_kota'];?></td>
                                             
                                                    <td><a href ="hapus_apotek.php?id_apotek=<?php echo $pecah['id_apotek']?>" onclick ="return confirm ('Apakah anda yakin ingin menghapus data?')"name="hapus" class="btn btn-purple">Delete</a> 
                                                    <a href ="edit_apotek.php?halaman=edit_apotek&id_apotek=<?php echo $db['id_apotek']?>" class="btn btn- btn-purple">Edit</a>    
                                        <?php $No++;
                                        }
                                        ?> 
                                        </tbody>
                                    </thead>
                                </table>
                                <a href="index.php?halaman=tambah_apotek" class = "btn btn-purple"> Tambah Data </a>
                            </div>