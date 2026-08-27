<?php
include ('koneksi.php');
$ambildata=$koneksi->query("SELECT * FROM nota_konsul WHERE id_nota_konsul='$_GET[id_nota_konsul]'");
$pecah=$ambildata->fetch_assoc();

$koneksi->query("DELETE FROM nota_konsul WHERE id_nota_konsul='$_GET[id_nota_konsul]' ");

echo "<script> alert(' Data Nota Konsul Berhasil Dihapus');</script>";
echo "<script>location='index.php?halaman=nota_konsul';</script>";
?>