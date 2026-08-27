<?php
include ('koneksi.php');
$ambildata=$koneksi->query("SELECT * FROM status_bayar_konsul WHERE id_status_bayar_konsul='$_GET[id_status_bayar_konsul]'");
$pecah=$ambildata->fetch_assoc ();
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <title>Edit Spesialis</title>
  </head>

  <body>

    <div class="container" style="margin-top: 20px">
      <div class="row">
        <div class="col-md-8 offset-md-2">
          <div class="card">
            <div class="card-header">
              EDIT STATUS BAYAR KONSUL
            </div>
            <div class="card-body">
              <form method="post" enctype="multipart/form-data">
                                    
                    <div class="form-group">
                        <label> ID Status Bayar konsul </label>
                        <select class="form-control" name="id_status_bayar_konsul">
                        <?php $ambildata=$koneksi->query("SELECT * FROM status_bayar_konsul");?>
                        <?php while($pecah=$ambildata->fetch_assoc()){?>
                    <option value="<?php echo $pecah['id_status_bayar_konsul'] ?>" > <?php echo $pecah['id_status_bayar_konsul'] ?>--<?php echo $pecah['jenis_status_bayar_konsul'] ?></option>
                        <?php } ?>
                        </select>
                    </div>

                    <div class="form-group">
                    <label> ID Status Bayar konsul </label>
                    <input type="text" class="form-control" name="id_status_bayar_konsul">
                    </div>

                    <div class="form-group">
                    <label> Jenis Status Bayar konsul </label>
                    <input type="text" class="form-control" name="jenis_status_bayar_konsul">
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
          $koneksi->query("UPDATE status_bayar_konsul set
          id_status_bayar_konsul='$_POST[id_status_bayar_konsul]',
          jenis_status_bayar_konsul='$_POST[jenis_status_bayar_konsul]'
          WHERE id_status_bayar_konsul='$_GET[id_status_bayar_konsul]'");
          
          echo "<script> alert(' Data Jenis Status Bayar Konsul Berhasil Diubah');</script>";
          echo "<script>location='index.php?halaman=status_bayar_konsul';</script>";
          }
          ?>
   </body>
</html>