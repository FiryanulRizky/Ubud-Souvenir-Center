<html>
    <head>
        <title><?php include"../../db/koneksi.php"; $toko=mysqli_query($conn,"SELECT * FROM infotoko WHERE id_toko='".$_GET['idtoko']."'"); $ambil_data_toko=mysqli_fetch_array($toko); $nama_toko=$ambil_data_toko['nama_toko']; echo $nama_toko." Product Detail"; ?></title>
        <link rel="shortcut icon" type="image/x-icon" href="../../gambar/images/head_logo.ico" />
    </head>
<body>
<?php
// *** LOAD PAGE HEADER
include "../1_login_reg/header_penjualan.php";
include"sidebar.php";

mysqli_query($conn,"UPDATE item SET views = views + 1  WHERE id_toko='".$_GET['idtoko']."' AND kditem='".$_GET['id']."'");

// QUERY TABLE php_shop_products n record per page
//echo $sql;
$result = mysqli_query($conn,"SELECT * FROM item WHERE id_toko='".$_GET['idtoko']."' AND kditem='".$_GET['id']."'");



    // *** DISPLAY TABLE PRODUCTS
echo '<div id=bgproduct_detail>';

    while ($row = mysqli_fetch_array($result,MYSQLI_ASSOC))
        {


echo'<div id="detail">';
 echo"<table><tr><td><a href=\"index.php?idtoko=".$_GET['idtoko']."\"><i class='fa fa-home'></i> Home</a>";unset($_SESSION['scari']);unset($_SESSION['scategory']); echo" &raquo; <a href=\"detail.php?idtoko=".$_GET['idtoko']."&id=".$row['kditem']."\" class=\"tbeli\">Detail Produk</a> &raquo; ".$row['jenis']." &raquo; ".$row['merk']."</table></td></tr>";
   
echo"</div>";  
     
echo"<table id='desc_singkat'>";
	 echo"<tr><td><h1> ".$row['merk']."</h></td></tr>";
     echo"<tr><td>&raquo; Kode Barang: BR".$row['kditem']."</td></tr>";
	 echo"<tr><td>&raquo; Kategori: ".$row['jenis']."</td></tr>";
	 echo"<tr><td><h1>".format_currency($row['harga'])."</h1></td></tr>";
	 echo"</table>";	
echo'<table>';   
     echo"<td >".$gambar."<a href=\"../../gambar/produk/".$row['gambar_item']."\" >
     <img src=\"../../gambar/produk/".$row['gambar_item']."\" width='400px' height='400px' align=center border=1px </a>";	 
     echo"</td>";	
     echo"</tr>";    
echo"</table>";

 

echo"<div id='detail2'>";

echo"<table id='tabledetail'>";
echo"<div id='hightlight'><i class='fa fa-tasks'></i>Detail</div>";
     echo"<tr>";
     echo"<td></td>";
     echo"<td class='desc_long'>".$row['deskripsi']."</td>";
     echo"</tr>";
echo"</table>";
echo"<br>";
echo "<a href=\"checkout_fisrt.php?action=add&idtoko=".$_GET['idtoko']."&id=".$row['kditem']."\" class=\"tambah\"><span><input type='button' value='ADD TO CART' class='btn4'></span></a>";
echo"</div>";
}

//include"produk_terkait.php";
echo '</div>';




echo '<div class="cleared"></div>';

// *** LOAD PAGE FOOTER
include "../../header_session/footer.php";

?>
</body>
</html>


