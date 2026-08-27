<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <title>Tambah Apotek</title>
  </head>

  <body>

    <div class="container" style="margin-top: 20px">
      <div class="row">
        <div class="col-md-8 offset-md-2">
          <div class="card">
            <div class="card-header">
              TAMBAH APOTEK
            </div>
            <div class="card-body">
              <form method="post" enctype="multipart/form-data">

                    <div class="form-group">
                        <label> ID Apotek </label>
                        <input type="text" class="form-control" name="id_apotek" required>
                    </div>
                    
                    <div class="form-group">
                        <label> Nama Apotek </label>
                        <input type="text" class="form-control" name="nama_apotek" required>
                    </div>

                    <div class="form-group">
                        <label> Alamat Apotek </label>
                        <input type="text" class="form-control" name="alamat_apotek" required>
                    </div>

                    <div class="form-group">
						<i class="ace-icon fa fa-briefcase"></i>
							<select class="form-control" name="id_kota">
								<?php $ambildata=$koneksi->query("SELECT * FROM kota");?>
									<?php while($pecah=$ambildata->fetch_assoc()){?>
								    <option value="<?php echo $pecah['id_kota'] ?>" > <?php echo $pecah['id_kota'] ?>-<?php echo $pecah['nama_kota'] ?></option>
									<?php } ?>
							</select>
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
                    mysqli_query($koneksi,"INSERT INTO apotek(id_apotek, nama_apotek, alamat_apotek, id_kota) VALUES ('$_POST[id_apotek]','$_POST[nama_apotek]','$_POST[alamat_apotek]','$_POST[id_kota]')");
                    
                    echo "<div class='alert alert-info'> Data Berhasil Ditambahkan </div>";
                    echo "<meta http-equiv='refresh' content='1;url=index.php?halaman=apotek'>";
                    }
         ?>

  </body>
</html>
