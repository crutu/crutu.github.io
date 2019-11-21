<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Booking Service</title>
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
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,700">


    <!-- Main Stylesheet File -->

    <link rel="stylesheet" href="../../css/navbar.css">
    <link rel="stylesheet" type="text/css" href="../../css/bootstrap-booking.css">
    <link rel="stylesheet" type="text/css" href="../../css/style-booking.css?v=1.1.3">
    <link rel="stylesheet" href="../../css/Footer-with-button-logo.css">
    <link data-optimized='2' rel='stylesheet' href='../../css/footer.css' />
    <script type="text/javascript" src="../../js/new/jquery.min.js"></script>

</head>

 <!--==========================
    Header
  ============================-->
  <header id="header">
    <div class="container">
        <?php
        include"../../koneksi.php";
        $conn = mysqli_connect("localhost","root","","web");


        $sql = "select * from jm";
        $result = mysqli_query($conn,$sql);

        $sql_kabupaten = "select * from jm_model";
        $result_kabupaten = mysqli_query($conn,$sql_kabupaten);
        ?>

      <div id="logo" class="pull-left">
        <a href="../../index.php" class="scrollto"><img src="../../images/logo.png" alt="" title="" style="width: 110px;"></a>
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

<br><br><br><br><br>
<div class="container service-book">
    <ul class="menu-detail flex justify-content-center"></ul>
    <div class="row flex justify-content-center">
        <div class="col-8">
            <div class="book-title">
                <h1>Booking Service</h1>
            </div>
      <form class="form-horizontal" action="../../kontrol/cekid.php" method="post">
          <div class="form-group" ">
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <div class="row">
                    <label class="nama col-md-12" for="Nama">Masukan ID</label>
                    <div class="col-md-8">

                      <input name="id_member" type="text" class="form-control" id="Nama" placeholder="Masukan Nama">
                      <?php
                      if (isset($_GET['id'])) {
                        $id = ($_GET["id"]);
                        $query = "SELECT listbooking.id_member FROM listbooking WHERE id_member='$id'";
                        $result = mysqli_query($koneksi, $query);
                        if (!$result) {
                          die ("Query Error: " . mysqli_errno($koneksi) .
                            " - " . mysqli_error($koneksi));
                        }

                        $data = mysqli_fetch_assoc($result);
                        if ($data['id_member'] != "$id") {
                          echo "<script>alert('Maaf ID Member Tidak Terdaftar');document.location.href='bookingservice.php'</script>";


                        } 
                      }
                      ?>
                    </div>
                    <div class="col-md-3">
                      <button type="submit" class="btn btn-default" name="inputdata">Cek ID</button>
                    </div>
                  </div>
                </div>
              </div>
              </div>
          </form>
            <div class="book-content">
                <div id="msgBooking"></div>
                <form id="formBooking" action="input.php" method="post" >
                    <div class="form-group row">
                        <div class="col-6">
                            <label for="name" class="col-12">Nama </label>
                                <input name="nama" type="text" class="form-control" id="Nama" placeholder="Masukan Nama" required oninvalid="this.setCustomValidity('Masukan Nama Kamu')" oninput="setCustomValidity('')">
                        </div>
                        <div class="col-6">
                            <label for="phone" class="col-12">Telepon</label>
                            <div class="row" style="margin-left:-10px;margin-right:-10px;">
                                <div class="col-12">
                                    <input name="nohp" type="text" class="form-control" id="nohp" placeholder="Masukan No.HP" required oninvalid="this.setCustomValidity('Masukan No HP Kamu')" oninput="setCustomValidity('')" onkeypress="return hanyaAngka(event)" maxlength="13">
                                </div>
                            </div>
                    </div>
                </div>
                    <div class="form-group row">
                        <div class="col-6">
                            <label for="vin_number" class="col-12">Alamat</label>
                             <input name="alamat" type="text" class="form-control" id="nohp" placeholder="Masukan Alamat" required oninvalid="this.setCustomValidity('Masukan Alamat Kamu')" oninput="setCustomValidity('')">
                        </div>
                        <div class="col-6">
                            <label for="license_number" class="col-12">Nomor Polisi</label>
                            <input name="nopol" type="text" class="form-control" id="nohp" placeholder="Masukan No. Polisi" required oninvalid="this.setCustomValidity('Masukan Nomor Polisi Kamu')" oninput="setCustomValidity('')">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-6">
                            <label for="license_name" class="col-12">Jenis Motor :</label>
                            <select name="jenis_montor" id="combo_provinsi" class="form-control" required oninvalid="this.setCustomValidity('Silahkan Pilih')" oninput="setCustomValidity('')">
                                <option value="">--Jenis Montor--</option>
                                <?php
                                while($row=mysqli_fetch_assoc($result)){
                                    echo'<option value="'.$row['id_jm'].'">'.$row['jenis_montor'].'</option>';
                                }
                                ?>
                            </select>
                        </div>
                        <div class="col-6">
                            <label for="service_type" class="col-12">Model :</label>
                            <select name="model" id="combo_kabupaten" class="form-control " required oninvalid="this.setCustomValidity('Silahkan Pilih')" oninput="setCustomValidity('')">
                                <option value="">--Pilih Model--</option>
                                <?php
                                while($row=mysqli_fetch_assoc($result_kabupaten)){
                                    echo'<option class="dt '.$row['id_jm'].'" value="'.$row['id_model'].'">'.$row['model'].'</option>';
                                }
                                ?>
                            </select>
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
        <div class="col-md-12">
            <label for="license_name" class="col-12">Perbaikan Lainnya :</label>
          <input type="text" name="lainnya" class="form-control" placeholder="Perbaikan Lainnya">
        </div>
    </div>
</div>
                    <div class="button">
                        <button class="btn btn-primary btn-lg " name="inputdata" type="submit">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
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
