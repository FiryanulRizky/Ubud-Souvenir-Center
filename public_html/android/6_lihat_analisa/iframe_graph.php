<!DOCTYPE html>
<html>
<head>
  <title>Visualisasi</title>  
  <link rel="stylesheet" href="./css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="./css/style.css" /> 
</head>
<script>
  function resizeIframe(obj) {
    obj.style.height = obj.contentWindow.document.documentElement.scrollHeight + 'px';
  }
</script>
<body style="background: #DFE6F0">
<?php ob_start();include '../1_login_reg/login_reg.php';ob_end_clean(); $cek3=mysqli_query($conn,"SELECT * FROM itemc1 WHERE id_toko='$idtoko'");
  if (mysqli_num_rows($cek3)>0) {  ?>
  <div class="row">
    <div class="col-sm-6">
      <div class="panel-group">
        <div class="panel panel-default">
          <div class="panel-heading"><center><H3>PRODUK TERLARIS</H3><form action="barchartsjs.php"><b style="font-style: italic; color: red"><input type="submit" name="pola2item" value="LIHAT DETAIL"></b></form></center></div>
          <div class="panel-body"><iframe src="barchart.php" width=110% frameborder="0" onload="resizeIframe(this)"></iframe></div>
        </div>
      </div>
    </div>
    <a href="tangkap_data_jual_Jan.php">
    <div class="col-sm-6">
      <div class="panel-group">
        <div class="panel panel-default">
          <div class="panel-heading"><center><H3>PERSENTASE PENJUALAN</H3></center></div>
          <div class="panel-body"><iframe src="pie.php" width=110% frameborder="0" onload="resizeIframe(this)"></iframe></div>
        </div>
      </div>
    </div></a>
  </div><?php } $cek4=mysqli_query($conn,"SELECT * FROM pendapatan,graph WHERE pendapatan.id_toko=graph.id_toko AND pendapatan.id_toko='$idtoko'");
  if (mysqli_num_rows($cek4)>0) {  ?>
    <div class="row">
      <div class="panel-group">
        <div class="panel panel-default">
          <div class="panel-heading" background="blue"><center><H3>RIWAYAT TRANSAKSI</H3><table><tr><td><form action="linechart_pendapatan_2.php"><b style="font-style: italic; color: blue"><input type="submit" name="riwayat_trans1" value="PERBESAR"></b></form></td><td>&nbsp;&nbsp;</td><td><form action="tangkap_data_jual_Jan.php"><b style="font-style: italic; color: red"><input type="submit" name="riwayat_trans2" value="DETAIL RIWAYAT"></b></form></td></tr></table></center>
          </div>
          <div class="panel-body"><iframe src="linechart_pendapatan.php" width=100% frameborder="0" onload="resizeIframe(this)"></iframe></div>
        </div>
      </div>
  </div><?php } ?>

</body>
</html>
