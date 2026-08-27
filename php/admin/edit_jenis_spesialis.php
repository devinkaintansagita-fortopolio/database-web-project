<?php
include('koneksi.php');

$ambildata = $koneksi->query("SELECT * FROM jenis_spesialis WHERE id_jenis_spesialis='$_GET[id_jenis_spesialis]'");
$pecah = $ambildata->fetch_assoc();
?>

<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <title>Edit Jenis Spesialis</title>
</head>

<body>

  <div class="container" style="margin-top: 20px">
    <div class="row">
      <div class="col-md-8 offset-md-2">
        <div class="card">
          <div class="card-header">
            EDIT JENIS SPESIALIS
          </div>
          <div class="card-body">
            <form method="post" enctype="multipart/form-data">

              <div class="form-group">
                <label> ID Jenis Spesialis </label>
                <input type="text" class="form-control" name="id_jenis_spesialis" value="<?php echo $pecah['id_jenis_spesialis']; ?>">
              </div>

              <div class="form-group">
                <label> Nama Jenis Spesialis </label>
                <input type="text" class="form-control" name="nama_jenis_spesialis" value="<?php echo $pecah['nama_jenis_spesialis']; ?>">
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
    $id_jenis_spesialis_to_update = $_POST['id_jenis_spesialis'];
    $nama_jenis_spesialis_to_update = $_POST['nama_jenis_spesialis'];

    $koneksi->query("UPDATE jenis_spesialis SET
            id_jenis_spesialis='$id_jenis_spesialis_to_update',
            nama_jenis_spesialis='$nama_jenis_spesialis_to_update'
            WHERE id_jenis_spesialis='$_GET[id_jenis_spesialis]'");

    echo "<script> alert(' Data Jenis Spesialis Berhasil Diubah');</script>";
    echo "<script>location='index.php?halaman=jenis_spesialis';</script>";
  }
  ?>
</body>

</html>
