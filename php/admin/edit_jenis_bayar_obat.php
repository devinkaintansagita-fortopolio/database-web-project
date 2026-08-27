<?php
include('koneksi.php');

// Fetch the city data based on the provided ID
$ambildata = $koneksi->query("SELECT * FROM jenis_bayar_obat WHERE id_jenis_bayar_obat='$_GET[id_jenis_bayar_obat]'");
$pecah = $ambildata->fetch_assoc();
?>

<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <title>Edit Jenis Bayar Obat</title>
</head>

<body>

  <div class="container" style="margin-top: 20px">
    <div class="row">
      <div class="col-md-8 offset-md-2">
        <div class="card">
          <div class="card-header">
            EDIT JENIS BAYAR OBAT
          </div>
          <div class="card-body">
            <form method="post" enctype="multipart/form-data">

              <div class="form-group">
                <label> ID Jenis Bayar Obat </label>
                <input type="text" class="form-control" name="id_jenis_bayar_obat" value="<?php echo $pecah['id_jenis_bayar_obat']; ?>">
              </div>

              <div class="form-group">
                <label> Nama Jenis Bayar Obat </label>
                <input type="text" class="form-control" name="nama_jenis_bayar_obat" value="<?php echo $pecah['nama_jenis_bayar_obat']; ?>">
              </div>

              <div class="form-group">
                <label> Tujuan </label>
                <input type="text" class="form-control" name="tujuan" value="<?php echo $pecah['tujuan']; ?>">
              </div>

              <div class="form-group">
                <label> Nama Metode Bayar Obat </label>
                <select class="form-control" name="id_metode_bayar_obat">
                  <?php
                  // Fetch province data
                  $ambildata_metode_bayar_obat = $koneksi->query("SELECT * FROM metode_bayar_obat");
                  while ($pecah_metode_bayar_obat = $ambildata_metode_bayar_obat->fetch_assoc()) {
                    $selected = ($pecah_metode_bayar_obat['id_metode_bayar_obat'] == $pecah['id_metode_bayar_obat']) ? 'selected' : '';
                    echo "<option value='{$pecah_metode_bayar_obat['id_metode_bayar_obat']}' {$selected}>{$pecah_metode_bayar_obat['id_metode_bayar_obat']}--{$pecah_metode_bayar_obat['ket_metode_bayar_obat']}</option>";
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
    $id_jenis_bayar_obat_to_update = $_POST['id_jenis_bayar_obat'];
    $ket_jenis_bayar_obat_to_update = $_POST['nama_jenis_bayar_obat'];
    $tujuan_to_update = $_POST['tujuan_obat'];
    $id_metode_bayar_obat_to_update = $_POST['id_metode_bayar_obat'];

    // Perform the update query
    $koneksi->query("UPDATE jenis_bayar_obat SET
            id_jenis_bayar_obat='$id_jenis_bayar_obat_to_update',
            nama_jenis_bayar_obat='$ket_jenis_bayar_obat_to_update',
            tujuan='$tujuan',
            id_metode_bayar_obat='$id_metode_bayar_obat_to_update'
            WHERE id_jenis_bayar_obat='$_GET[id_jenis_bayar_obat]'");

    echo "<script> alert(' Data Jenis Bayar Obat Berhasil Diubah');</script>";
    echo "<script>location='index.php?halaman=jenis_bayar_obat';</script>";
  }
  ?>
</body>

</html>
