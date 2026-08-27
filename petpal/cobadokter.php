<?php 

  require_once "koneksi.php";

$id_jenis_spesialis = $_POST['id_jenis_spesialis'];

$sql = mysqli_query($koneksi, "SELECT * FROM spesialis WHERE id_jenis_spesialis = '$id_jenis_spesialis' ");
echo '<option> -- Pilih Spesialis -- </option>';
while ($row = mysqli_fetch_array($sql)) {
  echo '<option value="'.$row['id_spesialis'].'">'.$row['nama_spesialis'].'</option>';
}

?>