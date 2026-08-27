<?php
include ('koneksi.php');
$ambildata=$koneksi->query("SELECT * FROM penyakit WHERE id_penyakit='$_GET[id_penyakit]'");
$pecah=$ambildata->fetch_assoc();

$koneksi->query("DELETE FROM penyakit WHERE id_penyakit='$_GET[id_penyakit]' ");

echo "<script> alert(' Data Penyakit Berhasil Dihapus');</script>";
echo "<script>location='index.php?halaman=penyakit';</script>";
?>