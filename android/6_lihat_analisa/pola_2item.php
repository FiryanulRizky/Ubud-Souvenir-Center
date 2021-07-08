<!DOCTYPE html>
<html>
<head>
	<title>Visualisasi 2 Item</title>
	<link rel="stylesheet" href="./css/style.css">
	<link rel="stylesheet" href="./css/bootstrap.min.css">
</head>
<body style="background:#DFE6F0";>
<?php
ob_start();
include "../1_login_reg/login_reg.php";
ob_end_clean();
?>
	<?php
		//kosong tmp transaksi

	$cek=mysqli_query($conn,"SELECT * FROM itemc2 WHERE id_toko = '$idtoko' AND lift_ratio>=1");
	if(mysqli_num_rows($cek)>0) {
	$strRule=mysqli_query($conn,"SELECT * FROM rule WHERE id_toko='$idtoko' AND kdrule='R2'");
		$dataRule=mysqli_fetch_array($strRule,MYSQLI_ASSOC);
		$nRule=$dataRule['minsupport']; echo'
		<div class="container">
		<form method="post"><div class="form-group"><div class="form-group"><label for="sel1">Lihat Item berdasarkan Pengurutan :</label>';
				$teratas="";
				$terbawah="";
				$pindah="";
				if (isset($_POST['kolom'])) {
		            if ($_POST['kolom']=="persen_support")
		            {
		                $teratas="selected";
		            }else if($_POST['kolom']=="support_count") {
		                $terbawah="selected";
		            }else {
		            	$pindah="selected";
		            }
		        }
			echo'
			<select class="form-control" name="kolom" required>
                <option value="" >Pilih Sorting :</option>
                <option value="persen_support">Top 5 Penjualan Teratas</option>
                <option value="support_count">Top 5 Penjualan Terendah</option>
                <option value="">Seleksi dengan kondisi</option>
         </select>
		</div>
		<div class="form-group">
		<table><tr><td>
        <input type="submit" class="btn btn-info" value="Pilih"></form></td><td>
        <form method="post" action="index.php">
        <input type="submit" class="btn btn-info" value="Kembali"></form></td></tr></table>
    </div>
	</div>
</div>';
		if (isset($_POST['kolom'])) {
			$result=trim($_POST['kolom']);
			if ($_POST['kolom']=="persen_support") {
				$result=mysqli_query($conn,"SELECT * FROM itemc2 WHERE id_toko='$idtoko' AND persen_support >='$nRule' ORDER BY persen_support DESC LIMIT 5");
				echo "Data Diurutkan berdasarkan <h3><i>Top 5 penjualan tertinggi</i></h3>";
				?>
            	<form method="post" action=""><button type="submit" name="reset">Hapus Filter</button></form><?php		
			}
			else if ($_POST['kolom']=="support_count") {
				$result=mysqli_query($conn,"SELECT * FROM itemc2 WHERE id_toko='$idtoko' AND persen_support >='$nRule' ORDER BY persen_support ASC LIMIT 5");
				echo "Data Diurutkan berdasarkan <h3><i>Top 5 penjualan terendah</i></h3>";
				?>
            	<form method="post" action=""><button type="submit" name="reset">Hapus Filter</button></form><?php
			} else{
				header("location:seleksi_2item.php");
			}
		}

	else {
        
        $result=mysqli_query($conn,"SELECT * FROM itemc2 WHERE id_toko='$idtoko' AND persen_support >='$nRule' AND lift_ratio>=1");
    	}
    	
		while($rowC2 = mysqli_fetch_array($result,MYSQLI_ASSOC))
		{
		?>
		<?php
            $C2kditem1=$rowC2['kditem1']; $C2kditem2=$rowC2['kditem2'];
			//menampilkan data kditem1 c2
			$MerkItem1=mysqli_query($conn,"SELECT * FROM item WHERE id_toko='$idtoko' AND kditem='$C2kditem1'");
			?><div id="circle_2kiri"><div class="circle_2itemkiri">
			<?php
			$DataMerkItem1=mysqli_fetch_array($MerkItem1,MYSQLI_ASSOC); echo "[".$DataMerkItem1['kditem']."]"."<br><img src='../../gambar/produk/".$DataMerkItem1['gambar_item']."'><br>".$DataMerkItem1['merk'].",";?> </div><?php
			//menampilkan data kditem2 c2
			$kditem=$C2kditem1;
			$query_T=mysqli_query($conn,"SELECT * FROM transaksi WHERE id_toko='$idtoko' AND kditem='$kditem' ");
			$num_T=mysqli_num_rows($query_T);
			$support_count=$rowC2['support_count'];
			$Confidence=$support_count/$num_T*100; $persensupport = substr($Confidence,0,5)."%";
			if ($persensupport <= 25) {
				?> <a href="seleksi_itemhijau.php"><div class="circle_hijau"><br><H2>H</H2><?php echo "<h3>membeli $persensupport</h3>"?></div></a>
			<?php } ?>
			<?php if ($persensupport > 25 && $persensupport <=50 ) { ?>
				<a href="seleksi_itemkuning.php"><div class="circle_kuning"><br><H2>K</H2><?php echo "<h3>membeli $persensupport</h3>"?></div></a>
			<?php } ?>
			<?php if ($persensupport > 50 && $persensupport <=75 ) { ?>
				<a href="seleksi_itemoranye.php"><div class="circle_oranye"><H2>O</H2><?php echo "<h3>membeli $persensupport</h3>"?></div></a>
			<?php } ?>
			<?php if ($persensupport > 75 ) { ?>
				<a href="seleksi_itemmerah.php"><div class="circle_merah"><H2>M</H2><?php echo "<h3>membeli $persensupport</h3>"?></div></a>
			<?php } ?> <?php
			$MerkItem2=mysqli_query($conn,"SELECT * FROM item WHERE kditem='$C2kditem2' AND id_toko='$idtoko'");
			$DataMerkItem2=mysqli_fetch_array($MerkItem2,MYSQLI_ASSOC); ?><div class="circle_2itemkanan"><?php echo "[".$DataMerkItem2['kditem']."]"."<br><img src='../../gambar/produk/".$DataMerkItem2['gambar_item']."'><br>".$DataMerkItem2['merk'].",";?></div></div> <?php
			//sebaliknya
			$MerkItem2=mysqli_query($conn,"SELECT * FROM item WHERE id_toko='$idtoko' AND kditem='$C2kditem2' ");
			$DataMerkItem2=mysqli_fetch_array($MerkItem2,MYSQLI_ASSOC);?><div id="circle_2kiri_r"><div class="circle_2itemkiri_r"> <?php echo "[".$DataMerkItem2['kditem']."]"."<br><img src='../../gambar/produk/".$DataMerkItem2['gambar_item']."'><br>".$DataMerkItem2['merk'].",";?><br><br><br><hr></div><?php
			
			$MerkItem1=mysqli_query($conn,"SELECT * FROM item WHERE id_toko='$idtoko' AND kditem='$C2kditem1' ");
			$kditem=$C2kditem2;
			$query_T2=mysqli_query($conn,"SELECT * FROM transaksi WHERE kditem='$kditem' ");
			$num_T2=mysqli_num_rows($query_T2);
			$support_count2=$rowC2['support_count'];
			$Confidence2=$support_count2/$num_T2*100; $persensupport2 = substr($Confidence2,0,5)."%";
			if ($persensupport2 <= 25) {
				?> <a href="seleksi_itemhijau.php"><div class="circle_hijau"><br><H2>H</H2><?php echo "<h3>membeli $persensupport2</h3>"?></div></a>
			<?php } ?>
			<?php if ($persensupport2 > 25 && $persensupport2 <=50 ) { ?>
				<a href="seleksi_itemkuning.php"><div class="circle_kuning2"><br><H2>K</H2><?php echo "<h3>membeli $persensupport2</h3>"?></div></a>
			<?php } ?>
			<?php if ($persensupport2 > 50 && $persensupport2 <=75 ) { ?>
				<a href="seleksi_itemoranye.php"><div class="circle_oranye2"><H2>O</H2><?php echo "<h3>membeli $persensupport2</h3>"?></div></a>
			<?php } ?>
			<?php if ($persensupport2 > 75 ) { ?>
				<a href="seleksi_itemmerah.php"><div class="circle_merah2"><H2>M</H2><?php echo "<h3>membeli $persensupport2</h3>"?></div></a>
			<?php } ?> <?php

			$DataMerkItem1=mysqli_fetch_array($MerkItem1,MYSQLI_ASSOC);?><div class="circle_2itemkanan_r"> <?php echo "[".$DataMerkItem1['kditem']."]"."<br><img src='../../gambar/produk/".$DataMerkItem1['gambar_item']."'><br>".$DataMerkItem1['merk'].",";?> </div></div><?php
			?>
	<?php } 
	} else {
		echo "<br><center><H2>TIDAK DITEMUKAN ATURAN YANG VALID/DATA KOSONG</H2></center>";
	}?>
	</body>
</html>