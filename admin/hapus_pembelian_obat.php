<?php
include ('koneksi.php');
$ambildata=$koneksi->query("SELECT * FROM pembelian_obat WHERE id_pembelian_obat='$_GET[id_pembelian_obat]'");
$pecah=$ambildata->fetch_assoc();

$koneksi->query("DELETE FROM pembelian_obat WHERE id_pembelian_obat='$_GET[id_pembelian_obat]' ");

echo "<script> alert(' Data Pembelian Obat Berhasil Dihapus');</script>";
echo "<script>location='index.php?halaman=pembelian_obat';</script>";
?>