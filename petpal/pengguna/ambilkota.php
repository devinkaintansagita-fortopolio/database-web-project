<?php 

  require_once "koneksi.php";

$id_provinsi = $_POST['id_provinsi'];

$sql = mysqli_query($koneksi, "SELECT * FROM kota WHERE id_provinsi = '$id_provinsi' ");
echo '<option>Pilih Kota</option>';
while ($row = mysqli_fetch_array($sql)) {
  echo '<option value="'.$row['id_kota'].'">'.$row['nama_kota'].'</option>';
}

?>