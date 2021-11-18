<link rel="stylesheet" type="text/css" href="../css/style_admin.css">
<?php
ob_start();
include"../1_login_reg/login_reg.php";
ob_end_clean();
?>
<div id="bgkonten">
<div class="konten_tabel">
<?php 
$cek = mysqli_query($conn,"SELECT * FROM transaksi WHERE id_toko='$idtoko'");
	if(mysqli_num_rows($cek)>0) {
?>
<?php 
if (!empty($_GET['date1']&&$_GET['date2'])) {
echo'<center><table><tr><td><form method="post"><input type="submit" name="transaksi_tgl" value="Kembali" style="padding:3px 6px 3px 6px; border:1px solid #06F;"></form></td><td><a style="padding:3px 8px 3px 8px; border:1px solid #06F; font-size:18px; background-color:lightgrey;"  href=\'3_kandidat_item_2.php?date1='.$_GET['date1'].'&date2='.$_GET['date2'].'\'>Lanjut Proses</a></td></tr></table></center>'; 
    if(isset($_POST['transaksi_tgl'])) {
    $del_statistik=mysqli_query($conn,"DELETE FROM statistik WHERE id_toko='$idtoko'");
    echo'<script>window.location="1_ambil_transaksi.php?date1='.$_GET['date1'].'&date2='.$_GET['date2'].'";</script>';
}
} else { 
echo'<center><table><tr><td><form method="post"><input type="submit" name="transaksi_semua" value="Kembali" style="padding:3px 6px 3px 6px; border:1px solid #06F;"></form></td><td><a style="padding:3px 8px 3px 8px; border:1px solid #06F; font-size:18px; background-color:lightgrey;"  href=\'3_kandidat_item_2.php\'>Lanjut Proses</a></td></tr></table></center>';
if(isset($_POST['transaksi_semua'])) {
    $del_statistik=mysqli_query($conn,"DELETE FROM statistik WHERE id_toko='$idtoko'");
    echo'<script>window.location="1_ambil_transaksi.php";</script>';
}
}?>
<br><center><h2 class="art-postheader">Data Berhasil Diambil</h2><br>
<?php if(!empty($_GET['date1']&&$_GET['date2'])){ echo"Data di seleksi dari ".date('d-M-Y', strtotime($_GET['date1']))." sampai ".date('d-M-Y', strtotime($_GET['date2']));} else {echo "Sistem akan Memproses semua data transaksi";} ?></center><br>
<div class="view_data">
<table border="1" align="left" cellpadding="0" cellspacing="2" style="text-align: center; width: 100%">
<tr>
  <td colspan="2" style="background-color:lightgrey; text-align: center; font-size: 18px; font-weight: bold;">Pola Transaksi Penjualan
  	<br>
  	<?php
  if(!empty($_GET['date1']&&$_GET['date2'])) {
  	$date1=$_GET['date1'];$date2=$_GET['date2'];
  	$QuerySumTransaksi=mysqli_query($conn,"SELECT * FROM transaksi WHERE id_toko ='$idtoko' AND tgltransaksi BETWEEN '$date1' AND '$date2' GROUP BY kdtransaksi ORDER BY kdtransaksi ASC");
  $SumTransaksi=mysqli_num_rows($QuerySumTransaksi);echo "Total : " .$SumTransaksi." transaksi";	
  } else {
  $QuerySumTransaksi=mysqli_query($conn,"SELECT * FROM transaksi WHERE id_toko ='$idtoko' GROUP BY kdtransaksi ORDER BY kdtransaksi ASC");
  $SumTransaksi=mysqli_num_rows($QuerySumTransaksi);echo "Total : " .$SumTransaksi." transaksi"; }?>
  </td>
  </tr>
	<?php
	if(!empty($_GET['date1']&&$_GET['date2'])) {
  			$date1=$_GET['date1'];$date2=$_GET['date2']; 
  			$result = mysqli_query($conn,"SELECT * FROM transaksi WHERE id_toko ='$idtoko' AND tgltransaksi BETWEEN '$date1' AND '$date2' GROUP BY kdtransaksi ORDER BY kdtransaksi ASC"); } else {
		 $result = mysqli_query($conn,"SELECT * FROM transaksi WHERE id_toko ='$idtoko' GROUP BY kdtransaksi ORDER BY kdtransaksi ASC");}
		while($row = mysqli_fetch_array($result,MYSQLI_ASSOC))
		{
		?>
		<tr>
			<?php echo"<tr><td width='25'>".++$no."</td><td>Kode : KDTR(".$row['kdtransaksi'].")<hr>".date('d-F-Y', strtotime($row['tgltransaksi']))."<br><br>";
			if(!empty($_GET['date1']&&$_GET['date2'])) {
  			$date1=$_GET['date1'];$date2=$_GET['date2'];
			$kdtransaksi=$row['kdtransaksi'];
            $result2=mysqli_query($conn,"SELECT * FROM transaksi,item WHERE item.kditem=transaksi.kditem AND transaksi.id_toko=item.id_toko AND transaksi.id_toko='$idtoko' AND transaksi.kdtransaksi='$kdtransaksi' AND transaksi.tgltransaksi BETWEEN '$date1' AND '$date2' ORDER BY item.kditem"); } else {$kdtransaksi=$row['kdtransaksi']; $result2=mysqli_query($conn,"SELECT * FROM transaksi,item WHERE item.kditem=transaksi.kditem AND transaksi.id_toko=item.id_toko AND transaksi.id_toko='$idtoko' AND transaksi.kdtransaksi='$kdtransaksi' ORDER BY item.kditem"); } 
			while($rowItem = mysqli_fetch_array($result2,MYSQLI_ASSOC))
			{
				echo $rowItem['merk'] ." , ";
				}
			?></td>
		</tr>
		<?php }
		?>
</table>
 <table border="1" align="left" cellpadding="0" cellspacing="2" style="width:100%;">
<tr style="background-color:lightgrey;text-align:center;">
  <td colspan="5">Pembentukan Kandidat 1 Itemset
  	<?php
  $QuerySumItemC1=mysqli_query($conn,"SELECT * FROM itemc1 WHERE id_toko ='$idtoko' ORDER BY kditem ASC");
  $SumItemC1=mysqli_num_rows($QuerySumItemC1); echo '<br><a href=\'2_tangkap_seleksi.php?date1='.$_GET['date1'].'&date2='.$_GET['date2'].'\'>Total : '.$SumItemC1.' Item</a>'; ?>

  </td>
  </tr>
<tr style="background-color:lightgrey;text-align:center;">
			<td>KD Item</td>
			<td>Itemset</td>
			<td>Support %</td>
		</tr>
	<?php
	//kosongkan tabel itemc1
	$EmptiItemc1=mysqli_query($conn,"DELETE FROM itemc1 WHERE id_toko ='$idtoko' ORDER BY kditem ASC");
	//#end kosong
	if(!empty($_GET['date1']&&$_GET['date2'])) {
  			$date1=$_GET['date1'];$date2=$_GET['date2'];
  			$qryTotalItem1 = mysqli_query($conn,"SELECT * FROM transaksi WHERE id_toko ='$idtoko' AND tgltransaksi BETWEEN '$date1' AND '$date2' GROUP BY kdtransaksi ORDER BY kdtransaksi ASC");
 		 } else {
	  	$qryTotalItem1 = mysqli_query($conn,"SELECT * FROM transaksi WHERE id_toko ='$idtoko' GROUP BY kdtransaksi ORDER BY kdtransaksi ASC"); }
	  	$SumTotalItem1=mysqli_num_rows($qryTotalItem1);

		if (!empty($_GET['date1']&&$_GET['date2'])) {
			$date1=$_GET['date1'];$date2=$_GET['date2'];
 		$result=mysqli_query($conn,"SELECT * FROM transaksi,item WHERE transaksi.kditem=item.kditem AND transaksi.id_toko=item.id_toko AND transaksi.id_toko='$idtoko' AND transaksi.tgltransaksi BETWEEN '$date1' AND '$date2' GROUP BY transaksi.kditem ORDER BY item.id_item ASC"); } else {
 			$result=mysqli_query($conn,"SELECT * FROM transaksi,item WHERE transaksi.kditem=item.kditem AND transaksi.id_toko=item.id_toko AND transaksi.id_toko='$idtoko' GROUP BY transaksi.kditem ORDER BY item.id_item ASC");
 		}
		
		while($row = mysqli_fetch_array($result,MYSQLI_ASSOC))
		{
		?>
		<tr>
			<td style="text-align: center;"><?php echo $row['kditem'];?></td>
			<td><?php echo $row['merk'];?></td>
			<td style="text-align: center;"><?php

	if(!empty($_GET['date1']&&$_GET['date2'])) {
  			$date1=$_GET['date1'];$date2=$_GET['date2'];
	$kditem=$row['kditem'];
	$queryItem1=mysqli_query($conn,"SELECT * FROM transaksi WHERE kditem='$kditem' AND id_toko='$idtoko' AND tgltransaksi BETWEEN '$date1' AND '$date2'");} else {
		$kditem=$row['kditem'];
	$queryItem1=mysqli_query($conn,"SELECT * FROM transaksi WHERE kditem='$kditem' AND id_toko='$idtoko'");
	}
	$countItem1=mysqli_num_rows($queryItem1);
	//echo $countItem1 ."/" .$SumTotalItem1;
	$Persent=$countItem1/$SumTotalItem1*100; $PersentItem1=substr($Persent,0,5); echo $PersentItem1."%";
	$queryItemC1=mysqli_query($conn,"INSERT INTO itemc1 (id_toko,kditem,support_count,persen_support)VALUES('$idtoko','$kditem','$countItem1','$PersentItem1')");
	 ?></td>
		</tr>
 
		<?php } ?>
</table>
<table border="1" align="left" cellpadding="0" cellspacing="2" style="width: 100%">
<tr style="background-color:yellow;text-align:center;">
  <td colspan="5"><b>Pembentukan Kandidat 1 Itemset dengan Minimum Support :
  <?php
  $queryRule1=mysqli_query($conn,"SELECT * FROM rule WHERE id_toko ='$idtoko' AND kdrule='R1' ");
  $dataRule1=mysqli_fetch_array($queryRule1,MYSQLI_ASSOC);
  echo "<a href=\"../../edit-rule.php?kdrule=R1\">".$dataRule1['minsupport']."%</a>";
  $minSupportR1=$dataRule1['minsupport'];
 		$queryMinC1=mysqli_query($conn,"SELECT * FROM item,itemc1 WHERE itemc1.kditem=item.kditem AND itemc1.id_toko=item.id_toko AND itemc1.id_toko='$idtoko' AND itemc1.persen_support>='$minSupportR1' ORDER BY itemc1.kditem ASC");
  $SumItemC1=mysqli_num_rows($queryMinC1); echo "<br>"; echo "Total : " .$SumItemC1." Item</b>";
  ?>
   </td>
  </tr>
	<?php
	//#end kosong
		$minSupportR1=$dataRule1['minsupport'];
 		$queryMinItemc1=mysqli_query($conn,"SELECT * FROM item,itemc1 WHERE itemc1.kditem=item.kditem AND itemc1.id_toko=item.id_toko AND itemc1.id_toko='$idtoko' AND itemc1.persen_support>='$minSupportR1' ORDER BY item.id_item ASC");
		while($rowMinC1= mysqli_fetch_array($queryMinItemc1,MYSQLI_ASSOC))
		{
		?>
		<tr>
			<td style="text-align: center;"><?php echo ++$no1;?></td><td style="text-align: center;"><?php echo "Kode : BR".$rowMinC1['kditem'];?><hr>
			<?php echo $rowMinC1['merk']."<br>";?><br><?php echo "<img src=\"../../gambar/produk/".$rowMinC1['gambar_item']."\" width='85' height='60'>"."<br>";?><br><?php echo "Terjual : ".$rowMinC1['support_count']." Item";?><br>
			<?php echo "Persentase terjual : ".$rowMinC1['persen_support']."%";?></td>
		</tr>
 
		<?php } } else {
			echo"<center><H3>PERLU DATA TRANSAKSI UNTUK MEMPROSES</H3></center>";
		}
		?>
		</form>
</table>
</div>
</body>
</html>