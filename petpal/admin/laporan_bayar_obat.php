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
$query = "SELECT jenis_bayar_obat.id_metode_bayar_obat, metode_bayar_obat.ket_metode_bayar_obat, COUNT(resep_obat.id_jenis_bayar_obat) AS total
          FROM resep_obat 
          JOIN jenis_bayar_obat ON resep_obat.id_jenis_bayar_obat = jenis_bayar_obat.id_jenis_bayar_obat
          JOIN metode_bayar_obat ON jenis_bayar_obat.id_metode_bayar_obat = metode_bayar_obat.id_metode_bayar_obat
          $strw
          GROUP BY jenis_bayar_obat.id_metode_bayar_obat
          ORDER BY total DESC";

$result = mysqli_query($koneksi, $query);
$resnum = mysqli_num_rows($result);

?>

<h3>Laporan Metode Pembayaran Obat</h3>
<br>
<table class="table table-bordered">
    <thead>
        <tr>
            <th>Nomor</th>
            <th>Metode Bayar Obat</th>
            <th>Jumlah</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $nomor = 1;
        while ($row = mysqli_fetch_assoc($result)) {
            ?>
            <tr>
                <td><?php echo $nomor++; ?></td>
                <td><?php echo $row['ket_metode_bayar_obat']; ?></td>
                <td><?php echo $row['total']; ?></td>
            </tr>
        <?php } ?>
    </tbody>
</table>
