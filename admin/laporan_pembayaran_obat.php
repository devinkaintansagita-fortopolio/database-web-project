<?php
include 'koneksi.php';
$ket_jenis_bayar_obat="";
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
    $strc[]="resep_obat.tanggal_obat BETWEEN '$tanggal_mulai' AND '$tanggal_selesai' ";
    $jmlh++;
}

if (isset($_POST['keyword']))
{
    $keyword=$_POST['keyword'];
    $strc[]="jenis_bayar_obat.ket_jenis_bayar_obat LIKE '%$keyword%'";
    $jmlh++;
}

if (isset($_POST['metode_bayar_obat']))
{
    $metode_bayar_obat=$_POST['metode_bayar_obat'];
    $strc[]="metode_bayar_obat.ket_metode_bayar_obat == '$metode_bayar_obat'";
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

$query = "SELECT *, COUNT(resep_obat.id_jenis_bayar_obat) AS total 
          FROM resep_obat  
          JOIN jenis_bayar_obat ON resep_obat.id_jenis_bayar_obat = jenis_bayar_obat.id_jenis_bayar_obat
          JOIN metode_bayar_obat ON jenis_bayar_obat.id_metode_bayar_obat = metode_bayar_obat.id_metode_bayar_obat
         $strw
          GROUP BY resep_obat.id_jenis_bayar_obat 
          ORDER BY total DESC";
$result = mysqli_query($koneksi, $query);
$resnum = mysqli_num_rows($result);

$pecah2 = $koneksi->query("SELECT * FROM metode_bayar_obat");
?>

<h3>Laporan Jenis Pembayaran Obat</h3>
<br>

<form action="index.php?halaman=laporan_pembayaran_obat" method="post" class="form">
    <br>
    <div class="row">
        <div class="search-bar">
            <input type="text" name="keyword" placeholder="Cari Nama Jenis Bayar obattasi" title="Masukkan keyword pencarian" autocomplete="off">
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
                <label>Metode Bayar obattasi:</label>
                <select class="form-control" name="ket_metode_bayar_obat" value = "<?php echo $row['ket_metode_bayar_obat'] ?>">
                    <option selected disabled>-- PILIH METODE BAYAR obatTASI -- </option>
                    <?php while ($row = mysqli_fetch_assoc($pecah2)) { ?>
                        <option value="<?php echo $row['id_metode_bayar_obat']; ?>"> <?php echo $row['ket_metode_bayar_obat']; ?></option>
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
            <th>Nama Jenis Bayar obattasi</th>
            <th>Jumlah obattasi</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $nomor = 1;
        while ($row = mysqli_fetch_assoc($result)) {
            ?>
            <tr>
                <td><?php echo $nomor++; ?></td>
                <td><?php echo $row['ket_jenis_bayar_obat']; ?></td>
                <td><?php echo $row['total']; ?></td>
            </tr>
        <?php } ?>
    </tbody>
</table>
