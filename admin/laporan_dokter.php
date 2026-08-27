<?php
include 'koneksi.php';
$keyword="";
$tanggal_mulai="";
$tanggal_selesai="";
$id_spesialis = "";
$strq = "";
$strw = "";
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
    $strc[]="dokter.nama_dokter LIKE '%$keyword%'";
    $jmlh++;
}
if (isset($_POST['id_spesialis'])) {
    $id_spesialis = $_POST['id_spesialis'];
    $strc[] = "dokter.id_spesialis='$id_spesialis'";
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

$query = "SELECT *, COUNT(nota_konsul.id_dokter) AS total FROM nota_konsul  
          JOIN dokter ON nota_konsul.id_dokter = dokter.id_dokter
          $strw
          GROUP BY nota_konsul.id_dokter 
          ORDER BY total DESC";
$result = mysqli_query($koneksi, $query);
$resnum = mysqli_num_rows($result);

$pecah2 = $koneksi->query("SELECT * FROM spesialis");


?>
<h3>Laporan Dokter</h3>
<br>

<form action="index.php?halaman=laporan_dokter" method="post" class="form">
    <br />
    <div class="row">
        <div class="search-bar">
            <input type="text" name="keyword" placeholder="Cari Nama Dokter" title="Masukkan keyword pencarian" autocomplete="off">
            <button type="submit" name="submit" title="Cari"><i class="btn btn-purple mb-4">Cari </i></button>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-md-2">
            <div class="form-group">
                <label>Tanggal Mulai:</label>
                <input type="date" class="form-control" name="tanggal_mulai" value="<?php echo $tanggal_mulai ?>" required>
            </div>
        </div>
        <div class="col-md-2">
            <div class="form-group">
                <label>Tanggal Selesai:</label>
                <input type="date" class="form-control" name="tanggal_selesai" value="<?php echo $tanggal_selesai ?>" required>
            </div>
        </div>
        <div class="col-md-2">
            <div class="form-group">
                <label>Spesialis:</label>
                <select class="form-control" name="id_spesialis" value = "<?php echo $row['id_spesialis'] ?>">
                    <option selected disabled>-- PILIH SPESIALIS -- </option>
                    <?php while ($row = mysqli_fetch_assoc($pecah2)) { ?>
                        <option value="<?php echo $row['id_spesialis']; ?>"> <?php echo $row['nama_spesialis']; ?></option>
                    <?php } ?>
                </select>
            </div>
        </div>
        <div class="col-md-2">
            <br />
            <input type="submit" class="btn btn-purple mb-4" name="submit" value="Search">
        </div>
    </div>
</form>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>Nomor</th>
            <th>Nama Dokter</th>
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
                <td><?php echo $row['nama_dokter']; ?></td>
                <td><?php echo $row['total']; ?></td>
            </tr>
        <?php } ?>
    </tbody>
</table>
