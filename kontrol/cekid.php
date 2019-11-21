<?php
session_start();
include '../koneksi.php';
$id = $_POST['id_member'];
header("location:../pages/booking/bookingservicecek.php?id=$id");

/**
 * Created by PhpStorm.
 * User: Ainun Najib
 * Date: 11/30/2018
 * Time: 12:58 PM
 */