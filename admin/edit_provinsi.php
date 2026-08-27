<?php
include ('koneksi.php');
$ambildata=$koneksi->query("SELECT * FROM provinsi WHERE id_provinsi='$_GET[id_provinsi]'");
$pecah=$ambildata->fetch_assoc ();
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <title>Edit Provinsi</title>
  </head>

  <body>

    <div class="container" style="margin-top: 20px">
      <div class="row">
        <div class="col-md-8 offset-md-2">
          <div class="card">
            <div class="card-header">
              EDIT PROVINSI
            </div>
            <div class="card-body">
              <form method="post" enctype="multipart/form-data">
                                    
                    <div class="form-group">
                        <label> ID Provinsi </label>
                        <select class="form-control" name="id_provinsi">
                        <?php $ambildata=$koneksi->query("SELECT * FROM provinsi");?>
                        <?php while($pecah=$ambildata->fetch_assoc()){?>
                        <option value="<?php echo $pecah['id_provinsi'] ?>" > <?php echo $pecah['id_provinsi'] ?>--<?php echo $pecah['nama_provinsi'] ?></option>
                        <?php } ?>
                        </select>
                    </div>

                    <div class="form-group">
                    <label> ID Provinsi </label>
                    <input type="text" class="form-control" name="id_provinsi">
                    </div>

                    <div class="form-group">
                    <label> Nama Provinsi </label>
                    <input type="text" class="form-control" name="nama_provinsi">
                    </div>


        <button class="btn btn-purple" name="ubah">Ubah </button>
      </form>
      </div>
          </div>
        </div>
      </div>
    </div>
        <?php
          if(isset($_POST['ubah']))
          {
            $koneksi->query("UPDATE provinsi set
            id_provinsi='$_POST[id_provinsi]',
            nama_provinsi='$_POST[nama_provinsi]'
            WHERE id_provinsi='$_GET[id_provinsi]'");
            
            echo "<script> alert(' Data provinsi Berhasil Diubah');</script>";
            echo "<script>location='index.php?halaman=provinsi';</script>";
          }
          ?>
   </body>
</html>