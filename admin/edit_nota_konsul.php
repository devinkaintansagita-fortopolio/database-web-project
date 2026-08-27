<?php
include('koneksi.php');

$ambildata = $koneksi->query("SELECT * FROM nota_konsul WHERE id_nota_konsul='$_GET[id_nota_konsul]'");
$pecah = $ambildata->fetch_assoc();
?>

<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <title>Edit Nota Konsultasi</title>
          <style>
          body {
                background-image: url('assets/images/hi.jpg'); 
                background-size: cover; 
                background-repeat: no-repeat; 
                background-attachment: fixed; 
                background-position: center center; 
                margin: 0;
            }

            .carousel-inner img {
                width: 100%;
                height: auto;
            }

            .wide-image {
                width: 100%;
            }
        </style>
</head>

<body>

  <div class="container" style="margin-top: 20px">
    <div class="row">
      <div class="col-md-8 offset-md-2">
        <div class="card">
          <div class="card-header">
            EDIT NOTA KONSULTASI
          </div>
          <div class="card-body">
            <form method="post" enctype="multipart/form-data">

              <div class="form-group">
                <label> Foto Bukti Bayar Konsultasi </label>
                <img src="../pembayaran/<?php echo $pecah['bukti_bayar_konsul']; ?>" class="wide-image" alt="Foto Bukti Bayar">
              </div>

              <div class="form-group">
                <label> Jenis Status Bayar Konsultasi </label>
                <select class="form-control" name="id_status_bayar_konsul">
                  <?php
                  $ambildata_status_bayar_konsul = $koneksi->query("SELECT * FROM status_bayar_konsul");
                  while ($pecah_status_bayar_konsul = $ambildata_status_bayar_konsul->fetch_assoc()) {
                    $selected = ($pecah_status_bayar_konsul['id_status_bayar_konsul'] == $pecah['id_status_bayar_konsul']) ? 'selected' : '';
                    echo "<option value='{$pecah_status_bayar_konsul['id_status_bayar_konsul']}' {$selected}>{$pecah_status_bayar_konsul['id_status_bayar_konsul']}--{$pecah_status_bayar_konsul['jenis_status_bayar_konsul']}</option>";
                  }
                  ?>
                </select>
              </div>

              <button class="btn btn-purple" name="ubah">Ubah </button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

  <?php
  if (isset($_POST['ubah'])) {
    $id_status_bayar_konsul_to_update = $_POST['id_status_bayar_konsul'];

    $koneksi->query("UPDATE nota_konsul SET
            id_status_bayar_konsul='$id_status_bayar_konsul_to_update'
            WHERE id_nota_konsul='$_GET[id_nota_konsul]'");

    echo "<script> alert(' Data Nota Konsul Berhasil Diubah');</script>";
    echo "<script>location='index.php?halaman=nota_konsul';</script>";
  }
  ?>
</body>

</html>
