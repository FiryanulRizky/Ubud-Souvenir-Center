<?php

ob_start();

include"login_reg.php";

ob_end_clean();

?>

<link rel="stylesheet" type="text/css" href="../css/style_admin.css">

<div id="login">

<div id="login_input">

<center>

<img src="../../gambar/images/logo.png"><br>

<?php echo"<br><center><H3>Logout dari $namatoko3 ?</H3></center><form method='post' action='logout.php'><input type='submit' class='tombol_login' value='LOGOUT'></form>";

?></center></div></div>







