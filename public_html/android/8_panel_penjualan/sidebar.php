<?php 
session_start();
if (!empty($_SESSION['id'])) {
?>
<div id="left">
<div id="hightlight"><i class="fa fa-user-plus"></i> Our Recommendation</div>
<div class="kiri">
<?php 
$Qrek=mysqli_query($conn,"SELECT * FROM itemc2,item WHERE itemc2.id_toko=item.id_toko AND itemc2.id_toko='".$_GET['idtoko']."' AND item.kditem=itemc2.kditem1 AND itemc2.kditem1 = '".$_SESSION['id']."' AND itemc2.lift_ratio>=1 AND itemc2.kditem1!=itemc2.kditem2 GROUP BY itemc2.kditem2 ORDER BY itemc2.persen_support DESC");
if (mysqli_num_rows($Qrek)>0) {
while($Qrek_tk=mysqli_fetch_array($Qrek)){
    $rekomendasi_kd2=$Qrek_tk['kditem2'];
    $Qrek2=mysqli_query($conn,"SELECT * FROM itemc2,itemc1,item WHERE itemc2.id_toko=item.id_toko AND itemc2.id_toko=".$_GET['idtoko']." AND item.kditem=itemc2.kditem2 AND item.kditem=itemc1.kditem AND itemc2.kditem2 = '$rekomendasi_kd2' AND itemc2.lift_ratio>=1 AND itemc2.kditem1!=itemc2.kditem2 GROUP BY itemc2.kditem2 ORDER BY itemc1.persen_support DESC");
    while($Qrek_tk2=mysqli_fetch_array($Qrek2)){
    $merk_rek=$Qrek_tk2['merk'];
    $id_kat2=$Qrek_tk2['kditem2'];
    $gambar_rek=$Qrek_tk2['gambar_item'];
    $persen=$Qrek_tk2['persen_support'];
    $support=$Qrek_tk2['support_count'];
    echo"<a href=\"detail.php?idtoko=".$_GET['idtoko']."&id=".$id_kat2."\"><center><img src=\"../../gambar/produk/".$gambar_rek."\" width=90 height=65 style='border-radius:50%;'><br><H3 style='color:black;'>$merk_rek</H3><b style='color:red;'>$persen % Top Sales</b><br><b style='color:blue;'>Favorite by $support Peoples</b><hr></center></a>";}
	}
} else {
	echo"<center><H3>NO DATA'S FOUND</H3></center>";
} ?>
</div><br>

<div id="hightlight"><i class="fa fa-tasks"></i> Shop By Category</div>
<div class="kiri_kategori">
<?php
 //$idbarang = "SELECT id FROM php_shop_products WHERE id=".$_GET['id']"";
echo"<form method='post' action='list_barang.php'>";
$rcat=mysqli_query($conn,"SELECT nama_kategori FROM kategori WHERE id_toko='".$_GET['idtoko']."' GROUP BY nama_kategori ORDER BY id_kategori ASC");

    
while ($rowcat = @mysqli_fetch_array($rcat,MYSQLI_ASSOC)) {

      echo"<div id='kategori'>";
         echo"<ul id=''>";
           echo "<li><i class='fa fa-check-square'></i>
           <a href=\"index.php?idtoko=".$_GET['idtoko']."&category=".$rowcat['nama_kategori']."\">".$rowcat['nama_kategori']. " </a>";
           ?> </li>

<?php

         echo"</ul>";
       echo"</div>";
}
echo"</form>";
echo"</div>";
echo"<br>";
?>


<div id="hightlight"><i class="fa fa-facebook-square"></i>#Facebook</div>
<div class="kiri">
<iframe src="//www.facebook.com/plugins/likebox.php?href=https%3A%2F%2Fwww.facebook.com%2Fubudevents&amp;width&amp;width=370&amp;height=400&amp;colorscheme=light&amp;show_faces=true&amp;header=true&amp;stream=false&amp;show_border=false" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:240px; height:300px;" allowtransparency="true"></iframe>
</div><br><br>

</div>
<?php } else { $toko=mysqli_query($conn,"SELECT * FROM infotoko WHERE id_toko='".$_GET['idtoko']."'"); $ambil_nama_toko=mysqli_fetch_array($toko); ?>

<div id="left">
<div id="hightlight"><i class="fa fa-tasks"></i><?php echo $ambil_nama_toko['nama_toko']; ?> Category</div>
<div class="kiri_kategori">
<?php
 //$idbarang = "SELECT id FROM php_shop_products WHERE id=".$_GET['id']"";
echo"<form method='post' action='index.php'>";
$rcat=mysqli_query($conn,"SELECT * FROM kategori WHERE id_toko='".$_GET['idtoko']."' ORDER BY id_kategori");

    
while ($rowcat = @mysqli_fetch_array($rcat,MYSQLI_ASSOC)) {

      echo"<div id='kategori'>";
         echo"<ul id=''>";
           echo "<li><i class='fa fa-check-square'></i>
           <a href=\"index.php?idtoko=".$_GET['idtoko']."&category=".$rowcat['nama_kategori']."\">".$rowcat['nama_kategori']. " </a>";
           ?> </li>

<?php
         echo"</ul>";
       echo"</div>";
}
echo"</form>";
echo"</div>";
echo"<br>";
?>

<div id="hightlight2"><i class="fa fa-user-plus"></i> # <?php echo $ambil_nama_toko['nama_toko']; ?> Top Sales</div>
<div class="kiri">
<?php 
$Qrek=mysqli_query($conn,"SELECT * FROM itemc1,item WHERE itemc1.id_toko=item.id_toko AND itemc1.id_toko='".$_GET['idtoko']."' AND item.kditem=itemc1.kditem ORDER BY itemc1.support_count DESC LIMIT 5");
if (mysqli_num_rows($Qrek)>0) {
while($Qrek_tk=mysqli_fetch_array($Qrek)){
    $rekomendasi_kd2=$Qrek_tk['kditem'];
    $merk_rek=$Qrek_tk['merk'];
    $id_kat2=$Qrek_tk['kditem'];
    $gambar_rek=$Qrek_tk['gambar_item'];
    $persen=$Qrek_tk['persen_support'];
    $support=$Qrek_tk['support_count'];
    echo"<a href=\"detail.php?idtoko=".$_GET['idtoko']."&id=".$id_kat2."\"><center><img src=\"../../gambar/produk/".$gambar_rek."\" width=90 height=65 style='border-radius:50%;'><br><H3 style='color:black;'>$merk_rek</H3><b style='color:red;'>$persen % Top Sales</b><br><b style='color:blue;'>Favorite by $support Peoples</b><hr></center></a>";}
} else {
  echo"<center><H3>NO DATA'S FOUND</H3></center>";
} ?>
</div><br>


<div id="hightlight2"><i class="fa fa-facebook-square"></i>#Facebook</div>
<div class="kiri">
<iframe src="//www.facebook.com/plugins/likebox.php?href=https%3A%2F%2Fwww.facebook.com%2Fubudevents&amp;width&amp;width=370&amp;height=400&amp;colorscheme=light&amp;show_faces=true&amp;header=true&amp;stream=false&amp;show_border=false" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:240px; height:300px;" allowtransparency="true"></iframe>
</div><br><br>

</div>
<?php } ?>