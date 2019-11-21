
<?php
include('../../koneksi.php');
session_start();
$tanggal = date("Y-m-d");
$sqlCommand = "SELECT COUNT(id_booking) FROM listbooking WHERE listbooking.tanggal='$tanggal'";
$query = mysqli_query($koneksi, $sqlCommand) or die (mysqli_error());
$row = mysqli_fetch_row($query);
date_default_timezone_set('Asia/Jakarta');
$waktu = date("G:i:s");
if ($waktu>=0 AND $waktu <24) {
    if (isset($_POST['inputdata'])) {
        $data = "Belum Selesai";
        $idmem = rand(100, 9999);
        $idtrc = rand(100, 99999);
        $id_tracking = "TRC" . $idtrc;
        $id_member = "BS" . $idmem;
        $nama = $_POST['nama'];
        $nohp = $_POST['nohp'];
        $alamat = $_POST['alamat'];
        $nopol = $_POST['nopol'];
        $jm = $_POST['jenis_montor'];
        $model = $_POST['model'];
        $jumlah = $_POST['Perbaikan'];
        $Perbaikans = implode(' ,', $jumlah);
        $lainnya = $_POST['lainnya'];
        $tanggal = date("Y-m-d");
        date_default_timezone_set('Asia/Jakarta');
        $waktu = date("G:i:s");
        $status = $data;

        $sql = 'insert into listbooking (id_member,id_tracking,Nama,no_hp,alamat,nopol,id_jm,id_model,Perbaikan,lainnya,tanggal,waktu,status) values ("' . $id_member . '","' . $id_tracking . '","' . $nama . '","' . $nohp . '","' . $alamat . '","' . $nopol . '","' . $jm . '","' . $model . '","' . $Perbaikans . '","' . $lainnya . '","' . $tanggal . '","' . $waktu . '","' . $status . '")';
        $query = mysqli_query($koneksi, $sql);


        if ($query) {

            header("location: notifikasi.php?id=$id_member"); //kode ini supaya jika data setelah ditambahkan form kembali menuju tabel data siswa
        } else {
            echo 'Gagal';
        }
    }
} else {
    echo "<script>alert('Maaf nih, Bengkel Sudah Tutup. Daftar Jam 7 Pagi ya');document.location.href='bookingservice.php'</script>";
}
?>