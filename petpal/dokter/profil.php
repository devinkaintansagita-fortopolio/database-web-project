                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-dark">Profil Dokter</h6>
                        </div>
                                    <form class="form-inline" role="search" method="post" action="index.php?halaman=cari_dokter">
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
                                <table class="table table-bordered text-light" id="dataTable" width="100%" cellspacing="50"style="background-color: pink;">
                                    <thead>
                                        <tr>
                                             <th>No</th>
                                          <th>ID Dokter</th>
                                          <th>Username Dokter</th>
                                          <th>Password Dokter</th>
                                          <th>Nama Dokter</th>
                                          <th>Asal Instansi Dokter</th>
                                          <th>Nama Spesialis</th>
                                          <th>Tarif Dokter</th>
                                          <th>Foto Dokter</th> 
                                          <th>Option</th>
                                          </tr>
                                        <tbody>
                                            <?php 
                                              $ambildata =mysqli_query($koneksi, "SELECT * FROM dokter JOIN spesialis ON dokter.id_spesialis=spesialis.id_spesialis");
                                                 $No =1 ;
                                                while ($db= $ambildata->fetch_assoc()){
                                            ?>
                                               <tr>
                                                   <td><?php echo $No?></td>
                                                   <td><?php echo $db['id_dokter'];?></td>
                                                   <td><?php echo $db['username_dokter'];?></td>
                                                   <td><?php echo $db['password_dokter'];?></td>
                                                    <td><?php echo $db['nama_dokter'];?></td> 
                                                    <td><?php echo $db['asal_instansi_dokter'];?></td>
                                                    <td><?php echo $db['nama_spesialis'];?></td>
                                                    <td>Rp.<?php echo number_format($db['tarif']);?></td>
                                                    <td> <img src="../foto_dokter/<?php echo $db['foto_dokter'];?>" width="100"></td>

                                                    <td>  
                                                        <a href ="cari_dokter.php?id_dokter=<?php echo $db['id_dokter']?>" onclick ="return confirm ('Apakah anda yakin ingin mencari data?')"name="edit" class="btn btn-purple"> Cari </a>   
                                        <?php $No++;
                                        }
                                        ?> 
                                        </tbody>
                                    </thead>
                                </table>
                            </div>