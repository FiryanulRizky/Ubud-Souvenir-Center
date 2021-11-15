<link rel="stylesheet" type="text/css" href="../css/style_admin.css">
<?php
ob_start();
include"../1_login_reg/login_reg.php";
ob_end_clean();
?>
<div id="bgkonten">
<div class="konten_tabel">
<center><br><br><table><tr><td><a style="padding:10px; border:1px solid #06F; font-size:32px; background:orange; color:black; font-weight:bold;"  href="index.php">Kembali</a></td><td>&nbsp;&nbsp;</td><td><a style="padding:10px; border:1px solid #06F; background: blue; font-size: 32px; font-weight:bold; color:white;"  href="pola_2_tabel_detail.php">Lihat Detail</a></td></tr></table><br><br>
<div class="view_data">
<table border="1" style="width:100%; text-align: center; font-size:38px;">
<tr style="background-color:lightgrey;">
  <td colspan="2"><b style="font-size:42px;">Pola Transaksi 2 Itemset<br>Total : <?php $result=mysqli_query($conn,"SELECT * FROM itemc2 WHERE id_toko ='$idtoko' AND persen_support>0 ORDER BY kditem1 ASC ");
		$data_jml=mysqli_num_rows($result); 
		echo $data_jml." Item"; ?></b></td>
  </tr>
	<?php
		//kosong tmp transaksi
 		$result=mysqli_query($conn,"SELECT * FROM itemc2 WHERE id_toko ='$idtoko' AND persen_support>0 ORDER BY kditem1 ASC");
		while($rowC2 = mysqli_fetch_array($result,MYSQLI_ASSOC))
		{
		?>
		<tr>
			<td><?php echo ++$no ?></td><td>Kode : <?php
            $C2kditem1=$rowC2['kditem1']; $C2kditem2=$rowC2['kditem2'];
			//menampilkan data kditem1 c2
			$MerkItem1=mysqli_query($conn,"SELECT * FROM item WHERE id_toko ='$idtoko' AND kditem='$C2kditem1' ");
			$DataMerkItem1=mysqli_fetch_array($MerkItem1,MYSQLI_ASSOC); echo "[BR".$DataMerkItem1['kditem']."]".", ";
			$MerkItem2=mysqli_query($conn,"SELECT * FROM item WHERE id_toko ='$idtoko' AND kditem='$C2kditem2' ");
			$DataMerkItem2=mysqli_fetch_array($MerkItem2,MYSQLI_ASSOC); echo "[BR".$DataMerkItem2['kditem']."]"."<hr>";
			$MerkItem1=mysqli_query($conn,"SELECT * FROM item WHERE id_toko ='$idtoko' AND kditem='$C2kditem1' ");
			$DataMerkItem1=mysqli_fetch_array($MerkItem1,MYSQLI_ASSOC); echo $DataMerkItem1['merk'].", ";
			$MerkItem2=mysqli_query($conn,"SELECT * FROM item WHERE id_toko ='$idtoko' AND kditem='$C2kditem2' ");
			$DataMerkItem2=mysqli_fetch_array($MerkItem2,MYSQLI_ASSOC); echo $DataMerkItem2['merk']."<br><br>";
			$MerkItem1=mysqli_query($conn,"SELECT * FROM item WHERE id_toko = '$idtoko' AND kditem='$C2kditem1' ");
			$DataMerkItem1=mysqli_fetch_array($MerkItem1,MYSQLI_ASSOC); echo "<img src=\"../../gambar/produk/".$DataMerkItem1['gambar_item']."\" width='200' height='125'>".", ";
			$MerkItem2=mysqli_query($conn,"SELECT * FROM item WHERE id_toko ='$idtoko' AND kditem='$C2kditem2'");
			$DataMerkItem2=mysqli_fetch_array($MerkItem2,MYSQLI_ASSOC); echo "<img src=\"../../gambar/produk/".$DataMerkItem2['gambar_item']."\" width='200' height='125'>"."<br><br>";
			?><?php echo "Terjual bersama : ".$rowC2['support_count']." kali";?><br><?php echo "Persentase terjual bersama : ".substr($rowC2['persen_support'],0,5)."%";?></td>
		<?php }
		?></tr></table><br><hr><br>
<table border="1" style="width: 100%; text-align: center; font-size:36px;">
<tr style="background-color:yellow;text-align:center;">
  <td colspan="3"><b style="font-size:42px;">Pola Transaksi 2 Itemset : <?php
  $strRule=mysqli_query($conn,"SELECT * FROM rule WHERE id_toko ='$idtoko' AND kdrule='R2'");
		$dataRule=mysqli_fetch_array($strRule,MYSQLI_ASSOC); 
		$nRule=$dataRule['minsupport'];
			echo "$nRule %<br>Total : ";
  $result=mysqli_query($conn,"SELECT * FROM itemc2 WHERE id_toko ='$idtoko' AND persen_support >='$nRule'  ORDER BY kditem1 ASC ");
		$data_jml=mysqli_num_rows($result); 
		echo $data_jml." Item";
  ?></b></td>
  </tr>
	<?php
		//kosong tmp transaksi
 		$result=mysqli_query($conn,"SELECT * FROM itemc2 WHERE id_toko ='$idtoko' AND persen_support >='$nRule'  ORDER BY kditem1 ASC ");
		while($rowC2 = mysqli_fetch_array($result,MYSQLI_ASSOC))
		{
		?>
		<tr>
			<td><?php echo ++$no1 ?></td><td>Kode : <?php
            $C2kditem1=$rowC2['kditem1']; $C2kditem2=$rowC2['kditem2'];
			//menampilkan data kditem1 c2
			$MerkItem1=mysqli_query($conn,"SELECT * FROM item WHERE id_toko ='$idtoko' AND kditem='$C2kditem1' ");
			$DataMerkItem1=mysqli_fetch_array($MerkItem1,MYSQLI_ASSOC); echo "[BR".$DataMerkItem1['kditem']."]".", ";
			$MerkItem2=mysqli_query($conn,"SELECT * FROM item WHERE id_toko ='$idtoko' AND kditem='$C2kditem2' ");
			$DataMerkItem2=mysqli_fetch_array($MerkItem2,MYSQLI_ASSOC); echo "[BR".$DataMerkItem2['kditem']."]"."<hr>";
			$MerkItem1=mysqli_query($conn,"SELECT * FROM item WHERE id_toko ='$idtoko' AND kditem='$C2kditem1' ");
			$DataMerkItem1=mysqli_fetch_array($MerkItem1,MYSQLI_ASSOC); echo $DataMerkItem1['merk'].", ";
			$MerkItem2=mysqli_query($conn,"SELECT * FROM item WHERE id_toko ='$idtoko' AND kditem='$C2kditem2' ");
			$DataMerkItem2=mysqli_fetch_array($MerkItem2,MYSQLI_ASSOC); echo $DataMerkItem2['merk']."<br><br>";
			$MerkItem1=mysqli_query($conn,"SELECT * FROM item WHERE id_toko ='$idtoko' AND kditem='$C2kditem1' ");
			$DataMerkItem1=mysqli_fetch_array($MerkItem1,MYSQLI_ASSOC); echo "<img src=\"../../gambar/produk/".$DataMerkItem1['gambar_item']."\" width='200' height='125'>".", ";
			$MerkItem2=mysqli_query($conn,"SELECT * FROM item WHERE id_toko ='$idtoko' AND kditem='$C2kditem2' ");
			$DataMerkItem2=mysqli_fetch_array($MerkItem2,MYSQLI_ASSOC); echo "<img src=\"../../gambar/produk/".$DataMerkItem2['gambar_item']."\" width='200' height='125'>"."<br><br>";
			?><?php echo "Terjual bersama : ".$rowC2['support_count']." kali";?><br><?php echo "Persentase terjual bersama : ".substr($rowC2['persen_support'],0,5)."%";?></td>
		<?php }
		?></tr></table>
</div>
</div>
</body>
</html>