<link href="../css/style_admin.css" rel="stylesheet" type="text/css" media="screen" />
<?php
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
// *** LOAD ADMIN PAGE HEADER
ob_start();
include "../android/1_login_reg/login_reg2.php";
ob_end_clean();
if ( ($_GET['act']=="delete") && !empty($_GET['id']) ){
    @mysqli_query($conn,"DELETE FROM pembeli WHERE id_toko='$idtoko' AND kode_order='".$_GET['id']."'");
    //echo"Data Berhasil Dihapus";
}

$status=$_POST['status'];
echo"<br><center>";?>
<h1 align="center">Daftar Order Masuk (<?php $result = mysqli_query($conn,"SELECT * FROM pembeli WHERE id_toko='$idtoko' AND status='NEW' ORDER BY id_pembeli DESC"); echo mysqli_num_rows($result); ?>)</h1><br><?php
$result = mysqli_query($conn,"SELECT * FROM pembeli WHERE id_toko='$idtoko' AND status='NEW' ORDER BY id_pembeli ASC");
if (mysqli_num_rows($result)>0) {
// 
while ($row = mysqli_fetch_array($result,MYSQLI_ASSOC)){

// $cek = mysqli_query($conn,"SELECT * FROM pembeli WHERE kode_order ='".$row['kode_order']."'");
  $status=$row['status'];
// $num_row = mysqli_num_rows($cek);
// if ($num_row==0){
//     $konfirmasi="<blink>BELUM</blink>";
// }
// else{
//     $konfirmasi="<s>SUDAH</s>";
// }
$hasil = mysqli_query($conn,"SELECT * FROM pembeli WHERE id_toko='$idtoko' AND kode_order = '".$row['kode_order']."'");


if ($data = mysqli_fetch_array($hasil,MYSQLI_ASSOC)) 
       {
           $no++;
           $nama=$data['nama_pembeli'];
           $email=$data['email_pembeli'];
           $testi=$data['testi_singkat'];
        }

         echo"<table id='data_pembeli' border='1' style='width:100%;'>
         <tr style='width:100%;'>
            <td><center><h3>Terbaru</h3><h1> $no</h1></center></td>
            <td>&raquo; Status : ".$status."<br>&raquo; Kode : ".$row['kode_order']."<br>&raquo; Pembeli : ".$row['nama_pembeli']."<br>&raquo; Email : ".$row['email_pembeli']."<br>&raquo; Testi : ".$row['testi_singkat']."</td>
            <td>".$row['info_belanja']."</td>
          </tr>
          <tr style='width:100%;'>
            <td colspan='3'><center><a href=\"".$_SERVER['PHP_SELF']."?id=".$row['kode_order']."&amp;act=update\"> <input type='button' value='Lunas (Klik 2x)' class='btn_submit' style='background:blue;font-size:24px;'></a> "
            ."<a href=\"".$_SERVER['PHP_SELF']."?id=".$row['kode_order']."&amp;act=delete\">
            <input type='button' value='Hapus' class='btn_submit' style='background:red;font-size:24px;'></a></center></td>
          </tr>
          </table>
          ";
          $status2="LUNAS";

if ( ($_GET['act']=="update") && ($_GET['id']==$row['kode_order']) ){
            $orders_info=mysqli_query($conn,"UPDATE pembeli SET status ='".$status2."' WHERE id_toko='$idtoko' AND kode_order='".$_GET['id']."'");
            echo'<script>window.location="'.$_SERVER['PHP_SELF'].'";</script>';

      }
}
} else {
  echo"<br><hr><h3>Daftar order masih kosong</h3><hr>";
}
echo"</center>";
?>

