<link rel="stylesheet" type="text/css" href="../css/style_admin.css">
<?php
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
ob_start();
include"../header_session/header_inner.php";
ob_end_clean();
?>
</head>
<body>
<center>
<div id="login">
<div id="login_input">
<center>
<form method="post">
<input class="teksbok_admin" placeholder="Masukkan Password Pemilik" type="password" name="password" maxlength="8"><br><br>
<input type="hidden" name="act" value="akses">
<input class="tombol_login" type="submit" value="AKSES PEMILIK"><br><br>
</form>
<?php
if ($_POST['act']=="akses") {

  $check=mysqli_query($conn,"SELECT * FROM infotoko WHERE id_toko='".$_GET['idtoko']."'");
  $ambil_pass=mysqli_fetch_array($check,MYSQLI_ASSOC);
  if (md5($_POST['password'])==$ambil_pass['password']) {
  	echo'<script>alert("Akses Kepemilikan Berhasil");window.location="iframe_edit.php";</script>';
    } else { 
      echo'<script>alert("Maaf, Akses Ditolak");top.document.location.href="../admin/index.php";</script>';
} }
?>
</div>
</center>