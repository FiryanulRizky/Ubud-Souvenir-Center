<?php 
include"../db/koneksi.php";
include"../db/web_config.php";
$query=mysqli_query($conn,"SELECT * FROM infotoko WHERE id_toko='$idtoko'");
$toko=mysqli_fetch_array($query);
$query2=mysqli_query($conn,"SELECT * FROM admin_web WHERE id_toko='$idtoko'");
$query3=mysqli_query($conn,"SELECT * FROM item WHERE id_toko='$idtoko'");
$item=mysqli_fetch_array($query3);
$query4=mysqli_query($conn,"SELECT SUM(stok)AS total_stok FROM item WHERE id_toko='$idtoko'");
$item2=mysqli_fetch_array($query4);
$query5=mysqli_query($conn,"SELECT * FROM transaksi WHERE id_toko='$idtoko' GROUP BY kdtransaksi");
ob_start();
include"../VISUALISASI_HASIL_APRIORI/grafik_line_penjualan/tangkap_data_cpm.php";
ob_end_clean();
?>
<center>
<h1 align="center">Info Toko & Data Terkini</h1>
<table>
	<tr>
		<td>Status Toko</td><td>:</td><td><?php echo $toko['status']; ?></td><td>&nbsp;&nbsp;</td><td style="border-left: 1px solid;">&nbsp;&nbsp;Total Produk</td><td>:</td><td><?php echo mysqli_num_rows($query3); ?></td>
	</tr>
	<tr>
		<td>Pemilik</td><td>:</td><td><?php echo $toko['pemilik']; ?></td><td>&nbsp;&nbsp;</td><td style="border-left: 1px solid;">&nbsp;&nbsp;Total Stok</td><td>:</td><td><?php echo $item2['total_stok']; ?></td>
	</tr>
	<tr>
		<td>WA/HP Bisnis</td><td>:</td><td><?php echo $toko['wa']; ?></td><td>&nbsp;&nbsp;</td><td style="border-left: 1px solid;">&nbsp;&nbsp;Total Transaksi</td><td>:</td><td><?php echo mysqli_num_rows($query5); ?></td>
	</tr>
	<tr>
		<td>Alamat</td><td>:</td><td><?php echo $toko['alamat']; ?></td><td>&nbsp;&nbsp;</td><td style="border-left: 1px solid;">&nbsp;&nbsp;Total Kunjungan</td><td>:</td><td><?php echo $toko['visitors']; ?></td>
	</tr>
	<tr><td>Jumlah Admin</td><td>:</td><td><?php echo mysqli_num_rows($query2); ?></td><td>&nbsp;&nbsp;</td><td style="border-left: 1px solid;">&nbsp;&nbsp;Pendapatan/bulan</td><td>:</td><td><?php echo format_currency($cpm); ?></td></tr>
</table>
</center>