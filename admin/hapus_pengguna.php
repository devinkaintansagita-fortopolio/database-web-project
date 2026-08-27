<?php
include ('koneksi.php');
$ambildata=$koneksi->query("SELECT * FROM pengguna WHERE id_pengguna='$_GET[id_pengguna]'");
$pecah=$ambildata->fetch_assoc();

$koneksi->query("DELETE FROM pengguna WHERE id_pengguna='$_GET[id_pengguna]' ");

echo "<script> alert(' Data Pengguna Berhasil Dihapus');</script>";
echo "<script>location='index.php?halaman=pengguna';</script>";
?>