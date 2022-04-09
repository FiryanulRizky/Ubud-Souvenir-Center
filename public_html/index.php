<html>
    <head>
        <title>Ubud Souvenir Center</title>
        <link rel="shortcut icon" type="image/x-icon" href="./gambar/images/head_logo.ico" />
    </head>
    <body>
<?php
// *** LOAD PAGE HEADER
include "./header_session/header_index.php";
include"./header_session/sidebar_index.php";

ob_start();
include"./android/8_panel_penjualan/cart.php";
ob_end_clean();
unset($_SESSION['cart']);

// *** MENGHAPUS SESSION SEARCH / RESETING
if ($_POST['clear']=="y"){ unset($_SESSION['scari']); unset($_SESSION['scategory']);
unset($_POST['cari']); unset($_POST['category']);}
if ($_GET['clear']=="y"){ unset($_SESSION['scari']); unset($_SESSION['scategory']);
}

// ***  DEKLARASI VARIABLE
if (!empty($_GET['page'])) $_SESSION['page']=$_GET['page'];
if (!empty($_SESSION['page'])) $_GET['page']=$_SESSION['page'];
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
$qry_t="WHERE  jenis LIKE '%".$_SESSION['scategory']."%' AND ";
$qry_t.="( merk LIKE '%".$_SESSION['scari']."%' ";
$qry_t.="OR jenis LIKE '%".$_SESSION['scari']."%' ";
$qry_t.="OR deskripsi LIKE '%".$_SESSION['scari']."%') ";

$rowperpage=100; // *** DISPLAY NUM RECORD PER PAGE

// ** predefine record number
if (!empty($_GET['page'])) $recno=($_GET['page']-1)*$rowperpage; else $recno=0;

// QUERY TABLE php_shop_products n record per page
//echo $sql;
$result = mysqli_query($conn,"SELECT * FROM item ".$qry_t." GROUP BY merk ORDER BY views DESC LIMIT $recno,$rowperpage");
$ada = @mysqli_num_rows($result);
$no=0;

if ($ada>0){ // ** IF RECORD EXISTS

    // ** PAGING NAVIGATION
    if ($total_rec>$rowperpage){ // *** IF TOTAL RECORD GREATER THAN RECORD PER PAGE => SHOW PAGING
    $paging_html.= '<div id="paging">';
    if (empty($_GET['page'])) $_GET['page']=1; // ** SET DEFAULT PAGE = 1
    // *** PREV RECORD LINK
    if ($_GET['page']>1) $paging_html.= '<a href="'.$_SERVER['PHP_SELF'].'?page='.($_GET['page']-1).'">&laquo;prev</a>';
    // *** PAGING NUMBERS LINK
    for ($i=1; $i<= ceil($total_rec/$rowperpage); $i++){
        $paging_html.= '<a href="'.$_SERVER['PHP_SELF'].'?page='.$i.'"';
        if ($_GET['page']==$i) $paging_html.= ' class="paging_cur" ';
        $paging_html.= '>'.$i.'</a>';
    }
    // *** NEXT RECORD LINK
    if ($_GET['page']<ceil($total_rec/$rowperpage)) $paging_html.= '<a href="'.$_SERVER['PHP_SELF'].'?page='.($_GET['page']+1).'">next&raquo;</a> ';
    $paging_html.= '</div><!-- id="paging" -->';
    } // *** end if ($total_rec>$rowperpage)

?>
   
<div id="bgproduct">
<?php
$kategori = $_GET['category'];
if (!empty($_GET['category'])) {
    ?>
    <div id="hightlight2"><center><i class="fa fa-tasks"></i> <H3>Filter Category <?php echo $kategori; ?></H3> <br><a href="../../index.php?clear=y">>>Delete Category<<</a> <i class="fa fa-tasks"></i></center></div>
    <?php
} elseif($_SESSION['scari']) { 
    ?>
    <div id="hightlight2"><center><i class="fa fa-tasks"></i> <H3>Filter by Search : "<?php echo $_SESSION['scari']; ?>"</H3> <br><a href="../../index.php?clear=y">>>Delete Filter By Search<<</a> <i class="fa fa-tasks"></i></center></div>
    <?php
} else {
?> 
<div id="hightlight2"><center><i class="fa fa-tasks"></i> <H3>All Product List</H3> <br><a href="./android/7_panel_guest/index.php?clear=y">>>All Shop List<<</a> <i class="fa fa-tasks"></i></center></div>
<?php }
    while ($row = mysqli_fetch_array($result,MYSQLI_ASSOC))
        {
    echo "<a href=\"./android/7_panel_guest/detail.php?idtoko=".$row['id_toko']."&id=".$row['kditem']."&merk=".$row['merk']."\" class=\"tbeli\">";
        echo'<div class="barang">';		  
        echo'<table>';
		
		 echo'<tr><td class="nama_barang" align="center">';
         echo"".$row['merk']."";
         echo'</td></tr>';

        echo'<tr><td>';
        echo"".$gambar."<img src=\"./gambar/produk/".$row['gambar_item']."\" width=190 height=204  align=center border=0 >";
        echo'</td></tr>';
            
          echo'<tr><td class="harga_barang">';
          echo"Price: ".format_currency($row['harga'])."";
          echo'</td></tr>';
          
          echo'<tr><td>';
          echo "<a href=\"./android/7_panel_guest/detail.php?idtoko=".$row['id_toko']."&id=".$row['kditem']."&merk=".$row['merk']."\" class=\"tbeli\"><span>
          <input type='button' class='btn_cart' value='CHECK DETAIL'></span></a>";
          echo'</td></tr>';
          
          echo'</table>';
        echo'</div>';echo"</a>";
}


echo"<div id='bgpaging'>".$paging_html."</div>";
echo '</div>';
} else {
echo'<div id="bgproduct">';
$kategori = $_GET['category'];
    ?><div id="hightlight2"><center><i class="fa fa-tasks"></i> <H3>Filter Category <?php echo $kategori; ?></H3> <br><a href="../../index.php?clear=y">>>Delete Category<<</a> <i class="fa fa-tasks"></i></center></div>
    <?php
    echo "<img src='./gambar/images/tidak_ditemukan.png'>";

}
// *** LOAD PAGE FOOTER

include "./header_session/footer.php";
?>
</body>
</html>
