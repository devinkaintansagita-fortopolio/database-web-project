                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-dark">Pengguna</h6>
                        </div>
                                    <form class="form-inline" role="search" method="post" action="index.php?halaman=cari_pengguna">
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
                                          <th>ID Pengguna</th>
                                          <th>Username Pengguna</th>
                                          <th>Password Pengguna</th>
                                          <th>Nama Pengguna</th>
                                          <th>Alamat Pengguna</th>
                                          <th>Nama Kelurahan</th>
                                          <th>Option</th>
                                          </tr>
                                        <tbody>
                                            <?php 
                                              $ambildata =mysqli_query($koneksi, "SELECT * FROM pengguna JOIN kelurahan ON pengguna.id_kelurahan=kelurahan.id_kelurahan");
                                                 $No =1 ;
                                                while ($db= $ambildata->fetch_assoc()){
                                            ?>
                                               <tr>
                                                   <td><?php echo $No?></td>
                                                   <td><?php echo $db['id_pengguna'];?></td>
                                                   <td><?php echo $db['username_pengguna'];?></td>
                                                   <td><?php echo $db['password_pengguna'];?></td>
                                                    <td><?php echo $db['nama_pengguna'];?></td> 
                                                    <td><?php echo $db['alamat_pengguna'];?></td>
                                                    <td><?php echo $db['nama_kelurahan'];?></td>

                                                    <td>  
                                                        <a href ="hapus_pengguna.php?id_pengguna=<?php echo $db['id_pengguna']?>" onclick ="return confirm ('Apakah anda yakin ingin menghapus data?')"name="hapus" class="btn btn-purple"> Hapus </a>   
                                        <?php $No++;
                                        }
                                        ?> 
                                        </tbody>
                                    </thead>
                                </table>
                            </div>