<?php
include ('koneksi.php');
$ambildata=$koneksi->query("SELECT * FROM obat WHERE id_obat='$_GET[id_obat]'");
$pecah=$ambildata->fetch_assoc();

$koneksi->query("DELETE FROM obat WHERE id_obat='$_GET[id_obat]' ");

echo "<script> alert(' Data Obat Berhasil Dihapus');</script>";
echo "<script>location='index.php?halaman=obat';</script>";
?>