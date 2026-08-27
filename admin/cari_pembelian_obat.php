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

$keyword = mysqli_real_escape_string($koneksi, $_POST['keyword']);

$query = mysqli_query($koneksi, 
    "SELECT pembelian_obat.*, 
           obat.id_obat AS id_obat, 
           resep_obat.id_resep_obat AS id_resep_obat
    FROM pembelian_obat 
    JOIN obat ON pembelian_obat.id_obat = obat.id_obat
    JOIN resep_obat ON pembelian_obat.id_resep_obat = resep_obat.id_resep_obat
    WHERE obat.id_obat LIKE '%$keyword%'
       OR resep_obat.id_resep_obat LIKE '%$keyword%'
");

?>

<div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-dark">Data Pembelian Obat</h6>
                        </div>
                                    <form class="form-inline" role="search" method="post" action="index.php?halaman=cari_pembelian_obat">
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
                                          <th>ID Obat</th>
                                          <th>Sub Harga Obat</th>
                                          <th>Sub QTY</th>
                                          <th>Option</th>
                                        </tr>
                                <tbody>
                                <?php $No=1; ?>
                                <?php 
                                $ambildata = mysqli_query($koneksi, 
                                "SELECT * 
                                    FROM pembelian_obat 
                                    JOIN obat ON pembelian_obat.id_obat = obat.id_obat 
                                    JOIN resep_obat ON pembelian_obat.id_resep_obat = resep_obat.id_resep_obat 
                                    WHERE  
                                        obat.id_obat LIKE '%$keyword%' OR
                                        resep_obat.id_resep_obat LIKE '%$keyword%' OR
                                        pembelian_obat.sub_harga_obat LIKE '%$keyword%' OR
                                        pembelian_obat.sub_qty LIKE '%$keyword%'
                                ");
                                ?>

                                    <?php while($pecah = $ambildata->fetch_assoc()){?>
                                               <tr>
                                               <td><?php echo $No?></td>
                                               <td><?php echo $pecah['id_obat'];?></td>
                                               <td><?php echo $pecah['id_resep_obat'];?></td>
                                               <td><?php echo $pecah['sub_harga_obat'];?></td>
                                               <td><?php echo $pecah['sub_qty'];?></td>
                                                    
                                                    <td><a href ="hapus_pembelian_obat.php?id_pembelian_obat=<?php echo $pecah['id_pembelian_obat']?>" onclick ="return confirm ('Apakah anda yakin ingin menghapus data?')"name="hapus" class="btn btn-purple">Hapus</a>
                                        <?php $No++;
                                        }
                                        ?> 
                                        </tbody>
                                    </thead>
                                </table>
                            </div>