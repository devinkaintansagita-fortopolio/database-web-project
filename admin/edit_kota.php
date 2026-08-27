<?php
include('koneksi.php');

// Fetch the city data based on the provided ID
$ambildata = $koneksi->query("SELECT * FROM kota WHERE id_kota='$_GET[id_kota]'");
$pecah = $ambildata->fetch_assoc();
?>

<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <title>Edit Kota</title>
</head>

<body>

  <div class="container" style="margin-top: 20px">
    <div class="row">
      <div class="col-md-8 offset-md-2">
        <div class="card">
          <div class="card-header">
            EDIT KOTA/KABUPATEN
          </div>
          <div class="card-body">
            <form method="post" enctype="multipart/form-data">

              <div class="form-group">
                <label> ID Kota/Kabupaten </label>
                <input type="text" class="form-control" name="id_kota" value="<?php echo $pecah['id_kota']; ?>">
              </div>

              <div class="form-group">
                <label> Nama Kota/Kabupaten </label>
                <input type="text" class="form-control" name="nama_kota" value="<?php echo $pecah['nama_kota']; ?>">
              </div>

              <div class="form-group">
                <label> Nama Provinsi </label>
                <select class="form-control" name="id_provinsi">
                  <?php
                  // Fetch province data
                  $ambildata_provinsi = $koneksi->query("SELECT * FROM provinsi");
                  while ($pecah_provinsi = $ambildata_provinsi->fetch_assoc()) {
                    $selected = ($pecah_provinsi['id_provinsi'] == $pecah['id_provinsi']) ? 'selected' : '';
                    echo "<option value='{$pecah_provinsi['id_provinsi']}' {$selected}>{$pecah_provinsi['id_provinsi']}--{$pecah_provinsi['nama_provinsi']}</option>";
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
    $id_kota_to_update = $_POST['id_kota'];
    $nama_kota_to_update = $_POST['nama_kota'];
    $id_provinsi_to_update = $_POST['id_provinsi'];

    // Perform the update query
    $koneksi->query("UPDATE kota SET
            id_kota='$id_kota_to_update',
            nama_kota='$nama_kota_to_update',
            id_provinsi='$id_provinsi_to_update'
            WHERE id_kota='$_GET[id_kota]'");

    echo "<script> alert(' Data kota Berhasil Diubah');</script>";
    echo "<script>location='index.php?halaman=kota';</script>";
  }
  ?>
</body>

</html>
