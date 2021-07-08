<!DOCTYPE html>
<html>
<head>
	<title>Visualisasi 2 Item</title>
	<link rel="stylesheet" href="../css/style_visualisasi.css">
    <link rel="stylesheet" href="../css/bootstrap2.min.css">
</head>
<body>
<?php
include "../header_session/login_inner.php";
?>
	<?php
		//kosong tmp transaksi
	$strRule=mysqli_query($conn,"SELECT * FROM rule WHERE id_toko='$idtoko' AND kdrule='R2'");
        $dataRule=mysqli_fetch_array($strRule,MYSQLI_ASSOC);
        $nRule=$dataRule['minsupport']; echo'
        <div class="container">
        <form method="post"><div class="form-group"><div class="form-group">
        <label for="sel1"><h3 style="color: green;">KODE HIJAU</h3> (Penjualan dibawah 25%)</label><br>
        <label for="sel1">Lihat Item berdasarkan Pengurutan :</label>';
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
       <table>
    <tr>
    <td><div class="form-group">
        <input type="submit" class="btn btn-info" value="Pilih"></form></div></td>
    <td><div class="form-group">
        <form action="pola_2item.php" method="post">
        <input type="submit" name="reset" class="btn btn-info" value="Batal"></form></div></td>
    </tr>
    </table>
    </div>
    </div>
</form>
</div>';
        if (isset($_POST['kolom'])) {
            $result=trim($_POST['kolom']);
            if ($_POST['kolom']=="persen_support") {
                $result=mysqli_query($conn,"SELECT * FROM itemc2 WHERE id_toko='$idtoko' AND persen_support >='$nRule'ORDER BY persen_support DESC LIMIT 5");
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
                header("location:seleksi_itemhijau_kondisi.php");
            }
        }

    else {
        
        $result=mysqli_query($conn,"SELECT * FROM itemc2 WHERE id_toko='$idtoko' AND persen_support >='$nRule'ORDER BY persen_support");
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
			
			if ($persensupport <= 25 ) {
				$MerkItem1=mysqli_query($conn,"SELECT * FROM item WHERE id_toko='$idtoko' AND kditem='$C2kditem1'");
			$DataMerkItem1=mysqli_fetch_array($MerkItem1,MYSQLI_ASSOC);?> <div id="circle_2kiri"><div class="circle_2itemkiri"><?php echo "[".$DataMerkItem1['kditem']."]"."<br><img src='../gambar/produk/".$DataMerkItem1['gambar_item']."'><br>".$DataMerkItem1['merk'].",";?></div><div class="circle_hijau"><H2>K</H2><?php echo "<h3>membeli $persensupport</h3>";?></div><?php 
				$MerkItem2=mysqli_query($conn,"SELECT * FROM item WHERE id_toko='$idtoko' AND kditem='$C2kditem2' ");
			$DataMerkItem2=mysqli_fetch_array($MerkItem2,MYSQLI_ASSOC);?> <div class="circle_2itemkanan"><?php echo "[".$DataMerkItem2['kditem']."]"."<br><img src='../gambar/produk/".$DataMerkItem2['gambar_item']."'><br>".$DataMerkItem2['merk'].",";
				?></div></div>
			<?php }
			
			$kditem=$C2kditem2;
			$query_T2=mysqli_query($conn,"SELECT * FROM transaksi WHERE id_toko='$idtoko' AND kditem='$kditem' ");
			$num_T2=mysqli_num_rows($query_T2);
			$support_count2=$rowC2['support_count'];
			$Confidence2=$support_count2/$num_T2*100; $persensupport2 = substr($Confidence2,0,5)."%";
			
			if ($persensupport2 <= 25 ) {
				$MerkItem2=mysqli_query($conn,"SELECT * FROM item WHERE id_toko='$idtoko' AND kditem='$C2kditem2' ");
				$DataMerkItem2=mysqli_fetch_array($MerkItem2,MYSQLI_ASSOC);?> <div id="circle_2kiri"><div class="circle_2itemkiri"><?php echo "[".$DataMerkItem2['kditem']."]"."<br><img src='../gambar/produk/".$DataMerkItem2['gambar_item']."'><br>".$DataMerkItem2['merk'].",";
				?><br><br><br><hr></div>
				<div class="circle_hijau2"><H2>K</H2><?php echo "<h3>membeli $persensupport2</h3>";?></div>
				<?php 
				$MerkItem1=mysqli_query($conn,"SELECT * FROM item WHERE id_toko='$idtoko' AND kditem='$C2kditem1' ");
					$DataMerkItem1=mysqli_fetch_array($MerkItem1,MYSQLI_ASSOC);?><div class="circle_2itemkanan_r"> <?php echo "[".$DataMerkItem1['kditem']."]"."<br><img src='../gambar/produk/".$DataMerkItem1['gambar_item']."'><br>".$DataMerkItem1['merk'].",";?> </div></div>
				<?php
			}			
	}?>
	</body>
</html>