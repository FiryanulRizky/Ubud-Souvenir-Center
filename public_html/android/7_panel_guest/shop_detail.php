<html>
    <head>
        <title>Shop Detail</title>
        <link rel="shortcut icon" type="image/x-icon" href="../../gambar/images/head_logo.ico" />
    </head>
    <body>
<?php
// *** LOAD PAGE HEADER
include "../1_login_reg/header_detail_shop.php";
include"sidebar_index.php";

mysqli_query($conn,"UPDATE infotoko SET visitors = visitors + 1  WHERE id_toko='".$_GET['idtoko']."'");

// QUERY TABLE php_shop_products n record per page
//echo $sql;
$result = mysqli_query($conn,"SELECT * FROM infotoko WHERE id_toko='".$_GET['idtoko']."'");

    // *** DISPLAY TABLE PRODUCTS
echo '<div id=bgproduct_detail>';

    while ($row = mysqli_fetch_array($result,MYSQLI_ASSOC))
        {

echo'<div id="detail">';
 echo"<table><tr><td><a href='index.php?halaman_toko=1'><i class='fa fa-home'></i> Shop List</a> &raquo; <a href=\"shop_detail.php?idtoko=".$_GET['idtoko']."\" class=\"tbeli\">Shop Detail</a> &raquo; KDTK".$row['id_toko']." &raquo; ".$row['nama_toko']."</table></td></tr>";
   
echo"</div>";  
     
echo"<table id='desc_singkat'>";
	 echo"<tr><td><h1> ".$row['nama_toko']."</h></td></tr>";
     echo"<tr><td>&raquo; Shop Code: KDTK".$row['id_toko']."</td></tr>";
	 echo"<tr><td>&raquo; Owner: ".$row['pemilik']."</td></tr>";
     $cekstok="SELECT SUM(stok) AS total_stok FROM item WHERE id_toko='".$row['id_toko']."'";
     $hasil_stok=mysqli_query($conn,$cekstok);
     $tampil_stok=mysqli_fetch_array($hasil_stok,MYSQLI_ASSOC);
     echo"<tr><td>&raquo; Total Products : "; echo number_format($tampil_stok['total_stok']);echo"</td></tr>";
     $getqr=mysqli_query($conn,"SELECT qrImg FROM qrcodes WHERE id_toko='".$row['id_toko']."' ORDER BY id DESC LIMIT 1");
    if (mysqli_num_rows($getqr)>0) {
    $qr=mysqli_fetch_array($getqr,MYSQLI_ASSOC);
      echo'<tr><td align="center">';
      echo"<br><br><H3>Scan this QR to Visit Shop</H3>";
        echo"".$gambar."<a href=\"../../generator_qrcode/userQr/".$qr['qrImg']."\" target='_blank'>
        <img src=\"../../generator_qrcode/userQr/".$qr['qrImg']."\" width=150 height=150  align=center border=0 ></a><br><b>Or Click Link Below the Description<b>";
        echo'</td></tr>';
      }
	 echo"</table>";	
echo'<table>';   
     echo"<td><img src=\"../../gambar/toko/".$row['gambar_toko']."\" width='320px' height='320px' align=center border=1px";	 
     echo"</td>";	
     echo"</tr>";    
echo"</table>";
echo"<div id='detail2'>";
echo"<table id='tabledetail'>";
echo"<div id='hightlight'><i class='fa fa-tasks'></i>Shop History</div>";
     echo"<tr>";
     echo"<td></td>";
     echo"<td class='desc_long'>".$row['deskripsi']."</td>";
     echo"</tr>";
echo"</table>";
echo"<br>";
echo "<a href=\"../8_panel_penjualan/index.php?&idtoko=".$row['id_toko']."&halaman_toko=1\" class=\"tambah\"><span><input type='button' value='VISIT SHOP' class='btn4'></span></a><br><br><a href=\"index.php?clear=y\" class=\"tambah\"><span><input type='button' value='BACK TO SHOP LIST' style='background-color:orange;' class='btn4'></span></a></div>";
}

//include"produk_terkait.php";
echo '</div>';
echo '<div class="cleared"></div>';

// *** LOAD PAGE FOOTER
include "../../header_session/footer.php";

?>
</body>
</html>
