<?php
// *** LOAD ADMIN PAGE HEADER
include "../header_session/header_inner.php";

if ($_POST['act']=="add"){
    if (empty($_POST['nama_kategori']))
    { 
        echo'<script>alert("Nama Kategori Belum Diisi");window.location="tambah_kategori.php";</script>';
    } else {
        @mysqli_query($conn,"INSERT INTO kategori (id_toko,nama_kategori) VALUES ('$idtoko','".$_POST['nama_kategori']."')");
        $del_statistik=mysqli_query($conn,"DELETE FROM statistik WHERE id_toko='$idtoko'");
        echo'<script>alert("KATEGORI BERHASIL DI SET");window.location="tambah_item.php"</script>';
        
    }
} 

?>
<div id="bgkonten">
<td><a href="item.php"><i class="fa fa-arrow-circle-o-left"></i><b> Kembali</b></a></td>
<h1 align="center">Tambah Minimal 3 Kategori</h1>
<form method="post" enctype="multipart/form-data">
<table>
<?php
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
    <td><input name="nama_kategori" size="40" class="texbox" placeholder="Masukkan Kategori" maxlength="25" style="width:100%;"></td><td><input type="submit" value="SIMPAN" style="width:100%;"><input type="hidden" name="act" value="add"></td>
</tr>
</table>
</form>
</div>
<div class="cleared"></div>