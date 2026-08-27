<div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-dark">Data Kecamatan</h6>
                        </div>
                                    <form class="form-inline" role="search" method="post" action="index.php?halaman=cari_kecamatan">
                                    <div class="col-10">
                                    <table border="0">
                                    <tr>
                                        <td><div class="form-group">
                                            <input type="text" class="form-control" name="keyword" placeholder="Masukkan Pencarian" autofocus autocomplete="off"></input>
                                        <td><button class="btn btn-purple" name="cari"> Cari ... </button>
                                        </div>
                                    </tr>
                                    </table>
                                    </div>
                                </form>
                       <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered text-light" id="dataTable" width="100%" cellspacing="50"style="background-color: Pink;">
                                    <thead>
                                        <tr>
                                             <th>No</th>
                                          <th>ID Kecamatan</th>
                                          <th>Nama Kecamatan</th>
                                          <th>Nama Kota</th>
    
                                          <th>Option</th>
                                          </tr>
                                        <tbody>
                                            <?php 
                                              $ambildata =mysqli_query($koneksi, "SELECT * FROM kecamatan JOIN kota ON kecamatan.id_kota=kota.id_kota");
                                                 $No =1 ;
                                                while ($db= $ambildata->fetch_assoc()){
                                            ?>
                                               <tr>
                                                   <td><?php echo $No?></td>
                                                   <td><?php echo $db['id_kecamatan'];?></td>
                                                   <td><?php echo $db['nama_kecamatan'];?></td>
                                                   <td><?php echo $db['nama_kota'];?></td>
                                                    
                                                    <td>  
                                                        <a href ="hapus_kecamatan.php?id_kecamatan=<?php echo $db['id_kecamatan']?>" onclick ="return confirm ('Apakah anda yakin ingin menghapus data?')"name="hapus" class="btn btn-purple"> Hapus </a>
                                                        <a href ="edit_kecamatan.php?halaman=edit_kecamatan&id_kecamatan=<?php echo $db['id_kecamatan']?>" class="btn btn- btn-purple">Edit</a>
                                        <?php $No++;
                                        }
                                        ?> 
                                        </tbody>
                                    </thead>
                                </table>
                                <a href="index.php?halaman=tambah_kecamatan" class="btn btn-purple">Tambah Data</a>
                            </div>