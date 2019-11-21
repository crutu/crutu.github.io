<?php
// koneksi database
include '../../../koneksi.php';

// menangkap data yang di kirim dari form
$id	= $_POST['id'];
$nama	= $_POST['nama'];
$username	= $_POST['username'];
$password	= $_POST['password'];
$level	= $_POST['level'];

mysqli_query($koneksi, "UPDATE dataadmin SET dataadmin.Nama='$nama',dataadmin.username='$username',dataadmin.password='$password', dataadmin.level='$level' where id_admin='$id'");
// mengalihkan halaman kembali ke index.php

header("location:datakaryawan.php");

?>