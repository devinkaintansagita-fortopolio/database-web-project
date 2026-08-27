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

$query=mysqli_query($koneksi, "SELECT * FROM nota_konsul WHERE id_nota_konsul LIKE '%$keyword%'")
?>

<div class="card shadow mb-4">
    <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-dark">Data Nota Konsultasi</h6>
    </div>
    <br>
    <div class="card-body">
        <?php
        $ambildata = mysqli_query($koneksi, "SELECT * FROM nota_konsul JOIN status_bayar_konsul ON nota_konsul.id_status_bayar_konsul=status_bayar_konsul.id_status_bayar_konsul JOIN jenis_bayar_konsul ON nota_konsul.id_jenis_bayar_konsul=jenis_bayar_konsul.id_jenis_bayar_konsul JOIN hewan ON nota_konsul.id_hewan=hewan.id_hewan JOIN dokter ON nota_konsul.id_dokter=dokter.id_dokter JOIN status_konsul ON nota_konsul.id_status_konsul=status_konsul.id_status_konsul");
        $No = 1;

        $background_colors = array('#f2f2f2', '#e6f7ff', '#ffe6e6'); 

        while ($db = $ambildata->fetch_assoc()) {
            $background_color = $background_colors[$No % count($background_colors)]; 

            ?>
            <div class="nota-container" style="background-color: <?php echo $background_color; ?>">
                <div class="row mb-3">
                    <div class="col-md-6">
                        <div class="nota-item">
                            <p><strong>ID Nota Konsultasi:</strong> <?php echo isset($db['id_nota_konsul']) ? $db['id_nota_konsul'] : ''; ?></p>
                            <p><strong>Tanggal Konsultasi:</strong> <?php echo isset($db['tanggal_konsul']) ? $db['tanggal_konsul'] : ''; ?></p>
                            <p><strong>Keluhan/Gejala:</strong> <?php echo isset($db['keluhan']) ? $db['keluhan'] : ''; ?></p>
                            <p><strong>Status Konsultasi:</strong> <?php echo isset($db['ket_status_konsul']) ? $db['ket_status_konsul'] : ''; ?></p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="nota-item">
                            <p><strong>Informasi Pembayaran</strong></p>
                            <p><strong>Status Bayar Konsultasi:</strong> <?php echo isset($db['jenis_status_bayar_konsul']) ? $db['jenis_status_bayar_konsul'] : ''; ?></p>
                            <p><strong>Jenis Bayar Konsultasi:</strong> <?php echo isset($db['ket_jenis_bayar_konsul']) ? $db['ket_jenis_bayar_konsul'] : ''; ?></p>
                            <p><strong>Bukti Bayar Konsultasi:</strong> <?php echo isset($db['bukti_bayar_konsul']) ? $db['bukti_bayar_konsul'] : ''; ?></p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="nota-item">
                            <p><strong>Informasi Hewan dan Dokter</strong></p>
                            <p><strong>Nama Hewan:</strong> <?php echo isset($db['id_hewan']) ? $db['nama_hewan'] : ''; ?></p>
                            <p><strong>Nama Dokter:</strong> <?php echo isset($db['id_dokter']) ? $db['nama_dokter'] : ''; ?></p>
                        </div>
                    </div>
                </div>
            </div>
            <br>
            <a href ="hapus_nota_konsul.php?id_nota_konsul=<?php echo $db['id_nota_konsul']?>" onclick ="return confirm ('Apakah anda yakin ingin menghapus data?')"name="hapus" class="btn btn-purple"> Hapus </a>   
            <a href="edit_nota_konsul.php?halaman=edit_nota_konsul&id_nota_konsul=<?php echo $db['id_nota_konsul']; ?>" class="btn btn-purple">Edit</a>
            <hr>
        <?php $No++;
        }
        ?>
    </div>
</div>