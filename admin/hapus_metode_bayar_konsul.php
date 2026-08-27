<?php
include ('koneksi.php');
$ambildata=$koneksi->query("SELECT * FROM metode_bayar_konsul WHERE id_metode_bayar_konsul='$_GET[id_metode_bayar_konsul]'");
$pecah=$ambildata->fetch_assoc();

$koneksi->query("DELETE FROM metode_bayar_konsul WHERE id_metode_bayar_konsul='$_GET[id_metode_bayar_konsul]' ");

echo "<script> alert(' Data metode_bayar_konsul Berhasil Dihapus');</script>";
echo "<script>location='index.php?halaman=metode_bayar_konsul';</script>";
?>