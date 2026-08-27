<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <title>Tambah Jenis Bayar Konsultasi</title>
  </head>

  <body>

    <div class="container" style="margin-top: 20px">
      <div class="row">
        <div class="col-md-8 offset-md-2">
          <div class="card">
            <div class="card-header">
              TAMBAH JENIS BAYAR KONSULTASI
            </div>
            <div class="card-body">
              <form method="post" enctype="multipart/form-data">

                    <div class="form-group">
                        <label> ID Jenis Bayar Konsultasi </label>
                        <input type="text" class="form-control" name="id_jenis_bayar_konsul" required>
                    </div>
                    
                    <div class="form-group">
                        <label> Keterangan Jenis Bayar Konsultasi </label>
                        <input type="text" class="form-control" name="ket_jenis_bayar_konsul" required>
                    </div>

                    <div class="form-group">
                        <label> Tujuan </label>
                        <input type="text" class="form-control" name="tujuan" required>
                    </div>

                    <div class="form-group">
						          <i class="ace-icon fa fa-briefcase"></i>
                      <select class="form-control" name="id_metode_bayar_konsul">
                        <?php $ambildata=$koneksi->query("SELECT * FROM metode_bayar_konsul");?>
                          <?php while($pecah=$ambildata->fetch_assoc()){?>
                            <option value="<?php echo $pecah['id_metode_bayar_konsul'] ?>" > <?php echo $pecah['id_metode_bayar_konsul'] ?>-<?php echo $pecah['ket_metode_bayar_konsul'] ?></option>
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
                    mysqli_query($koneksi,"INSERT INTO jenis_bayar_konsul(id_jenis_bayar_konsul, ket_jenis_bayar_konsul, id_metode_bayar_konsul, tujuan) VALUES ('$_POST[id_jenis_bayar_konsul]','$_POST[ket_jenis_bayar_konsul]','$_POST[id_metode_bayar_konsul]','$_POST[tujuan]')");
                    
                    echo "<div class='alert alert-info'> Data Berhasil Ditambahkan </div>";
                    echo "<meta http-equiv='refresh' content='1;url=index.php?halaman=jenis_bayar_konsul'>";
                    }
         ?>

  </body>
</html>
