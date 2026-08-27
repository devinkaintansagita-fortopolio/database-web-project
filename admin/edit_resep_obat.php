<?php
include('koneksi.php');

$ambildata = $koneksi->query("SELECT * FROM resep_obat WHERE id_resep_obat='$_GET[id_resep_obat]'");
$pecah = $ambildata->fetch_assoc();
?>

<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <title>Edit Resep Obat</title>
</head>

<body>

  <div class="container" style="margin-top: 20px">
    <div class="row">
      <div class="col-md-8 offset-md-2">
        <div class="card">
          <div class="card-header">
            EDIT RESEP OBAT
          </div>
          <div class="card-body">
            <form method="post" enctype="multipart/form-data">

              <div class="form-group">
                <label> Foto Bukti Bayar Obat </label>
                <img src="../pembayaran/<?php echo $pecah['bukti_bayar_obat']; ?>" class="wide-image" alt="Foto Bukti Bayar">
              </div>

              <div class="form-group">
                <label> Jenis Status Bayar Obat </label>
                <select class="form-control" name="id_status_bayar_obat">
                  <?php
                  $ambildata_status_bayar_obat = $koneksi->query("SELECT * FROM status_bayar_obat");
                  while ($pecah_status_bayar_obat = $ambildata_status_bayar_obat->fetch_assoc()) {
                    $selected = ($pecah_status_bayar_obat['id_status_bayar_obat'] == $pecah['id_status_bayar_obat']) ? 'selected' : '';
                    echo "<option value='{$pecah_status_bayar_obat['id_status_bayar_obat']}' {$selected}>{$pecah_status_bayar_obat['id_status_bayar_obat']}--{$pecah_status_bayar_obat['jenis_status_bayar_obat']}</option>";
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
    $id_status_bayar_obat_to_update = $_POST['id_status_bayar_obat'];

    $koneksi->query("UPDATE resep_obat SET
            id_status_bayar_obat='$id_status_bayar_obat_to_update'
            WHERE id_resep_obat='$_GET[id_resep_obat]'");

    echo "<script> alert(' Data Resep Obat Berhasil Diubah');</script>";
    echo "<script>location='index.php?halaman=resep_obat';</script>";
  }
  ?>
</body>

</html>
