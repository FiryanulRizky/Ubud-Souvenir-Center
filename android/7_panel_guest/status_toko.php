<?php
include"../../db/koneksi.php";
$get_nama=mysqli_query($conn,"SELECT * FROM infotoko WHERE id_toko='".$_GET['idtoko']."'");
$ambil_data = mysqli_fetch_array($get_nama);
$namatoko=$ambil_data['nama_toko'];
if (!empty($_GET['id'] && !empty($_GET['merk']) && !empty($_GET['idtoko']))) {
	if ($ambil_data['status']=="Active") {
		echo'<script>window.location="../8_panel_penjualan/detail.php?id='.$_GET['id'].'&merk='.$_GET['merk'].'&idtoko='.$_GET['idtoko'].'";</script>';
	} elseif($ambil_data['status']=="Closed") {
	echo'<script>alert("Sorry, '.$namatoko.' is '.$ambil_data['status'].' Now, '.$ambil_data['info_status'].'");window.location="detail.php?id='.$_GET['id'].'&merk='.$_GET['merk'].'&idtoko='.$_GET['idtoko'].'";</script>';} else {
	echo'<script>alert("Sorry, This Shop is Closed or Currently Non-Active");window.location="index.php?clear=y";</script>';
}
} else {
	echo'<script>alert("Sorry, This Shop is Closed or Currently Non-Active");window.location="index.php?clear=y";</script>';
}
?>