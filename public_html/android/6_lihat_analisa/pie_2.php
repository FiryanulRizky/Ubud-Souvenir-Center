<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Persentase Penjualan Terlaris</title>
    <script src="js/Chart.js"></script>
    <style type="text/css">
            .container {
                width: 90%;
                margin: 15px auto;
            }
    </style>
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../../style_admin.css">
  </head>
  <body style="background:#DFE6F0;">
  <br><center><form method="post" action="iframe_graph.php">
        <input type="submit" class="btn_submit" value="Kembali"></form></center>
<?php
ob_start();
include "../1_login_reg/login_reg.php";
ob_end_clean();
$cek=mysqli_query($conn,"SELECT * FROM itemc1 WHERE id_toko = '$idtoko'");
  if(mysqli_num_rows($cek)>0) {
$penjualan  = mysqli_query($conn, "SELECT persen_support FROM itemc1 WHERE id_toko='$idtoko' order by persen_support DESC LIMIT 10");
$merk       = mysqli_query($conn, "SELECT * FROM itemc1,item WHERE itemc1.kditem=item.kditem AND itemc1.id_toko=item.id_toko AND itemc1.id_toko='$idtoko' GROUP BY itemc1.kditem ORDER BY itemc1.persen_support DESC LIMIT 10");
?>

    <div class="container">
        <canvas id="piechart" width="100" height="100"></canvas>
    </div>
<?php } else {
  echo "<br><H2><center>DATA TRANSAKSI MASIH KOSONG</H2></center>";
} ?>
  </body>
</html>

<script  type="text/javascript">
  var ctx = document.getElementById("piechart").getContext("2d");
  var data = {
            labels: [<?php while ($p = mysqli_fetch_array($merk)) { echo '"' . $p['merk'] . " : " . $p['persen_support'] . "%" .'",';}?>],
            datasets: [
            { 
              label: "Persentase",
              data: [<?php while ($p = mysqli_fetch_array($penjualan)) {echo "".$p['persen_support'].",";}?>],
              backgroundColor: [
                '#29B0D0',
                '#2A516E',
                '#F07124',
                '#CBE0E3',
                '#979193',
                'lightblue',
                'orange',
                'lightgreen',
                'pink',
                'blue',
              ]
            }
            ]
            };

  var myPieChart = new Chart(ctx, {
                  type: 'pie',
                  data: data,
                  options: {
                    responsive: true
                  }
              });

</script>