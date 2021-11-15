<html>
    <head>
        <title><?php ob_start();include"../header_session/login_inner.php";ob_end_clean(); $toko=mysqli_query($conn,"SELECT * FROM infotoko WHERE id_toko='$idtoko'"); $ambil_data_toko=mysqli_fetch_array($toko); $nama_toko=$ambil_data_toko['nama_toko']; echo $nama_toko." Tambah Produk"; ?></title>
        <link rel="shortcut icon" type="image/x-icon" href="../gambar/images/head_logo.ico" />
    </head>
<body>
<?php
// *** LOAD ADMIN PAGE HEADER
include "../header_session/header_inner.php";

if ($_POST['act']=="add"){
    
    if (empty($_POST['merk'])) $err['merk']="<span class=\"err\"></span>\n";
    if (empty($_POST['harga'])) $err['harga']="<span class=\"err\"></span>\n";
    if (empty($_POST['stok'])) $err['stok']="<span class=\"err\"></span>\n";
    if($err>0){ 
        echo'<script>alert("Isikan Data Pada Kolom WAJIB DIISI");window.location="tambah_item.php";</script>';
    } else {
    if( !empty($_FILES['gambar_item']['name']) )
    {
    $path = "../gambar/produk/";
    $nama_gambar = $_FILES['gambar_item']['name'];
    $tmp = $_FILES['gambar_item']['tmp_name'];
    $type = pathinfo($nama_gambar, PATHINFO_EXTENSION);
    if ($type!=jpg && $type!=png) {
        echo'<script>alert("inputkan hanya gambar berekstensi jpg/png");</script>';
    } else {
        if (!preg_match("/^[1-9][0-9]*$/",$_POST['harga'])) {
        echo'<script>alert("Harga hanya menerima input angka");</script>';
    } elseif (!preg_match("/^[1-9][0-9]*$/",$_POST['stok'])) {
        echo'<script>alert("Stok hanya menerima input angka");</script>';
    } else {
        $sql_item=mysqli_query($conn,"SELECT * FROM item WHERE id_toko='$idtoko' AND kditem='".$_POST['kditem']."'");
        $ambil_sql=mysqli_fetch_array($sql_item);
        $cek_kd=$ambil_sql['kditem'];
        if($cek_kd>0) {
            $del_statistik=mysqli_query($conn,"DELETE FROM statistik WHERE id_toko='$idtoko'");
            echo'<script>alert("Mohon Maaf ulangi pengisisan data sekali lagi, sistem mendeteksi duplikasi ID Produk");window.location="../PROSES_ALGORITMA_APRIORI/daftar_item.php";</script>';
        } else {
        move_uploaded_file($tmp, $path.$nama_gambar);
        @mysqli_query($conn,"INSERT INTO item (kditem,id_toko,merk,jenis,gambar_item,harga,deskripsi,stok,views) VALUES ("."'".$_POST['kditem']."','".$_POST['id_toko']."','".$_POST['merk']."','".$_POST['jenis']."','".$nama_gambar."','".$_POST['harga']."','".$_POST['deskripsi']."','".$_POST['stok']."',0)"); }
        $cek_jml_item=mysqli_query($conn,"SELECT * FROM item WHERE id_toko='$idtoko'");
    if(mysqli_num_rows($cek_jml_item)>2) {
        echo'<script>window.location="../PROSES_ALGORITMA_APRIORI/daftar_item.php"</script>';
    } else {
        echo'<script>alert("tambah lagi (penuhi syarat minimal item)");window.location="'.$_SERVER['PHP_SELF'].'";</script>';
    }
    }
    }
    } else {
        echo'<script>alert("Harap inputkan gambar");</script>';
        if (!preg_match("/^[1-9][0-9]*$/",$_POST['harga'])) {
        echo'<script>alert("Harga hanya menerima input angka");</script>';
        if (!preg_match("/^[1-9][0-9]*$/",$_POST['stok'])) {
        echo'<script>alert("Stok hanya menerima input angka");</script>';
    }
    }
    } 
    } 
} 
    
    


?>
<div id="bgkonten">
<?php 
function generateRandomString($length = 4) {
    $characters = '0123456789';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
} $id_auto=generateRandomString();

$cek_kat=mysqli_query($conn,"SELECT * FROM kategori WHERE id_toko='$idtoko'");
    if (mysqli_num_rows($cek_kat)>0) { ?>
<td><a href="../PROSES_ALGORITMA_APRIORI/daftar_item.php"><i class="fa fa-arrow-circle-o-left"></i> Back</a></td>
<h1 align="center">Tambah Produk</h1>
<form method="post" enctype="multipart/form-data">
<table>
<?php
$rcat=mysqli_query($conn,"SELECT * FROM infotoko WHERE id_toko='$idtoko'");
while ($rowcat=mysqli_fetch_array($rcat,MYSQLI_ASSOC)){
    $namatoko=$rowcat['id_toko'];
}?>
<tr><td>&laquo;&nbsp;ID Toko <?php echo"= (KDTK".$namatoko.")"; ?></td><td>:</td><td colspan="2">
<input type="text" name="id_toko" class="texbox" value="<?php echo $namatoko; ?>" readonly>
</td></tr>
<tr><td>&laquo;&nbsp;KD Item <?php echo "= BR(".$id_auto.")"; ?></td><td>:</td><td colspan="2"><input name="kditem" class="texbox" value="<?php echo $id_auto; ?>" readonly></td></tr>
<tr><td>&laquo;&nbsp;Nama Produk</td><td>:</td><td colspan="2"><input name="merk" size="30" class="texbox" placeholder="wajib diisi" maxlength="30"></td></tr>
<tr><td>&laquo;&nbsp;Kategori</td><td>:</td><td style="width:8%;"><select name="jenis" class="texbox">
<?php
$rcat=mysqli_query($conn,"SELECT * FROM kategori WHERE id_toko='$idtoko'");
while ($rowcat=mysqli_fetch_array($rcat,MYSQLI_ASSOC)){
      echo ' <option value="'.$rowcat['nama_kategori'].'">'.$rowcat['nama_kategori'].'</option>';
}
?>
</select></td><td><a href="kelola_kategori.php"><input type="button" value="Kelola Kategori" style="width:15%;padding:5px;"></a></td></tr>
<tr><td>&laquo;&nbsp;Input Gambar</td><td>:</td>
<td colspan="2"><input type="file" name="gambar_item" class="texbox"></td></tr>
<tr><td>&laquo;&nbsp;Harga</td><td>:</td><td colspan="2"><input name="harga" size="10" class="texbox" placeholder="wajib diisi" maxlength="9"></td></tr>
<tr><td>&laquo;&nbsp;Deskripsi</td><td>:</td><td colspan="2"><textarea class="ckeditor" cols="80" rows="7" name="deskripsi"></textarea></td></tr>
<tr><td>&laquo;&nbsp;Stok</td><td>:</td><td colspan="2"><input name="stok" size="7" class="texbox" placeholder="wajib diisi" maxlength="4"></td></tr>
<tr>
<td colspan="4" align="center"><input type="submit" value="SIMPAN" class="btn_submit">
    <input type="hidden" name="act" value="add"></td></tr>
    </table>
    </form>
</div>
<div class="cleared"></div> 
<?php } else { 
    echo'<script>
        var yakin = confirm("Kategori Belum Di Set, Tekan OK untuk Lanjutkan");

        if (yakin) {
            window.location = "tambah_kategori.php";
        } else {
            window.location = "../PROSES_ALGORITMA_APRIORI/daftar_item.php";
        }
    </script>';
exit;
}
?></body></html>