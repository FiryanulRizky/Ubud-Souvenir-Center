<html>
    <head>
        <title><?php ob_start();include"../header_session/login_inner.php";ob_end_clean(); $toko=mysqli_query($conn,"SELECT * FROM infotoko WHERE id_toko='$idtoko'"); $ambil_data_toko=mysqli_fetch_array($toko); $nama_toko=$ambil_data_toko['nama_toko']; echo $nama_toko." Halaman QR"; ?></title>
        <link rel="shortcut icon" type="image/x-icon" href="../gambar/images/head_logo.ico" />
        <link rel="stylesheet" type="text/css" href="../css/style_admin.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" />
    </head>
<body>
<?php include"../header_session/header_inner.php"; ?>
<div id="bgkonten">
<center>
<form method="post" action=qr_generator_toko.php>
<input type="submit" name="qr" value="TAMBAH" class="btn_submit"></center><hr>
</form>
<?php $cek_qr=mysqli_query($conn,"SELECT * FROM qrcodes WHERE id_toko='$idtoko'");
if (mysqli_num_rows($cek_qr)>0) { $cek_toko=mysqli_query($conn,"SELECT * FROM qrcodes WHERE id_toko='$idtoko' AND status='toko' ORDER BY id DESC");
if (mysqli_num_rows($cek_toko)>0) { ?>
<center><H3>QR Toko</H3>
<table border=1 style="text-align: center;">
	<tr style="font-weight: bold; background: lightgrey;">
		<td>Link</td>
		<td>Kode QR</td>
		<td colspan="2" style="width: 10%;">Aksi</td>
	</tr>
<?php 
while ($row1=mysqli_fetch_array($cek_toko)) {
	echo'<tr>
		<td><a href="'.$row1['qrContent'].'">'.$row1['qrContent'].'</a></td>
		<td><img src=\'./userQr/'.$row1['qrImg'].'\' width=120 height=120></td>
		<td><a href=\'../crud/hapus_qr.php?id='.$row1['id'].'\'><i class="fa fa-eraser" style="font-size: 20px;"></i></a></td>
		<td><a href="download.php?download='.$row1['qrImg'].'"><i class="fa fa-download" style="font-size: 20px;"></i></a></td>
	</tr>';
}
?></table></center> <?php } $cek_item=mysqli_query($conn,"SELECT * FROM qrcodes,item WHERE qrcodes.id_toko=item.id_toko AND qrcodes.id_toko='$idtoko' AND qrcodes.qrUsername=item.merk AND qrcodes.status='item' GROUP BY item.merk ORDER BY qrcodes.id DESC"); if (mysqli_num_rows($cek_item)>0) { ?>
<hr style="border-bottom: 2px solid;">
<center><H3>Daftar QR Item</H3>
<table border=1 style="text-align: center;">
	<tr style="font-weight: bold; background: lightgrey;">
		<td>No.</td>
		<td>Nama Item</td>
		<td>Gambar Item</td>
		<td>Link Penjualan</td>
		<td>Kode QR</td>
		<td colspan="2" style="width: 10%;">Aksi</td>
	</tr>
<?php 
while ($row2=mysqli_fetch_array($cek_item)) {
	echo'<tr>
		<td>'.++$no2.'</td>
		<td>'.$row2['qrUsername'].'</td>
		<td><img src=\'../gambar/produk/'.$row2['gambar_item'].'\' width=120 height=100></td>
		<td><a href="'.$row2['qrContent'].'">'.$row2['qrContent'].'</a></td>
		<td><img src=\'./userQr/'.$row2['qrImg'].'\' width=120 height=120></td>
		<td><a href=\'../crud/hapus_qr.php?id='.$row2['id'].'\'><i class="fa fa-eraser" style="font-size: 20px;"></i></a></td>
		<td><a href="download.php?download='.$row2['qrImg'].'"><i class="fa fa-download" style="font-size: 20px;"></i></a></td>
	</tr>';
}
?></table> <?php } ?>
</center>
<?php } else {
	echo'<center><H3>DATA QR MASIH KOSONG</H3></center>';
} include"../header_session/footer.php";?>
</div></body></html>