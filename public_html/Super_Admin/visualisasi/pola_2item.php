<!DOCTYPE html>
<html>
<head>
	<title>Aturan Asosiasi</title>
	<link rel="stylesheet" href="../../css/style_visualisasi.css">
	<link rel="stylesheet" href="../../css/bootstrap2.min.css">
</head>
<body>
<?php include "../../db/koneksi.php";?>
<div id="bgkonten">
<?php
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));?>

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
				$pola=mysqli_query($conn,"SELECT * FROM infotoko,itemc2 WHERE infotoko.id_toko=itemc2.id_toko GROUP BY infotoko.id_toko ORDER BY COUNT(itemc2.id_itemc2) DESC");
				echo "Data Diurutkan berdasarkan <h3><i>Persentase Support/Penjualan Tertinggi</i></h3>";
				?>
            	<form method="post" action=""><button type="submit" name="reset">Hapus Filter</button></form><br><?php		
			}
			else if ($_POST['kolom']=="support_count") {
				$pola=mysqli_query($conn,"SELECT * FROM infotoko,itemc2 WHERE infotoko.id_toko=itemc2.id_toko GROUP BY infotoko.id_toko ORDER BY COUNT(itemc2.id_itemc2) ASC");
				echo "Data Diurutkan berdasarkan <h3><i>Persentase Support/Penjualan Terendah</i></h3>";
				?>
            	<form method="post" action=""><button type="submit" name="reset">Hapus Filter</button></form><br><?php
			} else if ($_POST['kolom']=="terbaik") {
				$pola=mysqli_query($conn,"SELECT * FROM infotoko,itemc2,transaksi WHERE infotoko.id_toko=itemc2.id_toko AND infotoko.id_toko=transaksi.id_toko GROUP BY infotoko.id_toko ORDER BY COUNT(itemc2.id_itemc2 AND transaksi.id_transaksi) DESC");
				echo "Data Diurutkan berdasarkan <h3><i>Seleksi Terbaik (Persentase Support Tertinggi & Transaksi Terbanyak)</i></h3>";
				?>
            	<form method="post" action=""><button type="submit" name="reset">Hapus Filter</button></form><br><?php
			}
		}

	else {

$pola=mysqli_query($conn,"SELECT * FROM infotoko"); }

while($ambil_pola=mysqli_fetch_array($pola)) {
    $idtoko=$ambil_pola['id_toko'];
    $nama_toko=$ambil_pola['nama_toko'];
    $no="";
    $no1="";
$transaksi=mysqli_query($conn,"SELECT * FROM transaksi WHERE id_toko='$idtoko' GROUP BY kdtransaksi");
  $strRule=mysqli_query($conn,"SELECT * FROM rule WHERE id_toko ='$idtoko' AND kdrule='R2'");
        $dataRule=mysqli_fetch_array($strRule,MYSQLI_ASSOC); 
        $nRule=$dataRule['minsupport'];
        $result=mysqli_query($conn,"SELECT * FROM itemc2 WHERE id_toko ='$idtoko' AND persen_support >='$nRule' AND lift_ratio>=1 ORDER BY persen_support DESC LIMIT 5"); 
        ?>
<?php if (mysqli_num_rows($result)>0) {
?>
<div class="view_data">
<table style="border-color:#399;width:100%;">
    <tr><td colspan="6"><?php echo "<hr><center><a href='pola_2item.php'><H2 style='color:black;'>Pola Penjualan ".$nama_toko." (KDTK".$idtoko.")</H2></a></center><hr>"; ?></td></tr>
<tr style="background-color: lightgrey;text-align: center;">
  <td colspan="6">Table 2 : Aturan Asosiasi Final dari 2 Itemset</td>
  </tr>
<tr style="background-color: lightgrey;text-align: center;">
            <td width="25">No.</td>
			<td width="459">Aturan Final yang didapat</td>
			<td colspan="2"><span class="style7">Confidence</span></td>
            <td width="150">Lift Ratio</td>
		</tr>
	<?php
    if (mysqli_num_rows($result)>0) {
		while($rowC2 = mysqli_fetch_array($result,MYSQLI_ASSOC))
		{ 
		?>
		<tr style="text-align: center;">
			<td><?php echo ++$no1; ?></td>
            <td><?php
            $C2kditem1=$rowC2['kditem1']; $C2kditem2=$rowC2['kditem2'];
			//menampilkan data kditem1 c2
			$MerkItem1=mysqli_query($conn,"SELECT * FROM item WHERE id_toko ='$idtoko' AND kditem='$C2kditem1' ");
			echo "Jika Membeli ";
			$DataMerkItem1=mysqli_fetch_array($MerkItem1,MYSQLI_ASSOC); echo "[".$DataMerkItem1['kditem']."]".$DataMerkItem1['merk']." , ";
			//menampilkan data kditem2 c2
			echo " Maka Juga Membeli ";
			$MerkItem2=mysqli_query($conn,"SELECT * FROM item WHERE id_toko ='$idtoko'AND kditem='$C2kditem2' ");
			$DataMerkItem2=mysqli_fetch_array($MerkItem2,MYSQLI_ASSOC); echo "[".$DataMerkItem2['kditem']."]".$DataMerkItem2['merk'];
			?></td>
			<td width="118"><?php
            //mencari nilai confidence
			$kditem=$C2kditem1;
			$query_T=mysqli_query($conn,"SELECT * FROM transaksi WHERE id_toko='$idtoko' AND kditem='$kditem' ");
			$num_T=mysqli_num_rows($query_T);
            $supp1=$rowC2['support_count'];
             $cetak1 = $rowC2['support_count']."/".$num_T;
            if($num_T!=0) {
            echo $cetak1;

			?></td>
			<td width="105"><?php
            $support_count=$rowC2['support_count'];
            $Conf1=$support_count/$num_T;
            $Confidence=$support_count/$num_T*100; echo substr($Confidence,0,5)."%";
            echo"</td><td width='150'>";
            echo $rowC2['lift_ratio'];
         }
			?></td>
		</tr>
		<tr style="text-align: center;">
          <td><?php echo ++$no1;?></td>
		  <td><?php
          //mencari data kebalikannya
			echo " Jika Membeli ";
			$MerkItem2=mysqli_query($conn,"SELECT * FROM item WHERE id_toko ='$idtoko' AND kditem='$C2kditem2' ");
			$DataMerkItem2=mysqli_fetch_array($MerkItem2,MYSQLI_ASSOC); echo "[".$DataMerkItem2['kditem']."]".$DataMerkItem2['merk'];
			
			$MerkItem1=mysqli_query($conn,"SELECT * FROM item WHERE id_toko ='$idtoko' AND kditem='$C2kditem1' ");
			echo " Maka Juga Membeli ";
			$DataMerkItem1=mysqli_fetch_array($MerkItem1,MYSQLI_ASSOC); echo "[".$DataMerkItem1['kditem']."]".$DataMerkItem1['merk']." , ";
			//menampilkan data kditem2 c2
		  ?></td>
		  <td><?php
            //mencari nilai confidence
			$kditem=$C2kditem2;
			$query_T2=mysqli_query($conn,"SELECT * FROM transaksi WHERE id_toko='$idtoko' AND kditem='$kditem' ");
			$num_T2=mysqli_num_rows($query_T2); $cetak2 = $rowC2['support_count']."/".$num_T2;
            if ($num_T2 !=0) {
                echo $cetak2;
			//while ($data_T=mysqli_fetch_array($query_T)){
				//echo $data_T['kditem']."<br>";
				//}
			?></td>
		  <td><?php
            $support_count2=$rowC2['support_count'];
            $Conf2=$support_count2/$num_T2;
			$Confidence2=$support_count2/$num_T2*100; echo substr($Confidence2,0,5)."%"; 
            echo"</td><td width='150'>";
            echo $rowC2['lift_ratio'];
            }
			?></td>
    </tr>
		<?php } } } }
    ?>
</table>
</div>
</div>
</body>
</html>
