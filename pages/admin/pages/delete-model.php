<?php
include '../../../koneksi.php';
if (isset($_GET['id'])) {
    // ambil nilai id dari url dan disimpan dalam variabel $id
    $id = ($_GET["id"]);
    $sql = "DELETE FROM jm_model WHERE id_model='$id'";

    if (mysqli_query($koneksi, $sql)) {
        echo "Record deleted successfully";
    } else {
        echo "Error deleting record: " . mysqli_error($koneksi);
    }
}

mysqli_close($koneksi);
header("location:data-model.php");
?>