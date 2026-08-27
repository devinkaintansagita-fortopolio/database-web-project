<div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-dark">Data Jenis Bayar Obat</h6>
                        </div>
                                    <form class="form-inline" role="search" method="post" action="index.php?halaman=cari_jenis_bayar_obat">
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
                                          <th>ID Jenis Bayar Obat</th>
                                          <th>Nama Jenis Bayar Obat</th>
                                          <th>Keterangan Metode Bayar Obat</th>
                                          <th>Tujuan</th>
    
                                          <th>Option</th>
                                          </tr>
                                        <tbody>
                                            <?php 
                                              $ambildata =mysqli_query($koneksi, "SELECT * FROM jenis_bayar_obat JOIN metode_bayar_obat ON jenis_bayar_obat.id_metode_bayar_obat=metode_bayar_obat.id_metode_bayar_obat");
                                                 $No =1 ;
                                                while ($db= $ambildata->fetch_assoc()){
                                            ?>
                                               <tr>
                                                   <td><?php echo $No?></td>
                                                   <td><?php echo $db['id_jenis_bayar_obat'];?></td>
                                                   <td><?php echo $db['nama_jenis_bayar_obat'];?></td>
                                                   <td><?php echo $db['ket_metode_bayar_obat'];?></td>
                                                   <td><?php echo $db['tujuan'];?></td>
                                                    
                                                    <td>  
                                                        <a href ="hapus_jenis_bayar_obat.php?id_jenis_bayar_obat=<?php echo $db['id_jenis_bayar_obat']?>" onclick ="return confirm ('Apakah anda yakin ingin menghapus data?')"name="hapus" class="btn btn-purple"> Hapus </a>
                                                        <a href ="edit_jenis_bayar_obat.php?halaman=edit_jenis_bayar_obat&id_jenis_bayar_obat=<?php echo $db['id_jenis_bayar_obat']?>" class="btn btn- btn-purple">Edit</a>
                                        <?php $No++;
                                        }
                                        ?> 
                                        </tbody>
                                    </thead>
                                </table>
                                <a href="index.php?halaman=tambah_jenis_bayar_obat" class="btn btn-purple">Tambah Data</a>
                            </div>