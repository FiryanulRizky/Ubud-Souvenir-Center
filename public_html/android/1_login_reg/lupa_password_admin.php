<?php
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
session_start();
// *** DB CONNECTION
include"../../db/koneksi.php";
include"../../db/web_config.php";
date_default_timezone_set('Asia/Makassar');
?>

<link rel="shortcut icon" href="favicon.ico" >
<link href="../css/style_admin.css" rel="stylesheet" type="text/css" media="screen" />
<link href="../../css/style_index.css" rel="stylesheet" type="text/css" media="screen" />
</head>
<body>


<?php

if ($_POST['act']=="login") {
  if (empty($_POST['pilih_toko'])) $err['pilih_toko']="<span class=\"err\"></span>\n";
  if (empty($_POST['username'])) $err['username']="<span class=\"err\"></span>\n";
  if (empty($_POST['password_baru'])) $err['password_baru']="<span class=\"err\"></span>\n";
  if (empty($_POST['password_baru_konfirm'])) $err['password_baru_konfirm']="<span class=\"err\"></span>\n";
  if($err>0){ // *** if submit error
        echo'<script>alert("Harap isi semua form");</script>';
    } else { 
   //echo "user yang diketik adalah : ".$_POST['username'];
   $check=mysqli_num_rows(mysqli_query($conn,"SELECT * FROM admin_web WHERE username='". $_POST['username'] ."' AND id_toko='".$_POST['pilih_toko']."'"));
   if($check>0) {
   if ($_POST['password_baru']==$_POST['password_baru_konfirm']){
       mysqli_query($conn,"UPDATE admin_web SET password='".md5($_POST['password_baru'])."' WHERE id_toko='".$_POST['pilih_toko']."'");
    echo'<script>alert("Password baru Berhasil dibuat");window.location ="login_reg.php";</script>';
   } else {
       echo'<script>alert("Konfirmasi Password tidak cocok");</script>';
       } }
   else {
       $toko=mysqli_query($conn,"SELECT * FROM infotoko WHERE id_toko='".$_POST['pilih_toko']."'");
       $ambil_data=mysqli_fetch_array($toko);
       $nama_toko=$ambil_data['nama_toko'];
       echo'<script>alert("Maaf, Username anda tidak terdaftar di basis data '.$nama_toko.'");</script>';
   }

    }
}

?>

<center>

<div id="login">
<div id="login_input">

<center>
<H1>LUPA PASSWORD (ADMIN)</H1>
<img src="../../gambar/images/logo.png"><br>
<form method="post">
<select name="pilih_toko" class="teksbok_admin">

<option value=”>Pilih Toko</option>

<?php

$prov = mysqli_query($conn,"SELECT * FROM infotoko order by id_toko asc");

while($hasil=mysqli_fetch_array($prov,MYSQLI_ASSOC)){

echo "<option value='".$hasil['id_toko']."''>".$hasil['nama_toko']." (KDTK".$hasil['id_toko'].")"."</option>";}?></select><br>
<input class="teksbok_admin" placeholder="Masukkan Username Anda" type="text" name="username" maxlength="15"><br>
<input class="teksbok_admin" placeholder="Masukkan Password Baru" type="password" name="password_baru" maxlength="8"><br>
<input class="teksbok_admin" placeholder="Konfirmasi Password Baru" type="password" name="password_baru_konfirm" maxlength="8"><br><br>
<input type="hidden" name="act" value="login">
<input class="tombol_login" type="submit" value="PROSES PASSWORD BARU"><br><br>
</form>
<form method="post" action="register_admin.php?clear=y">
<input class="tombol_login" type="submit" value="BUAT AKUN ADMIN BARU"><br><br>
</form>
<form method="post">
<input class="tombol_login" type="submit" value="KEMBALI" name="kembali_ke_login"><br><br>
</form>
<?php if(isset($_POST['kembali_ke_login'])) {
    echo'<script>
        var yakin = confirm("Yakin ingin membatalkan ?");

        if (yakin) {
        	window.location = "login_reg.php";
        } else {
            window.location = "'.$_SERVER['PHP_SELF'].'";
        }
    </script>';
}?>
</div>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
</center>