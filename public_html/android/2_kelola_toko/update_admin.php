<link rel="stylesheet" type="text/css" href="../css/style_admin.css">
<?php
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));

ob_start();
include"../1_login_reg/login_reg.php";
ob_end_clean();

if ($_POST['act_admin']=="update_admin"){
    if(empty($_POST['pass_admin'])) {
   @mysqli_query($conn,"UPDATE admin_web SET "."nama='".$_POST['nama']."',"
    ."username='".$_POST['username_admin']."',"
    ."telepon='".$_POST['telepon']."' WHERE id_admin='".$_POST['id_admin']."' AND id_toko='$idtoko'"); } else {
        @mysqli_query($conn,"UPDATE admin_web SET "."nama='".$_POST['nama']."',"
    ."username='".$_POST['username_admin']."',"."password='".md5($_POST['pass_admin'])."',"
    ."telepon='".$_POST['telepon']."' WHERE id_admin='".$_POST['id_admin']."' AND id_toko='$idtoko'");
    }

     echo'<script>top.document.location.href= "iframe_edit.php";</script>';
} elseif ($_POST['act2']=="batal") {
    echo'<script>
        var yakin = confirm("Yakin ingin membatalkan update ?");

        if (yakin) {
            top.document.location.href = "index.php";
        } else {
            window.location = "iframe_edit.php";
        }
    </script>';
}
    
    $rs=@mysqli_query($conn,"SELECT * FROM admin_web WHERE id_admin='".$_GET['id']."' AND id_toko='$idtoko'");
    $row=@mysqli_fetch_array($rs,MYSQLI_ASSOC);

echo '
<h1 align="center">Edit Data Admin</h1>
<form method="post" enctype="multipart/form-data">
<table style="width:100%;">
<tr><td>&raquo;&nbsp;ID Toko</td><td>:</td><td><input name="id_toko"  class="texbox" value="'.$idtoko.'" readonly></td></tr>
<tr><td>&raquo;&nbsp;ID Admin</td><td>:</td><td><input name="id_admin"  class="texbox" value="'.$_GET['id'].'" readonly></td></tr>
<tr><td>&raquo;&nbsp;Nama</td><td>:</td><td><input name="nama" class="texbox" value="'.$row['nama'].'"></td></tr>
<tr><td>&raquo;&nbsp;Username</td><td>:</td><td><input name="username_admin" class="texbox" value="'.$row['username'].'"></td></tr>
<tr><td>&raquo;&nbsp;Password</td><td>:</td><td><input name="pass_admin" class="texbox" placeholder="enkripsi('.substr($row['password'],0,3).')"></td></tr>
<tr><td>&raquo;&nbsp;Telepon</td><td>:</td><td><input name="telepon" class="texbox" value="'.$row['telepon'].'"></td></tr><tr><td><br></td></tr>
<tr><td colspan="3" style="text-align:center;">
    <input type="submit" value="UPDATE" class="btn_submit">
    <input type="hidden" name="act_admin" value="update_admin"><br><br>
    <input type="submit" value="BATAL" class="btn_submit" style="background:orange;">
    <input type="hidden" name="act2" value="batal">
    </td></tr>';
echo"</table></form>";

?>