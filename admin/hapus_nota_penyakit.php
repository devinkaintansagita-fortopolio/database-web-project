<?php
include ('koneksi.php');
$ambildata=$koneksi->query("SELECT * FROM nota_penyakit WHERE id_nota_penyakit='$_GET[id_nota_penyakit]'");
$pecah=$ambildata->fetch_assoc();

$koneksi->query("DELETE FROM nota_penyakit WHERE id_nota_penyakit='$_GET[id_nota_penyakit]' ");

echo "<script> alert(' Data Nota penyakit Berhasil Dihapus');</script>";
echo "<script>location='index.php?halaman=nota_penyakit';</script>";
?>