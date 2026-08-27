<?php
include ('koneksi.php');
$ambildata=$koneksi->query("SELECT * FROM kota WHERE id_kota='$_GET[id_kota]'");
$pecah=$ambildata->fetch_assoc();

$koneksi->query("DELETE FROM kota WHERE id_kota='$_GET[id_kota]' ");

echo "<script> alert(' Data kota Berhasil Dihapus');</script>";
echo "<script>location='index.php?halaman=kota';</script>";
?>