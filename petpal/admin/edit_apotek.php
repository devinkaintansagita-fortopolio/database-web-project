<?php
include('koneksi.php');

// Fetch the city data based on the provided ID
$ambildata = $koneksi->query("SELECT * FROM apotek WHERE id_apotek='$_GET[id_apotek]'");
$pecah = $ambildata->fetch_assoc();
?>

<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <title>Edit Apotek</title>
</head>

<body>

  <div class="container" style="margin-top: 20px">
    <div class="row">
      <div class="col-md-8 offset-md-2">
        <div class="card">
          <div class="card-header">
            EDIT APOTEK
          </div>
          <div class="card-body">
            <form method="post" enctype="multipart/form-data">

              <div class="form-group">
                <label> ID Apotek </label>
                <input type="text" class="form-control" name="id_apotek" value="<?php echo $pecah['id_apotek']; ?>">
              </div>

              <div class="form-group">
                <label> Nama Apotek </label>
                <input type="text" class="form-control" name="nama_apotek" value="<?php echo $pecah['nama_apotek']; ?>">
              </div>

              <div class="form-group">
                <label> Alamat Apotek </label>
                <input type="text" class="form-control" name="alamat_apotek" value="<?php echo $pecah['alamat_apotek']; ?>">
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
    $id_apotek_to_update = $_POST['id_apotek'];
    $nama_apotek_to_update = $_POST['nama_apotek'];
    $alamat_apotek_to_update = $_POST['alamat_apotek'];
    $id_kota_to_update = $_POST['id_kota'];

    // Perform the update query
    $koneksi->query("UPDATE apotek SET
            id_apotek='$id_apotek_to_update',
            nama_apotek='$nama_apotek_to_update',
            alamat_apotek='$nama_apotek_to_update',
            id_kota='$id_kota_to_update'
            WHERE id_apotek='$_GET[id_apotek]'");

    echo "<script> alert(' Data apotek Berhasil Diubah');</script>";
    echo "<script>location='index.php?halaman=apotek';</script>";
  }
  ?>
</body>

</html>
