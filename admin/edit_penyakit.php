<?php
include('koneksi.php');

$ambildata = $koneksi->query("SELECT * FROM penyakit WHERE id_penyakit='$_GET[id_penyakit]'");
$pecah = $ambildata->fetch_assoc();
?>

<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <title>Edit Penyakit</title>
</head>

<body>

  <div class="container" style="margin-top: 20px">
    <div class="row">
      <div class="col-md-8 offset-md-2">
        <div class="card">
          <div class="card-header">
            EDIT PENYAKIT
          </div>
          <div class="card-body">
            <form method="post" enctype="multipart/form-data">

              <div class="form-group">
                <label> ID Penyakit </label>
                <input type="text" class="form-control" name="id_penyakit" value="<?php echo $pecah['id_penyakit']; ?>">
              </div>

              <div class="form-group">
                <label> Nama Penyakit </label>
                <input type="text" class="form-control" name="nama_penyakit" value="<?php echo $pecah['nama_penyakit']; ?>">
              </div>

              <div class="form-group">
                <label> Keterangan Penyakit </label>
                <input type="text" class="form-control" name="ket_penyakit" value="<?php echo $pecah['ket_penyakit']; ?>">
              </div>

              <div class="form-group">
                <label> Gejala </label>
                <input type="text" class="form-control" name="gejala" value="<?php echo $pecah['gejala']; ?>">
              </div>

              <div class="form-group">
                <label> Nama Spesialis </label>
                <select class="form-control" name="id_spesialis">
                  <?php
                  $ambildata_spesialis = $koneksi->query("SELECT * FROM spesialis");
                  while ($pecah_spesialis = $ambildata_spesialis->fetch_assoc()) {
                    $selected = ($pecah_spesialis['id_spesialis'] == $pecah['id_spesialis']) ? 'selected' : '';
                    echo "<option value='{$pecah_spesialis['id_spesialis']}' {$selected}>{$pecah_spesialis['id_spesialis']}--{$pecah_spesialis['nama_spesialis']}</option>";
                  }
                  ?>
                </select>
              </div>

              <div class="form-group">
                <label> Nama Jenis Penyakit </label>
                <select class="form-control" name="id_jenis_penyakit">
                  <?php
                  $ambildata_jenis_penyakit = $koneksi->query("SELECT * FROM jenis_penyakit");
                  while ($pecah_jenis_penyakit = $ambildata_jenis_penyakit->fetch_assoc()) {
                    $selected = ($pecah_jenis_penyakit['id_jenis_penyakit'] == $pecah['id_jenis_penyakit']) ? 'selected' : '';
                    echo "<option value='{$pecah_jenis_penyakit['id_jenis_penyakit']}' {$selected}>{$pecah_jenis_penyakit['id_jenis_penyakit']}--{$pecah_jenis_penyakit['nama_jenis_penyakit']}</option>";
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
    $id_penyakit_to_update = $_POST['id_penyakit'];
    $nama_penyakit_to_update = $_POST['nama_penyakit'];
    $ket_penyakit_to_update = $_POST['ket_penyakit'];
    $gejala_to_update = $_POST['gejala'];
    $id_spesialis_to_update = $_POST['id_spesialis'];

    $koneksi->query("UPDATE penyakit SET
            id_penyakit='$id_penyakit_to_update',
            nama_penyakit='$nama_penyakit_to_update',
            ket_penyakit='$ket_penyakit_to_update',
            gejala='$gejala_to_update',
            id_spesialis='$id_spesialis_to_update'
            WHERE id_penyakit='$_GET[id_penyakit]'");

    echo "<script> alert(' Data Penyakit Berhasil Diubah');</script>";
    echo "<script>location='index.php?halaman=penyakit';</script>";
  }
  ?>
</body>

</html>
