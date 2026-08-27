<?php
include ('koneksi.php');
$ambildata=$koneksi->query("SELECT * FROM jenis_bayar_konsul WHERE id_jenis_bayar_konsul='$_GET[id_jenis_bayar_konsul]'");
$pecah=$ambildata->fetch_assoc();

$koneksi->query("DELETE FROM jenis_bayar_konsul WHERE id_jenis_bayar_konsul='$_GET[id_jenis_bayar_konsul]' ");

echo "<script> alert(' Data Jenis Bayar Konsultasi Berhasil Dihapus');</script>";
echo "<script>location='index.php?halaman=jenis_bayar_konsul';</script>";
?>