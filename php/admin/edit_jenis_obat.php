<?php
include('koneksi.php');

$ambildata = $koneksi->query("SELECT * FROM jenis_obat WHERE id_jenis_obat='$_GET[id_jenis_obat]'");
$pecah = $ambildata->fetch_assoc();
?>

<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <title>Edit Jenis Obat</title>
</head>

<body>

  <div class="container" style="margin-top: 20px">
    <div class="row">
      <div class="col-md-8 offset-md-2">
        <div class="card">
          <div class="card-header">
            EDIT JENIS OBAT
          </div>
          <div class="card-body">
            <form method="post" enctype="multipart/form-data">

              <div class="form-group">
                <label> ID Jenis Obat </label>
                <input type="text" class="form-control" name="id_jenis_obat" value="<?php echo $pecah['id_jenis_obat']; ?>">
              </div>

              <div class="form-group">
                <label> Nama Jenis Obat </label>
                <input type="text" class="form-control" name="nama_jenis_obat" value="<?php echo $pecah['nama_jenis_obat']; ?>">
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
    $id_jenis_obat_to_update = $_POST['id_jenis_obat'];
    $nama_jenis_obat_to_update = $_POST['nama_jenis_obat'];

    $koneksi->query("UPDATE jenis_obat SET
            id_jenis_obat='$id_jenis_obat_to_update',
            nama_jenis_obat='$nama_jenis_obat_to_update'
            WHERE id_jenis_obat='$_GET[id_jenis_obat]'");

    echo "<script> alert(' Data Jenis Obat Berhasil Diubah');</script>";
    echo "<script>location='index.php?halaman=jenis_obat';</script>";
  }
  ?>
</body>

</html>
