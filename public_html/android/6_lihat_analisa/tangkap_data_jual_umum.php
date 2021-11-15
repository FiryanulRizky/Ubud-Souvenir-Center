<link rel="stylesheet" type="text/css" href="../../css/style_admin.css">
<form method="post"><input type="submit" name="proses" value="Daftar Produk" style="width: 100%; height: 50px; background: orange; color: white; font-weight: bold;text-align: center;"><input type="hidden" name="act" value="masuk"></form>
<?php 
ob_start();
include"../1_login_reg.php/login_reg.php";
ob_end_clean();
if ($_POST['act']=="masuk") {
echo"Tangkap Data Transaksi";
$q1=mysqli_query($conn,"SELECT merk,kditem FROM item WHERE id_toko='$idtoko' ORDER BY id_item ASC");
while($item=mysqli_fetch_array($q1)){
	$kditem=$item['kditem'];
	$cek1=mysqli_query($conn,"SELECT * FROM graph WHERE id_toko='$idtoko' AND kditem='$kditem'");
	if (mysqli_num_rows($cek1)>0) {
		echo'<script>alert("PRODUK TOKO SUDAH ADA");window.location="tangkap_data_jual_Jan.php";</script>';
	} else {
		$selectors 	= htmlentities(implode(',',array($kditem)));
	//$events 	= htmlentities(implode(0, $_POST['bobot']));
$data=$selectors;
//$databobot=$events;
//echo "$selectors<br>";
//echo "$events";
$input = $data;
	  //memecahkan string input berdasarkan karakter '\r\n\r\n'
	  $pecah = explode("\r\n\r\n", $input);
	  // string kosong inisialisasi
	  $text = "";
	  for ($i=0; $i<=count($pecah)-1; $i++)
	  {
	  	$part = str_replace($pecah[$i], "<p>".$pecah[$i]."</p>", $pecah[$i]);
		$text .=$part;
	  }
$produk=$item['merk'];
$kditem=$item['kditem'];
//menyimpan data kedalam tabel relasi
$text_line=$data;
$text_line =$data; //"Poll number 1, 1500, 250, 150, 100, 1000";
$text_line = explode(",",$text_line);
$posisi=0;
for ($start=0; $start < count($text_line); $start++) {
	$baris=$text_line[$start];
		@mysqli_query($conn,"INSERT INTO graph (id_toko,kditem,produk,Januari,Februari,Maret,April,Mei,Juni,Juli,Agustus,September,Oktober,November,Desember) VALUES ('$idtoko','$kditem','$produk',0,0,0,0,0,0,0,0,0,0,0,0)");
		@mysqli_query($conn,"INSERT INTO pendapatan (id_toko,kditem,produk,Januari,Februari,Maret,April,Mei,Juni,Juli,Agustus,September,Oktober,November,Desember) VALUES ('$idtoko','$kditem','$produk',0,0,0,0,0,0,0,0,0,0,0,0)");
		echo'<script>alert("DATA BERHASIL DIMASUKKAN");window.location="tangkap_data_jual_Jan.php";</script>';
	}
	}
} 
}
?>