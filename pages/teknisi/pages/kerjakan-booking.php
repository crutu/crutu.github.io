<?php
include '../../../kontrol/tukangshare.php';
include '../../../koneksi.php';
if (isset($_GET['id'])) {
    $namaadmin = $_SESSION['username'];
    $login = mysqli_query($koneksi,"select dataadmin.Nama from dataadmin where username='$namaadmin'");
    $data = mysqli_fetch_assoc($login);
    $nama = $data['Nama'];
    echo $nama;
    // ambil nilai id dari url dan disimpan dalam variabel $id
    $id = ($_GET["id"]);

    // menampilkan data mahasiswa dari database yang mempunyai id=$id
    $query = "UPDATE listbooking set Teknisi='$nama', status='Masih Proses' WHERE id_booking='$id'";
    $result = mysqli_query($koneksi, $query);
    header("location: index.php");
}
    ?>