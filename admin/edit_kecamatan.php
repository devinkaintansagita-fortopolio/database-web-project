<?php
include('koneksi.php');

// Fetch the city data based on the provided ID
$ambildata = $koneksi->query("SELECT * FROM kecamatan WHERE id_kecamatan='$_GET[id_kecamatan]'");
$pecah = $ambildata->fetch_assoc();
?>

<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <title>Edit Kecamatan</title>
</head>

<body>

  <div class="container" style="margin-top: 20px">
    <div class="row">
      <div class="col-md-8 offset-md-2">
        <div class="card">
          <div class="card-header">
            EDIT KECAMATAN
          </div>
          <div class="card-body">
            <form method="post" enctype="multipart/form-data">

              <div class="form-group">
                <label> ID Kecamatan </label>
                <input type="text" class="form-control" name="id_kecamatan" value="<?php echo $pecah['id_kecamatan']; ?>">
              </div>

              <div class="form-group">
                <label> Nama Kecamatan </label>
                <input type="text" class="form-control" name="nama_kecamatan" value="<?php echo $pecah['nama_kecamatan']; ?>">
              </div>

              <div class="form-group">
                <label> Nama Kota </label>
                <select class="form-control" name="id_kota">
                  <?php
                  // Fetch province data
                  $ambildata_kota = $koneksi->query("SELECT * FROM kota");
                  while ($pecah_kota = $ambildata_kota->fetch_assoc()) {
                    $selected = ($pecah_kota['id_kota'] == $pecah['id_kota']) ? 'selected' : '';
                    echo "<option value='{$pecah_kota['id_kota']}' {$selected}>{$pecah_kota['id_kota']}--{$pecah_kota['nama_kota']}</option>";
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
    $id_kecamatan_to_update = $_POST['id_kecamatan'];
    $nama_kecamatan_to_update = $_POST['nama_kecamatan'];
    $id_kota_to_update = $_POST['id_kota'];

    // Perform the update query
    $koneksi->query("UPDATE kecamatan SET
            id_kecamatan='$id_kecamatan_to_update',
            nama_kecamatan='$nama_kecamatan_to_update',
            id_kota='$id_kota_to_update'
            WHERE id_kecamatan='$_GET[id_kecamatan]'");

    echo "<script> alert(' Data kecamatan Berhasil Diubah');</script>";
    echo "<script>location='index.php?halaman=kecamatan';</script>";
  }
  ?>
</body>

</html>
