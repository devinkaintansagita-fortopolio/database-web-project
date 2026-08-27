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
$query = "SELECT jenis_bayar_konsul.id_metode_bayar_konsul, metode_bayar_konsul.ket_metode_bayar_konsul, COUNT(nota_konsul.id_jenis_bayar_konsul) AS total
          FROM nota_konsul 
          JOIN jenis_bayar_konsul ON nota_konsul.id_jenis_bayar_konsul = jenis_bayar_konsul.id_jenis_bayar_konsul
          JOIN metode_bayar_konsul ON jenis_bayar_konsul.id_metode_bayar_konsul = metode_bayar_konsul.id_metode_bayar_konsul
          $strw
          GROUP BY jenis_bayar_konsul.id_metode_bayar_konsul
          ORDER BY total DESC";

$result = mysqli_query($koneksi, $query);
$resnum = mysqli_num_rows($result);

?>

<h3>Laporan Metode Pembayaran Konsultasi</h3>
<br>
<table class="table table-bordered">
    <thead>
        <tr>
            <th>Nomor</th>
            <th>Metode Bayar Kosultasi</th>
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
                <td><?php echo $row['ket_metode_bayar_konsul']; ?></td>
                <td><?php echo $row['total']; ?></td>
            </tr>
        <?php } ?>
    </tbody>
</table>
