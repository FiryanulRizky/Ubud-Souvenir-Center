<?php 
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
?>
<link rel="stylesheet" type="text/css" href="../../css/style_admin.css">
<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
<?php
// *** LOAD ADMIN PAGE HEADER
include "../../db/koneksi.php";
date_default_timezone_set('Asia/Makassar');
$rs=mysqli_query($conn,"SELECT * FROM infotoko WHERE id_toko='".$_GET['id']."'"); $ambil_data=mysqli_fetch_array($rs);
     $namatoko=$ambil_data['nama_toko'];
     $pesan=$ambil_data['info_status'];
     $wa_bisnis=$ambil_data['wa'];
     $pemilik=$ambil_data['pemilik'];
if (!empty($_GET['id'])){
    $rs=mysqli_query($conn,"SELECT * FROM transaksi WHERE id_toko='".$_GET['id']."' GROUP BY kdtransaksi ORDER BY id_transaksi ASC");
echo'<br><center><h2><form method="post" enctype="multipart/form-data"><input type="submit" value="HAPUS SEMUA TRANSAKSI" class="btn_submit"><input type="hidden" name="act" value="delete" ></form></h2></center><br><table border=1 style="width:100%;"><tr style="text-align:center;font-weight:bold;background:lightgrey;"><td>KD Trans.</td><td>Pola Transaksi</td><td>Tanggal</td></tr>';
    while($row=mysqli_fetch_array($rs)){
    	$kdtransaksi=$row['kdtransaksi'];
echo'<tr><td>(KDTR'.$kdtransaksi.')</td><td>';$result2=mysqli_query($conn,"SELECT * FROM transaksi,item WHERE item.kditem=transaksi.kditem AND transaksi.id_toko=item.id_toko AND transaksi.id_toko='".$_GET['id']."' AND transaksi.kdtransaksi='$kdtransaksi' ORDER BY item.kditem"); while($rowItem=mysqli_fetch_array($result2)){echo $rowItem['merk'].", ";} echo'</td><td width=60>'.date('M-Y',strtotime($row['tgltransaksi'])).'</td></tr>';
} echo'</table>'; }

if ($_POST['act']=="delete"){
    $hapus_transaksi=mysqli_query($conn,"DELETE FROM transaksi WHERE id_toko='".$_GET['id']."'");
    $hapus_pendapatan=mysqli_query($conn,"DELETE FROM pendapatan WHERE id_toko='".$_GET['id']."'");
    $hapus_graph=mysqli_query($conn,"DELETE FROM graph WHERE id_toko='".$_GET['id']."'");
    $hapus_pembeli=mysqli_query($conn,"DELETE FROM pembeli WHERE id_toko='".$_GET['id']."'");
    $hapus_admin=mysqli_query($conn,"DELETE FROM admin_web WHERE id_toko='".$_GET['id']."'");

    $gambar=mysqli_query($conn,"SELECT * FROM item WHERE id_toko='".$_GET['id']."'");
    $nama_gambar=mysqli_fetch_array($gambar,MYSQLI_ASSOC);
    $hapus_gambar=$nama_gambar['gambar_item'];
    $files=glob("../../gambar/produk/".$hapus_gambar.""); foreach ($files as $file) {
    if (is_file($file))
    unlink($file);}
    $hapus_item=mysqli_query($conn,"DELETE FROM item WHERE id_toko='".$_GET['id']."'");

    $hapus_kategori=mysqli_query($conn,"DELETE FROM kategori WHERE id_toko='".$_GET['id']."'");
    $hapus_akun=mysqli_query($conn,"DELETE FROM infotoko WHERE id_toko='".$_GET['id']."'");
    $cek_testi=mysqli_query($conn,"SELECT * FROM riwayat_testi WHERE id='".$_GET['id']."'");
    if (mysqli_num_rows($cek_testi)==0) {
    $tambah_riwayat_testi=mysqli_query($conn,"INSERT INTO riwayat_testi (id,nama_toko,pemilik,wa,pesan,tanggal,jam) VALUES ('".$_GET['id']."','$namatoko','$pemilik','$wa_bisnis','$pesan','".date("Y-m-d")."','".date("H:i:s")."')");echo'<script>alert("Anda berhasil menghapus data Transaksi '.$namatoko.'");top.document.location.href="../../Super_Admin/index.php";</script>';}
}
?>
<div class="cleared"></div>