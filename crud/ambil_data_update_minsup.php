<html>
    <head>
        <title><?php ob_start();include"../header_session/login_inner.php";ob_end_clean(); $toko=mysqli_query($conn,"SELECT * FROM infotoko WHERE id_toko='$idtoko'"); $ambil_data_toko=mysqli_fetch_array($toko); $nama_toko=$ambil_data_toko['nama_toko']; echo $nama_toko." Update Minsup"; ?></title>
        <link rel="shortcut icon" type="image/x-icon" href="../gambar/images/head_logo.ico" />
    </head>
<body>
<?php 
include"../header_session/header_inner.php";

$tanggal = date("Ymd");
            $waktu   = date("His"); 
            $cek_admin=mysqli_query($conn,"SELECT * FROM statistik WHERE id_toko='$idtoko' AND tanggal='$tanggal'");
            while($ambil_ip=mysqli_fetch_array($cek_admin)){ 
                $cek_ip=$ambil_ip['ip'];
            }
            if($cek_ip>1){ 
            echo '<script>alert("Hapus Produk Sedang dalam sesi admin lain");window.location="../PROSES_ALGORITMA_APRIORI/LANGKAH_1_SET_MINIMUM_SUPPORT.php";</script>';
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
      } }

$kode=$_GET['kdrule'];
$query="SELECT * FROM rule WHERE id_toko='$idtoko' AND kdrule='$kode'";
$result=mysqli_query($conn, $query);
if($_POST['simpan']=="Update"){
$kdrule=$_POST["kode"];
$minsupport=$_POST["minsupport"];
if (!preg_match("/^[1-9][0-9]*$/",$minsupport)) {
			        echo'<script>alert("Input harus berupa angka");</script>';
			    } else {
$query="UPDATE rule SET minsupport='$minsupport' WHERE kdrule='$kdrule' AND id_toko='$idtoko'";
$del_statistik=mysqli_query($conn,"DELETE FROM statistik WHERE id_toko='$idtoko'");
echo'<script>alert("Rule Berhasil di Update");window.location="../PROSES_ALGORITMA_APRIORI/LANGKAH_1_SET_MINIMUM_SUPPORT.php"</script>';
}
} elseif(isset($_POST['Submit2'])) {
    $del_statistik=mysqli_query($conn,"DELETE FROM statistik WHERE id_toko='$idtoko'");
    echo'<script>window.location="../PROSES_ALGORITMA_APRIORI/LANGKAH_1_SET_MINIMUM_SUPPORT.php";</script>';
}
$result=mysqli_query($conn,$query);
$row=mysqli_fetch_array($result,MYSQLI_ASSOC);
?>
<div id="bgkonten">
<center>
<table>
  <tr>
    <td colspan="5"><center>
    <H2>Edit Minimum Support</H2>
    </center></td>
  </tr>
  <tr>
  <form name="form1" method="post">
    <tr>
    <td width="103" height="27">ID Toko</td>
    <td width="11">:</td>
    <td width="348"><input name="kode" type="hidden" id="kode" value="<?php echo $row['id_toko'];?>"><input name="toko2" class="teksbok_admin" type="text" id="toko2" value="<?php echo $row['id_toko'];?>" disabled="true" ></td>
  </tr>
    <tr>
    <td width="103" height="27">KD Rule</td>
    <td width="11">:</td>
    <td width="348"><input name="kode" type="hidden" id="kode" value="<?php echo $row['kdrule'];?>"><input name="kode2" class="teksbok_admin" type="text" id="kode2" value="<?php echo $row['kdrule'];?>" disabled="true" ></td>
  </tr>
      <tr>
        <td>Itemset</td>
        <td>:</td>
        <td><input name="itemset" class="teksbok_admin" type="text" id="itemset" size="20" maxlength="20" disabled="true" value="<?php echo $row['itemset'];?>"></td>
      </tr>
        <tr>
          <td>Min Support</td>
          <td>:</td>
          <td><input name="minsupport" type="text" class="teksbok_admin" id="minsupport" size="5" maxlength="2" value="<?php echo $row['minsupport'];?>"></td></tr><tr><td><br><br></td></tr><tr><td colspan="3"><input name="simpan" type="submit" id="simpan" value="Update" class="btn_submit" />
          <input type="submit" name="Submit2" value="Batal" class="btn_submit"/></td>
        </tr>
  </form>
  </tr>
</table>
</center>
</div>
</body>
</html>
