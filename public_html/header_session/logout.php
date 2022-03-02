<?php
include"login_inner.php";
	session_start();
	$del_statistik=mysqli_query($conn,"DELETE FROM statistik WHERE id_toko='$idtoko'");
	session_destroy();
	header("location:../admin/index.php");
	exit;
?>
