<?php
include ('koneksi.php');
$ambildata=$koneksi->query("SELECT * FROM kelurahan WHERE id_kelurahan='$_GET[id_kelurahan]'");
$pecah=$ambildata->fetch_assoc();

$koneksi->query("DELETE FROM kelurahan WHERE id_kelurahan='$_GET[id_kelurahan]' ");

echo "<script> alert(' Data Kelurahan Berhasil Dihapus');</script>";
echo "<script>location='index.php?halaman=kelurahan';</script>";
?>