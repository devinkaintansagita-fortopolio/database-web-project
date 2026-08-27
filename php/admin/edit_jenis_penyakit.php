<?php
include('koneksi.php');

$ambildata = $koneksi->query("SELECT * FROM jenis_penyakit WHERE id_jenis_penyakit='$_GET[id_jenis_penyakit]'");
$pecah = $ambildata->fetch_assoc();
?>

<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <title>Edit Jenis Penyakit</title>
</head>

<body>

  <div class="container" style="margin-top: 20px">
    <div class="row">
      <div class="col-md-8 offset-md-2">
        <div class="card">
          <div class="card-header">
            EDIT JENIS PENYAKIT
          </div>
          <div class="card-body">
            <form method="post" enctype="multipart/form-data">

              <div class="form-group">
                <label> ID Jenis Penyakit </label>
                <input type="text" class="form-control" name="id_jenis_penyakit" value="<?php echo $pecah['id_jenis_penyakit']; ?>">
              </div>

              <div class="form-group">
                <label> Nama Jenis Penyakit </label>
                <input type="text" class="form-control" name="nama_jenis_penyakit" value="<?php echo $pecah['nama_jenis_penyakit']; ?>">
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
    $id_jenis_penyakit_to_update = $_POST['id_jenis_penyakit'];
    $ket_jenis_penyakit_to_update = $_POST['nama_jenis_penyakit'];

    // Perform the update query
    $koneksi->query("UPDATE jenis_penyakit SET
            id_jenis_penyakit='$id_jenis_penyakit_to_update',
            nama_jenis_penyakit='$ket_jenis_penyakit_to_update'
            WHERE id_jenis_penyakit='$_GET[id_jenis_penyakit]'");

    echo "<script> alert(' Data Jenis Penyakit Berhasil Diubah');</script>";
    echo "<script>location='index.php?halaman=jenis_penyakit';</script>";
  }
  ?>
</body>

</html>
