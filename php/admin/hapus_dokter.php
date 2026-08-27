<?php
include ('koneksi.php');
$ambildata=$koneksi->query("SELECT * FROM dokter WHERE id_dokter='$_GET[id_dokter]'");
$pecah=$ambildata->fetch_assoc();

$koneksi->query("DELETE FROM dokter WHERE id_dokter='$_GET[id_dokter]' ");

echo "<script> alert(' Data Dokter Berhasil Dihapus');</script>";
echo "<script>location='index.php?halaman=dokter';</script>";
?>