<?php
include ('koneksi.php');
$ambildata=$koneksi->query("SELECT * FROM apotek WHERE id_apotek='$_GET[id_apotek]'");
$pecah=$ambildata->fetch_assoc();

$koneksi->query("DELETE FROM apotek WHERE id_apotek='$_GET[id_apotek]' ");

echo "<script> alert(' Data Apotek Berhasil Dihapus');</script>";
echo "<script>location='index.php?halaman=apotek';</script>";
?>