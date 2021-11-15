<html>
    <head>
        <title>Register Admin</title>
        <link rel="shortcut icon" type="image/x-icon" href="../gambar/images/head_logo.ico" />
    </head>
<body>
<?php
// *** DB CONNECTION
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
include"../db/koneksi.php";
include"header_inner_unlog.php";
?>

<center>

<div id="login">
<div id="login_input">

<center>
<img src="../gambar/images/logo.png"><br>
<form method="post">
<select name="pilih_toko" class="teksbok_admin">
<option value=”>Pilih Toko</option>
<?php
$prov = mysqli_query($conn,"SELECT * FROM infotoko order by id_toko asc");
while($hasil=mysqli_fetch_array($prov,MYSQLI_ASSOC)){
echo "<option value='".$hasil['id_toko']."''>".$hasil['nama_toko']." (KDTK".$hasil['id_toko'].")"."</option>";}?>
<input class="teksbok_admin" type="text" name="admin" value="Admin" readonly><br>
<input class="teksbok_admin" placeholder="Masukkan Kunci Akses Toko" type="password" name="kunci_akses" maxlength="8"><br>
<input class="teksbok_admin" placeholder="Masukkan Nama Anda" type="text" name="nama" maxlength="25"><br>
<input class="teksbok_admin" placeholder="Masukkan Username" type="text" name="username" maxlength="15"><br>
<input class="teksbok_admin" placeholder="Masukkan Password" type="password" name="password" maxlength="8"><br>
<input class="teksbok_admin" placeholder="Masukkan No.HP/WA Bisnis" type="text" name="phone" maxlength="13"><br><br>
<input type="hidden" name="act" value="register">
<input class="tombol_login" type="submit" value="REGISTER ADMIN"><br><br>
</form>
<form method="post">
	<input type="hidden" name="act1" value="cancel">
	<input class="tombol_login" type="submit" value="BATAL">
</form>
<?php
include"koneksi.php";
if ($_POST['act']=="register"){
    if (empty($_POST['pilih_toko'])) $err['pilih_toko']="<span class=\"err\">Silahkan Pilih Toko Dulu.</span>\n";
    if (empty($_POST['kunci_akses'])) $err['kunci_akses']="<span class=\"err\">Masukkan Kunci Akses Toko.</span>\n";
    if (empty($_POST['nama'])) $err['nama']="<span class=\"err\">Silahkan Isi Nama Anda.</span>\n";
    if (empty($_POST['username'])) $err['username']="<span class=\"err\">Silahkan Isi Username Anda.</span>\n";
    if (!preg_match("/^[a-z0-9\_\.\-]+$/i",$_POST['username'])) $err['username']="<span class=\"err\">Username &quot;".$_POST['email']."&quot; Anda Tidak valid.</span>\n";
    if (empty($_POST['password'])) $err['password']="<span class=\"err\">Silahkan Isi Password Anda.</span>\n";
    if (empty($_POST['phone'])) $err['phone']="<span class=\"err\">No. Telepon &quot;".$_POST['phone']."&quot; Anda Tidak valid.</span>\n";
    if (!preg_match("/^[0-9\_\.\-]+$/i",$_POST['phone'])) $err['phone']="<span class=\"err\"></span>\n";
    if($err>0){ // *** if submit error
      echo'<script>alert("Data Belum Valid/Masih Kosong, Silahkan Perbaiki, Terima Kasih");window.location ="register_admin.php";</script>';
    } else { // *** if submit OK
      $username =$_POST['username'];
      $pilihtoko =$_POST['pilih_toko'];
      $cek=mysqli_num_rows(mysqli_query($conn,"SELECT id_toko,username FROM admin_web WHERE id_toko='$pilihtoko' AND username='$username'"));
        
    if($cek > 0) {
      echo'<script>alert("Username sudah terdaftar, Silahkan Login atau Ganti Username Baru, Terima Kasih");window.location ="register_admin.php";</script>';
    }
    else{
        //query insert dijalankan
      $admin=$_POST["admin"];
      $pilihtoko=$_POST["pilih_toko"];
      $nama=$_POST["nama"];
      $username=$_POST["username"];
      $password=md5($_POST["password"]);
      $no_hp=$_POST["phone"];
      $cek_akses=mysqli_query($conn,"SELECT * FROM infotoko WHERE id_toko='$pilihtoko'");
      $ambil_akses=mysqli_fetch_array($cek_akses);
      if($ambil_akses['kunci_akses']==md5($_POST['kunci_akses'])) {
      $sql="INSERT INTO admin_web (id_toko,username,password,nama,telepon,jabatan)VALUES ('$pilihtoko','$username','$password','$nama','$no_hp','$admin')";
      $masukdatabase=mysqli_query($conn,$sql);
       echo'<script>alert("Register Success, Silahkan Login untuk melanjutkan !!!");window.location ="../admin/index.php";</script>'; 
      } else {
          echo'<script>alert("Kunci Akses Anda Salah, pastikan masukkan kunci akses yang sesuai");</script>';
      }
    }
  }
}

if ($_POST['act1']=="cancel"){
	echo'<script>
        var yakin = confirm("Yakin ingin membatalkan?");

        if (yakin) {
            window.location = "../admin/index.php";
        } else {
            window.location = "register_admin.php";
        }
    </script>';
}

?>
</div>
</center>
</body>
</html>