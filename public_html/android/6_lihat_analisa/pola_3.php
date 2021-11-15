<!DOCTYPE html>
<html>
<head>
	<title>Visualisasi 3 Item</title>
	<link rel="stylesheet" href="./css/style.css">
	<link rel="stylesheet" href="./css/bootstrap.min.css">
</head>
<body style="background:#DFE6F0;">

<?php
ob_start();
include "../1_login_reg/login_reg.php";
ob_end_clean();
?>
	<?php
	$cek=mysqli_query($conn,"SELECT * FROM itemc3 WHERE id_toko = '$idtoko' AND lift_ratio>=1");
	if(mysqli_num_rows($cek)>0) {
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
			?><hr><div id="circle_3kiri"><div class="circle_3itemkiri"><?php
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
				?><div class="circle_hijau2"><br><H2>H</H2><?php echo "<h3>membeli $persensupport</h3>"?></div>
			<?php } ?>
			<?php
			if ($persensupport > 25 && $persensupport <=50 ) { ?>
				<div class="circle_kuning2"><br><H2>K</H2><?php echo "<h3>membeli $persensupport</h3>"?></div>
			<?php } ?>
			<?php if ($persensupport > 50 && $persensupport <=75 ) { ?>
				<div class="circle_oranye2"><H2>O</H2><?php echo "<h3>membeli $persensupport</h3>"?></div>
			<?php } ?>
			<?php if ($persensupport > 75 ) { ?>
				<div class="circle_merah2"><H2>M</H2><?php echo "<h3>$persensupport</h3>"?></div>
			<?php }
			$MerkItem3=mysqli_query($conn,"SELECT * FROM item WHERE id_toko='$idtoko' AND kditem='$C2kditem3' ");?> <div class="circle_3itemkanan"><?php
			$DataMerkItem3=mysqli_fetch_array($MerkItem3,MYSQLI_ASSOC); echo "<b style='visibility:hidden;'>[".$DataMerkItem3['kditem']."]"."<br><img src='../../gambar/produk/".$DataMerkItem3['gambar_item']."'><br>".$DataMerkItem3['merk'].",</b>";?></div></div><?php
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
				?><div class="circle_hijau4"><br><H2>H</H2><?php echo "<h3>membeli $persensupport2</h3>"?></div>
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
			?></div><div class="circle_3dotkanan"><b>Sebaliknya</b></div></div><br><?php } } else {
				echo "<br><center><H2>TIDAK DITEMUKAN ATURAN YANG VALID/DATA KOSONG</H2></center>";
			} ?>
</body>
</html>