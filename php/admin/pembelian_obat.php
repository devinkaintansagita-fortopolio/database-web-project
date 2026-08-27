                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-dark">Pembelian Obat</h6>
                        </div>
                                    <form class="form-inline" role="search" method="post" action="index.php?halaman=cari_pembelian_obat">
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
                                          <th>ID Resep Obat</th>
                                          <th>ID Obat</th>
                                          <th>Sub Harga Obat</th>
                                          <th>Sub QTY</th>
                                          </tr>
                                        <tbody>
                                            <?php 
                                              $ambildata =mysqli_query($koneksi, "SELECT * FROM pembelian_obat JOIN resep_obat ON pembelian_obat.id_resep_obat=resep_obat.id_resep_obat JOIN obat ON pembelian_obat.id_obat=obat.id_obat");
                                                 $No =1 ;
                                                while ($db= $ambildata->fetch_assoc()){
                                            ?>
                                               <tr>
                                                   <td><?php echo $No?></td>
                                                   <td><?php echo $db['id_resep_obat'];?></td>
                                                   <td><?php echo $db['id_obat'];?></td>
                                                   <td>Rp. <?php echo $db['sub_harga_obat'];?></td>
                                                    <td><?php echo $db['sub_qty'];?></td> 
                                        <?php $No++;
                                        }
                                        ?> 
                                        </tbody>
                                    </thead>
                                </table>
                            </div>