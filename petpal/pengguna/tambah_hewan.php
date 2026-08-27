<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <title>Tambah Hewan</title>
  </head>

  <body>

    <div class="container" style="margin-top: 20px">
      <div class="row">
        <div class="col-md-8 offset-md-2">
          <div class="card">
            <div class="card-header">
              TAMBAH Hewan
            </div>
            <div class="card-body">
              <form method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label> ID Hewan </label>
                        <input type="text" class="form-control" name="id_hewan" required>
                    </div>
                    
                    <div class="form-group">
                        <label> Nama Hewan </label>
                        <input type="text" class="form-control" name="nama_hewan" required>
                    </div>

                    <div class="form-group">
                        <label> Umur Hewan </label>
                        <input type="text" class="form-control" name="umur_hewan" required>
                    </div>

                    <div class="form-group">
                        <label> Jenis Hewan </label>
                        <input type="text" class="form-control" name="jenis_hewan" required>
                    </div>

                    <div class="form-group">
                        <label> Ras Hewan </label>
                        <input type="text" class="form-control" name="ras_hewan" required>
                    </div>

                    <div class="form-group">
                      <input type="hidden" class="form-control" name="id_pengguna" value="<?php echo $_SESSION['pengguna']['id_pengguna']; ?>" required>
                    </div>
                  <button class="btn btn-purple" name="save"> SIMPAN </button>
                <button type="reset" class="btn btn-purple">RESET</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
    <?php
      include "koneksi.php";
      if(isset($_POST['save'])){
        $id_pengguna = $_SESSION['pengguna']['id_pengguna'];
        mysqli_query($koneksi,"INSERT INTO hewan(id_hewan, nama_hewan, umur_hewan, jenis_hewan, ras_hewan, id_pengguna) VALUES ('$_POST[id_hewan]','$_POST[nama_hewan]','$_POST[umur_hewan]', '$_POST[jenis_hewan]', '$_POST[ras_hewan]', '$id_pengguna')");
        if(isset($_SESSION['konsul']) )
        {
            $id_dokter = $_SESSION['konsul'];
            echo "<script>alert('Lanjutkan Konsultasi');</script>";
            echo "<script>location='konsultasi.php?id_dokter=$id_dokter';</script>";
            
        }
        echo "<div class='alert alert-info'> Data Berhasil Ditambahkan </div>";
        echo "<meta http-equiv='refresh' content='1;url=index.php?halaman=hewan'>";
    }
    ?>
  </body>
</html>
