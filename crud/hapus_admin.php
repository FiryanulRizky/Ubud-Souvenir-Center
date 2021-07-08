<link rel="stylesheet" type="text/css" href="../css/style_admin.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" />
<?php
// *** LOAD ADMIN PAGE HEADER
include "../header_session/login_inner.php";

if (!empty($_GET['id'])){
    $rs=@mysqli_query($conn,"SELECT * FROM admin_web WHERE id_admin='".$_GET['id']."' AND id_toko='$idtoko'");
    $row=@mysqli_fetch_array($rs,MYSQLI_ASSOC);
echo '
<td><a href="ambil_data_update_admin.php"><i class="fa fa-arrow-circle-o-left"></i> Back</a></td>
<form method="post" enctype="multipart/form-data">
&raquo;&nbsp;ID Admin : '.$row['id_admin'].'<br>
&raquo;&nbsp;Nama : '.$row['nama'].'<br>
&raquo;&nbsp;Username : '.$row['username'].'<br>
&raquo;&nbsp;telepon : '.$row['telepon'].'<br>    
    <input type="submit" value="DELETE" class="btn_submit">
    <input type="hidden" name="act" value="delete" >
    </form>
';
}

if ($_POST['act']=="delete"){
    @mysqli_query($conn,"DELETE FROM admin_web WHERE id_admin='".$_GET['id']."' AND id_toko='$idtoko'");
    
    echo '
    <script>window.location="ambil_data_update_admin.php"</script>
    ';    
}
?>