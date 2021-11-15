<!DOCTYPE html>
<html>
<head>
	<title>Aturan Asosiasi</title>
	<link rel="stylesheet" href="../css/bootstrap.min.css">
</head>
<body>
<?php ob_start();include "../1_login_reg/login_reg.php";ob_end_clean(); ?>
<div id="bgkonten">
<center><h2 class='art-postheader' style='font-size:36px;'> Aturan Asosiasi Pola 2 Item</h2></center>
<?php
$cek=mysqli_query($conn,"SELECT * FROM itemc2 WHERE id_toko='$idtoko' AND persen_support>0");
if (mysqli_num_rows($cek)>0) {
?>
<div class="konten_tabel">
<div class="container">
<form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post">
	<div class="form-group">
      	<div class="form-group">
        <label for="sel1" style="font-size:24px;">Pencarian pada kolom:</label>
        <?php
        $kditem1="";
        $kditem2="";
        $support_count="";
        $support="";
        if (isset($_POST['kolom'])) {

            if ($_POST['kolom']=="kditem1")
            {
                $kditem1="selected";
            }else if ($_POST['kolom']=="kditem2"){
                $kditem2="selected";
            }else if ($_POST['kolom']=="support_count"){
                $support_count="selected";
            }else {
                $support="selected";
            }
        }
        ?>
            <select class="form-control" name="kolom" required style="font-size:21px;">
                <option value="" >Pilih Filter</option>
                <option value="kditem1" <?php echo $kditem1; ?> >Id Item kiri</option>
                <option value="kditem2" <?php echo $kditem2; ?> >Id Item Kanan</option>
                <option value="support_count" <?php echo $support_count; ?> >Jumlah Item</option>
                <option value="support" <?php echo $support; ?> >Support%</option>
         </select>
     </div>
      	<label for="sel1" style="font-size:24px;">Kata Kunci:</label>
        <?php
        $kata_kunci="";
        if (isset($_POST['kata_kunci'])) {
            $kata_kunci=$_POST['kata_kunci'];
        }
        ?>
        <input type="text" name="kata_kunci" value="<?php echo $kata_kunci;?>" class="form-control" style="font-size:24px;" required/>
    </div>
    <div class="form-group">
        <table><tr><td><input type="submit" class="btn btn-info" value="Pilih" style="font-size:24px;font-weight:bold;"></form></td><td>&nbsp;&nbsp;&nbsp;&nbsp;</td><td><form action="pola_2_tabel.php"><input type="submit" class="btn btn-info" value="Kembali" style="background:orange;font-size:24px;font-weight:bold;color:black;"></form></td></tr></table>
    </div>
</div>
<table border=1 style="border:thin; border-color:#399; width:100%; font-size:24px;">
<tr style="background-color: lightgrey;text-align: center;">
  <td colspan="6">Tabel 1 : Pembentukan 2 Kandidat Itemset dengan minimum support <?php
  $transaksi=mysqli_query($conn,"SELECT * FROM transaksi WHERE id_toko='$idtoko' GROUP BY kdtransaksi");
  $total_transaksi=mysqli_num_rows($transaksi);
  $strRule=mysqli_query($conn,"SELECT * FROM rule WHERE id_toko ='$idtoko' AND kdrule='R2'");
		$dataRule=mysqli_fetch_array($strRule,MYSQLI_ASSOC); 
		$nRule=$dataRule['minsupport']; 
		echo "<a href='../crud/ambil_data_update_minsup.php?kdrule=R2'>$nRule %</a>";
  ?></td>
  </tr>
  <tr>
  	<td colspan="3" style="text-align: center;">
  		<?php
		//kosong tmp transaksi
		
 		// $result=mysqli_query($conn,"SELECT * FROM itemc2 WHERE persen_support >='$nRule' ");
		if (isset($_POST['kata_kunci'])) {
            $kata_kunci=trim($_POST['kata_kunci']);

            $kolom="";
            if ($_POST['kolom']=="kditem1")
            {
                $kolom="kditem1";
            }else if ($_POST['kolom']=="kditem2"){
                $kolom="kditem2";
            }else if ($_POST['kolom']=="support_count"){
                $kolom="support_count";
            }else {
                $kolom="persen_support";
            }

            $result=mysqli_query($conn,"SELECT * FROM itemc2 WHERE id_toko ='$idtoko' AND $kolom like '%".$kata_kunci."%' AND persen_support >='$nRule' AND lift_ratio>1 ");if (mysqli_num_rows($result)>0) {
            	echo "Data Tabel 2 ini telah disortir berdasarkan $kolom dengan kata kunci $kata_kunci";?>
            	<form method="POST" action=""><button type="submit" name="reset">Hapus Filter</button></form><?php
            } else {
            	echo "Data $kolom dengan kata kunci $kata_kunci kosong";?>
            <form method="POST" action=""><button type="submit" name="reset">Hapus Filter</button></form>
            <?php
            }
        }else {
            $result=mysqli_query($conn,"SELECT * FROM itemc2 WHERE id_toko ='$idtoko' AND persen_support >='$nRule' ORDER BY persen_support DESC");
        }?>
  	</td>
  </tr>
<tr style="background-color: lightgrey;text-align: center;">
            <td width="25">No.</td>
			<td width="191">Itemset</td>
			<td width="115"><span class="style7">Support Count</span></td>
			<td width="115">Support %</td>
            <td width="115">Lift Ratio</td>
		</tr>
		<?php
		while($rowC2 = mysqli_fetch_array($result,MYSQLI_ASSOC))
		{
		?>
		<tr style="text-align: center;">
			<td><?php echo ++$no; ?></td>
            <td><?php
            $C2kditem1=$rowC2['kditem1']; $C2kditem2=$rowC2['kditem2'];
			//menampilkan data kditem1 c2
			$MerkItem1=mysqli_query($conn,"SELECT * FROM item WHERE id_toko ='$idtoko' AND kditem='$C2kditem1' ");
			$DataMerkItem1=mysqli_fetch_array($MerkItem1,MYSQLI_ASSOC); echo "[".$DataMerkItem1['kditem']."]".$DataMerkItem1['merk']." , ";
			//menampilkan data kditem2 c2
			$MerkItem2=mysqli_query($conn,"SELECT * FROM item WHERE id_toko ='$idtoko' AND kditem='$C2kditem2' ");
			$DataMerkItem2=mysqli_fetch_array($MerkItem2,MYSQLI_ASSOC); echo "[".$DataMerkItem2['kditem']."]".$DataMerkItem2['merk'];
			?></td>
			<td><?php $supp=$rowC2['support_count'];echo $supp;?></td>
			<td><?php echo substr($rowC2['persen_support'],0,5)."%";?></td>
            <td><?php 
            $kd1=$C2kditem1;
            $hitung_count_A=mysqli_query($conn,"SELECT * FROM transaksi WHERE id_toko='$idtoko' AND kditem='$kd1' ");
            $total_count_A=mysqli_num_rows($hitung_count_A);
            $Supp_A=$total_count_A/$total_transaksi;
            $kd2=$C2kditem2;
            $hitung_count_B=mysqli_query($conn,"SELECT * FROM transaksi WHERE id_toko='$idtoko' AND kditem='$kd2' ");
            $total_count_B=mysqli_num_rows($hitung_count_B);
            $Supp_B=$total_count_B/$total_transaksi;
            $Supp_AB=$supp/$total_transaksi;
            //lift_ratio=Supp(A->B)/Supp(A)*Supp(B);
            $Lift1=$Supp_AB/($Supp_A*$Supp_B);
            $Lift = substr($Lift1,0,4);
            echo $Lift;
            mysqli_query($conn,"UPDATE itemc2 SET lift_ratio='$Lift' WHERE id_toko='$idtoko' AND id_itemc2='".$rowC2['id_itemc2']."'");
            ?></td>
		</tr>
		<?php }
		?>
</table> 
</div>
<br><hr><br
<div class="view_data">
<table border="1" style="border:thin; border-color:#399; width:100%; font-size:24px;">
<tr style="background-color: lightgrey;text-align: center;">
  <td colspan="6">Table 2 : Aturan Asosiasi Final dari 2 Itemset</td>
  </tr>
  <tr>
  	<td colspan="3" style="text-align: center; size: 24">
  		<?php
 		if (isset($_POST['kata_kunci'])) {
            $kata_kunci=trim($_POST['kata_kunci']);

            $kolom="";
            if ($_POST['kolom']=="kditem1")
            {
                $kolom="kditem1";
            }else if ($_POST['kolom']=="kditem2"){
                $kolom="kditem2";
            }else if ($_POST['kolom']=="support_count"){
                $kolom="support_count";
            }else {
                $kolom="persen_support";
            }

            $result=mysqli_query($conn,"SELECT * FROM itemc2 WHERE id_toko ='$idtoko' AND $kolom like '%".$kata_kunci."%' AND persen_support >='$nRule'");
            if (mysqli_num_rows($result)>0) {
            	echo "Data Tabel 2 ini telah disortir berdasarkan $kolom dengan kata kunci $kata_kunci";?>
            	<form method="POST" action=""><button type="submit" name="reset">Hapus Filter</button></form><?php
            } else {
            	echo "Data $kolom dengan kata kunci $kata_kunci kosong";?>
            <form method="POST" action=""><button type="submit" name="reset">Hapus Filter</button></form>
            <?php
            }
        }else {
            $result=mysqli_query($conn,"SELECT * FROM itemc2 WHERE id_toko ='$idtoko' AND persen_support >='$nRule' AND lift_ratio>=1 ORDER BY persen_support DESC");
        } ?>
  	</td>
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
         } else { echo "HARAP PROSES ULANG APRIORI"; }
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
            } else {
                echo "HARAP PROSES ULANG APRIORI";
            }
			?></td>
    </tr>
		<?php } } else {
            echo"</td></tr><tr><td colspan='5' style='text-align:center;'><b>Nilai Lift Ratio dibawah 1, Sehingga Tidak Ada Rule yang Valid<b></td></tr>"; }
    } else {

		echo "<br><center><H3>HARAP PROSES APRIORI (PROSES C2)</H3></center>";
    }?>
</table>
<?php include"../header_session/footer.php";?>
</div>
</div>
</body>
</html>