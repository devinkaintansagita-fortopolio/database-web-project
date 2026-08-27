<?php
include ('koneksi.php');
$ambildata=$koneksi->query("SELECT * FROM provinsi WHERE id_provinsi='$_GET[id_provinsi]'");
$pecah=$ambildata->fetch_assoc();

$koneksi->query("DELETE FROM provinsi WHERE id_provinsi='$_GET[id_provinsi]' ");

echo "<script> alert(' Data Provinsi Berhasil Dihapus');</script>";
echo "<script>location='index.php?halaman=provinsi';</script>";
?>