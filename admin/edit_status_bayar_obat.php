<?php
include ('koneksi.php');
$ambildata=$koneksi->query("SELECT * FROM status_bayar_obat WHERE id_status_bayar_obat='$_GET[id_status_bayar_obat]'");
$pecah=$ambildata->fetch_assoc ();
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <title>Edit Status Bayar Obat</title>
  </head>

  <body>

    <div class="container" style="margin-top: 20px">
      <div class="row">
        <div class="col-md-8 offset-md-2">
          <div class="card">
            <div class="card-header">
              EDIT STATUS BAYAR OBAT
            </div>
            <div class="card-body">
              <form method="post" enctype="multipart/form-data">
                                    
                    <div class="form-group">
                        <label> ID Status Bayar Obat </label>
                        <select class="form-control" name="id_status_bayar_obat">
                        <?php $ambildata=$koneksi->query("SELECT * FROM status_bayar_obat");?>
                        <?php while($pecah=$ambildata->fetch_assoc()){?>
                    <option value="<?php echo $pecah['id_status_bayar_obat'] ?>" > <?php echo $pecah['id_status_bayar_obat'] ?>--<?php echo $pecah['jenis_status_bayar_obat'] ?></option>
                        <?php } ?>
                        </select>
                    </div>

                    <div class="form-group">
                    <label> ID Status Bayar Obat </label>
                    <input type="text" class="form-control" name="id_status_bayar_obat">
                    </div>

                    <div class="form-group">
                    <label> Jenis Status Bayar Obat </label>
                    <input type="text" class="form-control" name="jenis_status_bayar_obat">
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
          $koneksi->query("UPDATE status_bayar_obat set
          id_status_bayar_obat='$_POST[id_status_bayar_obat]',
          jenis_status_bayar_obat='$_POST[jenis_status_bayar_obat]'
          WHERE id_status_bayar_obat='$_GET[id_status_bayar_obat]'");
          
          echo "<script> alert(' Data Jenis Status Bayar Obat Berhasil Diubah');</script>";
          echo "<script>location='index.php?halaman=status_bayar_obat';</script>";
          }
          ?>
   </body>
</html>