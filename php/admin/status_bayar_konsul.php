<div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-dark">Status Bayar Konsultasi</h6>
                        </div>
                                    <form class="form-inline" role="search" method="post" action="index.php?halaman=cari_status_bayar_konsul">
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
                                          <th>Status Bayar Konsul</th>
                                          <th>Jenis Status Bayar Konsul</th>
                                          <th>Option</th>
                                          </tr>
                                        <tbody>
                                            <?php 
                                              $ambildata =mysqli_query($koneksi, "SELECT * FROM status_bayar_konsul ORDER BY id_status_bayar_konsul DESC");
                                                 $No =1 ;
                                                while ($db= $ambildata->fetch_assoc()){
                                            ?>
                                               <tr>
                                                   <td><?php echo $No?></td>
                                                   <td><?php echo $db['id_status_bayar_konsul'];?></td>
                                                   <td><?php echo $db['jenis_status_bayar_konsul'];?></td> 
                                                    <td>  
                                                    <a href="hapus_status_bayar_konsul.php?id_status_bayar_konsul=<?php echo $db['id_status_bayar_konsul'] ?>" onclick="return confirm('Apakah anda yakin ingin menghapus data?')" name="hapus" class="btn btn-purple">Hapus</a>
                                                    <a href ="edit_status_bayar_konsul.php?halaman=edit_status_bayar_konsul&id_status_bayar_konsul=<?php echo $db['id_status_bayar_konsul']?>" class="btn btn- btn-purple">Edit</a>   
                                        <?php $No++;
                                        }
                                        ?> 
                                        </tbody>
                                    </thead>
                                </table>
                                <a href="index.php?halaman=tambah_status_bayar_konsul" class="btn btn-purple">Tambah Data</a>
                            </div>