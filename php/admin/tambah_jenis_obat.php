<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <title>Tambah Jenis Obat</title>
  </head>

  <body>

    <div class="container" style="margin-top: 20px">
      <div class="row">
        <div class="col-md-8 offset-md-2">
          <div class="card">
            <div class="card-header">
              TAMBAH JENIS OBAT
            </div>
            <div class="card-body">
              <form method="post" enctype="multipart/form-data">

                    <div class="form-group">
                    <label> ID Jenis Obat </label>
                    <input type="text" class="form-control" name="id_jenis_obat" required>
                    </div>
                    
                    <div class="form-group">
                        <label> Nama Jenis Obat </label>
                        <input type="text" class="form-control" name="nama_jenis_obat" required>
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
                    mysqli_query($koneksi,"INSERT INTO jenis_obat(id_jenis_obat, nama_jenis_obat) VALUES ('$_POST[id_jenis_obat]','$_POST[nama_jenis_obat]')");
                    
                    echo "<div class='alert alert-info'> Data Berhasil Ditambahkan </div>";
                    echo "<meta http-equiv='refresh' content='1;url=index.php?halaman=jenis_obat'>";
                    }
         ?>

  </body>
</html>
