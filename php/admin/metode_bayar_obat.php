<div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-dark">Data Metode Bayar Obat</h6>
                        </div>
                                    <form class="form-inline" role="search" method="post" action="index.php?halaman=cari_metode_bayar_obat">
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
                                          <th>ID Metode Bayar Obat</th>
                                          <th>Keterangan Metode Bayar Obat</th>
                                          <th>Option</th>
                                          </tr>
                                <tbody>
                                            <?php 
                                              $ambildata =mysqli_query($koneksi, "SELECT * FROM metode_bayar_obat ORDER BY id_metode_bayar_obat DESC");
                                                 $No =1 ;
                                                while ($db= $ambildata->fetch_assoc()){
                                            ?>
                                               <tr>
                                                   <td><?php echo $No?></td>
                                                   <td><?php echo $db['id_metode_bayar_obat'];?></td>
                                                    <td><?php echo $db['ket_metode_bayar_obat'];?></td>                                                    
                                                    <td>  
                                                        <a href ="hapus_metode_bayar_obat.php?id_metode_bayar_obat=<?php echo $db['id_metode_bayar_obat']?>" onclick ="return confirm ('Apakah anda yakin ingin menghapus data?')"name="hapus" class="btn btn-purple">Hapus</a>   
                                                        <a href ="edit_metode_bayar_obat.php?halaman=edit_metode_bayar_obat&id_metode_bayar_obat=<?php echo $db['id_metode_bayar_obat']?>" class="btn btn- btn-purple">Edit</a>
                                        <?php $No++;
                                        }
                                        ?> 
                                        </tbody>
                                    </thead>
                                </table>
                                <a href="index.php?halaman=tambah_metode_bayar_obat" class = "btn btn-purple"> Tambah Data </a>
                            </div>