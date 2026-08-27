<?php
session_start();
$koneksi=new mysqli("localhost","root","","petpal");

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PETPAL | WEBCONSULTING</title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/templatemo.css">
    <link rel="stylesheet" href="assets/css/custom.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;200;300;400;500;700;900&display=swap">
    <link rel="stylesheet" href="assets/css/fontawesome.min.css">
    <link rel="apple-touch-icon" href="assets/img/foto.png">
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/foto.png">
    <style>
        body {
            background-image: url('assets/images/hm1.jpg');
            background-size: cover;
            background-repeat: no-repeat;
            font-family: 'Roboto', sans-serif;
        }

        .container {
            background-color: white;
            border-radius: 15px;
            padding: 20px;
            margin-top: 50px;
        }

        h1, h2, h4 {
            color: black;
            font-family: 'Roboto', sans-serif;
        }

        marquee {
            padding: 10px;
            background-color: pink;
            color: white;
            font-size: 20px;
        }

        .btn-default {
            background-color: pink;
            color: white;
            border: 1px solid pink;
        }

        .btn-default:hover {
            background-color: white;
            color: pink;
            border: 1px solid pink;
        }
    </style>
</head>
<body>

<div class="container">
    <marquee><h1><b>Selamat Datang di Web Consulting Terbaik untuk Anda</b></h1></marquee>

    <div>
        <h2 class="text-center"><strong>- PETPAL -</strong></h2>
    </div>

    <section class="konten">
        <table class="table table-bordered text-center">
            <thead>
                <tr>
                    <th class="text-center"></th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>
                        <h4>
                            Tempat dengan pelayanan untuk konsultasi penyakit secara online.<br>
                            Bersama dengan dokter-dokter terbaik yang telah terverifikasi.
                        </h4>
                    </td>
                </tr>
            </tbody>
        </table>
        
        <div class="text-center">
            <a href="beranda.php" class="btn btn-default"><strong>Mulai</strong></a>
        </div>
    </section>
</div>

</body>
</html>
