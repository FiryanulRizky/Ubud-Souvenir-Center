<!DOCTYPE html>
<html>
<head>
  <title></title>
</head>
<link rel="stylesheet" type="text/css" href="../css/style.css">
<link rel="stylesheet" type="text/css" href="../css/style_admin.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" />
<script>
  function resizeIframe(obj) {
    obj.style.height = obj.contentWindow.document.documentElement.scrollHeight + 'px';
  }
</script>
<body background="#DFE6F0">
<?php
ob_start();
include"../1_login_reg/login_reg.php";
ob_end_clean();
?>
<div id='bgkonten'>
  <?php $cek = mysqli_query($conn,"SELECT * FROM transaksi WHERE id_toko='$idtoko'");
  if(mysqli_num_rows($cek)>0) {
    if (empty($_GET['date1']&&$_GET['date2'])) {
?>
  <center><H2>Ambil Data Transaksi</H2></center>
  <table style=" border: 1px solid red; width: 100%; text-align: center;"><tr><td style="background: lightblue;"><form method="post"><input type="submit" name="ambil_trans" value="Ambil Semua Data Transaksi" class="btn_submit"></form></td></tr></table>
    <?php 
        if(isset($_POST['ambil_trans'])) {
            $tanggal = date("Ymd");
            $waktu   = date("His"); 
            $cek_admin=mysqli_query($conn,"SELECT * FROM statistik WHERE id_toko='$idtoko' AND tanggal='$tanggal'");
            $ambil_ip=mysqli_fetch_array($cek_admin); 
            $cek_ip=$ambil_ip['ip'];
            if($cek_ip>1){ 
            echo '<script>alert("Proses Analisa Sedang dalam sesi admin lain");window.location="'.$_SERVER['PHP_SELF'].'";</script>';
            } else {
                $ip = $_SERVER['REMOTE_ADDR']; // Mendapatkan IP komputer user
$tanggal = date("Ymd"); // Mendapatkan tanggal sekarang
$waktu   = date("His"); // 
// Mencek berdasarkan IPnya, apakah user sudah pernah mengakses hari ini
$status="admin"; 
$s = mysqli_query($conn,"SELECT * FROM statistik WHERE ip='$ip' AND tanggal='$tanggal' AND id_toko='$idtoko'");
$ambil_data_ip=mysqli_fetch_array($s);
$ambil_ip=$ambil_data_ip['ip'];
// Kalau belum ada, simpan data user tersebut ke database
if(mysqli_num_rows($s) == 0 && $ambil_ip != $ip){
  mysqli_query($conn,"INSERT INTO statistik(id_toko, ip, tanggal, online, status) VALUES('$idtoko','$ip','$tanggal','$waktu','$status')");} 
      else {
        mysqli_query($conn,"UPDATE statistik SET online='$waktu', status='$status' WHERE ip='$ip' AND tanggal='$tanggal' AND id_toko='$idtoko'");
      }
            echo'<script>window.location="2_hitung_support_item_1.php";</script>';
        }
    }
    ?>
    <br>
    <form method="post">
    <table style="border: 1px solid red; text-align: center; width: 100%;"><tr><td>
    <br><center><b style="font-size: 18px;">Ambil Data dengan Seleksi</b></center>
    <br>
     <label for="date1">Dari Tanggal</label>
     <input type="date" name="date1" id="date1" class="texbox">
     <label for="date2">Sampai </label>
     <input type="date" name="date2" id="date2" class="texbox">
     <input type="hidden" name="act" value="tgl">
     <button type="submit" name="submit2" id="submit2" class="btn_submit">Seleksi</button></form></td></tr></table><?php } ?><br><br>
  <?php
 $date1 = $_POST['date1'];
 $date2 = $_POST['date2'];
 $date3 = $_GET['date1'];
 $date4 = $_GET['date2'];
  if (isset($_POST['submit2'])) {
    if (!empty($date1) && !empty($date2)) {
    echo'<script>window.location="1_ambil_transaksi.php?date1='.$date1.'&date2='.$date2.'";</script>'; 
 } else {
  // perintah tampil semua data
  $result = mysqli_query($conn,"SELECT * FROM transaksi WHERE id_toko='$idtoko' GROUP BY kdtransaksi ORDER BY kdtransaksi ASC"); 
 }
} elseif(!empty($date3&&$date4)){
   $cek_isi1=mysqli_query($conn,"SELECT * FROM transaksi WHERE tgltransaksi='$date3'");
  $cek_isi2=mysqli_query($conn,"SELECT * FROM transaksi WHERE tgltransaksi='$date4'");
  if (mysqli_num_rows($cek_isi1)==0) {
    echo'<script>alert("TANGGAL AWAL SELEKSI TIDAK VALID");window.location="1_ambil_transaksi.php";</script>';
  } elseif (mysqli_num_rows($cek_isi2)==0) {
    echo'<script>alert("TANGGAL AKHIR SELEKSI TIDAK VALID");window.location="1_ambil_transaksi.php";</script>';
  }
  $result = mysqli_query($conn,"SELECT * FROM transaksi WHERE id_toko='$idtoko' AND tgltransaksi BETWEEN '$date3' AND '$date4' GROUP BY kdtransaksi");

  echo"<center><H3>Sistem membatasi transaksi dari "; echo date('d-M-Y', strtotime($date3)); echo " sampai "; echo date('d-M-Y', strtotime($date4));echo"</H3><br><table><tr><td><form method='post'><input type='submit' name='transaksi_tgl' value='Lanjut Proses' style='padding:3px 8px 3px 8px; border:1px solid #06F; font-size: 21px; background:lightgreen;'></form></td><td>&nbsp;&nbsp;</td><td><a style='padding:3px 8px 3px 8px; border:1px solid #06F; font-size: 21px; background:orange;' href=\"1_ambil_transaksi.php?clear=y\">Reset</a></center></td></tr></table><br>";
 
 if(isset($_POST['transaksi_tgl'])) {
     $tanggal = date("Ymd");
            $waktu   = date("His"); 
            $cek_admin=mysqli_query($conn,"SELECT * FROM statistik WHERE id_toko='$idtoko' AND tanggal='$tanggal'");
            $ambil_ip=mysqli_fetch_array($cek_admin); 
            $cek_ip=$ambil_ip['ip'];
            if($cek_ip>1){ 
            echo '<script>alert("Proses Analisa Sedang dalam sesi admin lain");window.location="'.$_SERVER['PHP_SELF'].'";</script>';
            } else {
                $ip = $_SERVER['REMOTE_ADDR']; // Mendapatkan IP komputer user
$tanggal = date("Ymd"); // Mendapatkan tanggal sekarang
$waktu   = date("His"); // 
// Mencek berdasarkan IPnya, apakah user sudah pernah mengakses hari ini
$status="admin"; 
$s = mysqli_query($conn,"SELECT * FROM statistik WHERE ip='$ip' AND tanggal='$tanggal' AND id_toko='$idtoko'");
$ambil_data_ip=mysqli_fetch_array($s);
$ambil_ip=$ambil_data_ip['ip'];
// Kalau belum ada, simpan data user tersebut ke database
if(mysqli_num_rows($s) == 0 && $ambil_ip != $ip){
  mysqli_query($conn,"INSERT INTO statistik(id_toko, ip, tanggal, online, status) VALUES('$idtoko','$ip','$tanggal','$waktu','$status')");} 
      else {
        mysqli_query($conn,"UPDATE statistik SET online='$waktu', status='$status' WHERE ip='$ip' AND tanggal='$tanggal' AND id_toko='$idtoko'");
      }
    }
    echo'<script>window.location="2_hitung_support_item_1.php?date1='.$date3.'&date2='.$date4.'";</script>';
 }
} 
else {
 // perintah tampil semua data
 $result = mysqli_query($conn,"SELECT * FROM transaksi WHERE id_toko='$idtoko' GROUP BY kdtransaksi ORDER BY id_transaksi DESC");
}
echo'<table border="1" class="bgproduct1" style="width:100%">';
    while($row = $result->fetch_assoc())
    {
    ?>
    <tr><td><?php echo ++$no; ?></td><td>
    <?php echo "Kode : KDTR(".$row['kdtransaksi'].")<hr>";?>
    <?=date('d-M-Y', strtotime($row['tgltransaksi']))?>
    <br><br><?php
      $kdtransaksi=$row['kdtransaksi'];
            $result2=mysqli_query($conn,"SELECT * FROM transaksi,item WHERE item.kditem=transaksi.kditem AND transaksi.id_toko=item.id_toko AND transaksi.id_toko='$idtoko' AND transaksi.kdtransaksi='$kdtransaksi' ORDER BY item.kditem");
        while($rowItem = $result2->fetch_assoc())
        {
          echo $rowItem['merk'] ." , ";
        }
        
      ?><br><br><?=date('H:i:s', strtotime($row['jam_order']))?> WITA</td></tr>
    <?php } } else {
      echo"<center><H3>PERLU DATA TRANSAKSI UNTUK MEMPROSES</H3></center>";
    }
    ?>
</table>
</div>
</body>
</html>