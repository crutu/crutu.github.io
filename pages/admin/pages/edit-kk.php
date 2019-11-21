<?php
include '../../../kontrol/tukangshare.php';
include '../../../koneksi.php';
if (isset($_GET['id'])) {
    // ambil nilai id dari url dan disimpan dalam variabel $id
    $id = ($_GET["id"]);

    // menampilkan data mahasiswa dari database yang mempunyai id=$id
    $query = "SELECT kontakkami.id_kk , kontakkami.Nama, kontakkami.Email,kontakkami.subjek,kontakkami.Pesan FROM kontakkami WHERE kontakkami.id_kk='$id'";
    $result = mysqli_query($koneksi, $query);
    // mengecek apakah query gagal
    if(!$result){
        die ("Query Error: ".mysqli_errno($koneksi).
            " - ".mysqli_error($koneksi));
    }
    $data = mysqli_fetch_assoc($result);
    $id_kk = $data["id_kk"];
    $name = $data["Nama"];
    $Email = $data["Email"];
    $subjek = $data["subjek"];
    $pesan = $data["Pesan"];
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
                    Edit data Kontak Kami
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <form role="form" action="pembaruan-kk.php" method="post">
                                <div class="form-group">
                                    <label>Nama</label>
                                    <input hidden name="idfile" value="<?php echo $id_kk; ?>">
                                    <input class="form-control" value="<?php echo $name ?>"  name="nama">

                                </div>
                                <div class="form-group">
                                    <label>Email</label>
                                    <input class="form-control" value="<?php echo $Email ?>" name="email">

                                </div>
                                <div class="form-group">
                                    <label>Subjek</label>
                                    <input class="form-control" value="<?php echo $subjek ?>" name="subjek">

                                </div>
                                <div class="form-group">
                                    <label>Pesan</label>
                                    <input class="form-control" value="<?php echo $pesan ?>" name="pesan">

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
