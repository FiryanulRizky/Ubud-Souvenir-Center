<html>
    <head>
        <title><?php include"../../db/koneksi.php"; $toko=mysqli_query($conn,"SELECT * FROM infotoko WHERE id_toko='".$_GET['idtoko']."'"); $ambil_data_toko=mysqli_fetch_array($toko); $nama_toko=$ambil_data_toko['nama_toko']; echo $nama_toko." Home Page"; ?></title>
        <link rel="shortcut icon" type="image/x-icon" href="../../gambar/images/head_logo.ico" />
    </head>
    <body>
<?php
// *** LOAD PAGE HEADER
session_start();
include "../1_login_reg/header_penjualan.php";
$_SESSION['id']=$_GET['id'];
include"sidebar.php";
mysqli_query($conn,"UPDATE infotoko SET visitors = visitors + 1  WHERE id_toko='".$_GET['idtoko']."'");
$toko=mysqli_query($conn,"SELECT * FROM infotoko WHERE id_toko='".$_GET['idtoko']."'"); $ambil_data_toko=mysqli_fetch_array($toko);
$gambar_toko=$ambil_data_toko['gambar_toko'];
$idtoko=$_GET['idtoko'];
$nama_toko=$ambil_data_toko['nama_toko'];
$nama_pemilik=$ambil_data_toko['pemilik'];
$wa=$ambil_data_toko['wa'];
$alamat=$ambil_data_toko['alamat'];
echo'<center><hr><br><H1>Welcome to '.$nama_toko.' </H1><br><table><tr><td><img src=\'../../gambar/toko/'.$gambar_toko.'\' width=405 height=205></td></tr></table><table style="background-color: #ffffff; filter: alpha(opacity=40); opacity: 0.95;border:1px solid; padding:10px;font-size:18px;"><tr><td><b style="text-align:center;border-bottom:1px solid red;">SHOP INFO</b><br><br>Name/ID</td><td><br><br>:</td><td><br><br>'.$nama_toko.' (KDTK'.$idtoko.')</td></tr><tr><td>Owner</td><td>:</td><td>'.$nama_pemilik.'</td></tr><tr><td>WA/Business</td><td>:</td><td>'.$wa.'</td></tr><tr><td>Address</td><td>:</td><td>'.$alamat.'</td></tr></table></center><br><hr><br>';

// *** MENGHAPUS SESSION SEARCH / RESETING
if ($_POST['clear']=="y"){ unset($_SESSION['scari']); unset($_SESSION['scategory']);
unset($_POST['cari']); unset($_POST['category']);}
if ($_GET['clear']=="y"){ unset($_SESSION['scari']); unset($_SESSION['scategory']);
}

// ***  DEKLARASI VARIABLE
if (!empty($_GET['halaman_produk'])) $_SESSION['halaman_produk']=$_GET['halaman_produk'];
if (!empty($_SESSION['halaman_produk'])) $_GET['halaman_produk']=$_SESSION['halaman_produk'];
if (!empty($_POST['category'])) $_SESSION['scategory']=$_POST['category'];
if (!empty($_GET['category'])) $_SESSION['scategory']=$_GET['category'];
if (!empty($_POST['cari'])) $_SESSION['scari']=$_POST['cari'];

// *** DEFAULT VARIABLE SETTING
$line_cost=0; // *** CART - SUBTOTAL COST
$total_cost=0; // *** CART - TOTAL COST
$line_quantity=0; // *** CART - SUBTOTAL QUANTITY
$total_quantity=0; // *** CART - TOTAL QUANTITY
// *** QUERY SEARCH
$qry_0 = "SELECT kditem FROM item ";
$qry_t="WHERE id_toko='".$_GET['idtoko']."' AND jenis LIKE '%".$_SESSION['scategory']."%' AND ";
$qry_t.="( merk LIKE '%".$_SESSION['scari']."%' ";
$qry_t.="OR jenis LIKE '%".$_SESSION['scari']."%' ";
$qry_t.="OR deskripsi LIKE '%".$_SESSION['scari']."%') ";

$rowperpage=12; // *** TAMPIL NUM RECORD PER PAGE

// ** predefine record number
if (!empty($_GET['halaman_produk'])) $recno=($_GET['halaman_produk']-1)*$rowperpage; else $recno=0;

// QUERY TABLE item dan record per halaman
$result = mysqli_query($conn,"SELECT * FROM item ".$qry_t." ORDER BY kditem DESC LIMIT $recno,$rowperpage");
$rec = mysqli_query($conn,"SELECT * FROM item ".$qry_t."");
$total_rec = @mysqli_num_rows($rec);
$no=0;

if ($total_rec>0){ // ** JIKA ADA DATA RECORD 

    // ** PAGING NAVIGATION
    if ($total_rec>$rowperpage){ // *** JIKA TOTAL RECORD LEBIH BESAR RECORD PER PAGE => TAMPIL PAGE
    $paging_html.= '<div id="paging">';
    if (empty($_GET['halaman_produk'])) $_GET['halaman_produk']=1; // ** SET DEFAULT PAGE = 1
    // *** PREV RECORD LINK
    if ($_GET['halaman_produk']>1) $paging_html.= '<a href="'.$_SERVER['PHP_SELF'].'?halaman_produk='.($_GET['halaman_produk']-1).'">&laquo;prev</a>';
    // *** PAGING NUMBERS LINK
    for ($i=1; $i< ceil($total_rec/$rowperpage); $i++){
        $paging_html.= '<a href="'.$_SERVER['PHP_SELF'].'?halaman_produk='.$i.'"';
        if ($_GET['halaman_produk']==$i) $paging_html.= ' class="paging_cur" ';
        $paging_html.= '>'.$i.'</a>';
    }
    // *** NEXT RECORD LINK
    if ($_GET['halaman_produk']< ceil($total_rec/$rowperpage)-1) $paging_html.= '<a href="'.$_SERVER['PHP_SELF'].'?halaman_produk='.($_GET['halaman_produk']+1).'">next&raquo;</a> ';
    $paging_html.= '</div><!-- id="paging" -->';
    } // *** end if ($total_rec>$rowperpage)
$jml_item=mysqli_query($conn,"SELECT * FROM item WHERE id_toko='".$_GET['idtoko']."'");
echo '<div id="bgproduct">';
$kategori=$_GET['category'];
if (!empty($kategori)){
    echo'<div id="hightlight2"><center><i class="fa fa-tasks"></i> <H3>Filter Category '.$kategori.'</H3> <br><a href="index.php?idtoko='.$_GET['idtoko'].'&clear=y">>>Delete Category<<</a> <i class="fa fa-tasks"></i></center></div>';
} elseif($_SESSION['scari']) { 
    echo '<div id="hightlight2"><center><i class="fa fa-tasks"></i> <H3>Filter by Search : '.$_SESSION['scari'].' </H3> <br><a href="index.php?idtoko='.$_GET['idtoko'].'&clear=y">>>Delete Filter By Search<<</a> <i class="fa fa-tasks"></i></center></div>';
}else {
echo'<div id="hightlight2"><i class="fa fa-tasks"></i>'; echo $nama_toko. " List Product (".mysqli_num_rows($jml_item)." Items)</div>"; }
    while ($row = mysqli_fetch_array($result,MYSQLI_ASSOC))
        {

        echo "<a href=\"detail.php?idtoko=".$_GET['idtoko']."&id=".$row['kditem']."\" class=\"tbeli\">";
		 
        echo'<div class="barang">';		  
        echo'<table>';
		
		 echo'<tr><td class="nama_barang" align="center">';
         echo"".$row['merk']."";
         echo'</td></tr>';
		
        echo'<tr><td>';
        echo"".$gambar."<img src=\"../../gambar/produk/".$row['gambar_item']."\" width=190 height=204  align=center border=0 >";
        echo'</td></tr>';
          
		 
		  
          echo'<tr><td class="harga_barang">';
          echo"Price: ".format_currency($row['harga'])."";
          echo'</td></tr>';
          
          echo'<tr><td>';
          if(empty($_GET['stok'])) {
          echo "<a href=\"$_SERVER[PHP_SELF]?action=add&idtoko=".$_GET['idtoko']."&id=".$row['kditem']."\" class=\"tbeli\"><span>
          <input type='button' class='btn_cart' value='ADD TO CART'></span></a>"; } else {
              echo "<a href=\"$_SERVER[PHP_SELF]?action=add&idtoko=".$_GET['idtoko']."&id=".$row['kditem']."&stok=".$_GET['stok']."\" class=\"tbeli\"><span>
          <input type='button' class='btn_cart' value='ADD TO CART'></span></a>";
          }
          echo'</td></tr>';
          

          echo'</table>';
		  echo"</a>";
        echo'</div>';
}

echo"<div id='bgpaging'>".$paging_html."</div>";
echo '</div>';

} else {
     $kategori=$_GET['category'];
     echo'<div id="bgproduct"><div id="hightlight2"><center><i class="fa fa-tasks"></i> <H3>Filter Category '.$kategori.'</H3> <br><a href="index.php?idtoko='.$_GET['idtoko'].'&clear=y">>>Delete Category<<</a> <i class="fa fa-tasks"></i></center></div>';
     echo "<img src='../../gambar/images/tidak_ditemukan.png'>";
}
// *** LOAD PAGE FOOTER

include "../../header_session/footer.php";
?>
</body>
</html>
