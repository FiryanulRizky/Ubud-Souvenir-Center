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
            echo '<script>alert("Penambahan Kategori Sedang dalam sesi admin lain");window.location="tambah_kategori.php";</script>';
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

if ($_POST['act']=="add"){
    if (empty($_POST['nama_kategori']))
    { 
        echo'<script>alert("Nama Kategori Belum Diisi");window.location="tambah_kategori.php";</script>';
    } else {
        @mysqli_query($conn,"INSERT INTO kategori (id_toko,nama_kategori) VALUES ('.$idtoko.','".$_POST['nama_kategori']."')");
        $cek_kategori=mysqli_query($conn,"SELECT * FROM kategori WHERE id_toko='$idtoko'");
        if(mysqli_num_rows($cek_kategori)<3) {
            echo'<script>alert("MASUKKAN MINIMAL 3 KATEGORI");window.location="tambah_kategori_2.php"</script>';
        } else {
            echo'<script>alert("KATEGORI BERHASIL DI SET");window.location="tambah_item.php"</script>';
        }
    }
} 

?>
<div id="bgkonten">
<td><a href="../PROSES_ALGORITMA_APRIORI/daftar_item.php"><i class="fa fa-arrow-circle-o-left"></i><b> Kembali</b></a></td>
<h1 align="center">Tambah Minimal 3 Kategori</h1>
<form method="post" enctype="multipart/form-data">
<table>
<?php
$cek_kat=mysqli_query($conn,"SELECT * FROM kategori ORDER BY id_kategori DESC");
$ambil_kat=mysqli_fetch_array($cek_kat);
$kat=$ambil_kat['id_kategori']+1;
$rcat=mysqli_query($conn,"SELECT * FROM kategori WHERE id_toko='$idtoko'");
while ($rowcat=mysqli_fetch_array($rcat,MYSQLI_ASSOC)){
    $nama_kategori=$rowcat['nama_kategori'];
    $id_kategori=$rowcat['id_kategori'];
}?>
<table>
<tr style ="border:1px solid;text-align:center;">
    <td><input type"text" value="ID Toko" disabled="true" style ="text-align:center;"></td><td><input type"text" value="ID Kategori" disabled="true" style ="text-align:center;"></td><td><input type"text" value="Nama Kategori" size="40" readonly style ="text-align:center;"></td><td><input type"text" value="Aksi" disabled="true" style ="text-align:center;"></td>
</tr>
<tr>
    <td><input type"text" value="<?php echo $idtoko; ?>" disabled="true" style ="text-align:center;"></td><td><input type="text" value="<?php echo $kat; ?>" style ="text-align:center;" disabled="true"></td>
    <td><input name="nama_kategori" size="40" class="texbox" placeholder="Masukkan Kategori" maxlength="25" style="width:100%;"></td><td><input type="submit" value="SIMPAN" style="width:100%;"><input type="hidden" name="act" value="add"></td>
</tr>
</table>
</form>
</div>
<div class="cleared"></div>