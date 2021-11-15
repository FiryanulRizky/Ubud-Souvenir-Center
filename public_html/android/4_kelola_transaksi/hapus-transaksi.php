<!DOCTYPE html>
<html>
<head>
<title>Hapus Data</title>
<link rel="stylesheet" type="text/css" href="../../css/style_admin.css">
<?php ob_start();
include "../1_login_reg/login_reg.php";
ob_end_clean(); ?>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
</head>
<body>
<div>
<?php

$tanggal = date("Ymd");
            $waktu   = date("His"); 
            $cek_admin=mysqli_query($conn,"SELECT * FROM statistik WHERE id_toko='$idtoko' AND tanggal='$tanggal'");
            while($ambil_ip=mysqli_fetch_array($cek_admin)){ 
                $cek_ip=$ambil_ip['ip'];
            }
            if($cek_ip>1){ 
            echo '<script>alert("Hapus Sedang dalam sesi admin lain");window.location="transaksi.php";</script>';
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
      } }

if (!empty($_GET['kdtransaksi'])){
    $rs=@mysqli_query($conn,"SELECT * FROM transaksi WHERE id_toko='$idtoko' AND kdtransaksi='".$_GET['kdtransaksi']."'");
    $row=@mysqli_fetch_array($rs,MYSQLI_ASSOC);
echo "
<div id='bgkonten'><br><center>
<H3>YAKIN INGIN DIHAPUS ?</H3>";
echo'<form method="post"><input type="submit" name="kembali_2" value="Batal" style="background:lightgrey;padding:10px;font-weight:bold;"></form>
<form method="post" enctype="multipart/form-data">';
if (isset($_POST['kembali_2'])) {
    $cek_ip=mysqli_query($conn,"SELECT * FROM statistik WHERE id_toko='$idtoko'");
    if (mysqli_num_rows($cek_ip)>0) {
        $del_statistik=mysqli_query($conn,"DELETE FROM statistik WHERE id_toko='$idtoko'");
        echo'<script>window.location="transaksi.php";</script>';
    } else {
        echo'<script>window.location="transaksi.php";</script>';
    }
}
echo"<b>Keterangan Data :</b><br><form method='post' enctype='multipart/form-data'>
<table>
<tr><td>
&raquo;&nbsp;Kode</td><td>:</td><td> ".$row['kdtransaksi']."</td></tr><tr><td>
&raquo;&nbsp;Produk Terjual</td><td>:</td><td> ";
$result2=mysqli_query($conn,"SELECT * FROM transaksi,item WHERE item.kditem=transaksi.kditem AND transaksi.id_toko=item.id_toko AND transaksi.id_toko='$idtoko' AND transaksi.kdtransaksi='".$_GET['kdtransaksi']."' ORDER BY item.kditem");
while ($rowItem = $result2->fetch_assoc()){
echo $rowItem['merk'].", ";} echo'</td></tr><tr><td>
&raquo;&nbsp;Tanggal</td><td>:</td><td> '.$row['tgltransaksi'].'</td></tr><tr><td>
&raquo;&nbsp;Jam Order</td><td>:</td><td>'.$row['jam_order'].'</td></tr></table><br>
    
    <center><input type="submit" value="DELETE" class="btn_submit"></center>
    <input type="hidden" name="act" value="delete" >
    <input type="hidden" name="kdtransaksi" value="'.$row['kdtransaksi'].'">
    </form>';
}

if ($_POST['act']=="delete"){
    @mysqli_query($conn,"DELETE FROM transaksi WHERE id_toko='$idtoko' AND kdtransaksi='".$_GET['kdtransaksi']."'");

    $del_ip=mysqli_query($conn,"DELETE FROM statistik WHERE id_toko='$idtoko'");

    if (date('M',strtotime($tgl))=="Jan") 
    {   
        @mysqli_query($conn,"UPDATE graph SET Januari=0 WHERE id_toko='$idtoko' AND kditem='$kd' ORDER BY id_graph ASC");
        @mysqli_query($conn,"UPDATE pendapatan SET Januari=0 WHERE id_toko='$idtoko' AND kditem='$kd' ORDER BY id_hasil ASC");
    } elseif (date('M',strtotime($tgl))=="Feb") {
        @mysqli_query($conn,"UPDATE graph SET Februari=0 WHERE id_toko='$idtoko' AND kditem='$kd' ORDER BY id_graph ASC");
        @mysqli_query($conn,"UPDATE pendapatan SET Februari=0 WHERE id_toko='$idtoko' AND kditem='$kd' ORDER BY id_hasil ASC");
    } elseif (date('M',strtotime($tgl))=="Mar") {
        @mysqli_query($conn,"UPDATE graph SET Maret=0 WHERE id_toko='$idtoko' AND kditem='$kd' ORDER BY id_graph ASC");
        @mysqli_query($conn,"UPDATE pendapatan SET Maret=0 WHERE id_toko='$idtoko' AND kditem='$kd' ORDER BY id_hasil ASC");
    } elseif (date('M',strtotime($tgl))=="Apr") {
        @mysqli_query($conn,"UPDATE graph SET April=0 WHERE id_toko='$idtoko' AND kditem='$kd' ORDER BY id_graph ASC");
        @mysqli_query($conn,"UPDATE pendapatan SET April=0 WHERE id_toko='$idtoko' AND kditem='$kd' ORDER BY id_hasil ASC");
    } elseif (date('M',strtotime($tgl))=="May") {
        @mysqli_query($conn,"UPDATE graph SET Mei=0 WHERE id_toko='$idtoko' AND kditem='$kd' ORDER BY id_graph ASC");
        @mysqli_query($conn,"UPDATE pendapatan SET Mei=0 WHERE id_toko='$idtoko' AND kditem='$kd' ORDER BY id_hasil ASC");
    } elseif (date('M',strtotime($tgl))=="Jun") {
        @mysqli_query($conn,"UPDATE graph SET Juni=0 WHERE id_toko='$idtoko' AND kditem='$kd' ORDER BY id_graph ASC");
        @mysqli_query($conn,"UPDATE pendapatan SET Juni=0 WHERE id_toko='$idtoko' AND kditem='$kd' ORDER BY id_hasil ASC");
    } elseif (date('M',strtotime($tgl))=="Jul") {
        @mysqli_query($conn,"UPDATE graph SET Juli=0 WHERE id_toko='$idtoko' AND kditem='$kd' ORDER BY id_graph ASC");
        @mysqli_query($conn,"UPDATE pendapatan SET Juli=0 WHERE id_toko='$idtoko' AND kditem='$kd' ORDER BY id_hasil ASC");
    } elseif (date('M',strtotime($tgl))=="Aug") {
        @mysqli_query($conn,"UPDATE graph SET Agustus=0 WHERE id_toko='$idtoko' AND kditem='$kd' ORDER BY id_graph ASC");
        @mysqli_query($conn,"UPDATE pendapatan SET Agustus=0 WHERE id_toko='$idtoko' AND kditem='$kd' ORDER BY id_hasil ASC");
    } elseif (date('M',strtotime($tgl))=="Sep") {
        @mysqli_query($conn,"UPDATE graph SET September=0 WHERE id_toko='$idtoko' AND kditem='$kd' ORDER BY id_graph ASC");
        @mysqli_query($conn,"UPDATE pendapatan SET September=0 WHERE id_toko='$idtoko' AND kditem='$kd' ORDER BY id_hasil ASC");
    } elseif (date('M',strtotime($tgl))=="Oct") {
        @mysqli_query($conn,"UPDATE graph SET Oktober=0 WHERE id_toko='$idtoko' AND kditem='$kd' ORDER BY id_graph ASC");
        @mysqli_query($conn,"UPDATE pendapatan SET Oktober=0 WHERE id_toko='$idtoko' AND kditem='$kd' ORDER BY id_hasil ASC");
    } elseif (date('M',strtotime($tgl))=="Nov") {
        @mysqli_query($conn,"UPDATE graph SET November=0 WHERE id_toko='$idtoko' AND kditem='$kd' ORDER BY id_graph ASC");
        @mysqli_query($conn,"UPDATE pendapatan SET November=0 WHERE id_toko='$idtoko' AND kditem='$kd' ORDER BY id_hasil ASC");
    } elseif (date('M',strtotime($tgl))=="Dec") {
        @mysqli_query($conn,"UPDATE graph SET Desember=0 WHERE id_toko='$idtoko' AND kditem='$kd' ORDER BY id_graph ASC");
        @mysqli_query($conn,"UPDATE pendapatan SET Desember=0 WHERE id_toko='$idtoko' AND kditem='$kd' ORDER BY id_hasil ASC");
    }
    
    echo '
    <script>window.location="transaksi.php"</script>
    ';    
}
?>
</div>
</body>
</html>