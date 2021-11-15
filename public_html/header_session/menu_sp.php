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
    <?php ob_start();include"../db/koneksi.php";ob_end_clean(); $sql_toko=mysqli_query($conn,"SELECT * FROM infotoko WHERE status='Peninjauan Penghapusan'");
        $jml_toko=mysqli_num_rows($sql_toko);
        $sql_toko2=mysqli_query($conn,"SELECT * FROM infotoko WHERE status='in Trouble'");
        $jml_toko2=mysqli_num_rows($sql_toko2);
        $sql_testi=mysqli_query($conn,"SELECT * FROM riwayat_testi");
        $jml_testi=mysqli_num_rows($sql_testi);
    ?>
    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
    <a href="../Super_Admin/index.php"><span class="l">Dashboard</a>
	<a href="../Super_Admin/halaman_tinjau_akun.php">Tinjau Hapus <b style="color:yellow;">(<?php echo $jml_toko; ?>)</b></a>
	<a href="../Super_Admin/halaman_tinjau_resesi.php">Tinjau Resesi <b style="color:yellow;">(<?php echo $jml_toko2; ?>)</b></a>
	<a href="../Super_Admin/pesan_sp.php">Kritik/Testi <b style="color:yellow;">(<?php echo $jml_testi; ?>)</b></a>
	<a href="../Super_Admin/list_pola_penjualan.php">Pola Transaksi</a>
	<a href="../header_session/konfirmasi_logout_sp.php"><span class="l">Logout</a>
</div>
<div class="kanan"><span onclick="openNav()"><img src="../gambar/images/scroll_right.png" width=50></span></div>
<center>
<table>
<tr><td><?php include"../notifikasi_web/notif_hapus_toko.php";?></td><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
<td><?php include"../notifikasi_web/notif_status_resesi.php";?></td>
</tr></table>
</center>
</div>
</body>
</html>