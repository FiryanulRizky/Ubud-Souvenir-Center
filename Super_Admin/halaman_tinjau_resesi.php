<html>
    <head>
        <title>Tinjau Resesi Super Admin</title>
        <link rel="shortcut icon" type="image/x-icon" href="../gambar/images/head_logo.ico" />
    </head>
<body>
<?php
ob_start();
include"../header_session/login_sp.php";
ob_end_clean();
include"../header_session/header_sp.php";
$cek_toko=mysqli_query($conn,"SELECT * FROM infotoko WHERE status='in Trouble' ORDER BY id_toko ASC");
echo"<div id='bgkonten'>";
if (mysqli_num_rows($cek_toko)>0) {
echo "<a href='../header_session/konfirmasi_logout_sp.php' style='color:red;font-weight:bold;'>Anda Login Sebagai ".$nama_sp." (Super Admin)</a><h2><center>List Toko Dengan Status Resesi</center></h2>";
while($ambil_data_toko=mysqli_fetch_array($cek_toko)) {
	$nama_toko=$ambil_data_toko['nama_toko'];
	$idtoko=$ambil_data_toko['id_toko'];
	$gambar_toko=$ambil_data_toko['gambar_toko'];
	$nama_pemilik=$ambil_data_toko['pemilik'];
  $wa=$ambil_data_toko['wa'];
  $alamat=$ambil_data_toko['alamat'];
  $status_toko=$ambil_data_toko['status'];
  $status_detail=$ambil_data_toko['info_status'];
  $visitors=$ambil_data_toko['visitors'];

  $pendapatan_bulanan=mysqli_query($conn,"SELECT SUM(Januari+Februari+Maret+April+Mei+Juni+Juli+Agustus+September+Oktober+November+Desember) AS total FROM pendapatan WHERE id_toko='$idtoko'");
$tangkap_pendapatan=mysqli_fetch_array($pendapatan_bulanan);
$pendapatan_bersih=ceil($tangkap_pendapatan['total']);
$cpm=ceil($tangkap_pendapatan['total']/12);

$item_bulanan=mysqli_query($conn,"SELECT SUM(Januari+Februari+Maret+April+Mei+Juni+Juli+Agustus+September+Oktober+November+Desember) AS total FROM graph WHERE id_toko='$idtoko'");
$tangkap_item=mysqli_fetch_array($item_bulanan);
$jumlah_item=$tangkap_item['total'];
$rerata_item=$tangkap_item['total']/12;

$query2=mysqli_query($conn,"SELECT * FROM admin_web WHERE id_toko='$idtoko'");
$admin=mysqli_num_rows($query2);
$query3=mysqli_query($conn,"SELECT * FROM item WHERE id_toko='$idtoko'");
$item=mysqli_num_rows($query3);
$query4=mysqli_query($conn,"SELECT SUM(stok)AS total_stok FROM item WHERE id_toko='$idtoko'");
$item2=mysqli_fetch_array($query4);
$jumlah_item=$item2['total_stok'];
$query5=mysqli_query($conn,"SELECT * FROM transaksi WHERE id_toko='$idtoko' GROUP BY kdtransaksi");
$transaksi=mysqli_num_rows($query5);

$cek_itemc1=mysqli_query($conn,"SELECT * FROM itemc1 WHERE id_toko='$idtoko'");

$cek_pendapatan=mysqli_query($conn,"SELECT SUM(Januari) AS total_pendapatan FROM pendapatan WHERE id_toko='$idtoko'");$ambil_pendapatan=mysqli_fetch_array($cek_pendapatan);$pendapatan=$ambil_pendapatan['total_pendapatan'];
?>
<div class="container">
  <div class="row">
    <div class="col-xs-12">
      <div class="panel-group">
        <div class="panel panel-default">
          <div class="panel-heading"><center><H3><?php echo $nama_toko;?></H3></center>
          </div>
          <div class="panel-body">
            <?php 
            if ($status_toko=="Closed") {
        if ($status_detail=="") {
            echo"<center><input type='button' value='Status Toko : ".$status_toko."' style='background:orange; padding:5px; font-size:21px; color:white;'></center><br>";
        } else {
        echo"<center><input type='button' value='Status Toko : ".$status_toko." ".$status_detail."' style='background:orange; padding:5px; font-size:21px; color:white;'></center><br>";
        }
    } elseif ($status_toko=="Active") {
        if ($status_detail=="") {
            echo"<center><input type='button' value='Status Toko : ".$status_toko."' style='background:lightgreen; padding:5px; font-size:21px;'></center><br>";
        } else {
        echo"<center><input type='button' value='Status Toko : ".$status_toko." ".$status_detail."' style='background:lightgreen; padding:5px; font-size:21px;'></center><br>";
        }
    } elseif ($status_toko=="in Trouble") {
        if ($status_detail=="") {
            echo"<center><input type='button' value='Status Toko : ".$status_toko."' style='background:red;color:white; padding:5px; font-size:21px;'></center><br>";
        } else {
        echo"<center><input type='button' value='Status Toko : ".$status_toko." ".$status_detail."' style='background:red; color:white; padding:5px; font-size:21px;'></center><br>";
        }
    } elseif ($status_toko=="Peninjauan Penghapusan") {
        if ($status_detail=="") {
            echo"<center><form method='post' action='../crud/hapus_toko.php?id=".$idtoko."'><input type='submit' name='tinjau_hapus' value='Status Toko : ".$status_toko."' style='background:black;color:white; padding:5px; font-size:21px;'></form></center><br>";
        } else {
        echo"<center><form method='post' action='../crud/hapus_toko.php?id=".$idtoko."'><input type='submit' name='tinjau_hapus' value='Status Toko : ".$status_toko." Pesan : ".$status_detail."' style='background:black; color:white; padding:5px; font-size:21px;'></form></center><br>";
        }
        
    } else {
        echo"<center><input type='button' value='Status Toko : Early Register' style='background:lightblue;padding:5px; font-size:21px;'></center><br>";
    } ?>
          	<table><tr><td><img src="../gambar/toko/<?php echo $gambar_toko;?>" width=405 height=205></td><td>&nbsp;&nbsp;</td><td style="border:1px solid; padding: 10px;"><table><?php echo "<tr><td><b style='text-align:center;border-bottom:1px solid red;'>INFO TOKO</b><br><br>Nama/ID</td><td><br><br>:</td><td><br><br>".$nama_toko." (KDTK".$idtoko.")</td></tr><tr><td>Pemilik</td><td>:</td><td>".$nama_pemilik."</td></tr><tr><td>WA/HP Bisnis</td><td>:</td><td>".$wa."</td></tr><tr><td>Alamat</td><td>:</td><td>".$alamat."</td></tr><tr><td>Jumlah Admin</td><td>:</td><td>".$admin."</td></tr></table></td>"; if($item>0){ echo'<td>&nbsp;&nbsp;</td><td style="border:1px solid; padding: 10px;"><table><tr><td><b style="text-align:center;border-bottom:1px solid red;">COST DETAIL</b><br><br>Total Produk</td><td><br><br>:</td><td><br><br>'.$item.'</td></tr><tr><td>Total Stok</td><td>:</td><td>'.$jumlah_item.'</td></tr>'; if($transaksi>0) { echo'<tr><td>Total Transaksi</td><td>:</td><td>'.$transaksi.'</td></tr>';} else {
              echo'<tr><td>Total Transaksi</td><td>:</td><td>(Belum diproses)</td></tr>';
            } if($pendapatan>0){ echo'<tr><td>pendapatan/bulan</td><td>:</td><td>'.format_currency($cpm).'</td></tr>';} else {
              echo'<tr><td>pendapatan/bulan</td><td>:</td><td>(Belum diproses)</td></tr>';
            } if($visitors>0) {echo'<tr><td>Total Kunjungan</td><td>:</td><td>'.$visitors.'</td></tr>'; } echo'</table></td>';
            } ?></tr></table><br>
          	<center><?php if (mysqli_num_rows($cek_itemc1)>0) {
             ?><iframe src='<?php echo"./visualisasi/barchartsjs.php?idtoko=$idtoko";?>' width="43%" height="535"></iframe>&nbsp;&nbsp;<iframe src='<?php echo"./visualisasi/pie.php?idtoko=$idtoko";?>' width="43%" height="535"></iframe><?php } if ($pendapatan>0) { ?><br><iframe src='<?php echo"./visualisasi/linechart_pendapatan.php?idtoko=$idtoko";?>' width="100%" height="645"></iframe><?php } ?></center></div>
        </div>
      </div>
    </div>
  </div>
</div>
<?php } } else { echo"<center><H3>BELUM ADA AKUN DALAM STATUS RESESI</H3></center>"; } include"../header_session/footer_sp.php"; echo"</div>";?></body></html>