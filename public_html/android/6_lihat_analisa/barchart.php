<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Bar Grafik Penjualan</title>
    <script src="js/Chart.js"></script>
    <style type="text/css">
            .container {
                width: 120%;
                margin: 15px auto;
            }
    </style>
    <link rel="stylesheet" href="./css/bootstrap.min.css">
  </head>
  <body style="background:#DFE6F0;">
  <?php
ob_start();
include"../1_login_reg/login_reg.php";
ob_end_clean();
$cek=mysqli_query($conn,"SELECT * FROM itemc1 WHERE id_toko = '$idtoko'");
  if(mysqli_num_rows($cek)>0) {

    $penjualan  = mysqli_query($conn, "SELECT support_count FROM itemc1 WHERE id_toko='$idtoko' order by support_count DESC LIMIT 10");
    $merk = mysqli_query($conn, "SELECT * FROM itemc1,item WHERE itemc1.kditem=item.kditem AND itemc1.id_toko=item.id_toko AND itemc1.id_toko='$idtoko' GROUP BY itemc1.kditem ORDER BY itemc1.support_count DESC LIMIT 10");
?>

    <div class="container">
        <canvas id="barchart" width="100" height="100"></canvas>
    </div>
<?php } else {
  echo "<br><H2><center>DATA TRANSAKSI MASIH KOSONG</H2></center>";
} ?>
  </body>
</html>

<script  type="text/javascript">
  var ctx = document.getElementById("barchart").getContext("2d");
  var data = {
            labels: [<?php while ($p = mysqli_fetch_array($merk)) { echo '"' . $p['merk'] . '",';}?>],
            datasets: [
            {
              label: "Penjualan Barang",
              data: [<?php while ($p = mysqli_fetch_array($penjualan)) { echo "".$p['support_count'] .",";}?>],
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

  var myBarChart = new Chart(ctx, {
            type: 'bar',
            data: data,
            options: {
            legend: {
              display: false
            },
            barValueSpacing: 20,
            scales: {
              yAxes: [{
                  ticks: {
                      min: 0,
                  }
              }],
              xAxes: [{
                          gridLines: {
                              color: "rgba(0, 0, 0, 0)",
                          }
                      }]
              }
          }
        }); 
</script>