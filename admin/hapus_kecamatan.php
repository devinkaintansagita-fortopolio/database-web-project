<?php
include ('koneksi.php');
$ambildata=$koneksi->query("SELECT * FROM kecamatan WHERE id_kecamatan='$_GET[id_kecamatan]'");
$pecah=$ambildata->fetch_assoc();

$koneksi->query("DELETE FROM kecamatan WHERE id_kecamatan='$_GET[id_kecamatan]' ");

echo "<script> alert(' Data Kecamatan Berhasil Dihapus');</script>";
echo "<script>location='index.php?halaman=kecamatan';</script>";
?>