<link rel="stylesheet" type="text/css" href="../../css/style_admin.css">
<script type="text/javascript" src="../../js/ckeditor/ckeditor.js"></script>
<script type="text/javascript">
    $('input[maxlength],textarea[maxlength]').on('textInput', function (event) {
        var $this = $(this);
        if ($this.val().length >= parseInt($this.attr('maxlength'), 10)) {
            event.preventDefault();
        }
    });
</script>
<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
<?php
// *** LOAD ADMIN PAGE HEADER
ob_start();
include "../1_login_reg/login_reg.php";
ob_end_clean();

if ($_POST['act']=="add"){
    if (empty($_POST['merk'])) $err['merk']="<span class=\"err\"></span>\n";
    if (empty($_POST['harga'])) $err['harga']="<span class=\"err\"></span>\n";
    if (empty($_POST['stok'])) $err['stok']="<span class=\"err\"></span>\n";
    if($err>0){ 
        echo'<script>alert("Isikan Data Pada Kolom WAJIB DIISI");</script>';
    } else {
    if( !empty($_FILES['gambar_item']['name']) )
    {
    $path = "../../gambar/produk/";
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
            echo'<script>alert("Mohon Maaf ulangi pengisisan data sekali lagi, sistem mendeteksi duplikasi ID Produk");window.location="item.php";</script>';
        } else {
        move_uploaded_file($tmp, $path.$nama_gambar); 
         @mysqli_query($conn,"INSERT INTO item (kditem,id_toko,merk,jenis,gambar_item,harga,deskripsi,stok,views) VALUES ("."'".$_POST['kditem']."','".$_POST['id_toko']."','".$_POST['merk']."','".$_POST['jenis']."','".$nama_gambar."','".$_POST['harga']."','".$_POST['deskripsi']."','".$_POST['stok']."',0)");}
        $cek_jml_item=mysqli_query($conn,"SELECT * FROM item WHERE id_toko='$idtoko'");
    if(mysqli_num_rows($cek_jml_item)>2) {
        echo'<script>window.location="item.php"</script>';
    } else {
        echo'<script>alert("tambah lagi (penuhi syarat minimal 3 produk)");window.location="'.$_SERVER['PHP_SELF'].'";</script>';
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
<a href="item.php"><i class="fa fa-arrow-circle-o-left"></i> Kembali</a>
<center><h1>Tambah Produk</h1></center>
<center><form method="post" enctype="multipart/form-data">
<center><table style="text-align:center;">
<tr><td colspan="2"><br>&laquo;&nbsp;ID Toko : &laquo;&nbsp;<br>
<?php
$rcat=@mysqli_query($conn,"SELECT * FROM infotoko WHERE id_toko='$idtoko'");
while ($rowcat=@mysqli_fetch_array($rcat,MYSQLI_ASSOC)){
    $namatoko=$rowcat['id_toko'];
}?>
<input type="text" name="id_toko" class="texbox" value="<?php echo $namatoko; ?>" readonly>
</td></tr>
<?php function generateRandomString($length = 4) {
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
<tr><td colspan="2"><br>&laquo;&nbsp;KD Item : &laquo;&nbsp;<br><input name="kditem" class="texbox" value='<?php echo $id_auto; ?>' readonly></td></tr>
<tr><td colspan="2"><br>&laquo;&nbsp;Nama Produk :&laquo;&nbsp;<br><input name="merk" id="merk" class="texbox" placeholder="wajib diisi" maxlength="30"></td></tr>
<tr><td colspan="2">&laquo;&nbsp;Pilih Kategori : &laquo;&nbsp;</td></tr>
<tr><td align="right"><select name="jenis" class="texbox">
<?php
$rcat=@mysqli_query($conn,"SELECT * FROM kategori WHERE id_toko='$idtoko'");
while ($rowcat=@mysqli_fetch_array($rcat,MYSQLI_ASSOC)){
      echo ' <option value="'.$rowcat['nama_kategori'].'">'.$rowcat['nama_kategori'].'</option>';
}
?>
</select> </td><td align="left"> | <a href="kelola_kategori.php"><input type="button" value="Kelola Kategori" style="padding:5px;"></a></td></tr>
<tr><td colspan="2"><br>&laquo;&nbsp;Input Gambar : &laquo;&nbsp;<br><input type="file" accept='image/*' multiple='multiple' capture='camera' name="gambar_item" class="texbox" style="width:100%;"></td></tr>
<tr><td colspan="2"><br>&laquo;&nbsp;Harga : &laquo;&nbsp;<br><input name="harga" id="harga" class="texbox" placeholder="wajib diisi" maxlength="9"></td></tr>
<tr><td colspan="2"><br>&laquo;&nbsp;Deskripsi : &laquo;&nbsp;<br><textarea class="ckeditor" style="width:100%;" rows="7" name="deskripsi"></textarea></td></tr>
<tr><td colspan="2"><br>&laquo;&nbsp;Stok : &laquo;&nbsp;<br><input name="stok" id="stok" class="texbox" placeholder="wajib diisi" maxlength="4"></td></tr></table></center>
<center><br><input type="submit" value="SIMPAN" class="btn_submit">
    <input type="hidden" name="act" value="add">
    </form></center>
</div>
<div class="cleared"></div>
<?php } else { 
    echo'<script>
        var yakin = confirm("Kategori Belum Di Set, Tekan OK untuk Lanjutkan");

        if (yakin) {
            window.location = "tambah_kategori.php";
        } else {
            window.location = "item.php";
        }
    </script>';
exit;
}
?>