<html>
    <head>
        <title><?php ob_start();include"../header_session/login_inner.php";ob_end_clean(); $toko=mysqli_query($conn,"SELECT * FROM infotoko WHERE id_toko='$idtoko'"); $ambil_data_toko=mysqli_fetch_array($toko); $nama_toko=$ambil_data_toko['nama_toko']; echo $nama_toko." Visualisasi"; ?></title>
        <link rel="shortcut icon" type="image/x-icon" href="../gambar/images/head_logo.ico" />
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
<script>
  function resizeIframe(obj) {
    obj.style.height = obj.contentWindow.document.documentElement.scrollHeight + 'px';
  }
</script>
</head>
<body>
<?php
include "../header_session/header-visualisasi.php";
?>
<div id="bgkonten">
<div class="container">
  <h2><center>Visualisasi dan Pengetahuan Data</center></h2>
  <?php $cek1=mysqli_query($conn,"SELECT * FROM itemc2 WHERE id_toko='$idtoko' AND lift_ratio>=1");
  if (mysqli_num_rows($cek1)>0) {
  ?>
  <div class="row">
    <div class="col-xs-12">
      <div class="panel-group">
        <div class="panel panel-default">
          <div class="panel-heading"><H3>POLA TRANSAKSI 2 ITEM</H3>
          </div>
          <div class="panel-body"><iframe src="pola_2item.php" width="100%" height="400"></iframe></div>
        </div>
      </div>
    </div>
  </div>
  <?php } $cek2=mysqli_query($conn,"SELECT * FROM itemc3 WHERE id_toko='$idtoko' AND lift_ratio>=1");
  if (mysqli_num_rows($cek2)>0) { ?>
    <div class="row">
    <div class="col-xs-12">
      <div class="panel-group">
        <div class="panel panel-default">
          <div class="panel-heading"><H3>POLA TRANSAKSI 3 ITEM</H3></div>
          <div class="panel-body"><iframe src="pola_3item.php" width="100%" height="400"></iframe></div>
        </div>
      </div>
    </div>
  </div><?php } $cek3=mysqli_query($conn,"SELECT * FROM itemc1 WHERE id_toko='$idtoko'");
  if (mysqli_num_rows($cek3)>0) {  ?>

  <div class="row">
    <div class="col-sm-6">
      <div class="panel-group">
        <div class="panel panel-default">
          <div class="panel-heading"><H3>10 PRODUK TERLARIS (Jumlah Terjual)</H3></div>
          <div class="panel-body"><iframe src="barchartsjs.php" width=100% frameborder="0" scrolling="no" onload="resizeIframe(this)"></iframe></div>
        </div>
      </div>
    </div>

    <div class="col-sm-6">
      <div class="panel-group">
        <div class="panel panel-default">
          <div class="panel-heading"><H3>PERSENTASE PENJUALAN (Top 10 Terlaris)</H3></div>
          <a href="./grafik_line_penjualan/tangkap_data_jual_Jan.php">
          <div class="panel-body"><iframe src="pie.php" width=100% frameborder="0" scrolling="no" onload="resizeIframe(this)"></iframe></div></a>
        </div>
      </div>
    </div>
  </div><?php } $cek4=mysqli_query($conn,"SELECT * FROM pendapatan,graph WHERE pendapatan.id_toko=graph.id_toko AND pendapatan.id_toko='$idtoko'");
  if (mysqli_num_rows($cek4)>0) {  ?>
<a href="./grafik_line_penjualan/tangkap_data_jual_Jan.php">
<div class="row">
    <div class="col-xs-12">
      <div class="panel-group">
        <div class="panel panel-default">
          <div class="panel-heading">
          </div>
          <div class="panel-body"><iframe src="linechart_pendapatan.php" width=100% frameborder="0" scrolling="no" onload="resizeIframe(this)"></iframe></div>
        </div>
      </div>
    </div>
  </div></a>
<?php } 
if(mysqli_num_rows(mysqli_query($conn,"SELECT * FROM itemc1,itemc2,itemc3 WHERE itemc1.id_toko=itemc2.id_toko AND itemc2.id_toko=itemc3.id_toko AND itemc1.id_toko='$idtoko'"))==0) { echo"<center><H3>DATA KOSONG, PROSES APRIORI UNTUK MELIHAT VISUALISASI DATA</H3></center>";} include"../header_session/footer.php";?>
</body>
</html>
