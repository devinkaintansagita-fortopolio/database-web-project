<?php include 'koneksi.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="path/to/your/styles.css">
    <title>Detail obat</title>
    <style>
        body {
            background-image: url('assets/images/bg2.jpg');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            height: 100vh;
            margin: 0;
        }
    </style>
</head>
<body>

<div class="card" style="max-width: 400px; margin: 20px auto; border-radius: 15px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);">
    <div class="card-header" style="background-color: #8e44ad; border-top-left-radius: 15px; border-top-right-radius: 15px; color: white; text-align: center; padding: 10px;">
        <h2 class="m-0 font-weight-bold">Detail Obat</h2>
    </div>
    <div class="card-body" style="background-color: #d2b4de; border-radius: 15px; padding: 20px;">

        <?php
        $id_obat = $_GET['id_obat'];
        $ambildata = mysqli_query($koneksi, "SELECT * FROM obat JOIN jenis_obat ON obat.id_jenis_obat = jenis_obat.id_jenis_obat 
            WHERE obat.id_obat = '$id_obat'");
        $No = 1;

        while ($db = $ambildata->fetch_assoc()) {
        ?>
        <div class="nota-container" style="background-color: #fff; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); padding: 20px; margin-bottom: 20px;">

            <div class="info-section" style="border: 1px solid #ccc; padding: 10px; text-align: left;">
                <h4>Informasi Obat</h4>
                <p><strong>Nama Obat:</strong> <?php echo isset($db['nama_obat']) ? $db['nama_obat'] : ''; ?></p>
                <p><strong>Jenis Obat:</strong> <?php echo isset($db['id_jenis_obat']) ? $db['nama_jenis_obat'] : ''; ?></p>
                <h4><p><strong>Harga:</strong> Rp.<?php echo isset($db['harga_obat']) ? $db['harga_obat'] : ''; ?></p></h4>
                <p><strong>Aturan Pakai:</strong> <?php echo isset($db['aturan_pakai']) ? $db['aturan_pakai'] : ''; ?></p>
                <p><strong>Dosis:</strong> <?php echo isset($db['dosis']) ? $db['dosis'] : ''; ?></p>
                <p><strong>Efek Samping:</strong> <?php echo isset($db['efek_samping']) ? $db['efek_samping'] : ''; ?></p>
            </div>

            <div class="button-section" style="text-align: center; margin-top: 20px;">
                <a href="beranda.php?halaman=obat" class="btn btn-purple" style="background-color: #8e44ad; color: white; padding: 10px 20px; border-radius: 5px; text-decoration: none;"> Kembali </a>
            </div>
            <hr>

        </div>
        <?php
        $No++;
        }
        ?>
    </div>
</div>

</body>
</html>
