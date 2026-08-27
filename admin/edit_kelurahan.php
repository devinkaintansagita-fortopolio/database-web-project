<?php
include('koneksi.php');

// Fetch the city data based on the provided ID
$ambildata = $koneksi->query("SELECT * FROM kelurahan WHERE id_kelurahan='$_GET[id_kelurahan]'");
$pecah = $ambildata->fetch_assoc();
?>

<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <title>Edit Kelurahan</title>
</head>

<body>

  <div class="container" style="margin-top: 20px">
    <div class="row">
      <div class="col-md-8 offset-md-2">
        <div class="card">
          <div class="card-header">
            EDIT KELURAHAN
          </div>
          <div class="card-body">
            <form method="post" enctype="multipart/form-data">

              <div class="form-group">
                <label> ID Kelurahan </label>
                <input type="text" class="form-control" name="id_kelurahan" value="<?php echo $pecah['id_kelurahan']; ?>">
              </div>

              <div class="form-group">
                <label> Nama Kelurahan </label>
                <input type="text" class="form-control" name="nama_kelurahan" value="<?php echo $pecah['nama_kelurahan']; ?>">
              </div>

              <div class="form-group">
                <label> Nama kelurahan </label>
                <select class="form-control" name="id_kecamatan">
                  <?php
                  // Fetch province data
                  $ambildata_kecamatan = $koneksi->query("SELECT * FROM kecamatan");
                  while ($pecah_kecamatan = $ambildata_kecamatan->fetch_assoc()) {
                    $selected = ($pecah_kecamatan['id_kecamatan'] == $pecah['id_kecamatan']) ? 'selected' : '';
                    echo "<option value='{$pecah_kecamatan['id_kecamatan']}' {$selected}>{$pecah_kecamatan['id_kecamatan']}--{$pecah_kecamatan['nama_kecamatan']}</option>";
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
    $id_kelurahan_to_update = $_POST['id_kelurahan'];
    $nama_kelurahan_to_update = $_POST['nama_kelurahan'];
    $id_kecamatan_to_update = $_POST['id_kecamatan'];

    // Perform the update query
    $koneksi->query("UPDATE kelurahan SET
            id_kelurahan='$id_kelurahan_to_update',
            nama_kelurahan='$nama_kelurahan_to_update',
            id_kecamatan='$id_kecamatan_to_update'
            WHERE id_kelurahan='$_GET[id_kelurahan]'");

    echo "<script> alert(' Data kelurahan Berhasil Diubah');</script>";
    echo "<script>location='index.php?halaman=kelurahan';</script>";
  }
  ?>
</body>

</html>
