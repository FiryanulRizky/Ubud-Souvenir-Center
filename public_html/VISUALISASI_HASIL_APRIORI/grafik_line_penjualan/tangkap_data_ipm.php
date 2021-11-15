<?php 

ob_start();

include"../../header_session/login_inner.php";

ob_end_clean();
include"../../db/koneksi.php";

$pendapatan_bulanan=mysqli_query($conn,"SELECT SUM(Januari+Februari+Maret+April+Mei+Juni+Juli+Agustus+September+Oktober+November+Desember) AS total FROM pendapatan WHERE id_toko='$idtoko'");

$tangkap_pendapatan=mysqli_fetch_array($pendapatan_bulanan);

$pendapatan_bersih=ceil($tangkap_pendapatan['total']);

$ipm=ceil($tangkap_pendapatan['total']/12);



$item_bulanan=mysqli_query($conn,"SELECT SUM(Januari+Februari+Maret+April+Mei+Juni+Juli+Agustus+September+Oktober+November+Desember) AS total FROM graph WHERE id_toko='$idtoko'");

$tangkap_item=mysqli_fetch_array($item_bulanan);

$jumlah_item=$tangkap_item['total'];

$rerata_item=$tangkap_item['total']/12;



echo $pendapatan_bersih."<br>".$ipm."<br>".$jumlah_item."<br>".$rerata_item;

?>