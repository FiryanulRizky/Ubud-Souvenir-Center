<link href="../css/style_admin.css" rel="stylesheet" type="text/css" media="screen" />
<?php
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
// *** LOAD ADMIN PAGE HEADER
include "../header_session/login_inner.php";
ob_start();
include("../panel_penjualan/checkout_fisrt.php");
ob_end_clean();
if ( ($_GET['act']=="delete") && !empty($_GET['id']) ){
    @mysqli_query($conn,"DELETE FROM pembeli WHERE id_toko='$idtoko' AND kode_order='".$_GET['id']."'");
    //echo"Data Berhasil Dihapus";
}

$status=$_POST['status'];
echo"<center>";
echo '<h1 align="center">Daftar Orderan Masuk <a href="riwayat_order.php"><input type="button" value="Riwayat Order" style="width:25%;height:50px;"></button></a></h1>';

$result = mysqli_query($conn,"SELECT * FROM pembeli WHERE id_toko='$idtoko' AND status='NEW' ORDER BY id_pembeli DESC");
if (mysqli_num_rows($result)>0) {
 
while ($row = mysqli_fetch_array($result,MYSQLI_ASSOC)){

  $status=$row['status'];

         echo"<table id='data_pembeli' border='1'>
         <tr>
            <td><center><h3>Terbaru</h3><h1>".++$no."</h1></center></td>
            <td>&raquo; Status : ".$status."<br>&raquo; Kode : ".$row['kode_order']."<br>&raquo; Pembeli : ".$row['nama_pembeli']."<br>&raquo; Tanggal : ".date("d-F-Y",strtotime($row['tanggal']))."<br>&raquo; Jam : ".$row['jam_order']." WITA<br>&raquo; Email : ".$row['email_pembeli']."<br>&raquo; Testi : ".$row['testi_singkat']."</td>
            <td>".$row['info_belanja']."</td>
          </tr>
          <tr>
            <td colspan='3'><center><a href=\"".$_SERVER['PHP_SELF']."?id=".$row['kode_order']."&amp;act=update\"> <input type='button' value='Lunas (Klik 2x)' class='btn_submit'></a> "
            ."<a onclick=\"return confirm('Are you sure to Delete?');\" href=\"".$_SERVER['PHP_SELF']."?id=".$row['kode_order']."&amp;act=delete\">
            <input type='button' value='Delete' class='btn_submit'></a></center></td>
          </tr>
          </table>
          ";
          $status2="LUNAS";

if ( ($_GET['act']=="update") && ($_GET['id']==$row['kode_order']) ){
            $orders_info=mysqli_query($conn,"UPDATE pembeli SET status ='".$status2."' WHERE id_toko='$idtoko' AND kode_order='".$_GET['id']."'");

      }
}
} else {
  echo"<br><hr><h3>Daftar order masih kosong</h3><hr>";
}
echo"</center>";
?>