<link rel="stylesheet" type="text/css" href="../css/style_admin.css">
<?php
ob_start();
include"../1_login_reg/login_reg.php";
ob_end_clean();
?>
<div id="bgkonten">
<div class="konten_tabel">
<center><br><br><table><tr><td><a style="padding:10px; border:1px solid #06F; font-size:32px; font-weight:bold; background:orange; color:black;" href="index.php">Kembali</a></td><td>&nbsp;&nbsp;</td><td><form method="post" action="pola_3_tabel_detail.php"><input type="submit" name="hasil_semua" style="padding:10px; border:1px solid #06F; background: blue; font-size: 32px; color:white; font-weight:bold;" value="Lihat Detail"></form></td></tr></table><br><br>
<div class="view_data">
<table border="1" style="width: 100%; text-align: center; font-size:36px;">
<tr style="background-color:lightgrey;">
  <td colspan="2"><b style="font-size:42px;">Pola Transaksi 3 Itemset<br>Total : <?php 
  
  $result=mysqli_query($conn,"SELECT * FROM itemc3 WHERE id_toko ='$idtoko' AND persen_support>0 ORDER BY kditem1,kditem2 ASC ");
		$data_jml=mysqli_num_rows($result); 
		echo $data_jml." Item"; ?></b></td>
  </tr>
	<?php
		//kosong tmp transaksi
 		$resultC3=mysqli_query($conn,"SELECT * FROM itemc3 WHERE id_toko ='$idtoko' AND persen_support>0 ORDER BY kditem1,kditem2 ASC ");
		$support_count="0";
		while($rowC3 = mysqli_fetch_array($resultC3,MYSQLI_ASSOC))
		{
		?>
		<tr>
			<td><?php echo ++$no;?></td><td><?php
            //echo $rowC3['kditem1'].",".$rowC3['kditem2'].",".$rowC3['kditem3'];
			$C3kditem1=$rowC3['kditem1']; $C3kditem2=$rowC3['kditem2']; $C3kditem3=$rowC3['kditem3'];
			//menampilkan data kditem1 c3
			//kodeitem
			$MerkItem1=mysqli_query($conn,"SELECT * FROM item WHERE id_toko ='$idtoko' AND kditem='$C3kditem1' ");
			$DataMerkItem1=mysqli_fetch_array($MerkItem1,MYSQLI_ASSOC); echo "Kode : [BR".$DataMerkItem1['kditem']."]".", ";
			//menampilkan data kditem2 c3
			$MerkItem2=mysqli_query($conn,"SELECT * FROM item WHERE kditem='$C3kditem2' AND id_toko='$idtoko'");
			$DataMerkItem2=mysqli_fetch_array($MerkItem2,MYSQLI_ASSOC); echo "[BR".$DataMerkItem2['kditem']."]".", ";
			//menampilkan data kditem3 c3
			$MerkItem3=mysqli_query($conn,"SELECT * FROM item WHERE id_toko ='$idtoko' AND kditem='$C3kditem3'");
			$DataMerkItem3=mysqli_fetch_array($MerkItem3,MYSQLI_ASSOC); echo "[BR".$DataMerkItem3['kditem']."]"."<hr>";

			//merk
			$MerkItem1=mysqli_query($conn,"SELECT * FROM item WHERE id_toko ='$idtoko' AND kditem='$C3kditem1' ");
			$DataMerkItem1=mysqli_fetch_array($MerkItem1,MYSQLI_ASSOC); echo $DataMerkItem1['merk'].", ";
			//menampilkan data kditem2 c3
			$MerkItem2=mysqli_query($conn,"SELECT * FROM item WHERE id_toko='$idtoko' AND kditem='$C3kditem2'");
			$DataMerkItem2=mysqli_fetch_array($MerkItem2,MYSQLI_ASSOC); echo $DataMerkItem2['merk'].", ";
			//menampilkan data kditem3 c3
			$MerkItem3=mysqli_query($conn,"SELECT * FROM item WHERE id_toko ='$idtoko' AND kditem='$C3kditem3' ");
			$DataMerkItem3=mysqli_fetch_array($MerkItem3,MYSQLI_ASSOC); echo $DataMerkItem3['merk']."<br><br>";

			//gambar
			$MerkItem1=mysqli_query($conn,"SELECT * FROM item WHERE id_toko ='$idtoko' AND kditem='$C3kditem1' ");
			$DataMerkItem1=mysqli_fetch_array($MerkItem1,MYSQLI_ASSOC); echo "<img src=\"../../gambar/produk/".$DataMerkItem1['gambar_item']."\" width='200' height='125'>".", ";
			//menampilkan data kditem2 c3
			$MerkItem2=mysqli_query($conn,"SELECT * FROM item WHERE id_toko='$idtoko' AND kditem='$C3kditem2'");
			$DataMerkItem2=mysqli_fetch_array($MerkItem2,MYSQLI_ASSOC); echo "<img src=\"../../gambar/produk/".$DataMerkItem2['gambar_item']."\" width='200' height='125'>".", ";
			//menampilkan data kditem3 c3
			$MerkItem3=mysqli_query($conn,"SELECT * FROM item WHERE id_toko ='$idtoko' AND kditem='$C3kditem3' ");
			$DataMerkItem3=mysqli_fetch_array($MerkItem3,MYSQLI_ASSOC); echo "<img src=\"../../gambar/produk/".$DataMerkItem3['gambar_item']."\" width='200' height='125'>"."<br>";
			?><br><?php echo "Terjual bersama : ".$rowC3['support_count']." kali";?><br><?php echo "Persentase terjual bersama : ".substr($rowC3['persen_support'],0,5)."%";?>
		<?php }
		?></td></tr></table><br>
<table border="1" align="left" cellpadding="0" cellspacing="2" style="border:thin; border-color:#399; padding-left:3px; margin-top:5px; width: 100%; text-align: center; font-size:36px;">
<tr style="background-color:yellow;text-align:center;">
  <td colspan="3"><strong style="font-size:42px;">Pola Transaksi 3 itemset : 
    <?php
  $strRule=mysqli_query($conn,"SELECT * FROM rule WHERE id_toko='$idtoko' AND kdrule='R3' ");
		$dataRule=mysqli_fetch_array($strRule,MYSQLI_ASSOC); $nRule=$dataRule['minsupport']; 
		echo "$nRule %<br>Total : ";
  $result=mysqli_query($conn,"SELECT * FROM itemc3 WHERE id_toko ='$idtoko' AND persen_support >='$nRule'  ORDER BY kditem1,kditem2 ASC ");
		$data_jml=mysqli_num_rows($result); 
		echo $data_jml." Item";
  ?></strong></td>
  </tr>
  	<?php
		//kosong tmp transaksi
		
 		$resultC3=mysqli_query($conn,"SELECT * FROM itemc3 WHERE id_toko ='$idtoko' AND persen_support>='$nRule' ORDER BY kditem1,kditem2 ASC ");
		$support_count="0";
		while($rowC3 = mysqli_fetch_array($resultC3,MYSQLI_ASSOC))
		{
		?>
		<tr>
			<td><?php echo ++$no1;?></td><td><?php
            //echo $rowC3['kditem1'].",".$rowC3['kditem2'].",".$rowC3['kditem3'];
			$C3kditem1=$rowC3['kditem1']; $C3kditem2=$rowC3['kditem2']; $C3kditem3=$rowC3['kditem3'];
			//menampilkan data kditem1 c3
			//kodeitem
			$MerkItem1=mysqli_query($conn,"SELECT * FROM item WHERE id_toko ='$idtoko' AND kditem='$C3kditem1' ");
			$DataMerkItem1=mysqli_fetch_array($MerkItem1,MYSQLI_ASSOC); echo "Kode : [BR".$DataMerkItem1['kditem']."]".", ";
			//menampilkan data kditem2 c3
			$MerkItem2=mysqli_query($conn,"SELECT * FROM item WHERE id_toko='$idtoko' AND kditem='$C3kditem2'");
			$DataMerkItem2=mysqli_fetch_array($MerkItem2,MYSQLI_ASSOC); echo "[BR".$DataMerkItem2['kditem']."]".", ";
			//menampilkan data kditem3 c3
			$MerkItem3=mysqli_query($conn,"SELECT * FROM item WHERE id_toko ='$idtoko' AND kditem='$C3kditem3' ");
			$DataMerkItem3=mysqli_fetch_array($MerkItem3,MYSQLI_ASSOC); echo "[BR".$DataMerkItem3['kditem']."]"."<hr>";

			//merk
			$MerkItem1=mysqli_query($conn,"SELECT * FROM item WHERE id_toko ='$idtoko' AND kditem='$C3kditem1' ");
			$DataMerkItem1=mysqli_fetch_array($MerkItem1,MYSQLI_ASSOC); echo $DataMerkItem1['merk'].", ";
			//menampilkan data kditem2 c3
			$MerkItem2=mysqli_query($conn,"SELECT * FROM item WHERE id_toko='$idtoko' AND kditem='$C3kditem2'");
			$DataMerkItem2=mysqli_fetch_array($MerkItem2,MYSQLI_ASSOC); echo $DataMerkItem2['merk'].", ";
			//menampilkan data kditem3 c3
			$MerkItem3=mysqli_query($conn,"SELECT * FROM item WHERE id_toko ='$idtoko' AND kditem='$C3kditem3' ");
			$DataMerkItem3=mysqli_fetch_array($MerkItem3,MYSQLI_ASSOC); echo $DataMerkItem3['merk']."<br><br>";

			//gambar
			$MerkItem1=mysqli_query($conn,"SELECT * FROM item WHERE id_toko ='$idtoko' AND kditem='$C3kditem1' ");
			$DataMerkItem1=mysqli_fetch_array($MerkItem1,MYSQLI_ASSOC); echo "<img src=\"../../gambar/produk/".$DataMerkItem1['gambar_item']."\" width='200' height='125'>".", ";
			//menampilkan data kditem2 c3
			$MerkItem2=mysqli_query($conn,"SELECT * FROM item WHERE id_toko='$idtoko' AND kditem='$C3kditem2'");
			$DataMerkItem2=mysqli_fetch_array($MerkItem2,MYSQLI_ASSOC); echo "<img src=\"../../gambar/produk/".$DataMerkItem2['gambar_item']."\" width='200' height='125'>".", ";
			//menampilkan data kditem3 c3
			$MerkItem3=mysqli_query($conn,"SELECT * FROM item WHERE id_toko ='$idtoko' AND kditem='$C3kditem3' ");
			$DataMerkItem3=mysqli_fetch_array($MerkItem3,MYSQLI_ASSOC); echo "<img src=\"../../gambar/produk/".$DataMerkItem3['gambar_item']."\" width='200' height='125'>"."<br>";
			?><br><?php echo "Terjual bersama : ".$rowC3['support_count']." kali";?><br><?php echo "Persentase terjual bersama : ".substr($rowC3['persen_support'],0,5)."%";?>
		<?php }
		?></td></tr></table>
</div>
</div>
</body>
</html>