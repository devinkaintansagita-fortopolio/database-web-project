<?php 

  require_once "koneksi.php";

$id_kota = $_POST['id_kota'];

$sql = mysqli_query($koneksi, "SELECT * FROM kecamatan WHERE id_kota = '$id_kota' ");
echo '<option>Pilih kecamatan</option>';
while ($row = mysqli_fetch_array($sql)) {
  echo '<option value="'.$row['id_kecamatan'].'">'.$row['nama_kecamatan'].'</option>';
}

?>