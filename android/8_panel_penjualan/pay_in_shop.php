<html>
    <head>
        <title><?php include"../../db/koneksi.php"; $toko=mysqli_query($conn,"SELECT * FROM infotoko WHERE id_toko='".$_GET['idtoko']."'"); $ambil_data_toko=mysqli_fetch_array($toko); $nama_toko=$ambil_data_toko['nama_toko']; echo "Pay in ".$nama_toko; ?></title>
        <link rel="shortcut icon" type="image/x-icon" href="../../gambar/images/head_logo.ico" />
<link rel="stylesheet" type="text/css" href="../css/style_admin.css">
<?php include"../../db/koneksi.php"; ?>
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
<form class="modal-content animate" method="post" enctype="multipart/form-data">
    <div class="container">
    <div class="container">
        <?php $toko=mysqli_query($conn,"SELECT * FROM infotoko WHERE id_toko='".$_GET['idtoko']."'");$ambil=mysqli_fetch_array($toko);$namatoko=$ambil['nama_toko']; ?>
      <h2 align="center" style="font-size:48px;">PAY IN <?php echo $namatoko; ?></h2>
      <br>
      <input type="text" name="key_shop" placeholder="Input <?php echo $namatoko; ?> Key" style="width: 100%;font-size:48px;" maxlength="8"><br>
        <?php
        echo"<input type='submit' name='pay_in' value='Continue Paying' style='font-size:48px;width:100%;background:blue;font-weight:bold;'><br>
        <input type='submit' name='list_trans' value='Another Pay Method' style='font-size:48px;width:100%;background:orange;font-weight:bold;'><br>
        <input type='submit' name='back_to_menu' value='Cancel' style='font-size:48px;width:100%;background:red;font-weight:bold;'><br></form>";
        if(isset($_POST['pay_in'])) {
            $cek_key=mysqli_query($conn,"SELECT * FROM infotoko WHERE id_toko='".$_GET['idtoko']."'");
            $ambil_key=mysqli_fetch_array($cek_key);
            $db_key=$ambil_key['kunci_akses'];
            $key_form=md5($_POST['key_shop']);
            if($key_form==$db_key){
                echo'<script>alert("Key Access Accepted, Click OK to Continue");window.location="checkout_last.php?idtoko='.$_GET['idtoko'].'";</script>';
            } else {
                echo'<script>alert("Access Denied, Key Shop is Not Valid");</script>';
            }   
        } elseif(isset($_POST['list_trans'])){
            header('Location: checkout_last_confirm.php?idtoko='.$_GET['idtoko'].'');
        } elseif(isset($_POST['back_to_menu'])) {
            echo'<script>
        var yakin = confirm("Sure you want to Cancel this Transaction ?");

        if (yakin) {
        	window.location = "checkout_fisrt.php?idtoko='.$_GET['idtoko'].'";
        } else {
            window.location = "'.$_SERVER['PHP_SELF'].'?idtoko='.$_GET['idtoko'].'";
        }
    </script>';
        }
 ?>
 </body>
 </html>