<?php 
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
?>
<link rel="stylesheet" type="text/css" href="../../css/style_admin.css">
<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
<?php
// *** LOAD ADMIN PAGE HEADER
include "../../db/koneksi.php";
$rs=mysqli_query($conn,"SELECT * FROM infotoko WHERE id_toko='".$_GET['id']."'");$row=mysqli_fetch_array($rs);
if (!empty($_GET['id'])){
echo'<br><center><h2><form method="post" enctype="multipart/form-data"><input type="submit" value="HAPUS AKUN TOKO" class="btn_submit"><input type="hidden" name="act" value="delete" ></form></h2></center><br><table border=1 style="width:100%;"><tr style="text-align:center;font-weight:bold;font-size:18px;background:lightgrey;"><td>Nama</td><td>Username</td></tr>';
echo'<tr><td>'.$row['nama_toko'].'</td><td>'.$row['pemilik'].'</td></tr></table>'; echo $tanggal=date("d-m-y");
    echo $jam=date("H:i:s"); }

if ($_POST['act']=="delete"){
	$gambar=mysqli_query($conn,"SELECT * FROM infotoko WHERE id_toko='".$_GET['id']."'");
    $nama_gambar=mysqli_fetch_array($gambar);
    $nama_toko=$nama_gambar['nama_toko'];
    $wa=$nama_gambar['wa'];
    $pemilik=$nama_gambar['pemilik'];
    $pesan=$nama_gambar['info_status'];
    $hapus_gambar=$nama_gambar['gambar_toko'];
    $files=glob("../../gambar/toko/".$hapus_gambar."");
    foreach ($files as $file) {
    if (is_file($file))
    unlink($file); // hapus file
	}
	$hapus_admin=mysqli_query($conn,"DELETE FROM admin_web WHERE id_toko='".$_GET['id']."'");
	$hapus_rule=mysqli_query($conn,"DELETE FROM rule WHERE id_toko='".$_GET['id']."'");
	$hapus_kategori=mysqli_query($conn,"DELETE FROM kategori WHERE id_toko='".$_GET['id']."'");
	$simpan_testi=mysqli_query($conn,"INSERT INTO riwayat_testi (id,nama_toko,pemilik,wa,pesan,tanggal,jam) VALUES ('".$_GET['id']."','$nama_toko','$pemilik','$wa','$pesan','".date("Y-m-d")."','".date("H:i:s")."')");
    $hapus_toko=mysqli_query($conn,"DELETE FROM infotoko WHERE id_toko='".$_GET['id']."'");
    session_destroy();
    echo'<script>alert("Anda berhasil menghapus Akun Toko '.$namatoko.'");top.document.location.href="../../Super_Admin/halaman_tinjau_akun.php";</script>';
}
?>
<div class="cleared"></div>