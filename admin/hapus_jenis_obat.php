<?php
include ('koneksi.php');
$ambildata=$koneksi->query("SELECT * FROM jenis_obat WHERE id_jenis_obat='$_GET[id_jenis_obat]'");
$pecah=$ambildata->fetch_assoc();

$koneksi->query("DELETE FROM jenis_obat WHERE id_jenis_obat='$_GET[id_jenis_obat]' ");

echo "<script> alert(' Data Jenis Obat Berhasil Dihapus');</script>";
echo "<script>location='index.php?halaman=jenis_obat';</script>";
?>