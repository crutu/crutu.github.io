<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title>Tracking</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="keywords">
  <meta content="" name="description">

  <!-- Favicons -->
  <link href="../../img/favicon.png" rel="icon">
  <link href="../../img/icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Raleway:300,400,500,700,800" rel="stylesheet">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Fredoka+One">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto+Condensed">
  <link href="https://fonts.googleapis.com/css?family=Poppins:400,600,700" rel="stylesheet">

  <!-- Bootstrap CSS File -->
  <link href="../lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Libraries CSS Files -->
  <link href="../../lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <link href="../../lib/animate/animate.min.css" rel="stylesheet">
  <link href="../../lib/venobox/venobox.css" rel="stylesheet">
  <link href="../../lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
  <link href="../../lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <link href="../../lib/animate/animate.min.css" rel="stylesheet">
  <link href="../../lib/venobox/venobox.css" rel="stylesheet">
  <link href="../../lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

  <!-- Main Stylesheet File -->
  <link rel="stylesheet" href="../../css/navbar.css">
  <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link type="text/css" rel="stylesheet" media="screen" href="../../css/tracking-page.css">
  <link data-optimized='2' rel='stylesheet' href='../../css/footer.css' />
    <link data-optimized='2' rel='stylesheet' href='../../css/footer2.css' />
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
        <a href="../../index.php" class="scrollto"><img src="../../images/logo.png" alt="" title="" style="width: 110px;"></a>
      </div>

<!-- #header -->
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
      <!-- #nav-menu-container -->
    </div>
  </header>
  <!-- #header -->

  <!--==========================
    Intro Section
  ============================-->
  <!--Input Data Booking-->
  <br><br><br><br><br><br><br>
<div class="konfirmasi-page" id="uPC">
  <div class="title-konfirmasi">Tracking</div>
    <div class="warning-place" id="errMsgSrc"></div>
    <form  class="form-group" action="trackingcek.php" method="get" ">
      <ul><li>Masukkan Id Transaksi<span class="row"><input name="cari" type="text" class="form-control" id="Nama" placeholder="Masukan Nomor Id Transaksi" required oninvalid="this.setCustomValidity('Masukan Id Transaksi Anda')" oninput="setCustomValidity('')">

              </span></li>

          </form>
          <?php
          if(isset($_GET['data'])) {
              if ($_GET['data'] == "tidak-data") {
                  echo "Tidak ada!";
              } else { echo "Maaf data yang anda masukan salah!"; }
          }
          ?>
      <br>
          <br>

     <li><input type="submit" value="Konfirmasi" class="button" /></li></ul>
 </div>
</div>
  </form>
           <div class="col-sm-6 col-md-3" >
                    <!-- Begin info box-1 -->
                    <div class="info-box info-box-1">
                        <span class="info-box-icon"><i class="fa fa-thumbs-o-up"></i></span>
                        <div class="info-box-info">
                            <h4 class="info-box-title">Tampilan Elegant</h4>
                            <p class="info-box-text">
                                Manjakan anda dengan tampilan website yang menarik.Tampilan
                                design website yang cocok dengan keinginan anda.
                            </p>
                        </div>
                    </div>
                    <!-- End info box-1 -->
                </div> <!-- /.col -->

                <div class="col-sm-6 col-md-3">
                    <!-- Begin info box-1 -->
                    <div class="info-box info-box-1">
                        <span class="info-box-icon"><i class="fa fa-clock-o"></i></span>
                        <div class="info-box-info">
                            <h4 class="info-box-title">Pengecekan Waktu</h4>
                            <p class="info-box-text">
                                Website Ini dapat mengecek estimasi waktu yang di perlukan
                                untuk menservis kendaraan
                            </p>
                        </div>
                    </div>
                    <!-- End info box-1 -->
                </div> <!-- /.col -->

                <div class="col-sm-6 col-md-3">
                    <!-- Begin info box-1 -->
                    <div class="info-box info-box-1">
                        <span class="info-box-icon"><i class="fa fa-bar-chart"></i></span>
                        <div class="info-box-info">
                            <h4 class="info-box-title">Fitur Komplit</h4>
                            <p class="info-box-text">
                                Website ini mempunya fitur yang memang di butuhkan oleh para pelanggan bengkel
                            </p>
                        </div>
                    </div>
                    <!-- End info box-1 -->
                </div> <!-- /.col -->

                <div class="col-sm-6 col-md-3">
                    <!-- Begin info box-1 -->
                    <div class="info-box info-box-1">
                        <span class="info-box-icon"><i class="fa fa-check-square-o"></i></span>
                        <div class="info-box-info">
                            <h4 class="info-box-title">Memudahkan Pengguna</h4>
                            <p class="info-box-text">
                                Website ini sangat mudah di operasikan dan memudahkan pelanggan untuk mengakses
                            </p>
                        </div>
                    </div>
                    <!-- End info box-1 -->
                </div> <!-- /.col -->

        </center>
    </div>
</section>
  <!--==========================
    Footer
  ============================-->
  <footer id="mvp-foot-wrap" class="left relative">
        <div id="mvp-foot-top" class="left relative">
          <div class="mvp-main-box">
            <div id="mvp-foot-logo" class="left relative">
                              <a href="index.html"><img src="../../images/logo.png" width="150px" height="50px" /></a>
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
<li id="menu-item-30649" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-30649"><a href="../../#tentang">Tentang Kami</a></li>
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

</body>
</html>

