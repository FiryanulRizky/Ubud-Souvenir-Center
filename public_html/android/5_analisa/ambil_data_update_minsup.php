<!DOCTYPE HTML>
<html>
<head>
<title>Edit Data</title>
<link rel="stylesheet" href="../../css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="../css/style_admin.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" />
</head>
<body>
<?php 
ob_start();
include"../1_login_reg/login_reg.php";
ob_end_clean();

$tanggal = date("Ymd");
            $waktu   = date("His"); 
            $cek_admin=mysqli_query($conn,"SELECT * FROM statistik WHERE id_toko='$idtoko' AND tanggal='$tanggal'");
            while($ambil_ip=mysqli_fetch_array($cek_admin)){ 
                $cek_ip=$ambil_ip['ip'];
            }
            if($cek_ip>1){ 
            echo '<script>alert("Hapus Produk Sedang dalam sesi admin lain");window.location="set_minimum_support.php";</script>';
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
$query=mysqli_query($conn,"SELECT * FROM rule WHERE id_toko='$idtoko' AND kdrule='$kode'");
$row=mysqli_fetch_array($query,MYSQLI_ASSOC);
?>
<div id="bgkonten">
<center>
<table style="width:100%;">
  <tr>
    <td colspan="5"><center>
    <H2>Edit Minimum Support</H2>
    </center></td>
  </tr>
  <tr>
  <form name="form1" method="post">
    <tr>
    <td height="27">ID Toko</td>
    <td>:</td>
    <td><input name="kode" type="hidden" id="kode" value="<?php echo $row['id_toko'];?>"><input name="toko2" class="teksbok_admin" type="text" id="toko2" value="<?php echo $row['id_toko'];?>" disabled="true" ></td>
  </tr>
    <tr>
    <td height="27">KD Rule</td>
    <td>:</td>
    <td><input name="kode" type="hidden" id="kode" value="<?php echo $row['kdrule'];?>"><input name="kode2" class="teksbok_admin" type="text" id="kode2" value="<?php echo $row['kdrule'];?>" disabled="true" ></td>
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
          <input type="submit" name="Submit2" value="Batal" class="btn_submit"/></a></td>
        </tr>
  </form>
  </tr>
</table>
</center>
</div><?php
if(isset($_POST['simpan'])){
    if (!preg_match("/^[1-9][0-9]*$/",$_POST['minsupport'])) {
	    echo'<script>alert("Input harus berupa angka");</script>';
	} elseif($_POST['minsupport']<10) {
	    echo'<script>alert("Inputkan minimum 10");</script>';
	} elseif($_POST['minsupport']>50) {
	    echo'<script>alert("Input hanya menerima Rentang 10 - 50");</script>';
	} else {
        $kdrule=$_POST["kode"];
        $minsupport=$_POST["minsupport"];
        $query=mysqli_query($conn,"UPDATE rule SET minsupport='$minsupport' WHERE kdrule='$kdrule' AND id_toko='$idtoko'");
        $del_statistik=mysqli_query($conn,"DELETE FROM statistik WHERE id_toko='$idtoko'");
        echo'<script>alert("Rule Berhasil di Update");window.location="set_minimum_support.php"</script>';

    }
} elseif(isset($_POST['Submit2'])){
    $del_statistik=mysqli_query($conn,"DELETE FROM statistik WHERE id_toko='$idtoko'");
    echo'<script>alert("Update Rule dibatalkan");window.location="set_minimum_support.php";</script>';
} ?>
</body>
</html>