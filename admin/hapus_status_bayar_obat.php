<?php
include ('koneksi.php');
$ambildata=$koneksi->query("SELECT * FROM status_bayar_obat WHERE id_status_bayar_obat='$_GET[id_status_bayar_obat]'");
$pecah=$ambildata->fetch_assoc();

$koneksi->query("DELETE FROM status_bayar_obat WHERE id_status_bayar_obat='$_GET[id_status_bayar_obat]' ");

echo "<script> alert(' Data Jenis Status Bayar Obat Berhasil Dihapus');</script>";
echo "<script>location='indexadmin.php?halaman=status_bayar_obat';</script>";
?>