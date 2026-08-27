<?php 

  require_once "koneksi.php";

$id_kecamatan = $_POST['id_kecamatan'];

$sql = mysqli_query($koneksi, "SELECT * FROM kelurahan WHERE id_kecamatan = '$id_kecamatan' ");
echo '<option>Pilih kelurahan</option>';
while ($row = mysqli_fetch_array($sql)) {
  echo '<option value="'.$row['id_kelurahan'].'">'.$row['nama_kelurahan'].'</option>';
}

?>