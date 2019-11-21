<?php
include "../../koneksi.php";
date_default_timezone_set('Asia/Jakarta');
$tanggal = date("Y-m-d");
$bl ='Masih Proses';
$sqlCommand = "SELECT COUNT(id_booking) FROM listbooking WHERE listbooking.Status='$bl' and listbooking.tanggal='$tanggal' ";
$query = mysqli_query($koneksi, $sqlCommand) or die (mysqli_error());
$row = mysqli_fetch_row($query);
echo $row[0];

if (isset($_GET['cari'])){
    $id = $_GET['cari'];
    $query = "SELECT listbooking.no_antrian FROM listbooking WHERE id_tracking='$id' ";
    $result = mysqli_query($koneksi, $query);
    $data = mysqli_fetch_assoc($result);
    $slow = $data["no_antrian"];
}

$teknisi = "Teknisi";
$adminn = "SELECT COUNT(id_admin) FROM dataadmin WHERE dataadmin.level ='$teknisi'";
$gamee = mysqli_query($koneksi, $adminn) or die (mysqli_error());
$you = mysqli_fetch_row($gamee);
$data = $slow - $row[0];

$berapa = $data / $you[0];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Cek id tracking</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicons -->
    <link href="../../images/favicon.png" rel="icon">
    <link href="../../images/icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Raleway:300,400,500,700,800" rel="stylesheet">

    <!-- Bootstrap CSS File -->
    <link href="../../css/Booking/lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Libraries CSS Files -->
    <link href="../../css/Booking/lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link href="../../css/Booking/lib/animate/animate.min.css" rel="stylesheet">
    <link href="../../css/Booking/lib/venobox/venobox.css" rel="stylesheet">
    <link href="../../css/Booking/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Main Stylesheet File -->
  <link rel="stylesheet" href="../../css/navbar.css">
  <link data-optimized='2' rel='stylesheet' href='../../css/footer.css' />

</head>

<body>

<!--==========================
  Header
  ============================-->
<header id="header">
    <div class="container">

        <div id="logo" class="pull-left">
            <!-- Uncomment below if you prefer to use a text logo -->
            <!-- <h1><a href="#main">C<span>o</span>nf</a></h1>-->
            <a href="../../index.php" class="scrollto"><img src="../../css/Booking/img/logo.png" alt="" title="" style="width: 110px;"></a>
        </div>

      <nav id="nav-menu-container">
        <ul class="nav-menu">
          <li class="menu-active"><a href="../../index.php">Home</a></li>
          <li class="menu-has-children"><a href="#">Service</a>
                <ul>
                  <li><a href="../../pages/booking/bookingservice.php">Booking Service</a></li>
                  <li><a href="../../pages/tracking/tracking.php">Tracking</a></li>
                  <li><a href="../../pages/perawatan/perawatan.php">Perawatan</a></li>
                </ul>
              </li>
          <li><a href="../../index.php#tentang">Tentang</a></li>
          <li><a href="../../index.php#fasilitas">Fasilitas</a></li>
          <li><a href="../../index.php#gallery">Galery</a></li>
          <li><a href="../../index.php#contact">Hubungi Kami</a></li>
          <li class="buy-tickets"><a href="../../loginadmin.php">Log In</a></li>
        </ul>
      </nav>
    </div>
  </header>
<!-- #nav-menu-container -->
    </div>
</header><!-- #header -->
            <?php
            include "../../koneksi.php";
            if (isset($_GET['cari'])){
            $id = $_GET['cari'];
            $tanggal = date("Y-m-d");
            $track = mysqli_query($koneksi, "SELECT listbooking.id_member,listbooking.id_tracking, listbooking.Nama,listbooking.no_hp,listbooking.alamat, listbooking.nopol, jm.jenis_montor, jm_model.model, listbooking.Perbaikan, listbooking.lainnya, listbooking.status FROM listbooking, jm, jm_model WHERE listbooking.id_jm=jm.id_jm and listbooking.id_model=jm_model.id_model and id_tracking='$id' ");
            $data = mysqli_fetch_assoc($track);
            $id_member = $data["id_member"];
            $id_tracking = $data["id_tracking"];
            $Nama = $data["Nama"];
            $no_hp = $data["no_hp"];
            $alamat = $data["alamat"];
            $nopol = $data["nopol"];
            $jenis_montor = $data["jenis_montor"];
            $model = $data["model"];
            $perbaikan = $data["Perbaikan"];
            $lainnya = $data["lainnya"];
            $status = $data["status"];
            if ($id_tracking == $id){
            ?>
<div class="container" style="margin-top: 6%; margin-left: 20%;">
    <div class="row">
        <label style=" font-size: 22px;font-family: cursive; ">Hasil Pencarian,
            <strong><?php echo $id_tracking ?></strong> Ditemukan</label>

        <br>
        <br>

        <div class="col-md-9" style="font-size: 20px;padding: 38px;">
            <div class="alert alert-success" role="alert">
                <div class="text-left">
                    <div class="col-md-10 col-md-offset-2 col-sm-12 text-center" style="margin-left: 10%;">
                        <div class="row text-center">
                            <div class="col-sm-12 text-center">
                                <div class="photo-form-wrapper clearfix">

                                    <div class="row">
                                        <div class="col-md-5 col-sm-4 text-left">
                                            <p> ID Member</p>
                                        </div>
                                        <div class="col-md-7 col-sm-2 text-left">
                                            <p><?php echo ": " . $id_member; ?></p>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col-md-5 col-sm-4 text-left">
                                            <p> Kode Tracking Kamu</p>
                                        </div>
                                        <div class="col-md-7 col-sm-2 text-left">
                                            <p><?php echo ": " . $id_tracking; ?></p>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col-md-5 col-sm-4 text-left">
                                            <p> Nama</p>
                                        </div>
                                        <div class="col-md-7 col-sm-2 text-left">
                                            <p><?php echo ": " . $Nama; ?></p>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col-md-5 col-sm-4 text-left">
                                            <p> Nomor Polisi Kamu</p>
                                        </div>
                                        <div class="col-md-7 col-sm-2 text-left">
                                            <p><?php echo ": " . $nopol; ?></p>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col-md-5 col-sm-4 text-left">
                                            <p> Jenis Montor Kamu</p>
                                        </div>
                                        <div class="col-md-7 col-sm-2 text-left">
                                            <p><?php echo ": " . $jenis_montor; ?></p>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col-md-5 col-sm-4 text-left">
                                            <p> Model Montor Kamu</p>
                                        </div>
                                        <div class="col-md-7 col-sm-2 text-left">
                                            <p><?php echo ": " . $model; ?></p>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col-md-5 col-sm-4 text-left">
                                            <p> Perbaikan</p>
                                        </div>
                                        <div class="col-md-7 col-sm-2 text-left">
                                            <p><?php echo ": " . $perbaikan . $lainnya; ?></p>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col-md-5 col-sm-4 text-left">
                                            <p> Status</p>
                                        </div>
                                        <div class="col-md-7 col-sm-2 text-left">
                                            <p><?php echo ": " . $status; ?></p>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col-md-5 col-sm-4 text-left">
                                            <p> Estimasi Waktu</p>
                                        </div>
                                        <div class="col-md-7 col-sm-2 text-left">
                                            <p><?php echo ": ";
                                                if ($status == 'Masih Proses') {
                                                    echo "Kurang Lebih 30 Menit Lagi";
                                                } elseif ($status=='Selesai'){
                                                    echo "Makasih ya";
                                                }else if ($berapa < 1) {
                                                    echo "Silahkan datang 1 Menit lagi";
                                                } else if ($berapa < 2 ) {
                                                    echo "Silahkan datang 1 Jam 30 Menit lagi";
                                                } else if ($berapa < 3 ) {
                                                    echo "Silahkan datang 2 Jam lagi";
                                                } else if ($berapa < 4 ) {
                                                    echo "Silahkan datang 2 Jam 30 Menit lagi";
                                                } else if ($berapa < 5 ) {
                                                    echo "Silahkan datang 3 Jam lagi";
                                                } else if ($berapa < 6 ) {
                                                    echo "Silahkan datang 3 Jam 30 Menit lagi";
                                                } else if ($berapa < 7 ) {
                                                    echo "Silahkan datang 4 Jam lagi";
                                                } else if ($berapa < 8 ) {
                                                    echo "Silahkan datang 4 Jam 30 Menit lagi";
                                                } else if ($berapa < 9 ) {
                                                    echo "Silahkan datang 5 Jam lagi";
                                                } else if ($berapa < 10 ) {
                                                    echo "Silahkan datang 5 jam 30 Menit Menit lagi";
                                                } else {
                                                    echo "Silahkan datang 6 jam lagi";
                                                }


                                                ?></p>
                                        </div>
                                        <br>
                                        <br>
                                    </div>
                                    <form action="tracking.php" method="post">
                                            <button type="submit" class="btn btn-primary" href="tracking.php">OKE</button>
                                        </div>
                                </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php }
            else {
              header("location: tracking.php?data=tidak-ada");
            }
          }?>
<footer id="mvp-foot-wrap" class="left relative">
        <div id="mvp-foot-top" class="left relative">
          <div class="mvp-main-box">
            <div id="mvp-foot-logo" class="left relative">
                              <a href="../../index.html"><img src="../../images/logo.png" width="150px" height="50px" /></a>
                          </div><!--mvp-foot-logo-->
            <div id="mvp-foot-soc" class="left relative">
              <ul class="mvp-foot-soc-list left relative">
                                  <li><a href="#" target="_blank" class="fa fa-facebook fa-2"></a></li>
                                                  <li><a href="https://twitter.com/droidlime" target="_blank" class="fa fa-twitter fa-2"></a></li>
                                                                  <li><a href="#" target="_blank" class="fa fa-instagram fa-2"></a></li>
                                                  <li><a href="#" target="_blank" class="fa fa-google-plus fa-2"></a></li>
                                                  <li><a href="#" target="_blank" class="fa fa-youtube-play fa-2"></a></li>
                                                              </ul>
            </div><!--mvp-foot-soc-->
            <div id="mvp-foot-menu-wrap" class="left relative">
              <div id="mvp-foot-menu" class="left relative">
                <div class="menu-footer-menu-new-container"><ul id="menu-footer-menu-new" class="menu"><li id="menu-item-30646" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-30646"><a href="../../pages/booking/bookingservice.php">Booking Service</a></li>
<li id="menu-item-30647" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-30647"><a href="../../pages/tracking/tracking.php">Tracking</a></li>
<li id="menu-item-30648" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-30648"><a href="../../pages/perawatan/perawatan.php">Perawatan</a></li>
<li id="menu-item-30649" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-30649"><a href="../../index.php#tentang">Tentang Kami</a></li>
</ul></div>             </div><!--mvp-foot-menu-->
            </div><!--mvp-foot-menu-wrap-->
          </div><!--mvp-main-box-->
        </div><!--mvp-foot-top-->
        <div id="mvp-foot-bot" class="left relative">
          <div class="mvp-main-box">
            <div id="mvp-foot-copy" class="left relative">
              <p>© 2018 Kelompok 4 Copyright</br></p>
            </div><!--mvp-foot-copy-->
          </div><!--mvp-main-box-->
        </div><!--mvp-foot-bot-->
      </footer>

<a href="#" class="back-to-top"><i class="fa fa-angle-up"></i></a>

<!-- JavaScript Libraries -->
<script src="lib/jquery/jquery.min.js"></script>
<script src="lib/jquery/jquery-migrate.min.js"></script>
<script src="lib/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="lib/easing/easing.min.js"></script>
<script src="lib/superfish/hoverIntent.js"></script>
<script src="lib/superfish/superfish.min.js"></script>
<script src="lib/wow/wow.min.js"></script>
<script src="lib/venobox/venobox.min.js"></script>
<script src="lib/owlcarousel/owl.carousel.min.js"></script>

<!-- Contact Form JavaScript File -->
<script src="contactform/contactform.js"></script>

<!-- Template Main Javascript File -->
<script src="../../js/main.js"></script>
<script src="../../js/jquery-1.11.2.min.js"></script>
<!-- js untuk bootstrap -->
<script src="../../js/bootstrap.js"></script>

<script>
    function hanyaAngka(evt) {
        var charCode = (evt.which) ? evt.which : event.keyCode
        if (charCode > 31 && (charCode < 48 || charCode > 57))

            return false;
        return true;
    }
</script>
</body>

</html>
