<div align="center"><strong>REKAP DATA PENJUALAN</strong><br />
</div>
<form id="form1" name="form1" method="post" action="?proses=cetak">
    Tampil Data :
    <select name="tgl1" id="tgl1">
        <option>	01	</option>
        <option>	02	</option>
        <option>	03	</option>
        <option>	04	</option>
        <option>	05	</option>
        <option>	06	</option>
        <option>	07	</option>
        <option>	08	</option>
        <option>	09	</option>
        <option>	10	</option>
        <option>	11	</option>
        <option>	12	</option>
        <option>	13	</option>
        <option>	14	</option>
        <option>	15	</option>
        <option>	16	</option>
        <option>	17	</option>
        <option>	18	</option>
        <option>	19	</option>
        <option>	20	</option>
        <option>	21	</option>
        <option>	22	</option>
        <option>	23	</option>
        <option>	24	</option>
        <option>	25	</option>
        <option>	26	</option>
        <option>	27	</option>
        <option>	28	</option>
        <option>	29	</option>
        <option>	30	</option>
        <option>	31	</option>
    </select>
    <select name="bln1" id="bln1">
        <option	 value="01"	>	Januari	</option>
        <option	 value="02"	>	Februari	</option>
        <option	 value="03"	>	Maret	</option>
        <option	 value="04"	>	April	</option>
        <option	 value="05"	>	Mei	</option>
        <option	 value="06"	>	Juni	</option>
        <option	 value="07"	>	Juli	</option>
        <option	 value="08"	>	Agustus	</option>
        <option	 value="09"	>	September	</option>
        <option	 value="10"	>	Oktober	</option>
        <option	 value="11"	>	Nopember	</option>
        <option	 value="12"	>	Desember	</option>

    </select>

    <select name="thn1" id="thn1">
        <? for($i=2012;$i<=date("Y");$i++){ ?>
            <option><?=$i?></option>
        <? } ?>
    </select>
    S.d
    <select name="tgl2" id="tgl2">
        <option> 01 </option>
        <option> 02 </option>
        <option> 03 </option>
        <option> 04 </option>
        <option> 05 </option>
        <option> 06 </option>
        <option> 07 </option>
        <option> 08 </option>
        <option> 09 </option>
        <option> 10 </option>
        <option> 11 </option>
        <option> 12 </option>
        <option> 13 </option>
        <option> 14 </option>
        <option> 15 </option>
        <option> 16 </option>
        <option> 17 </option>
        <option> 18 </option>
        <option> 19 </option>
        <option> 20 </option>
        <option> 21 </option>
        <option> 22 </option>
        <option> 23 </option>
        <option> 24 </option>
        <option> 25 </option>
        <option> 26 </option>
        <option> 27 </option>
        <option> 28 </option>
        <option> 29 </option>
        <option> 30 </option>
        <option> 31 </option>
    </select>
    <select name="bln2" id="select2">
        <option	 value="01"	> Januari </option>
        <option	 value="02"	> Februari </option>
        <option	 value="03"	> Maret </option>
        <option	 value="04"	> April </option>
        <option	 value="05"	> Mei </option>
        <option	 value="06"	> Juni </option>
        <option	 value="07"	> Juli </option>
        <option	 value="08"	> Agustus </option>
        <option	 value="09"	> September </option>
        <option	 value="10"	> Oktober </option>
        <option	 value="11"	> Nopember </option>
        <option	 value="12"	> Desember </option>
    </select>
    <select name="thn2" id="select3">
        <? for($i=2012;$i<=date("Y");$i++){ ?>
            <option>
                <?=$i?>
            </option>
        <? } ?>
    </select>
    <input type="submit" name="Submit" value="Tampilkan" />
</form>
<?
$proses=$_GET['proses'];
$tgl1=$_POST['tgl1'];
$bln1=$_POST['bln1'];
$thn1=$_POST['thn1'];
$tgl2=$_POST['tgl2'];
$bln2=$_POST['bln2'];
$thn2=$_POST['thn2'];
if($proses=='cetak'){
    ?>
    <table width="488" border="0" cellpadding="3" cellspacing="1" bgcolor="#33CCFF">
        <tr>
            <td align="center" valign="middle" bgcolor="#71DCFF"><strong>Tanggal</strong></td>
            <td align="center" valign="middle" bgcolor="#71DCFF"><strong>Nama Barang </strong></td>
            <td align="center" valign="middle" bgcolor="#71DCFF"><strong>Harga Satuan </strong></td>
            <td align="center" valign="middle" bgcolor="#71DCFF"><strong>Jumlah Terjual </strong></td>
            <td align="center" valign="middle" bgcolor="#71DCFF"><strong>Total </strong></td>
        </tr>
        <?
        include "koneksi.php";
        $ambildata=mysql_query("SELECT * FROM penjualan WHERE tanggal >= '$thn1-$bln1-$tgl1' AND tanggal <= '$thn2-$bln2-$tgl2'");
        $cekdata=mysql_num_rows($ambildata);
        if($cekdata=='0'){
            echo "Maaf Data Yang anda cari tidak ada";
        }
        while($cetakdata=mysql_fetch_array($ambildata)){
            ?><tr>
            <td bgcolor="#FFFFFF"><?=$cetakdata[tanggal]?></td>
            <td bgcolor="#FFFFFF"><?=$cetakdata[nama_barang]?></td>
            <td bgcolor="#FFFFFF"><?=$cetakdata[harga_satuan]?></td>
            <td bgcolor="#FFFFFF"><?=$cetakdata[jumlah_terjual]?></td>
            <td bgcolor="#FFFFFF"><?=$cetakdata[harga_satuan]*$cetakdata[jumlah_terjual]?></td>
            </tr>
        <? } ?>
    </table>
<? }
?>