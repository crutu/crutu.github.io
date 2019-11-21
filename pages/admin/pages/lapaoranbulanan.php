<?php
include '../../../kontrol/tukangshare.php';
include '../../../koneksi.php';
?>
<!DOCTYPE html>
<html>
<head>
    <title>DATA BOOKING </title>
    <link href="cssnya.css" rel="stylesheet" type="text/css">
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
        <script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/respond.js/1.4.2/respond.min.js"></script>
</head>
<body>
<?php
include 'header.php'
?>
<div id="page-wrapper">

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Laporan Booking</h1>
        </div>
<center>
    <form action="lapaoranbulanan.php" method="post">
    Bulan
    <select name="bulan">
        <option value="01">Januari</option>
        <option value="02">Februari</option>
        <option value="03">Maret</option>
        <option value="04">April</option>
        <option value="05">Mei</option>
        <option value="06">Juni</option>
        <option value="07">Juli</option>
        <option value="08">Agustus</option>
        <option value="09">September</option>
        <option value="10">Oktober</option>
        <option value="11">November</option>
        <option value="12">Desember</option>
    </select>
    Tahun
    <select name="tahun">
        <?php
        $k=0;
        $mulai= date('Y') -5;
        for($i = $mulai;$i<$mulai + 10;$i++){
            $sel = $i == date('Y') ? ' selected="selected"' : '';
            echo '<option value="'.$i.'"'.$sel.'>'.$i.'</option>';
        }
        ?>
    </select>
        <button type="submit" name="Submit">Proses</button>
    </form>
</center>

<form action="cetak-laporan.php" method="post">


<?php
if(isset($_POST['Submit'])) {
$k = $_POST['bulan'];
$t = $_POST['tahun'];
$r = "'$t%'";
$bula = "'%$k%'";

include '../../../koneksi.php';
?>
    <button type="submit" name="Submit">CETAK</button>
<input hidden name="tahun" value="<?php echo $t; ?>">
    <input hidden name="bulan" value="<?php echo $k; ?>">
    <div class="panel-body">
        <div class="table-responsive">
            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                <thead>
    <tr>
        <th width="5px">No</th>
        <th width="10">ID</th>
        <th width="20">Nama</th>
        <th width="10%">Jenis</th>
        <th width="11%">Model</th>
        <th width="11%">No. Polisi</th>
        <th>Perbaikan</th>
    </tr>
    <?php
    $no = 1;
    $sql = mysqli_query($koneksi, "select listbooking.id_member, listbooking.Nama, jm.jenis_montor,jm_model.model,listbooking.nopol,listbooking.perbaikan from listbooking, jm,jm_model where listbooking.id_jm=jm.id_jm and tanggal like $r and listbooking.id_model=jm_model.id_model and tanggal like $bula ");
    while ($data = mysqli_fetch_array($sql)) {
        ?>
        <tr>
            <td><?php echo $no++; ?></td>
            <td><?php echo $data['id_member']; ?></td>
            <td><?php echo $data['Nama']; ?></td>
            <td><?php echo $data['jenis_montor']; ?></td>
            <td><?php echo $data['model']; ?></td>
            <td><?php echo $data['nopol']; ?></td>
            <td><?php echo $data['perbaikan']; ?></td>
        </tr>
        <?php
    }
    }
    ?>
                </thead>
</table>
        </div>
    </div>

</form>

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
</body>
</html>