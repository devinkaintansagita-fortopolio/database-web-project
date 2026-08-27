<?php
include('koneksi.php');

$ambildata = $koneksi->query("SELECT * FROM hewan WHERE id_hewan='$_GET[id_hewan]'");
$pecah = $ambildata->fetch_assoc();
?>

<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <title>Edit Hewan</title>
</head>

<body>

  <div class="container" style="margin-top: 20px">
    <div class="row">
      <div class="col-md-8 offset-md-2">
        <div class="card">
          <div class="card-header">
            EDIT HEWAN
          </div>
          <div class="card-body">
            <form method="post" enctype="multipart/form-data">

              <div class="form-group">
                <label> ID Hewan </label>
                <input type="text" class="form-control" name="id_hewan" value="<?php echo $pecah['id_hewan']; ?>">
              </div>

              <div class="form-group">
                <label> Nama Hewan </label>
                <input type="text" class="form-control" name="nama_hewan" value="<?php echo $pecah['nama_hewan']; ?>">
              </div>

              <div class="form-group">
                <label> Umur Hewan </label>
                <input type="text" class="form-control" name="umur_hewan" value="<?php echo $pecah['umur_hewan']; ?>">
              </div>

              <div class="form-group">
                <label> Ras Hewan </label>
                <input type="text" class="form-control" name="ras_hewan" value="<?php echo $pecah['ras_hewan']; ?>">
              </div>

              <div class="form-group">
                <label> Jenis Hewan </label>
                <input type="text" class="form-control" name="jenis_hewan" value="<?php echo $pecah['jenis_hewan']; ?>">
              </div>

              <div class="form-group">
                <label> Nama Pengguna </label>
                <select class="form-control" name="id_pengguna">
                  <?php
                  // Fetch province data
                  $ambildata_pengguna = $koneksi->query("SELECT * FROM pengguna");
                  while ($pecah_pengguna = $ambildata_pengguna->fetch_assoc()) {
                    $selected = ($pecah_pengguna['id_pengguna'] == $pecah['id_pengguna']) ? 'selected' : '';
                    echo "<option value='{$pecah_pengguna['id_pengguna']}' {$selected}>{$pecah_pengguna['id_pengguna']}--{$pecah_pengguna['nama_pengguna']}</option>";
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
    $id_hewan_to_update = $_POST['id_hewan'];
    $nama_hewan_to_update = $_POST['nama_hewan'];
    $umur_hewan_to_update = $_POST['umur_hewan'];
    $ras_hewan_to_update = $_POST['ras_hewan'];
    $jenis_hewan_to_update = $_POST['jenis_hewan'];
    $id_pengguna_to_update = $_POST['id_pengguna'];

    $koneksi->query("UPDATE Hewan SET
            id_hewan='$id_hewan_to_update',
            nama_hewan='$nama_hewan_to_update',
            umur_hewan='$umur_hewan_to_update',
            ras_hewan='$ras_hewan_to_update',
            jenis_hewan='$jenis_hewan_to_update',
            id_pengguna='$id_pengguna_to_update'
            WHERE id_hewan='$_GET[id_hewan]'");

    echo "<script> alert(' Data Hewan Berhasil Diubah');</script>";
    echo "<script>location='index.php?halaman=Hewan';</script>";
  }
  ?>
</body>

</html>
