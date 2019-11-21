<?php
include '../../koneksi.php';
if (isset($_GET['id'])) {
// ambil nilai id dari url dan disimpan dalam variabel $id
    $id = ($_GET["id"]);

// menampilkan data mahasiswa dari database yang mempunyai id=$id
    $query = "SELECT listbooking.id_member, listbooking.Nama, listbooking.no_hp, listbooking.alamat, listbooking.nopol, listbooking.id_jm, listbooking.id_model,jm.jenis_montor, Jm_model.model FROM listbooking,jm,jm_model WHERE listbooking.id_jm=jm.id_jm and listbooking.id_model=jm_model.id_model and id_member='$id'";
    $result = mysqli_query($koneksi, $query);
// mengecek apakah query gagal
    if(!$result){
        die ("Query Error: ".mysqli_errno($koneksi).
            " - ".mysqli_error($koneksi));
    }
// mengambil data dari database dan membuat variabel" utk menampung data
// variabel ini nantinya akan ditampilkan pada form
    $data = mysqli_fetch_assoc($result);
    $nama = $data["Nama"];
    $no_hp = $data["no_hp"];
    $alamat = $data["alamat"];
    $nopol = $data["nopol"];
    $jm = $data["id_jm"];
    $jm_model = $data["id_model"];
    $Perbaikan = $data["jenis_montor"];
    $waktu = $data["model"];

} else {
// apabila tidak ada data GET id pada akan di redirect ke index.php
    header("location:index.php");
}




?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Bengkel Sukses</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicons -->
    <link href="../../css/Booking/img/favicon.png" rel="icon">
    <link href="../../css/Booking/img/icon.png" rel="apple-touch-icon">

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
    <link href="../../css/Booking/css/stylebooking.css" rel="stylesheet">
    <link href="../../css/footer.css" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Fredoka+One">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto+Condensed">
    <link rel="stylesheet" href="../../css/Booking/css/Navigation-Clean.css">
    <link rel="stylesheet" href="../../css/Booking/css/Navigation-with-Search.css">
    <link rel="stylesheet" href="../../css/Booking/css/Video-Parallax-Background-v2.css">

</head>

<body>
    <?php
    $sql = "select * from jm";
    $result = mysqli_query($koneksi,$sql);

    $sql_kabupaten = "select * from jm_model";
    $result_kabupaten = mysqli_query($koneksi,$sql_kabupaten);
    ?>

<!--==========================
  Header
  ============================-->
  <header id="header">
    <div class="container">

        <div id="logo" class="pull-left">
            <!-- Uncomment below if you prefer to use a text logo -->
            <!-- <h1><a href="#main">C<span>o</span>nf</a></h1>-->
            <a href="#" class="scrollto"><img src="../../css/Booking/img/logo.png" alt="" title="" style="width: 110px;"></a>
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
        <!-- #nav-menu-container -->
    </div>
</header><!-- #header -->

<!--==========================
  Intro Section
  ============================-->
  <!--Input Data Booking-->

  <section id="introv2" >
    <div class="container" style="margin-top: 100px; margin-left: 100px;">
        <form class="form-horizontal" action="../../kontrol/cekid.php" method="post">
            <div class="form-group" ">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group" ">
                            <label class="control-label col-md-12" style="font-size: 30px;">Booking Now</label>
                            <div class="row">
                                <label class="control-label col-md-12" for="Nama">Masukan ID</label>
                                <div class="col-md-9">
                                    <input value="<?php echo $id ?>" name="id_member" type="text" class="form-control" placeholder="Masukan Nama">
                                    <?php
                                    if($data['id_member']!="$id"){
                                        header("location: bookingservice.php?id=$id");

                                    }
                                    ?>
                                </div>
                                <div class="col-md-3">
                                    <button type="submit" class="btn btn-default" name="data">Cek ID</button>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group" ">
                            <label class="control-label col-md-12" style="font-size: 30px;">Apasih Booking Service itu ?</label>
                        </div>
                    </div>

                </form>
                <form class="form-horizontal" action="inputcek.php" method="post">
                    <div class="form-group" ">
                        <div class="row">
                            <div class="col-md-6">

                                <div class="form-group">
                                    <label class="control-label col-sm-2" for="Nama" >Nama:</label>
                                    <div class="col-md-12">
                                        <input value="<?php echo $id ?>" name="id_member" type="hidden" class="form-control" placeholder="Masukan Nama">

                                        <input class="form-control" value="<?php echo $nama ?>" readonly  name="nama">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-sm-2" for="nohp" >No.HP:</label>
                                    <div class="col-sm-12">
                                        <input class="form-control" value="<?php echo $no_hp ?>" readonly  name="no_hp" oninput="setCustomValidity('')" onkeypress="return hanyaAngka(event)" maxlength="13">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-sm-2" for="nohp">Alamat:</label>
                                    <div class="col-sm-12">
                                        <input class="form-control" value="<?php echo $alamat ?>" readonly name="alamat">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-sm-4" for="nohp">No. Polisi:</label>
                                    <label class="control-label col-sm-7" for="nohp" style="font-size: 13px">Contoh : P 2309 WR</label>
                                    <div class="col-sm-12">
                                        <input value="<?php echo $nopol ?>" readonly class="form-control" name="nopol" >
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label class="control-label col-sm-10">Jenis Montor :</label>
                                            <div class="col-md-12">
                                                <select name="jenis_montorr" id="combo_provinsi" class="form-control">
                                                    <option value="<?php echo $jm ?>"><?php echo $Perbaikan ?></option>
                                                    
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">

                                            <label class="control-label col-sm-10">Model :</label>
                                            <div class="col-md-12">
                                                <select name="modell" id="combo_provinsi" class="form-control">
                                                    <option value="<?php echo $jm_model ?>"><?php echo $waktu ?></option>
                                                    
                                                </select>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-sm-10">Perbaikan :</label>
                                    <div class="row" >
                                        <div class="col-md-6">
                                            <div class="col-md-12" style="margin-bottom: 0px;" >
                                                <input type="checkbox" name="Perbaikan[]" value="Pembersihan karburator"> Pembersihan karburator<br>
                                                <input type="checkbox" name="Perbaikan[]" value="Penyetelan karburator"> Penyetelan karburator<br>
                                                <input type="checkbox" name="Perbaikan[]" value="Pembersihan saringan udara"> Pembersihan saringan udara<br>
                                                <input type="checkbox" name="Perbaikan[]" value="Pemeriksaan dan penggantian oli"> Pemeriksaan dan penggantian oli<br>
                                                <input type="checkbox" name="Perbaikan[]" value="Penyetelan dan pelumasan kabel gas"> Penyetelan dan pelumasan kabel gas<br><br>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="col-md-12">
                                                <input type="checkbox" name="Perbaikan[]" value="Penyetelan dan pelumasan rantai roda"> Penyetelan dan pelumasan rantai roda<br>
                                                <input type="checkbox" name="Perbaikan[]" value="Penyetelan rem depan dan belakang"> Penyetelan rem depan dan belakang<br>
                                                <input type="checkbox" name="Perbaikan[]" value="Pemeriksaan dan penambahan air aki"> Pemeriksaan dan penambahan air aki<br>
                                                <input type="checkbox" name="Perbaikan[]" value="Pemeriksaan lampu dan klakson"> Pemeriksaan lampu dan klakson<br>
                                                <input type="checkbox" name="Perbaikan[]" value="Penyetelan kopling"> Penyetelan kopling<br><br>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <input type="text" name="lainnya" class="form-control" placeholder="Perbaikan Lainnya">
                                    </div>
                                </div>
                                <div class="col-sm-offset-2 col-sm-10">
                                    <button type="submit" class="btn btn-default" name="input">Submit</button>
                                </div>
                            </div>


                            <!-- Tutup Input Data Booking-->
                            <!--deskripsi booking-->
                            <div class="col-md-6" style="background: #80808080; left: 0px;">

                                <h1 class="text-center" style="font-family cursive;margin:0px;color:rgb(225,11,11);font-size:49px;">Booking <span style="color: #ff0000"><span><span style="color: rgb(0,0,0)"> Service</h1>
                                    <p class="text-justify" style="font-family:'Roboto Condensed', sans-serif;font-size:20px;">&nbsp; &nbsp; &nbsp; &nbsp; Booking service merupakan layanan yang memberikan kepastian waktu dan teknisi, tidak perlu antri. Cukup isi fotm Nama , Email Hari / Tanggal / Jam , Perbaikan , Jenis Motor untuk mendapatkan no antrian<br></p>
                                    <div class="row no-gutters">
                                        <div class="col-md-6 venue-map">
                                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d16261133.722345112!2d101.47527059651857!3d-5.921867140161616!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x1f7998f910e0e5db!2sBengkel+Sukses!5e0!3m2!1sid!2sid!4v1542260650297" frameborder="0" style="border:0" width="500px" height="500px" allowfullscreen></iframe>
                                        </div>
                                    </div>
                                </div>

                            </form>

                        </div>
                    </section>


                    <!--deskripsi booking-->


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
      <!-- #footer -->

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
<script src="js/main.js"></script>
<script src="js/jquery-1.11.2.min.js"></script>
<!-- js untuk bootstrap -->
<script src="js/bootstrap.js"></script>

<script type="text/javascript">
    $(document).ready(function(){
        var combo_kabupaten = $("#combo_kabupaten");

        temp = combo_kabupaten.children(".dt").clone();
        $("#combo_provinsi").change(function(){
            var value = $(this).val();
            combo_kabupaten.children(".dt").remove();
            if(value!==''){
                temp.clone().filter("."+value).appendTo(combo_kabupaten);
            } else {
                temp.clone().appendTo(combo_kabupaten);
            }
        });
    });
</script>
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

