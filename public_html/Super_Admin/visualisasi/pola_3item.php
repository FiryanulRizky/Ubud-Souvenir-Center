<!DOCTYPE html>
<html>
<head>
	<title>Visualisasi 3 Item</title>
	<link rel="stylesheet" href="../../css/style_visualisasi.css">
	<link rel="stylesheet" href="../../css/bootstrap2.min.css">
</head>
<body>

<?php
include "../../db/koneksi.php";?>

<hr><div class="container"><form action="<?php $_SERVER["PHP_SELF"];?>" method="post"><div class="form-group"><div class="form-group"><label for="sel1">Lihat Pola berdasarkan Pengurutan/Sorting :</label> <?php
				$teratas="";
				$terbawah="";
				$terbaik="";
				if (isset($_POST['kolom'])) {
		            if ($_POST['kolom']=="persen_support")
		            {
		                $teratas="selected";
		            }else if($_POST['kolom']=="support_count") {
		                $terbawah="selected";
		            }else if($_POST['kolom']=="terbaik") {
		            	$terbaik="selected";
		            }
		        }
			?>
			<select class="form-control" name="kolom" required>
                <option value="" >Pilih Sorting :</option>
                <option value="persen_support">Persentase Support/Penjualan Tertinggi</option>
                <option value="support_count">Persentase Support/Penjualan Terendah</option>
                <option value="terbaik">Seleksi Terbaik (Persentase Support Tertinggi & Transaksi Terbanyak)</option>
         </select>
		</div>
		<div class="form-group">
        <input type="submit" class="btn btn-info" value="Pilih">
    </div>
	</div>
</form>
</div> 
<?php
		if (isset($_POST['kolom'])) {
			$result=trim($_POST['kolom']);
			if ($_POST['kolom']=="persen_support") {
				$list_pola=mysqli_query($conn,"SELECT * FROM infotoko,itemc3 WHERE infotoko.id_toko=itemc3.id_toko GROUP BY infotoko.id_toko ORDER BY COUNT(itemc3.id_itemc3) DESC");
				echo "Data Diurutkan berdasarkan <h3><i>Persentase Support/Penjualan Tertinggi</i></h3>";
				?>
            	<form method="post" action=""><button type="submit" name="reset">Hapus Filter</button></form><br><?php		
			}
			else if ($_POST['kolom']=="support_count") {
				$list_pola=mysqli_query($conn,"SELECT * FROM infotoko,itemc3 WHERE infotoko.id_toko=itemc3.id_toko GROUP BY infotoko.id_toko ORDER BY COUNT(itemc3.id_itemc3) ASC");
				echo "Data Diurutkan berdasarkan <h3><i>Persentase Support/Penjualan Terendah</i></h3>";
				?>
            	<form method="post" action=""><button type="submit" name="reset">Hapus Filter</button></form><br><?php
			} else if ($_POST['kolom']=="terbaik") {
				$list_pola=mysqli_query($conn,"SELECT * FROM infotoko,itemc3,transaksi WHERE infotoko.id_toko=itemc3.id_toko AND infotoko.id_toko=transaksi.id_toko GROUP BY infotoko.id_toko ORDER BY COUNT(itemc3.id_itemc3 AND transaksi.id_transaksi) DESC");
				echo "Data Diurutkan berdasarkan <h3><i>Seleksi Terbaik (Persentase Support Tertinggi & Transaksi Terbanyak)</i></h3>";
				?>
            	<form method="post" action=""><button type="submit" name="reset">Hapus Filter</button></form><br><?php
			}
		}

	else {
$list_pola=mysqli_query($conn,"SELECT * FROM infotoko"); }
while ($ambil_pola=mysqli_fetch_array($list_pola)) {
$idtoko=$ambil_pola['id_toko'];
$nama_toko=$ambil_pola['nama_toko'];
echo'<table style="border:1px solid;width:100%;">';
	$cek=mysqli_query($conn,"SELECT * FROM itemc3 WHERE id_toko = '$idtoko' AND lift_ratio>=1");
	if(mysqli_num_rows($cek)>0) {
	echo'<tr><td>';
	echo'<center><a href="tabel_pola_3.php"><H2 style="color:black;">Pola Penjualan : '.$nama_toko.' (KDTK'.$idtoko.')</H2></a><br></center>';
	//kosong tmp transaksi
	$strRule=mysqli_query($conn,"SELECT * FROM rule WHERE id_toko='$idtoko' AND kdrule='R3'");
		$dataRule=mysqli_fetch_array($strRule,MYSQLI_ASSOC); 
		$nRule=$dataRule['minsupport'];
        
        $result=mysqli_query($conn,"SELECT * FROM itemc3 WHERE id_toko='$idtoko' AND persen_support >='$nRule' AND lift_ratio>=1");
		
		while($rowC2 = mysqli_fetch_array($result,MYSQLI_ASSOC))
		{
		?>
		<?php
            $C2kditem1=$rowC2['kditem1']; $C2kditem2=$rowC2['kditem2']; $C2kditem3=$rowC2['kditem3'];
			//menampilkan data kditem1 c2
			$MerkItem1=mysqli_query($conn,"SELECT * FROM item WHERE id_toko='$idtoko' AND kditem='$C2kditem1' ");
			?><div id="circle_3kiri"><div class="circle_3itemkiri"><?php
			$DataMerkItem1=mysqli_fetch_array($MerkItem1,MYSQLI_ASSOC); echo "[".$DataMerkItem1['kditem']."]"."<br><img src='../../gambar/produk/".$DataMerkItem1['gambar_item']."'><br>".$DataMerkItem1['merk'].",";
			?> </div><?php
			//menampilkan data kditem2 c2 
			$MerkItem2=mysqli_query($conn,"SELECT * FROM item WHERE id_toko='$idtoko' AND kditem='$C2kditem2' ");?> <div class="circle_3itemtengah"><?php
			$DataMerkItem2=mysqli_fetch_array($MerkItem2,MYSQLI_ASSOC); echo "[".$DataMerkItem2['kditem']."]"."<br><img src='../../gambar/produk/".$DataMerkItem2['gambar_item']."'><br>".$DataMerkItem2['merk'].",";?> </div><div class="circle_3dotkiri"><b><?php echo"2 item terbeli, maka juga";?></b></div><?php
			//menampilkan data kditem2 c2
			$kditem=$C2kditem1;
			$query_T=mysqli_query($conn,"SELECT * FROM transaksi WHERE id_toko='$idtoko' AND kditem='$kditem' ");
			$num_T=mysqli_num_rows($query_T); 
			$support_count=$rowC2['support_count'];
			$Confidence=$support_count/$num_T*100; $persensupport = substr($Confidence,0,5)."%";
			if ($persensupport <= 25) {
				?> <div class="circle_hijau3"><br><H2>H</H2><?php echo "<h3>membeli $persensupport</h3>"?></div>
			<?php } ?>
			<?php
			if ($persensupport > 25 && $persensupport <=50 ) { ?>
				<div class="circle_kuning3"><br><H2>K</H2><?php echo "<h3>membeli $persensupport</h3>"?></div>
			<?php } ?>
			<?php if ($persensupport > 50 && $persensupport <=75 ) { ?>
				<div class="circle_oranye3"><H2>O</H2><?php echo "<h3>membeli $persensupport</h3>"?></div>
			<?php } ?>
			<?php if ($persensupport > 75 ) { ?>
				<div class="circle_merah3"><H2>M</H2><?php echo "<h3>$persensupport</h3>"?></div>
			<?php }
			$MerkItem3=mysqli_query($conn,"SELECT * FROM item WHERE id_toko='$idtoko' AND kditem='$C2kditem3' ");?> <div class="circle_3itemkanan"><?php
			$DataMerkItem3=mysqli_fetch_array($MerkItem3,MYSQLI_ASSOC); echo "[".$DataMerkItem3['kditem']."]"."<br><img src='../../gambar/produk/".$DataMerkItem3['gambar_item']."'><br>".$DataMerkItem3['merk'].",";?></div></div><?php
			$MerkItem3=mysqli_query($conn,"SELECT * FROM item WHERE id_toko='$idtoko' AND kditem='$C2kditem3' ");
			$DataMerkItem3=mysqli_fetch_array($MerkItem3,MYSQLI_ASSOC);?> <div id="circle_3kiri_r"><div class="circle_3itemkiri_r"><?php echo "[".$DataMerkItem3['kditem']."]"."<br><img src='../../gambar/produk/".$DataMerkItem3['gambar_item']."' ><br>".$DataMerkItem3['merk'].",";?> </div><?php
			$MerkItem2=mysqli_query($conn,"SELECT * FROM item WHERE id_toko='$idtoko' AND kditem='$C2kditem2' ");
			$DataMerkItem2=mysqli_fetch_array($MerkItem2,MYSQLI_ASSOC);?> <div class="circle_3itemtengah_r"><?php echo "[".$DataMerkItem2['kditem']."]"."<br><img src='../../gambar/produk/".$DataMerkItem2['gambar_item']."' width='95' height='80'><br>".$DataMerkItem2['merk'].",";?></div> <?php

			$MerkItem1=mysqli_query($conn,"SELECT * FROM item WHERE id_toko='$idtoko' AND kditem='$C2kditem1' ");
			$kditem=$C2kditem3;
			$query_T2=mysqli_query($conn,"SELECT * FROM transaksi WHERE id_toko='$idtoko' AND kditem='$kditem' ");
			$num_T2=mysqli_num_rows($query_T2);
			$support_count2=$rowC2['support_count'];
			$Confidence2=$support_count2/$num_T2*100; $persensupport2 = substr($Confidence2,0,5)."%";
			if ($persensupport2 <= 25) {
				?> <div class="circle_hijau4"><br><H2>H</H2><?php echo "<h3>membeli $persensupport2</h3>"?></div>
			<?php } ?>
			<?php
			if ($persensupport2 > 25 && $persensupport2 <=50 ) { ?>
				<div class="circle_kuning4"><br><H2>K</H2><?php echo "<h3>membeli $persensupport2</h3>"?></div>
			<?php } ?>
			<?php if ($persensupport2 > 50 && $persensupport2 <=75 ) { ?>
				<div class="circle_oranye4"><H2>O</H2><?php echo "<h3>membeli $persensupport2</h3>"?></div>
			<?php } ?>
			<?php if ($persensupport2 > 75 ) { ?>
				<div class="circle_merah4"><H2>M</H2><?php echo "<h3>$persensupport2</h3>"?></div>
			<?php }
			$DataMerkItem1=mysqli_fetch_array($MerkItem1,MYSQLI_ASSOC);?> <div class="circle_3itemkanan_r"><?php echo "[".$DataMerkItem1['kditem']."]"."<br><img src='../../gambar/produk/".$DataMerkItem1['gambar_item']."'><br>".$DataMerkItem1['merk'].",";
			?></div><div class="circle_3dotkanan"><b>Sebaliknya</b></div></div><?php } echo"</td></tr>"; } echo"</table>"; }?>
</body>
</html>