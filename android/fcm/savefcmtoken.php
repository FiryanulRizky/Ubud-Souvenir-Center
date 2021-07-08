<?php
include"../../db/koneksi.php";
 if(!$conn){
     echo "Database connection failed";
 }
 if(isset($_POST['token'])){
     $sql=mysqli_query($conn,"INSERT INTO fcmtoken (token) VALUES ('".$_POST['token']."')");
     if($result){
         echo "Token Inserted Successfully";
     }else{
         echo "Unable to insert token";
     }
 }

?>