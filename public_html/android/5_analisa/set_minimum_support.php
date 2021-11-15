<link rel="stylesheet" href="../../css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="../css/style_admin.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" />
<?php
ob_start();
include "../1_login_reg/login_reg.php";
ob_end_clean();
include"../notif/notif_android.php";
?>
<div id="bgkonten">
<div class="konten_tabel">
</div>
<div class="view_data">
    <center><h2>Set Support Minimum</h2></center>
  <table border="1" style="width:100%;border:thin; border-color:#399; padding-left:3px; margin-top:5px;">
<tr style="background:linear-gradient(to top, #CCC, #999 );">
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
			<td align="center"><?php echo $row['kdrule'];?></td>
			<td align="center"><?php echo $row['itemset'];?></td>
			<td align="center"><?php echo $row['minsupport']."%";?></a></td>
			<td align="center"><a href="ambil_data_update_minsup.php?kdrule=<?php echo $row['kdrule'];?>"><i class='fa fa-pencil' style='font-size: 20px;'></i></a></td>
	    </tr>
		<?php  } 
		?></table>
        <form method="post">
        <input type="submit" name="reset" value="Reset" style="padding:5px;background:yellow;"></form><?php } else {
			echo"<tr><td colspan='5'><center><h3>RULE MASIH KOSONG</h3></center></td></tr><tr><td colspan='5'><center><form method='post'><input type='submit' name='tambah_rule' value='TAMBAH RULE' class='btn_submit' style='background:orange;'></form></center></td></tr>";?>
			<?php
		}
		if(isset($_POST['reset'])) {
   $hapus_rule = mysqli_query($conn,"DELETE FROM rule WHERE id_toko='$idtoko'"); 
   if($hapus_rule) {
       echo'<script>alert("Minimum Support berhasil di reset");window.location="'.$_SERVER['PHP_SELF'].'";</script>';
   } else {
       echo'<script>alert("Gagal melakukan reset (periksa koneksi Anda)");window.location="'.$_SERVER['PHP_SELF'].'";</script>';
   } } elseif(isset($_POST['tambah_rule'])){
       $cek_jml_rule=mysqli_query($conn,"SELECT * FROM rule WHERE id_toko='$idtoko'");
       if(mysqli_num_rows($cek_jml_rule)==3) {
           echo'<script>alert("Rule sudah di set");window.location="'.$_SERVER['PHP_SELF'].'";</script>';
       }
       $tanggal = date("Ymd");
            $waktu   = date("His"); 
            $cek_admin=mysqli_query($conn,"SELECT * FROM statistik WHERE id_toko='$idtoko' AND tanggal='$tanggal'");
            $ambil_ip=mysqli_fetch_array($cek_admin); 
            $cek_ip=$ambil_ip['ip'];
            if($cek_ip>1){ 
            echo '<script>alert("Penambahan minimum support Sedang dalam sesi admin lain");window.location="set_minimum_support.php";</script>';
            } else {
                $ip = $_SERVER['REMOTE_ADDR']; // Mendapatkan IP komputer user
$tanggal = date("Ymd"); // Mendapatkan tanggal sekarang
$waktu   = date("His"); // 
// Mencek berdasarkan IPnya, apakah user sudah pernah mengakses hari ini
$status="admin"; 
$s = mysqli_query($conn,"SELECT * FROM statistik WHERE ip='$ip' AND tanggal='$tanggal' AND id_toko='$idtoko'");
$ambil_data_ip=mysqli_fetch_array($s);
$ambil_ip=$ambil_data_ip['ip'];
// Kalau belum ada, simpan data user tersebut ke database
if(mysqli_num_rows($s) == 0 && $ambil_ip != $ip){
  mysqli_query($conn,"INSERT INTO statistik(id_toko, ip, tanggal, online, status) VALUES('$idtoko','$ip','$tanggal','$waktu','$status')");} 
      else {
        mysqli_query($conn,"UPDATE statistik SET online='$waktu', status='$status' WHERE ip='$ip' AND tanggal='$tanggal' AND id_toko='$idtoko'");
      }
      echo'<script>window.location="tambah_minsup_R1.php";</script>';
   } 
}
		?>
</div>
</div>
</div>