<?php
include ('koneksi.php');
$ambildata=$koneksi->query("SELECT * FROM spesialis WHERE id_spesialis='$_GET[id_spesialis]'");
$pecah=$ambildata->fetch_assoc ();
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <title>Edit Spesialis</title>
  </head>

  <body>

    <div class="container" style="margin-top: 20px">
      <div class="row">
        <div class="col-md-8 offset-md-2">
          <div class="card">
            <div class="card-header">
              EDIT SPESIALIS
            </div>
            <div class="card-body">
              <form method="post" enctype="multipart/form-data">

                    <div class="form-group">
                    <label> ID Spesialis </label>
                    <input type="text" class="form-control" name="id_spesialis">
                    </div>

                    <div class="form-group">
                    <label> Nama Spesialis </label>
                    <input type="text" class="form-control" name="nama_spesialis">
                    </div>

                    <div class="form-group">
                    <label> Nama Jenis Spesialis </label>
                    <select class="form-control" name="id_jenis_spesialis">
                    <?php
                    $ambildata_jenis_spesialis = $koneksi->query("SELECT * FROM jenis_spesialis");
                    while ($pecah_jenis_spesialis = $ambildata_jenis_spesialis->fetch_assoc()) {
                    $selected = ($pecah_jenis_spesialis['id_jenis_spesialis'] == $pecah['id_jenis_spesialis']) ? 'selected' : '';
                    echo "<option value='{$pecah_jenis_spesialis['id_jenis_spesialis']}' {$selected}>{$pecah_jenis_spesialis['id_jenis_spesialis']}--{$pecah_jenis_spesialis['nama_jenis_spesialis']}</option>";
                    }
                    ?>
                  </select>
              </div>


        <button class="btn btn-blue" name="ubah">Ubah </button>
      </form>
      </div>
          </div>
        </div>
      </div>
    </div>
    <?php
    if(isset($_POST['ubah']))
    {
    $id_spesialis_to_update = $_POST['id_spesialis'];
    $nama_spesialis_to_update = $_POST['nama_spesialis'];
    $id_jenis_spesialis_to_update = $_POST['id_jenis_spesialis'];

    $koneksi->query("UPDATE spesialis SET
    id_spesialis='$id_spesialis_to_update',
    nama_spesialis='$nama_spesialis_to_update',
    id_jenis_spesialis='$id_jenis_spesialis_to_update'
    WHERE id_spesialis='$_GET[id_spesialis]'");
          
          echo "<script> alert(' Data Spesialis Berhasil Diubah');</script>";
          echo "<script>location='index.php?halaman=spesialis';</script>";
    }
   ?>
   </body>
</html>