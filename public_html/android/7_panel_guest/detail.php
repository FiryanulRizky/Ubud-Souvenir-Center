<html>
    <head>
        <title>Product Detail</title>
        <link rel="shortcut icon" type="image/x-icon" href="../../gambar/images/head_logo.ico" />
        <link href="../css/style_guest.css" rel="stylesheet" type="text/css" media="screen" />
        <link rel="stylesheet" href="../css/style_admin.css">
    </head>
    <body>
<?php
// *** LOAD PAGE HEADER
include "../1_login_reg/header_guest_home.php";
include"sidebar_home.php";

mysqli_query($conn,"UPDATE item SET views = views + 1  WHERE kditem='".$_GET['id']."' AND id_toko='".$_GET['idtoko']."'");

// QUERY TABLE php_shop_products n record per page
//echo $sql;
$result = mysqli_query($conn,"SELECT * FROM item WHERE kditem='".$_GET['id']."' AND id_toko='".$_GET['idtoko']."'");



    // *** DISPLAY TABLE PRODUCTS
echo '<div id=bgproduct_detail>';

    while ($row = mysqli_fetch_array($result,MYSQLI_ASSOC))
        {


echo'<div id="detail">';
 echo"<table><tr><td><a href='../../index.php?halaman_produk=1'><i class='fa fa-home'></i> Home</a> &raquo; Product Detail &raquo; ".$row['jenis']." &raquo; ".$row['merk']."</table></td></tr>";
   
echo"</div>";  
$cektoko=mysqli_query($conn,"SELECT * FROM infotoko,item WHERE item.id_toko=infotoko.id_toko AND item.merk='".$_GET['merk']."' ORDER BY item.id_item ASC");
echo"<table id='desc_singkat'>";
echo"<tr><td rowspan='5'>".$gambar."
     <img src=\"../../gambar/produk/".$row['gambar_item']."\" width='400px' height='400px' align=center border=1px";   
     echo"</td><td rowspan='5'>&nbsp;&nbsp;&nbsp;&nbsp;</td>";
	 echo"<td><h1> ".$row['merk']."</h></td></tr>";
	 echo"<tr><td>&raquo; Product ID : ";
	 while($toko=mysqli_fetch_array($cektoko,MYSQLI_ASSOC)) {
	    echo"BR".$toko['kditem'].", "; }
	 echo"</td></tr><tr><td>&raquo; Kategori: ".$row['jenis']."</td></tr>";
	 $cektoko=mysqli_query($conn,"SELECT * FROM infotoko,item WHERE item.id_toko=infotoko.id_toko AND item.merk='".$_GET['merk']."' ORDER BY item.id_item ASC");
     echo"<tr><td>&raquo; Available in:";
     while($toko=mysqli_fetch_array($cektoko,MYSQLI_ASSOC)) {
      echo "<a href=\"status_toko.php?idtoko=".$toko['id_toko']."&id=".$toko['kditem']."&merk=".$toko['merk']."\">".$toko['nama_toko']." (stock : ".$toko['stok']."), </a>";
        }
      echo"</td></tr>";
     $getqr=mysqli_query($conn,"SELECT * FROM qrcodes,infotoko,item WHERE qrcodes.id_toko=infotoko.id_toko AND qrcodes.id_toko=item.id_toko AND qrcodes.qrUsername=item.merk AND qrcodes.qrUsername='".$_GET['merk']."'");
    if (mysqli_num_rows($getqr)>0) {
    while($qr=mysqli_fetch_array($getqr,MYSQLI_ASSOC)) {
      echo'<tr align="center" style="float:left; padding-right:25px;"><td>';
      echo"<br><br><H3>Visit ".$qr['nama_toko']."<br>".format_currency($qr['harga'])."</H3>";
        if ($qr['status']!="Active") {
        echo"".$gambar."<a href=\"status_toko.php?idtoko=".$qr['id_toko']."&id=".$qr['kditem']."&merk=".$qr['merk']."\">
        <img src=\"../../generator_qrcode/userQr/".$qr['qrImg']."\" width=130 height=130  align=center border=0 ></a><br><b>Click QR Img to Visit</a><b>";
      } else {
        echo"".$gambar."<a href=\"../8_panel_penjualan/detail.php?idtoko=".$qr['id_toko']."&id=".$qr['kditem']."\">
        <img src=\"../../generator_qrcode/userQr/".$qr['qrImg']."\" width=130 height=130  align=center border=0 ></a><br><b>Click QR Img to Visit</a><b>"; } }
        echo'</td></tr>';
      }
   echo"</table>";
 

echo"<div id='detail2'>";

echo"<table id='tabledetail'>";
echo"<div id='hightlight'><i class='fa fa-tasks'></i> Product Description</div>";
     $getdesc=mysqli_query($conn,"SELECT * FROM qrcodes,infotoko,item WHERE qrcodes.id_toko=infotoko.id_toko AND qrcodes.id_toko=item.id_toko AND qrcodes.qrUsername=item.merk AND qrcodes.qrUsername='".$_GET['merk']."'");
while($desc=mysqli_fetch_array($getdesc)){
     echo"<tr><td><br></td></tr><tr>";
     echo"<td class='desc_long'>".$desc['nama_toko']." ".$desc['deskripsi']."</td></tr>";
     if(mysqli_num_rows($getdesc)>1) {echo"<tr><td><br></td></tr><tr><td><a href=\"status_toko.php?idtoko=".$desc['id_toko']."&id=".$desc['kditem']."&merk=".$desc['merk']."\" class=\"tambah\"><span><input type='button' value='Visit ".$desc['nama_toko']." To Buy' class='btn4'></span></a></td></tr><tr><td><br><hr></td></tr>";}}
echo"</table>";
$cek_nama_duplikat=mysqli_query($conn,"SELECT * FROM item WHERE merk='".$_GET['merk']."'");
$merk_duplikat=mysqli_fetch_array($cek_nama_duplikat);
if (mysqli_num_rows($cek_nama_duplikat)==1) 
{
  if ($qr['status']!="Active") {   
  echo "".$merk_duplikat['deskripsi']."<br><a href=\"status_toko.php?idtoko=".$merk_duplikat['id_toko']."&id=".$merk_duplikat['kditem']."&merk=".$merk_duplikat['merk']."\" class=\"tambah\"><span><input type='button' value='VISIT SHOP TO BUY' class='btn4'></span></a><br><br>";
      } else {
  echo "".$merk_duplikat['deskripsi']."<br><a href=\"../8_panel_penjualan/index.php?&idtoko=".$merk_duplikat['id_toko']."&halaman_produk=1\" class=\"tambah\"><span><input type='button' value='VISIT SHOP TO BUY' class='btn4'></span></a><br><br>";}
}
echo "<a href=\"../../index.php?halaman_produk=1&clear=y\" class=\"tambah\"><span><input type='button' value='BACK TO MENU' style='background-color:orange;' class='btn4'></span></a></div>";
}
echo '</div>';
echo '<div class="cleared"></div>';

// *** LOAD PAGE FOOTER
include "../header_session/footer.php";

?>
</body>
</html>
