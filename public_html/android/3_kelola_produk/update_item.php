<link rel="stylesheet" type="text/css" href="../../css/style_admin.css">
<script type="text/javascript" src="../../js/ckeditor/ckeditor.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" />
<?php
// *** LOAD ADMIN PAGE HEADER
ob_start();
include"../1_login_reg/login_reg.php";
ob_end_clean();

$id=$_GET['id'];
$tanggal = date("Ymd");
            $waktu   = date("His"); 
            $cek_admin=mysqli_query($conn,"SELECT * FROM statistik WHERE id_toko='$idtoko' AND tanggal='$tanggal'");
            while($ambil_ip=mysqli_fetch_array($cek_admin)){ 
                $cek_ip=$ambil_ip['ip'];
            }
            if($cek_ip>1){ 
            echo '<script>alert("Edit Sedang dalam sesi admin lain");window.location="item.php";</script>';
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

if ($_POST['act']=="edit"){
    if (empty($_POST['merk'])) $err['merk']="<span class=\"err\"></span>\n";
    if (empty($_POST['harga'])) $err['harga']="<span class=\"err\"></span>\n";
    if (empty($_POST['stok'])) $err['stok']="<span class=\"err\"></span>\n";
    if($err>0){ 
        echo'<script>alert("Jangan kosongkan Form, informasi harus ditampilkan");</script>';
    } else {

  if( !empty($_FILES['gambar_item2']['name']) )
    {
    $path = "../../gambar/produk/";
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
    $files=glob("../../gambar/produk/".$hapus_gambar."");
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
    <script>alert("Update berhasil");window.location="item.php"</script>
    ';
        
    }
    } else {

   @mysqli_query($conn,"UPDATE item SET kditem='".$_POST['kditem']."',"." merk='".$_POST['merk']."',"
    ."jenis='".$_POST['kategori']."',"
    ."gambar_item='".$_POST['gambar_item']."', "."deskripsi='".$_POST['deskripsi']."', "."harga='".$_POST['harga']."', "
    ."stok='".$_POST['stok']."' WHERE id_item='".$_GET['id']."' AND id_toko='$idtoko'");
    $del_statistik=mysqli_query($conn,"DELETE FROM statistik WHERE id_toko='$idtoko'");
    echo '
    <script>alert("Update berhasil");window.location="item.php"</script>
    ';
}
}
}

if (!empty($_GET['id'])){
    
    $rs=@mysqli_query($conn,"SELECT * FROM item WHERE id_toko='$idtoko' AND id_item='".$_GET['id']."'");
    $row=@mysqli_fetch_array($rs,MYSQLI_ASSOC);

			if (file_exists("../../gambar/produk/".$row['gambar_item'].""))
                $gambar="<img src=\"../../gambar/produk/".$row['gambar_item']."\" width=50></br>";
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
        echo'<script>window.location="item.php";</script>';
    } else {
        echo'<script>window.location="item.php";</script>';
    }
}
echo'<center><table style="text-align:center;">
<tr><td>&raquo;&nbsp;kategori : &raquo;&nbsp;<br><select name="kategori" class="texbox">';
$rcat=@mysqli_query($conn,"SELECT * FROM kategori WHERE id_toko='$idtoko'");

while ($rowcat = @mysqli_fetch_array($rcat,MYSQLI_ASSOC)) {
      echo '<option value="'.$rowcat['nama_kategori'].'" ';
      if ($row['item']==$rowcat['nama_kategori']) echo "selected";
      echo '>'.$rowcat['nama_kategori'].'</option>';
}

echo '</select><br><br>&raquo;&nbsp;ID Toko : &raquo;&nbsp;<br><input name="id_toko"  class="texbox" value="'.$idtoko.'" readonly><br><br>&raquo;&nbsp;ID Item : <br><input name="kditem"  class="texbox" value="'.$row['kditem'].'" maxlength="4"><br><br>&raquo;&nbsp;Nama Produk : &raquo;&nbsp;<br><input name="merk" class="texbox" value="'.$row['merk'].'" maxlength="17"><br><br>&raquo;&nbsp;Deskripsi : <br><textarea class="ckeditor" style="width:100%;" rows="7" name="deskripsi">'.$row['deskripsi'].'</textarea><br><br>&raquo;&nbsp;Harga : &raquo;&nbsp;<br><input name="harga" class="texbox" value="'.$row['harga'].'" maxlength="9"><br><br>&raquo;&nbsp;Stok : &raquo;&nbsp;<br><input name="stok" class="texbox" value="'.$row['stok'].'" maxlength="4"><input type="hidden" name="gambar_item" value="'.$row['gambar_item'].'"><br><br>&raquo;&nbsp;<input type="file" name="gambar_item2" value="'.$row['gambar_item'].'"></br>'.$gambar.'<br><br>
    <input type="submit" value="UPDATE" class="btn_submit">
    <input type="hidden" name="act" value="edit"><br><br>
    <input type="hidden" name="id" value="'.$row['kditem'].'">
    </form></td></tr>';

}
echo"</table></center>";
echo'</div>';

?>
<div class="cleared"></div>
</div>
