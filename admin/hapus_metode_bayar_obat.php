<?php
include ('koneksi.php');
$ambildata=$koneksi->query("SELECT * FROM metode_bayar_obat WHERE id_metode_bayar_obat='$_GET[id_metode_bayar_obat]'");
$pecah=$ambildata->fetch_assoc();

$koneksi->query("DELETE FROM metode_bayar_obat WHERE id_metode_bayar_obat='$_GET[id_metode_bayar_obat]' ");

echo "<script> alert(' Data metode_bayar_obat Berhasil Dihapus');</script>";
echo "<script>location='index.php?halaman=metode_bayar_obat';</script>";
?>