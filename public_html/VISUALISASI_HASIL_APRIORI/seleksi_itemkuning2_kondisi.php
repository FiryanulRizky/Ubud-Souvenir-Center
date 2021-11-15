<!DOCTYPE html>
<html>
<head>
	<title>Visualisasi 3 Item</title>
	<link rel="stylesheet" href="../css/style_visualisasi.css">
    <link rel="stylesheet" href="../css/bootstrap2.min.css">
</head>
<body>
<?php
include "../header_session/login_inner.php";
		//kosong tmp transaksi
	$strRule=mysqli_query($conn,"SELECT * FROM rule WHERE id_toko='$idtoko' AND kdrule='R3'");
		$dataRule=mysqli_fetch_array($strRule,MYSQLI_ASSOC);
		$nRule=$dataRule['minsupport'];?>
		<div class="container">
<form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post">
	<div class="form-group">
      	<div class="form-group">
        <label for="sel1"><h3 style="color: gold;">KODE KUNING</h3> (Penjualan Antara 25% s/d 50%)</label><br>
        <label for="sel1">Filter jika diperlukan :</label><?php
        $kditem1="";
        $kditem2="";
        $kditem3="";
        $support="";
        if (isset($_POST['kolom'])) {

            if ($_POST['kolom']=="kditem1")
            {
                $kditem1="selected";
            }else if ($_POST['kolom']=="kditem2"){
                $kditem2="selected";
            }else if ($_POST['kolom']=="kditem3"){
                $kditem3="selected";
            }else {
                $support="selected";
            }
        }
        ?>
            <select class="form-control" name="kolom" required>
                <option value="" >Pilih Filter</option>
                <option value="kditem1" <?php echo $kditem1; ?> >Id Item kiri</option>
                <option value="kditem2" <?php echo $kditem2; ?> >Id Item Tengah</option>
                <option value="kditem3" <?php echo $kditem3; ?> >Id Item Kanan</option>
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
        <input type="text" name="kata_kunci" value="<?php echo $kata_kunci;?>" maxlength="4" class="form-control"  required/>
    </div>
    <table>
   	<tr>
   	<td><div class="form-group">
        <input type="submit" class="btn btn-info" value="Pilih"></form></div></td><td>&nbsp;&nbsp;</td>
    <td><div class="form-group">
        <form action="seleksi_itemkuning2.php" method="post">
        <input type="submit" name="reset" class="btn btn-info" value="Kembali" style="background:orange;color:black;"></form></div></td>
    </tr>
    </table>
</div>
<?php
if (isset($_POST['kata_kunci'])) {
    if (!preg_match("/^[1-9][0-9]*$/",$_POST['kata_kunci'])) {
        echo'<script>alert("Harga hanya menerima input angka");window.location="'.$_SERVER['PHP_SELF'].'";</script>'; } else {
            $kata_kunci=trim($_POST['kata_kunci']);

            $kolom="";
            if ($_POST['kolom']=="kditem1")
            {
                $kolom="kditem1";
                $result=mysqli_query($conn,"SELECT * FROM itemc3 WHERE id_toko='$idtoko' AND $kolom like '%".$kata_kunci."%' AND persen_support >='$nRule'");if (mysqli_num_rows($result)>0) {
                echo "<center><b>Data diseleksi berdasarkan</b><H3>ID Item Kiri (BR$kata_kunci)</H3>";?>
                <form method="POST" action=""><input type="submit" name="reset" value="Hapus Filter" style="font-weight:bold;background:red;color:white;padding:10px;"></form></center><br><?php
            } else {
                echo "<center><b>ID Item Kiri (BR$kata_kunci) kosong</b>";?>
            <form method="POST" action=""><input type="submit" name="reset" value="Hapus Filter" style="font-weight:bold;padding:10px;background:red;color:white;"></form></center>
            <?php
            }
            }else if ($_POST['kolom']=="kditem2"){
                $kolom="kditem2";
                $result=mysqli_query($conn,"SELECT * FROM itemc3 WHERE id_toko='$idtoko' AND $kolom like '%".$kata_kunci."%' AND persen_support >='$nRule'");if (mysqli_num_rows($result)>0) {
                echo "<center><b>Data diseleksi berdasarkan</b><H3>ID Item Tengah (BR$kata_kunci)</H3>";?>
                <form method="POST" action=""><input type="submit" name="reset" value="Hapus Filter" style="font-weight:bold;background:red;color:white;padding:10px;"></form></center><br><?php
            } else {
                echo "<center><b>ID Item Tengah (BR$kata_kunci) kosong</b>";?>
            <form method="POST" action=""><input type="submit" name="reset" value="Hapus Filter" style="font-weight:bold;padding:10px;background:red;color:white;"></form></center>
            <?php
            }
            }else if ($_POST['kolom']=="kditem3"){
                $kolom="kditem3";
                $result=mysqli_query($conn,"SELECT * FROM itemc3 WHERE id_toko='$idtoko' AND $kolom like '%".$kata_kunci."%' AND persen_support >='$nRule'");if (mysqli_num_rows($result)>0) {
                echo "<center><b>Data diseleksi berdasarkan</b><H3>ID Item Kanan (BR$kata_kunci)</H3>";?>
                <form method="POST" action=""><input type="submit" name="reset" value="Hapus Filter" style="font-weight:bold;background:red;color:white;padding:10px;"></form></center><br><?php
            } else {
                echo "<center><b>ID Item Kanan (BR$kata_kunci) kosong</b>";?>
            <form method="POST" action=""><input type="submit" name="reset" value="Hapus Filter" style="font-weight:bold;padding:10px;background:red;color:white;"></form></center>
            <?php
            }
            }else {
                $kolom="persen_support";
                $result=mysqli_query($conn,"SELECT * FROM itemc3 WHERE id_toko='$idtoko' AND $kolom like '%".$kata_kunci."%' AND persen_support >='$nRule'");if (mysqli_num_rows($result)>0) {
                echo "<center><b>Data diseleksi berdasarkan</b><H3>Persentase Terjual $kata_kunci%</H3>";?>
                <form method="POST" action=""><input type="submit" name="reset" value="Hapus Filter" style="font-weight:bold;background:red;color:white;padding:10px;"></form></center><br><?php
            } else {
                echo "<center><b>Persentase Terjual $kata_kunci% kosong</b>";?>
            <form method="POST" action=""><input type="submit" name="reset" value="Hapus Filter" style="font-weight:bold;padding:10px;background:red;color:white;"></form></center>
            <?php
            }
            }
        }
        }else {

	      $result=mysqli_query($conn,"SELECT * FROM itemc3 WHERE id_toko='$idtoko' AND persen_support >='$nRule'ORDER BY persen_support DESC");
	    }

		while($rowC2 = mysqli_fetch_array($result,MYSQLI_ASSOC))
		{
            $C2kditem1=$rowC2['kditem1']; $C2kditem2=$rowC2['kditem2']; $C2kditem3=$rowC2['kditem3'];
			//menampilkan data kditem2 c2
			$kditem=$C2kditem1;
			$query_T=mysqli_query($conn,"SELECT * FROM transaksi WHERE id_toko='$idtoko' AND kditem='$kditem' ");
			$num_T=mysqli_num_rows($query_T);
			$support_count=$rowC2['support_count'];
			$Confidence=$support_count/$num_T*100; $persensupport = substr($Confidence,0,5)."%";
			
			if ($persensupport > 25 && $persensupport <=50) { ?>
				<?php	$MerkItem1=mysqli_query($conn,"SELECT * FROM item WHERE id_toko='$idtoko' AND kditem='$C2kditem1' ");
            $DataMerkItem1=mysqli_fetch_array($MerkItem1,MYSQLI_ASSOC);?><hr><div id="circle_3kiri"><div class="circle_3itemkiri"><?php echo "[".$DataMerkItem1['kditem']."]"."<br><img src='../gambar/produk/".$DataMerkItem1['gambar_item']."'><br>".$DataMerkItem1['merk'].",";?></div> <?php
            $MerkItem2=mysqli_query($conn,"SELECT * FROM item WHERE id_toko='$idtoko' AND kditem='$C2kditem2' ");
            $DataMerkItem2=mysqli_fetch_array($MerkItem2,MYSQLI_ASSOC);?><div class="circle_3itemtengah"> <?php echo "[".$DataMerkItem2['kditem']."]"."<br><img src='../gambar/produk/".$DataMerkItem2['gambar_item']."'><br>".$DataMerkItem2['merk'].",";
            ?></div><div class="circle_3dotkiri"><b><?php echo"2 item terbeli, maka juga";?></b></div>
				<div class="circle_kuning3"><H2>K</H2><?php echo "<h3>membeli $persensupport</h3>"?></div><?php 
				$MerkItem3=mysqli_query($conn,"SELECT * FROM item WHERE id_toko='$idtoko' AND kditem='$C2kditem3' ");
            $DataMerkItem3=mysqli_fetch_array($MerkItem3,MYSQLI_ASSOC);?><div class="circle_3itemkanan"> <?php echo "[".$DataMerkItem3['kditem']."]"."<br><img src='../gambar/produk/".$DataMerkItem3['gambar_item']."'><br>".$DataMerkItem3['merk'].",";
				?></div></div>
			<?php }
			
			$kditem=$C2kditem3;
            $query_T2=mysqli_query($conn,"SELECT * FROM transaksi WHERE id_toko='$idtoko' AND kditem='$kditem' ");
            $num_T2=mysqli_num_rows($query_T2);
            $support_count2=$rowC2['support_count'];
            $Confidence2=$support_count2/$num_T2*100; $persensupport2 = substr($Confidence2,0,5)."%";
			
			if ($persensupport2 > 25 && $persensupport2 <=50 ) { ?><?php
				$MerkItem3=mysqli_query($conn,"SELECT * FROM item WHERE id_toko='$idtoko' AND kditem='$C2kditem3' ");
            $DataMerkItem3=mysqli_fetch_array($MerkItem3,MYSQLI_ASSOC);?> <div id="circle_3kiri_r"><div class="circle_3itemkiri_r"><?php echo "[".$DataMerkItem3['kditem']."]"."<br><img src='../gambar/produk/".$DataMerkItem3['gambar_item']."'><br>".$DataMerkItem3['merk'].",";?></div> <?php
            $MerkItem2=mysqli_query($conn,"SELECT * FROM item WHERE id_toko='$idtoko' AND kditem='$C2kditem2' ");
            $DataMerkItem2=mysqli_fetch_array($MerkItem2,MYSQLI_ASSOC);?><div class="circle_3itemtengah_r"> <?php echo "[".$DataMerkItem2['kditem']."]"."<br><img src='../gambar/produk/".$DataMerkItem2['gambar_item']."' width='95' height='80'><br>".$DataMerkItem2['merk'].",";?></div>
				<div class="circle_kuning4"><H2>K</H2><?php echo "<h3>membeli $persensupport2</h3>"?></div>
				<?php 
				$MerkItem1=mysqli_query($conn,"SELECT * FROM item WHERE id_toko='$idtoko' AND kditem='$C2kditem1' ");
            $DataMerkItem1=mysqli_fetch_array($MerkItem1,MYSQLI_ASSOC);?><div class="circle_3itemkanan_r"> <?php echo "[".$DataMerkItem1['kditem']."]"."<br><img src='../gambar/produk/".$DataMerkItem1['gambar_item']."'><br>".$DataMerkItem1['merk'].",";
				?></div><div class="circle_3dotkanan"><b>Sebaliknya</b></div></div>
				<?php
			}
			
	} ?>
	</body>
</html>