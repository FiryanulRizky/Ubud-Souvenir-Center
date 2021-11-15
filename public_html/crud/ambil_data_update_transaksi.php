<html>
    <head>
        <title><?php ob_start();include"../header_session/login_inner.php";ob_end_clean(); $toko=mysqli_query($conn,"SELECT * FROM infotoko WHERE id_toko='$idtoko'"); $ambil_data_toko=mysqli_fetch_array($toko); $nama_toko=$ambil_data_toko['nama_toko']; echo $nama_toko." Update Transaksi"; ?></title>
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
            echo '<script>alert("Update Transaksi Sedang dalam sesi admin lain");window.location="../PROSES_ALGORITMA_APRIORI/data_transaksi.php";</script>';
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

echo'<div id="bgkonten">';
$kode=$_GET['kdtransaksi'];
$query="SELECT * FROM transaksi WHERE id_toko='$idtoko' AND kdtransaksi='$kode'";
$result=mysqli_query($conn,$query);
$row=mysqli_fetch_array($result,MYSQLI_ASSOC);
?>
<form name="form1" method="post" enctype="multipart/form-data" action="update_transaksi.php?idtoko=<?php echo $idtoko; ?>&kdtransaksi=<?php echo $_GET['kdtransaksi']; ?>">
  <table width="700" border="0" align="center" cellpadding="0" cellspacing="0">
    <tr>
      <td height="32" colspan="4"><center>EDIT DATA TRANSAKSI</center></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td width="543" colspan="2">&nbsp;</td>
    </tr>
    <tr>
      <td width="145">KD Transaksi Lama</td>
      <td width="12">:</td>
      <td><input type="text" name="kdtransaksi_lama" value="<?php echo $_GET['kdtransaksi'];?>" size="10" readonly> <?php echo "<i>*KDTR".$_GET['kdtransaksi']."</i>"?></td>
    </tr>
    <?php function generateRandomString($length = 10) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
} $kd_auto=generateRandomString();?>
    <tr>
      <td width="145">KD Transaksi Baru</td>
      <td width="12">:</td>
      <td colspan="2"><input type="text" name="kdtransaksi" value="<?php echo $kd_auto; ?>" size="10"> <?php echo "<i>*KDTR".$kd_auto."</i>"?></td>
    </tr>
    <tr>
      <td>Item Terjual</td>
      <td>:</td>
      <td colspan="2"><br /><?php
  $kdtransaksi=$_GET['kdtransaksi'];
  $query=mysqli_query($conn,"SELECT * FROM item WHERE id_toko='$idtoko' ORDER BY kditem ASC");
  while ($row=mysqli_fetch_array($query,MYSQLI_ASSOC)){
    $kditem=$row['kditem'];
    $kueri = mysqli_query ($conn,"SELECT * FROM transaksi WHERE id_toko='$idtoko' AND kdtransaksi='$kdtransaksi' AND kditem='$kditem' ORDER BY kditem desc ");
    $edit = mysqli_fetch_array($kueri,MYSQLI_ASSOC);
    $checked = explode(', ', $edit['kditem']);
  ?>
      <input type="checkbox" name="souvenir_terdaftar[]" id="souvenir_terdaftar" value="<?php echo $row['kditem'];?>" <?php in_array ($row['kditem'], $checked) ? print "checked" : "";  ?> >
      <?php echo $row['merk'];
     } ?></td>
    </tr>
    <tr>
      <td>Tanggal Transaksi</td>
      <td>:</td>
      <td colspan="2"><input name="tgltransaksi" type="text" id="tgltransaksi" size="20" maxlength="10" value="<?php $tgl=mysqli_query($conn,"SELECT tgltransaksi FROM transaksi WHERE id_toko='$idtoko' AND kdtransaksi='$kdtransaksi'"); $tangkap=mysqli_fetch_array($tgl,MYSQLI_ASSOC); echo $tangkap['tgltransaksi'];?>" /> <i>*thn-bln-tgl</i></td>
    </tr>
    <tr>
      <td>Jam Order</td>
      <td>:</td>
      <td colspan="2"><input name="jam_order" type="text" id="jam_order" size="20" maxlength="8" value="<?php $tgl=mysqli_query($conn,"SELECT jam_order FROM transaksi WHERE id_toko='$idtoko' AND kdtransaksi='$kdtransaksi'"); $tangkap=mysqli_fetch_array($tgl,MYSQLI_ASSOC); echo $tangkap['jam_order'];?>" /> <i>*jam-mnt-dtk</i></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td colspan="2">&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td><input name="simpan" type="submit" id="simpan" value="Update" class="btn_submit" style="font-family:bauhaus md bt;color:#ffffff;font-size:12pt;border:1px solid #039; background-color:blue;" />
        </form>
        <td><form method="post"><input type="submit" name="Submit2" class="btn_submit" value="Batal" style="font-family:bauhaus md bt;color:#ffffff;font-size:12pt;border:1px solid #039; background-color:orange;" /></form></td>    
    </tr>
  </table>
</form><?php if (isset($_POST['Submit2'])) {
    $cek_ip=mysqli_query($conn,"SELECT * FROM statistik WHERE id_toko='$idtoko'");
    if (mysqli_num_rows($cek_ip)>0) {
        $del_statistik=mysqli_query($conn,"DELETE FROM statistik WHERE id_toko='$idtoko'");
        echo'<script>window.location="../PROSES_ALGORITMA_APRIORI/data_transaksi.php";</script>';
    } else {
        echo'<script>window.location="../PROSES_ALGORITMA_APRIORI/data_transaksi.php";</script>';
    }
} ?>
</div>
</body>
</html>
