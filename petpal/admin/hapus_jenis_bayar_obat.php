<?php
include ('koneksi.php');
$ambildata=$koneksi->query("SELECT * FROM jenis_bayar_obat WHERE id_jenis_bayar_obat='$_GET[id_jenis_bayar_obat]'");
$pecah=$ambildata->fetch_assoc();

$koneksi->query("DELETE FROM jenis_bayar_obat WHERE id_jenis_bayar_obat='$_GET[id_jenis_bayar_obat]' ");

echo "<script> alert(' Data Jenis Bayar Obat Berhasil Dihapus');</script>";
echo "<script>location='index.php?halaman=jenis_bayar_obat';</script>";
?>