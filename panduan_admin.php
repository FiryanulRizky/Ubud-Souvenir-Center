<?php include"./header_session/header_outer.php"; ?>
<html>
    <head>
        <title><?php $toko=mysqli_query($conn,"SELECT * FROM infotoko WHERE id_toko='$idtoko'"); $ambil_data_toko=mysqli_fetch_array($toko); $nama_toko=$ambil_data_toko['nama_toko']; echo $nama_toko." Panduan"; ?></title>
        <link rel="shortcut icon" type="image/x-icon" href="./gambar/images/head_logo.ico" />
    </head>
<body>
<?php 
echo'<table border=1 style="width:100%;text-align:center;border:1px solid;" >
    <tr>
        <td colspan="2"><H3>KONTAK DEVELOPER</H3></td>
    </tr>
    <tr>
        <td>Content Creator :<br>
            <a href="https://youtube.com/firyanulrizky">youtube.com/firyanul</a></td><td>Github :<br>
        <a href="https://github.com/FiryanulRizky?tab=repositories">github.com/Firyanul</a></td>
    </tr>
    <tr>
        <td colspan="2">CV Linkedin :<br>
            <a href="https://linkedin.com/in/firyanul-rizky-1593b5139">linkedin.com/firyanul</a></td>
    </tr>
    <tr><td colspan="2">Email : firyan2903@gmail.com<br>HP/WA : 0895606181117</td></tr>
</table><br>
<center><b style="color:blue;"><form method="post"><input type="submit" name="panduan_btn" value="Cek Panduan Aplikasi"></form></b></center>';
if(isset($_POST['panduan_btn'])) {
    echo'<script>alert("masih dalam tahap produksi");window.location="'.$_SERVER['PHP_SELF'].'";</script>';
}
?></body></html>