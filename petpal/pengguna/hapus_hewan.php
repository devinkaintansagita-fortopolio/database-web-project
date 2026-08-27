<?php
include ('koneksi.php');
$ambildata=$koneksi->query("SELECT * FROM hewan WHERE id_hewan='$_GET[id_hewan]'");
$pecah=$ambildata->fetch_assoc();

$koneksi->query("DELETE FROM hewan WHERE id_hewan='$_GET[id_hewan]' ");

echo "<script> alert(' Data hewan Berhasil Dihapus');</script>";
echo "<script>location='index.php?halaman=hewan';</script>";
?>