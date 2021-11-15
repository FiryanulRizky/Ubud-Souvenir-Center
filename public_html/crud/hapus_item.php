<html>
    <head>
        <title><?php ob_start();include"../header_session/login_inner.php";ob_end_clean(); $toko=mysqli_query($conn,"SELECT * FROM infotoko WHERE id_toko='$idtoko'"); $ambil_data_toko=mysqli_fetch_array($toko); $nama_toko=$ambil_data_toko['nama_toko']; echo $nama_toko." Hapus Produk"; ?></title>
        <link rel="shortcut icon" type="image/x-icon" href="../gambar/images/head_logo.ico" />
    </head>
<body>
<?php
// *** LOAD ADMIN PAGE HEADER
include "../header_session/header_inner.php";

$tanggal = date("Ymd");
            $waktu   = date("His"); 
            $cek_admin=mysqli_query($conn,"SELECT * FROM statistik WHERE id_toko='$idtoko' AND tanggal='$tanggal'");
            while($ambil_ip=mysqli_fetch_array($cek_admin)){ 
                $cek_ip=$ambil_ip['ip'];
            }
            if($cek_ip>1){ 
            echo '<script>alert("Hapus Produk Sedang dalam sesi admin lain");window.location="../PROSES_ALGORITMA_APRIORI/daftar_item.php";</script>';
            } else {
          $ip = $_SERVER['REMOTE_ADDR'];
$tanggal = date("Ymd");
$waktu   = date("His");
$status="admin"; 
$s = mysqli_query($conn,"SELECT * FROM statistik WHERE ip='$ip' AND tanggal='$tanggal' AND id_toko='$idtoko'");
$ambil_data_ip=mysqli_fetch_array($s);
$ambil_ip=$ambil_data_ip['ip'];
if(mysqli_num_rows($s) == 0 && $ambil_ip != $ip){
  mysqli_query($conn,"INSERT INTO statistik(id_toko, ip, tanggal, online, status) VALUES('$idtoko','$ip','$tanggal','$waktu','$status')");} 
      else {
        mysqli_query($conn,"UPDATE statistik SET online='$waktu', status='$status' WHERE ip='$ip' AND tanggal='$tanggal' AND id_toko='$idtoko'");
      } }

if (!empty($_GET['id'])){
    $rs=@mysqli_query($conn,"SELECT * FROM item WHERE id_item='".$_GET['id']."' AND id_toko='$idtoko'");
    $row=@mysqli_fetch_array($rs,MYSQLI_ASSOC);
echo '
<div id="bgkonten">
<form method="post"><input type="submit" name="kembali_2" value="Kembali" style="background:lightgrey;padding:10px;font-weight:bold;"></form>';
if (isset($_POST['kembali_2'])) {
    $cek_ip=mysqli_query($conn,"SELECT * FROM statistik WHERE id_toko='$idtoko'");
    if (mysqli_num_rows($cek_ip)>0) {
        $del_statistik=mysqli_query($conn,"DELETE FROM statistik WHERE id_toko='$idtoko'");
        echo'<script>window.location="../PROSES_ALGORITMA_APRIORI/daftar_item.php";</script>';
    } else {
        echo'<script>window.location="../PROSES_ALGORITMA_APRIORI/daftar_item.php";</script>';
    }
}
echo'<form method="post" enctype="multipart/form-data">
&raquo;&nbsp;KD Item : '.$row['kditem'].'<br>
&raquo;&nbsp;Kategori : '.$row['jenis'].'<br>
&raquo;&nbsp;Nama Produk : '.$row['merk'].'<br>
&raquo;&nbsp;Harga: '.$row['harga'].'<br>
<img src=\'../gambar/produk/'.$row['gambar_item'].'\' width=50><br><br>
    
    <input type="submit" value="DELETE" class="btn_submit">
    <input type="hidden" name="act" value="delete" >
    </form>
';
}

if ($_POST['act']=="delete"){
    $gambar=mysqli_query($conn,"SELECT * FROM item WHERE id_toko='$idtoko' AND id_item='".$_GET['id']."'");
    $nama_gambar=mysqli_fetch_array($gambar,MYSQLI_ASSOC);
    $hapus_gambar=$nama_gambar['gambar_item'];
    $files=glob("../gambar/produk/".$hapus_gambar."");
    foreach ($files as $file) {
    if (is_file($file))
    unlink($file); // hapus file
    @mysqli_query($conn,"DELETE FROM item WHERE id_item='".$_GET['id']."' AND id_toko='$idtoko'");
}
    @mysqli_query($conn,"DELETE FROM item "
    ."WHERE kditem='".$_GET['id']."' AND id_toko='$idtoko'");
    @mysqli_query($conn,"DELETE FROM statistik WHERE id_toko='$idtoko'");
    $cek_jml_item=mysqli_query($conn,"SELECT * FROM item WHERE id_toko='$idtoko'");
    
    if(mysqli_num_rows($cek_jml_item)>2) {
        echo'<script>window.location="../PROSES_ALGORITMA_APRIORI/daftar_item.php"</script>';
    } else {
        echo'<script>
        var yakin = confirm("Hapus berhasil, namun jumlah produk anda tidak memenuhi syarat minimal, tambah produk ?");

        if (yakin) {
        	window.location = "tambah_item.php";
        } else {
            window.location = "../PROSES_ALGORITMA_APRIORI/daftar_item.php";
        }
    </script>';
    }
    
}

echo"</div>";
?>
<div class="cleared"></div></body></html>