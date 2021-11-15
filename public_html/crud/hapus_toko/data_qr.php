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
    $rs=mysqli_query($conn,"SELECT * FROM qrcodes WHERE id_toko='".$_GET['id']."' AND status='toko'");
echo'<br><center><h2><form method="post" enctype="multipart/form-data"><input type="submit" value="HAPUS DATA QR" class="btn_submit"><input type="hidden" name="act" value="delete" ></form></h2></center>
<center><br>
<table border=1 style="text-align: center;">
    <tr style="font-weight: bold; background: lightgrey;">
        <td colspan=2><H3>QR Toko '.$namatoko.' (KDTK'.$_GET['id'].')</H3></td>
    </tr>
    <tr style="font-weight: bold; background: lightgrey;">
        <td>Link</td>
        <td>Kode QR</td>
    </tr>';
while ($row1=mysqli_fetch_array($rs)) {
    echo'<tr>
        <td>'.$row1['qrContent'].'</td>
        <td><img src=\'../../generator_qrcode/userQr/'.$row1['qrImg'].'\' width=120 height=120></td>
    </tr>';
}
?></table></center><br> <?php } $cek_item=mysqli_query($conn,"SELECT * FROM qrcodes,item WHERE qrcodes.id_toko=item.id_toko AND qrcodes.id_toko='".$_GET['id']."' AND qrcodes.qrUsername=item.merk AND qrcodes.status='item' GROUP BY item.merk ORDER BY qrcodes.id DESC"); if (mysqli_num_rows($cek_item)>0) { ?>
<hr style="border-bottom: 2px solid;">
<center><br>
<table border=1 style="text-align: center;">
    <tr style="font-weight: bold; background: lightgrey;">
        <td colspan=5><?php echo'<H3>QR Item '.$namatoko.' (KDTK'.$_GET['id'].')</H3>'; ?></td>
    </tr>
    <tr style="font-weight: bold; background: lightgrey;">
        <td>No.</td>
        <td>Nama Item</td>
        <td>Gambar Item</td>
        <td>Link Penjualan</td>
        <td>Kode QR</td>
    </tr>
<?php 
while ($row2=mysqli_fetch_array($cek_item)) {
    echo'<tr>
        <td>'.++$no2.'</td>
        <td>'.$row2['qrUsername'].'</td>
        <td><img src=\'../../gambar/produk/'.$row2['gambar_item'].'\' width=120 height=100></td>
        <td>'.$row2['qrContent'].'</td>
        <td><img src=\'../../generator_qrcode/userQr/'.$row2['qrImg'].'\' width=120 height=120></td>
    </tr>';
}
?></table> <?php } ?>
</center><?php 

if ($_POST['act']=="delete"){
    $gambar=mysqli_query($conn,"SELECT * FROM qrcodes WHERE id_toko='".$_GET['id']."'");
    while($nama_gambar=mysqli_fetch_array($gambar,MYSQLI_ASSOC)) {
    $hapus_gambar=$nama_gambar['qrImg'];
    $files=glob("../../generator_qrcode/userQr/".$hapus_gambar.""); foreach ($files as $file) {
    if (is_file($file))
    unlink($file);} }
    $hapus_qr=mysqli_query($conn,"DELETE FROM qrcodes WHERE id_toko='".$_GET['id']."'");
    echo'<script>alert("Anda berhasil menghapus data QR '.$namatoko.'");top.document.location.href="hapus_toko.php?id='.$_GET['id'].'";</script>';
}
?>
<div class="cleared"></div>