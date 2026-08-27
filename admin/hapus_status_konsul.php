<?php
include ('koneksi.php');
$ambildata=$koneksi->query("SELECT * FROM status_konsul WHERE id_status_konsul='$_GET[id_status_konsul]'");
$pecah=$ambildata->fetch_assoc();

$koneksi->query("DELETE FROM status_konsul WHERE id_status_konsul='$_GET[id_status_konsul]' ");

echo "<script> alert(' Data Jenis Status Konsultasi Berhasil Dihapus');</script>";
echo "<script>location='index.php?halaman=status_konsul';</script>";
?>