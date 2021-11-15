<!DOCTYPE html>
<html>
<head>
  <title>QR Code Generator</title>
<link rel="stylesheet" type="text/css" href="../css/style_admin.css">
<?php ob_start();include"../1_login_reg/login_reg.php";ob_end_clean();?>
<style>
body {font-family: Arial, Helvetica, sans-serif;}

/* Full-width input fields */
input[type=text], input[type=password] {
    width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    box-sizing: border-box;
}

/* Set a style for all buttons */
input[type=submit]{
    background-color: #4CAF50;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    cursor: pointer;
    width: 100%;
    text-align: center;
    text-decoration: none;
    font-size:21px;
    font-weight:bold;
}

input[type=submit]:hover {
    opacity: 0.8;
}

/* Extra styles for the cancel button */
.cancelbtn {
    width: auto;
    padding: 10px 18px;
    background-color: #f44336;
}

/* Center the image and position the close button */
.imgcontainer {
    text-align: center;
    margin: 24px 0 12px 0;
    position: relative;
}

img.avatar {
    width: 40%;
    border-radius: 50%;
}

.container {
    padding: 16px;
}

span.psw {
    float: right;
    padding-top: 16px;
}

/* Modal Content/Box */
.modal-content {
    background-color: #fefefe;
    margin: 5% auto 15% auto; /* 5% from the top, 15% from the bottom and centered */
    border: 1px solid #888;
    width: 80%; /* Could be more or less, depending on screen size */
}

/* The Close Button (x) */
.close {
    position: absolute;
    right: 25px;
    top: 0;
    color: #000;
    font-size: 35px;
    font-weight: bold;
}

.close:hover,
.close:focus {
    color: red;
    cursor: pointer;
}

/* Change styles for span and cancel button on extra small screens */
@media screen and (max-width: 300px) {
    span.psw {
       display: block;
       float: none;
    }
    .cancelbtn {
       width: 100%;
    }
}
#qrSucc
{
  width: 90%;
  margin:  auto;
  text-align: center;
}
#qrSucc a
{
    background-color: #4CAF50;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    cursor: pointer;
    width: 100%;
    text-align: center;
    text-decoration: none;
}
</style>
</head>
<body>
    <?php 
  include "Qr/qrlib.php";
  include "config.php";
  if (isset($_POST['create_item'])) {
    $qc =  $_POST['qrContent'];
    $qrUname = $_POST['qrUname'];
    $status= $_POST['status_qr'];
    $qrImgName = "".$qrUname."".rand();
    if($qc=="" && $qrUname=="")
    {
      echo "<script>alert('Pilih Item Anda');</script>";
    }
    elseif($qc=="")
    {
      echo "<script>alert('Masukkan Code Msg');</script>";
    }
    elseif($qrUname=="")
    {
      echo "<script>alert('Pilih Item  Anda');</script>";
    }
    else
    {
    $cek_usr2=mysqli_query($conn,"SELECT * FROM qrcodes WHERE id_toko='$idtoko' AND status='item' AND qrUsername='".$qrUname."'");
    $cek_username2=mysqli_num_rows($cek_usr2);
    if ($cek_username2>0) {
      echo'<script>alert("Data sudah ada, Anda hanya bisa menambah satu QR Code Sejenis");</script>';
    } else {
    $final = $qc;
    $qrs = QRcode::png($final,"../../generator_qrcode/userQr/$qrImgName.png","H","3","3");
    $qrimage = $qrImgName.".png";
    $workDir = $_SERVER['HTTP_HOST'];
    $qrlink = $workDir."/generator_qrcode/userQr/".$qrImgName.".png";
    $insQr = $meravi->insertQr($idtoko,$qrUname,$final,$qrimage,$qrlink,$status); }
    if($insQr==true)
    {
      echo "<script>alert('QR $qrUname. berhasil dibuat'); window.location='qr_generator_item.php?success=$qrimage';</script>";

    }
    else
    {
      echo "<script>alert('Generate QR Code Gagal');</script>";
    }
  }
 }
  ?>
  <?php 
  if(isset($_GET['success']))
  {
  ?>
  <div id="qrSucc">
  <div class="modal-content animate container">
    <?php 
    ?>
    <H2 style="font-size:24px;">QR berhasil dibuat</H2><br>
    <img src="../../generator_qrcode/userQr/<?php echo $_GET['success']; ?>" alt="">
    <?php 
$workDir = $_SERVER['HTTP_HOST'];
    $qrlink = $workDir."/generator_qrcode/userQr/".$_GET['success'];
    ?>
     
    <input type="text" value="<?php echo $qrlink; ?>" readonly>
    <br><br>
<a href="download.php?download=<?php echo $_GET['success']; ?>" style="font-size:18px;font-weight:bold;background:blue;width:100%;">Unduh QR</a>
<br>
 <br><br>
    <a href="qr_generator_item.php" style="font-size:18px;font-weight:bold;width:100%;">Generate QR Lain</a>
    <br>
    <br><br>
    <a href="index.php" style="font-size:18px;font-weight:bold;background:red;width:100%;">Keluar</a>
    
     </div></div>
  <?php
}
else
{
  ?>
<div id="id01" class="modal">
  
  <?php echo'<form class="modal-content animate" method="post" action="qr_generator_item.php?id='.$_POST['kd_item'].'">';?>
    <div class="container">
        <?php if (empty($_GET['id'])) { ?>
      <h2 align="center"><?php echo $namatoko3."<br>"; ?> QR Code Generator</h2>
     <label for="psw"><b>Status</b></label><br>
      <input type="text" name="status_qr" value="item" readonly style="width: 100px;">
      <br><br>
     <label for="uname"><b>Pilih Item</b></label><br>
      <select name="kd_item" class="teksbok_admin">
      <option value="">Pilih Item</option>
      <?php
    $item = mysqli_query($conn,"SELECT * FROM item WHERE id_toko='$idtoko' ORDER BY id_item asc");
    while($hasil=mysqli_fetch_array($item,MYSQLI_ASSOC)){
      echo"<option value=".$hasil['kditem'].">".$hasil['merk']." (BR".$hasil['kditem'].")</option>"; } echo'<input type="submit" style="border:1px solid red; padding:11px; background:orange; color:white; font-weight:bold;font-size:21px;" value="Proses (Klik 2x)"><br><br><a href="index.php"><table style="border:1px solid; width:100%; background:lightgreen; padding:11px; text-align:center; font-size:21px; font-weight:bold;"><tr><td>Kembali</td></tr></table></a>';
    } else {
      $item2 = mysqli_query($conn,"SELECT * FROM item WHERE id_toko='$idtoko' AND kditem='".$_GET['id']."'"); $ambil_item2=mysqli_fetch_array($item2);$merk=$ambil_item2['merk'];
      echo'<h2 align="center">'.$namatoko3.'<br> QR Code Generator Item '.$merk.'</h2>
     <label for="psw"><b>Status</b></label><br>
      <input type="text" name="status_qr" value="item" readonly style="width: 100px;">
      <br><br>
      <label for="psw"><b>Merk Terseleksi</b></label>
      <input type="text" name="qrUname" value="'.$merk.'" readonly>
      <label for="psw"><b>URL Penjualan '.$merk.'</b></label>
      <input type="text" name="qrContent" value="https://ubud-souvenir-center.my.id/android/8_panel_penjualan/detail.php?idtoko='.$idtoko.'&id='.$_GET['id'].'" readonly>
      <input type="submit" value="QR '.$merk.'" name="create_item">';?></select>
  </form>
  <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
    <input type="submit" value="Kembali" name="kembali" style="background:orange;color:black;">
  </form>
  </div>
    <?php 
} }
   ?>
</div>
</body>
</html>
