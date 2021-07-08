<link rel="stylesheet" type="text/css" href="../css/style_admin.css">

<?php 

ob_start();

include"../1_login_reg/login_reg.php";

ob_end_clean();

include"../notif/notif_android.php";

?> <div id="bgkonten"> <?php

$query=mysqli_query($conn,"SELECT * FROM infotoko WHERE id_toko='$idtoko'");

$toko=mysqli_fetch_array($query);

$query2=mysqli_query($conn,"SELECT * FROM admin_web WHERE id_toko='$idtoko'");

$query3=mysqli_query($conn,"SELECT * FROM item WHERE id_toko='$idtoko'");

$item=mysqli_fetch_array($query3);

$query4=mysqli_query($conn,"SELECT SUM(stok) AS total_stok FROM item WHERE id_toko='$idtoko'");

$item2=mysqli_fetch_array($query4);

$query5=mysqli_query($conn,"SELECT * FROM transaksi WHERE id_toko='$idtoko' GROUP BY kdtransaksi");

ob_start();

include"../6_lihat_analisa/tangkap_data_cpm.php";

ob_end_clean();

          $sql = mysqli_query($conn,"SELECT * FROM infotoko WHERE id_toko ='$idtoko'");

          $data = mysqli_fetch_array($sql,MYSQLI_ASSOC);

            echo'<p><center><h1>Selamat Datang di <a href="konfirmasi_pemilik.php?idtoko='.$data['id_toko'].'">'.$data['nama_toko'].'</a></h1></center></p><br>';

            $qr_cek=mysqli_query($conn,"SELECT qrImg FROM qrcodes WHERE id_toko='$idtoko' ORDER BY id DESC LIMIT 1");

            if(mysqli_num_rows($qr_cek)>0){

            $qr_ambil=mysqli_fetch_array($qr_cek,MYSQLI_ASSOC);

            echo "<center><img src='../../generator_qrcode/userQr/".$qr_ambil['qrImg']."' width='100' height='100'></center><br>";}

            ?><form method="post">

<?php

$cek_status_toko=mysqli_query($conn,"SELECT * FROM infotoko WHERE id_toko='$idtoko'");

$ambil_status=mysqli_fetch_array($cek_status_toko);

$status_toko=$ambil_status['status'];

$status_detail=$ambil_status['info_status'];

if ($status_toko=="") {

    ?> <center><input type="submit" name="set" value="Early Register (Ubah status)" style="background: lightblue; border:1px solid;padding: 10px;font-size: 18px;"></center> <?php

} if (isset($_POST['set'])) {

    ?> <center><input type="submit" name="awal" value="set sekarang" style="background: yellow;padding: 10px;font-size: 18px;"></center> <?php

}

elseif (isset($_POST['awal'])&&$status_toko!="in Trouble") {

    ?> <div id="bgkonten"><center><form method="post">

<input type="submit" name="aktif" value="Status : Active" style="background: blue;color: white;font-size: 24px;width: 100%;height: 50px;"><?php if (empty($_POST['info_open'])) {

 ?><br><br><H3>Set Jam Buka :</H3><?php if (!empty($status_detail)&&$status_toko=="Active") {

     ?> <input type="text" name="info_open" value="<?php echo $status_detail; ?>" class="teksbok_admin" maxlength="30"> <?php 

 } else { ?><input type="text" name="info_open" value="(Open ... - Closed ...)" class="teksbok_admin" maxlength="30"><?php } ?><br><br><i style="font-size: 16px;">*isikan ... dgn jam buka dan jam tutup toko, exp: (Open 10:00 - Closed 21:00)</i><br><br><input type="submit" value="set" name="awal" class="btn_submit"></form></center></div><div class="cleared"></div><br><br> <?php } else {

  if ($_POST['info_open']!="(Open ... - Closed ...)") {

    $status="Active";$info=$_POST['info_open']; @mysqli_query($conn,"UPDATE infotoko SET status='$status',info_status='$info' WHERE id_toko='$idtoko'");

        echo'<script>window.location = "index.php";</script>';

  } else {

    echo'<script>alert("titik-titik pada kolom set Jam Buka wajib diisi");window.location="index.php";</script>';

    }

  }

} elseif (isset($_POST['awal'])&&$status_toko!="Peninjauan Penghapusan") {

    ?> <div id="bgkonten"><center><form method="post">

<input type="submit" name="aktif" value="Status : Active" style="background: blue;color: white;font-size: 24px;width: 100%;height: 50px;"><?php if (empty($_POST['info_open'])) {

 ?><br><br><H3>Set Jam Buka :</H3><?php if (!empty($status_detail)&&$status_toko=="Active") {

     ?> <input type="text" name="info_open" value="<?php echo $status_detail; ?>" class="teksbok_admin" maxlength="30"> <?php 

 } else { ?><input type="text" name="info_open" value="(Open ... - Closed ...)" class="teksbok_admin" maxlength="30"><?php } ?><br><br><i style="font-size: 16px;">*isikan ... dgn jam buka dan jam tutup toko, exp: (Open 10:00 - Closed 21:00)</i><br><br><input type="submit" value="set" name="awal" class="btn_submit"></form></center></div><div class="cleared"></div><br><br> <?php } else {

  if ($_POST['info_open']!="(Open ... - Closed ...)") {

    $status="Active";$info=$_POST['info_open']; @mysqli_query($conn,"UPDATE infotoko SET status='$status',info_status='$info' WHERE id_toko='$idtoko'");

        echo'<script>window.location = "index.php";</script>';

  } else {

    echo'<script>alert("titik-titik pada kolom set Jam Buka wajib diisi");window.location="index.php";</script>';

      }

    }

  } if (isset($_POST['awal'])&&$status_toko=="in Trouble") {

    echo'<script>alert("Maaf Anda tidak bisa mengubah status ini atas izin Pemilik Toko");window.location = "index.php";</script>'; 



} if (isset($_POST['awal'])&&$status_toko=="Peninjauan Penghapusan") {

    echo'<script>alert("Maaf Anda tidak bisa mengubah status ini atas izin Pemilik Toko");window.location = "index.php";</script>'; 



} elseif (isset($_POST['aktif'])) {

    ?> <div id="bgkonten"><center><form method="post">

<input type="submit" name="libur" value="Status : Closed" style="background: orange;color: white;padding: 10px;font-size: 24px;width: 100%;height: 50px;"><?php if (empty($_POST['info_libur'])) {

 ?><br><br><H3>Set Tanggal Buka Kembali</H3><br><?php if (!empty($status_detail)&&$status_toko=="Closed") {

     ?><input type="text" name="info_libur" class="teksbok_admin" value="<?php echo $status_detail; ?>" maxlength="25"><?php

 } else { ?><input type="text" name="info_libur" class="teksbok_admin" value="(Ready ... ... ...)" maxlength="25"><?php } ?><br><br><i style="font-size: 16px;">*isikan ... dgn tgl/bln/tahun, exp: 21 January 2022</i><br><br><input type="submit" value="set" name="aktif" class="btn_submit"></form></center></div><div class="cleared"></div><br><br> <?php } else {

  if ($_POST['info_libur']!="(Ready ... ... ...)") {

    $status="Closed";$info=$_POST['info_libur']; @mysqli_query($conn,"UPDATE infotoko SET status='$status',info_status='$info' WHERE id_toko='$idtoko'");

        echo'<script>window.location = "index.php";</script>';

  } else {

    echo'<script>alert("titik-titik pada kolom set tanggal wajib diisi");window.location="index.php";</script>';

      }

    }

  } elseif (isset($_POST['libur'])) {

    echo'<script>window.location = "index.php";</script>';

} else {

    if ($status_toko=="Closed") {

        if ($status_detail=="") {

            echo"<center><input type='submit' value='Status Toko : ".$status_toko."' name='awal' style='background:orange; padding:5px; font-size:15px;width:100%; color:white;'></center><br>";

        } else {

        echo"<center><input type='submit' value='Status Toko : ".$status_toko." ".$status_detail."' name='awal' style='background:orange; padding:5px; font-size:15px;width:100%; color:white;'></center><br>";

        }

    } elseif ($status_toko=="Active") {

        if ($status_detail=="") {

            echo"<center><input type='submit' value='Status Toko : ".$status_toko."' name='awal' style='background:lightgreen; padding:5px;font-size:15px;width:100%;'></center><br>";

        } else {

        echo"<center><input type='submit' value='Status Toko : ".$status_toko." ".$status_detail."' name='awal' style='background:lightgreen; padding:5px; font-size:15px;width:100%;'></center><br>";

        }

    } elseif ($status_toko=="in Trouble") {

        if ($status_detail=="") {

            echo"<center><input type='submit' value='Status Toko : ".$status_toko."' name='awal' style='background:red;color:white; padding:5px; font-size:15px;width:100%;'></center><br>";

        } else {

        echo"<center><input type='submit' value='Status Toko : ".$status_toko." ".$status_detail."' name='awal' style='background:red; color:white; padding:5px; font-size:15px;width:100%;'></center><br>";

        }

    } elseif ($status_toko=="Peninjauan Penghapusan") {

        echo"<center><input type='submit' value='Status Toko : ".$status_toko."' name='awal' style='background:black;color:white; padding:5px; font-size:15px;width:100%;'></center><br>";

        

    } 

}

            echo "<center><img src='../../gambar/toko/".$data['gambar_toko']."' style='width:100%;'></center><br>";



?>

<center>

<table style="border:1px solid;width: 100%">

	<tr>

		<td>Status</td><td>:</td><td><?php echo $toko['status']; ?><td style="border-left: 1px solid;">Produk</td><td>:</td><td><?php echo mysqli_num_rows($query3); ?></td>

	</tr>

	<tr>

		<td>Pemilik</td><td>:</td><td><?php echo $toko['pemilik']; ?></td><td style="border-left: 1px solid;">Stok</td><td>:</td><td><?php echo $item2['total_stok']; ?></td>

	</tr>

	<tr>

		<td>WA</td><td>:</td><td><?php echo $toko['wa']; ?></td><td style="border-left: 1px solid;">Transaksi</td><td>:</td><td><?php echo mysqli_num_rows($query5); ?></td>

	</tr>

	<tr>

		<td>Alamat</td><td>:</td><td><?php echo $toko['alamat']; ?></td><td style="border-left: 1px solid;">Kunjungan</td><td>:</td><td><?php echo $toko['visitors']; ?></td>

	</tr>

	<tr><td>Admin</td><td>:</td><td><?php echo mysqli_num_rows($query2); ?></td><td style="border-left: 1px solid;">cpm</td><td>:</td><td><?php echo "Rp. ".$cpm."-,"; ?></td></tr>

</table>

</center>

<br>

<hr style="border-bottom: 5px solid;">

<br>

<?php

$result = mysqli_query($conn,"SELECT * FROM admin_web WHERE id_toko ='$idtoko' AND username='".$_SESSION['admin_username']."'");



 $row = mysqli_fetch_array($result,MYSQLI_ASSOC);

            $sql = mysqli_query($conn,"SELECT * FROM infotoko WHERE id_toko ='$idtoko'");

          $data = mysqli_fetch_array($sql,MYSQLI_ASSOC);

echo"<center><h1>Halo, ".$row['nama']."</h1><br><p style='font-size:18px;'>Selamat bekerja sebagai admin.<br>";

echo'Silahkan klik menu pilihan yang berada diatas untuk mengelola aplikasi ini.<br><br>';

            echo"<form method='post'><table><tr><td>&raquo; Username</td><td>:</td><td><input type='text' value='".$row['username']."' size='10' name='username'></td><td><input type='submit' name='edit_username' value='Ganti' style='padding:3px;background:orange;font-size:14px;color:white;font-weight:bold;'></td></tr></table></form><br>";



             echo"<form method='post'><table style='border:1px solid;padding:15px;'><tr><td colspan=3>Data Pribadi Anda Adalah : </td></tr></tr><tr><td>&raquo; Password</td><td>:</td><td><input type='text' placeholder='".$row['password']."' size='10' name='pass'></td></tr><tr><td>&raquo; Nama</td><td>:</td><td><input type='text' value='".$row['nama']."' size='10' name='nama'></td></tr><tr><td>&raquo; Telepon</td><td>:</td><td><input type='text' value='".$row['telepon']."' size='10' name='wa'></td></tr><tr><td><br></td></tr><tr style='text-align:center;'><td colspan=3><input type='submit' name='edit' value='Edit Data' style='padding:7px;background:orange;font-size:14px;color:white;font-weight:bold;'></td></tr></table>";

             if (isset($_POST['edit'])) {
                if(!empty($_POST['pass'])) {
                 $edit=mysqli_query($conn,"UPDATE admin_web SET nama='".$_POST['nama']."',telepon='".$_POST['wa']."',password='".$_POST['pass']."' WHERE id_toko='$idtoko'"); } else {
                     $edit=mysqli_query($conn,"UPDATE admin_web SET nama='".$_POST['nama']."',telepon='".$_POST['wa']."' WHERE id_toko='$idtoko'");
                 }

                 echo'<script>window.location="index.php";</script>';

             } elseif(isset($_POST['edit_username'])){

                $edit_usr=mysqli_query($conn,"UPDATE admin_web SET username='".$_POST['username']."' WHERE id_toko='$idtoko'");

                unset($_SESSION['islogin2']);

                echo'<script>window.location="index.php";</script>';

             }

             echo"</form><br><b style='font-size:26px;'>Hormat kami,<br> ".$data['pemilik']."</b></p></center>";

?><script>
  function resizeIframe(obj) {
    obj.style.height = obj.contentWindow.document.documentElement.scrollHeight + 'px';
  }
</script>
<hr style="border-bottom: 5px solid;">
<iframe src="../9_generator_qrcode/index.php" width=100% frameborder="0" scrolling="no" onload="resizeIframe(this)"></iframe>
<hr style="border-bottom: 5px solid;">
</div><div class="cleared"></div>