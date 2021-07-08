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
<script type="text/javascript" src="../js/lib/ckeditor/ckeditor.js"></script>
<script type="text/javascript" src="../js/Chart.js"></script>
</head>
<body>


<?php
include"../header_session/header_inner_unlog.php";


if (!empty($_POST['username'])){
   //echo "user yang diketik adalah : ".$_POST['username'];
   $check=mysqli_num_rows(mysqli_query($conn,"SELECT username,password FROM super_admin WHERE username='". $_POST['username'] ."' AND password='". $_POST['password'] ."'"));
   
   if ($check>0){
       $_SESSION['sp_username'] = $_POST['username'];
      $_SESSION['super_admin']=$_POST['username'].$_POST['password'];

    echo'<script>alert("Login Berhasil");window.location ="../index.php";</script>';
   } else {

       echo'<script>alert("Maaf, Username dan Password Anda Salah");window.location ="../index.php";</script>';
   }


} else if ($_POST['act']=="login") {
  if (empty($_POST['username'])) $err['username']="<span class=\"err\"></span>\n";
  if (empty($_POST['password'])) $err['password']="<span class=\"err\"></span>\n";
  if($err>0){ // *** if submit error
        echo'<script>alert("Data Belum Valid/Masih Kosong, Silahkan Perbaiki, Terima Kasih");window.location ="../index.php";</script>';
    } else { 
      header("location:../index.php");
    }
}

if (empty($_SESSION['super_admin'])){

?>

<center>

<div id="login">
<div id="login_input">

<center>
<H1>SUPER ADMIN LOGIN</H1>
<a href="../android/7_panel_guest/index.php"><img src="../gambar/images/logo.png"></a><br>
<form method="post">
<input class="teksbok_admin" placeholder="Masukkan Username" type="text" name="username" maxlength="12"><br>
<input class="teksbok_admin" placeholder="Masukkan Password" type="password" name="password"><br><br>
<input type="hidden" name="act" value="login">
<input class="tombol_login" type="submit" value="AKSES SUPER ADMIN"><br><br>
</form>
<form method="post" action="../index.php?clear=y">
<input class="tombol_login" type="submit" value="KEMBALI"><br><br>
</form>
</div>


</center>

<?php

exit;
} else {
$username = $_SESSION['sp_username'];
$cek_sp=mysqli_query($conn,"SELECT * FROM super_admin");
$ambil_nama=mysqli_fetch_array($cek_sp,MYSQLI_ASSOC);
$nama_sp=$ambil_nama['nama'];
$idtoko=$ambil_nama['id_sp_admin'];
}
?>



