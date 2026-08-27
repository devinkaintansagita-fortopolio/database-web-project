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

$query=mysqli_query($koneksi, "SELECT * FROM dokter WHERE id_dokter LIKE '%$keyword%'")
?>

<div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-dark">Data Dokter</h6>
                        </div>
                                    <form class="form-inline" role="search" method="post" action="index.php?halaman=cari_dokter">
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
                                          <th>ID dokter</th>
                                          <th>Nama dokter</th>
                                          <th>Asal Instansi Dokter</th>
                                          <th>Nama Spesialis</th>
                                          <th>Tarif Dokter</th>
                                          <th>Foto Dokter</th> 
                                          <th>Option</th>
                                        </tr>
                                <tbody>
                                <?php $No=1; ?>
                                    <?php $ambildata=$koneksi->query("SELECT * FROM dokter  JOIN spesialis ON dokter.id_spesialis=spesialis.id_spesialis WHERE  
                                id_dokter LIKE '%$keyword%' OR
                                nama_dokter LIKE '%$keyword%' OR
                                asal_instansi_dokter LIKE '%$keyword%' OR
                                nama_spesialis LIKE '%$keyword%' OR
                                tarif_dokter LIKE '%$keyword%' OR
                                foto_dokter LIKE '%$keyword%'");?>
                                    <?php while($pecah = $ambildata->fetch_assoc()){?>
                                               <tr>
                                               <td><?php echo $No?></td>
                                               <td><?php echo $pecah['id_dokter'];?></td>
                                               <td><?php echo $pecah['nama_dokter'];?></td>
                                               <td><?php echo $pecah['asal_instansi_dokter'];?></td>
                                                <td><?php echo $pecah['nama_spesialis'];?></td>
                                                <td>Rp.<?php echo number_format($pecah['tarif_dokter']);?></td>
                                                <td> <img src="../foto_dokter/<?php echo $pecah['foto_dokter'];?>" width="100"></td>
                                                    
                                                    <td><a href ="hapus_dokter.php?id_dokter=<?php echo $pecah['id_dokter']?>" onclick ="return confirm ('Apakah anda yakin ingin menghapus data?')"name="hapus" class="btn btn-purple">Delete</a>   
                                        <?php $No++;
                                        }
                                        ?> 
                                        </tbody>
                                    </thead>
                                </table>
                            </div>