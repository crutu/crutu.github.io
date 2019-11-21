<?php
// koneksi database
include '../../../koneksi.php';

$id	= $_POST['idfile'];
$nama	= $_POST['nama'];
$email	= $_POST['email'];
$subjek	= $_POST['subjek'];
$pesan	= $_POST['pesan'];
mysqli_query($koneksi, "UPDATE kontakkami SET kontakkami.Nama ='$nama',kontakkami.Email='$email',kontakkami.subjek='$subjek',kontakkami.Pesan='$pesan' where id_kk='$id'");

header("location:kontak-kami.php");

?>