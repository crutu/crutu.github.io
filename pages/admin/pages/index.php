<?php
include '../../../kontrol/tukangshare.php';
include '../../../koneksi.php';
include 'header.php';
$tanggal = date("Y-m-d");
$result = mysqli_query($koneksi, "SELECT listbooking.id_booking, listbooking.Nama, listbooking.nopol, jm.jenis_montor, Jm_model.model, listbooking.Perbaikan,listbooking.Lainnya, listbooking.waktu FROM listbooking, jm, jm_model WHERE listbooking.id_jm=jm.id_jm and listbooking.id_model=jm_model.id_model and listbooking.tanggal='$tanggal' and listbooking.Status='Belum Selesai'");
$belum = mysqli_query($koneksi, "SELECT listbooking.id_booking, listbooking.Nama, listbooking.nopol, jm.jenis_montor, Jm_model.model, listbooking.Perbaikan,listbooking.Lainnya, listbooking.Teknisi FROM listbooking, jm, jm_model WHERE listbooking.id_jm=jm.id_jm and listbooking.id_model=jm_model.id_model and listbooking.tanggal='$tanggal' and listbooking.Status='Masih Proses'");
$selesai = mysqli_query($koneksi, "SELECT listbooking.id_booking, listbooking.Nama, listbooking.nopol, jm.jenis_montor, Jm_model.model, listbooking.Perbaikan,listbooking.Lainnya, listbooking.Teknisi FROM listbooking, jm, jm_model WHERE listbooking.id_jm=jm.id_jm and listbooking.id_model=jm_model.id_model and listbooking.tanggal='$tanggal' and listbooking.Status='Selesai'");

$conn = mysqli_connect("localhost","root","","web");

$level="Teknisi";
$sqll = "select dataadmin.id_admin, dataadmin.Nama from dataadmin WHERE dataadmin.level='$level'";
$resultt = mysqli_query($conn,$sqll);
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Dashboard Admin</title>

        <!-- Bootstrap Core CSS -->
        <link href="../css/bootstrap.min.css" rel="stylesheet">

        <!-- MetisMenu CSS -->
        <link href="../css/metisMenu.min.css" rel="stylesheet">

        <!-- Timeline CSS -->
        <link href="../css/timeline.css" rel="stylesheet">

        <!-- Custom CSS -->
        <link href="../css/startmin.css" rel="stylesheet">

        <!-- Morris Charts CSS -->
        <link href="../css/morris.css" rel="stylesheet">

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



            <div id="page-wrapper">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Dashboard</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
                <div class="row">
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-comments fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge">
                                        	<?php $sqlCommand = "SELECT COUNT(id_kk) FROM kontakkami"; 
											$query = mysqli_query($koneksi, $sqlCommand) or die (mysqli_error()); 
											$row = mysqli_fetch_row($query);
											echo $row[0]?>		
										</div>
                                        <div>Pesan Baru</div>
                                    </div>
                                </div>
                            </div>
                            <a href="kontak-kami.php">
                                <div class="panel-footer">
                                    <span class="pull-left">Lihat Detail</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>

                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-green">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-tasks fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge">
                                        	<?php 
                                        	$tanggal = date("Y-m-d");
                                        	$sqlCommand = "SELECT COUNT(id_booking) FROM listbooking WHERE listbooking.tanggal='$tanggal'"; 
											$query = mysqli_query($koneksi, $sqlCommand) or die (mysqli_error()); 
											$row = mysqli_fetch_row($query);
											echo $row[0]?>

                                        </div>
                                        <div>Orderan Baru</div>
                                    </div>
                                </div>
                            </div>
                            <a href="listbooking.php">
                                <div class="panel-footer">
                                    <span class="pull-left">Lihat Detail</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>

                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-yellow">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-shopping-cart fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge">
                                        	<?php
                                        	$sqlCommand = "SELECT COUNT(id_booking) FROM listbooking "; 
											$query = mysqli_query($koneksi, $sqlCommand) or die (mysqli_error()); 
											$row = mysqli_fetch_row($query);
											echo $row[0]
											?>
                                        </div>
                                        <div>Total Orderan</div>
                                    </div>
                                </div>
                            </div>
                            <a href="total-booking.php">
                                <div class="panel-footer">
                                    <span class="pull-left">Lihat Detail</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>

                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-red">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-support fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge">
                                        	<?php
                                        	$sqlCommand = "SELECT COUNT(id_admin) FROM dataadmin "; 
											$query = mysqli_query($koneksi, $sqlCommand) or die (mysqli_error()); 
											$row = mysqli_fetch_row($query);
											echo $row[0]
											?>
                                        </div>
                                        <div>Jumlah Karyawan</div>
                                    </div>
                                </div>
                            </div>
                            <a href="datakaryawan.php">
                                <div class="panel-footer">
                                    <span class="pull-left">Lihat Detail</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>

                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                <!-- /.row -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <i class="fa fa-bar-chart-o fa-fw"></i> Data Belum Diservice
                            </div>
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="table-responsive">
                                            <table class="table table-bordered table-hover table-striped">
                                            <thead>
                                            <tr>
                                                <th width="200px;">Nama</th>
                                                <th width="100x;">No. Polisi</th>
                                                <th width="100px;">J. Montor</th>
                                                <th width="100px;">Model</th>
                                                <th >Perbaikan</th>

                                            </tr>
                                            </thead>
                                            <?php
                                            while($user_data = mysqli_fetch_array($result)) {

                                                echo "<tr>";
                                                echo "<td>".$user_data['Nama']."</td>";
                                                echo "<td>".$user_data['nopol']."</td>";
                                                echo "<td>".$user_data['jenis_montor']."</td>";
                                                echo "<td>".$user_data['model']."</td>";
                                                echo "<td>".$user_data['Perbaikan']," , ".$user_data['Lainnya']."</td>";

                                                }
                                            ?>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            </div>
                            <!-- /.panel-body -->
                        </div>
                        <!-- /.panel -->
                                    </div>

                            <!-- /.panel-footer -->
                        </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <i class="fa fa-bar-chart-o fa-fw"></i> Data Yang Sedang di Kerjakan
                            </div>
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="table-responsive">
                                            <table class="table table-bordered table-hover table-striped">
                                                <thead>
                                                <tr>
                                                    <th width="200px;">Nama</th>
                                                    <th width="100x;">No. Polisi</th>
                                                    <th width="100px;">J. Montor</th>
                                                    <th width="100px;">Model</th>
                                                    <th >Perbaikan</th>
                                                    <th >Teknisi</th>
                                                    <th >Aksi</th>
                                                </tr>
                                                </thead>
                                                <?php
                                                while($user_data = mysqli_fetch_array($belum)) {

                                                    echo "<tr>";
                                                    echo "<td>".$user_data['Nama']."</td>";
                                                    echo "<td>".$user_data['nopol']."</td>";
                                                    echo "<td>".$user_data['jenis_montor']."</td>";
                                                    echo "<td>".$user_data['model']."</td>";
                                                    echo "<td>".$user_data['Perbaikan']." , ".$user_data['Lainnya']."</td>";
                                                    echo "<td>".$user_data['Teknisi']."</td>";
                                                    echo "<td><a href='selesai.php?id=$user_data[id_booking]'>Selesai</a></td></tr>";
                                                    }
                                                ?>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /.panel-body -->
                        </div>
                        <!-- /.panel -->
                    </div>

                    <!-- /.panel-footer -->
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <i class="fa fa-bar-chart-o fa-fw"></i> Data Yang Selesai
                            </div>
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="table-responsive">
                                            <table class="table table-bordered table-hover table-striped">
                                                <thead>
                                                <tr>
                                                    <th width="200px;">Nama</th>
                                                    <th width="100x;">No. Polisi</th>
                                                    <th width="100px;">J. Montor</th>
                                                    <th width="100px;">Model</th>
                                                    <th >Perbaikan</th>
                                                </tr>
                                                </thead>
                                                <?php
                                                while($user_data = mysqli_fetch_array($selesai)) {

                                                    echo "<tr>";
                                                    echo "<td>".$user_data['Nama']."</td>";
                                                    echo "<td>".$user_data['nopol']."</td>";
                                                    echo "<td>".$user_data['jenis_montor']."</td>";
                                                    echo "<td>".$user_data['model']."</td>";
                                                    echo "<td>".$user_data['Perbaikan']." , ".$user_data['Lainnya']."</td>";
                                                }
                                                ?>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /.panel-body -->
                        </div>
                        <!-- /.panel -->
                    </div>

                    <!-- /.panel-footer -->
                </div>
                        <!-- /.panel .chat-panel -->
                    </div>

                    <!-- /.col-lg-4 -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /#page-wrapper -->

        </div>
        <!-- /#wrapper -->

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

    </body>
</html>
