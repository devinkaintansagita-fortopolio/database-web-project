<?php
include ('koneksi.php');
$ambildata=$koneksi->query("SELECT * FROM jenis_penyakit WHERE id_jenis_penyakit='$_GET[id_jenis_penyakit]'");
$pecah=$ambildata->fetch_assoc();

$koneksi->query("DELETE FROM jenis_penyakit WHERE id_jenis_penyakit='$_GET[id_jenis_penyakit]' ");

echo "<script> alert(' Data Jenis Penyakit Berhasil Dihapus');</script>";
echo "<script>location='index.php?halaman=jenis_penyakit';</script>";
?>