<link rel="stylesheet" type="text/css" href="../css/style_admin.css">
<?php
// *** LOAD ADMIN PAGE HEADER
ob_start();
include "../1_login_reg/login_reg.php";
ob_end_clean();

$idtoko=$_GET['idtoko'];
$id=$_GET['id'];
$tanggal = date("Ymd");
            $waktu   = date("His"); 
            $cek_admin=mysqli_query($conn,"SELECT * FROM statistik WHERE id_toko='$idtoko' AND tanggal='$tanggal'");
            while($ambil_ip=mysqli_fetch_array($cek_admin)){ 
                $cek_ip=$ambil_ip['ip'];
            }
            if($cek_ip>1){ 
            echo '<script>alert("Penambahan Kategori Sedang dalam sesi admin lain");window.location="item.php";</script>';
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

$cek_kategori=mysqli_query($conn,"SELECT * FROM kategori WHERE id_toko='$idtoko'");
if ($_POST['act']=="add"){
    if (empty($_POST['nama_kategori']))
    { 
        echo'<script>alert("Nama Kategori Belum Diisi");window.location="tambah_kategori.php";</script>';
    } else {
        @mysqli_query($conn,"INSERT INTO kategori (id_toko,nama_kategori) VALUES ('".$_POST['id_toko']."','".$_POST['nama_kategori']."')");
            if(mysqli_num_rows($cek_kategori)<3) {
            echo'<script>alert("Penuhi Syarat Minimal 3 Kategori (1/3 Terpenuhi)");window.location="tambah_kategori_2.php"</script>';
        } else {
            echo'<script>alert("KATEGORI BERHASIL DI SET");window.location="tambah_item.php"</script>';
        }

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