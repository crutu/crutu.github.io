<?php
include '../../../koneksi.php';
if (isset($_GET['id'])) {
    $id = ($_GET["id"]);
    $sql = "DELETE FROM kontakkami WHERE kontakkami.id_kk='$id'";
    mysqli_query($koneksi, $sql);
    }

mysqli_close($koneksi);
header("location:kontak-kami.php");
?>