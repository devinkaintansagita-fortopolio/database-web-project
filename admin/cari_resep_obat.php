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

$query=mysqli_query($koneksi, "SELECT * FROM resep_obat WHERE id_resep_obat LIKE '%$keyword%'")
?>

<div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-dark">Data Resep Obat</h6>
                        </div>
                                    <form class="form-inline" role="search" method="post" action="index.php?halaman=cari_resep_obat">
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
                                          <th>ID Resep Obat</th>
                                          <th>Tanggal Resep</th>
                                          <th>Total Bayar Resep</th>
                                          <th>Diskon reseptasi</th>
                                          <th>ID Nota reseptasi</th>
                                          <th>Nama Apotek</th> 
                                          <th>Keterangan Metode Bayar Obat</th>
                                          <th>Jenis Status Bayar Obat</th>
                                          <th>Status Setor Apotek</th>
                                          <th>Option</th>
                                          </tr>
                                <tbody>
                                <?php $No=1; ?>
                                    <?php $ambildata =mysqli_query($koneksi, "SELECT * FROM resep_obat JOIN nota_resep ON resep_obat.id_nota_resep=nota_resep.id_nota_resep JOIN apotek ON resep_obat.id_apotek=apotek.id_apotek JOIN metode_bayar_obat ON resep_obat.id_metode_bayar_obat=metode_bayar_obat.id_metode_bayar_obat JOIN status_bayar_obat ON resep_obat.id_status_bayar_obat=status_bayar_obat.id_status_bayar_obat JOIN setor_apotek ON resep_obat.id_setor_apotek=setor_apotek.id_setor_apotek WHERE  
                                id_resep_obat LIKE '%$keyword%' OR
                                tanggal_resep LIKE '%$keyword%' OR
                                total_bayar_resep LIKE '%$keyword%' OR
                                id_nota_konsul LIKE '%$keyword%' OR
                                nama_apotek LIKE '%$keyword%' OR
                                ket_metode_bayar_obat LIKE '%$keyword%' OR
                                jenis_status_bayar_obat LIKE '%$keyword%' OR
                                status_setor_apotek LIKE '%$keyword%'");?>
                                    <?php while($pecah = $ambildata->fetch_assoc()){?>
                                               <tr>
                                               <td><?php echo $No?></td>
                                               <td><?php echo $pecah['id_resep_obat'];?></td>
                                               <td><?php echo $pecah['tanggal_resep'];?></td>
                                               <td><?php echo $pecah['total_bayar_resep'];?></td>
                                               <td><?php echo $pecah['id_nota_konsul'];?></td>
                                               <td><?php echo $pecah['nama_apotek'];?></td>
                                               <td><?php echo $pecah['ket_metode_bayar_obat'];?></td>
                                               <td><?php echo $pecah['jenis_status_bayar_obat'];?></td>
                                               <td><?php echo $pecah['status_setor_apotek'];?></td>
                                                    
                                                    <td><a href ="hapus_resep_obat.php?id_resep_obat=<?php echo $pecah['id_resep_obat']?>" onclick ="return confirm ('Apakah anda yakin ingin menghapus data?')"name="hapus" class="btn btn-purple">Hapus</a>
                                                    <a href ="edit_resep_obat.php?halaman=edit_resep_obat&id_resep_obat=<?php echo $pecah['id_resep_obat']?>" class="btn btn- btn-purple">Edit</a>   
                                        <?php $No++;
                                        }
                                        ?> 
                                        </tbody>
                                    </thead>
                                </table>
                            </div>