<link rel="stylesheet" type="text/css" href="../css/style_admin.css">
<script src="../js/ckeditor/ckeditor.js"></script>
<?php
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));

include"../header_session/login_inner.php";

if ($_POST['act']=="edit"){

  if( !empty($_FILES['gambar_toko']['name']) )
    {
    $path = "../gambar/toko/";
    $nama_gambar = $_FILES['gambar_toko']['name'];
    $tmp = $_FILES['gambar_toko']['tmp_name'];
    $type = pathinfo($nama_gambar, PATHINFO_EXTENSION);
    if ($type!=jpg && $type!=png) {
        echo'<script>alert("Type gambar harus berekstensi png/jpg");</script>';
        echo'<script>
        var yakin = confirm("Update anda tidak Berhasil, Keluar ke dashboard ?");

        if (yakin) {
            top.document.location.href = "../admin/index.php";
        } else {
            window.location = "update_toko.php";
        }
    </script>';
    } else {
    move_uploaded_file($tmp, $path.$nama_gambar);
    
    if(!empty($_POST['password'])) {
        @mysqli_query($conn,"UPDATE infotoko SET "."nama_toko='".$_POST['toko']."',"."pemilik='".$_POST['pemilik']."',"."password='".md5($_POST['password'])."',"."gambar_toko='".$nama_gambar."',"."wa='".$_POST['wa']."',"."alamat='".$_POST['alamat']."',"."deskripsi='".$_POST['deskripsi']."' WHERE id_toko='$idtoko'"); } elseif(!empty($_POST['kunci_akses'])) {
        @mysqli_query($conn,"UPDATE infotoko SET "."nama_toko='".$_POST['toko']."',"
    ."pemilik='".$_POST['pemilik']."',"."kunci_akses='".md5($_POST['kunci_akses'])."',"."gambar_toko='".$nama_gambar."',"."wa='".$_POST['wa']."',"."alamat='".$_POST['alamat']."',"."deskripsi='".$_POST['deskripsi']."' WHERE id_toko='$idtoko'");
    } else {
        @mysqli_query($conn,"UPDATE infotoko SET "."nama_toko='".$_POST['toko']."',"."pemilik='".$_POST['pemilik']."',"."gambar_toko='".$nama_gambar."',"."wa='".$_POST['wa']."',"."alamat='".$_POST['alamat']."',"."deskripsi='".$_POST['deskripsi']."' WHERE id_toko='$idtoko'");
    }
    
        echo'<script>
        var yakin = confirm("Update Berhasil, Keluar ke dashboard ?");

        if (yakin) {
            top.document.location.href = "../admin/index.php";
        } else {
            window.location = "update_toko.php";
        }
    </script>';
    }
    } else {

   if(!empty($_POST['password'])) {
        @mysqli_query($conn,"UPDATE infotoko SET "."nama_toko='".$_POST['toko']."',"."pemilik='".$_POST['pemilik']."',"."password='".md5($_POST['password'])."',"."gambar_toko='".$_POST['gambar_toko2']."',"."wa='".$_POST['wa']."',"."alamat='".$_POST['alamat']."',"."deskripsi='".$_POST['deskripsi']."' WHERE id_toko='$idtoko'"); } elseif(!empty($_POST['kunci_akses'])) {
        @mysqli_query($conn,"UPDATE infotoko SET "."nama_toko='".$_POST['toko']."',"
    ."pemilik='".$_POST['pemilik']."',"."kunci_akses='".md5($_POST['kunci_akses'])."',"."gambar_toko='".$_POST['gambar_toko2']."',"."wa='".$_POST['wa']."',"."alamat='".$_POST['alamat']."',"."deskripsi='".$_POST['deskripsi']."' WHERE id_toko='$idtoko'");
    } else {
        @mysqli_query($conn,"UPDATE infotoko SET "."nama_toko='".$_POST['toko']."',"."pemilik='".$_POST['pemilik']."',"."gambar_toko='".$_POST['gambar_toko2']."',"."wa='".$_POST['wa']."',"."alamat='".$_POST['alamat']."',"."deskripsi='".$_POST['deskripsi']."' WHERE id_toko='$idtoko'");
    }
   
    echo'<script>
        var yakin = confirm("Update Berhasil, Keluar ke dashboard ?");

        if (yakin) {
            top.document.location.href = "../admin/index.php";
        } else {
            window.location = "update_toko.php";
        }
    </script>';

     }
     
} 
    
    $rs=mysqli_query($conn,"SELECT * FROM infotoko WHERE id_toko='$idtoko'");
    $row=mysqli_fetch_array($rs,MYSQLI_ASSOC);

			if (file_exists("../gambar/toko/".$row['gambar_toko'].""))
                $gambar="<img src=\"../gambar/toko/".$row['gambar_toko']."\" width=50>";
            else
                $gambar="";

echo '<center>
<h1 align="center">Edit Info Toko</h1>
<form method="post" enctype="multipart/form-data">
<table>
<tr><td>&raquo;&nbsp;ID Toko</td><td>:</td><td><input name="id_toko"  class="texbox" value="'.$idtoko.'" readonly></td></tr>
<tr><td>&raquo;&nbsp;Nama Toko</td><td>:</td><td><input name="toko" class="texbox" value="'.$row['nama_toko'].'"></td></tr>
<tr><td>&raquo;&nbsp;Pemilik</td><td>:</td><td><input name="pemilik" class="texbox" value="'.$row['pemilik'].'"></td></tr>
<tr><td>&raquo;&nbsp;Password Akses</td><td>:</td><td><input name="password" class="texbox" placeholder="enkripsi('.substr($row['password'],0,3).')"></td></tr>
<tr><td>&raquo;&nbsp;Kunci Akses Toko</td><td>:</td><td><input name="kunci_akses" class="texbox" placeholder="enkripsi('.substr($row['kunci_akses'],0,3).')"></td></tr>
<tr><td>&raquo;&nbsp;WA/HP Bisnis Akses</td><td>:</td><td><input name="wa" class="texbox" value="'.$row['wa'].'"></td></tr>
<tr><td>&raquo;&nbsp;Alamat</td><td>:</td><td><input name="alamat" class="texbox" value="'.$row['alamat'].'"></td></tr>
<tr><td>&raquo;&nbsp;Deskripsi</td><td>:</td><td><textarea name="deskripsi" style="width:100%;" class="ckeditor" rows="7" placeholder="Isikan Deskripsi">'.$row['deskripsi'].'</textarea></td></tr>
<tr><td colspan=3>&raquo;&nbsp;<input type="file" name="gambar_toko" ></br>Gambar Saat ini<br>'.$gambar.'</td></tr>
<tr><td colspan=3><input type="hidden" name="gambar_toko2" value="'.$row['gambar_toko'].'"></td></tr>
<tr><td colspan=3 style="text-align:center;"><input type="submit" value="UPDATE" class="btn_submit"><input type="hidden" name="act" value="edit"></td></tr></table></form></center>';
?>