<?php
include '../../../kontrol/tukangshare.php';
include '../../../koneksi.php';
  if (isset($_GET['id'])) {
    // ambil nilai id dari url dan disimpan dalam variabel $id
    $id = ($_GET["id"]);

    // menampilkan data mahasiswa dari database yang mempunyai id=$id
    $query = "SELECT listbooking.id_booking, listbooking.Nama, listbooking.no_hp, listbooking.alamat, listbooking.nopol,listbooking.id_jm,listbooking.id_model, jm.jenis_montor, jm_model.model, listbooking.Perbaikan, listbooking.waktu FROM listbooking,jm,jm_model WHERE listbooking.id_jm=jm.id_jm and listbooking.id_model=jm_model.id_model and listbooking.id_booking='$id'";
    $result = mysqli_query($koneksi, $query);
    // mengecek apakah query gagal
    if(!$result){
      die ("Query Error: ".mysqli_errno($koneksi).
         " - ".mysqli_error($koneksi));
    }    
    // mengambil data dari database dan membuat variabel" utk menampung data
    // variabel ini nantinya akan ditampilkan pada form
    $data = mysqli_fetch_assoc($result);
    $id_book = $data["id_booking"];
    $name = $data["Nama"];
    $no_hp = $data["no_hp"];
    $alamat = $data["alamat"];
    $nopol = $data["nopol"];
      $id_jm = $data["id_jm"];
      $id_model = $data["id_model"];
    $jm = $data["jenis_montor"];
    $jm_model = $data["model"];
    $Perbaikan = $data["Perbaikan"];
    $waktu = $data["waktu"];

  } else {
    // apabila tidak ada data GET id pada akan di redirect ke index.php
    header("location:index.php");
  }



?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Startmin - Bootstrap Admin Theme</title>

        <!-- Bootstrap Core CSS -->
        <link href="../css/bootstrap.min.css" rel="stylesheet">
        <!-- MetisMenu CSS -->
        <link href="../css/metisMenu.min.css" rel="stylesheet">

        <!-- DataTables CSS -->
        <link href="../css/dataTables/dataTables.bootstrap.css" rel="stylesheet">

        <!-- DataTables Responsive CSS -->
        <link href="../css/dataTables/dataTables.responsive.css" rel="stylesheet">

        <!-- Custom CSS -->
        <link href="../css/startmin.css" rel="stylesheet">

        <!-- Custom Fonts -->
        <link href="../css/font-awesome.min.css" rel="stylesheet" type="text/css">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body>
        <?php
        include 'header.php';
        $sql = "select * from jm";
        $result = mysqli_query($koneksi,$sql);

        $sql_kabupaten = "select * from jm_model";
        $result_kabupaten = mysqli_query($koneksi,$sql_kabupaten);
        ?>
    

         <div id="page-wrapper" >
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Edit Data</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
                <div class="row" >
                    <div class="col-lg-7">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                Edit data A/N : <?php echo $name ?>
                                    </p>
                                    </div>
                                    <div class="panel-body">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <form role="form" action="pembaruan.php" method="post">
                                                    <div class="form-group">
                                                        <label>Nama</label>
                                                        <input hidden name="id_booking" value="<?php echo $id; ?>">
                                                        <input class="form-control" value="<?php echo $name ?>"  name="nama">
                                                        
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Nomor Handphone</label>
                                                        <input class="form-control" value="<?php echo $no_hp ?>" name="nohp">
                                                        
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Alamat</label>
                                                        <input class="form-control" value="<?php echo $alamat ?>" name="alamat">
                                                        
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Nomor Polisi</label>
                                                        <input class="form-control" value="<?php echo $nopol ?>" name="nopol">
                                                        
                                                    </div>
                                                        <div class="form-group">
                                                          <label>Jenis Montor :</label>
                                                              <select name="id_jm" class="form-control" >
                                                                <option value="<?php echo $id_jm ?>"><?php echo $jm ?></option>
                                                                <?php
                                                                while($row=mysqli_fetch_assoc($result)){
                                                                  echo'<option value="'.$row['id_jm'].'">'.$row['jenis_montor'].'</option>';
                                                                  }
                                                                ?>
                                                              </select>
                                                          </div>
                                                        <div class="form-group">
                                                          <label>Jenis Montor :</label>
                                                              <select name="model" id="combo_kabupaten" class="form-control " >
                                                                <option value="<?php echo $id_model ?>"><?php echo $jm_model ?></option>
                                                                <?php
                                                                while($row=mysqli_fetch_assoc($result_kabupaten)){
                                                                echo'<option value="'.$row['id_model'].'">'.$row['model'].'</option>';
                                                                  }
                                                                ?>
                                                              </select>
                                                          </div>
                                                    <div class="form-group">
                                                        <label>Waktu</label>
                                                        <input class="form-control" value="<?php echo $Perbaikan ?>" name="perbaikan">
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Waktu</label>
                                                        <input class="form-control" value="<?php echo $waktu ?>" name="waktu">
                                                    </div>
                                                    <button type="submit" class="btn btn-default">Submit Button</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                <!-- /.row -->
            </div>

   
    </body>
        <!-- jQuery -->
        <script src="../js/jquery.min.js"></script>

        <!-- Bootstrap Core JavaScript -->
        <script src="../js/bootstrap.min.js"></script>

        <!-- Metis Menu Plugin JavaScript -->
        <script src="../js/metisMenu.min.js"></script>

        <!-- DataTables JavaScript -->
        <script src="../js/dataTables/jquery.dataTables.min.js"></script>
        <script src="../js/dataTables/dataTables.bootstrap.min.js"></script>

        <!-- Custom Theme JavaScript -->
        <script src="../js/startmin.js"></script>

        <!-- Page-Level Demo Scripts - Tables - Use for reference -->
        <script>
            $(document).ready(function() {
                $('#dataTables-example').DataTable({
                        responsive: true
                });
            });
        </script>
    </body>
</html>
