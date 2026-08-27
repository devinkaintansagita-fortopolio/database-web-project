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

$query=mysqli_query($koneksi, "SELECT * FROM setor_apotek WHERE id_setor_apotek LIKE '%$keyword%'")
?>

<div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-dark">Data Setor Apotek</h6>
                        </div>
                                    <form class="form-inline" role="search" method="post" action="index.php?halaman=cari_setor_apotek">
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
                                          <th>ID Setor Apotek</th>
                                          <th>Status Setor Apotek</th>
                                          <th>Jumlah Setor Apotek</th>
                                          <th>Tanggal Setor Apotek</th>
                                          <th>Option</th>
                                        </tr>
                                <tbody>
                                <?php $No=1; ?>
                                    <?php $ambildata=$koneksi->query("SELECT * FROM setor_apotek WHERE 
                                id_setor_apotek LIKE '%$keyword%' OR
                                status_setor_apotek LIKE '%$keyword%' OR
                                jumlah_setor_apotek LIKE '%$keyword%' OR
                                tanggal_setor_apotek LIKE '%$keyword%'");?>
                                    <?php while($pecah = $ambildata->fetch_assoc()){?>
                                               <tr>
                                               <td><?php echo $No?></td>
                                               <td><?php echo $pecah['id_setor_apotek'];?></td>
                                               <td><?php echo $pecah['status_setor_apotek'];?></td>
                                               <td><?php echo $pecah['jumlah_setor_apotek'];?></td>
                                               <td><?php echo $pecah['tanggal_setor_apotek'];?></td>
                                                    
                                                    <td><a href ="hapus_setor_apotek.php?id_setor_apotek=<?php echo $pecah['id_setor_apotek']?>" onclick ="return confirm ('Apakah anda yakin ingin menghapus data?')"name="hapus" class="btn btn-purple">Delete</a>   
                                                    <a href ="edit_setor_apotek.php?halaman=edit_setor_apotek&id_setor_apotek=<?php echo $pecah['id_setor_apotek']?>" class="btn btn- btn-purple">Edit</a>
                                        <?php $No++;
                                        }
                                        ?> 
                                        </tbody>
                                    </thead>
                                </table>
                                <a href="tambah_setor_apotek.php?halaman=tambah_setor_apotek" class = "btn btn-purple"> Tambah Data </a>
                            </div>