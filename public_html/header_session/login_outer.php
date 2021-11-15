<html>
    <head>
        <title>Panduan</title>
        <link rel="shortcut icon" type="image/x-icon" href="../gambar/images/head_logo.ico" />
    </head>
<body>
<?php

error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));

session_start();

include"./db/koneksi.php";

date_default_timezone_set('Asia/Makassar');

?>

</head>

<body>





<?php

if (!empty($_POST['username'])){

   //echo "user yang diketik adalah : ".$_POST['username'];

   $password_md5=md5($_POST["password"]);

   $check=mysqli_num_rows(mysqli_query($conn,"SELECT id_toko,username,password FROM admin_web WHERE id_toko='". $_POST['pilih_toko'] ."' AND username='". $_POST['username'] ."' AND password='". $password_md5 ."'"));

   

   if ($check>0){

       $_SESSION['admin_username'] = $_POST['username'];

       $_SESSION['idtoko'] = $_POST['pilih_toko'];

      $_SESSION['islogin']=$_POST['username'].$password_md5;



    echo'<script>alert("Login Berhasil");window.location ="./admin/index.php";</script>';

   } else {



       echo'<script>alert("Maaf, Username dan Password Anda Salah");window.location ="./admin/index.php";</script>';

   }





} else if ($_POST['act']=="login") {

  if (empty($_POST['username'])) $err['username']="<span class=\"err\"></span>\n";

  if (empty($_POST['password'])) $err['password']="<span class=\"err\"></span>\n";

  if($err>0){ // *** if submit error

        echo'<script>alert("Data Belum Valid/Masih Kosong, Silahkan Perbaiki, Terima Kasih");window.location ="./admin/index.php";</script>';

    } else { 

      header("location:./admin/index.php");

    }

}



if (empty($_SESSION['islogin'])){



?>



<center>



<div id="login">

<div id="login_input">

<a href="./index.php"><img src="./gambar/images/logo.png"></a>

<form method="post">

<select name="pilih_toko" class="teksbok_admin">

<option value=”>Pilih Toko</option>

<?php

$prov = mysqli_query($conn,"SELECT * FROM infotoko order by id_toko asc");

while($hasil=mysqli_fetch_array($prov,MYSQLI_ASSOC)){

echo "<option value='".$hasil['id_toko']."''>".$hasil['nama_toko']." (KDTK".$hasil['id_toko'].")"."</option>";}?></select>

<input class="teksbok_admin" placeholder="Masukkan Username" type="text" name="username" maxlength="15"><br>

<input class="teksbok_admin" placeholder="Masukkan password" type="password" name="password" maxlength="8"><br><br>

<input type="hidden" name="act" value="login">

<input class="tombol_login" type="submit" value="LOGIN ADMIN"><br><br>

</form>

<form method="post" action="./header_session/register_admin.php">

<input class="tombol_login" type="submit" value="REGISTER ADMIN"><br><br>

</form>

<form method="post" action="./header_session/register_toko.php">

<input class="tombol_login" type="submit" value="REGISTER TOKO">

</form>

<br><a href="./header_session/lupa_password_admin.php">Lupa Password (Admin)</a>
<br><a href="./header_session/lupa_password_toko.php">Lupa Password (Akun Toko)</a>

</div>

</div>





</center>



<?php



exit;

} else {

$username = $_SESSION['admin_username'];

$idtoko=$_SESSION['idtoko'];

$namatoko=mysqli_query($conn,"SELECT nama_toko FROM infotoko WHERE id_toko='$idtoko'");

$namatoko2=mysqli_fetch_array($namatoko,MYSQLI_ASSOC);

$namatoko3=$namatoko2['nama_toko'];

}

?>







