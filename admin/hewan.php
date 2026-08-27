                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-dark">Hewan</h6>
                        </div>
                        <form class="form-inline" role="search" method="post" action="index.php?halaman=cari_hewan">
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
                                          <th>ID Hewan</th>
                                          <th>Nama Hewan</th>
                                          <th>Umur Hewan</th>
                                          <th>Jenis Hewan</th>
                                          <th>Ras Hewan</th>
                                          <th>Nama Pengguna</th>
                                          <th>Option</th>
                                          </tr>
                                        <tbody>
                                            <?php 
                                              $ambildata =mysqli_query($koneksi, "SELECT * FROM hewan JOIN pengguna ON hewan.id_pengguna=pengguna.id_pengguna");
                                                 $No =1 ;
                                                while ($db= $ambildata->fetch_assoc()){
                                            ?>
                                               <tr>
                                                   <td><?php echo $No?></td>
                                                   <td><?php echo $db['id_hewan'];?></td>
                                                   <td><?php echo $db['nama_hewan'];?></td>
                                                   <td><?php echo $db['umur_hewan'];?></td>
                                                   <td><?php echo $db['jenis_hewan'];?></td>
                                                    <td><?php echo $db['ras_hewan'];?></td> 
                                                    <td><?php echo $db['nama_pengguna'];?></td>

                                                    <td>  
                                                        <a href ="hapus_hewan.php?id_hewan=<?php echo $db['id_hewan']?>" onclick ="return confirm ('Apakah anda yakin ingin menghapus data?')"name="hapus" class="btn btn-purple"> Hapus </a>   
                                        <?php $No++;
                                        }
                                        ?> 
                                        </tbody>
                                    </thead>
                                </table>
                            </div>