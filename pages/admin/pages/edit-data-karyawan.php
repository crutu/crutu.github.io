<?php
include '../../../kontrol/tukangshare.php';
include '../../../koneksi.php';
if (isset($_GET['id'])) {
    $id = ($_GET["id"]);

    $query = "SELECT dataadmin.id_admin,dataadmin.Nama,dataadmin.username,dataadmin.password, dataadmin.level FROM  dataadmin where id_admin='$id'";

    $result = mysqli_query($koneksi, $query);
    // mengecek apakah query gagal
    if(!$result){
        die ("Query Error: ".mysqli_errno($koneksi).
            " - ".mysqli_error($koneksi));
    }
    // mengambil data dari database dan membuat variabel" utk menampung data
    // variabel ini nantinya akan ditampilkan pada form
    $data = mysqli_fetch_assoc($result);
    $id = $data["id_admin"];
    $nama = $data["Nama"];
    $username = $data["username"];
    $password = $data["password"];
    $level = $data["level"];

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
                    Edit data Model
                    </p>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <form role="form" action="pembaruan-data-karyawan.php" method="post">
                                <div class="form-group">
                                    <label>Nama</label>
                                    <input hidden name="id" value="<?php echo $id; ?>">
                                    <input class="form-control" value="<?php echo $nama; ?>"  name="nama">
                                </div>
                                <div class="form-group">
                                    <label>Nama</label>
                                    <input class="form-control" value="<?php echo $username; ?>"  name="username">
                                </div>
                                <div class="form-group">
                                    <label>Nama</label>
                                    <input class="form-control" value="<?php echo $password; ?>"  name="password">
                                </div>
                                <div class="form-group">
                                    <label>Nama</label>
                                    <input class="form-control" value="<?php echo $level; ?>"  name="level">
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
