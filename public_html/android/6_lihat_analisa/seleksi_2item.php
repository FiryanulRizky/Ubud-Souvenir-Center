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
<br><form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post">
	<div class="form-group">
      	<div class="form-group">
        <label for="sel1" style="font-size:36px;">Seleksi Item dengan Kondisi:</label><?php
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
            <select class="form-control" name="kolom" style="font-size:21px;" required>
                <option value="" >Pilih Filter</option>
                <option value="kditem1" <?php echo $kditem1; ?> >Id Item kiri</option>
                <option value="kditem2" <?php echo $kditem2; ?> >Id Item Kanan</option>
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
        <input type="text" name="kata_kunci" value="<?php echo $kata_kunci;?>" maxlength="4" class="form-control" style="font-size:24px;" required/>
    </div>
    <table>
   	<tr>
   	<td><div class="form-group">
        <input type="submit" class="btn btn-info" value="Pilih" style="font-size:24px;font-weight:bold;"></form></div></td><td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
    <td><div class="form-group">
        <form action="pola_2item.php" method="post">
        <input type="submit" name="reset" class="btn btn-info" value="Kembali"style="font-size:24px;font-weight:bold;background:orange;color:black;"></form></div></td>
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
                $result=mysqli_query($conn,"SELECT * FROM itemc2 WHERE id_toko='$idtoko' AND $kolom like '%".$kata_kunci."%' AND persen_support >='$nRule'");if (mysqli_num_rows($result)>0) {
            	echo "<center><b style='font-size:24px;'>Data diseleksi berdasarkan</b><H3 style='font-size:36px;'>ID Item Kiri (BR$kata_kunci)</H3>";?>
            	<form method="POST" action="seleksi_2item.php"><input type="submit" name="reset" value="Hapus Filter" style="font-size:24px;font-weight:bold;background:red;color:white;padding:10px;"></form></center><br><?php
            } else {
            	echo "<center><b style='font-size:36px;'>ID Item Kiri (BR$kata_kunci) kosong</b>";?>
            <form method="POST" action="seleksi_2item.php"><input type="submit" name="reset" value="Hapus Filter" style="font-size:24px;font-weight:bold;padding:10px;background:red;color:white;"></form></center>
            <?php
            }
            }else if ($_POST['kolom']=="kditem2"){
                $kolom="kditem2";
                $result=mysqli_query($conn,"SELECT * FROM itemc2 WHERE id_toko='$idtoko' AND $kolom like '%".$kata_kunci."%' AND persen_support >='$nRule'");if (mysqli_num_rows($result)>0) {
            	echo "<center><b style='font-size:24px;'>Data diseleksi berdasarkan</b><H3 style='font-size:36px;'> ID Item Kanan (BR$kata_kunci)</H3>";?>
            	<form method="POST" action="seleksi_2item.php"><input type="submit" name="reset" value="Hapus Filter" style="font-size:24px;font-weight:bold;background:red;color:white;padding:10px;"></form></center><br><?php
            } else {
            	echo "<center><b style='font-size:36px;'>ID Item Kanan (BR$kata_kunci) kosong</b>";?>
            <form method="POST" action="seleksi_2item.php"><input type="submit" name="reset" value="Hapus Filter" style="font-size:24px;font-weight:bold;padding:10px;background:red;color:white;"></form></center>
            <?php
            }
            }else {
                $kolom="persen_support";
                $result=mysqli_query($conn,"SELECT * FROM itemc2 WHERE id_toko='$idtoko' AND $kolom like '%".$kata_kunci."%' AND persen_support >='$nRule'");if (mysqli_num_rows($result)>0) {
            	echo "<center><b style='font-size:24px;'>Data diseleksi berdasarkan</b><H3 style='font-size:36px;'>Persentase Terjual $kata_kunci%</H3>";?>
            	<form method="POST" action="seleksi_2item.php"><input type="submit" name="reset" value="Hapus Filter" style="font-size:24px;font-weight:bold;background:red;color:white;padding:10px;"></form></center><br><?php
            } else {
            	echo "<center><b style='font-size:36px;'>Persentase Terjual $kata_kunci% kosong</b>";?>
            <form method="POST" action="seleksi_2item.php"><input type="submit" name="reset" value="Hapus Filter" style="font-size:24px;font-weight:bold;padding:10px;background:red;color:white;"></form></center>
            <?php
            }
            }
        }
        }else {
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
            $MerkItem2=mysqli_query($conn,"SELECT * FROM item WHERE id_toko='$idtoko' AND kditem='$C2kditem2' ");
            $DataMerkItem2=mysqli_fetch_array($MerkItem2,MYSQLI_ASSOC); ?><div class="circle_2itemkanan"><?php echo "<b style='visibility:hidden;'>[".$DataMerkItem2['kditem']."]"."<br><img src='../../gambar/produk/".$DataMerkItem2['gambar_item']."'><br>".$DataMerkItem2['merk'].",</b>";?></div></div> <?php
            $MerkItem2=mysqli_query($conn,"SELECT * FROM item WHERE id_toko='$idtoko' AND kditem='$C2kditem2' ");
            $DataMerkItem2=mysqli_fetch_array($MerkItem2,MYSQLI_ASSOC);?><div id="circle_2kiri_r"><div class="circle_2itemkiri_r"> <?php echo "[".$DataMerkItem2['kditem']."]"."<br><img src='../../gambar/produk/".$DataMerkItem2['gambar_item']."'><br>".$DataMerkItem2['merk'].",";?><br><br><br><hr></div><?php
            
            $MerkItem1=mysqli_query($conn,"SELECT * FROM item WHERE id_toko='$idtoko' AND kditem='$C2kditem1' ");
            $kditem=$C2kditem2;
            $query_T2=mysqli_query($conn,"SELECT * FROM transaksi WHERE id_toko='$idtoko' AND kditem='$kditem' ");
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

            $DataMerkItem1=mysqli_fetch_array($MerkItem1,MYSQLI_ASSOC);?><div class="circle_2itemkanan_r"> <?php echo "[".$DataMerkItem1['kditem']."]"."<br><img src='../../gambar/produk/".$DataMerkItem1['gambar_item']."'><br>".$DataMerkItem1['merk'].",";?> </div></div>
    <?php } ?>
    </body>
</html>