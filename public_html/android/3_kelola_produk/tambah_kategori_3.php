<link rel="stylesheet" type="text/css" href="../css/style_admin.css">
<?php
// *** LOAD ADMIN PAGE HEADER
ob_start();
include "../1_login_reg/login_reg.php";
ob_end_clean();
$cek_kategori=mysqli_query($conn,"SELECT * FROM kategori WHERE id_toko='$idtoko'");
if ($_POST['act']=="add"){
    if (empty($_POST['nama_kategori']))
    { 
        echo'<script>alert("Nama Kategori Belum Diisi");window.location="tambah_kategori.php";</script>';
    } else {
        @mysqli_query($conn,"INSERT INTO kategori (id_toko,nama_kategori) VALUES ('".$_POST['id_toko']."','".$_POST['nama_kategori']."')");
         echo'<script>alert("SYARAT MINIMUM 3 KATEGORI BERHASIL DI SET");window.location="tambah_item.php"</script>';
    }
} 

?>
<div id="bgkonten">
<td><a href="item.php"><i class="fa fa-arrow-circle-o-left"></i><b> Kembali</b></a></td>
<h1 align="center">Tambah Kategori</h1>
<form method="post" enctype="multipart/form-data">
<table>
<?php
$rcat=@mysqli_query($conn,"SELECT * FROM infotoko WHERE id_toko='$idtoko'");
while ($rowcat=@mysqli_fetch_array($rcat,MYSQLI_ASSOC)){
    $namatoko=$rowcat['id_toko'];
}?>
<tr><td>&laquo;&nbsp;ID Toko <?php echo"= (KDTK".$namatoko.")"; ?></td><td>:</td><td>
<input type="text" name="id_toko" class="texbox" value="<?php echo $namatoko; ?>" readonly>
</td></tr>
<?php $cek_id=mysqli_query($conn,"SELECT id_kategori FROM kategori WHERE id_toko='$idtoko' ORDER BY id_kategori DESC LIMIT 1");
$ambil_id=mysqli_fetch_array($cek_id);
$id1=$ambil_id['id_kategori'];
$id_auto=$id1+1; ?>
<tr><td>&laquo;&nbsp;ID Kategori <?php echo "= (IDKAT".$id_auto.")"; ?></td><td>:</td><td><input name="id_kategori" class="texbox" value="<?php echo $id_auto; ?>" readonly></td></tr>
<tr><td>&laquo;&nbsp;Nama Kategori</td><td>:</td><td><input name="nama_kategori" size="50" class="texbox" placeholder="wajib diisi" maxlength="25"></td></tr>
<tr>
<td><input type="submit" value="SIMPAN" class="btn_submit">
    <input type="hidden" name="act" value="add"></td></tr>
    </table>
    </form>
</div>
<div class="cleared"></div>