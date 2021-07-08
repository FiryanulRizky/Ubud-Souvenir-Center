<?php
echo"<a href='checkout_fisrt.php?idtoko=".$_GET['idtoko']."'>";
// *** SWITCH ACTION
'echo<div id="tbcart">';
/*
foreach ($_GET AS $K=>$V) echo "<li>$K=>$V";
echo "###";
foreach ($_POST AS $K=>$V) echo "<li>$K=>$V";
*/

$product_id = $_GET['id'];	 //the product id from the URL
$action 	= $_GET['action']; //the action from the URL


switch($action) {

    case "add":
        // TAMBAH 1 UNTUK NILAI PRODUCT ID -> $product_id

 $sql = mysqli_query($conn,"SELECT * FROM item WHERE id_toko='".$_GET['idtoko']."' AND kditem='".$product_id."'");
	while($row=mysqli_fetch_array($sql,MYSQLI_ASSOC))

if ( $row['stok']==0){
        echo "<script>window.alert('Sorry, this product is Out Of Stock ');
        window.location=('index.php?idtoko=".$_GET['idtoko']."')</script>";
    }
  else{
      
      if($row['stok']>$_GET['stok']) {
        $_SESSION['cart'][$product_id]++;
        echo "<script>window.location=('index.php?idtoko=".$_GET['idtoko']."')</script>";
    } else {
        echo'<script>alert("Sorry, Your Purchase Suspended (Cart is Over Capacity), Continue Transaction first or Restore your cart");</script>';
    }
  }
    break;

    case "remove":
        // KURANG 1 UNTUK NILAI PRODUCT ID -> $product_id
       unset ($_SESSION['cart'][$product_id]);
        // JIKA SETELAH DIKURANGI NILAI == 0, VARIABLE SESSION PRODUCT ID -> $product_id DI HAPUS DENGAN fucntion "unset"
        // Karena jika tidak di- "unset" nilai nya menjadi -1 , -2, dst ketika user terus mengurangi item cart
        //if($_SESSION['cart'][$product_id] == 0) unset($_SESSION['cart'][$product_id]);
    break;

    case "empty":
        // MENGKOSONGKAN CART (KERANJANG) memakai function unset SELURUH ITEM PRODUCT AKAN DIKOSONGKAN
        unset($_SESSION['cart']);
        header("location:checkout_fisrt.php?idtoko=".$_GET['idtoko']."");
exit;
    break;
    

    case "update":

    $sql = mysqli_query($conn,"SELECT stok FROM item WHERE kditem=".$product_id." AND id_toko=".$_GET['idtoko']."");
	while($r=mysqli_fetch_array($sql,MYSQLI_ASSOC)){
    if ($_GET['jumbel'] > $r['stok']){
        echo "<script>window.alert('Sorry, The Number of Items You Request Exceeds Existing Stock');
        window.location=('checkout_fisrt.php?idtoko=".$_GET['idtoko']."')</script>";
    }
    elseif ($_GET['jumbel'] <= 0){
        echo "<script>window.alert('Sorry, the Purchase Amount cannot be empty');
        window.location=('checkout_fisrt.php?idtoko=".$_GET['idtoko']."')</script>";
    }

    else{
      $_SESSION['cart'][$product_id] = $_GET['jumbel'];
      
      //mysqli_query("UPDATE php_shop_products SET produk.stok=produk.stok-orders_detail.jumlah WHERE orders_detail.id_orders='$_POST[id]'");
      


   }
}
  //  }
		break;

    
}





if($_SESSION['cart']) {	// *** JIKA KERANJANG ADA ISI NYA / TIDAK KOSONG


    // TAMPILKAN TABEL KERANJANG
    echo "<table border=\"0\"  cellspacing=0 cellpadding=0 id=\"tbcart\">";	// format tampilan menggunakan HTML table

    echo '<tr><td colspan=4></td></tr>';


        // LOOPING / PENGULANGAN : UNTUK MENDEFINISIKAN ISI KERANJANG
        // $product_id sebagai key DAN $quantity sebagai value
        foreach($_SESSION['cart'] as $product_id => $quantity) {

            // MENDAPATKAN name, description, price DARI database - INI TERGANTUNG penamaan implementation database anda .
            // GUNAKAN FUNCTION sprintf AGAR/SUPAYA $product_id MASUK KE DALAM query SEBAGAI SEBUAH number - UNTUK MENGHINDARI SQL injection (HACKING)

            $result = mysqli_query($conn,"SELECT kditem, merk, harga,stok FROM item WHERE kditem AND id_toko='".$_GET['idtoko']."'");

            // HANYA MENAMPILKAN JIKA PRODUCT NYA ADA / TIDAK KOSONG
            if(mysqli_num_rows($result) > 0) {

                list($kode, $name, $price) = mysqli_fetch_row($result);

                // MENGHITUNG SUBTOTAL ($line_cost) DARI HARGA ($price) * JUMLAH ($quantity)
                $line_cost = $price * $quantity;

                // MENGHITUNG TOTAL DENGAN MENAMBAHKAN SUBTOTAL ($line_cost) MASING2 PRODUCT
                $total_cost += $line_cost;
                $total_quantity += $quantity;

            }

        }

        //TAMPILKAN TOTAL
        echo "<tr>";
            echo "<td>";
            echo "</td>";
            echo "<td><i class='fa fa-shopping-cart' style='font-size: 30px; color:#fff;'></i>  ".number_format($total_quantity,0,"",".")." Cart (Items)</td>";
        echo "</tr>";
        // LINK empty cart - YANG MANA LINK KE HALAMAN INI JUGA, TAPI DENGAN action = empty.
        // SERTA javascript KETIKA onlick event MENANYAKAN user UNTUK KONFIRMASI
        echo "<tr>";
            
           echo "</tr>";

             echo "<tr>";
            
        echo "</tr>";
    echo "</table>";



}
else
{  // JIKA KERANJANG KOSONG -> TAMPILKAN PESAN INI

    echo "<table border=\"0\" cellspacing=0 cellpadding=0 id=\"tbcart\">";	// format tampilan menggunakan HTML table
    //TAMPILKAN TOTAL

     echo "<tr>";
            echo "<td><i class='fa fa-shopping-cart' style='font-size: 30px; color:#fff;'></i> ".number_format($total_quantity,0,"",".")."(Items)</td>";
            echo "</tr>";
            echo"";
    echo "</table>\n";
}
?>
</a>