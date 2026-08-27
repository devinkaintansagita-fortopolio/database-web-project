<?php
session_start ();
include 'koneksi.php';

$jenis_spesialis = "";
$spesialis = "";
$jenis_obat = "";
$strq = "";
$strw = "";
$jmlget = 0;

if(isset($_GET['jenis_spesialis'])){
        $jenis_spesialis = $_GET['jenis_spesialis'];
	    $strc[] = "spesialis.id_jenis_spesialis= '$jenis_spesialis'";
        $jmlget++;
    }
    if(isset($_GET['spesialis'])){
        $spesialis = $_GET['spesialis'];
        $strc[] = "dokter.id_spesialis= '$spesialis'";
        $jmlget++;
    }

    $i = 1;
    if($jmlget > 0){
      $strw = "WHERE ";
      foreach($strc as $strs){
        $strw .= $strs;
        if($i < $jmlget){
          $strw .= " AND ";
          $i++;
        }
      }
    }

    if(isset($_GET['jenis_obat'])){
        $jenis_obat = $_GET['jenis_obat'];
        $strc[] = "obat.id_jenis_obat= '$jenis_obat'";
        $jmlget++;
    }

    $query = "SELECT * FROM dokter 
    JOIN spesialis ON dokter.id_spesialis=spesialis.id_spesialis 
    INNER JOIN jenis_spesialis ON spesialis.id_jenis_spesialis=jenis_spesialis.id_jenis_spesialis $strw";
    $result=mysqli_query($koneksi,$query);
    $resnum = mysqli_num_rows($result);

    $query_kel = "SELECT * FROM spesialis";
    $result_kel = mysqli_query($koneksi,$query_kel);

    $query_jen = "SELECT * FROM jenis_spesialis";
	$result_jen = mysqli_query($koneksi,$query_jen);

    $query_obat = "SELECT * FROM jenis_obat"; 
    $result_obat = mysqli_query($koneksi, $query_obat);

    $title = "PETPAL";

    include 'header.php';
	
?>
    
    <div id="main-content" class="main-content">
    <div class="page-content">
        <div class="row">
            <div class="col-xs-15">
                <div id="myCarousel" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                        <div class="item active">
                            <div class="row">
                                <div class="col-md-12 text-center">
                                    <img src="assets/images/slide1.png" alt="Slide 1" class="img-responsive wide-image">
                                    <div class="carousel-caption centered-text">
                                        <div style="position: absolute; top: -550%; left: 52%; transform: translate(-50%, -50%); text-align: center; width: 80%;">
                                            <h1>SELAMAT DATANG DI PETPAL</h1>
                                            <p>PETPAL adalah tempat untuk konsultasi kesehatan hewan peliharaan Anda. Temukan solusi terbaik untuk perawatan dan kesehatan hewan kesayangan Anda dengan bantuan para ahli. Bergabunglah dengan komunitas kami yang peduli terhadap binatang peliharaan dan bangun hubungan yang sehat dan bahagia bersama PETPAL.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Slide 2 -->
                        <div class="item">
                            <div class="row">
                                <div class="col-md-12 text-center">
                                    <img src="assets/images/slide2.jpg" alt="Slide 2" class="img-responsive wide-image">
                                    <div class="carousel-caption centered-text">
                                        <div style="position: absolute; top: -550%; left: 52%; transform: translate(-50%, -50%); text-align: center; width: 80%;">
                                            <h1>TEMUKAN LEBIH BANYAK DI PETPAL</h1>
                                            <p>Konsultasi penyakit hewan lebih mudah dan informatif. Jelajahi fitur unggulan kami dan dapatkan solusi terbaik untuk kesehatan hewan peliharaan Anda. PETPAL, teman setia hewan peliharaan Anda!"</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Slide 3 -->
                        <div class="item">
                            <div class="row">
                                <div class="col-md-12 text-center">
                                    <img src="assets/images/slide3.jpg" alt="Slide 3" class="img-responsive wide-image">
                                    <div class="carousel-caption centered-text">
                                        <div style="position: absolute; top: -550%; left: 52%; transform: translate(-50%, -50%); text-align: center; width: 80%;">
                                            <h1>TERHUBUNG DENGAN PETPAL</h1>
                                            <p>Rasakan pengalaman berinteraksi yang baru. Jelajahi tingkat koneksi yang lebih mendalam dengan PETPAL. Temukan kehangatan dan dukungan komunitas untuk perjalanan kesehatan hewan peliharaan Anda. Bersama PETPAL, hubungan yang erat dengan sahabat berbulu Anda menjadi lebih bermakna.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
                        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
                        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
    </div>

    <div class="container-fluid">
		<?php
			if (isset($_GET['halaman']))
			{
				if($_GET['halaman']=="konsultasi")
				{
					include 'konsultasi.php';
				}
				else if($_GET['halaman']=="obat")
				{
					include 'obat.php';
				}
                else if($_GET['halaman']=="cari_konsul")
				{
					include 'cari_konsul.php';
				}
                else if($_GET['halaman']=="cari_jenis_obat")
				{
					include 'cari_jenis_obat.php';
				}
                else if($_GET['halaman']=="beli")
				{
					include 'beli.php';
				}
            } 
			else
			{
			include 'dashboard.php';
			}
		?>                      
	</div>

    <?php include 'footer.php';?>

	<script type="text/javascript">
		if('ontouchstart' in document.documentElement) document.write("<script src='assets/js/jquery.mobile.custom.min.js'>"+"<"+"/script>");
	</script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
	<script src="assets/js/bootstrap.min.js"></script>
	<script src="assets/js/jquery-ui.custom.min.js"></script>
	<script src="assets/js/jquery.ui.touch-punch.min.js"></script>
	<script src="assets/js/jquery.easypiechart.min.js"></script>
	<script src="assets/js/jquery.sparkline.index.min.js"></script>
	<script src="assets/js/jquery.flot.min.js"></script>
	<script src="assets/js/jquery.flot.pie.min.js"></script>
	<script src="assets/js/jquery.flot.resize.min.js"></script>
	<script src="assets/js/ace-elements.min.js"></script>
	<script src="assets/js/ace.min.js"></script>
	<script type="text/javascript"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js" type="text/javascript"></script>
	<script>window.jQuery || document.write('<script src="js/vendor/jquery-1.11.2.min.js"><\/script>')</script>

    <script src="js/vendor/bootstrap.min.js"></script>

    <script src="js/datepicker.js"></script>
    <script src="js/plugins.js"></script>
    <script src="js/main.js"></script>
    <script src="js/jquery.js"></script>
    <script>
	$(document).ready(function() {
        $('#id_jenis_spesialis').change(function() {
                var id_jenis_spesialis = $(this).val();
                $.ajax({
                    type: 'POST',
                    url: 'cobadokter.php',
                    data: 'id_jenis_spesialis=' + id_jenis_spesialis,
                    success: function(response) {
                        $('#id_spesialis').html(response);
                    }
                });
            });
		});
    </script> 
    </body>
</html>