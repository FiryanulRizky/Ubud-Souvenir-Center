<?php
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
// *** LOAD SESSION
session_start();
// *** DB CONNECTION
include"../../db/koneksi.php";
include "../../db/web_config.php";
date_default_timezone_set('Asia/Makassar');
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
	<link rel="stylesheet" type="text/css" href="../../css/style_guest_header.css" />
	<script type="text/javascript" src="../../js/jquery_penjualan.js"></script>
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
<!--<div id="bgmenu">-->
<!--<div id="contact">-->
<!--<ul>-->
<!--       <li></li><li></li>  <li></li><li></li><li></li><li></li><li></li><li></li><li></li><li></li><li></li><li></li><li></li>-->
<!--	   <li></li><li></li><li></li><li></li><li></li><li></li><li></li><li></li><li></li><li></li>-->
<!--               <li><a href="../8_pannel_penjualan/cara_belanja.php"><i class="fa fa-pencil-square-o"></i> How to Order</a></li>-->
<!--</ul>-->
<!--</div>-->
<!--</div>-->


<div id="header"><!--start header-->

<div id="header_content">	<!--start header conteent-->
	<ul>
	
	  <li><?php echo"<img src=\"../../gambar/images/logo.png\"></li><li>";
		  echo'<form method="post" action="../8_pannel_penjualan/index.php">
			     <input class="btncari" type="submit" value=""><input class="texbox_cari" name="cari" value="'.$_SESSION['scari'].'" placeholder="  Type Here to Search" >
			   </form>';
	   ?></li>
	   
	<li><?php include"../8_panel_penjualan/cart.php";?></li>

	<li><form method="post"><input type="submit" value="Back to Main" name="ke_main" style="font-size:24px;background:white;margin-top:12px;border:1px solid orange;padding:10px;"></form></li>

   </ul>  
</div><!--End header conteent-->

<?php
if(isset($_POST['ke_main'])) {
    if($total_quantity>0) {
    echo'<script>
        var yakin = confirm("'.$total_quantity.' item still in cart, Sure to Abort it & Move to Main Menu ?");

        if (yakin) {
        	window.location = "../7_panel_guest/home.php";
        } else {
            window.location = "'.$_SERVER['PHP_SELF'].'?idtoko='.$_GET['idtoko'].'";
        }
    </script>';
    }
    else {
        header("Location : ../7_panel_guest/home.php");
    }
}
?>   


	 
     </div><!--end header-->

<div id="container"><!--start container-->
<div class="cleared"></div>