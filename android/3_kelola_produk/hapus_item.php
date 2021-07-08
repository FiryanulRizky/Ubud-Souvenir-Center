<?php
ob_start();
include "../1_login_reg/login_reg.php";
ob_end_clean();
$kdhapus=$_GET['id'];
$gambar=mysqli_query($conn,"SELECT * FROM item WHERE id_toko='$idtoko' AND id_item='$kdhapus'");
$nama_gambar=mysqli_fetch_array($gambar,MYSQLI_ASSOC);
$hapus_gambar=$nama_gambar['gambar_item'];
$files=glob("../../gambar/produk/".$hapus_gambar."");
foreach ($files as $file) {
    if (is_file($file))
    unlink($file); // hapus file
}
@mysqli_query($conn,"DELETE FROM item WHERE id_item='$kdhapus'");
@mysqli_query($conn,"DELETE FROM statistik WHERE id_toko='$idtoko'");
echo'<script>window.location="item.php";</script>';
?>