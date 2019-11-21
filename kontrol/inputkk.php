<?php
include "../koneksi.php";
if (isset($_POST['inputkk'])) {
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $subjek = $_POST['subjek'];
    $pesan = $_POST['pesan'];
    $sql = 'insert into kontakkami (id_kk,Nama,Email,subjek,Pesan) values ("","' . $nama . '","' . $email . '","' . $subjek . '","' . $pesan . '")';
    $query = mysqli_query($koneksi, $sql);
    header("location: ../index.php");
    }
?>