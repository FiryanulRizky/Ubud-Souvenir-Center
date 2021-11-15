<html>
    <head>
        <title><?php ob_start();include"../header_session/login_inner.php";ob_end_clean(); $toko=mysqli_query($conn,"SELECT * FROM infotoko WHERE id_toko='$idtoko'"); $ambil_data_toko=mysqli_fetch_array($toko); $nama_toko=$ambil_data_toko['nama_toko']; echo $nama_toko." Update Produk"; ?></title>
        <link rel="shortcut icon" type="image/x-icon" href="../gambar/images/head_logo.ico" />
    </head>
<body>
<?php
// *** LOAD ADMIN PAGE HEADER
include "../header_session/header_inner.php";

$tanggal = date("Ymd");
            $waktu   = date("His"); 
            $cek_admin=mysqli_query($conn,"SELECT * FROM statistik WHERE id_toko='$idtoko' AND tanggal='$tanggal'");
            while($ambil_ip=mysqli_fetch_array($cek_admin)){ 
                $cek_ip=$ambil_ip['ip'];
            }
            if($cek_ip>1){ 
            echo '<script>alert("Update Produk Sedang dalam sesi admin lain");window.location="../PROSES_ALGORITMA_APRIORI/daftar_item.php"</script>';
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

if ($_POST['act']=="edit"){

  if( !empty($_FILES['gambar_item2']['name']) )
    {
    $path = "../gambar/produk/";
    $nama_gambar = $_FILES['gambar_item2']['name'];
    $tmp = $_FILES['gambar_item2']['tmp_name'];
    $type = pathinfo($nama_gambar, PATHINFO_EXTENSION);
    if ($type!=jpg && $type!=png) {
        echo '
    <script>alert("Update gagal, file gambar harus berekstensi jpg/png");</script>
    ';
    } else {
    $gambar2=mysqli_query($conn,"SELECT * FROM item WHERE id_toko='$idtoko' AND gambar_item='".$_POST['gambar_item']."'");
    $nama_gambar2=mysqli_fetch_array($gambar2,MYSQLI_ASSOC);
    $hapus_gambar=$nama_gambar2['gambar_item'];
    $files=glob("../gambar/produk/".$hapus_gambar."");
    foreach ($files as $file) {
    if (is_file($file))
    unlink($file); // hapus file 
	}
         move_uploaded_file($tmp, $path.$nama_gambar);
    @mysqli_query($conn,"UPDATE item SET kditem='".$_POST['kditem']."',"."merk='".$_POST['merk']."',"
    ."jenis='".$_POST['kategori']."',"
    ."gambar_item='".$nama_gambar."', "."deskripsi='".$_POST['deskripsi']."', "."harga='".$_POST['harga']."', "
    ."stok='".$_POST['stok']."' WHERE id_item='".$_GET['id']."' AND id_toko='$idtoko'");
    $del_statistik=mysqli_query($conn,"DELETE FROM statistik WHERE id_toko='$idtoko'");
    echo '
    <script>alert("Update berhasil");window.location="../PROSES_ALGORITMA_APRIORI/daftar_item.php"</script>
    ';
    }
    } else {

   @mysqli_query($conn,"UPDATE item SET kditem='".$_POST['kditem']."',"." merk='".$_POST['merk']."',"
    ."jenis='".$_POST['kategori']."',"
    ."gambar_item='".$_POST['gambar_item']."', "."deskripsi='".$_POST['deskripsi']."', "."harga='".$_POST['harga']."', "
    ."stok='".$_POST['stok']."' WHERE id_item='".$_GET['id']."' AND id_toko='$idtoko'");
    $del_statistik=mysqli_query($conn,"DELETE FROM statistik WHERE id_toko='$idtoko'");
    echo '
    <script>alert("Update berhasil");window.location="../PROSES_ALGORITMA_APRIORI/daftar_item.php"</script>
    ';
}
}

if (!empty($_GET['id'])){
    
    $rs=@mysqli_query($conn,"SELECT * FROM item WHERE id_toko='$idtoko' AND id_item='".$_GET['id']."'");
    $row=@mysqli_fetch_array($rs,MYSQLI_ASSOC);

			if (file_exists("../gambar/produk/".$row['gambar_item'].""))
                $gambar="<a href=\"\"><img src=\"../gambar/produk/".$row['gambar_item']."\" width=50></br>view image</a>";
            else
                $gambar="";

echo '
<div id="bgkonten">
<form method="post"><input type="submit" name="kembali_2" value="Kembali" style="background:lightgrey;padding:10px;font-weight:bold;"></form>
<h1 align="center">Edit Produk</h1>
<form method="post" enctype="multipart/form-data">';
if (isset($_POST['kembali_2'])) {
    $cek_ip=mysqli_query($conn,"SELECT * FROM statistik WHERE id_toko='$idtoko'");
    if (mysqli_num_rows($cek_ip)>0) {
        $del_statistik=mysqli_query($conn,"DELETE FROM statistik WHERE id_toko='$idtoko'");
        echo'<script>window.location="../PROSES_ALGORITMA_APRIORI/daftar_item.php";</script>';
    } else {
        echo'<script>window.location="../PROSES_ALGORITMA_APRIORI/daftar_item.php";</script>';
    }
}

echo'<table>
<tr><td>&raquo;&nbsp;kategori</td><td>:</td> <td><select name="kategori" class="texbox">';

$rcat=@mysqli_query($conn,"SELECT * FROM kategori WHERE id_toko='$idtoko'");

while ($rowcat = @mysqli_fetch_array($rcat,MYSQLI_ASSOC)) {
      echo '<option value="'.$rowcat['nama_kategori'].'" ';
      if ($row['item']==$rowcat['nama_kategori']) echo "selected";
      echo '>'.$rowcat['nama_kategori'].'</option>';
}

echo '</select></td></tr>
<tr><td>&raquo;&nbsp;ID Toko</td><td>:</td><td><input name="id_toko"  class="texbox" value="'.$idtoko.'" readonly></td></tr>
<tr><td>&raquo;&nbsp;ID Item</td><td>:</td><td><input name="kditem" class="texbox" value="'.$row['kditem'].'" maxlength="4"></td></tr>
<tr><td>&raquo;&nbsp;Nama Produk</td><td>:</td><td><input name="merk" class="texbox" value="'.$row['merk'].'" maxlength="30" size="30"></td></tr>
<tr><td>&raquo;&nbsp;Deskripsi</td><td>:</td><td><textarea class="ckeditor" cols="80" rows="7" name="deskripsi">'.$row['deskripsi'].'</textarea></td></tr>
<tr><td>&raquo;&nbsp;Harga</td><td>:</td><td><input name="harga" class="texbox" value="'.$row['harga'].'" maxlength="9"></td></tr>
<tr><td>&raquo;&nbsp;Stok</td><td>:</td><td><input name="stok" class="texbox" value="'.$row['stok'].'" maxlength="4"></td></tr>
<input type="hidden" name="gambar_item" value="'.$row['gambar_item'].'">
<tr><td>&raquo;&nbsp;<input type="file" name="gambar_item2" value="'.$row['gambar_item'].'"></br>'.$gambar.'</td></tr>
<tr><td>
    <input type="submit" value="UPDATE" class="btn_submit">
    <input type="hidden" name="act" value="edit">
    <input type="hidden" name="id" value="'.$row['kditem'].'">
    </form></td></tr>';

}
echo"</table>";
echo'</div>';

?>
<div class="cleared"></div>
<?php
include"../header_session/footer.php";
?>
</div></body></html>
