<?php session_start();
	unset($_SESSION['super_admin']);
	header("location:../Super_Admin/index.php");
	exit;
?>