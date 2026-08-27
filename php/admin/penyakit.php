                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-dark">penyakit</h6>
                        </div>
                                    <form class="form-inline" role="search" method="post" action="index.php?halaman=cari_penyakit">
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
                                          <th>ID Penyakit</th>
                                          <th>Nama Penyakit</th>
                                          <th>Keterangan Penyakit</th>
                                          <th>Gejala</th>
                                          <th>Nama Jenis Penyakit</th>
                                          <th>Nama Spesialis</th>
                                          <th>Option</th>
                                          </tr>
                                        <tbody>
                                            <?php 
                                              $ambildata =mysqli_query($koneksi, "SELECT * FROM penyakit JOIN spesialis ON penyakit.id_spesialis=spesialis.id_spesialis JOIN jenis_penyakit ON penyakit.id_jenis_penyakit=jenis_penyakit.id_jenis_penyakit");
                                                 $No =1 ;
                                                while ($db= $ambildata->fetch_assoc()){
                                            ?>
                                               <tr>
                                                   <td><?php echo $No?></td>
                                                   <td><?php echo $db['id_penyakit'];?></td>
                                                   <td><?php echo $db['nama_penyakit'];?></td>
                                                   <td><?php echo $db['ket_penyakit'];?></td>
                                                   <td><?php echo $db['gejala'];?></td>
                                                   <td><?php echo $db['nama_jenis_penyakit'];?></td>
                                                    <td><?php echo $db['nama_spesialis'];?></td> 

                                                    <td>  
                                                        <a href ="hapus_penyakit.php?id_penyakit=<?php echo $db['id_penyakit']?>" onclick ="return confirm ('Apakah anda yakin ingin menghapus data?')"name="hapus" class="btn btn-purple"> Hapus </a>  
                                                        <a href ="edit_penyakit.php?halaman=edit_penyakit&id_penyakit=<?php echo $db['id_penyakit']?>" class="btn btn- btn-purple">Edit</a> 
                                        <?php $No++;
                                        }
                                        ?> 
                                        </tbody>
                                    </thead>
                                </table>
                                <a href="index.php?halaman=tambah_penyakit" class = "btn btn-purple"> Tambah Data </a>
                            </div>