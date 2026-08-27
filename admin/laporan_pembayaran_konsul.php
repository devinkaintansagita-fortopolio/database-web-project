<?php
include 'koneksi.php';
$ket_jenis_bayar_konsul="";
$keyword="";
$tanggal_mulai="";
$tanggal_selesai="";
$strq = "";
$strw = "";
$keyword = "";
$jmlh = 0;

if (isset($_POST['tanggal_mulai']))
{
    if (isset($_POST['tanggal_selesai']))
    {
        $tanggal_selesai=$_POST['tanggal_selesai'];
    }
    else
    {
        $tanggal_selesai=date("Y-m-d");
    }
    $tgl_mulai=$_POST['tanggal_mulai'];
    $strc[]="nota_konsul.tanggal_konsul BETWEEN '$tanggal_mulai' AND '$tanggal_selesai' ";
    $jmlh++;
}

if (isset($_POST['keyword']))
{
    $keyword=$_POST['keyword'];
    $strc[]="jenis_bayar_konsul.ket_jenis_bayar_konsul LIKE '%$keyword%'";
    $jmlh++;
}

if (isset($_POST['metode_bayar_konsul']))
{
    $metode_bayar_konsul=$_POST['metode_bayar_konsul'];
    $strc[]="metode_bayar_konsul.ket_metode_bayar_konsul == '$metode_bayar_konsul'";
    $jmlh++;
}
$i = 1;
if ($jmlh > 0) {
    $strw = "WHERE ";
    foreach ($strc as $strs) {
        $strw .= $strs;
        if ($i < $jmlh) {
            $strw .= " AND ";
            $i++; 
        }
    }
}

$query = "SELECT *, COUNT(nota_konsul.id_jenis_bayar_konsul) AS total 
          FROM nota_konsul  
          JOIN jenis_bayar_konsul ON nota_konsul.id_jenis_bayar_konsul = jenis_bayar_konsul.id_jenis_bayar_konsul
          JOIN metode_bayar_konsul ON jenis_bayar_konsul.id_metode_bayar_konsul = metode_bayar_konsul.id_metode_bayar_konsul
         $strw
          GROUP BY nota_konsul.id_jenis_bayar_konsul 
          ORDER BY total DESC";
$result = mysqli_query($koneksi, $query);
$resnum = mysqli_num_rows($result);

$pecah2 = $koneksi->query("SELECT * FROM metode_bayar_konsul");
?>

<h3>Laporan Jenis Pembayaran Konsultasi</h3>
<br>

<form action="index.php?halaman=laporan_pembayaran_konsul" method="post" class="form">
    <br>
    <div class="row">
        <div class="search-bar">
            <input type="text" name="keyword" placeholder="Cari Nama Jenis Bayar Konsultasi" title="Masukkan keyword pencarian" autocomplete="off">
            <button type="submit" name="submit" title="Cari"><i class="btn btn-purple mb-4">Cari </i></button>
        </div>
    </div>
    <br>
    <div class="col-md-2">
        <div class="form-group">
            <label>Tanggal Mulai :</label>
            <input type="date" class="form-control" name="tanggal_mulai" value="<?php echo $tanggal_mulai?>" required>
        </div>
    </div>
    <div class="col-md-2">
        <div class="form-group">
            <label>Tanggal Selesai :</label>
            <input type="date" class="form-control" name="tanggal_selesai" value="<?php echo $tanggal_selesai?>" required>
        </div>
    </div>
    <div class="col-md-2">
            <div class="form-group">
                <label>Metode Bayar Konsultasi:</label>
                <select class="form-control" name="ket_metode_bayar_konsul" value = "<?php echo $row['ket_metode_bayar_konsul'] ?>">
                    <option selected disabled>-- PILIH METODE BAYAR KONSULTASI -- </option>
                    <?php while ($row = mysqli_fetch_assoc($pecah2)) { ?>
                        <option value="<?php echo $row['id_metode_bayar_konsul']; ?>"> <?php echo $row['ket_metode_bayar_konsul']; ?></option>
                    <?php } ?>
                </select>
            </div>
        </div>
        <div class="col-md-2">
            <br />
            <input type="submit" class="btn btn-purple mb-4" name="submit" value="Cari">
        </div>
    </div>
</form>

<br>
<table class="table table-bordered">
    <thead>
        <tr>
            <th>Nomor</th>
            <th>Nama Jenis Bayar Konsultasi</th>
            <th>Jumlah Konsultasi</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $nomor = 1;
        while ($row = mysqli_fetch_assoc($result)) {
            ?>
            <tr>
                <td><?php echo $nomor++; ?></td>
                <td><?php echo $row['ket_jenis_bayar_konsul']; ?></td>
                <td><?php echo $row['total']; ?></td>
            </tr>
        <?php } ?>
    </tbody>
</table>
