<?php
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
// *** LOAD SESSION
session_start();
// *** DB CONNECTION
include"../db/koneksi.php";
include "../db/web_config.php";
date_default_timezone_set('Asia/Makassar');

// $ip = $_SERVER['REMOTE_ADDR']; // Mendapatkan IP komputer user
// $tanggal = date("Ymd"); // Mendapatkan tanggal sekarang
// $waktu   = date("His"); // 

// // Mencek berdasarkan IPnya, apakah user sudah pernah mengakses hari ini
// $status="visitor"; 
// $s = mysqli_query($conn,"SELECT * FROM statistik WHERE ip='$ip' AND tanggal='$tanggal' AND id_toko='".$_GET['idtoko']."'");
// // Kalau belum ada, simpan data user tersebut ke database
// if(mysqli_num_rows($s) == 0){
//   mysqli_query($conn,"INSERT INTO statistik(id_toko, ip, tanggal, hits, online, status) VALUES('".$_GET['idtoko']."','$ip','$tanggal','1','$waktu','$status')");} 
//       else {
//         mysqli_query($conn,"UPDATE statistik SET hits=hits+1, online='$waktu', status='$status' WHERE ip='$ip' AND tanggal='$tanggal' AND id_toko='".$_GET['idtoko']."'");
//       }

?>
<!DOCTYPE html>
<html>
<head>
<title>Your Title Here</title>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<meta http-equiv="Content-Language" content="en-us,id">
<meta name="keywords" content="Your Keyword" />
<meta name="description" content="Your Descripton" />
<meta name="robots" content="index,follow">
<meta name="Generator" content="umkm">
<meta name="Author" content="Your Name">
<meta name="revisit-after" content="2 days">
<meta NAME="Rating" CONTENT="General">
<meta NAME="Distribution" CONTENT="Global">
<link rel="shortcut icon" href="images/pavicon.ico" >
<link href="../css/style_penjualan.css" rel="stylesheet" type="text/css" media="screen" />
<link rel="stylesheet" href="../css/style_admin.css">


<!-- Start Slider HEAD section --> <!-- add to the <head> of your page -->
	<link rel="stylesheet" type="text/css" href="../css/style_guest_header.css" />
	<script type="text/javascript" src="../js/jquery_penjualan.js"></script>
	<!-- End Slider.com HEAD section -->




	
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.3";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>



<style>
#bgmenu{
    background:#0096D6;
    height:26px;
    width:100%;
    padding-top:5px;
}

</style>
<div id="bgmenu">
<div id="contact">
<ul>
       <li></li><li></li>  <li></li><li></li><li></li><li></li><li></li><li></li><li></li><li></li><li></li><li></li><li></li>
	   <li></li><li></li><li></li><li></li><li></li><li></li><li></li><li></li><li></li><li></li>
                            <li><a href="../index.php"><i class="fa fa-user"></i> Login Admin</a></li>
               <li><a href="cara_belanja.php"><i class="fa fa-pencil-square-o"></i> How to Order</a></li>
</ul>
</div>
</div>


<div id="header"><!--start header-->

<div id="header_content">	<!--start header conteent-->
	<ul>
	
	  <li><?php echo"<a href=\"index.php?idtoko=".$_GET['idtoko']."&clear=y\"><img src=\"../gambar/images/logo.png\"></a></li><li>";
		  echo'<form method="post" action="index.php?idtoko='.$_GET['idtoko'].'">
			     <input class="btncari" type="submit" value=""><input class="texbox_cari" name="cari" value="'.$_SESSION['scari'].'" placeholder="  Type Here to Search" >
			   </form>';
	   ?></li>
	   
	<li><?php include"cart.php";?></li>   
   </ul>  
</div><!--End header conteent-->
   
	 
     </div><!--end header-->

<div id="container"><!--start container-->
<div class="cleared"></div>