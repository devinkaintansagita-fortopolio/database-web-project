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
    "SELECT nota_penyakit.*, 
           nota_konsul.id_nota_konsul AS id_nota_konsul, 
           penyakit.id_penyakit AS id_penyakit
    FROM nota_penyakit 
    JOIN nota_konsul ON nota_penyakit.id_nota_konsul = nota_konsul.id_nota_konsul
    JOIN penyakit ON nota_penyakit.id_penyakit = penyakit.id_penyakit
    WHERE nota_konsul.id_nota_konsul LIKE '%$keyword%'
       OR penyakit.id_penyakit LIKE '%$keyword%'
");

?>

<div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-dark">Data Nota Penyakit</h6>
                        </div>
                                    <form class="form-inline" role="search" method="post" action="index.php?halaman=cari_nota_penyakit">
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
                                          <th>ID Nota Konsultasi</th>
                                          <th>ID Penyakit</th>
                                          <th>Gejala</th>
                                          <th>Penanganan</th>
                                          <th>Option</th>
                                        </tr>
                                <tbody>
                                <?php $No=1; ?>
                                <?php 
                                $ambildata = mysqli_query($koneksi, 
                                "SELECT * 
                                    FROM nota_penyakit 
                                    JOIN nota_konsul ON nota_penyakit.id_nota_konsul = nota_konsul.id_nota_konsul 
                                    JOIN penyakit ON nota_penyakit.id_penyakit = penyakit.id_penyakit 
                                    WHERE  
                                        nota_konsul.id_nota_konsul LIKE '%$keyword%' OR
                                        penyakit.id_penyakit LIKE '%$keyword%' OR
                                        nota_penyakit.gejala LIKE '%$keyword%' OR
                                        nota_penyakit.penanganan LIKE '%$keyword%'
                                ");
                                ?>

                                    <?php while($pecah = $ambildata->fetch_assoc()){?>
                                               <tr>
                                               <td><?php echo $No?></td>
                                               <td><?php echo $pecah['id_nota_konsul'];?></td>
                                               <td><?php echo $pecah['id_penyakit'];?></td>
                                               <td><?php echo $pecah['gejala'];?></td>
                                               <td><?php echo $pecah['penanganan'];?></td>
                                                    
                                                    <td><a href ="hapus_nota_penyakit.php?id_nota_penyakit=<?php echo $pecah['id_nota_penyakit']?>" onclick ="return confirm ('Apakah anda yakin ingin menghapus data?')"name="hapus" class="btn btn-purple">Hapus</a>
                                        <?php $No++;
                                        }
                                        ?> 
                                        </tbody>
                                    </thead>
                                </table>
                            </div>