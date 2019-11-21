<!DOCTYPE html>
<html>
<head>
    <title>DATA BOOKING </title>
    <link href="cssnya.css" rel="stylesheet" type="text/css">
</head>
<body>


<center>
    <h2>DATA LAPORAN BARANG</h2>
    <h4>WWW.MALASNGODING.COM</h4>
</center>


<?php
if(isset($_POST['Submit'])) {
$k = $_POST['bulan'];
$t = $_POST['tahun'];
$r = "'$t%'";
$bula = "'%$k%'";
include '../../../koneksi.php';
?>
<script>window.print();</script>

<table border="1" style="width: 100%; height: 200px;">
    <tr>
        <th width="5px">No</th>
        <th width="10">Member ID</th>
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
</table>



</body>
</html>