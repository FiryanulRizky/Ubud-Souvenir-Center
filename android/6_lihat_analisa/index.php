<!DOCTYPE html>
<html>
<head>
  <title>Visualisasi</title>  
  <link rel="stylesheet" href="./css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="./css/style.css" /> 
</head>
<body style="background: #DFE6F0">
<?php ob_start();include '../1_login_reg/login_reg.php';ob_end_clean(); include"../notif/notif_android2.php"; 
$cek1=mysqli_query($conn,"SELECT * FROM itemc2 WHERE id_toko='$idtoko'");
  if (mysqli_num_rows($cek1)>0) {
  ?>
  <div class="row">
      <div class="panel-group">
        <div class="panel panel-default">
          <div class="panel-heading" background="blue"><center><H3>POLA TRANSAKSI 2 ITEM</H3><table><tr><td><form action="pola_2item.php"><b style="font-style: italic; color: red"><input type="submit" name="pola2item" value="LIHAT DETAIL"></b></form></td><td>&nbsp;&nbsp;&nbsp;&nbsp;</td><td><form action="pola_2_tabel.php"><b style="font-style: italic; color: blue;"><input type="submit" name="pola2tabel" value="DATA TABEL"></b></form></td></tr></table></center>
          </div>
          <div class="panel-body"><iframe src="pola_2.php" width="100%" height="400"></iframe></div>
        </div>
      </div>
  </div>
  <?php } $cek2=mysqli_query($conn,"SELECT * FROM itemc3 WHERE id_toko='$idtoko' AND lift_ratio>=1");
  if (mysqli_num_rows($cek2)>0) { ?>
  <div class="row">
    <div class="col-xs-12">
      <div class="panel-group">
        <div class="panel panel-default">
          <div class="panel-heading" background="blue"><center><H3>POLA TRANSAKSI 3 ITEM</H3><table><tr><td><form action="pola_3item.php"><b style="font-style: italic; color: red"><input type="submit" name="pola3item" value="LIHAT DETAIL"></b></form></td><td>&nbsp;&nbsp;&nbsp;&nbsp;</td><td><form action="pola_3_tabel.php"><b style="font-style: italic; color: blue;"><input type="submit" name="pola3tabel" value="DATA TABEL"></b></form></td></tr></table></center>
          </div>
          <div class="panel-body"><iframe src="pola_3.php" width="102%" height="400"></iframe></div>
        </div>
      </div>
    </div>
	</div><?php } ?>
</body>
</html>
