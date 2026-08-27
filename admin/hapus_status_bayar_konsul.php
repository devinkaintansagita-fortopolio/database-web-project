<?php
include ('koneksi.php');
$ambildata=$koneksi->query("SELECT * FROM status_bayar_konsul WHERE id_status_bayar_konsul='$_GET[id_status_bayar_konsul]'");
$pecah=$ambildata->fetch_assoc();

$koneksi->query("DELETE FROM status_bayar_konsul WHERE id_status_bayar_konsul='$_GET[id_status_bayar_konsul]' ");

echo "<script> alert(' Data Jenis Status Bayar Konsultasi Berhasil Dihapus');</script>";
echo "<script>location='indexadmin.php?halaman=status_bayar_konsul';</script>";
?>