<!DOCTYPE html>
<html>
<head>
	<title>Visualisasi 2 Item</title>
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="./css/bootstrap.min.css">
</head>
<body style="background:#DFE6F0;">
<?php
ob_start();
include "../1_login_reg/login_reg.php";
ob_end_clean();
?>
	<?php
		//kosong tmp transaksi
	$strRule=mysqli_query($conn,"SELECT * FROM rule WHERE id_toko='$idtoko' AND kdrule='R2'");
		$dataRule=mysqli_fetch_array($strRule,MYSQLI_ASSOC);
		$nRule=$dataRule['minsupport'];?>
<div class="container">
<form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post">
	<div class="form-group">
      	<div class="form-group">
      	<label for="sel1"><h3 style="color: green;">KODE HIJAU</h3> (Penjualan 25% kebawah)</label><br>
        <label for="sel1">Filter jika diperlukan :</label><?php
        $kditem1="";
        $kditem2="";
        $support="";
        if (isset($_POST['kolom'])) {

            if ($_POST['kolom']=="kditem1")
            {
                $kditem1="selected";
            }else if ($_POST['kolom']=="kditem2"){
                $kditem2="selected";
            }else {
                $support="selected";
            }
        }
        ?>
            <select class="form-control" name="kolom" required>
                <option value="" >Pilih Filter</option>
                <option value="kditem1" <?php echo $kditem1; ?> >Id Item kiri</option>
                <option value="kditem2" <?php echo $kditem2; ?> >Id Item Kanan</option>
                <option value="support" <?php echo $support; ?> >Support%</option>
         </select>
     </div>
      	<label for="sel1">Kata Kunci:</label>
        <?php
        $kata_kunci="";
        if (isset($_POST['kata_kunci'])) {
            $kata_kunci=$_POST['kata_kunci'];
        }
        ?>
        <input type="text" name="kata_kunci" value="<?php echo $kata_kunci;?>" class="form-control"  required/>
    </div>
    <table>
   	<tr>
   	<td><div class="form-group">
        <input type="submit" class="btn btn-info" value="Pilih"></form></div></td>
    <td><div class="form-group">
        <form action="seleksi_itemhijau.php" method="post">
        <input type="submit" name="reset" class="btn btn-info" value="Kembali"></form></div></td>
    </tr>
    </table>
</div>
<?php
if (isset($_POST['kata_kunci'])) {
            $kata_kunci=trim($_POST['kata_kunci']);

            $kolom="";
            if ($_POST['kolom']=="kditem1")
            {
                $kolom="kditem1";
            }else if ($_POST['kolom']=="kditem2"){
                $kolom="kditem2";
            }else {
                $kolom="persen_support";
            }
            $result=mysqli_query($conn,"SELECT * FROM itemc2 WHERE id_toko='$idtoko' AND $kolom like '%".$kata_kunci."%' AND persen_support >='$nRule'");if (mysqli_num_rows($result)>0) {
            	echo "Data Tabel 2 ini telah disortir berdasarkan $kolom dengan kata kunci $kata_kunci";?>
            	<form method="POST" action="seleksi_itemhijau.php"><button type="submit" name="reset">Hapus Filter</button></form><?php
            } else {
            	echo "Data $kolom dengan kata kunci $kata_kunci kosong";?>
            <form method="POST" action="seleksi_itemhijau.php"><button type="submit" name="reset" >Hapus Filter</button></form>
            <?php
            }
        }else {
	      $result=mysqli_query($conn,"SELECT * FROM itemc2 WHERE id_toko='$idtoko' AND persen_support >='$nRule'ORDER BY persen_support DESC");
		}
		while($rowC2 = mysqli_fetch_array($result,MYSQLI_ASSOC))
		{
            $C2kditem1=$rowC2['kditem1']; $C2kditem2=$rowC2['kditem2'];
			//menampilkan data kditem2 c2
			$kditem=$C2kditem1;
			$query_T=mysqli_query($conn,"SELECT * FROM transaksi WHERE id_toko='$idtoko' AND kditem='$kditem' ");
			$num_T=mysqli_num_rows($query_T);
			$support_count=$rowC2['support_count'];
			$Confidence=$support_count/$num_T*100; $persensupport = substr($Confidence,0,5)."%";
			
			if ($persensupport <= 25) { ?>
				<?php	$MerkItem1=mysqli_query($conn,"SELECT * FROM item WHERE id_toko='$idtoko' AND kditem='$C2kditem1'");
			$DataMerkItem1=mysqli_fetch_array($MerkItem1,MYSQLI_ASSOC);?> <div id="circle_2kiri"><div class="circle_2itemkiri"><?php echo"<br>";echo "[".$DataMerkItem1['kditem']."]"."<br><img src='../../gambar/produk/".$DataMerkItem1['gambar_item']."'><br>".$DataMerkItem1['merk'].",";?></div><div class="circle_hijau"><H2>K</H2><?php echo "<h3>membeli $persensupport</h3>";?></div><?php 
				$MerkItem2=mysqli_query($conn,"SELECT * FROM item WHERE id_toko='$idtoko' AND kditem='$C2kditem2' ");
			$DataMerkItem2=mysqli_fetch_array($MerkItem2,MYSQLI_ASSOC);?> <div class="circle_2itemkanan"><?php echo "[".$DataMerkItem2['kditem']."]"."<br><img src='../../gambar/produk/".$DataMerkItem2['gambar_item']."'><br>".$DataMerkItem2['merk'].",";echo"<br><br><br><hr>";
				?></div></div>
			<?php }
			
			$kditem=$C2kditem2;
			$query_T2=mysqli_query($conn,"SELECT * FROM transaksi WHERE id_toko='$idtoko' AND kditem='$kditem' ");
			$num_T2=mysqli_num_rows($query_T2);
			$support_count2=$rowC2['support_count'];
			$Confidence2=$support_count2/$num_T2*100; $persensupport2 = substr($Confidence2,0,5)."%";
			
			if ($persensupport2 <= 25 ) { ?><?php
				$MerkItem2=mysqli_query($conn,"SELECT * FROM item WHERE id_toko='$idtoko' AND kditem='$C2kditem2' ");
				$DataMerkItem2=mysqli_fetch_array($MerkItem2,MYSQLI_ASSOC); echo"<br>";?> <div id="circle_2kiri_r"></div><div class="circle_2itemkiri_r"><?php echo "[".$DataMerkItem2['kditem']."]"."<br><img src='../../gambar/produk/".$DataMerkItem2['gambar_item']."'><br>".$DataMerkItem2['merk'].",";
				?><br><br><br><hr></div>
				<div class="circle_hijau2"><H2>K</H2><?php echo "<h3>membeli $persensupport2</h3>";?></div>
				<?php 
				$MerkItem1=mysqli_query($conn,"SELECT * FROM item WHERE id_toko='$idtoko' AND kditem='$C2kditem1' ");
					$DataMerkItem1=mysqli_fetch_array($MerkItem1,MYSQLI_ASSOC); ?> <div class="circle_2itemkanan_r"><?php echo "[".$DataMerkItem1['kditem']."]"."<br><img src='../../gambar/produk/".$DataMerkItem1['gambar_item']."'><br>".$DataMerkItem1['merk'].",";echo"<br><br><br><hr>";
				?></div></div>
				?>
				<?php
			}
			
	}?>
	</body>
</html>