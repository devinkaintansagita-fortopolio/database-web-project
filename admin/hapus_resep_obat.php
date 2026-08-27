<?php
include ('koneksi.php');
$ambildata=$koneksi->query("SELECT * FROM resep_obat WHERE id_resep_obat='$_GET[id_resep_obat]'");
$pecah=$ambildata->fetch_assoc();

$koneksi->query("DELETE FROM resep_obat WHERE id_resep_obat='$_GET[id_resep_obat]' ");

echo "<script> alert(' Data Resep Obat Berhasil Dihapus');</script>";
echo "<script>location='index.php?halaman=resep_obat';</script>";
?>