<html>
    <head>
        <title>Shop List</title>
        <link rel="shortcut icon" type="image/x-icon" href="../../gambar/images/head_logo.ico" />
        <link rel="stylesheet" type="text/css" href="../css/style_guest.css">
    </head>
    <body>
<?php
// *** LOAD PAGE HEADER
include "../1_login_reg/header_guest_index.php";
include"sidebar_index.php";

// *** MENGHAPUS SESSION SEARCH / RESETING
if ($_POST['clear']=="y"){ unset($_SESSION['scari']); unset($_SESSION['scategory']);
unset($_POST['cari']); unset($_POST['category']);}
if ($_GET['clear']=="y"){ unset($_SESSION['scari']); unset($_SESSION['scategory']);
}

// ***  DEKLARASI VARIABLE
if (!empty($_GET['halaman_toko'])) $_SESSION['halaman_toko']=$_GET['halaman_toko'];
if (!empty($_SESSION['halaman_toko'])) $_GET['halaman_toko']=$_SESSION['halaman_toko'];
if (!empty($_POST['category'])) $_SESSION['scategory']=$_POST['category'];
if (!empty($_GET['category'])) $_SESSION['scategory']=$_GET['category'];
if (!empty($_POST['cari'])) $_SESSION['scari']=$_POST['cari'];

// *** DEFAULT VARIABLE SETTING
$line_cost=0; // *** CART - SUBTOTAL COST
$total_cost=0; // *** CART - TOTAL COST
$line_quantity=0; // *** CART - SUBTOTAL QUANTITY
$total_quantity=0; // *** CART - TOTAL QUANTITY

// *** QUERY SEARCH
$qry_0 = "SELECT id_toko,nama_toko FROM infotoko ";
$qry_t.="WHERE nama_toko LIKE '%".$_SESSION['scari']."%' OR";
$qry_t.="(pemilik LIKE '%".$_SESSION['scari']."%')";
$qry_1 = "SELECT id_toko FROM infotoko ";
$qry_t2.="WHERE id_toko='".$_GET['idtoko']."'";
$qry_2 = "SELECT kategori.nama_kategori,infotoko.id_toko FROM kategori,infotoko ";
$qry_t3.="WHERE kategori.id_toko=infotoko.id_toko AND  kategori.nama_kategori='".$_GET['kategori']."'";
$qry_t4.="WHERE item .id_toko=infotoko.id_toko AND  item.merk='".$_GET['merk']."'";


$rowperpage=4; // *** TAMPIL NUM RECORD PER PAGE

// ** predefine record number
if (!empty($_GET['halaman_toko'])) $recno=($_GET['halaman_toko']-1)*$rowperpage; else $recno=0;

// QUERY TABLE infotoko dan record per halaman
if (!empty($_GET['idtoko'])) {
  $result = mysqli_query($conn,"SELECT * FROM infotoko ".$qry_t2." ORDER BY visitors DESC LIMIT $recno,$rowperpage");
} elseif (!empty($_GET['kategori'])) {
  $result = mysqli_query($conn,"SELECT * FROM kategori,infotoko ".$qry_t3." GROUP BY infotoko.nama_toko ORDER BY infotoko.visitors DESC LIMIT $recno,$rowperpage");
} elseif (!empty($_GET['merk'])) {
  $result = mysqli_query($conn,"SELECT * FROM item,infotoko ".$qry_t4." ORDER BY infotoko.visitors DESC LIMIT $recno,$rowperpage"); 
} else {
$result = mysqli_query($conn,"SELECT * FROM infotoko ".$qry_t." ORDER BY visitors DESC LIMIT $recno,$rowperpage");}
$rec = mysqli_query($conn,"SELECT * FROM infotoko ".$qry_t."");
$total_rec = @mysqli_num_rows($rec);
$no=0;

if ($total_rec>0){ // ** JIKA ADA DATA RECORD 

    // ** PAGING NAVIGATION
    if ($total_rec>$rowperpage){ // *** JIKA TOTAL RECORD LEBIH BESAR RECORD PER PAGE => TAMPIL PAGE
    $paging_html.= '<div id="paging">';
    if (empty($_GET['halaman_toko'])) $_GET['halaman_toko']=1; // ** SET DEFAULT PAGE = 1
    // *** PREV RECORD LINK
    if ($_GET['halaman_toko']>1) $paging_html.= '<a href="'.$_SERVER['PHP_SELF'].'?halaman_toko='.($_GET['halaman_toko']-1).'">&laquo;prev</a>';
    // *** PAGING NUMBERS LINK
    for ($i=1; $i< ceil($total_rec/$rowperpage); $i++){
        $paging_html.= '<a href="'.$_SERVER['PHP_SELF'].'?halaman_toko='.$i.'"';
        if ($_GET['halaman_toko']==$i) $paging_html.= ' class="paging_cur" ';
        $paging_html.= '>'.$i.'</a>';
    }
    // *** NEXT RECORD LINK
    if ($_GET['halaman_toko']< ceil($total_rec/$rowperpage)-1) $paging_html.= '<a href="'.$_SERVER['PHP_SELF'].'?halaman_toko='.($_GET['halaman_toko']+1).'">next&raquo;</a> ';
    $paging_html.= '</div><!-- id="paging" -->';
    } // *** end if ($total_rec>$rowperpage)

?>

<div id="bgproduct">
<?php 
$kategori = $_GET['kategori'];
$merk = $_GET['merk'];
if (!empty($_GET['kategori'])) {
    ?>
    <div id="hightlight2"><center><i class="fa fa-tasks"></i> <H3>Filter Category <?php echo $kategori; ?></H3> <br><a href="index.php?clear=y">>>Delete Category<<</a> <i class="fa fa-tasks"></i></center></div>
    <?php
} elseif($_SESSION['scari']) { 
    echo '<div id="hightlight2"><center><i class="fa fa-tasks"></i> <H3>Filter by Search : '.$_SESSION['scari'].' </H3> <br><a href="index.php?clear=y">>>Delete Filter By Search<<</a> <i class="fa fa-tasks"></i></center></div>';
} elseif(!empty($merk)) {
    ?>
    <div id="hightlight2"><center><i class="fa fa-tasks"></i> <H3>Shop by Selling  <?php echo $merk; ?></H3> <br><a href="index.php?clear=y">>>Delete Filter<<</a> <i class="fa fa-tasks"></i></center></div>
    <?php
} else {
?>
<div id="hightlight2"><center><i class="fa fa-tasks"></i> <H3>All Shop List</H3> <br><a href="../../index.php?clear=y">>>Chek All Products<<</a> <i class="fa fa-tasks"></i></center></div>
<?php }
    while ($row = mysqli_fetch_array($result,MYSQLI_ASSOC))
        {
        $status_toko=$row['status'];
        $status_detail=$row['info_status'];
        echo "<a href=\"shop_detail.php?idtoko=".$row['id_toko']."\" class=\"tbeli\">";
		 
        echo'<div class="shop">';		  
        echo'<table>';
		
		 echo'<tr><td class="nama_barang" align="center">';
         echo""."<H1>".$row['nama_toko']."</H1>"."";
         echo'</td></tr>';
    $getqr=mysqli_query($conn,"SELECT qrImg FROM qrcodes WHERE id_toko='".$row['id_toko']."' AND status='toko' ORDER BY id DESC LIMIT 1");
    if (mysqli_num_rows($getqr)>0) {
    $qr=mysqli_fetch_array($getqr,MYSQLI_ASSOC);
      echo'<tr><td align="center">';
        echo"".$gambar."<img src=\"../../generator_qrcode/userQr/".$qr['qrImg']."\" width=100 height=100  align=center border=0 >";
        echo'</td></tr>';
      }
      
      echo'<tr><td>';
      if ($status_toko=="Closed") {
        if ($status_detail=="") {
            echo"<center><input type='submit' value='".$status_toko."' name='awal' style='background:orange; padding:5px; font-size:15px;width:100%; '></center><br>";
        } else {
        echo"<center><input type='submit' value='".$status_toko." ".$status_detail."' name='awal' style='background:orange; padding:5px; font-size:15px;width:100%; '></center><br>";
        }
    } elseif ($status_toko=="Active") {
        if ($status_detail=="") {
            echo"<center><input type='submit' value='".$status_toko."' name='awal' style='background:lightgreen; padding:5px;font-size:15px;width:100%;'></center><br>";
        } else {
        echo"<center><input type='submit' value='".$status_toko." ".$status_detail."' name='awal' style='background:lightgreen; padding:5px; font-size:15px;width:100%;'></center><br>";
        }
    } else {
        echo"<center><input type='submit' value='This Shop Currently Non-Active' name='awal' style='background:black;color:white; padding:5px; font-size:15px;width:100%;'></center><br>";
    } 
      echo'</td></tr>';

        echo'<tr><td>';
        echo"".$gambar."<img src=\"../../gambar/toko/".$row['gambar_toko']."\" width=320 height=204  align=center border=0 >";
        echo'</td></tr><tr><td><br></td></tr>';
            
          echo'<tr><td class="harga_barang">';
          echo"<H3>Owner : ".$row['pemilik']."";
          echo'</td></tr><tr><td><br></td></tr>';
          $cekstok="SELECT SUM(stok) AS total_stok FROM item WHERE id_toko='".$row['id_toko']."'";
      $item=mysqli_query($conn,"SELECT * FROM item WHERE id_toko='".$row['id_toko']."'");
      $distinct=mysqli_num_rows($item);
     $hasil_stok=mysqli_query($conn,$cekstok);
     $tampil_stok=mysqli_fetch_array($hasil_stok,MYSQLI_ASSOC);
     echo"<tr><td><H3 style='color:black;'>Have ".$distinct." Unique Products, Total Stocks : "; echo number_format($tampil_stok['total_stok']);echo"</td></tr>";
          echo'</H3></td></tr><tr><td><br></td></tr>';
          echo'<tr><td class="harga_barang">';

      $cek_populer=mysqli_query($conn,"SELECT * FROM itemc1 WHERE id_toko='".$row['id_toko']."'");
      if(mysqli_num_rows($cek_populer)>0)  {
          echo"<b>Popular Items :</b>";
          $cek_item=mysqli_query($conn,"SELECT * FROM itemc1,item WHERE itemc1.kditem=item.kditem AND itemc1.id_toko=item.id_toko AND itemc1.id_toko='".$row['id_toko']."' GROUP BY item.kditem ORDER BY itemc1.support_count DESC LIMIT 3");
          while($item=mysqli_fetch_array($cek_item,MYSQLI_ASSOC)){
         echo" <img src=\"../../gambar/produk/".$item['gambar_item']." \"  width=50 height=50 style='border-radius:50%;' align=center border=0>";}

          echo"</td></tr><tr><td>";
          $cek_item=mysqli_query($conn,"SELECT * FROM itemc1,item WHERE itemc1.kditem=item.kditem AND itemc1.id_toko=item.id_toko AND itemc1.id_toko='".$row['id_toko']."' GROUP BY item.kditem ORDER BY itemc1.support_count DESC LIMIT 3");
          echo"&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
          while($item=mysqli_fetch_array($cek_item,MYSQLI_ASSOC)){echo "<b style='color:black;font-size:8.5px;'>"."".$item['merk'].""." , "."</b>";} echo"<b style='color:black'>...</b></td></tr><tr><td><br></td></tr>"; }

          echo'<tr><td class="harga_barang">';
          echo"<H3>Total Visitors : ".$row['visitors']."";
          echo'</td></tr><tr><td><br></td></tr>';
          
          if ($row['status']!="Active") {
          echo'<tr><td>';
          echo "<a href=\"status_toko.php?idtoko=".$row['id_toko']."\" class=\"tbeli\"><span>
          <input type='button' class='btn_cart' value='GO TO SHOP'></span></a>";
          echo'</td></tr>';
          } else {
          echo'<tr><td>';
          echo "<a href=\"shop_detail.php?idtoko=".$row['id_toko']."\" class=\"tbeli\"><span>
          <input type='button' class='btn_cart' value='GO TO SHOP'></span></a>";
          echo'</td></tr>'; }
          

          echo'</table>';
		  echo"</a>";
        echo'</div>';
}


echo"<div id='bgpaging'>".$paging_html."</div>";
echo '</div>';

} else {
 echo'<div id="bgproduct">';
$kategori = $_GET['kategori'];
    ?><div id="hightlight2"><center><i class="fa fa-tasks"></i> <H3>Filter Category <?php echo $kategori; ?></H3> <br><a href="index.php?clear=y">>>Delete Category<<</a> <i class="fa fa-tasks"></i></center></div>
    <?php
    echo "<img src='../../gambar/images/tidak_ditemukan.png'>";
}
// *** LOAD PAGE FOOTER

include "../../header_session/footer.php";
?>
</body>
</html>
