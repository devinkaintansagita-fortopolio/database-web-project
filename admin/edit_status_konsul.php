<?php
include ('koneksi.php');
$ambildata=$koneksi->query("SELECT * FROM status_konsul WHERE id_status_konsul='$_GET[id_status_konsul]'");
$pecah=$ambildata->fetch_assoc ();
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <title>Edit Status Konsultasi</title>
  </head>

  <body>

    <div class="container" style="margin-top: 20px">
      <div class="row">
        <div class="col-md-8 offset-md-2">
          <div class="card">
            <div class="card-header">
              EDIT STATUS KONSULTASI
            </div>
            <div class="card-body">
              <form method="post" enctype="multipart/form-data">
                                    
                    <div class="form-group">
                        <label> ID Status Konsultasi </label>
                        <select class="form-control" name="id_status_konsul">
                        <?php $ambildata=$koneksi->query("SELECT * FROM status_konsul");?>
                        <?php while($pecah=$ambildata->fetch_assoc()){?>
                    <option value="<?php echo $pecah['id_status_konsul'] ?>" > <?php echo $pecah['id_status_konsul'] ?>--<?php echo $pecah['ket_status_konsul'] ?></option>
                        <?php } ?>
                        </select>
                    </div>

                    <div class="form-group">
                    <label> ID Status Konsultasi </label>
                    <input type="text" class="form-control" name="id_status_konsul">
                    </div>

                    <div class="form-group">
                    <label> Keterangan Status Konsultasi </label>
                    <input type="text" class="form-control" name="ket_status_konsul">
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
          $koneksi->query("UPDATE status_konsul set
          id_status_konsul='$_POST[id_status_konsul]',
          ket_status_konsul='$_POST[ket_status_konsul]'
          WHERE id_status_konsul='$_GET[id_status_konsul]'");
          
          echo "<script> alert(' Data Keterangan Status Konsultasi Berhasil Diubah');</script>";
          echo "<script>location='index.php?halaman=status_konsul';</script>";
          }
          ?>
   </body>
</html>