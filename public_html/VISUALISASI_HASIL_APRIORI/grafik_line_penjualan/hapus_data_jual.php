<?php 

include"../../header_session/login_inner.php";
include"../../db/koneksi.php";

	$cek_data=mysqli_query($conn,"SELECT * FROM graph,pendapatan WHERE graph.id_toko=pendapatan.id_toko AND graph.id_toko='$idtoko'");

	if (mysqli_num_rows($cek_data)>0) {

	@mysqli_query($conn,"DELETE FROM graph WHERE id_toko='$idtoko'");

	@mysqli_query($conn,"DELETE FROM pendapatan WHERE id_toko='$idtoko'"); echo'<script>alert("DATA BERHASIL DIHAPUS/RESET");window.location="tangkap_data_jual_Jan.php";</script>'; } else {

		echo'<script>alert("DATA KOSONG");window.location="tangkap_data_jual_Jan.php";</script>';

	}

?>