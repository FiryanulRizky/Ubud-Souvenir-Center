<!DOCTYPE html>
<html>
<head>
    <title>Visualisasi 3 Item</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="./css/bootstrap.min.css">
</head>
<body style="background:#DFE6F0;">
<?php
ob_start();
include "../1_login_reg/login_reg.php";
ob_end_clean();
        //kosong tmp transaksi
    $strRule=mysqli_query($conn,"SELECT * FROM rule WHERE id_toko='$idtoko' AND kdrule='R3'");
        $dataRule=mysqli_fetch_array($strRule,MYSQLI_ASSOC); 
        $nRule=$dataRule['minsupport'];?>

        <div class="container"><form action="<?php $_SERVER["PHP_SELF"];?>" method="post"><div class="form-group"><div class="form-group">
        <label for="sel1"><h3 style="color: red;font-size:32px;">KODE MERAH</h3> <b style="font-size:24px;">(Penjualan Diatas 75%)</b></label><br>
        <label for="sel1" style="font-size:28px;">Lihat Item berdasarkan Pengurutan :</label> <?php
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
            ?>
            <select class="form-control" name="kolom" style="font-size:21px;" required>
                <option value="" >Pilih Sorting :</option>
                <option value="persen_support">Penjualan Teratas</option>
                <option value="support_count">Penjualan Terendah</option>
                <option value="">Seleksi dengan kondisi</option>
         </select>
        </div>
       <table>
        <tr>
        <td><div class="form-group">
            <input type="submit" class="btn btn-info" value="Pilih" style="font-size:24px;font-weight:bold;"></form></div></td><td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
        <td><div class="form-group">
            <form action="pola_3item.php" method="post">
            <input type="submit" name="reset" class="btn btn-info" value="Kembali" style="font-size:24px;font-weight:bold;background:orange;color:black;"></form></div></td>
        </tr>
    </table>
    </div>
    </div>
</form>
</div> 
<?php
        if (isset($_POST['kolom'])) {
            $result=trim($_POST['kolom']);
            if ($_POST['kolom']=="persen_support") {
                $result=mysqli_query($conn,"SELECT * FROM itemc3 WHERE id_toko='$idtoko' AND persen_support >='$nRule' ORDER BY persen_support DESC LIMIT 5");
                echo "<center><b style='font-size:24px;'>Data Diurutkan berdasarkan</b> <h3 style='font-size:36px;'><i>Top 5 penjualan tertinggi</i></h3>";
                ?>
                <form method="post" action=""><input type="submit" name="reset" value="Hapus Filter" style="font-size:24px;font-weight:bold;padding:10px;background:red;color:white;"></form></center><br><?php     
            }
            else if ($_POST['kolom']=="support_count") {
                $result=mysqli_query($conn,"SELECT * FROM itemc3 WHERE id_toko='$idtoko' AND persen_support >='$nRule' ORDER BY persen_support ASC LIMIT 5");
                echo "<center><b style='font-size:24px;'>Data Diurutkan berdasarkan</b> <h3 style='font-size:36px;'><i>Top 5 penjualan terendah</i></h3>";
                ?>
                <form method="post" action=""><input type="submit" name="reset" value="Hapus Filter" style="font-size:24px;font-weight:bold;padding:10px;background:red;color:white;"></form></center><br><?php
            } else{
                header("location:seleksi_itemmerah2_kondisi.php");
            }
        }

    else {
        
        $result=mysqli_query($conn,"SELECT * FROM itemc3 WHERE id_toko='$idtoko' AND persen_support >='$nRule'");
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
            
            if ($persensupport >= 75) { ?>
                <?php   $MerkItem1=mysqli_query($conn,"SELECT * FROM item WHERE id_toko='$idtoko' AND kditem='$C2kditem1' ");
            $DataMerkItem1=mysqli_fetch_array($MerkItem1,MYSQLI_ASSOC);?><div id="circle_3kiri"><div class="circle_3itemkiri"><?php echo "[".$DataMerkItem1['kditem']."]"."<br><img src='../../gambar/produk/".$DataMerkItem1['gambar_item']."'><br>".$DataMerkItem1['merk'].",";?></div> <?php
            $MerkItem2=mysqli_query($conn,"SELECT * FROM item WHERE id_toko='$idtoko' AND kditem='$C2kditem2' ");
            $DataMerkItem2=mysqli_fetch_array($MerkItem2,MYSQLI_ASSOC);?><div class="circle_3itemtengah"> <?php echo "[".$DataMerkItem2['kditem']."]"."<br><img src='../../gambar/produk/".$DataMerkItem2['gambar_item']."'><br>".$DataMerkItem2['merk'].",";
            ?></div><div class="circle_3dotkiri"><b>2 item terbeli, maka juga</b></div>
                <div class="circle_merah2"><H2>M</H2><?php echo "<h3>membeli $persensupport</h3>"?></div><?php 
                $MerkItem3=mysqli_query($conn,"SELECT * FROM item WHERE id_toko='$idtoko' AND kditem='$C2kditem3' ");
            $DataMerkItem3=mysqli_fetch_array($MerkItem3,MYSQLI_ASSOC);?><div class="circle_3itemkanan"> <?php echo "[".$DataMerkItem3['kditem']."]"."<br><img src='../../gambar/produk/".$DataMerkItem3['gambar_item']."'><br>".$DataMerkItem3['merk'].",";
                ?></div></div>
            <?php }
            
            $kditem=$C2kditem3;
            $query_T2=mysqli_query($conn,"SELECT * FROM transaksi WHERE id_toko='$idtoko' AND kditem='$kditem' ");
            $num_T2=mysqli_num_rows($query_T2);
            $support_count2=$rowC2['support_count'];
            $Confidence2=$support_count2/$num_T2*100; $persensupport2 = substr($Confidence2,0,5)."%";
            
            if ($persensupport2 >= 75) { ?><?php
                $MerkItem3=mysqli_query($conn,"SELECT * FROM item WHERE id_toko='$idtoko' AND kditem='$C2kditem3' ");
            $DataMerkItem3=mysqli_fetch_array($MerkItem3,MYSQLI_ASSOC);?> <div id="circle_3kiri"><div class="circle_3itemkiri"><?php echo "[".$DataMerkItem3['kditem']."]"."<br><img src='../../gambar/produk/".$DataMerkItem3['gambar_item']."'><br>".$DataMerkItem3['merk'].",";?></div> <?php
            $MerkItem2=mysqli_query($conn,"SELECT * FROM item WHERE id_toko='$idtoko' AND kditem='$C2kditem2' ");
            $DataMerkItem2=mysqli_fetch_array($MerkItem2,MYSQLI_ASSOC);?><div class="circle_3itemtengah"> <?php echo "[".$DataMerkItem2['kditem']."]"."<br><img src='../../gambar/produk/".$DataMerkItem2['gambar_item']."' width='95' height='80'><br>".$DataMerkItem2['merk'].",";?></div>
                <div class="circle_merah"><H2>M</H2><?php echo "<h3>membeli $persensupport2</h3>"?></div>
                <?php 
                $MerkItem1=mysqli_query($conn,"SELECT * FROM item WHERE id_toko='$idtoko' AND kditem='$C2kditem1' ");
            $DataMerkItem1=mysqli_fetch_array($MerkItem1,MYSQLI_ASSOC);?><div class="circle_3itemkanan"> <?php echo "[".$DataMerkItem1['kditem']."]"."<br><img src='../../gambar/produk/".$DataMerkItem1['gambar_item']."'><br>".$DataMerkItem1['merk'].",";
                ?></div><div class="circle_3dotkiri2"><b>2 item terbeli, maka juga</b></div></div>
                <?php
            }
            
    } ?>
    </body>
</html>