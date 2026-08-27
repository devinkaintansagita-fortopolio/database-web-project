<?php
include ('koneksi.php');
$ambildata=$koneksi->query("SELECT * FROM metode_konsul WHERE id_metode_konsul='$_GET[id_metode_konsul]'");
$pecah=$ambildata->fetch_assoc();

$koneksi->query("DELETE FROM metode_konsul WHERE id_metode_konsul='$_GET[id_metode_konsul]' ");

echo "<script> alert(' Data Jenis Metode Konsultasi Berhasil Dihapus');</script>";
echo "<script>location='index.php?halaman=metode_konsul';</script>";
?>