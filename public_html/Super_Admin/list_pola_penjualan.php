<!DOCTYPE html>
<html>
<head>
  <title>Visualisasi Pola</title>
  <link rel="shortcut icon" type="image/x-icon" href="../gambar/images/head_logo.ico" />
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
<?php 
ob_start();
include"../header_session/login_sp.php";
ob_end_clean();
include"../header_session/header_sp.php";
echo'<div id="bgkonten">';
$cek=mysqli_query($conn,"SELECT * FROM itemc2,itemc3 WHERE itemc2.id_toko=itemc3.id_toko");
$sql_trans=mysqli_query($conn,"SELECT * FROM transaksi GROUP BY kdtransaksi");
$jml_pola=mysqli_num_rows($sql_trans);
  if (mysqli_num_rows($cek)>0) {
  ?>
<div class="container">
  <h2><center>List Pola Penjualan (total : <?php echo $jml_pola; ?> transaksi)</center></h2>
  <div class="row">
    <div class="col-xs-12">
      <div class="panel-group">
        <div class="panel panel-default">
          <div class="panel-heading"><H3>POLA TRANSAKSI 2 ITEM</H3>
          </div>
          <div class="panel-body"><iframe src="./visualisasi/pola_2item.php" width="100%" height="400"></iframe></div>
        </div>
      </div>
    </div>
  </div>

  <div class="row">
    <div class="col-xs-12">
      <div class="panel-group">
        <div class="panel panel-default">
          <div class="panel-heading"><H3>POLA TRANSAKSI 3 ITEM</H3></div>
          <div class="panel-body"><iframe src="./visualisasi/pola_3item.php" width="100%" height="400"></iframe></div>
        </div>
      </div>
    </div>
  </div>
</div>
  <?php include"../header_session/footer_sp.php"; } else {
  echo"<br><CENTER><H3>DATA KOSONG</H3></CENTER>"; include"../header_session/footer_sp.php";
} echo"</div>";
?>