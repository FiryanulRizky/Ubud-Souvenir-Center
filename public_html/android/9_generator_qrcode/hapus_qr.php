<link rel="stylesheet" type="text/css" href="../css/style_admin.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" />

<?php

// *** LOAD ADMIN PAGE HEADER
ob_start();
include "../1_login_reg/login_reg.php";
ob_end_clean();



if (!empty($_GET['id'])){

    $rs=@mysqli_query($conn,"SELECT * FROM qrcodes WHERE id='".$_GET['id']."' AND id_toko='$idtoko'");

    $row=@mysqli_fetch_array($rs,MYSQLI_ASSOC);

echo '<td><H3><a href="index.php"><i class="fa fa-arrow-circle-o-left"></i> Batal</a></H3></td>

<form method="post" enctype="multipart/form-data">

&raquo;&nbsp;Nama : '.$row['qrUsername'].'<br>

&raquo;&nbsp;Link : '.$row['qrContent'].'<br>

&raquo;&nbsp;Kode Qr : <img src=\'../../generator_qrcode/userQr/'.$row['qrImg'].'\' width=120 height=120><br>

    

    <input type="submit" value="HAPUS QR" class="btn_submit">

    <input type="hidden" name="act" value="delete" >

    <input type="hidden" name="id" value="'.$row['id'].'">

    </form>

';

}



if ($_POST['act']=="delete"){

    $gambar=mysqli_query($conn,"SELECT * FROM qrcodes WHERE id_toko='$idtoko' AND id='".$_GET['id']."'");

    $nama_gambar=mysqli_fetch_array($gambar,MYSQLI_ASSOC);

    $hapus_gambar=$nama_gambar['qrImg'];

    $files=glob("../../generator_qrcode/userQr/".$hapus_gambar."");

    foreach ($files as $file) {

    if (is_file($file))

    unlink($file); // hapus file

    @mysqli_query($conn,"DELETE FROM qrcodes WHERE id='".$_GET['id']."' AND id_toko='$idtoko'");

}

    echo '

    <script>window.location="index.php"</script>

    ';    

}
echo'<br><hr style="border-bottom: 5px solid;">';
?>

<div class="cleared"></div>