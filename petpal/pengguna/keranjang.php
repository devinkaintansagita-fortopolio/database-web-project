<?php
session_start();
$koneksi = new mysqli("localhost", "root", "", "petpal");

if (empty($_SESSION['keranjang']) OR !isset($_SESSION['keranjang'])) {
    echo "<script>alert('Produk kosong, silakan belanja terlebih dahulu');</script>";
    echo "<script>location='index.php?halaman=obat';</script>";
}

if (!isset($_SESSION['pengguna']))
{
    $_SESSION['cek'] = " ";
    echo "<script>alert('Anda harus login');</script>";
    echo "<script>location='login.php';</script>";
	exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<body>
    <?php include 'header.php' ?>

    <section class="konten">
        <div class="container">
            <div class="row text-center pt-5">
                <h1 class="h1"><strong>Keranjang Obat</strong></h1>
                <div class="table-wrap">
                    <table class="table">
                        <thead class="thead-purple">
                            <tr>
                                <th class="text-center" style="width: 5%;">No.</th>
                                <th class="text-center" style="width: 10%;">Nama Obat</th>
                                <th class="text-center" style="width: 10%;" v>Harga Obat</th>
                                <th class="text-center" style="width: 10%;">QTY</th>
                                <th class="text-center" style="width: 10%;">Ubah QTY</th>
                                <th class="text-center" style="width: 10%;">Total Harga</th>
                                <th class="text-center" style="width: 10%;">Edit</th>
                            </tr>
                        </thead>
                        <tbody class="tbody-purple">
                            <?php
                            $nomor = 1;
                            foreach ($_SESSION["keranjang"] as $id_obat => $QTY) : ?>
                                <?php
                                $ambilobat = $koneksi->query("SELECT * FROM obat  
                                WHERE id_obat = '$id_obat'");
                                $obat = $ambilobat->fetch_assoc();
                                $total_harga_obat = $obat['harga_obat'] * $QTY;
                                $nama_obat = $obat['nama_obat'];
                                ?>
                                <tr>
                                    <td><?php echo $nomor; ?></td>
                                    <td><?php echo $obat['nama_obat']; ?></td>
                                    <td>Rp<?php echo number_format($obat['harga_obat']); ?></td>
                                    <td><?php echo $QTY; ?></td>
                                    <td>
                                        <form method="post">
                                            <input type="hidden" name="id_obat" value="<?php echo $id_obat; ?>">
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <input type="number" class="form-control" name="QTY" value="<?php echo $QTY; ?>">
                                                    <br><br>
                                                    <button class="btn btn-purple" name="update_qty">Ubah</button>
                                                </div>
                                            </div>
                                        </form>
                                    </td>
                                    <td>Rp<?php echo number_format($total_harga_obat); ?></td>
                                    <td>
                                        <a href="hapus_keranjang.php?id_obat=<?php echo $id_obat; ?>" class="btn-purple btn"> Hapus </a>
                                    </td>
                                </tr>
                                <?php
                                $nomor++;
                            endforeach;
                            ?>
                        </tbody>
                    </table>
                    <a href="index.php?halaman=obat" class="btn btn-purple">Lanjutkan Belanja</a>
                    <a href="checkout.php"<?php echo $id_obat; ?>><button class="btn btn-purple" name="checkout">Checkout</button></a>
                </div>
            </div>
        </div>
    </section>

    <?php
    if (isset($_POST["update_qty"])) {
        $id_obat_update = $_POST["id_obat"];
        $new_qty = $_POST["QTY"];

        if (isset($_SESSION["keranjang"][$id_obat_update])) {
            $_SESSION["keranjang"][$id_obat_update] = $new_qty;
            echo "<script>alert('QTY berhasil diperbarui');</script>";
            echo "<script>location='keranjang.php';</script>";
        }
    }
    ?>

    <hr>

    <?php include 'footer.php' ?>
</body>

</html>
