<?php
session_start();
$id_obat = $_GET['id_obat'];

if(isset($_SESSION['keranjang'][$id_obat]))
{
	$_SESSION['keranjang'][$id_obat]+=1;
}
else
{
	$_SESSION['keranjang'][$id_obat]=1;
}

echo "<script>alert('YEAY. Produk ditambahkan ke keranjang belanja.');</script>";
echo "<script>location='keranjang.php';</script>";
?>