<html>
    <head>
        <title><?php ob_start();include"../header_session/login_inner.php";ob_end_clean(); $toko=mysqli_query($conn,"SELECT * FROM infotoko WHERE id_toko='$idtoko'"); $ambil_data_toko=mysqli_fetch_array($toko); $nama_toko=$ambil_data_toko['nama_toko']; echo $nama_toko." Proses Apriori"; ?></title>
        <link rel="shortcut icon" type="image/x-icon" href="../gambar/images/head_logo.ico" />
    </head>
<body>
<?php
include"../header_session/header_inner.php";
?>
<div id="bgkonten">
<center><div class="konten_tabel">
<h2 class="art-postheader">Proses Data Pembentukan Kandidat Itemset</h2>
<?php $cek = mysqli_query($conn,"SELECT * FROM transaksi WHERE id_toko='$idtoko'");
	if(mysqli_num_rows($cek)>0) {
		if (empty($_GET['date1']&&$_GET['date2'])) {
?>
	<H3>PROSES SEMUA DATA TRANSAKSI</H3>
<form method="post"><input type="submit" name="pola_2_semua" value="Proses 2 Item" style="padding:3px 6px 3px 6px; border:1px solid #06F; font-size: 21px;"></form>
<form method="post"><input type="submit" style="padding:3px 6px 3px 6px; border:1px solid #06F; font-size: 21px;" value="Proses 3 Item" name="pola_3_semua"></form><hr>
<div class="view_data">
	<H3>PROSES TRANSAKSI DENGAN SELEKSI</H3>
	<form method="POST" class="form-inline mt-3">
     <label for="date1">Tanggal</label>
     <input type="date" name="date1" id="date1" class="form-control mr-2">
     <label for="date2">sampai </label>
     <input type="date" name="date2" id="date2" class="form-control mr-2">
     <button type="submit" name="submit2" id="submit2" class="btn btn-primary">Cari</button>
    </form><hr><?php 
    
    
    if(isset($_POST['pola_2_semua'])) {
        $tanggal = date("Ymd");
            $waktu   = date("His"); 
            $cek_admin=mysqli_query($conn,"SELECT * FROM statistik WHERE id_toko='$idtoko' AND tanggal='$tanggal'");
            while($ambil_ip=mysqli_fetch_array($cek_admin)){ 
                $cek_ip=$ambil_ip['ip'];
            }
            if($cek_ip>1){ 
            echo '<script>alert("Proses Apriori Sedang dalam sesi admin lain");window.location="LANGKAH_2_HITUNG_SUPPORT_ITEM_1.php";</script>';
            } else {
          $ip = $_SERVER['REMOTE_ADDR'];
$tanggal = date("Ymd");
$waktu   = date("His");
$status="admin"; 
$s = mysqli_query($conn,"SELECT * FROM statistik WHERE ip='$ip' AND tanggal='$tanggal' AND id_toko='$idtoko'");
$ambil_data_ip=mysqli_fetch_array($s);
$ambil_ip=$ambil_data_ip['ip'];
if(mysqli_num_rows($s) == 0 && $ambil_ip != $ip){
  mysqli_query($conn,"INSERT INTO statistik(id_toko, ip, tanggal, online, status) VALUES('$idtoko','$ip','$tanggal','$waktu','$status')");} 
      else {
        mysqli_query($conn,"UPDATE statistik SET online='$waktu', status='$status' WHERE ip='$ip' AND tanggal='$tanggal' AND id_toko='$idtoko'");
      } 
        echo'<script>window.location="../PROSES_ALGORITMA_APRIORI/LANGKAH_3_KANDIDAT_ITEM_2.php";</script>'; }
    } elseif(isset($_POST['pola_3_semua'])) {
        $tanggal = date("Ymd");
            $waktu   = date("His"); 
            $cek_admin=mysqli_query($conn,"SELECT * FROM statistik WHERE id_toko='$idtoko' AND tanggal='$tanggal'");
            while($ambil_ip=mysqli_fetch_array($cek_admin)){ 
                $cek_ip=$ambil_ip['ip'];
            }
            if($cek_ip>1){ 
            echo '<script>alert("Proses Apriori Sedang dalam sesi admin lain");window.location="LANGKAH_2_HITUNG_SUPPORT_ITEM_1.php";</script>';
            } else {
          $ip = $_SERVER['REMOTE_ADDR'];
$tanggal = date("Ymd");
$waktu   = date("His");
$status="admin"; 
$s = mysqli_query($conn,"SELECT * FROM statistik WHERE ip='$ip' AND tanggal='$tanggal' AND id_toko='$idtoko'");
$ambil_data_ip=mysqli_fetch_array($s);
$ambil_ip=$ambil_data_ip['ip'];
if(mysqli_num_rows($s) == 0 && $ambil_ip != $ip){
  mysqli_query($conn,"INSERT INTO statistik(id_toko, ip, tanggal, online, status) VALUES('$idtoko','$ip','$tanggal','$waktu','$status')");} 
      else {
        mysqli_query($conn,"UPDATE statistik SET online='$waktu', status='$status' WHERE ip='$ip' AND tanggal='$tanggal' AND id_toko='$idtoko'");
      }
         echo'<script>window.location="../PROSES_ALGORITMA_APRIORI/LANGKAH_7_KANDIDAT_ITEM_3.php";</script>'; }
    }
    
    
    } ?>
<table border="1" align="left" cellpadding="0" cellspacing="2" style="border:thin; border-color:#399; padding-left:3px; margin-top:5px;">
<tr >
  <td colspan="3" style="background-color:lightgrey; text-align: center; font-size: 18px; font-weight: bold;">Pola Transaksi Penjualan
  	<br>
  	<?php
 $date1 = $_POST['date1'];
 $date2 = $_POST['date2']; 
 $date3 = $_GET['date1'];
 $date4 = $_GET['date2'];
 if (!empty($date1&&$date2)) {
 	$cek_isi1=mysqli_query($conn,"SELECT * FROM transaksi WHERE tgltransaksi='$date1' AND id_toko='$idtoko'");
 	$cek_isi2=mysqli_query($conn,"SELECT * FROM transaksi WHERE tgltransaksi='$date2' AND id_toko='$idtoko'");
	if (mysqli_num_rows($cek_isi1)==0) {
		echo'<script>alert("TANGGAL AWAL SELEKSI TIDAK VALID");window.location="LANGKAH_2_HITUNG_SUPPORT_ITEM_1.php";</script>';
	} elseif (mysqli_num_rows($cek_isi2)==0) {
		echo'<script>alert("TANGGAL AKHIR SELEKSI TIDAK VALID");window.location="LANGKAH_2_HITUNG_SUPPORT_ITEM_1.php";</script>';
	}
 $QuerySumTransaksi=mysqli_query($conn,"SELECT * FROM transaksi WHERE id_toko ='$idtoko' AND tgltransaksi BETWEEN '$date1' AND '$date2' GROUP BY kdtransaksi ORDER BY id_transaksi DESC");	
 } elseif (!empty($date3&&$date4)) {
 	$QuerySumTransaksi=mysqli_query($conn,"SELECT * FROM transaksi WHERE id_toko ='$idtoko' AND tgltransaksi BETWEEN '$date3' AND '$date4' GROUP BY kdtransaksi ORDER BY id_transaksi DESC");
 }  else {
  $QuerySumTransaksi=mysqli_query($conn,"SELECT * FROM transaksi WHERE id_toko ='$idtoko' GROUP BY kdtransaksi ORDER BY id_transaksi DESC"); }
  $SumTransaksi=mysqli_num_rows($QuerySumTransaksi); ?><a href="../PROSES_ALGORITMA_APRIORI/data_transaksi.php"><?php echo "Total : " .$SumTransaksi. " Transaksi (selengkapnya)";?></a>
  </td>
  </tr>
<tr style="background-color:lightgrey;text-align:center;">
			<td><span class="style7">KD Transaksi</span></td>
			<td>Item Terjual</td>
			<td>Tanggal</td>
		</tr>
	<?php
  if (isset($_POST['submit2'])) {
    if (!empty($date1) && !empty($date2)) {
    echo'<script>window.location="LANGKAH_2_HITUNG_SUPPORT_ITEM_1.php?date1='.$date1.'&date2='.$date2.'";</script>';
  // perintah tampil data berdasarkan range tanggal
  $result = mysqli_query($conn,"SELECT * FROM transaksi WHERE id_toko='$idtoko' AND tgltransaksi BETWEEN '$date1' AND '$date2' GROUP BY kdtransaksi ORDER BY id_transaksi DESC");

  echo"<center><b>Sistem Akan membatasi transaksi dari rentang tanggal "; echo date('d-M-Y', strtotime($date1)); echo " sampai "; echo date('d-M-Y', strtotime($date2))."</b>"; echo "<br><br>
<form method='post'><input type='submit' name='pola_2_tgl1' value='Proses 2 Itemset' style='padding:3px 6px 3px 6px; border:1px solid #06F; font-size: 21px;'></form>
<form method='post'><input type='submit' name='pola_3_tgl1' value='Proses 3 Itemset' style='padding:3px 6px 3px 6px; border:1px solid #06F; font-size: 21px;'></form>
<a style='padding:3px 6px 3px 6px; border:1px solid #06F; font-size: 18px;'  href=\"LANGKAH_2_HITUNG_SUPPORT_ITEM_1.php?clear=y\">Reset</a></center><hr>";


if(isset($_POST['pola_2_tgl1'])) {
    $tanggal = date("Ymd");
            $waktu   = date("His"); 
            $cek_admin=mysqli_query($conn,"SELECT * FROM statistik WHERE id_toko='$idtoko' AND tanggal='$tanggal'");
            while($ambil_ip=mysqli_fetch_array($cek_admin)){ 
                $cek_ip=$ambil_ip['ip'];
            }
            if($cek_ip>1){ 
            echo '<script>alert("Proses Apriori Sedang dalam sesi admin lain");window.location="LANGKAH_2_HITUNG_SUPPORT_ITEM_1.php?date1='.$date1.'&date2='.$date2.'";</script>';
            } else {
          $ip = $_SERVER['REMOTE_ADDR'];
$tanggal = date("Ymd");
$waktu   = date("His");
$status="admin"; 
$s = mysqli_query($conn,"SELECT * FROM statistik WHERE ip='$ip' AND tanggal='$tanggal' AND id_toko='$idtoko'");
$ambil_data_ip=mysqli_fetch_array($s);
$ambil_ip=$ambil_data_ip['ip'];
if(mysqli_num_rows($s) == 0 && $ambil_ip != $ip){
  mysqli_query($conn,"INSERT INTO statistik(id_toko, ip, tanggal, online, status) VALUES('$idtoko','$ip','$tanggal','$waktu','$status')");} 
      else {
        mysqli_query($conn,"UPDATE statistik SET online='$waktu', status='$status' WHERE ip='$ip' AND tanggal='$tanggal' AND id_toko='$idtoko'");
      }
        echo'<script>window.location="LANGKAH_3_KANDIDAT_ITEM_2.php?date1='.$date1.'&date2='.$date2.'";</script>'; }
    } elseif(isset($_POST['pola_3_tgl1'])) {
        $tanggal = date("Ymd");
            $waktu   = date("His"); 
            $cek_admin=mysqli_query($conn,"SELECT * FROM statistik WHERE id_toko='$idtoko' AND tanggal='$tanggal'");
            while($ambil_ip=mysqli_fetch_array($cek_admin)){ 
                $cek_ip=$ambil_ip['ip'];
            }
            if($cek_ip>1){ 
            echo '<script>alert("Proses Apriori Sedang dalam sesi admin lain");window.location="LANGKAH_2_HITUNG_SUPPORT_ITEM_1.php?date1='.$date1.'&date2='.$date2.'";</script>';
            } else {
          $ip = $_SERVER['REMOTE_ADDR'];
$tanggal = date("Ymd");
$waktu   = date("His");
$status="admin"; 
$s = mysqli_query($conn,"SELECT * FROM statistik WHERE ip='$ip' AND tanggal='$tanggal' AND id_toko='$idtoko'");
$ambil_data_ip=mysqli_fetch_array($s);
$ambil_ip=$ambil_data_ip['ip'];
if(mysqli_num_rows($s) == 0 && $ambil_ip != $ip){
  mysqli_query($conn,"INSERT INTO statistik(id_toko, ip, tanggal, online, status) VALUES('$idtoko','$ip','$tanggal','$waktu','$status')");} 
      else {
        mysqli_query($conn,"UPDATE statistik SET online='$waktu', status='$status' WHERE ip='$ip' AND tanggal='$tanggal' AND id_toko='$idtoko'");
      }
         echo'<script>window.location="LANGKAH_7_KANDIDAT_ITEM_3.php?date1='.$date1.'&date2='.$date2.'";</script>'; }
    }


 }  else {
  // perintah tampil semua data
  $result = mysqli_query($conn,"SELECT * FROM transaksi WHERE id_toko='$idtoko' GROUP BY kdtransaksi ORDER BY id_transaksi DESC"); 
 }
} 

if (!empty($date3) && !empty($date4)) {
  // perintah tampil data berdasarkan range tanggal
  $result = mysqli_query($conn,"SELECT * FROM transaksi WHERE id_toko='$idtoko' AND tgltransaksi BETWEEN '$date3' AND '$date4' GROUP BY kdtransaksi ORDER BY id_transaksi DESC");

  echo"<center><b>Sistem membatasi transaksi dari rentang tanggal "; echo date('d-M-Y', strtotime($date3)); echo " sampai "; echo date('d-M-Y', strtotime($date4))."</b>"; echo "<br><br>
<form method='post'><input type='submit' name='pola_2_tgl2' value='Proses 2 Itemset' style='padding:3px 6px 3px 6px; border:1px solid #06F; font-size: 21px;'></form>
<form method='post'><input type='submit' name='pola_3_tgl2' value='Proses 3 Itemset' style='padding:3px 6px 3px 6px; border:1px solid #06F; font-size: 21px;'></form>
<a style='padding:3px 6px 3px 6px; border:1px solid #06F; font-size: 18px;''  href=\"LANGKAH_2_HITUNG_SUPPORT_ITEM_1.php?clear=y\">Reset</a></center><hr>";
 
    
    if(isset($_POST['pola_2_tgl2'])) {
        $tanggal = date("Ymd");
            $waktu   = date("His"); 
            $cek_admin=mysqli_query($conn,"SELECT * FROM statistik WHERE id_toko='$idtoko' AND tanggal='$tanggal'");
            while($ambil_ip=mysqli_fetch_array($cek_admin)){ 
                $cek_ip=$ambil_ip['ip'];
            }
            if($cek_ip>1){ 
            echo '<script>alert("Proses Apriori Sedang dalam sesi admin lain");window.location="LANGKAH_2_HITUNG_SUPPORT_ITEM_1.php?date1='.$date3.'&date2='.$date4.'";</script>';
            } else {
          $ip = $_SERVER['REMOTE_ADDR'];
$tanggal = date("Ymd");
$waktu   = date("His");
$status="admin"; 
$s = mysqli_query($conn,"SELECT * FROM statistik WHERE ip='$ip' AND tanggal='$tanggal' AND id_toko='$idtoko'");
$ambil_data_ip=mysqli_fetch_array($s);
$ambil_ip=$ambil_data_ip['ip'];
if(mysqli_num_rows($s) == 0 && $ambil_ip != $ip){
  mysqli_query($conn,"INSERT INTO statistik(id_toko, ip, tanggal, online, status) VALUES('$idtoko','$ip','$tanggal','$waktu','$status')");} 
      else {
        mysqli_query($conn,"UPDATE statistik SET online='$waktu', status='$status' WHERE ip='$ip' AND tanggal='$tanggal' AND id_toko='$idtoko'");
      }
        echo'<script>window.location="LANGKAH_3_KANDIDAT_ITEM_2.php?date1='.$date3.'&date2='.$date4.'";</script>'; }
    } elseif(isset($_POST['pola_3_tgl2'])) {
        $tanggal = date("Ymd");
            $waktu   = date("His"); 
            $cek_admin=mysqli_query($conn,"SELECT * FROM statistik WHERE id_toko='$idtoko' AND tanggal='$tanggal'");
            while($ambil_ip=mysqli_fetch_array($cek_admin)){ 
                $cek_ip=$ambil_ip['ip'];
            }
            if($cek_ip>1){ 
            echo '<script>alert("Proses Apriori Sedang dalam sesi admin lain");window.location="LANGKAH_2_HITUNG_SUPPORT_ITEM_1.php?date1='.$date3.'&date2='.$date4.'";</script>';
            } else {
          $ip = $_SERVER['REMOTE_ADDR'];
$tanggal = date("Ymd");
$waktu   = date("His");
$status="admin"; 
$s = mysqli_query($conn,"SELECT * FROM statistik WHERE ip='$ip' AND tanggal='$tanggal' AND id_toko='$idtoko'");
$ambil_data_ip=mysqli_fetch_array($s);
$ambil_ip=$ambil_data_ip['ip'];
if(mysqli_num_rows($s) == 0 && $ambil_ip != $ip){
  mysqli_query($conn,"INSERT INTO statistik(id_toko, ip, tanggal, online, status) VALUES('$idtoko','$ip','$tanggal','$waktu','$status')");} 
      else {
        mysqli_query($conn,"UPDATE statistik SET online='$waktu', status='$status' WHERE ip='$ip' AND tanggal='$tanggal' AND id_toko='$idtoko'");
      }
         echo'<script>window.location="LANGKAH_7_KANDIDAT_ITEM_3.php?date1='.$date3.'&date2='.$date4.'";</script>'; }
    }
    
    
}


else {
 // perintah tampil semua data
 $result = mysqli_query($conn,"SELECT * FROM transaksi WHERE id_toko ='$idtoko' GROUP BY kdtransaksi ORDER BY id_transaksi DESC");
}
		while($row = mysqli_fetch_array($result,MYSQLI_ASSOC))
		{
		?>
		<tr>
			<td style="text-align: center;"><?php echo $row['kdtransaksi'];?></td>
			<td><?php
			$kdtransaksi=$row['kdtransaksi'];
            $result2=mysqli_query($conn,"SELECT * FROM transaksi,item WHERE item.kditem=transaksi.kditem AND transaksi.id_toko=item.id_toko AND transaksi.id_toko='$idtoko' AND transaksi.kdtransaksi='$kdtransaksi' ORDER BY item.id_item ASC");
			while($rowItem = mysqli_fetch_array($result2,MYSQLI_ASSOC))
			{
				echo $rowItem['merk'] ." , ";
				}
			?></td>
			<td><?php echo date('d-F-Y',strtotime($row['tgltransaksi']));?></a></td>
		</tr>
		<?php }
		?>
</table>
<div class="tabelc1_1">
<center><table border="1" align="left" cellpadding="0" cellspacing="2" style="width: 100%; border:thin; border-color:#399; padding-left:3px; margin-top:5px;">
<tr style="background-color:lightgrey;text-align:center;">
  <td colspan="3">Pembentukan Kandidat 1 Itemset
  	<?php
  	$date1=$_POST['date1'];
  	$date2=$_POST['date2'];
  	$date3=$_GET['date1'];
  	$date4=$_GET['date2'];
  $QuerySumItemC1=mysqli_query($conn,"SELECT * FROM itemc1 WHERE id_toko ='$idtoko' ORDER BY kditem ASC");
  $SumItemC1=mysqli_num_rows($QuerySumItemC1); echo "<br>Total : " .$SumItemC1." Item"; ?>

  </td>
  </tr>
<tr style="background-color:lightgrey;text-align:center;">
			<td><span class="style7">KD Item</span></td>
			<td>Itemset</td>
			<td>Support %</td>
		</tr>
	<?php
	//kosongkan tabel itemc1
	$EmptiItemc1=mysqli_query($conn,"DELETE FROM itemc1 WHERE id_toko ='$idtoko' ORDER BY kditem ASC");
	//#end kosong
	if(!empty($date1&&$date2)) {
	  	$qryTotalItem1 = mysqli_query($conn,"SELECT * FROM transaksi WHERE id_toko ='$idtoko' AND tgltransaksi BETWEEN '$date1' AND '$date2' GROUP BY kdtransaksi ORDER BY kdtransaksi ASC"); } elseif (!empty($date3&&$date4)) {
	  		$qryTotalItem1 = mysqli_query($conn,"SELECT * FROM transaksi WHERE id_toko ='$idtoko' AND tgltransaksi BETWEEN '$date3' AND '$date4' GROUP BY kdtransaksi ORDER BY kdtransaksi ASC"); } else {
	  		$qryTotalItem1 = mysqli_query($conn,"SELECT * FROM transaksi WHERE id_toko ='$idtoko' GROUP BY kdtransaksi ORDER BY kdtransaksi ASC");
	  	} 

		$SumTotalItem1=mysqli_num_rows($qryTotalItem1);
		if (!empty($date1&&$date2)) {
 		$result=mysqli_query($conn,"SELECT * FROM transaksi,item WHERE transaksi.kditem=item.kditem AND transaksi.id_toko=item.id_toko AND transaksi.id_toko='$idtoko' AND transaksi.tgltransaksi BETWEEN '$date1' AND '$date2' GROUP BY transaksi.kditem ORDER BY item.id_item ASC"); }

 		elseif (!empty($date3&&$date4)) {
 			$result=mysqli_query($conn,"SELECT * FROM transaksi,item WHERE transaksi.kditem=item.kditem AND transaksi.id_toko=item.id_toko AND transaksi.id_toko='$idtoko' AND transaksi.tgltransaksi BETWEEN '$date3' AND '$date4' GROUP BY transaksi.kditem ORDER BY item.id_item ASC"); } else {
 			$result=mysqli_query($conn,"SELECT * FROM transaksi,item WHERE transaksi.kditem=item.kditem AND transaksi.id_toko=item.id_toko AND transaksi.id_toko='$idtoko'  GROUP BY transaksi.kditem ORDER BY item.id_item ASC");
 		} 
		while($row = mysqli_fetch_array($result,MYSQLI_ASSOC))
		{
		?>
		<tr>
			<td style="text-align: center;"><?php echo $row['kditem'];?></td>
			<td><?php echo $row['merk'];?></td>
			<td style="text-align: center;"><?php
	$kditem=$row['kditem'];
	if (!empty($date1&&$date2)) {
	$queryItem1=mysqli_query($conn,"SELECT * FROM transaksi WHERE kditem='$kditem' AND id_toko='$idtoko' AND tgltransaksi BETWEEN '$date1' AND '$date2'");} elseif (!empty($date3&&$date4)) {
		$queryItem1=mysqli_query($conn,"SELECT * FROM transaksi WHERE kditem='$kditem' AND id_toko='$idtoko' AND tgltransaksi BETWEEN '$date3' AND '$date4'");
	} else {
	$queryItem1=mysqli_query($conn,"SELECT * FROM transaksi WHERE kditem='$kditem' AND id_toko='$idtoko'");
	}
	$countItem1=mysqli_num_rows($queryItem1);
	//echo $countItem1 ."/" .$SumTotalItem1;
	$Persent=$countItem1/$SumTotalItem1*100; $PersentItem1=substr($Persent,0,5); echo $PersentItem1."%";
	$queryItemC1=mysqli_query($conn,"INSERT INTO itemc1 (id_toko,kditem,support_count,persen_support)VALUES('$idtoko','$kditem','$countItem1','$PersentItem1')");
	 ?></td>
		</tr>
 
		<?php } ?>
</table></center><br>
<table border="1" align="left" cellpadding="0" cellspacing="2" style="border:thin; border-color:#399; padding-left:3px; margin-top:5px;">
<tr style="background-color:lightgrey;text-align:center;">
  <td colspan="5">Pembentukan Kandidat 1/Min Support =
  <?php
  $queryRule1=mysqli_query($conn,"SELECT * FROM rule WHERE id_toko ='$idtoko' AND kdrule='R1' ");
  $dataRule1=mysqli_fetch_array($queryRule1,MYSQLI_ASSOC);
  echo $dataRule1['minsupport']."%";
  $minSupportR1=$dataRule1['minsupport'];
 		$queryMinC1=mysqli_query($conn,"SELECT * FROM item,itemc1 WHERE itemc1.kditem=item.kditem AND item.id_toko=itemc1.id_toko AND itemc1.id_toko='$idtoko' AND itemc1.persen_support>='$minSupportR1' ORDER BY itemc1.kditem ASC");
  $SumItemC1=mysqli_num_rows($queryMinC1); echo "<br>"; echo "Total : " .$SumItemC1." Item";
  ?>
   </td>
  </tr>
<tr style="background-color:lightgrey;text-align:center;">
			<td>KD Item</td>
			<td>Itemset</td>
			<td>Support Count</td>
			<td>Support %</td>
		</tr>
	<?php

	//#end kosong
		$minSupportR1=$dataRule1['minsupport'];
 		$queryMinItemc1=mysqli_query($conn,"SELECT * FROM item,itemc1 WHERE itemc1.kditem=item.kditem AND item.id_toko=itemc1.id_toko AND itemc1.id_toko='$idtoko' AND itemc1.persen_support>='$minSupportR1'");
		while($rowMinC1= mysqli_fetch_array($queryMinItemc1,MYSQLI_ASSOC))
		{
		?>
		<tr>
			<td style="text-align: center;"><?php echo $rowMinC1['kditem'];?></td>
			<td><?php echo $rowMinC1['merk'];?></td>
			<td style="text-align: center;"><?php echo $rowMinC1['support_count'];?></td>
			<td style="text-align: center;"><?php echo $rowMinC1['persen_support'];?>%</td>
		</tr>
 
		<?php } } else {
			echo"<center><H3>PERLU DATA TRANSAKSI UNTUK MEMPROSES</H3></center>";
		}
		?>
		</form>
</table>
<?php include"../header_session/footer.php";?>
</div></center>
</div>
</body>
</html>