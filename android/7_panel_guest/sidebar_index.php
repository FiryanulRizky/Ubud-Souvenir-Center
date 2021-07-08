
<div id="left">
<div id="hightlight"><i class="fa fa-tasks"></i> Shop By Category</div>
<div class="kiri_kategori">
<?php
echo"<form method='post' action='home.php'>";
$rcat=mysqli_query($conn,"SELECT * FROM kategori,infotoko WHERE kategori.id_toko=infotoko.id_toko GROUP BY kategori.nama_kategori ORDER BY kategori.id_kategori ASC");

    
while ($rowcat = @mysqli_fetch_array($rcat,MYSQLI_ASSOC)) {

      echo"<div id='kategori'>";
         echo"<ul id=''>";
           echo "<li><i class='fa fa-check-square'></i>
           <a href=\"index.php?kategori=".$rowcat['nama_kategori']."\">".$rowcat['nama_kategori']. " </a>";
           ?> </li>

<?php

         echo"</ul>";
       echo"</div>";
}
echo"</form>";
echo"</div>";
echo"<br>";
?>



<div id="hightlight2"><i class="fa fa-user-plus"></i> #Top Sales</div>
<div class="kiri">
<?php 
$Qrek=mysqli_query($conn,"SELECT * FROM itemc1,item,infotoko WHERE item.kditem=itemc1.kditem AND itemc1.id_toko=infotoko.id_toko AND itemc1.id_toko=item.id_toko ORDER BY itemc1.support_count DESC LIMIT 5");
if (mysqli_num_rows($Qrek)>0) {
while($Qrek_tk=mysqli_fetch_array($Qrek)){
    $merk_rek=$Qrek_tk['merk'];
    $idtoko=$Qrek_tk['id_toko'];
    $gambar_rek=$Qrek_tk['gambar_item'];
    $persen=$Qrek_tk['persen_support'];
    $support=$Qrek_tk['support_count'];
    echo"<a href=\"index.php?idtoko=".$idtoko."\"><center><img src=\"../../gambar/produk/".$gambar_rek."\" width=90 height=65 style='border-radius:50%;'><br><H3 style='color:black;'>$merk_rek</H3><b style='color:red;'>$persen % Top Sales</b><br><b style='color:blue;'>Favorite by $support Peoples</b><hr></center></a>";}
} else {
  echo"<center><H3>NO DATA'S FOUND</H3></center>";
} ?>
</div><br>


<div id="hightlight2"><i class="fa fa-facebook-square"></i>#Facebook</div>
<div class="kiri">
<iframe src="//www.facebook.com/plugins/likebox.php?href=https%3A%2F%2Fwww.facebook.com%2Fubudevents&amp;width&amp;width=370&amp;height=400&amp;colorscheme=light&amp;show_faces=true&amp;header=true&amp;stream=false&amp;show_border=false" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:240px; height:300px;" allowtransparency="true"></iframe>
</div><br><br>

</div>