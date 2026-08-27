<?php
include ('koneksi.php');
$ambildata=$koneksi->query("SELECT * FROM metode_konsul WHERE id_metode_konsul='$_GET[id_metode_konsul]'");
$pecah=$ambildata->fetch_assoc ();
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <title>Edit metode Metode</title>
  </head>

  <body>

    <div class="container" style="margin-top: 20px">
      <div class="row">
        <div class="col-md-8 offset-md-2">
          <div class="card">
            <div class="card-header">
              EDIT metode METODE
            </div>
            <div class="card-body">
              <form method="post" enctype="multipart/form-data">
                                    
                    <div class="form-group">
                        <label> ID metode Metode </label>
                        <select class="form-control" name="id_metode_konsul">
                        <?php $ambildata=$koneksi->query("SELECT * FROM metode_konsul");?>
                        <?php while($pecah=$ambildata->fetch_assoc()){?>
                    <option value="<?php echo $pecah['id_metode_konsul'] ?>" > <?php echo $pecah['id_metode_konsul'] ?>--<?php echo $pecah['ket_metode_konsul'] ?></option>
                        <?php } ?>
                        </select>
                    </div>

                    <div class="form-group">
                    <label> ID Metode Konsultasi </label>
                    <input type="text" class="form-control" name="id_metode_konsul">
                    </div>

                    <div class="form-group">
                    <label> Metode Konsultasi </label>
                    <input type="text" class="form-control" name="nama_metode_konsul">
                    </div>


        <button class="btn btn-blue" name="ubah">Ubah </button>
      </form>
      </div>
          </div>
        </div>
      </div>
    </div>
<?php
          if(isset($_POST['ubah']))
          {
          $koneksi->query("UPDATE metode_konsul set
          id_metode_konsul='$_POST[id_metode_konsul]',
          nama_metode_konsul='$_POST[ket_metode_konsul]'
          WHERE id_metode_konsul='$_GET[id_metode_konsul]'");
          
          echo "<script> alert(' Data Keterangan metode Konsultasi Berhasil Diubah');</script>";
          echo "<script>location='indexadmin.php?halaman=metode_konsul';</script>";
          }
          ?>
   </body>
</html>