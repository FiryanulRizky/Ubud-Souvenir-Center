<?php 
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
?>
<link rel="stylesheet" type="text/css" href="../../css/style_admin.css">
<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
<?php
// *** LOAD ADMIN PAGE HEADER
include "../../db/koneksi.php";
if (!empty($_GET['id'])){
echo'<br><center><h2><form method="post" enctype="multipart/form-data"><input type="submit" value="HAPUS SEMUA DATA ITEM" class="btn_submit"><input type="hidden" name="act" value="delete" ></form></h2></center><br>';
$idtoko=$_GET['id'];
$pola=mysqli_query($conn,"SELECT * FROM infotoko WHERE id_toko='$idtoko'");
$ambil_pola=mysqli_fetch_array($pola);
    $nama_toko=$ambil_pola['nama_toko'];
    $no="";
    $no1="";
    $QuerySumItemC1=mysqli_query($conn,"SELECT * FROM itemc1 WHERE id_toko ='$idtoko' ORDER BY kditem ASC");
  $SumItemC1=mysqli_num_rows($QuerySumItemC1);
  if ($SumItemC1>0) {
    echo'<table border="1" align="left" cellpadding="0" cellspacing="2" style="width:100%;">
<tr style="background-color:lightgrey;text-align:center;">
  <td colspan="5"><H3>Hapus Data Item '.$nama_toko.' (KDTK'.$idtoko.')</H3>'; ?>
  </td>
  </tr>
<tr style="background-color:lightgrey;text-align:center;font-weight: bold;">
            <td>KD Item</td>
            <td>Itemset</td>
            <td>Support %</td>
        </tr>
    <?php
    //kosongkan tabel itemc1
    $EmptiItemc1=mysqli_query($conn,"DELETE FROM itemc1 WHERE id_toko ='$idtoko' ORDER BY kditem ASC");
    //#end kosong
    $qryTotalItem1 = mysqli_query($conn,"SELECT * FROM transaksi WHERE id_toko ='$idtoko' GROUP BY kdtransaksi ORDER BY kdtransaksi ASC");
        $SumTotalItem1=mysqli_num_rows($qryTotalItem1);

            $result=mysqli_query($conn,"SELECT * FROM transaksi,item WHERE transaksi.kditem=item.kditem AND transaksi.id_toko=item.id_toko AND transaksi.id_toko='$idtoko' GROUP BY transaksi.kditem ORDER BY item.id_item ASC");
        
        while($row = mysqli_fetch_array($result,MYSQLI_ASSOC))
        {
        ?>
        <tr>
            <td style="text-align: center;"><?php echo $row['kditem'];?></td>
            <td><?php echo $row['merk'];?></td>
            <td style="text-align: center;"><?php

        $kditem=$row['kditem'];
    $queryItem1=mysqli_query($conn,"SELECT * FROM transaksi WHERE kditem='$kditem' AND id_toko='$idtoko'");
    $countItem1=mysqli_num_rows($queryItem1);
    //echo $countItem1 ."/" .$SumTotalItem1;
    $PersentItem1=$countItem1/$SumTotalItem1*100; echo substr($PersentItem1,0,5) ."%";
    $queryItemC1=mysqli_query($conn,"INSERT INTO itemc1 (id_toko,kditem,support_count,persen_support)VALUES('$idtoko','$kditem','$countItem1','$PersentItem1')");
     ?></td>
        </tr>
 
        <?php } ?>
</table>

<?php } }

if ($_POST['act']=="delete"){
    $hapus_pola1=mysqli_query($conn,"DELETE FROM itemc1 WHERE id_toko='".$_GET['id']."'");
    $hapus_rule=mysqli_query($conn,"DELETE FROM rule WHERE id_toko='".$_GET['id']."'");
    echo'<script>alert("Anda berhasil menghapus data Item '.$namatoko.'");top.document.location.href="hapus_toko.php?id='.$_GET['id'].'";</script>';
}   
?>
<div class="cleared"></div>