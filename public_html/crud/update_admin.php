<link rel="stylesheet" type="text/css" href="../css/style_admin.css">
<?php
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));

include"../header_session/login_inner.php";

if ($_POST['act_admin']=="update_admin"){
   @mysqli_query($conn,"UPDATE admin_web SET "."nama='".$_POST['nama']."',"
    ."username='".$_POST['username_admin']."',"
    ."telepon='".$_POST['telepon']."' WHERE id_admin='".$_POST['id_admin']."' AND id_toko='$idtoko'");

     echo'<script>alert("Update Berhasil");window.location = "ambil_data_update_admin.php";</script>';
} elseif ($_POST['act2']=="batal") {
    echo'<script>
        var yakin = confirm("Yakin ingin membatalkan update ?");

        if (yakin) {
            top.document.location.href = "../admin/index.php";
        } else {
            window.location = "ambil_data_update_admin.php";
        }
    </script>';
}
    
    $rs=@mysqli_query($conn,"SELECT * FROM admin_web WHERE id_admin='".$_GET['id']."' AND id_toko='$idtoko'");
    $row=@mysqli_fetch_array($rs,MYSQLI_ASSOC);

echo '
<h1 align="center">Edit Data Admin</h1>
<form method="post" enctype="multipart/form-data">
<table>
<tr><td>&raquo;&nbsp;ID Toko</td><td>:</td><td><input name="id_toko"  class="texbox" value="'.$idtoko.'" readonly></td></tr>
<tr><td>&raquo;&nbsp;ID Admin</td><td>:</td><td><input name="id_admin"  class="texbox" value="'.$_GET['id'].'" readonly></td></tr>
<tr><td>&raquo;&nbsp;Nama</td><td>:</td><td><input name="nama" class="texbox" value="'.$row['nama'].'"></td></tr>
<tr><td>&raquo;&nbsp;Username</td><td>:</td><td><input name="username_admin" class="texbox" value="'.$row['username'].'"></td></tr>
<tr><td>&raquo;&nbsp;Telepon</td><td>:</td><td><input name="telepon" class="texbox" value="'.$row['telepon'].'"></td></tr><tr><td><br></td></tr>
<tr><td colspan="3">
    <input type="submit" value="UPDATE" class="btn_submit">
    <input type="hidden" name="act_admin" value="update_admin">
    <input type="submit" value="BATAL" class="btn_submit">
    <input type="hidden" name="act2" value="batal">
    </td></tr>';
echo"</table></form>";

?>