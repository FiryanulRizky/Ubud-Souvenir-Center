<?php 
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
?>
<link rel="stylesheet" type="text/css" href="../../css/style_admin.css">
<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
<?php
// *** LOAD ADMIN PAGE HEADER
include "../../db/koneksi.php";

if (!empty($_GET['id'])){
echo'<br><center><h2><form method="post" enctype="multipart/form-data"><input type="submit" value="HAPUS SEMUA POLA 2 ITEM" class="btn_submit"><input type="hidden" name="act" value="delete" ></form></h2></center><br>';
$idtoko=$_GET['id'];
$pola=mysqli_query($conn,"SELECT * FROM infotoko WHERE id_toko='$idtoko'");
$ambil_pola=mysqli_fetch_array($pola);
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
<table border=1 style="border-color:#399;width:100%;">
<tr style="background-color: lightgrey;text-align: center;">
  <td colspan="6"><H3>Pola Penjualan 2 Itemset <?php echo $nama_toko.' (KDTK'.$idtoko.')'; ?></H3></td>
  </tr>
<tr style="background-color: lightgrey;text-align: center;font-weight: bold;">
            <td>No.</td>
            <td>Aturan Final yang didapat</td>
            <td colspan="2">Confidence</td>
            <td>Lift Ratio</td>
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
            <td><?php
            //mencari nilai confidence
            $kditem=$C2kditem1;
            $query_T=mysqli_query($conn,"SELECT * FROM transaksi WHERE id_toko='$idtoko' AND kditem='$kditem' ");
            $num_T=mysqli_num_rows($query_T);
            $supp1=$rowC2['support_count'];
             $cetak1 = $rowC2['support_count']."/".$num_T;
            if($num_T!=0) {
            echo $cetak1;

            ?></td>
            <td><?php
            $support_count=$rowC2['support_count'];
            $Conf1=$support_count/$num_T;
            $Confidence=$support_count/$num_T*100; echo substr($Confidence,0,5)."%";
            echo"</td><td>";
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
            echo"</td><td>";
            echo $rowC2['lift_ratio'];
            }
            ?></td>
    </tr>
        <?php } } }
    ?>
</table>
</div>

<?php }

if ($_POST['act']=="delete"){
    $hapus_pola2=mysqli_query($conn,"DELETE FROM itemc2 WHERE id_toko='".$_GET['id']."'");
    echo'<script>alert("Anda berhasil menghapus Pola Penjualan 2 Item '.$namatoko.'");top.document.location.href="hapus_toko.php?id='.$_GET['id'].'";</script>';
}   
?>
<div class="cleared"></div>