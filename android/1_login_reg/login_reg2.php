<?php

error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));

date_default_timezone_set('Asia/Makassar');

session_start();

// *** DB CONNECTION

include"../db/koneksi.php";

?>



<link rel="shortcut icon" href="favicon.ico" >

<link href="../css/style_admin.css" rel="stylesheet" type="text/css">



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



       echo'<script>alert("Username dan Password Salah !");</script>';

   }





} else if ($_POST['act']=="login") {

  if (empty($_POST['pilih_toko'])) $err['pilih_toko']="<span class=\"err\"></span>\n";

  if (empty($_POST['username'])) $err['username']="<span class=\"err\"></span>\n";

  if (empty($_POST['password'])) $err['password']="<span class=\"err\"></span>\n";

  if($err>0){ // *** if submit error

        echo'<script>alert("Data Belum Valid/Masih Kosong, Silahkan Perbaiki, Terima Kasih");</script>';

    } else { 

      echo'<script>alert("Login Berhasil");</script>';

    }

}



if (empty($_SESSION['islogin2'])){



?>



<center>

<div id="login">

<div id="login_input">



<center>

<a href="../7_panel_guest/index.php"><img src="../../gambar/images/logo.png"></a><br>

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

</form>

</div>

<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>

</center>





<?php



exit;

} else {



$username = $_SESSION['admin_username'];

$idtoko=$_SESSION['idtoko'];

// echo "<center style='color:blue;'><b>$username Sedang Login Sebagai Admin $namatoko3 <b></center>";



?>

<div id="login">

<div id="login_input">



<center>

<a href="../7_panel_guest/index.php"><img src="../../gambar/images/logo.png"></a><br>

<?php echo"<center><H3>LOGIN BERHASIL</H3></center>";

}

?></center></div></div>







