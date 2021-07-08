<html>
    <head>
        <title><?php ob_start();include"../header_session/login_inner.php";ob_end_clean(); $toko=mysqli_query($conn,"SELECT * FROM infotoko WHERE id_toko='$idtoko'"); $ambil_data_toko=mysqli_fetch_array($toko); $nama_toko=$ambil_data_toko['nama_toko']; echo $nama_toko." Set Minsup"; ?></title>
        <link rel="shortcut icon" type="image/x-icon" href="../gambar/images/head_logo.ico" />
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" />
    </head>
<body>
<?php
include "../header_session/header_inner.php";
?>
<div id="bgkonten">
<center><h2 class="art-postheader">Set Minimum Support</h2></center>
<div class="view_data">
  <table border="1" style="border-color:#399;width:100%;">
<tr style="background:linear-gradient(to top, #CCC, #999 );">
			<td align="center">ID Toko</td>
			<td align="center">KD Rule</td>
			<td align="center">Itemset</td>
			<td align="center">Minimum Support %</td>
			<td align="center">Aksi</td>
		</tr>
	<?php
 		$result=mysqli_query($conn,"SELECT * FROM rule WHERE id_toko='$idtoko' ORDER BY kdrule ASC");
 		if(mysqli_num_rows($result)>0){
		while($row = mysqli_fetch_array($result,MYSQLI_ASSOC))
		{
		?>
		<tr>
			<td align="center"><?php echo $row['id_toko'];?></td>
			<td align="center"><?php echo $row['kdrule'];?></td>
			<td align="center"><?php echo $row['itemset'];?></td>
			<td align="center"><?php echo $row['minsupport']."%";?></a></td>
			<td align="center"><a href="../crud/ambil_data_update_minsup.php?kdrule=<?php echo $row['kdrule'];?>"><i class='fa fa-pencil' style='font-size: 20px;'></i></a></td>
	    </tr>
 
		<?php
		} ?></table>
        <form method="post">
        <input type="submit" name="reset" value="Reset" style="width:25%;padding:5px;background:yellow;"></form>
        <?php include"../header_session/footer.php"; echo"</div></div>"; } else {
			echo"<tr><td colspan='5'><center><h3>RULE MASIH KOSONG</h3></center></td></tr><tr><td colspan='5'><center><form method='post'><input type='submit' name='tambah_rule' value='TAMBAH RULE' class='btn_submit'></form></center></td></tr></table>";include"../header_session/footer.php"; echo"</div></div>";?>
			<?php
		}
if(isset($_POST['reset'])) {
   $hapus_rule = mysqli_query($conn,"DELETE FROM rule WHERE id_toko='$idtoko'"); 
   if($hapus_rule) {
       echo'<script>alert("Minimum Support berhasil di reset");window.location="'.$_SERVER['PHP_SELF'].'";</script>';
   } else {
       echo'<script>alert("Gagal melakukan reset (periksa koneksi Anda)");window.location="'.$_SERVER['PHP_SELF'].'";</script>';
   } } elseif(isset($_POST['tambah_rule'])) {
       $cek_jml_rule=mysqli_query($conn,"SELECT * FROM rule WHERE id_toko='$idtoko'");
       if(mysqli_num_rows($cek_jml_rule)==3) {
           echo'<script>alert("Rule sudah di set");window.location="'.$_SERVER['PHP_SELF'].'";</script>';
       }
       $tanggal = date("Ymd");
            $waktu   = date("His"); 
            $cek_admin=mysqli_query($conn,"SELECT * FROM statistik WHERE id_toko='$idtoko' AND tanggal='$tanggal'");
            while($ambil_ip=mysqli_fetch_array($cek_admin)){ 
                $cek_ip=$ambil_ip['ip'];
            }
            if($cek_ip>1){ 
            echo '<script>alert("Set Minimum Support Sedang dalam sesi admin lain");window.location="LANGKAH_1_SET_MINIMUM_SUPPORT.php";</script>';
            } else {
          $ip = $_SERVER['REMOTE_ADDR'];
$tanggal = date("Ymd");
$waktu   = date("His");
$status="admin"; 
$s = mysqli_query($conn,"SELECT * FROM statistik WHERE ip='$ip' AND tanggal='$tanggal' AND id_toko='$idtoko'");
$ambil_data_ip=mysqli_fetch_array($s);
$ambil_ip=$ambil_data_ip['ip'];
if(mysqli_num_rows($s) == 0 && $ambil_ip != $ip){
  mysqli_query($conn,"INSERT INTO statistik(id_toko, ip, tanggal, online, status) VALUES('$idtoko','$ip','$tanggal','$waktu','$status')");} 
      else {
        mysqli_query($conn,"UPDATE statistik SET online='$waktu', status='$status' WHERE ip='$ip' AND tanggal='$tanggal' AND id_toko='$idtoko'");
      }
    echo'<script>window.location="../crud/tambah_minsup_R1.php";</script>';
        }
   }
		?>
		</body>
		</html>