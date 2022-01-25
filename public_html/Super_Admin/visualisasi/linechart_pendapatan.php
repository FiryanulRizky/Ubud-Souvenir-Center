<link rel="stylesheet" type="text/css" href="../../css/style_admin.css">
<?php
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
session_start();
include"../../db/koneksi.php";

$idtoko=$_GET['idtoko'];
$jumlah_cek=mysqli_query($conn,"SELECT * FROM pendapatan WHERE id_toko = '".$_GET['idtoko']."'");
$cek=mysqli_query($conn,"SELECT SUM(Januari) AS total FROM pendapatan WHERE id_toko = '".$_GET['idtoko']."'");
$ambil_cek=mysqli_fetch_array($cek);
$cek2=$ambil_cek['total'];
  if(mysqli_num_rows($jumlah_cek)>0 && $cek>0) {

$jan=mysqli_query($conn,"SELECT * FROM pendapatan WHERE id_toko='$idtoko' ORDER BY id_hasil ASC LIMIT 0,1");
$produk1=mysqli_query($conn,"SELECT * FROM pendapatan WHERE id_toko='$idtoko' ORDER BY id_hasil ASC LIMIT 0,1");

$feb=mysqli_query($conn,"SELECT * FROM pendapatan WHERE id_toko='$idtoko' ORDER BY id_hasil ASC LIMIT 1,1");
$produk2=mysqli_query($conn,"SELECT * FROM pendapatan WHERE id_toko='$idtoko' ORDER BY id_hasil ASC LIMIT 1,1");

$mar=mysqli_query($conn,"SELECT * FROM pendapatan WHERE id_toko='$idtoko' ORDER BY id_hasil ASC LIMIT 2,1");
$produk3=mysqli_query($conn,"SELECT * FROM pendapatan WHERE id_toko='$idtoko' ORDER BY id_hasil ASC LIMIT 2,1");

$apr=mysqli_query($conn,"SELECT * FROM pendapatan WHERE id_toko='$idtoko' ORDER BY id_hasil ASC LIMIT 3,1");
$produk4=mysqli_query($conn,"SELECT * FROM pendapatan WHERE id_toko='$idtoko' ORDER BY id_hasil ASC LIMIT 3,1");

$mei=mysqli_query($conn,"SELECT * FROM pendapatan WHERE id_toko='$idtoko' ORDER BY id_hasil ASC LIMIT 4,1");
$produk5=mysqli_query($conn,"SELECT * FROM pendapatan WHERE id_toko='$idtoko' ORDER BY id_hasil ASC LIMIT 4,1");

$jun=mysqli_query($conn,"SELECT * FROM pendapatan WHERE id_toko='$idtoko' ORDER BY id_hasil ASC LIMIT 5,1");
$produk6=mysqli_query($conn,"SELECT * FROM pendapatan WHERE id_toko='$idtoko' ORDER BY id_hasil ASC LIMIT 5,1");

$jul=mysqli_query($conn,"SELECT * FROM pendapatan WHERE id_toko='$idtoko' ORDER BY id_hasil ASC LIMIT 6,1");
$produk7=mysqli_query($conn,"SELECT * FROM pendapatan WHERE id_toko='$idtoko' ORDER BY id_hasil ASC LIMIT 6,1");

$aug=mysqli_query($conn,"SELECT * FROM pendapatan WHERE id_toko='$idtoko' ORDER BY id_hasil ASC LIMIT 7,1");
$produk8=mysqli_query($conn,"SELECT * FROM pendapatan WHERE id_toko='$idtoko' ORDER BY id_hasil ASC LIMIT 7,1");

$sep=mysqli_query($conn,"SELECT * FROM pendapatan WHERE id_toko='$idtoko' ORDER BY id_hasil ASC LIMIT 8,1");
$produk9=mysqli_query($conn,"SELECT * FROM pendapatan WHERE id_toko='$idtoko' ORDER BY id_hasil ASC LIMIT 8,1");

$okt=mysqli_query($conn,"SELECT * FROM pendapatan WHERE id_toko='$idtoko' ORDER BY id_hasil ASC LIMIT 9,1");
$produk10=mysqli_query($conn,"SELECT * FROM pendapatan WHERE id_toko='$idtoko' ORDER BY id_hasil ASC LIMIT 9,1");

$nov=mysqli_query($conn,"SELECT * FROM pendapatan WHERE id_toko='$idtoko' ORDER BY id_hasil ASC LIMIT 10,1");
$produk11=mysqli_query($conn,"SELECT * FROM pendapatan WHERE id_toko='$idtoko' ORDER BY id_hasil ASC LIMIT 10,1");

$des=mysqli_query($conn,"SELECT * FROM pendapatan WHERE id_toko='$idtoko' ORDER BY id_hasil ASC LIMIT 11,1");
$produk12=mysqli_query($conn,"SELECT * FROM pendapatan WHERE id_toko='$idtoko' ORDER BY id_hasil ASC LIMIT 11,1");

?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Grafik Penjualan</title>
    <script src="../../js/Chart.js"></script>
    <style type="text/css">
            .container {
                width: 50%;
                margin: 15px auto;
            }
    </style>
  </head>
  <body>
  <?php 
  $q_nama=mysqli_query($conn,"SELECT nama_toko FROM infotoko WHERE id_toko='".$_GET['idtoko']."'");
  $ambil_nama=mysqli_fetch_array($q_nama);
  $nama_toko=$ambil_nama['nama_toko'];
  ?>
    <br><center><a href="linechart_jumlah_jual.php"><H1>Riwayat Pendapatan <?php echo $nama_toko;?></H1></a></center>
    <div class="container">
        <canvas id="linechart" width="100" height="100"></canvas>
    </div>
<?php } else {
  echo "<br><H2><center>DATA BELUM DIPROSES ADMIN TOKO</H2></center>";
} ?>
  </body>
</html>

<script  type="text/javascript">
  var ctx = document.getElementById("linechart").getContext("2d");
  var data = {
            labels: ["Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember"],
            datasets: [
                  {
                    label: "<?php while($pr=mysqli_fetch_array($produk1)){ echo $pr['produk'];} ?>",
                    fill: false,
                    lineTension: 0.1,
                    backgroundColor: "blue",
                    borderColor: "blue",
                    pointHoverBackgroundColor: "blue",
                    pointHoverBorderColor: "blue",
                    data: [<?php while ($p = mysqli_fetch_array($jan)) { echo '"' . $p['Januari'] . '","' . $p['Februari'] . '","' . $p['Maret'] . '","' . $p['April'] . '","' . $p['Mei'] . '","' . $p['Juni'] . '","' . $p['Juli'] . '","' . $p['Agustus'] . '","' . $p['September'] . '","' . $p['Oktober'] . '","' . $p['November'] . '","' . $p['Desember'] . '",';}?>]
                  },
                  {
                    label: "<?php while($pr=mysqli_fetch_array($produk2)){ echo $pr['produk'];} ?>",
                    fill: false,
                    lineTension: 0.1,
                    backgroundColor: "#2A516E",
                    borderColor: "#2A516E",
                    pointHoverBackgroundColor: "#2A516E",
                    pointHoverBorderColor: "#2A516E",
                    data: [<?php while ($p = mysqli_fetch_array($feb)) { echo '"' . $p['Januari'] . '","' . $p['Februari'] . '","' . $p['Maret'] . '","' . $p['April'] . '","' . $p['Mei'] . '","' . $p['Juni'] . '","' . $p['Juli'] . '","' . $p['Agustus'] . '","' . $p['September'] . '","' . $p['Oktober'] . '","' . $p['November'] . '","' . $p['Desember'] . '",';}?>]
                  },
                  {
                    label: "<?php while($pr=mysqli_fetch_array($produk3)){ echo $pr['produk'];} ?>",
                    fill: false,
                    lineTension: 0.1,
                    backgroundColor: "#F07124",
                    borderColor: "#F07124",
                    pointHoverBackgroundColor: "#F07124",
                    pointHoverBorderColor: "#F07124",
                    data: [<?php while ($p = mysqli_fetch_array($mar)) { echo '"' . $p['Januari'] . '","' . $p['Februari'] . '","' . $p['Maret'] . '","' . $p['April'] . '","' . $p['Mei'] . '","' . $p['Juni'] . '","' . $p['Juli'] . '","' . $p['Agustus'] . '","' . $p['September'] . '","' . $p['Oktober'] . '","' . $p['November'] . '","' . $p['Desember'] . '",';}?>]
                  },
                  {
                    label: "<?php while($pr=mysqli_fetch_array($produk4)){ echo $pr['produk'];} ?>",
                    fill: false,
                    lineTension: 0.1,
                    backgroundColor: "#CBE0E3",
                    borderColor: "#CBE0E3",
                    pointHoverBackgroundColor: "#CBE0E3",
                    pointHoverBorderColor: "#CBE0E3",
                    data: [<?php while ($p = mysqli_fetch_array($apr)) { echo '"' . $p['Januari'] . '","' . $p['Februari'] . '","' . $p['Maret'] . '","' . $p['April'] . '","' . $p['Mei'] . '","' . $p['Juni'] . '","' . $p['Juli'] . '","' . $p['Agustus'] . '","' . $p['September'] . '","' . $p['Oktober'] . '","' . $p['November'] . '","' . $p['Desember'] . '",';}?>]
                  },
                  {
                    label: "<?php while($pr=mysqli_fetch_array($produk5)){ echo $pr['produk'];} ?>",
                    fill: false,
                    lineTension: 0.1,
                    backgroundColor: "#979193",
                    borderColor: "#979193",
                    pointHoverBackgroundColor: "#979193",
                    pointHoverBorderColor: "#979193",
                    data: [<?php while ($p = mysqli_fetch_array($mei)) { echo '"' . $p['Januari'] . '","' . $p['Februari'] . '","' . $p['Maret'] . '","' . $p['April'] . '","' . $p['Mei'] . '","' . $p['Juni'] . '","' . $p['Juli'] . '","' . $p['Agustus'] . '","' . $p['September'] . '","' . $p['Oktober'] . '","' . $p['November'] . '","' . $p['Desember'] . '",';}?>]
                  },
                  {
                    label: "<?php while($pr=mysqli_fetch_array($produk6)){ echo $pr['produk'];} ?>",
                    fill: false,
                    lineTension: 0.1,
                    backgroundColor: "#29B0D0",
                    borderColor: "#29B0D0",
                    pointHoverBackgroundColor: "#29B0D0",
                    pointHoverBorderColor: "#29B0D0",
                    data: [<?php while ($p = mysqli_fetch_array($jun)) { echo '"' . $p['Januari'] . '","' . $p['Februari'] . '","' . $p['Maret'] . '","' . $p['April'] . '","' . $p['Mei'] . '","' . $p['Juni'] . '","' . $p['Juli'] . '","' . $p['Agustus'] . '","' . $p['September'] . '","' . $p['Oktober'] . '","' . $p['November'] . '","' . $p['Desember'] . '",';}?>]
                  },
                  {
                    label: "<?php while($pr=mysqli_fetch_array($produk7)){ echo $pr['produk'];} ?>",
                    fill: false,
                    lineTension: 0.1,
                    backgroundColor: "pink",
                    borderColor: "pink",
                    pointHoverBackgroundColor: "pink",
                    pointHoverBorderColor: "pink",
                    data: [<?php while ($p = mysqli_fetch_array($jul)) { echo '"' . $p['Januari'] . '","' . $p['Februari'] . '","' . $p['Maret'] . '","' . $p['April'] . '","' . $p['Mei'] . '","' . $p['Juni'] . '","' . $p['Juli'] . '","' . $p['Agustus'] . '","' . $p['September'] . '","' . $p['Oktober'] . '","' . $p['November'] . '","' . $p['Desember'] . '",';}?>]
                  },
                  {
                    label: "<?php while($pr=mysqli_fetch_array($produk8)){ echo $pr['produk'];} ?>",
                    fill: false,
                    lineTension: 0.1,
                    backgroundColor: "lightgrey",
                    borderColor: "lightgrey",
                    pointHoverBackgroundColor: "lightgrey",
                    pointHoverBorderColor: "lightgrey",
                    data: [<?php while ($p = mysqli_fetch_array($aug)) { echo '"' . $p['Januari'] . '","' . $p['Februari'] . '","' . $p['Maret'] . '","' . $p['April'] . '","' . $p['Mei'] . '","' . $p['Juni'] . '","' . $p['Juli'] . '","' . $p['Agustus'] . '","' . $p['September'] . '","' . $p['Oktober'] . '","' . $p['November'] . '","' . $p['Desember'] . '",';}?>]
                  },
                  {
                    label: "<?php while($pr=mysqli_fetch_array($produk9)){ echo $pr['produk'];} ?>",
                    fill: false,
                    lineTension: 0.1,
                    backgroundColor: "lightgreen",
                    borderColor: "lightgreen",
                    pointHoverBackgroundColor: "lightgreen",
                    pointHoverBorderColor: "lightgreen",
                    data: [<?php while ($p = mysqli_fetch_array($sep)) { echo '"' . $p['Januari'] . '","' . $p['Februari'] . '","' . $p['Maret'] . '","' . $p['April'] . '","' . $p['Mei'] . '","' . $p['Juni'] . '","' . $p['Juli'] . '","' . $p['Agustus'] . '","' . $p['September'] . '","' . $p['Oktober'] . '","' . $p['November'] . '","' . $p['Desember'] . '",';}?>]
                  },
                  {
                    label: "<?php while($pr=mysqli_fetch_array($produk10)){ echo $pr['produk'];} ?>",
                    fill: false,
                    lineTension: 0.1,
                    backgroundColor: "purple",
                    borderColor: "purple",
                    pointHoverBackgroundColor: "purple",
                    pointHoverBorderColor: "purple",
                    data: [<?php while ($p = mysqli_fetch_array($okt)) { echo '"' . $p['Januari'] . '","' . $p['Februari'] . '","' . $p['Maret'] . '","' . $p['April'] . '","' . $p['Mei'] . '","' . $p['Juni'] . '","' . $p['Juli'] . '","' . $p['Agustus'] . '","' . $p['September'] . '","' . $p['Oktober'] . '","' . $p['November'] . '","' . $p['Desember'] . '",';}?>]
                  },
                  {
                    label: "<?php while($pr=mysqli_fetch_array($produk11)){ echo $pr['produk'];} ?>",
                    fill: false,
                    lineTension: 0.1,
                    backgroundColor: "brown",
                    borderColor: "brown",
                    pointHoverBackgroundColor: "brown",
                    pointHoverBorderColor: "brown",
                    data: [<?php while ($p = mysqli_fetch_array($nov)) { echo '"' . $p['Januari'] . '","' . $p['Februari'] . '","' . $p['Maret'] . '","' . $p['April'] . '","' . $p['Mei'] . '","' . $p['Juni'] . '","' . $p['Juli'] . '","' . $p['Agustus'] . '","' . $p['September'] . '","' . $p['Oktober'] . '","' . $p['November'] . '","' . $p['Desember'] . '",';}?>]
                  },
                  {
                    label: "<?php while($pr=mysqli_fetch_array($produk12)){ echo $pr['produk'];} ?>",
                    fill: false,
                    lineTension: 0.1,
                    backgroundColor: "blue",
                    borderColor: "blue",
                    pointHoverBackgroundColor: "blue",
                    pointHoverBorderColor: "blue",
                    data: [<?php while ($p = mysqli_fetch_array($des)) { echo '"' . $p['Januari'] . '","' . $p['Februari'] . '","' . $p['Maret'] . '","' . $p['April'] . '","' . $p['Mei'] . '","' . $p['Juni'] . '","' . $p['Juli'] . '","' . $p['Agustus'] . '","' . $p['September'] . '","' . $p['Oktober'] . '","' . $p['November'] . '","' . $p['Desember'] . '",';}?>]
                  }
                  ]
          };

  var myBarChart = new Chart(ctx, {
            type: 'line',
            data: data,
            options: {
            legend: {
              display: true
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
