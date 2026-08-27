                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-dark">Nota Penyakit</h6>
                        </div>
                                    <form class="form-inline" role="search" method="post" action="index.php?halaman=cari_nota_penyakit">
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
                                          <th>ID Nota Penyakit</th>
                                          <th>Penyakit</th>
                                          <th>Penanganan</th>
                                          <th>Option</th>
                                          </tr>
                                        <tbody>
                                            <?php 
                                              $ambildata =mysqli_query($koneksi, "SELECT * FROM nota_penyakit JOIN nota_konsul ON nota_penyakit.id_nota_konsul=nota_konsul.id_nota_konsul JOIN penyakit ON nota_penyakit.id_penyakit=penyakit.id_penyakit");
                                                 $No =1 ;
                                                while ($db= $ambildata->fetch_assoc()){
                                            ?>
                                               <tr>
                                                   <td><?php echo $No?></td>
                                                   <td><?php echo $db['id_nota_konsul'];?></td>
                                                   <td><?php echo $db['nama_penyakit'];?></td>
                                                    <td><?php echo $db['penanganan'];?></td> 

                                                    <td>  
                                                        <a href ="hapus_nota_penyakit.php?id_nota_konsul=<?php echo $db['id_nota_konsul']?>" onclick ="return confirm ('Apakah anda yakin ingin menghapus data?')"name="hapus" class="btn btn-purple"> Hapus </a>   
                                        <?php $No++;
                                        }
                                        ?> 
                                        </tbody>
                                    </thead>
                                </table>
                            </div>