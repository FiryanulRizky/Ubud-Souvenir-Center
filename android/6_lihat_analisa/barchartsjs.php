<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Bar Grafik Penjualan</title>
    <script src="../../js/Chart.js"></script>
    <style type="text/css">
            .container {
                width: 100%;
                margin: 15px auto;
            }
    </style>
    <link rel="stylesheet" href="../../css/bootstrap.min.css">
  </head>
  <body style="background:#DFE6F0;">
  <?php
ob_start();
include"../1_login_reg/login_reg.php";
ob_end_clean();
$cek=mysqli_query($conn,"SELECT * FROM itemc1 WHERE id_toko = '$idtoko'");
  if(mysqli_num_rows($cek)>0) {
echo'<div class="container"><form method="post"><div class="form-group"><div class="form-group"><label for="sel1">Lihat Item berdasarkan Pengurutan :</label>';
        $teratas="";
        $terbawah="";
        if (isset($_POST['kolom'])) {
                if ($_POST['kolom']=="persen_support")
                {
                    $teratas="selected";
                }else if($_POST['kolom']=="support_count") {
                    $terbawah="selected";
                }
            }
      ?>
      <table><tr><td>
      <select class="form-control" name="kolom" required>
                <option value="" >Pilih Sorting :</option>
                <option value="persen_support">Top 5 Penjualan Teratas</option>
                <option value="support_count">Top 5 Penjualan Terendah</option>
         </select></td><td>&nbsp;&nbsp;</td>
    </div>
    <div class="form-group">
        <td><input type="submit" class="btn btn-info" value="Pilih"></form></td><td><form method="post" action="iframe_graph.php"><input type="submit" class="btn btn-info" name="kembali" value="Kembali"></form></td></tr></table>
    </div>
  </div>
</div> 
<?php
    if (isset($_POST['kolom'])) {
      $result=trim($_POST['kolom']);
      if ($_POST['kolom']=="persen_support") {
        $penjualan  = mysqli_query($conn, "SELECT support_count FROM itemc1 WHERE id_toko='$idtoko' ORDER BY support_count DESC LIMIT 5");
        $merk       = mysqli_query($conn, "SELECT * FROM itemc1,item WHERE itemc1.kditem=item.kditem AND itemc1.id_toko=item.id_toko GROUP BY itemc1.kditem ORDER BY itemc1.support_count DESC LIMIT 5"); 
        echo "Data Diurutkan berdasarkan <h3><i>Top 5 penjualan tertinggi</i></h3>";
        ?>
              <form method="post"><button type="submit" name="reset">Hapus Filter</button></form><?php    
      }
      else if ($_POST['kolom']=="support_count") {
        $penjualan  = mysqli_query($conn, "SELECT support_count FROM itemc1 WHERE id_toko='$idtoko' ORDER BY support_count ASC LIMIT 5");
        $merk       = mysqli_query($conn, "SELECT * FROM itemc1,item WHERE itemc1.kditem=item.kditem AND itemc1.id_toko=item.id_toko GROUP BY itemc1.kditem ORDER BY itemc1.support_count ASC LIMIT 5");
        echo "Data Diurutkan berdasarkan <h3><i>Top 5 penjualan terendah</i></h3>";
        ?>
              <form method="post"><button type="submit" name="reset">Hapus Filter</button></form><?php
      } 
    }

  else {
    $penjualan  = mysqli_query($conn, "SELECT support_count FROM itemc1 WHERE id_toko='$idtoko' order by support_count DESC LIMIT 10");
    $merk       = mysqli_query($conn, "SELECT * FROM itemc1,item WHERE itemc1.kditem=item.kditem AND itemc1.id_toko=item.id_toko AND itemc1.id_toko='$idtoko' GROUP BY itemc1.kditem ORDER BY itemc1.support_count DESC LIMIT 10"); }
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