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

/* Add Zoom Animation */
.animate {
    -webkit-animation: animatezoom 0.6s;
    animation: animatezoom 0.6s
}

@-webkit-keyframes animatezoom {
    from {-webkit-transform: scale(0)} 
    to {-webkit-transform: scale(1)}
}
    
@keyframes animatezoom {
    from {transform: scale(0)} 
    to {transform: scale(1)}
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
  if(isset($_POST['create_toko']))
  {
    $qc =  $_POST['qrContent'];
    $qrUname = $_POST['qrUname'];
    $status= $_POST['status_qr'];
    $qrImgName = "".$namatoko3."".rand();
    if($qc=="" && $qrUname=="")
    {
      echo "<script>alert('Masukkan Nama Toko Anda');</script>";
    }
    elseif($qc=="")
    {
      echo "<script>alert('Masukkan Code Msg');</script>";
    }
    elseif($qrUname=="")
    {
      echo "<script>alert('Masukkan Nama Anda');</script>";
    }
    else
    {
    $cek_usr=mysqli_query($conn,"SELECT * FROM qrcodes WHERE id_toko='$idtoko' AND status='toko' AND qrUsername='$qrUname'");
    $cek_username=mysqli_num_rows($cek_usr);
    if ($cek_username>0) {
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
      echo "<script>alert('Selamat $qrUname. QR Anda berhasil dibuat'); window.location='index.php?success=$qrimage';</script>";

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
 
    <img src="userQr/<?php echo $_GET['success']; ?>" alt="">
    <?php 
$workDir = $_SERVER['HTTP_HOST'];
    $qrlink = $workDir."/generator_qrcode/userQr/".$_GET['success'];
    ?>
     
    <input type="text" value="<?php echo $qrlink; ?>" readonly>
    <br><br>
<a href="download.php?download=<?php echo $_GET['success']; ?>">Unduh QR</a>
<br>
 <br><br>
    <a href="index.php">List QR Code</a>
    <br>
    <br><br>
    <a href="index.php">Bentuk Ulang</a>
    
     </div></div>
  <?php
}
else
{
  ?>
<div id="id01" class="modal">
  
  <form class="modal-content animate" method="post" enctype="multipart/form-data">
    <div class="container">
      <h2 align="center"><?php echo $namatoko3."<br>"; ?> QR Code Generator</h2>
      <?php $cek_item=mysqli_query($conn,"SELECT * FROM item WHERE id_toko='$idtoko'"); if (empty($_POST['status'])) {
       ?>
      <br>
      <center><select name="status" class="teksbok_admin">
        <option value="">Pilih Proses QR</option>
        <option value="toko">QR Toko</option>
        <?php if (mysqli_num_rows($cek_item)>0) {
         ?>
        <option value="item">QR Item</option><?php } ?></select><br><input type="submit" value="Pilih" style="width: 80px; text-align: center; background: blue; font-weight: bold;">&nbsp;&nbsp;<a href="index.php" style="border:1px solid red; padding: 11px; background: orange; color: white;">Kembali</a></center><br><br><?php } ?>
      <?php if ($_POST['status']=="toko") {
      ?>
      <label for="psw"><b>Status</b></label><br>
      <input type="text" name="status_qr" value="toko" readonly style="width: 100px;"><br><br>
      <label for="uname"><b>Nama Toko Anda</b></label>
      <input type="text" name="qrUname" readonly value="<?php echo $namatoko3; if(isset($_POST['create'])){ echo $_POST['qrUname']; } ?>">

      <label for="psw"><b>URL E-Commerce <?php echo $namatoko3; ?></b></label>
      <input type="text" name="qrContent" readonly value="<?php echo'https://ubud-souvenir-center.my.id/android/8_panel_penjualan/index.php?idtoko='.$idtoko.''; ?>">
        
      <input type="submit" value="Generate QR Code Toko Anda" name="create_toko">
  </form>
  <?php if (!empty($_POST['status'])) { ?>
  <form method="post" action="qr_generator_toko.php?clear=y">
    <input type="submit" value="Reset" name="reset">
  </form><?php } ?>
  <form method="post" action="index.php">
    <input type="submit" value="Kembali" name="kembali">
  </form>
  </div>
    <?php 
} elseif ($_POST['status']=="item") {
  header("location:qr_generator_item.php");
} }
   ?>
</div>

</body>
</html>
