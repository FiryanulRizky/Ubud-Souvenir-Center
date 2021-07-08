<?php 
ob_start();
include"login_reg.php";
ob_end_clean();
	session_start();
	session_destroy();
	$cek_ip=mysqli_query($conn,"SELECT * FROM statistik WHERE id_toko='$idtoko'");
	if(mysqli_num_rows($cek_ip)>0) {
	    $del_statistik=mysqli_query($conn,"DELETE FROM statistik WHERE id_toko='$idtoko'");
	}
	header("location:login_reg.php");
	exit;
?>