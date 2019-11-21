<?php
include '../../../kontrol/tukangshare.php';
include '../../../koneksi.php';
date_default_timezone_set('Asia/Jakarta');
$tanggal = date("Y-m-d");
$result = mysqli_query($koneksi, "SELECT listbooking.id_booking, listbooking.Nama, listbooking.nopol, jm.jenis_montor, Jm_model.model, listbooking.Perbaikan,listbooking.Lainnya, listbooking.waktu FROM listbooking, jm, jm_model WHERE listbooking.id_jm=jm.id_jm and listbooking.id_model=jm_model.id_model and listbooking.tanggal='$tanggal' and listbooking.Status='Belum Selesai'");

$namaadmin = $_SESSION['username'];
$login = mysqli_query($koneksi,"select dataadmin.Nama from dataadmin where username='$namaadmin'");
$data = mysqli_fetch_assoc($login);
$nama = $data['Nama'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Dashboard Teknisi</title>

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
<div id="wrapper">

    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="navbar-header">
            <a class="navbar-brand" href="index.html">Teknisi Bengkel</a>
        </div>

        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>

        <ul class="nav navbar-right navbar-top-links">
            <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                    <i class="fa fa-user fa-fw"></i> <?php echo $nama ; ?> <b class="caret"></b>
                </a>
                <ul class="dropdown-menu dropdown-user">
                    </li>
                    <li><a href="logout.php"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                    </li>
                </ul>
            </li>
        </ul>
        <!-- /.navbar-top-links -->

        <div class="navbar-default sidebar" role="navigation">
            <div class="sidebar-nav navbar-collapse">
                <ul class="nav" id="side-menu">
                    <li class="sidebar-search">
                        <div class="input-group custom-search-form">
                            <input type="text" class="form-control" placeholder="Search...">
                            <span class="input-group-btn">
                                        <button class="btn btn-primary" type="button">
                                            <i class="fa fa-search"></i>
                                        </button>
                                </span>
                        </div>
                        <!-- /input-group -->
                    </li>
                    <li>
                        <a href="index.php"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</div>



<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Dashboard</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
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
                                        <th >Waktu</th>

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
                                        echo "<td><a href='kerjakan-booking.php?id=$user_data[id_booking]'>Kerjakan</a></td></tr>";

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
