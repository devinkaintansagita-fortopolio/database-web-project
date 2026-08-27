<?php
require_once "koneksi.php";

$id_kota = $_POST['id_kota'];

$sql = mysqli_query($koneksi, "SELECT * FROM apotek WHERE id_kota = '$id_kota' ");
echo '<select required>';
echo '<option value="" disabled selected>Pilih apotek</option>'; // Added a default option with disabled and selected attributes
while ($row = mysqli_fetch_array($sql)) {
  echo '<option value="'.$row['id_apotek'].'">'.$row['nama_apotek'].'</option>';
}
echo '</select>';
?>
