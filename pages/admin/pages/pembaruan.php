<?php
// koneksi database
include '../../../koneksi.php';

// menangkap data yang di kirim dari form
	$id	= $_POST['id_booking'];
	$nama	= $_POST['nama'];
	$nohp	= $_POST['nohp'];
	$alamat	= $_POST['alamat'];
	$nopol	= $_POST['nopol'];
	$jm		= $_POST['id_jm'];
	$model	= $_POST['model'];
	$jumlah = $_POST['perbaikan'];
    echo $jm;
mysqli_query($koneksi, "UPDATE listbooking SET listbooking.Nama ='$nama', listbooking.no_hp='$nohp',listbooking.alamat='$alamat',listbooking.nopol='$nopol',listbooking.id_jm='$jm',listbooking.id_model='$model',listbooking.Perbaikan='$jumlah' where id_booking='$id'");
// mengalihkan halaman kembali ke index.php

header("location:listbooking.php");

?>