<!DOCTYPE HTML>
<html>
<head>
<title>Update Transaksi</title>
<style type="text/css">
body { margin:50px;background-image:url(../gambar/images/Bottom_texture.jpg);}
div { border:1px dashed #666; background-color:#CCC; padding:10px;}
</style>
</head>
<body>
<div>
<?php 
include "../header_session/login_inner.php";
echo"<div id='bgkonten'>";
// mengambil variabel dari halaman rule_kaidah_produksi.php
$tgltransaksi=$_POST['tgltransaksi'];
$jam_order=$_POST['jam_order'];
$gejala 	= '';
$events 	= '';
if (isset($_POST['souvenir_terdaftar']))
{
	$selectors 	= htmlentities(implode(',', $_POST['souvenir_terdaftar']));
	//$events 	= htmlentities(implode('', $_POST['bobot']));
}
$data=$selectors;
//$databobot=$events;
//echo "$selectors<br>";
//echo "$events";
$input = $data;
	  //memecahkan string input berdasarkan karakter '\r\n\r\n'
	  $pecah = explode("\r\n\r\n", $input);
	  // string kosong inisialisasi
	  $text = "";
	  //untuk setiap substring hasil Jantung, sisipkan <p> di awal dan </p> di akhir
	  // lalu menggabungnya menjadi satu string untuk $text
	  for ($i=0; $i<=count($pecah)-1; $i++)
	  {
	  	$part = str_replace($pecah[$i], "<p>".$pecah[$i]."</p>", $pecah[$i]);
		$text .=$part;
	  }
	  //menampilkan outputnya
//echo $text;
//menyimpan data kedalam tabel relasi
$text_line=$data;
$text_line =$data; //"Poll number 1, 1500, 250, 150, 100, 1000";
$text_line = explode(",",$text_line);
$posisi=0;
if(sizeof($_POST['souvenir_terdaftar'])>=2) {
        if(!preg_match("/^[0-9-]+$/i", $_POST['tgltransaksi'])) { 
	    echo'<script>alert("form tanggal hanya menerima angka dan - sebagai karakter input, contoh 09-06-2021");window.location="ambil_data_update_transaksi.php?idtoko='.$idtoko.'&kdtransaksi='.$_GET['kdtransaksi'].'";</script>';
	} elseif(!preg_match("/^[0-9:]+$/i", $_POST['jam_order'])){
	    echo'<script>alert("form jam order hanya menerima angka dan : sebagai karakter input, contoh 11:06:25");window.location="ambil_data_update_transaksi.php?idtoko='.$idtoko.'&kdtransaksi='.$_GET['kdtransaksi'].'";</script>';
	} else {
	    $sql_trans=mysqli_query($conn,"SELECT * FROM transaksi id_toko='$idtoko' AND kdtransaksi='".$_POST['kdtransaksi']."'");
$ambil_sql=mysqli_fetch_array($sql_trans);
$kd_tr=$ambil_sql['kdtransaksi'];
if($kd_tr>0) {
    $del_statistik=mysqli_query($conn,"DELETE FROM statistik WHERE id_toko='$idtoko'");
    echo'<script>alert("Mohon Maaf ulangi pengisisan data sekali lagi, sistem mendeteksi duplikasi kode Transaksi");window.location="../PROSES_ALGORITMA_APRIORI/data_transaksi.php";</script>';    
} else {
for ($start=0; $start < count($text_line); $start++) {
	$baris=$text_line[$start]; //echo "$baris<br>";
	// untuk nilai bobot	
	//$bobot=substr($databobot,$posisi,1); echo $bobot. "<br>";
	// $sql="INSERT INTO  transaksi (kdtransaksi,id_toko,kditem,tgltransaksi,jam_order) VALUES ('$kdtransaksi','$id_toko','$baris','$tgltransaksi','$jam_order')";
	// $query=mysqli_query($conn,$sql);
	$sql=mysqli_query($conn,"INSERT INTO transaksi (kdtransaksi,id_toko,kditem,tgltransaksi,jam_order) VALUES ('".$_POST['kdtransaksi']."','$idtoko','$baris','$tgltransaksi','$jam_order')");
	$posisi++;
	// del transaksi
	
//print $text_line[$start] . "<BR>";
$queryDel=mysqli_query($conn,"DELETE FROM transaksi WHERE kdtransaksi='".$_POST['kdtransaksi_lama']."'");
$queryDel2=mysqli_query($conn,"UPDATE graph SET Januari=0,Februari=0,Maret=0,April=0,Mei=0,Juni=0,Juli=0,Agustus=0,September=0,Oktober=0,November=0,Desember=0 WHERE id_toko='$idtoko' ORDER BY id_graph ASC");
$queryDel3=mysqli_query($conn,"UPDATE pendapatan SET Januari=0,Februari=0,Maret=0,April=0,Mei=0,Juni=0,Juli=0,Agustus=0,September=0,Oktober=0,November=0,Desember=0 WHERE id_toko='$idtoko' ORDER BY id_hasil ASC");
$del_statistik=mysqli_query($conn,"DELETE FROM statistik WHERE id_toko='$idtoko'");
$cek_pend=mysqli_query($conn,"SELECT * FROM pendapatan WHERE id_toko='$idtoko'");
if (mysqli_num_rows($cek_pend)>0) {
echo '<script>
        var yakin = confirm("TRANSAKSI UPDATE, GRAFIK LINE PERLU DIPERBARUI");
        if (yakin) {
            window.location = "../VISUALISASI_HASIL_APRIORI/index.php";
        } else {
            window.location = "../PROSES_ALGORITMA_APRIORI/data_transaksi.php";
        }
    </script>';} else {
    	echo'<script>alert("TRANSAKSI BERHASIL DI UPDATE DENGAN KDTRANSAKSI BARU");window.location="../PROSES_ALGORITMA_APRIORI/data_transaksi.php";</script>';
    }
} } }
} else {
        echo'<script>alert("pilih minimal 2 item");window.location="ambil_data_update_transaksi.php?idtoko='.$idtoko.'&kdtransaksi='.$_GET['kdtransaksi'].'";</script>';
    }
?>
</div>
</div>
</body>
</html>
