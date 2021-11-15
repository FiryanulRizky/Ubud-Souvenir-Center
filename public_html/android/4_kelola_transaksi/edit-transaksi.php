<!DOCTYPE HTML>
<html>
<head>
<title>Edit Data</title>
<link rel="stylesheet" type="text/css" href="../../css/style_admin.css">
</head>
<body>
<?php
include"../../db/koneksi.php"; 
$idtoko=$_GET['idtoko'];
$tanggal = date("Ymd");
            $waktu   = date("His"); 
            $cek_admin=mysqli_query($conn,"SELECT * FROM statistik WHERE id_toko='$idtoko' AND tanggal='$tanggal'");
            while($ambil_ip=mysqli_fetch_array($cek_admin)){ 
                $cek_ip=$ambil_ip['ip'];
            }
            if($cek_ip>1){ 
            echo '<script>alert("Edit Sedang dalam sesi admin lain");window.location="transaksi.php";</script>';
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
      } }

echo'<div id="bgkonten">';
$kode=$_GET['kdtransaksi'];
$query="SELECT * FROM transaksi WHERE id_toko='$idtoko' AND kdtransaksi='$kode'";
$result=mysqli_query($conn,$query);
$row=mysqli_fetch_array($result,MYSQLI_ASSOC);
function generateRandomString($length = 10) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
} $kd_auto=generateRandomString();
?>
<center><h2 style="color: blue">Edit Data Transaksi</h2></center><br>
<form name="form1" method="post" enctype="multipart/form-data">
  <table style="text-align: center;">
    <tr>
      <td>&laquo;&nbsp; KD Transaksi Lama : &laquo;&nbsp;<br><input type="text" name="kdtransaksi_lama" value="<?php echo $kode;?>" class="texbox" readonly><br><br>&laquo;&nbsp;KD Transaksi Baru : &laquo;&nbsp;<br><input type="text" name="kdtransaksi" class="texbox" value="<?php echo $kd_auto; ?>" size="10"><br><br>&laquo;&nbsp;Item Terjual : &laquo;&nbsp;</td></tr><tr><td style="border: 1px solid red"><?php
  $kdtransaksi=$_GET['kdtransaksi'];
  $query=mysqli_query($conn,"SELECT * FROM item WHERE id_toko='$idtoko' ORDER BY kditem ASC");
  while ($row=mysqli_fetch_array($query,MYSQLI_ASSOC)){
    $kditem=$row['kditem'];
    $kueri = mysqli_query ($conn,"SELECT * FROM transaksi WHERE id_toko='$idtoko' AND kdtransaksi='$kdtransaksi' AND kditem='$kditem' ORDER BY kditem desc ");
    $edit = mysqli_fetch_array($kueri,MYSQLI_ASSOC);
    $checked = explode(', ', $edit['kditem']);
  ?>
      <input type="checkbox" name="souvenir_terdaftar[]" id="souvenir_terdaftar" value="<?php echo $row['kditem'];?>" <?php in_array ($row['kditem'], $checked) ? print "checked" : "";  ?> >
      <?php echo $row['merk'];?>
     <?php } ?></td>
    </tr><tr><td><br></td></tr>
    <tr>
      <td>&laquo;&nbsp;Tanggal Transaksi : &laquo;&nbsp;<br><input name="tgltransaksi" type="text" id="tgltransaksi" class="texbox" maxlength="12" value="<?php $tgl=mysqli_query($conn,"SELECT tgltransaksi FROM transaksi WHERE id_toko='$idtoko' AND kdtransaksi='$kdtransaksi'"); $tangkap=mysqli_fetch_array($tgl,MYSQLI_ASSOC); echo date('Y-m-d',strtotime($tangkap['tgltransaksi']));?>" /><br><br>&laquo;&nbsp;Jam Order : &laquo;&nbsp;<br><input name="jam_order" type="text" id="jam_order" class="texbox" maxlength="8" value="<?php $tgl=mysqli_query($conn,"SELECT jam_order FROM transaksi WHERE id_toko='$idtoko' AND kdtransaksi='$kdtransaksi'"); $tangkap=mysqli_fetch_array($tgl,MYSQLI_ASSOC); echo $tangkap['jam_order'];?>" /><br><br><input name="simpan" type="submit" id="simpan" value="Update" class="btn_submit" style="font-family:bauhaus md bt;color:#ffffff;font-size:12pt;border:1px solid #039; background-color:blue;" />
        </form>
        <br><br><form method="post"><input type="submit" name="Submit2" class="btn_submit" value="Batal" style="font-family:bauhaus md bt;color:black;font-size:12pt;border:1px solid #039; background-color:orange;" /></form></td>    
    </tr>
  </table>
</form><?php 
    if(isset($_POST['simpan'])){
     $tgltransaksi=$_POST['tgltransaksi'];
$jam_order=$_POST['jam_order'];
$gejala 	= '';
$events 	= '';
if(empty($_POST['tgltransaksi'])) {
    echo'<script>alert("Jangan kosongkan form tanggal");</script>';
} elseif (empty($_POST['jam_order'])) {
    echo'<script>alert("Jangan kosongkan form jam order");</script>';
} else {
if (isset($_POST['souvenir_terdaftar']))
{
	$selectors 	= htmlentities(implode(',', $_POST['souvenir_terdaftar']));
}
$data=$selectors;
$input = $data;
	  $pecah = explode("\r\n\r\n", $input);
	  $text = "";
	  for ($i=0; $i<=count($pecah)-1; $i++)
	  {
	  	$part = str_replace($pecah[$i], "<p>".$pecah[$i]."</p>", $pecah[$i]);
		$text .=$part;
	  }
$text_line=$data;
$text_line =$data;
$text_line = explode(",",$text_line);
$posisi=0;
if(sizeof($_POST['souvenir_terdaftar'])>=2) {
    if(!preg_match("/^[0-9-]+$/i", $tgltransaksi)) { 
	    echo'<script>alert("form tanggal hanya menerima angka dan - sebagai karakter input, contoh 09-06-2021");window.location="'.$_SERVER['PHP_SELF'].'?idtoko='.$idtoko.'&kdtransaksi='.$_GET['kdtransaksi'].'";</script>';
	} elseif(!preg_match("/^[0-9:]+$/i", $jam_order)){
	    echo'<script>alert("form jam order hanya menerima angka dan : sebagai karakter input, contoh 11:06:25");window.location="'.$_SERVER['PHP_SELF'].'?idtoko='.$idtoko.'&kdtransaksi='.$_GET['kdtransaksi'].'";</script>';
	} else {
$sql_trans=mysqli_query($conn,"SELECT * FROM transaksi id_toko='$idtoko' AND kdtransaksi='".$_POST['kdtransaksi']."'");
$ambil_sql=mysqli_fetch_array($sql_trans);
$kd_tr=$ambil_sql['kdtransaksi'];
if($kd_tr>0) {
    $del_statistik=mysqli_query($conn,"DELETE FROM statistik WHERE id_toko='$idtoko'");
    echo'<script>alert("Mohon Maaf ulangi pengisisan data sekali lagi, sistem mendeteksi duplikasi kode Transaksi");window.location="transaksi.php";</script>';    
} else {
for ($start=0; $start < count($text_line); $start++) {
	$baris=$text_line[$start];
	$sql=mysqli_query($conn,"INSERT INTO transaksi (kdtransaksi,id_toko,kditem,tgltransaksi,jam_order) VALUES ('".$_POST['kdtransaksi']."','$idtoko','$baris','$tgltransaksi','$jam_order')");
	$posisi++;
$queryDel=mysqli_query($conn,"DELETE FROM transaksi WHERE kdtransaksi='".$_POST['kdtransaksi_lama']."'");
$queryDel2=mysqli_query($conn,"UPDATE graph SET Januari=0,Februari=0,Maret=0,April=0,Mei=0,Juni=0,Juli=0,Agustus=0,September=0,Oktober=0,November=0,Desember=0 WHERE id_toko='$idtoko' ORDER BY id_graph ASC");
$queryDel3=mysqli_query($conn,"UPDATE pendapatan SET Januari=0,Februari=0,Maret=0,April=0,Mei=0,Juni=0,Juli=0,Agustus=0,September=0,Oktober=0,November=0,Desember=0 WHERE id_toko='$idtoko' ORDER BY id_hasil ASC");
$del_statistik=mysqli_query($conn,"DELETE FROM statistik WHERE id_toko='$idtoko'");
$cek_pend=mysqli_query($conn,"SELECT * FROM pendapatan WHERE id_toko='$idtoko'");
if (mysqli_num_rows($cek_pend)>0) {
echo'<script>alert("TRANSAKSI UPDATE, GRAFIK LINE PERLU DIPERBARUI");window.location="transaksi.php";</script>'; } 
else {
    	echo'<script>alert("TRANSAKSI BERHASIL DI UPDATE DENGAN KDTRANSAKSI BARU");window.location="transaksi.php";</script>';
    }
} 
} } } else {
        echo'<script>alert("pilih minimal 2 item");</script>';
    } }   
    }elseif (isset($_POST['Submit2'])) {
    $cek_ip=mysqli_query($conn,"SELECT * FROM statistik WHERE id_toko='$idtoko'");
    if (mysqli_num_rows($cek_ip)>0) {
        $del_statistik=mysqli_query($conn,"DELETE FROM statistik WHERE id_toko='$idtoko'");
        echo'<script>window.location="transaksi.php";</script>';
    } else {
        echo'<script>window.location="transaksi.php";</script>';
    }
} ?>
</div>
</body>
</html>
