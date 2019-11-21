<?php 
// mengaktifkan session pada php
session_start();

// menghubungkan php dengan koneksi database
include '../koneksi.php';

// menangkap data yang dikirim dari form login
$username = $_POST['username'];
$password = $_POST['password'];


// menyeleksi data user dengan username dan password yang sesuai
$login = mysqli_query($koneksi,"select * from dataadmin where username='$username' and password='$password'");
// menghitung jumlah data yang ditemukan
$cek = mysqli_num_rows($login);

// cek apakah username dan password di temukan pada database
if($cek > 0){

    $data = mysqli_fetch_assoc($login);

    // cek jika user login sebagai admin
    if($data['level']=="Admin"){

        // buat session login dan username
        $_SESSION['username'] = $username;
        $_SESSION['level'] = "Admin";
        header("location:../pages/admin/pages/");

    }else if($data['level']=="Teknisi"){
        // buat session login dan username
        $_SESSION['username'] = $username;
        $_SESSION['level'] = "Teknisi";
        // alihkan ke halaman dashboard pegawai
        header("location:../pages/teknisi/pages/");

    }else if($data['level']=="Customer"){
        // buat session login dan username
        $_SESSION['username'] = $username;
        $_SESSION['level'] = "Customer";
        // alihkan ke halaman dashboard pengurus
        header("location:halaman_pengurus.php");

    }else{

        // alihkan ke halaman login kembali
        header("location:../loginadmin.php?pesan=belum_login");
    }   
}else{
    header("location: ../loginadmin.php?pesan=gagal");
}

?>