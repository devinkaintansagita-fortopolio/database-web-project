<?php
include ('koneksi.php');
$ambildata=$koneksi->query("SELECT * FROM setor_apotek WHERE id_setor_apotek='$_GET[id_setor_apotek]'");
$pecah=$ambildata->fetch_assoc();

$koneksi->query("DELETE FROM setor_apotek WHERE id_setor_apotek='$_GET[id_setor_apotek]' ");

echo "<script> alert(' Data setor_apotek Berhasil Dihapus');</script>";
echo "<script>location='index.php?halaman=setor_apotek';</script>";
?>