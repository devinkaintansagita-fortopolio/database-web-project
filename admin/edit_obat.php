<?php
include('koneksi.php');

$ambildata = $koneksi->query("SELECT * FROM obat WHERE id_obat='$_GET[id_obat]'");
$pecah = $ambildata->fetch_assoc();
?>

<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <title>Edit Obat</title>
</head>

<body>

  <div class="container" style="margin-top: 20px">
    <div class="row">
      <div class="col-md-8 offset-md-2">
        <div class="card">
          <div class="card-header">
            EDIT OBAT
          </div>
          <div class="card-body">
            <form method="post" enctype="multipart/form-data">

            <div class="form-group">
                <label> ID Obat </label>
                <input type="text" class="form-control" name="id_obat" value="<?php echo $pecah['id_obat']; ?>">
            </div>

            <div class="form-group">
                <label> Nama Obat </label>
                <input type="text" class="form-control" name="nama_obat" value="<?php echo $pecah['nama_obat']; ?>">
            </div>

            <div class="form-group">
              <label> Nama Jenis Obat </label>
              <select class="form-control" name="id_jenis_obat">
              <?php
              $ambildata_jenis_obat = $koneksi->query("SELECT * FROM jenis_obat");
              while ($pecah_jenis_obat = $ambildata_jenis_obat->fetch_assoc()) {
              $selected = ($pecah_jenis_obat['id_jenis_obat'] == $pecah['id_jenis_obat']) ? 'selected' : '';
              echo "<option value='{$pecah_jenis_obat['id_jenis_obat']}' {$selected}>{$pecah_jenis_obat['id_jenis_obat']}--{$pecah_jenis_obat['nama_jenis_obat']}</option>";
              }
              ?>
            </select>

            <div class="form-group">
                <label> Harga Obat </label>
                <input type="text" class="form-control" name="harga_obat" value="<?php echo $pecah['harga_obat']; ?>">
            </div>

            <div class="form-group">
                <label> Aturan Pakai </label>
                <input type="text" class="form-control" name="aturan_pakai" value="<?php echo $pecah['aturan_pakai']; ?>">
            </div>

            <div class="form-group">
                <label> Efek Samping </label>
                <input type="text" class="form-control" name="efek_samping" value="<?php echo $pecah['efek_samping']; ?>">
              </div>

              <div class="form-group">
                <label> Dosis Obat </label>
                <input type="text" class="form-control" name="dosis" value="<?php echo $pecah['dosis']; ?>">
              </div>

              <div class="form-group">
					<i class="ace-icon fa fa-camera"></i>
					<input type="file" class="form-control" name="foto_obat"placeholder="Pilih Foto">
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
    $id_obat_to_update = $_POST['id_obat'];
    $nama_obat_to_update = $_POST['nama_obat'];
    $id_jenis_obat_to_update = $_POST['id_jenis_obat'];
    $harga_obat_to_update = $_POST['harga_obat'];
    $aturan_pakai_to_update = $_POST['aturan_pakai'];
    $efek_samping_to_update = $_POST['efek_samping'];
    $dosis_to_update = $_POST['dosis'];
    $foto_obat_to_update = $_POST['foto_obat'];

    $foto_obat_to_update = $_FILES['foto_obat']['name'];
    $tmp_file = $_FILES['foto_obat']['tmp_name'];
    $foto_obat_destination = "foto_obat/" . $foto_obat_to_update;
    
    move_uploaded_file($tmp_file, $foto_obat_destination);

    $koneksi->query("UPDATE obat SET
            id_obat='$id_obat_to_update',
            nama_obat='$nama_obat_to_update',
            id_jenis_obat='$id_jenis_obat_to_update',
            harga_obat='$harga_obat_to_update',
            aturan_pakai='$aturan_pakai_to_update',
            efek_samping='$efek_samping_to_update',
            dosis='$dosis_to_update',
            foto_obat='$foto_obat_to_update'
            WHERE id_obat='$_GET[id_obat]'");

    echo "<script> alert(' Data Obat Berhasil Diubah');</script>";
    echo "<script>location='index.php?halaman=obat';</script>";
  }
  ?>
</body>

</html>
