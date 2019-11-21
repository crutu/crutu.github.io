<?php
include '../../../kontrol/tukangshare.php';
include '../../../koneksi.php';
if (isset($_GET['id'])) {
    // ambil nilai id dari url dan disimpan dalam variabel $id
    $id = ($_GET["id"]);

    // menampilkan data mahasiswa dari database yang mempunyai id=$id
    $query = "UPDATE listbooking set status='Selesai' WHERE id_booking='$id'";
    $result = mysqli_query($koneksi, $query);
    header("location: index.php");
}
?>