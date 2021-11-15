<html>
    <head>
        <title>Lupa Password Toko</title>
        <link rel="shortcut icon" type="image/x-icon" href="../gambar/images/head_logo.ico" />
    </head>
<body>
<?php
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
session_start();
// *** DB CONNECTION
include"../db/koneksi.php";
include"../db/web_config.php";
date_default_timezone_set('Asia/Makassar');
?>

<link rel="shortcut icon" href="favicon.ico" >
<link href="../css/style_admin.css" rel="stylesheet" type="text/css" media="screen" />
<link href="../css/style_index.css" rel="stylesheet" type="text/css" media="screen" />
</head>
<body>


<?php
include"../header_session/header_inner_unlog.php";


if ($_POST['act']=="login") {
  if (empty($_POST['pilih_toko'])) $err['pilih_toko']="<span class=\"err\"></span>\n";
  if (empty($_POST['wa'])) $err['wa']="<span class=\"err\"></span>\n";
  if (empty($_POST['password_baru'])) $err['password_baru']="<span class=\"err\"></span>\n";
  if (empty($_POST['password_baru_konfirm'])) $err['password_baru_konfirm']="<span class=\"err\"></span>\n";
  if($err>0){ // *** if submit error
        echo'<script>alert("Harap isi semua form");</script>';
    } else { 
   //echo "user yang diketik adalah : ".$_POST['username'];
   $check=mysqli_num_rows(mysqli_query($conn,"SELECT * FROM infotoko WHERE wa='". $_POST['wa'] ."' AND id_toko='".$_POST['pilih_toko']."'"));
   if($check>0) {
   if ($_POST['password_baru']==$_POST['password_baru_konfirm']){
       if($_GET['proses']=="password_pemilik") {
       mysqli_query($conn,"UPDATE infotoko SET password='".md5($_POST['password_baru'])."' WHERE id_toko='".$_POST['pilih_toko']."'");
    echo'<script>alert("Password pemilik baru Berhasil dibuat");window.location ="../index.php";</script>'; } if($_GET['proses']=="kunci_akses") {
       mysqli_query($conn,"UPDATE infotoko SET kunci_akses='".md5($_POST['password_baru'])."' WHERE id_toko='".$_POST['pilih_toko']."'");
    echo'<script>alert("Kunci akses baru Berhasil dibuat");window.location ="../admin/index.php";</script>'; }
   } else {
       echo'<script>alert("Konfirmasi Password tidak cocok");</script>';
       } }
   else {
       $toko=mysqli_query($conn,"SELECT * FROM infotoko WHERE id_toko='".$_POST['pilih_toko']."'");
       $ambil_data=mysqli_fetch_array($toko);
       $nama_toko=$ambil_data['nama_toko'];
       echo'<script>alert("Maaf, No. HP anda tidak terdaftar di basis data '.$nama_toko.'");</script>';
   }

    }
}

?>

<center>

<div id="login">
<div id="login_input">

<center>
<?php if (empty($_GET['proses']) || $_GET['proses']=="proses=") { $pilih_proses=$_POST['pilih_proses'];?>
<H1>LUPA PASSWORD (AKUN TOKO)</H1>
<img src="../gambar/images/logo.png"><br><br>
<form method="post" action="<?php echo $_SERVER['PHP_SELF']."?proses=$pilih_proses";?>">

<select name="pilih_proses" class="teksbok_admin">
<option value="">Pilih Proses</option>
<option value="password_pemilik">Password Pemilik</option>
<option value="kunci_akses">Kunci Akses</option>
</select>
<br><br>
<input type="submit" value="Pilih (Klik 2x)" class="btn_submit"></form><br>
<form method="post" action="../admin/index.php">
<input class="tombol_login" type="submit" value="KEMBALI"><br><br>
</form>
<?php } if ($_GET['proses']=="password_pemilik") { ?>
<form method="post">
<H1>Password Akses Pemilik Baru</H1>
<a href="lupa_password_toko.php"><img src="../gambar/images/logo.png"></a><br><br>
<select name="pilih_toko" class="teksbok_admin">

<option value=”>Pilih Toko</option>

<?php

$prov = mysqli_query($conn,"SELECT * FROM infotoko order by id_toko asc");

while($hasil=mysqli_fetch_array($prov,MYSQLI_ASSOC)){

echo "<option value='".$hasil['id_toko']."''>".$hasil['nama_toko']." (KDTK".$hasil['id_toko'].")"."</option>";}?></select><br>
<input class="teksbok_admin" placeholder="Masukkan No. HP" type="text" name="wa" maxlength="13"><br>
<input class="teksbok_admin" placeholder="Password Pemilik Baru" type="password" name="password_baru" maxlength="8"><br>
<input class="teksbok_admin" placeholder="Konfirmasi Pemilik Baru" type="password" name="password_baru_konfirm" maxlength="8"><br><br>
<input type="hidden" name="act" value="login">
<input class="tombol_login" type="submit" value="PROSES PASSWORD BARU"><br><br>
</form>
<form method="post" action="<?php echo $_SERVER['PHP_SELF']."?proses=kunci_akses";?>">
<input class="tombol_login" type="submit" value="KE KUNCI AKSES"><br><br>
</form>
<form method="post" action="../admin/index.php">
<input class="tombol_login" type="submit" value="KEMBALI"><br><br>
</form>
<?php } if ($_GET['proses']=="kunci_akses") { ?>
<form method="post">
<H1>Kunci Akses Toko Baru</H1>
<a href="lupa_password_toko.php"><img src="../gambar/images/logo.png"></a><br><br>
<select name="pilih_toko" class="teksbok_admin">

<option value=”>Pilih Toko</option>

<?php

$prov = mysqli_query($conn,"SELECT * FROM infotoko order by id_toko asc");

while($hasil=mysqli_fetch_array($prov,MYSQLI_ASSOC)){

echo "<option value='".$hasil['id_toko']."''>".$hasil['nama_toko']." (KDTK".$hasil['id_toko'].")"."</option>";}?></select><br>
<input class="teksbok_admin" placeholder="Masukkan No. HP" type="text" name="wa" maxlength="13"><br>
<input class="teksbok_admin" placeholder="Kunci Akses Baru" type="password" name="password_baru" maxlength="8"><br>
<input class="teksbok_admin" placeholder="Kunci Akses Baru" type="password" name="password_baru_konfirm" maxlength="8"><br><br>
<input type="hidden" name="act" value="login">
<input class="tombol_login" type="submit" value="PROSES PASSWORD BARU"><br><br>
</form>
<form method="post" action="<?php echo $_SERVER['PHP_SELF']."?proses=password_pemilik";?>">
<input class="tombol_login" type="submit" value="KE PASSWORD PEMILIK"><br><br>
</form>
<form method="post" action="../admin/index.php">
<input class="tombol_login" type="submit" value="KEMBALI"><br><br>
</form>
<?php } ?>
</div>


</center></body></html>