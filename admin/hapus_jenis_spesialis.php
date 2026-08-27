<?php
include ('koneksi.php');
$ambildata=$koneksi->query("SELECT * FROM jenis_spesialis WHERE id_jenis_spesialis='$_GET[id_jenis_spesialis]'");
$pecah=$ambildata->fetch_assoc();

$koneksi->query("DELETE FROM jenis_spesialis WHERE id_jenis_spesialis='$_GET[id_jenis_spesialis]' ");

echo "<script> alert(' Data Jenis Spesialis Berhasil Dihapus');</script>";
echo "<script>location='index.php?halaman=jenis_spesialis';</script>";
?>