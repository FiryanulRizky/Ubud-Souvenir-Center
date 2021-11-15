<html>
    <head>
        <title><?php ob_start();include"../header_session/login_inner.php";ob_end_clean(); $toko=mysqli_query($conn,"SELECT * FROM infotoko WHERE id_toko='$idtoko'"); $ambil_data_toko=mysqli_fetch_array($toko); $nama_toko=$ambil_data_toko['nama_toko']; echo $nama_toko." Kategori Produk"; ?></title>
        <link rel="shortcut icon" type="image/x-icon" href="../gambar/images/head_logo.ico" />
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" />
    </head>
<body>
<?php
// *** LOAD ADMIN PAGE HEADER
include "../header_session/header_inner.php";
include"../db/web_config.php";
echo"<div id='bgkonten'>";
$result = mysqli_query($conn,"SELECT * FROM kategori WHERE id_toko='$idtoko' ORDER BY id_kategori ASC");
if(empty($_GET['proses'])) {
echo "<center><h2 class='art-postheader'>Kelola Kategori</h2><a href=\"".$_SERVER['PHP_SELF']."?proses=tambah\"><input type='button' value='TAMBAH' class='btn_submit'></a></center><br>";}
if (mysqli_num_rows($result)>0 && empty($_GET['id']) && empty($_GET['proses'])) {
    echo"<center>";
    echo '
    <table border="1" class="bgproduct" style="width:100%; text-align:center;">
    <tr>
    <td><b>NO</td>
    <td align="center"><b>ID KATEGORI</td>
    <td align="center"><b>KATEGORI</td>
    <td colspan="2" align="center"> <b>PILIHAN</td>
    </tr>
    ';
        while ($row = mysqli_fetch_array($result,MYSQLI_ASSOC)){
        echo "<tr><td>".(++$no)."</td>";
        echo "<td>".$row['id_kategori']."</td>";
        echo "<td>".$row['nama_kategori']."</td>"; 
        echo"<td><a href=\"".$_SERVER['PHP_SELF']."?proses=edit&id=".$row['id_kategori']."\"><i class='fa fa-pencil' style='font-size: 20px;'></i></a></td>";
        echo"<td><a href=\"".$_SERVER['PHP_SELF']."?proses=hapus&id=".$row['id_kategori']."\"><i class='fa fa-eraser' style='font-size: 20px;'></i></a></td>";}
      echo "</tr></table>";
    }
     elseif (mysqli_num_rows($result)==0) {
     echo'<script>
        var yakin = confirm("Kategori kosong, proses kategori sekarang ?");

        if (yakin) {
        	window.location = "tambah_kategori.php";
        } else {
            window.location = "../PROSES_ALGORITMA_APRIORI/daftar_item.php";
        }
    </script>';
    } elseif ($_GET['proses']=="tambah") {
    
    $tanggal = date("Ymd");
            $waktu   = date("His"); 
            $cek_admin=mysqli_query($conn,"SELECT * FROM statistik WHERE id_toko='$idtoko' AND tanggal='$tanggal'");
            while($ambil_ip=mysqli_fetch_array($cek_admin)){ 
                $cek_ip=$ambil_ip['ip'];
            }
            if($cek_ip>1){ 
            echo '<script>alert("Tambah Kategori Sedang dalam sesi admin lain");window.location="kelola_kategori.php";</script>';
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
    
    ?>
        
        
        
<td><form method="post"><input type="submit" name="kembali_btn_1" value="Kembali" style="padding:5px;"></form></td>
<h1 align="center">Tambah Kategori</h1>
<form method="post" enctype="multipart/form-data">
<table>
<?php

if(isset($_POST['kembali_btn_1'])) {
    $del_statistik=mysqli_query($conn,"DELETE FROM statistik WHERE id_toko='$idtoko'");
    echo'<script>window.location="kelola_kategori.php";</script>';
}

$cek_kat=mysqli_query($conn,"SELECT id_kategori FROM kategori WHERE id_toko='$idtoko' ORDER BY id_kategori DESC");
$ambil_kat=mysqli_fetch_array($cek_kat);
$kat=$ambil_kat['id_kategori']+1;
?><table>
<tr style ="border:1px solid;text-align:center;">
    <td><input type"text" value="ID Toko" disabled="true" style ="text-align:center;"></td><td><input type"text" value="ID Kategori" disabled="true" style ="text-align:center;"></td><td><input type"text" value="Nama Kategori" size="40" disabled="true" style ="text-align:center;"></td><td><input type"text" value="Aksi" disabled="true" style ="text-align:center;"></td>
</tr><?php
$rcat=mysqli_query($conn,"SELECT * FROM kategori WHERE id_toko='$idtoko'");
while ($rowcat=mysqli_fetch_array($rcat,MYSQLI_ASSOC)){
    $id_kategori=$rowcat['id_kategori'];
    $nama_kategori=$rowcat['nama_kategori'];
?>
<tr>
    <td><input type="text" value="<?php echo $idtoko; ?>" disabled="true" style ="text-align:center;"></td><td><input type="text" value="<?php echo $id_kategori;?>" style ="text-align:center;" disabled="true"></td>
    <td><input size="40" class="texbox" value="<?php echo $nama_kategori; ?>" maxlength="25" style="width:100%;" disabled="true"></td><td><input type="text" value="kategori <?php echo ++$no," berhasil di set";?>" style="width:100%;" disabled="true"></td>
</tr><?php } ?>
<tr>
    <td><input type="text" value="<?php echo $idtoko; ?>" disabled="true" style ="text-align:center;"></td><td><input type="text" value="<?php echo $kat; ?>" style ="text-align:center;" disabled="true"></td>
    <td><input name="nama_kategori" size="40" class="texbox" placeholder="Masukkan Kategori" maxlength="25" style="width:100%;"></td><td><input type="submit" value="SIMPAN" style="width:100%;"><input type="hidden" name="act3" value="add"></td>
</tr>
</table>
</form><?php
if($_POST['act3']=="add") {
    $tambah_kat=mysqli_query($conn,"INSERT INTO kategori (id_toko,nama_kategori) VALUES('$idtoko','".$_POST['nama_kategori']."')");
    if($tambah_kat){
        $del_statistik=mysqli_query($conn,"DELETE FROM statistik WHERE id_toko='$idtoko'");
        echo'<script>alert("kategori berhasil di set");</script>';
    } else {
        echo'<script>alert("kategori gagal di set");</script>';
    }
}
        

        
    } elseif ($_GET['proses']=="edit") {

$tanggal = date("Ymd");
            $waktu   = date("His"); 
            $cek_admin=mysqli_query($conn,"SELECT * FROM statistik WHERE id_toko='$idtoko' AND tanggal='$tanggal'");
            while($ambil_ip=mysqli_fetch_array($cek_admin)){ 
                $cek_ip=$ambil_ip['ip'];
            }
            if($cek_ip>1){ 
            echo '<script>alert("Update Kategori Sedang dalam sesi admin lain");window.location="kelola_kategori.php";</script>';
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

if (!empty($_GET['id'])){
    
    $rs=@mysqli_query($conn,"SELECT * FROM kategori WHERE id_toko='$idtoko' AND id_kategori='".$_GET['id']."'");
    $row=@mysqli_fetch_array($rs,MYSQLI_ASSOC);

echo '<form method="post"><input type="submit" name="kembali_2" value="Kembali" style="background:lightgrey;padding:10px;font-weight:bold;"></form>';

if (isset($_POST['kembali_2'])) {
    $cek_ip=mysqli_query($conn,"SELECT * FROM statistik WHERE id_toko='$idtoko'");
    if (mysqli_num_rows($cek_ip)>0) {
        $del_statistik=mysqli_query($conn,"DELETE FROM statistik WHERE id_toko='$idtoko'");
        echo'<script>window.location="kelola_kategori.php";</script>';
    } else {
        echo'<script>window.location="kelola_kategori.php";</script>';
    }
}

echo'<h1 align="center">Edit Kategori</h1>
<form method="post" enctype="multipart/form-data"><table>
<tr><td>&raquo;&nbsp;ID Kategori</td><td>:</td><td><input class="texbox" value="'.$row['id_kategori'].'" disabled="true"></td></tr>
<tr><td>&raquo;&nbsp;Nama Kategori</td><td>:</td><td><input name="nama_kat_upd" class="texbox" value="'.$row['nama_kategori'].'"></td></tr>
<tr><td>
    <input type="submit" value="UPDATE" class="btn_submit">
    <input type="hidden" name="act" value="edit">
    </form></td></tr>';
}
echo"</table>";
if ($_POST['act']=="edit"){
    $sql=mysqli_query($conn,"UPDATE kategori SET nama_kategori='".$_POST['nama_kat_upd']."' WHERE id_toko='$idtoko' AND id_kategori='".$_GET['id']."'");
    $del_statistik=mysqli_query($conn,"DELETE FROM statistik WHERE id_toko='$idtoko'");
    if($sql) {
        echo'<script>alert("Update berhasil");window.location="kelola_kategori.php"</script>';
    } else {
        echo'<script>alert("Update gagal");</script>';
    }
}
        
    } elseif ($_GET['proses']=="hapus") {

$tanggal = date("Ymd");
            $waktu   = date("His"); 
            $cek_admin=mysqli_query($conn,"SELECT * FROM statistik WHERE id_toko='$idtoko' AND tanggal='$tanggal'");
            while($ambil_ip=mysqli_fetch_array($cek_admin)){ 
                $cek_ip=$ambil_ip['ip'];
            }
            if($cek_ip>1){ 
            echo '<script>alert("Hapus Kategori Sedang dalam sesi admin lain");window.location="kelola_kategori.php";</script>';
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

if (!empty($_GET['id'])){
    
    $rs=@mysqli_query($conn,"SELECT * FROM kategori WHERE id_toko='$idtoko' AND id_kategori='".$_GET['id']."'");
    $row=@mysqli_fetch_array($rs,MYSQLI_ASSOC);

echo '<form method="post"><input type="submit" name="kembali_3" value="Batal Hapus" style="background:lightgrey;padding:10px;font-weight:bold;"></form>';

if (isset($_POST['kembali_3'])) {
    $cek_ip=mysqli_query($conn,"SELECT * FROM statistik WHERE id_toko='$idtoko'");
    if (mysqli_num_rows($cek_ip)>0) {
        $del_statistik=mysqli_query($conn,"DELETE FROM statistik WHERE id_toko='$idtoko'");
        echo'<script>window.location="kelola_kategori.php";</script>';
    } else {
        echo'<script>window.location="kelola_kategori.php";</script>';
    }
}

echo'<form method="post" enctype="multipart/form-data"><table style="border:1px solid;text-align:center;">
<tr><td colspan="3"><h3>Hapus data ini ?</h3></td></tr>
<tr><td>ID Kategori</td><td>:</td><td>'.$row['id_kategori'].'</td></tr>
<tr><td>Nama Kategori</td><td>:</td><td>'.$row['nama_kategori'].'</td></tr>
<tr><td colspan="3"><br></td></tr>
<tr><td colspan="3">
    <input type="submit" value="HAPUS" class="btn_submit">
    <input type="hidden" name="act2" value="hapus">
    </td></tr></table></form>';
}
if ($_POST['act2']=="hapus"){
    $sql=mysqli_query($conn,"DELETE FROM kategori WHERE id_toko='$idtoko' AND id_kategori='".$_GET['id']."'");
    $del_statistik=mysqli_query($conn,"DELETE FROM statistik WHERE id_toko='$idtoko'");
    if($sql) {
        echo'<script>alert("Update berhasil");window.location="kelola_kategori.php"</script>';
    } else {
        echo'<script>alert("Update gagal");</script>';
    }
}
    }
        

echo"</center>";include"../header_session/footer.php";echo"</div>";?></body></html>