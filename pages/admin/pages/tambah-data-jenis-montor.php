<?php
include '../../../kontrol/tukangshare.php';
include '../../../koneksi.php';
$tanggal = date("Y-m-d");

$result = mysqli_query($koneksi, "SELECT jm.id_jm, jm.jenis_montor FROM jm ");


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Tambah Data Jenis Montor</title>

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
include 'header.php'
?>


<div id="page-wrapper">

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Tambah Data</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->

    <div class="row" style="margin-bottom: 5%;">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Data Booking Servise <?php echo date("d-m-Y");?>
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                            <thead>
                            <tr>
                                <th width="100px;">Kode Model</th>
                                <th >Model</th>
                                <th width="100px;"> Aksi</th>
                            </tr>
                            </thead>
                            <?php
                            while($user_data = mysqli_fetch_array($result)) {

                                echo "<tr>";
                                echo "<td>".$user_data['id_jm']."</td>";
                                echo "<td>".$user_data['jenis_montor']."</td>";
                                echo "<td><a href='edit-data-jm.php?id=$user_data[id_jm]'>Edit</a> | <a href='delete-jm.php?id=$user_data[id_jm]'>Delete</a></td></tr>";
                            }
                            ?>


                        </table>
                    </div>
                </div>
            </div>
            <div class="col-lg-3"
            <div class="col-lg-12">
            <form action="tambah-jm.php" method="post">
                <button class="btn btn-primary" type="">Tambahkan Data Jenis Montor</button>
            </form>
            </div>
        </div>
            </div>
    </div>
        </div>

        <!-- /.col-lg-12 -->
        <!-- /.row -->

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
