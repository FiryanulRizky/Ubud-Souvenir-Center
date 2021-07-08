<html>
    <head>
        <title><?php ob_start();include"../header_session/login_inner.php";ob_end_clean(); $toko=mysqli_query($conn,"SELECT * FROM infotoko WHERE id_toko='$idtoko'"); $ambil_data_toko=mysqli_fetch_array($toko); $nama_toko=$ambil_data_toko['nama_toko']; echo $nama_toko." Tambah Transaksi"; ?></title>
        <link rel="shortcut icon" type="image/x-icon" href="../gambar/images/head_logo.ico" />
        <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
    </head>
<body>
<?php
include "../header_session/header_inner.php";
if ($_POST['act']=="add") {
if(sizeof($_POST['souvenir_terdaftar'])>=2) {
$souvenir_terdaftar 	= '';
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
	  for ($i=0; $i<=count($pecah)-1; $i++)
	  {
	  	$part = str_replace($pecah[$i], "<p>".$pecah[$i]."</p>", $pecah[$i]);
		$text .=$part;
	  }
	  //menampilkan outputnya
//echo $text;
$toko=$_POST['id_toko'];
$kdtransaksi=$_POST['kdtransaksi'];
$tgltransaksi=$_POST['tgltransaksi'];
$jam_order=$_POST['jam_order'];
//menyimpan data kedalam tabel relasi
$text_line=$data;
$text_line =$data; //"Poll number 1, 1500, 250, 150, 100, 1000";
$text_line = explode(",",$text_line);
$posisi=0;
if(!preg_match("/^[0-9-]+$/i", $tgltransaksi)) { 
	    echo'<script>alert("form tanggal hanya menerima angka dan - sebagai karakter input, contoh 09-06-2021");window.location="'.$_SERVER['PHP_SELF'].'";</script>';
	} elseif(!preg_match("/^[0-9:]+$/i", $jam_order)){
	    echo'<script>alert("form jam order hanya menerima angka dan : sebagai karakter input, contoh 11:06:25");window.location="'.$_SERVER['PHP_SELF'].'";</script>';
	} else {
$sql_trans=mysqli_query($conn,"SELECT * FROM transaksi id_toko='$idtoko' AND kdtransaksi='$kdtransaksi'");
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
	$sql="INSERT INTO  transaksi (kdtransaksi,id_toko,kditem,tgltransaksi,jam_order) VALUES ('$kdtransaksi','$toko','$baris','$tgltransaksi','$jam_order')";
	$query=mysqli_query($conn, $sql);
	$posisi++;
//print $text_line[$start] . "<BR>";

	}
	    
	}
}
	echo '<script>window.location = "../PROSES_ALGORITMA_APRIORI/data_transaksi.php";</script>';
} else {
    echo'<script>alert("Pilih minimal 2 produk");</script>';
}
}?>
<div id='bgkonten'>
<div class="konten_tabel">
<form name="form1" method="post" enctype="multipart/form-data">
<table width="700" border="0" align="center" cellpadding="0" cellspacing="0">
	<h2 class="art-postheader">Tambah Data Transaksi</h2><br>
	<tr>
		<td><h2><a href="../PROSES_ALGORITMA_APRIORI/data_transaksi.php"><i class="fa fa-arrow-circle-o-left"></i>Kembali</a></h2></td>
	</tr>
	<tr><td><br></td></tr>
    <tr>
      <td width="150">ID Toko</td>
      <td width="11">:</td>
      <td colspan="2"><input name="id_toko" type="text" id="id_toko" class="texbox" size="13" maxlength="13"  value="<?php echo $idtoko; ?>" readonly> <?php echo "<i>*KDTK".$idtoko."</i>"?></td>
    </tr>
    <?php function generateRandomString($length = 10) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
} $kd_auto=generateRandomString(); ?>
    <tr>
      <td width="103">Kode Transaksi</td>
      <td width="11">:</td>
      <td colspan="2"><input name="kdtransaksi" type="text" id="kdtransaksi" size="13" class="texbox" maxlength="13" value="<?php echo $kd_auto;?>" readonly> <?php echo "<i>*KDTR(".$kd_auto.")</i>"?></td>
    </tr>
    <tr>
      <td>Pilih Produk</td>
      <td>:</td>
      <td colspan="2"><br /><?php
  include "../db/koneksi.php";
  $query=mysqli_query($conn,"SELECT * FROM item WHERE id_toko='$idtoko' GROUP BY kditem ORDER BY id_item ASC");
  while ($row=mysqli_fetch_array($query,MYSQLI_ASSOC)){
  ?>
      <input type="checkbox" name="souvenir_terdaftar[]" id="souvenir_terdaftar" value="<?php echo $row['kditem'];?>">
      <?php echo $row['merk'];?>
     <?php } ?></td>
    </tr><tr><td><br></td></tr>
    <tr>
      <td>Tanggal Transaksi</td>
      <td>:</td>
      <td colspan="2"><input name="tgltransaksi" class="texbox" type="text" id="tgltransaksi" size="20" maxlength="10" value="<?php echo date("Y-m-d"); ?>" /> <i>*thn-bln-tgl</i></td>
    </tr>
    <tr>
      <td>Jam Order</td>
      <td>:</td>
      <td colspan="2"><input name="jam_order" type="text" id="jam_order" class="texbox" size="20" maxlength="8" value="<?php echo date("H:i:s"); ?>" /> <i>*jam-mnt-dtk</i></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td colspan="2">&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td><input name="simpan" class="btn_submit" type="submit" id="simpan" value="Simpan" style="font-family:bauhaus md bt;color:#ffffff;font-size:12pt;border:1px solid #039; background-color:#69C;" /><input type="hidden" name="act" value="add">
        <input type="reset" class="btn_submit" name="Submit2" value="Reset" style="font-family:bauhaus md bt;color:#ffffff;font-size:12pt;border:1px solid #039; background-color:#69C;" /></td>    
    </tr>
  </table>
</form></body></html>