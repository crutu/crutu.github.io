<?php
include('../koneksi.php');
if(isset($_POST['ttambah'])){ //['ttambah'] merupakan name dari button di form tambah
	$nis	= $_POST['nis'];
	$nama	= $_POST['nama'];
	$alamat	= $_POST['alamat'];
	$kelas	= $_POST['kelas'];
	
	$sql	= 'insert into siswa (nis,nama,alamat,kelas) values ("'.$nis.'","'.$nama.'","'.$alamat.'","'.$kelas.'")';
	$query	= mysqli_query($koneksi,$sql);
	
	if($query){
		header('location: siswa.php'); //kode ini supaya jika data setelah ditambahkan form kembali menuju tabel data siswa
	}
	else{
		echo 'Gagal';
	}
}
?>