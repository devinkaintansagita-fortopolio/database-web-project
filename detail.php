<?php include 'koneksi.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="path/to/your/styles.css">
    <title>Detail Dokter</title>
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
        <h2 class="m-0 font-weight-bold">Detail Dokter</h2>
    </div>
    <div class="card-body" style="background-color: #d2b4de; border-radius: 15px; padding: 20px;">

        <?php
        $id_dokter = $_GET['id_dokter'];
        $ambildata = mysqli_query($koneksi, "SELECT * FROM dokter 
            JOIN spesialis ON dokter.id_spesialis = spesialis.id_spesialis
            JOIN jenis_spesialis ON spesialis.id_jenis_spesialis = jenis_spesialis.id_jenis_spesialis
            WHERE dokter.id_dokter = '$id_dokter'");
        $No = 1;

        while ($db = $ambildata->fetch_assoc()) {
        ?>
        <div class="nota-container" style="background-color: #fff; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); padding: 20px; margin-bottom: 20px;">

            <div class="info-section" style="border: 1px solid #ccc; padding: 10px; text-align: left;">
                <h4>Informasi Dokter</h4>
                <p><strong>Nama Dokter:</strong> <?php echo isset($db['nama_dokter']) ? $db['nama_dokter'] : ''; ?></p>
                <p><strong>Spesialis:</strong> <?php echo isset($db['nama_spesialis']) ? $db['nama_spesialis'] : ''; ?></p>
                <p><strong>Jenis Spesialis:</strong> <?php echo isset($db['nama_jenis_spesialis']) ? $db['nama_jenis_spesialis'] : ''; ?></p>
                <h4><p><strong>Tarif:</strong> Rp.<?php echo isset($db['tarif_dokter']) ? $db['tarif_dokter'] : ''; ?></p></h4>
                <p><strong>Asal Instansi:</strong> <?php echo isset($db['asal_instansi_dokter']) ? $db['asal_instansi_dokter'] : ''; ?></p>
            </div>

            <div class="button-section" style="text-align: center; margin-top: 20px;">
                <a href="beranda.php?halaman=konsultasi" class="btn btn-purple" style="background-color: #8e44ad; color: white; padding: 10px 20px; border-radius: 5px; text-decoration: none;"> Kembali </a>
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
