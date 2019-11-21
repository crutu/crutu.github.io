<?php
// koneksi database
include '../../../koneksi.php';

// menangkap data yang di kirim dari form
$id	= $_POST['id'];
$nama	= $_POST['nama'];

mysqli_query($koneksi, "UPDATE jm SET model ='$nama' where id_jm='$id'");
// mengalihkan halaman kembali ke index.php

header("location:tambah-data-jenis-montor.php");

?>