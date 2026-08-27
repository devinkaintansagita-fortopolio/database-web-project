<?php 
	require_once "koneksi.php";

$id_metode_bayar_konsul = $_POST['id_metode_bayar_konsul'];

$sql = mysqli_query($koneksi, "SELECT * FROM jenis_bayar_konsul WHERE id_metode_bayar_konsul = '$id_metode_bayar_konsul' ");
echo '<option>Pilih Jenis Bayar Konsultasi</option>';
while ($row = mysqli_fetch_array($sql)) {
	echo '<option value="'.$row['id_jenis_bayar_konsul'].'">'.$row['ket_jenis_bayar_konsul'].'</option>';
}
?>