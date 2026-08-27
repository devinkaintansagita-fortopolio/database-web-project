<?php
include('koneksi.php');

// Fetch the city data based on the provided ID
$ambildata = $koneksi->query("SELECT * FROM jenis_bayar_konsul WHERE id_jenis_bayar_konsul='$_GET[id_jenis_bayar_konsul]'");
$pecah = $ambildata->fetch_assoc();
?>

<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <title>Edit Jenis Bayar Konsultasi</title>
</head>

<body>

  <div class="container" style="margin-top: 20px">
    <div class="row">
      <div class="col-md-8 offset-md-2">
        <div class="card">
          <div class="card-header">
            EDIT JENIS BAYAR KONSULTASI
          </div>
          <div class="card-body">
            <form method="post" enctype="multipart/form-data">

              <div class="form-group">
                <label> ID Jenis Bayar Konsultasi </label>
                <input type="text" class="form-control" name="id_jenis_bayar_konsul" value="<?php echo $pecah['id_jenis_bayar_konsul']; ?>">
              </div>

              <div class="form-group">
                <label> Keterangan Jenis Bayar Konsultasi </label>
                <input type="text" class="form-control" name="ket_jenis_bayar_konsul" value="<?php echo $pecah['nama_jenis_bayar_konsul']; ?>">
              </div>

              <div class="form-group">
                <label> Tujuan </label>
                <input type="text" class="form-control" name="tujuan" value="<?php echo $pecah['tujuan']; ?>">
              </div>

              <div class="form-group">
                <label> Nama Metode Bayar Konsultasi </label>
                <select class="form-control" name="id_metode_bayar_konsul">
                  <?php
                  // Fetch province data
                  $ambildata_metode_bayar_konsul = $koneksi->query("SELECT * FROM metode_bayar_konsul");
                  while ($pecah_metode_bayar_konsul = $ambildata_metode_bayar_konsul->fetch_assoc()) {
                    $selected = ($pecah_metode_bayar_konsul['id_metode_bayar_konsul'] == $pecah['id_metode_bayar_konsul']) ? 'selected' : '';
                    echo "<option value='{$pecah_metode_bayar_konsul['id_metode_bayar_konsul']}' {$selected}>{$pecah_metode_bayar_konsul['id_metode_bayar_konsul']}--{$pecah_metode_bayar_konsul['ket_metode_bayar_konsul']}</option>";
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
    $id_jenis_bayar_konsul_to_update = $_POST['id_jenis_bayar_konsul'];
    $ket_jenis_bayar_konsul_to_update = $_POST['ket_jenis_bayar_konsul'];
    $tujuan_to_update = $_POST['tujuan'];
    $id_metode_bayar_konsul_to_update = $_POST['id_metode_bayar_konsul'];

    // Perform the update query
    $koneksi->query("UPDATE jenis_bayar_konsul SET
            id_jenis_bayar_konsul='$id_jenis_bayar_konsul_to_update',
            ket_jenis_bayar_konsul='$ket_jenis_bayar_konsul_to_update',
            tujuan='$tujuan_to_update',
            id_metode_bayar_konsul='$id_metode_bayar_konsul_to_update'
            WHERE id_jenis_bayar_konsul='$_GET[id_jenis_bayar_konsul]'");

    echo "<script> alert(' Data jenis_bayar_konsul Berhasil Diubah');</script>";
    echo "<script>location='index.php?halaman=jenis_bayar_konsul';</script>";
  }
  ?>
</body>

</html>
