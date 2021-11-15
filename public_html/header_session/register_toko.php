<html>
    <head>
        <title>Register Toko</title>
        <link rel="shortcut icon" type="image/x-icon" href="../gambar/images/head_logo.ico" />
<link rel="shortcut icon" href="favicon.ico" >
</head>
<body>
<?php 
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
include"header_inner_unlog.php";
include"../db/koneksi.php";
// *** DB CONNECTION
if ($_POST['act']=="toko"){
    if (empty($_POST['nama_toko'])) $err['nama_toko']="<span class=\"err\">Silahkan Isi Nama Toko Anda.</span>\n";
    if (empty($_POST['nama_pemilik'])) $err['nama_pemilik']="<span class=\"err\">Silahkan Isi Nama Pemilik Toko.</span>\n";
    if (empty($_POST['wa'])) $err['wa']="<span class=\"err\">Masukkan WA/HP Bisnis Anda.</span>\n";
    if (empty($_POST['alamat'])) $err['alamat']="<span class=\"err\">Masukkan Alamat Toko Anda.</span>\n";
    if (empty($_POST['pass_pemilik'])) $err['pass_pemilik']="<span class=\"err\">Password Pemilik Wajib diisi.</span>\n";
    if (empty($_POST['kunci_akses'])) $err['kunci_akses']="<span class=\"err\">Kunci Akses Wajib diisi.</span>\n";
    if($err>0){ // *** if submit error
      echo'<script>alert("Data Belum Valid/Masih Kosong, Silahkan Perbaiki, Terima Kasih");window.location ="register_toko.php";</script>';
    } else { // *** if submit OK
      $namatoko =$_POST['nama_toko'];
      $cek=mysqli_num_rows(mysqli_query($conn,"SELECT nama_toko FROM infotoko WHERE nama_toko='$namatoko'"));
        
    if($cek > 0) {
      echo'<script>alert("Nama Toko sudah terdaftar, Silahkan Login atau Ganti Nama Toko dengan paduan simbol unik lain, Terima Kasih");window.location ="register_toko.php";</script>';
    }
    else {
      if(!empty($_FILES['gambar_toko']['name']))
      {
        $path = "./gambar/toko/";
        $nama_gambar = $_FILES['gambar_toko']['name'];
        $tmp = $_FILES['gambar_toko']['tmp_name'];
        $type = pathinfo($nama_gambar, PATHINFO_EXTENSION);
        if ($type!=jpg && $type!=png) {
            echo'<script>alert("pastikan hanya input gambar berekstensi jpg/png");</script>';
        } else {
             move_uploaded_file($tmp, $path.$nama_gambar);
             $masukdatabase=mysqli_query($conn,"INSERT INTO infotoko (nama_toko,gambar_toko,pemilik,password,kunci_akses,wa,alamat,deskripsi) VALUES ("."'".$_POST['nama_toko']."','".$nama_gambar."','".$_POST['nama_pemilik']."','".md5($_POST['pass_pemilik'])."','".md5($_POST['kunci_akses'])."','".$_POST['wa']."','".$_POST['alamat']."','".$_POST['deskripsi']."')");
             $query_toko=mysqli_query($conn,"SELECT * FROM infotoko WHERE nama_toko='".$_POST['nama_toko']."'");
             $ambil_data=mysqli_fetch_array($query_toko);
             $namatoko=$ambil_data['nama_toko'];
             echo'<script>alert("Register Sukses, Silahkan Daftarkan Admin '.$namatoko.' !!!");window.location ="register_admin.php";</script>';
        }
      } else {
          echo'<script>alert("inputkan gambar toko");</script>';
      }
    } 
  }
}

if ($_POST['act1']=="cancel"){
	echo'<script>
        var yakin = confirm("Yakin ingin membatalkan?");

        if (yakin) {
            window.location = "../admin/index.php";
        } else {
            window.location = "register_toko.php";
        }
    </script>';
}
?>
<center>
<div id="login">
<div id="login_input">
<img src="../gambar/images/logo.png"><br>
<form method="post" enctype="multipart/form-data">
<input class="teksbok_admin" placeholder="Input Nama Toko" type="text" name="nama_toko" maxlength="25"><br><br>
<H3>Upload Gambar Toko</H3><input type="file" name="gambar_toko" class="teksbok_admin"><br><br>
<input class="teksbok_admin" placeholder="Input Nama Pemilik" type="text" name="nama_pemilik" maxlength="25"><br>
<input class="teksbok_admin" placeholder="WA/HP Bisnis" type="text" name="wa" maxlength="13"><br>
<textarea placeholder="alamat" name="alamat" maxlength="100" rows="4" cols="40"></textarea><br>
<textarea placeholder="Deskripsi Toko" name="deskripsi" maxlength="100" rows="4" cols="40"></textarea><br>
<input class="teksbok_admin" placeholder="Password Akses Pemilik" type="password" name="pass_pemilik" maxlength="8"><br>
<input class="teksbok_admin" placeholder="Kunci Akses Toko" type="password" name="kunci_akses" maxlength="8"><br><br>
<input type="hidden" name="act" value="toko">
<input class="tombol_login" type="submit" value="REGISTER SHOP"><br><br>
</form>
<form method="post">
  <input type="hidden" name="act1" value="cancel">
  <input class="tombol_login" type="submit" value="CANCEL">
</form>
</div>
</center>
</body>
</html>