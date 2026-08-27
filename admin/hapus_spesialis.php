<?php
include ('koneksi.php');
$ambildata=$koneksi->query("SELECT * FROM spesialis WHERE id_spesialis='$_GET[id_spesialis]'");
$pecah=$ambildata->fetch_assoc();

$koneksi->query("DELETE FROM spesialis WHERE id_spesialis='$_GET[id_spesialis]' ");

echo "<script> alert(' Data Jenis Spesialis Berhasil Dihapus');</script>";
echo "<script>location='index.php?halaman=spesialis';</script>";
?>