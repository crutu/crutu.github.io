<?php
include('../../koneksi.php');
date_default_timezone_set('Asia/Jakarta');
$waktu = date("G:i:s");
if ($waktu>=0 AND $waktu <17) {
    if (isset($_POST['input'])) {
        $data = "Belum Selesai";
        $idtrc = rand(100, 99999);
        $id_tracking = "TRC" . $idtrc;
        $id_membe = $_POST['id_member'];
        $nama = $_POST['nama'];
        $nohp = $_POST['no_hp'];
        $alamat = $_POST['alamat'];
        $nopol = $_POST['nopol'];
        $jm = $_POST['jenis_montorr'];
        $model = $_POST['modell'];
        $jumlah = $_POST['Perbaikan'];
        $Perbaikans = implode(' ,', $jumlah);
        $lainnya = $_POST['lainnya'];
        $tanggal = date("Y-m-d");
        date_default_timezone_set('Asia/Jakarta');
        $waktu = date("h:i:s");
        $status = $data;

        $sql = 'insert into listbooking (id_member, id_tracking, Nama,no_hp,alamat,nopol,id_jm,id_model,Perbaikan,lainnya,tanggal,waktu,status) values ("' . $id_membe . '","' . $id_tracking . '","' . $nama . '","' . $nohp . '","' . $alamat . '","' . $nopol . '","' . $jm . '","' . $model . '","' . $Perbaikans . '","' . $lainnya . '","' . $tanggal . '","' . $waktu . '","' . $status . '")';
        $query = mysqli_query($koneksi, $sql);

        if ($query) {
            header("location: notifikasi.php?id=$id_membe"); //kode ini supaya jika data setelah ditambahkan form kembali menuju tabel data siswa
        } else {
            echo 'Gagal';
        }
    }
}
     else {
        echo "<script>alert('Maaf nih, Bengkel Sudah Tutup. Daftar Jam 7 Pagi ya');document.location.href='bookingservice.php'</script>";

}
?>