<?php 
	require_once "koneksi.php";

$id_metode_bayar_obat = $_POST['id_metode_bayar_obat'];

$sql = mysqli_query($koneksi, "SELECT * FROM jenis_bayar_obat WHERE id_metode_bayar_obat = '$id_metode_bayar_obat' ");
echo '<option>Pilih Jenis Bayar Obat</option>';
while ($row = mysqli_fetch_array($sql)) {
	echo '<option value="'.$row['id_jenis_bayar_obat'].'">'.$row['nama_jenis_bayar_obat'].'</option>';
}
?>