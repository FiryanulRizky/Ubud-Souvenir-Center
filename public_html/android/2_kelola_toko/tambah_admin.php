<link rel="stylesheet" type="text/css" href="../css/style_admin.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" />
<?php
// *** LOAD ADMIN PAGE HEADER
ob_start();
include"../1_login_reg/login_reg.php";
ob_end_clean();

if ($_POST['act']=="add"){
    
    if (empty($_POST['username_admin_add'])) $err['username_admin_add']="<span class=\"err\"></span>\n";
    if (empty($_POST['nama_admin'])) $err['nama_admin']="<span class=\"err\"></span>\n";
    if (empty($_POST['password_admin'])) $err['password_admin']="<span class=\"err\"></span>\n";
    if (empty($_POST['telepon'])) $err['telepon']="<span class=\"err\"></span>\n";
    if($err>0){ 
        echo'<script>alert("Isikan Data Pada Kolom WAJIB DIISI");window.location="tambah_admin.php";</script>';
    } else {

      $username =$_POST['username_admin_add'];
      $cek=mysqli_num_rows(mysqli_query($conn,"SELECT id_toko,username FROM admin_web WHERE id_toko='$idtoko' AND username='$username'"));
        
    if($cek > 0) {
      echo'<script>alert("Username sudah terdaftar, Silahkan Login atau Ganti Username Baru, Terima Kasih");window.location ="tambah_admin.php";</script>';
    }
    else{
    
    @mysqli_query($conn,"INSERT INTO admin_web (id_toko,nama,username,password,telepon,jabatan) VALUES ("."'".$idtoko."','".$_POST['nama_admin']."','".$_POST['username_admin_add']."','".md5($_POST['password_admin'])."','".$_POST['telepon']."','".$_POST['jabatan']."')");
    
    echo '
    <script>top.document.location.href="iframe_edit.php"</script>
    ';  
        } 
    } 
}


?>
<td><H3><a href="ambil_data_update_admin.php"><i class="fa fa-arrow-circle-o-left"></i> Kembali</a></H3></td>
<h1 align="center">Tambah Admin</h1>
<form method="post">
<table>
<tr><td>&laquo;&nbsp;Status</td><td>:</td><td><input name="jabatan" class="texbox" value="Admin" readonly></td></tr>
<tr><td>&laquo;&nbsp;Nama Admin</td><td>:</td><td><input name="nama_admin" class="texbox" placeholder="wajib diisi"></td></tr>
<tr><td>&laquo;&nbsp;Username</td><td>:</td><td><input name="username_admin_add" class="texbox" placeholder="wajib diisi"></td></tr>
<tr><td>&laquo;&nbsp;Password</td><td>:</td><td><input type="password" name="password_admin" class="texbox" placeholder="wajib diisi"></td></tr>
<tr><td>&laquo;&nbsp;WA/No. HP</td><td>:</td><td><input name="telepon" class="texbox" placeholder="wajib diisi"></td></tr>
<tr>
<td><input type="submit" value="SIMPAN" class="btn_submit">
    <input type="hidden" name="act" value="add"></td></tr>
    </table>
    </form>