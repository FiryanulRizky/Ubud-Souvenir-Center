<?php 
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
?>
<link rel="stylesheet" type="text/css" href="../../css/style_admin.css">
<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
<?php
// *** LOAD ADMIN PAGE HEADER
include "../../db/koneksi.php";
$rs=mysqli_query($conn,"SELECT * FROM infotoko WHERE id_toko='".$_GET['id']."'"); $ambil_data=mysqli_fetch_array($rs); $namatoko=$ambil_data['nama_toko'];
if (!empty($_GET['id'])){
    $rs=mysqli_query($conn,"SELECT * FROM item WHERE id_toko='".$_GET['id']."'");
echo'<br><center><h2><form method="post" enctype="multipart/form-data"><input type="submit" value="HAPUS SEMUA ITEM" class="btn_submit"><input type="hidden" name="act" value="delete" ></form></h2></center><br><table border=1 style="width:100%;"><tr style="background:lightgrey;font-weight:bold;text-align:center;"><td colspan=3>Item '.$namatoko.' (KDTK'.$_GET['id'].')</td></tr><tr style="text-align:center;font-weight:bold;background:lightgrey;"><td>No.</td><td>Merk</td><td>Harga</td></tr>';
    while($row=mysqli_fetch_array($rs)){
echo'<tr><td>'.++$no.'</td><td>'.$row['merk'].'</td><td>'.$row['harga'].'</td></tr>';
} echo'</table>'; }

if ($_POST['act']=="delete"){
    $gambar=mysqli_query($conn,"SELECT * FROM item WHERE id_toko='".$_GET['id']."'");
    while($nama_gambar=mysqli_fetch_array($gambar,MYSQLI_ASSOC)) {
    $hapus_gambar=$nama_gambar['gambar_item'];
    $files=glob("../../gambar/produk/".$hapus_gambar."");}
    foreach ($files as $file) {
    if (is_file($file))
    unlink($file); // hapus file
    $hapus_item=mysqli_query($conn,"DELETE FROM item WHERE id_toko='".$_GET['id']."'");
    $hapus_kategori=mysqli_query($conn,"DELETE FROM kategori WHERE id_toko='".$_GET['id']."'");
    echo'<script>alert("Anda berhasil menghapus data Item '.$namatoko.'");top.document.location.href="hapus_toko.php?id='.$_GET['id'].'";</script>';
}   
}
?>
<div class="cleared"></div>