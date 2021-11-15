<html>
    <head>
        <title><?php include"../../db/koneksi.php"; $toko=mysqli_query($conn,"SELECT * FROM infotoko WHERE id_toko='".$_GET['idtoko']."'"); $ambil_data_toko=mysqli_fetch_array($toko); $nama_toko=$ambil_data_toko['nama_toko']; echo $nama_toko." Finish Transaction"; ?></title>
        <link rel="shortcut icon" type="image/x-icon" href="../../gambar/images/head_logo.ico" />
    </head>
<body>
<?php
// *** LOAD PAGE HEADER
include "../1_login_reg/header_penjualan.php";
include"sidebar.php";
?>

<div id="keranjang2">
    <?php $toko=mysqli_query($conn,"SELECT * FROM infotoko WHERE id_toko='".$_GET['idtoko']."'");$ambil=mysqli_fetch_array($toko);$namatoko=$ambil['nama_toko']; ?>
<div id="hightlight2"><i class="fa fa-exchange"></i> Pay in <?php echo $namatoko; ?></div>

<?php

function generateRandomString($length = 10) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}

$status="NEW";
if ($_POST['act']=="order"){


     //$kode= '/^[a-z]/';
    if (empty($_POST['info_belanja'])) $err['info_belanja']="<span class=\"err\">Your Cart still empty.</span>\n";
    if (empty($_POST['namalengkap'])) $err['namalengkap']="<span class=\"err\">Input Your Nickname.</span>\n";
    if (empty($_POST['email'])) $err['email']="<span class=\"err\">Input your email.</span>\n";
    if (!preg_match("/^[a-z0-9\_\.\-]+\@[a-z0-9\_\.\-]+$/i",$_POST['email'])) $err['email']="<span class=\"err\">Your Email &quot;".$_POST['email']."&quot; Not Valid.</span>\n";
    //if (!preg_match("[".$kode."]",$_POST['telphp'])) $err['telphp']="<span class=\"err\">Your HP Number &quot;".$_POST['telphp']."&quot; Not Valid.</span>\n";
    if (empty($_POST['testi'])) $err['testi']="<span class=\"err\">Please give us your testi.</span>\n";
    if ($_POST['sixletterscode']<>$_SESSION['6_letters_code']) $err['sixletterscode']="<span class=\"err\">Your Validation is Not Valid.</span>\n";
    if($err>0){ // *** if submit error
        echo "<div id='notif'>Your Input is still wrong, please fix it, thank you</div>";
    } else { // *** if submit OK
        $mode="order_send_ok";
        
        foreach($_SESSION['cart'] as $product_id => $quantity) {
          $result = mysqli_query($conn,"SELECT kditem FROM item WHERE id_toko='".$_GET['idtoko']."' AND kditem='$product_id'");

            if(mysqli_num_rows($result) > 0) {

                $kode = mysqli_fetch_row($result);

                $selectors = htmlentities(implode(',', $kode));
                $data=$selectors;
                $input=$data;
                $pecah=explode("\r\n\r\n", $input);
                $text = "";
                for ($i=0; $i<=count($pecah)-1; $i++)
                {
                  $part = str_replace($pecah[$i], "<p>".$pecah[$i]."</p>", $pecah[$i]);
                  $text .=$part;
                }
                $text_line=$data;
                $text_line=$data;
                $text_line = explode(",",$text_line);
                for ($start=0; $start < count($text_line); $start++) {
                $baris=$text_line[$start];
                $sql=mysqli_query($conn,"INSERT INTO transaksi (kdtransaksi,id_toko,kditem,tgltransaksi,jam_order) "
        ."VALUES ('".$_POST['kode_order']."','".$_GET['idtoko']."','".$baris."','".$_POST['tanggal']."','".$_POST['time']."')");

          $query_stok = mysqli_query($conn,"SELECT stok FROM item WHERE id_toko='".$_GET['idtoko']."' AND kditem='$product_id'");
          while($stok1=mysqli_fetch_array($query_stok)) {
          $stok=$stok1['stok'];
          if ($stok>0) {      
          mysqli_query($conn,"UPDATE item SET stok = stok - '$quantity' WHERE id_toko='".$_GET['idtoko']."' AND kditem='$product_id'");}
          else {
            echo'<script>("OUT OF STOCK");window.location="index.php?idtoko='.$_GET['idtoko'].'"</script>';
          }
        }

$query_harga = mysqli_query($conn,"SELECT harga FROM item WHERE id_toko='".$_GET['idtoko']."' AND kditem='$product_id'");
while($harga1=mysqli_fetch_array($query_harga)) {
  $harga=$harga1['harga'];
  $idtoko=$_GET['idtoko'];
    if (date('M')=="Apr") {
    @mysqli_query($conn,"UPDATE graph SET April=April + '$quantity' WHERE id_toko='$idtoko' AND kditem='$product_id'");
    @mysqli_query($conn,"UPDATE pendapatan SET April=April + ($harga*$quantity) WHERE id_toko='$idtoko' AND kditem='$product_id'");
    }
  }
                } 
            }
        }
        mysqli_query($conn,"INSERT INTO pembeli(kode_order,id_toko,nama_pembeli,email_pembeli,testi_singkat,tanggal,jam_order,info_belanja,status) "."VALUES ('".$_POST['kode_order']."','".$_POST['id_toko']."','".$_POST['namalengkap']."','".$_POST['email']."','".$_POST['testi']."','".$_POST['tanggal']."','".$_POST['time']."','".$_POST['info_belanja']."','".$_POST['status']."')");

        //to-target
//notif-array of notifications
function sendNotif ($to, $notif){

    $feilds = array('to'=>$to, 'notification'=>$notif);

    $ch = curl_init();

    curl_setopt($ch, CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send');
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($feilds));
    
    $headers = array();
    $headers[] = 'Authorization: Key= AAAArDXRsgs:APA91bHUbzF0cO4uOtR5WCOQgdXR8xH8-hVgXTt5uZTBZQ3Mnnv7VVJsj4gShc7RuzDipqRrL7Xi4lrXxbZ9ZOWKcMRQ99f_Nul4jmpOMYfH640PprLByQn_SqN9zNjQO9zRGalsUmb9';
    $headers[] = 'Content-Type: application/json';
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    
    $result = curl_exec($ch);
    if (curl_errno($ch)) {
        echo 'Error:' . curl_error($ch);
    }
    curl_close($ch);
}

//$to = "kode_order";
$to = 'eVEzE3jZIev8DQg7kP4jRc:APA91bHhqh7nvIe3S5H960qlI4iOZakFjIR6_PXrKG_sYpgAsJdo3nsKKSRZ70t6IQOdkq0MxdUkN3UYWPBP1PWHE-_k6zW15R3Y3xmDEo6ZxWTmyWpLTeGoXIgqiiQJ52rRgxycSedW';
$notification = array(
    'title' => "Pesanan Baru : ".$_POST['namalengkap'],
    'body' => "Kode : ".$_POST['kode_order']
);

sendNotif($to, $notification);

                                     
    //$sql_edit="UPDATE produk SET
    //"."stok= '".$stok."' - '".$_POST['jumbel']."' "."WHERE id_produk='".$product_id."' ";
  // @mysqli_query($sql_edit);

        /* MENGIRIM EMAIL ORDERAN */
        $to      = $_POST['email'];
        $subject = 'Shopping Info from '.$namatoko.'';
              $namaitem=mysqli_query($conn,"SELECT * FROM transaksi,item WHERE transaksi.id_toko=item.id_toko AND transaksi.kditem=item.kditem AND transaksi.id_toko='".$_GET['idtoko']."' AND transaksi.kdtransaksi='".$_POST['kode_order']."'");
              while($ambil_item=mysqli_fetch_array($namaitem)) {
              $item=$ambil_item['merk'];
			  $idtk=$_GET['idtoko'];
              $print=''.$item.', ';}
        $message='
        Dear Mr./Mrs. '.$_POST['namalengkap'].'
        Your Order Code '.$_POST['kode_order'].' is successfully registered into our database, thanks for your support by buying our products : '.$print.', etc.
        Please visit '.$namatoko.' commerce site here https://ubud-souvenir-center.my.id/android/8_panel_penjualan/index.php?idtoko='.$idtk.'
        also our official site https://ubud-souvenir-center.my.id
        best Regards, '.$namatoko.' Admin
        info@ubud-souvenir-center.my.id. 
        X-Mailer: PHP/' . phpversion();
              $headers = 'From: info@ubud-souvenir-center.my.id' . "\r\n" .
            'Reply-To: info@ubud-souvenir-center.my.id' . "\r\n" .
                'X-Mailer: PHP/' . phpversion();
        @mail($to, $subject, $message, $headers);

         unset($_SESSION['cart']);
        echo'<hr><br><center><form method="post" action="index.php?idtoko='.$_GET['idtoko'].'"><input type="submit" class="btn_submit" style="font-size:32px;" value="Back to Menu"></form></center><br><hr>';
         echo'<br><H3>Thank You Mr./Mrs. '.$_POST['namalengkap'].' Your Transaction is almost done.<br>Please Remember this information for Continue Your Pay to Our Casheer : <br><br><H1>Your Name : '.$_POST['namalengkap'].'<br>Transaction Code : '.$_POST['kode_order'].'</H1><br><br><H3>best Regards<br>'.$namatoko.' Admin</h3><br>';
        
        $Qrek=mysqli_query($conn,"SELECT * FROM itemc2,item WHERE itemc2.id_toko=item.id_toko AND itemc2.id_toko='".$_GET['idtoko']."' AND item.kditem=itemc2.kditem1 AND itemc2.kditem1 = '".$_SESSION['id']."' AND itemc2.lift_ratio>=1 AND itemc2.kditem1!=itemc2.kditem2 GROUP BY itemc2.kditem2 ORDER BY itemc2.persen_support DESC");
if (mysqli_num_rows($Qrek)>0) {
    echo'<br><H1>You mas also like this product : <br></H1><br>';
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
    }   
    }
}

if ($mode!="order_send_ok"){

$no=0;
$checkout_cnt="";
$checkout_cnt2="";

// JIKA KERANJANG TIDAK KOSONG
if($_SESSION['cart']) {
    // TAMPILKAN TABEL KERANJANG

    $checkout_cnt.= "<center><H3>$namatoko3</H3></center><table  cellspacing=0 cellpadding=0 id=\"checkout_last\">";	// format tampilan menggunakan HTML table
     $checkout_cnt.= "<tr><td><b>NO</td>
                     <td><b>Product ID</td>
                     <td><b>Name </td>
                     <td><b>Image</b></td>
                     <td><b>Price</b></td>
                     <td><b>Total</b></td>
                     <td><b>Subtotal</b></td>

                     </tr>";
    $checkout_cnt2.= "<center><H3>$namatoko3</H3></center><table  cellspacing=0 cellpadding=0 id=\"checkout_last\">";  // format tampilan menggunakan HTML table
     $checkout_cnt2.= "<tr><td><b>NO</td>
                     <td><b>Product ID</td>
                     <td><b>Name </td>
                     <td><b>Image</b></td>
                     <td><b>Price</b></td>
                     <td><b>Total</b></td>
                     <td><b>Subtotal</b></td>

                     </tr>";
        // LOOPING / PENGULANGAN : UNTUK MENDEFINISIKAN ISI KERANJANG
        // $product_id sebagai key DAN $quantity sebagai value
        foreach($_SESSION['cart'] as $product_id => $quantity) {
              $tangkapgambar=mysqli_query($conn,"SELECT * FROM item WHERE id_toko='".$_GET['idtoko']."' AND kditem='$product_id'");
              $tangkap=mysqli_fetch_array($tangkapgambar,MYSQLI_ASSOC);
              $tampil ="<a href=\"../../gambar/produk/".$tangkap['gambar_item']."\">
        <img src=\"../../gambar/produk/".$tangkap['gambar_item']."\" width=80 height=80 align=center border=1px </a>";
             $gambar ="<a href=\"../gambar/produk/".$tangkap['gambar_item']."\">
        <img src=\"../gambar/produk/".$tangkap['gambar_item']."\" width=80 height=80 align=center border=1px </a>";
               //$ukuran='<select name="ukuran">
              // <option>L</option>
               // <option>L</option>
                // <option>L</option>';
                //if (!empty($_POST['ukuran']))$_SESSION['sukuran']=$_POST['ukuran'];
                //if ($_SESSION['sukuran']==$_POST['ukuran']) echo "selected";
                
                
            // MENDAPATKAN name, description, price DARI database - INI TERGANTUNG penamaan implementation database anda .
            // GUNAKAN FUNCTION sprintf AGAR/SUPAYA $product_id MASUK KE DALAM query SEBAGAI SEBUAH number - UNTUK MENGHINDARI SQL injection (HACKING)
            $result = mysqli_query($conn,"SELECT kditem, merk, deskripsi, harga FROM item WHERE id_toko='".$_GET['idtoko']."' AND kditem = $product_id");

            // HANYA MENAMPILKAN JIKA PRODUCT NYA ADA / TIDAK KOSONG

            if(mysqli_num_rows($result) > 0) {
                $no++;

                list($kode, $name, $description, $price,$stok) = mysqli_fetch_row($result);
               
                // MENGHITUNG SUBTOTAL ($line_cost) DARI HARGA ($price) * JUMLAH ($quantity)
                $line_cost = $price * $quantity;

                // MENGHITUNG TOTAL JUMLAH ($quantity)
                 $total_quantity += $quantity;

                // MENGHITUNG TOTAL DENGAN MENAMBAHKAN SUBTOTAL ($line_cost) MASING2 PRODUCT
                //$total = $total + $line_cost;
                $totalx += $line_cost;

                $checkout_cnt.="<tr>";
                    // MENAMPILKAN DATA KE DALAM table cells
                    $checkout_cnt.="<td>$no.</td><td>BR$kode</td><td>$gambar</td><td>$name</td>";
                    $checkout_cnt.="<td>".format_currency($price)."</td>";
                    //$checkout_cnt.="<td>".$ukuran."</td>";
                    $checkout_cnt.="<td>".$quantity."[Items]</td>";
                    $checkout_cnt.="<td>".format_currency($line_cost)."</td>";

                    $info_belanja.="$kode | $gambar | $name | $price | $quantity | $line_cost \n";

                $checkout_cnt.="</tr>";

                $checkout_cnt2.="<tr>";
                    // MENAMPILKAN DATA KE DALAM table cells
                    $checkout_cnt2.="<td>$no.</td><td>BR$kode</td><td>$tampil</td><td>$name</td>";
                    $checkout_cnt2.="<td>".format_currency($price)."</td>";
                    //$checkout_cnt.="<td>".$ukuran."</td>";
                    $checkout_cnt2.="<td>".$quantity."[Items]</td>";
                    $checkout_cnt2.="<td>".format_currency($line_cost)."</td>";

                $checkout_cnt2.="</tr>";

            }

        }

        //show the total
        $checkout_cnt.="<tr>";
            $checkout_cnt.="<td colspan=\"5\"  class=\"num\">TOTAL BAYAR</td>";
            $checkout_cnt.="<td>".format_currency($totalx)."</td>";
        $checkout_cnt.="</tr>";
                    $info_belanja.="TOTAL=  $total\n";

    $checkout_cnt.="</table><br>";

    $checkout_cnt2.="<tr>";
            $checkout_cnt2.="<td colspan=\"5\"  class=\"num\">TOTAL BAYAR</td>";
            $checkout_cnt2.="<td>".format_currency($totalx)."</td>";
        $checkout_cnt2.="</tr>";

    $checkout_cnt2.="</table><br>";

    echo $checkout_cnt2; 
echo'
    <form method="post">
    <input type="hidden" name="info_belanja" value="'.htmlentities($checkout_cnt).'">
    <input type="hidden" name="info_belanja2" value="'.htmlentities($checkout_cnt2).'">
    <table id="kirim">
    <tr><td>&raquo; Order ID &nbsp;&nbsp; </td><td class="cv"><input name="kode_order" size="40" class="texbox" value= '.generateRandomString().'  readonly></td></tr>
    <tr><td>&raquo; Shop ID &nbsp;&nbsp; </td><td class="cv"><input name="id_toko" size="40" class="texbox" value= '.$_GET['idtoko'].'  readonly></td></tr>
    <tr><td>&raquo; Date &nbsp;&nbsp; </td><td class="cv"><input name="tanggal" size="40" class="texbox" value= '.date("Y-m-d").'  readonly></td></tr>
    <tr><td>&raquo; Time &nbsp;&nbsp; </td><td class="cv"><input name="time" size="40" class="texbox" value= '.date("H:i:s").'  readonly></td></tr>
    <tr><td>&raquo; Your Name*  </td><td class="cv"><input name="namalengkap" size="40" maxlength="30"  class="texbox"  value="'.$_POST['namalengkap'].'"><br>'.$err['namalengkap'].'</td></tr>
    <tr><td>&raquo; Your Email*  </td><td class="cv"><input name="email" class="texbox" size="40" maxlength="40" value="'.$_POST['email'].'"><br>'.$err['email'].'</td></tr>
    <tr><td>&raquo; One Word for Souvenir Bali* </td><td class="cv"><textarea name="testi" rows=2 cols=35 class="texarea" maxlength="30">'.$_POST['testi'].'</textarea><br>'.$err['testi'].'</td></tr>
     <input type="hidden" name="status" value="'.($status).'">
    <tr><td></td>
    <tr><td></td><td><input type="hidden" name="act" value="order">
    <input type="submit" value="Process" class="btn"></td></tr>
    <tr><td></td><td>&raquo;Please fill All field with marks (*) !!</td></tr>


    </table>



    ';

}

else{
    //tampilan jika keranjang kosong
echo'
  <marquee>Your cart is still empty, please buy your first product</marquee>
  <hr>
  ';
}


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