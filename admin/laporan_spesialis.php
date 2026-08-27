<?php
include 'koneksi.php';
$strq = "";
$strw = "";
$jmlh = 0;
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
$query = "SELECT *, COUNT(dokter.id_spesialis) AS total 
          FROM dokter JOIN spesialis ON dokter.id_spesialis = spesialis.id_spesialis
         $strw 
         GROUP BY dokter.id_spesialis
          ORDER BY total DESC";
$result = mysqli_query($koneksi, $query);
$resnum = mysqli_num_rows($result);

?>

<h3>Laporan Jumlah Dokter Berdasarkan Spesialis</h3>
<br>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>Nomor</th>
            <th>Spesialis</th>
            <th>Jumlah Dokter</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $nomor = 1;
        while ($row = mysqli_fetch_assoc($result)) {
            ?>
            <tr>
                <td><?php echo $nomor++; ?></td>
                <td><?php echo $row['nama_spesialis']; ?></td>
                <td><?php echo $row['total']; ?></td>
            </tr>
        <?php } ?>
    </tbody>
</table>
