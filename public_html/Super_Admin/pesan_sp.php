<html>
    <head>
        <title>Kritik/Testi Super Admin</title>
        <link rel="shortcut icon" type="image/x-icon" href="../gambar/images/head_logo.ico" />
        <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
    </head>
<body>
<?php
ob_start();
include"../header_session/login_sp.php";
ob_end_clean();
include"../header_session/header_sp.php";
echo "<div id='bgkonten'>";
$cek_testi=mysqli_query($conn,"SELECT * FROM riwayat_testi ORDER BY id");
if (mysqli_num_rows($cek_testi)>0) {
echo'<h2><center>Riwayat Testi/Kritik</center></h2><br>';
	echo'<table border=1 style="width:100%;"><tr style="text-align:center;">
		<td>No.</td>
		<td>Toko</td>
		<td>Pemilik</td>
		<td>WA Bisnis</td>
		<td>Testi/Kritik</td>
		<td>Tanggal</td>
		<td>Waktu</td>
		<td>Aksi</td>
	</tr>';
while($ambil_data=mysqli_fetch_array($cek_testi)) {
$id=$ambil_data['id'];
$nama_toko=$ambil_data['nama_toko'];
$pemilik=$ambil_data['pemilik'];
$wa_bisnis=$ambil_data['wa'];
$pesan=$ambil_data['pesan'];
$tanggal=$ambil_data['tanggal'];
$jam=$ambil_data['jam'];
	echo'
	<tr>
		<td style="text-align:center;">'.++$no.'</td>
		<td>'.$nama_toko.'</td>
		<td>'.$pemilik.'</td>
		<td style="text-align:center;">'.$wa_bisnis.'</td>
		<td>'.$pesan.'</td>
		<td style="text-align:center;">'.date("d-M-Y",strtotime($tanggal)).'</td>
		<td style="text-align:center;">'.date("H:i:s",strtotime($jam)).' WITA</td>
		<td style="text-align:center;"><a href="../crud/hapus_toko/konfirmasi_hapus_testi.php?idtk='.$id.'&namatk='.$nama_toko.'"><i class="fa fa-eraser"></i></a></td>
	</tr>';
} } echo'</table>'; include"../header_session/footer_sp.php";
echo"</div>"; 

?></body></html>