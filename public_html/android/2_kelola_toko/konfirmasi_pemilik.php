<link rel="stylesheet" type="text/css" href="../css/style_admin.css">
<?php
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
ob_start();
include"../1_login_reg/login_reg.php";
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
<input class="tombol_login" type="submit" value="AKSES PEMILIK" name="akses"><br><br>
<input class="tombol_login" style="background:red;" type="submit" value="KEMBALI" name="kembali"><br><br>
</form>
<?php
if (isset($_POST['akses'])) {
  $check=mysqli_query($conn,"SELECT * FROM infotoko WHERE id_toko='".$_GET['idtoko']."'");
  $ambil_pass=mysqli_fetch_array($check,MYSQLI_ASSOC);
  if (md5($_POST['password'])==$ambil_pass['password']) {
  	echo'<script>alert("Login Berhasil");window.location="iframe_edit.php";</script>';
    } else { 
      echo'<script>alert("Maaf, Akses Ditolak");window.location="index.php";</script>';
} } elseif(isset($_POST['kembali'])) {
    echo'<script>
        var yakin = confirm("Batalkan akses pemilik ?");

        if (yakin) {
        	window.location = "index.php";
        } else {
            window.location = "'.$_SERVER['PHP_SELF'].'";
        }
    </script>';
}
?>
</div>
</center>