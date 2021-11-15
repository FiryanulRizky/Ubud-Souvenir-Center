<html>
    <head>
        <title><?php include"../../db/koneksi.php"; $toko=mysqli_query($conn,"SELECT * FROM infotoko WHERE id_toko='".$_GET['idtoko']."'"); $ambil_data_toko=mysqli_fetch_array($toko); $nama_toko=$ambil_data_toko['nama_toko']; echo $nama_toko." Transaction Cart"; ?></title>
        <link rel="shortcut icon" type="image/x-icon" href="../../gambar/images/head_logo.ico" />
    </head>
<body>
<?php
// *** LOAD PAGE HEADER
include "../1_login_reg/header_penjualan.php";
include"sidebar.php";
?>
<div id="keranjang">
<div id="hightlight2"><i class="fa fa-exchange"></i> Shopping Details</div>
<br>

<?php

// JIKA KERANJANG TIDAK KOSONG
if($_SESSION['cart']) {
    // TAMPILKAN TABEL KERANJANG

    $checkout_cnt.= "<table   cellspacing=0 cellpadding=0 id=\"checkout_fisrt\">";  // format tampilan menggunakan HTML table
    $checkout_cnt.= "<tr>
                    <td><b>No</b></td>
                    <td><b>Product ID</td>
                     <td><b>Item Name</td>
                     <td><b>Item Image</b></td>
                     <td><b>Price</b></td>
                     <td><b>Amount</b></td>
                     <td><b>Subtotal</b></td>
                     <td colspan='2'><b>Action</b></td>

                     </tr>";

       // LOOPING / PENGULANGAN : UNTUK MENDEFINISIKAN ISI KERANJANG
        // $product_id sebagai key DAN $quantity sebagai value
        
        foreach($_SESSION['cart'] as $product_id => $quantity) {
            $ambilgambar=mysqli_query($conn,"SELECT * FROM item WHERE id_toko='".$_GET['idtoko']."' AND kditem='$product_id'");
            $tangkap=mysqli_fetch_array($ambilgambar);
            $gambar ="<a href=\"../../gambar/produk/".$tangkap['gambar_item']."\">
        <img src=\"../../gambar/produk/".$tangkap['gambar_item']."\" width=80 height=90 align=center border=1px </a>";





            // MENDAPATKAN name, description, price DARI database
            $result = mysqli_query($conn,"SELECT kditem, merk, deskripsi, harga, stok FROM item WHERE id_toko='".$_GET['idtoko']."' AND kditem = $product_id");

            // HANYA MENAMPILKAN JIKA PRODUCT NYA ADA / TIDAK KOSONG
            if(mysqli_num_rows($result) > 0) {
                $no++;

                list($kode, $name, $description, $price, $stok) = mysqli_fetch_row($result);

                // MENGHITUNG SUBTOTAL ($line_cost) DARI HARGA ($price) * JUMLAH ($quantity)
                $line_cost = $price * $quantity;

                // MENGHITUNG TOTAL JUMLAH ($quantity)
                 $total_quantity += $quantity;
                 
                  $result = mysqli_query($conn,"SELECT * FROM item WHERE id_toko='".$_GET['idtoko']."'");
                  while($row=mysqli_fetch_array($result,MYSQLI_ASSOC)) {
               $ukuran=$row['merk'];

                 }

                // MENGHITUNG TOTAL DENGAN MENAMBAHKAN SUBTOTAL ($line_cost) MASING2 PRODUCT
                //$total = $total + $line_cost;
                $totalx += $line_cost;

                    
                if($stok==$quantity) {
                   $checkout_cnt.="<form method=\"post\" action=\"".$_SERVER['PHP_SELF']."?idtoko=".$_GET['idtoko']."&id=$product_id\"><tr style='background:yellow;'>";
                    // MENAMPILKAN DATA KE DALAM table cells
                    $checkout_cnt.="<td>$no.</td><td>BR$kode</td><td>$name</td>";
                    $checkout_cnt.="<td>".$gambar."</td>";
                     // $checkout_cnt.="<td><select><option>".$ukuran."</option><select></td>";
                    $checkout_cnt.="<td >".format_currency($price)."</td>";

                    $checkout_cnt.="<td><input type='text' id='texbox' size='2' maxlength='3' onKeyPress='return HanyaAngka(event)' class=\"jumbel\" value='".$quantity."' name='jumbel' ><br><br><b style='color:white;background:red;'>Out of Stock<br>".$quantity." / ".$stok."</b></td>";
                    $checkout_cnt.="<td>".format_currency($line_cost)."</td>";
                     $checkout_cnt.="<td class=\"num\">"."<a href=\"$_SERVER[PHP_SELF]?action=remove&idtoko=".$_GET['idtoko']."&id=$product_id\"><input type='button' class='btnhps' value='X'></a></td>";
                    $checkout_cnt.="<td>"
                    ."<input alt=\"".$_SERVER['PHP_SELF']."?idtoko=".$_GET['idtoko']."&id=$product_id&action=update&jumbel=\" type='button' class=\"btupdate btn2\" value='Update' ></td>";


                    $info_belanja.="$name | $gambar | $price | $quantity | $line_cost \n";


            $checkout_cnt.="</tr>";
                } else {
                    $checkout_cnt.="<form method=\"post\" action=\"".$_SERVER['PHP_SELF']."?idtoko=".$_GET['idtoko']."&id=$product_id\"><tr>";
                    // MENAMPILKAN DATA KE DALAM table cells
                    $checkout_cnt.="<td>$no.</td><td>BR$kode</td><td>$name</td>";
                    $checkout_cnt.="<td>".$gambar."<br><br>Stock : ".$quantity." / ".$stok."</td>";
                     // $checkout_cnt.="<td><select><option>".$ukuran."</option><select></td>";
                    $checkout_cnt.="<td >".format_currency($price)."</td>";

                    $checkout_cnt.="<td><input type='text' id='texbox' size='2' maxlength='3' onKeyPress='return HanyaAngka(event)' class=\"jumbel\" value='".$quantity."' name='jumbel' ></td>";
                    $checkout_cnt.="<td>".format_currency($line_cost)."</td>";
                     $checkout_cnt.="<td class=\"num\">"."<a href=\"$_SERVER[PHP_SELF]?action=remove&idtoko=".$_GET['idtoko']."&id=$product_id\"><input type='button' class='btnhps' value='X'></a></td>";
                    $checkout_cnt.="<td>"
                    ."<input alt=\"".$_SERVER['PHP_SELF']."?idtoko=".$_GET['idtoko']."&id=$product_id&action=update&jumbel=\" type='button' class=\"btupdate btn2\" value='Update' ></td>";


                    $info_belanja.="$name | $gambar | $price | $quantity | $line_cost \n";


            $checkout_cnt.="</tr>";
                }

            }

        }
        $checkout_cnt.=""."<a href=\"$_SERVER[PHP_SELF]?action=empty&idtoko=".$_GET['idtoko']."\" class=\"btnkrnjg\" onclick=\"return confirm('Sure you want to delete all items ?');\"><input type='button' value='Delete All' class='btn3'></a>";

        //show the total
        $checkout_cnt.="<tr>";
        //$checkout_cnt.="<tr><td colspan=\"7\"  class=\"num\" align=\"center\">TOTAL ITEMS</td>";
       // $checkout_cnt.="<td>".$total_quantity."</td>";
         $checkout_cnt.="<tr><td colspan=\"8\"  class=\"num\" align=\"center\">&raquo;TOTAL BILL</td>";
        $checkout_cnt.="<td>".format_currency($totalx)."</td>";
        $checkout_cnt.="</tr>";
                    $info_belanja.="TOTAL= $total\n";


     
    $checkout_cnt.="</table><br>";

    echo $checkout_cnt;
    ?>
    <script>
      $(".btupdate").click(function(){
            var newhref= $(this).attr('alt')+ $(this).parent().parent().find(".jumbel").val();

            window.location = newhref;
      });
    </script><br>
<?php echo"<a href=\"index.php?idtoko=".$_GET['idtoko']."&stok=".($total_quantity/2)."\"><input type='button' value='Continue Shopping' class='btn3'></a>

<a href=\"checkout_last_confirm.php?idtoko=".$_GET['idtoko']."\"><input type='button' value='Finished Shopping' class='btn3' id='t_selesai'></a>";
echo'<p>Term & Condition</p>
<p> - Before changing the amount, please see the amount of stock available, do not pass the existing stock. </p>
<p> - If you change the amount, after inputting the data on the amount, press the Update button. </p><br>
';
?>
<?php
    }

else{
    //tampilan jika keranjang kosong
echo'<marquee>Your Cart is still empty, please choose your first product to buy</marquee>';
echo'<hr><br><center><form method="post" action="index.php?idtoko='.$_GET['idtoko'].'"><input type="submit" class="btn_submit" value="Back to Menu"></form></center><br><hr>';
}

?>

</div>

<?php

echo '&nbsp;<div class="cleared"></div>';

// *** LOAD PAGE FOOTER
include "footer.php";

?>
</body>
</html>
