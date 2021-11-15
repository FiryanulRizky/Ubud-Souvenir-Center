<!DOCTYPE html>
<html>
<head>
	<title>Menu</title>
	<script>
	    function openNav() {
  document.getElementById("mySidenav").style.width = "250px";
}

function closeNav() {
  document.getElementById("mySidenav").style.width = "0";
} 
	</script>
	<style>
	    .sidenav {
  height: auto;
  width: 0; 
  position: fixed; 
  z-index: 1; 
  top: 0; 
  right: 0;
  background-color: #444; 
  overflow-x: auto; /* Disable horizontal scroll */
  padding-top: 60px; 
  transition: 0.5s;
}
.sidenav a {
  padding: 8px 8px 8px 32px;
  text-decoration: none;
  font-size: 25px;
  color: white;
  display: block;
  transition: 0.3s;
}
.sidenav a:hover {
  color: #f1f1f1;
}

.sidenav .closebtn {
  position: absolute;
  top: 0;
  right: 25px;
  font-size: 36px;
  margin-left: 50px;
}
#main {
  transition: margin-left .5s;
  padding: 20px;
}

@media screen and (max-height: 450px) {
  .sidenav {padding-top: 15px;}
  .sidenav a {font-size: 18px;}
}

.kanan {
  position: fixed; 
  right: 0;
}
	</style>
</head>
<body>
<div id="header">
<div id="mySidenav" class="sidenav">
    <?php ob_start();include"login_inner.php";ob_end_clean(); $sql_order=mysqli_query($conn,"SELECT * FROM pembeli WHERE id_toko='$idtoko' AND status='NEW'");
        $jml_order=mysqli_num_rows($sql_order);
        $sql_item=mysqli_query($conn,"SELECT * FROM item WHERE id_toko='$idtoko' AND stok <= '5'");
        $jml_item=mysqli_num_rows($sql_item);
    ?>
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
  <a href="./admin/index.php">Dashboard <b style="color:yellow;">(<?php echo $jml_order; ?>)</b></a>
  <a href="./PROSES_ALGORITMA_APRIORI/LANGKAH_1_SET_MINIMUM_SUPPORT.php">Set Minsup</a>
  <a href="./PROSES_ALGORITMA_APRIORI/LANGKAH_2_HITUNG_SUPPORT_ITEM_1.php">Proses Apriori</a>
  <a href="./PROSES_ALGORITMA_APRIORI/LANGKAH_6_FREQUENT_ITEM_2.php">Pola 2 Item</a>
  <a href="./PROSES_ALGORITMA_APRIORI/LANGKAH_10_FREQUENT_ITEM_3.php">Pola 3 Item</a>
  <a href="./PROSES_ALGORITMA_APRIORI/data_transaksi.php">Data Transaksi</a>
  <a href="./VISUALISASI_HASIL_APRIORI/index.php">Visualisasi Data</a>
  <a href="./PROSES_ALGORITMA_APRIORI/daftar_item.php">Daftar Produk <b style="color:yellow;">(<?php echo $jml_item; ?>)</b></a>
  <a href="./generator_qrcode/index.php">Generator QR</a>
  <a href="./header_session/konfirmasi_logout.php">Logout</a>
</div>
<div class="kanan"><span onclick="openNav()"><img src="../gambar/images/scroll_right.png" width=50></span></div>
<center>
<table>
<tr><td><?php include"./notifikasi_web/notif_inner.php";?></td><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
<td><?php include"./notifikasi_web/notif_stok_inner.php";?></td>
</tr></table>
</center>
</div>
</body>
</html>