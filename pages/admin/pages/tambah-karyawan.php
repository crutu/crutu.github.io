<?php
include '../../../kontrol/tukangshare.php';
include '../../../koneksi.php';
$tanggal = date("Y-m-d");
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
include 'header.php'
?>
<?php
include"../../../koneksi.php";
$conn = mysqli_connect("localhost","root","","web");


$sql = "select * from jm";
$result1 = mysqli_query($conn,$sql);
?>

<div id="page-wrapper" >
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Tambahkan Data Jenis Montor</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row" class="">
        <div class="col-lg-7">
            <div class="panel panel-default">
                <div class="panel-heading">

                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <form role="form" action="tambah-karyawan.php" method="post">
                                <div class="form-group">
                                    <label>Masukan Nama</label>
                                    <input class="form-control" name="nama">
                                </div>
                                <div class="form-group">
                                    <label>Masukan Username</label>
                                    <input class="form-control" name="username">
                                </div>
                                <div class="form-group">
                                    <label>Masukan Password</label>
                                    <input class="form-control" name="password">
                                </div>
                                <div class="form-group">
                                    <label>Level</label>
                                    <input class="form-control" name="level">
                                </div>
                                <button type="submit" class="btn btn-primary" name="Submit" value="Tambahkan">Submit Button</button>
                            </form>

                        </div>

                    </div>
                    <?php

                    // Check If form submitted, insert form data into users table.
                    if(isset($_POST['Submit'])) {
                        $nama =  $_POST['nama'];
                        $username = $_POST['username'];
                        $password = $_POST['password'];
                        $level = $_POST['level'];

                        // include database connection file


                        // Insert user data into table
                        $result = mysqli_query($koneksi, "INSERT INTO dataadmin (dataadmin.Nama,dataadmin.username,dataadmin.password, dataadmin.level) VALUES('$nama','$username','$password','$level')");

                        // Show message when user added
                        echo "Data Berhasil ditambahkan";
                    }
                    ?>
                    <!-- /.row (nested) -->
                </div>

                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
</div>



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
