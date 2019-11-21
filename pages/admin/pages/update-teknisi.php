<?php
include '../../../koneksi.php';
$id = $_GET['id'];

$name=['if'];
echo $name;
$koneksi = mysqli_connect("localhost","root","","web");
mysqli_query($koneksi, "UPDATE listbooking SET listbooking.Teknisi='$name' WHERE id_booking='$id'");

// Redirect to homepage to display updated user in list

?>