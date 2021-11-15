<link rel="stylesheet" type="text/css" href="../../css/style_admin.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" />
<?php
// *** LOAD ADMIN PAGE HEADER
ob_start();
include "../1_login_reg/login_reg.php";
ob_end_clean();

$tanggal = date("Ymd");
            $waktu   = date("His"); 
            $cek_admin=mysqli_query($conn,"SELECT * FROM statistik WHERE id_toko='$idtoko' AND tanggal='$tanggal'");
            while($ambil_ip=mysqli_fetch_array($cek_admin)){ 
                $cek_ip=$ambil_ip['ip'];
            }
            if($cek_ip>1){ 
            echo '<script>alert("Hapus Sedang dalam sesi admin lain");window.location="item.php";</script>';
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
$id=$_GET['id'];
if (!empty($_GET['id'])){
    $rs=@mysqli_query($conn,"SELECT * FROM item WHERE id_toko='$idtoko' AND id_item='".$_GET['id']."'");
    $row=@mysqli_fetch_array($rs,MYSQLI_ASSOC);
echo '
<div id="bgkonten"><br>
<center><H3>YAKIN INGIN DIHAPUS ?</H3>
<form method="post"><input type="submit" name="kembali_2" value="Kembali" style="background:lightgrey;padding:10px;font-weight:bold;"></form>';
if (isset($_POST['kembali_2'])) {
    $cek_ip=mysqli_query($conn,"SELECT * FROM statistik WHERE id_toko='$idtoko'");
    if (mysqli_num_rows($cek_ip)>0) {
        $del_statistik=mysqli_query($conn,"DELETE FROM statistik WHERE id_toko='$idtoko'");
        echo'<script>window.location="item.php";</script>';
    } else {
        echo'<script>window.location="item.php";</script>';
    }
}
echo'
<table><tr><td>
&raquo;&nbsp;KD Item</td><td>:</td><td>'.$row['kditem'].'</td></tr><tr><td>
&raquo;&nbsp;Kategori</td><td>:</td><td>'.$row['jenis'].'</td></tr><tr><td>
&raquo;&nbsp;Nama Produk</td><td>:</td><td>'.$row['merk'].'</td></tr><tr><td>
&raquo;&nbsp;Gambar Produk</td><td>:</td><td><img src=\'../../gambar/produk/'.$row['gambar_item'].'\' width=90 height=80></td></tr><tr><td>
&raquo;&nbsp;Deskripsi</td><td>:</td><td>'.$row['deskripsi'].'</td></tr><tr><td>
&raquo;&nbsp;Harga</td><td>:</td><td>'.$row['harga'].'</td></tr></table><br>
    
    <center><a href="hapus_item.php?id='.$row['id_item'].'"><input type="button" value="HAPUS" class="btn_submit"></a></center>';
}
echo"</div>";
?>
<div class="cleared"></div>