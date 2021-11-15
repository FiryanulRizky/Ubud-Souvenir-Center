<?php

error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));

date_default_timezone_set('Asia/Makassar');

session_start();

// *** DB CONNECTION

include"../../db/koneksi.php";

include_once"../../db/web_config.php";

?>



<link rel="stylesheet" type="text/css" href="../../css/jquery-ui.css">

<script type="text/javascript" src="../../js/jquery-1.10.2.js"></script>

<script type="text/javascript" src="../../js/jquery-ui.js"></script>

<script type="text/javascript" src="../../js/jquery-1.4.3.min.js"></script>

<script type="text/javascript" src="../../js/jquery.js"></script>

<script type="text/javascript" src="../../js/ckeditor/ckeditor.js">

</script>



<link rel="stylesheet" type="text/css" href="../css/style_admin.css">

<link rel="stylesheet" type="text/css" href="../css/style_index.css">



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

      $_SESSION['islogin2']=$_POST['username'].$password_md5;



   } else {



       echo'<script>alert("Username dan Password Salah !");window.location="login_reg.php";</script>';

   }





} else if ($_POST['act']=="login") {

  if (empty($_POST['pilih_toko'])) $err['pilih_toko']="<span class=\"err\"></span>\n";

  if (empty($_POST['username'])) $err['username']="<span class=\"err\"></span>\n";

  if (empty($_POST['password'])) $err['password']="<span class=\"err\"></span>\n";

  if($err>0){ // *** if submit error

        echo'<script>alert("Data Belum Valid/Masih Kosong, Silahkan Perbaiki, Terima Kasih");window.location="login_reg.php";</script>';

    } else { 

      echo'<script>alert("Login Berhasil");window.location="login_reg.php";</script>';

    }

}



if (empty($_SESSION['islogin2'])){



?>



<center>

<div id="login">

<div id="login_input">



<center>

<img src="../../gambar/images/logo.png"><br>

<form method="post">

<select name="pilih_toko" class="teksbok_admin">

<option value=”>Pilih Toko</option>

<?php

$prov = mysqli_query($conn,"SELECT * FROM infotoko order by id_toko asc");

while($hasil=mysqli_fetch_array($prov,MYSQLI_ASSOC)){

echo "<option value='".$hasil['id_toko']."''>".$hasil['nama_toko']." (KDTK".$hasil['id_toko'].")"."</option>";}?>

<input class="teksbok_admin" placeholder="Input Username" type="text" name="username" maxlength="15"><br>

<input class="teksbok_admin" placeholder="Type Your Password" type="password" name="password" maxlength="8"><br><br>

<input type="hidden" name="act" value="login">

<input class="tombol_login" type="submit" value="LOGIN ADMIN"><br><br>

</form>

<form method="post" action="register_admin.php">

<input class="tombol_login" type="submit" value="REGISTER ADMIN"><br><br>

</form>

<form method="post" action="register_toko.php">

<input class="tombol_login" type="submit" value="REGISTER TOKO">

</form>

<br><a href="lupa_password_admin.php">Lupa Password (Admin)</a>
<br><a href="lupa_password_toko.php">Lupa Password (Akun Toko)</a>

</div>

<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>

</center>





<?php



exit;

} else {



$username = $_SESSION['admin_username'];

$idtoko=$_SESSION['idtoko'];

$namatoko=mysqli_query($conn,"SELECT * FROM infotoko WHERE id_toko='$idtoko'");

$namatoko2=mysqli_fetch_array($namatoko,MYSQLI_ASSOC);

$namatoko3=$namatoko2['nama_toko'];

$namadmin=mysqli_query($conn,"SELECT nama FROM admin_web WHERE id_toko='$idtoko'");

$namadmin2=mysqli_fetch_array($namadmin,MYSQLI_ASSOC);

$namadmin3=$namadmin2['nama'];

// echo "<center style='color:blue;'><b>$username Sedang Login Sebagai Admin $namatoko3 <b></center>";



?>

<div id="login">

<div id="login_input">



<center>

<img src="../../gambar/images/logo.png"><br><br>

<?php echo"<center><H3>LOGIN BERHASIL</H3>
<hr><table style='font-weight:bold;'><tr align='center'><td colspan='3'>Sesi Login</td></tr><tr><td>Nama Admin<td>:<td>$namadmin3</td></tr><tr><td>Nama Toko</td><td>:</td><td>$namatoko3</td></tr></table>
</center>";

}

?></center></div></div>







