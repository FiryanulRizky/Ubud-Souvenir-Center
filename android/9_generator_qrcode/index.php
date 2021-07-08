<link rel="stylesheet" type="text/css" href="../css/style_admin.css">

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" />

<?php ob_start(); include"../1_login_reg/login_reg.php"; ob_end_clean(); ?>

<center>

<form method="post" action="qr_generator_toko.php">
<input type="submit" name="qr" value="TAMBAH" style="padding: 10px; background: lightgrey;"></center>
</form><br>

<?php $cek_qr=mysqli_query($conn,"SELECT * FROM qrcodes WHERE id_toko='$idtoko'");

if (mysqli_num_rows($cek_qr)>0) { $cek_toko=mysqli_query($conn,"SELECT * FROM qrcodes,infotoko WHERE qrcodes.id_toko=infotoko.id_toko AND qrcodes.id_toko='$idtoko' AND qrcodes.status='toko' ORDER BY id DESC");

if (mysqli_num_rows($cek_toko)>0) { ?>

<center><H3>QR Toko</H3>

<table border=1 style="text-align: center;">

	<tr style="font-weight: bold; background: lightgrey;">

		<td>Nama/ID</td>

		<td>Kode QR</td>

		<td colspan="2" style="width: 10%;">Aksi</td>

	</tr>

<?php 

while ($row1=mysqli_fetch_array($cek_toko)) {

	echo'<tr>

		<td>'.$row1['nama_toko'].' (KDTK'.$row1['id_toko'].')</td>

		<td><img src=\'../../generator_qrcode/userQr/'.$row1['qrImg'].'\' width=120 height=120></td>

		<td><a href=\'hapus_qr.php?id='.$row1['id'].'\'><i class="fa fa-eraser" style="font-size: 20px;"></i></a></td>

		<td><a href="download.php?download='.$row1['qrImg'].'"><i class="fa fa-download" style="font-size: 20px;"></i></a></td>

	</tr>';

}

?></table></center> <?php } $cek_item=mysqli_query($conn,"SELECT * FROM qrcodes,item WHERE qrcodes.id_toko=item.id_toko AND qrcodes.id_toko='$idtoko' AND qrcodes.qrUsername=item.merk AND qrcodes.status='item' GROUP BY item.merk ORDER BY qrcodes.id DESC"); if (mysqli_num_rows($cek_item)>0) { ?>

<hr style="border-bottom: 2px solid;"><br>

<center><H3>Daftar QR Item</H3>

<table border=1 style="text-align: center;">

	<tr style="font-weight: bold; background: lightgrey;">

		<td>No.</td>

		<td>Nama Item</td>

		<td>Gambar Item</td>

		<td>Kode QR</td>

		<td colspan="2" style="width: 10%;">Aksi</td>

	</tr>

<?php 

while ($row2=mysqli_fetch_array($cek_item)) {

	echo'<tr>

		<td>'.++$no2.'</td>

		<td>'.$row2['qrUsername'].'</td>

		<td><img src=\'../../gambar/produk/'.$row2['gambar_item'].'\' width=90 height=70></td>

		<td><img src=\'../../generator_qrcode/userQr/'.$row2['qrImg'].'\' width=90 height=90></td>

		<td><a href=\'hapus_qr.php?id='.$row2['id'].'\'><i class="fa fa-eraser" style="font-size: 20px;"></i></a></td>

		<td><a href="download.php?download='.$row2['qrImg'].'"><i class="fa fa-download" style="font-size: 20px;"></i></a></td>

	</tr>';

}

?></table> <?php } ?>

</center>

<?php } else {

	echo'<center><H3>DATA QR MASIH KOSONG</H3></center>';

} ?>