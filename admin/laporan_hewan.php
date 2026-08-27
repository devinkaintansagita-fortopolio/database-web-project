<?php
include 'koneksi.php';
$id_hewan="";
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
    $strc[]="hewan.jenis_hewan LIKE '%$keyword%'";
    $jmlh++;
}

if (isset($_POST['penyakit']))
{
    $penyakit=$_POST['penyakit'];
    $strc[]="nota_penyakit.id_penyakit == '$penyakit'";
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

$query = "SELECT *, COUNT(nota_konsul.id_hewan) AS total 
          FROM nota_konsul  
          JOIN hewan ON nota_konsul.id_hewan = hewan.id_hewan
          JOIN nota_penyakit ON nota_konsul.id_nota_konsul = nota_penyakit.id_nota_konsul
          JOIN penyakit ON nota_penyakit.id_penyakit = penyakit.id_penyakit
         $strw
          GROUP BY nota_konsul.id_hewan 
          ORDER BY total DESC";
$result = mysqli_query($koneksi, $query);
$resnum = mysqli_num_rows($result);

$pecah2 = $koneksi->query("SELECT * FROM penyakit");
?>
<h3>Laporan Hewan yang Sering Konsultasi</h3>
<br>

<form action="index.php?halaman=laporan_hewan" method="post" class="form">
    <br>
    <div class="row">
        <div class="search-bar">
            <input type="text" name="keyword" placeholder="Cari Nama hewan" title="Masukkan keyword pencarian" autocomplete="off">
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
                <label>Penyakit:</label>
                <select class="form-control" name="id_jenis_penyakit" value = "<?php echo $row['id_jenis_penyakit'] ?>">
                    <option selected disabled>-- PILIH JENIS PENYAKIT -- </option>
                    <?php while ($row = mysqli_fetch_assoc($pecah2)) { ?>
                        <option value="<?php echo $row['id_penyakit']; ?>"> <?php echo $row['nama_penyakit']; ?></option>
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

<br>
<table class="table table-bordered">
    <thead>
        <tr>
            <th>Nomor</th>
            <th>Nama Jenis hewan</th>
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
                <td><?php echo $row['jenis_hewan']; ?></td>
                <td><?php echo $row['total']; ?></td>
            </tr>
        <?php } ?>
    </tbody>
</table>
