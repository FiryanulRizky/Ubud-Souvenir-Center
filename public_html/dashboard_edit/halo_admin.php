<link rel="stylesheet" type="text/css" href="../css/style_admin.css">
<?php 
ob_start();
include"../header_session/login_inner.php";
ob_end_clean();

$result = mysqli_query($conn,"SELECT * FROM admin_web WHERE id_toko ='$idtoko' AND username='".$_SESSION['admin_username']."'");

 while ($row = mysqli_fetch_array($result,MYSQLI_ASSOC))
        {
          $sql = mysqli_query($conn,"SELECT * FROM infotoko WHERE id_toko ='$idtoko'");
          $data = mysqli_fetch_array($sql,MYSQLI_ASSOC);
            echo'<p><center><h3>Selamat Datang di <a href="konfirmasi_pemilik.php?idtoko='.$data['id_toko'].'"> '.$data['nama_toko'].'</a></h3></center></p><br>';
            $qr_cek=mysqli_query($conn,"SELECT qrImg FROM qrcodes WHERE id_toko='$idtoko' AND status='toko' ORDER BY id DESC LIMIT 1");
            if(mysqli_num_rows($qr_cek)>0){
            $qr_ambil=mysqli_fetch_array($qr_cek,MYSQLI_ASSOC);
            echo "<center><img src='../generator_qrcode/userQr/".$qr_ambil['qrImg']."' width='100' height='100'></center><br>";}
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
elseif (isset($_POST['awal'])&&$status_toko!="in Trouble" || isset($_POST['libur'])) {
    ?> <div id="bgkonten"><center><form method="post">
<input type="submit" name="aktif" value="Status : Active" style="background: blue;color: white;font-size: 24px;width: 100%;height: 50px;"><?php if (empty($_POST['info_open'])) {
 ?><br><br><H3>Set Jam Buka :</H3><br><?php if (!empty($status_detail)&&$status_toko=="Active") {
     ?> <input type="text" name="info_open" value="<?php echo $status_detail; ?>" class="teksbok_admin" maxlength="30"> <?php 
 } else { ?><input type="text" name="info_open" value="(Open ... - Closed ...)" class="teksbok_admin" maxlength="30"><?php } ?><br><br><i style="font-size: 16px;">*isikan ... dgn jam buka dan jam tutup toko, exp: (Open 10:00 - Closed 21:00)</i><br><br><input type="submit" value="SET" name="awal" class="btn_submit" style="font-size: 21px;">&nbsp;&nbsp;<input type="submit" value="Tutup" name="batal" class="btn_submit" style="font-size: 21px;"></form></center></div><div class="cleared"></div><br><br> <?php } else {
    if($_POST['info_open']!="(Open ... - Closed ...)") {
    $status="Active";$info=$_POST['info_open']; @mysqli_query($conn,"UPDATE infotoko SET status='$status',info_status='$info' WHERE id_toko='$idtoko'");
        echo'<script>top.document.location.href = "../admin/index.php";</script>';}
        else {
           echo'<script>alert("Isikan titik-titik pada Jam Buka dan Jam Tutup");top.document.location.href = "../admin/index.php";</script>'; 
        }
    }
} elseif (isset($_POST['awal'])&&$status_toko!="Peninjauan Penghapusan") {
    ?> <div id="bgkonten"><center><form method="post">
<input type="submit" name="aktif" value="Status : Active" style="background: blue;color: white;font-size: 24px;width: 100%;height: 50px;"><?php if (empty($_POST['info_open'])) {
 ?><br><br><H3>Set Jam Buka :</H3><br><?php if (!empty($status_detail)&&$status_toko=="Active") {
     ?> <input type="text" name="info_open" value="<?php echo $status_detail; ?>" class="teksbok_admin" maxlength="30"> <?php 
 } else { ?><input type="text" name="info_open" value="(Open ... - Closed ...)" class="teksbok_admin" maxlength="30"><?php } ?><br><br><i style="font-size: 16px;">*isikan ... dgn jam buka dan jam tutup toko, exp: (Open 10:00 - Closed 21:00)</i><br><br><input type="submit" value="SET" name="awal" class="btn_submit" style="font-size: 21px;">&nbsp;&nbsp;<input type="submit" value="Tutup" name="batal" class="btn_submit" style="font-size: 21px;"></form></center></div><div class="cleared"></div><br><br> <?php } else {
    if($_POST['info_open']!="(Open ... - Closed ...)") {
    $status="Active";$info=$_POST['info_open']; @mysqli_query($conn,"UPDATE infotoko SET status='$status',info_status='$info' WHERE id_toko='$idtoko'");
        echo'<script>top.document.location.href = "../admin/index.php";</script>';}
        else {
            echo'<script>alert("Isikan titik-titik pada Jam Buka dan Jam Tutup");top.document.location.href = "../admin/index.php";</script>';  
        }
    }
} if (isset($_POST['awal'])&&$status_toko=="in Trouble") {
    echo'<script>alert("Maaf Anda tidak bisa mengubah status ini atas izin Pemilik Toko");top.document.location.href = "../admin/index.php";</script>'; 

} if (isset($_POST['awal'])&&$status_toko=="Peninjauan Penghapusan") {
    echo'<script>alert("Maaf Anda tidak bisa mengubah status ini atas izin Pemilik Toko");top.document.location.href = "../admin/index.php";</script>'; 

} elseif (isset($_POST['aktif'])) {
    ?> <div id="bgkonten"><center><form method="post">
<input type="submit" name="libur" value="Status : Closed" style="background: orange;color: white;padding: 10px;font-size: 24px;width: 100%;height: 50px;"><?php if (empty($_POST['info_libur'])) {
 ?><br><br><H3>Set Tanggal Buka Kembali</H3><br><?php if (!empty($status_detail)&&$status_toko=="Closed") {
     ?><input type="text" name="info_libur" class="teksbok_admin" value="<?php echo $status_detail; ?>" maxlength="25"><?php
 } else { ?><input type="text" name="info_libur" class="teksbok_admin" value="(Ready ... ... ...)" maxlength="25"><?php } ?><br><br><i style="font-size: 16px;">*isikan ... dgn tgl/bln/tahun, exp: 21 January 2022</i><br><br><input type="submit" value="SET" name="aktif" class="btn_submit" style="font-size: 21px;">&nbsp;&nbsp;<input type="submit" value="Tutup" name="batal" class="btn_submit" style="font-size: 21px;"></form></center></div><div class="cleared"></div><br><br> <?php } else {
    if($_POST['info_open']!="(Ready ... ... ...)") {
    $status="Closed";$info=$_POST['info_libur']; @mysqli_query($conn,"UPDATE infotoko SET status='$status',info_status='$info' WHERE id_toko='$idtoko'");
        echo'<script>top.document.location.href = "../admin/index.php";</script>';}
        else {
            echo'<script>alert("Isikan titik-titik pada Set Tanggal");top.document.location.href = "../admin/index.php";</script>';
        }
    }
} elseif (isset($_POST['batal'])) {
    echo'<script>top.document.location.href = "../admin/index.php";</script>';
} else {
    if ($status_toko=="Closed") {
        if ($status_detail=="") {
            echo"<center><input type='submit' maxlength='25' value='Status Toko : ".$status_toko."' name='awal' style='background:orange; padding:5px; font-size:21px; color:white;'></center><br>";
        } else {
        echo"<center><input type='submit' maxlength='25' value='Status Toko : ".$status_toko." ".$status_detail."' name='awal' style='background:orange; padding:5px; font-size:21px; color:white;'></center><br>";
        }
    } elseif ($status_toko=="Active") {
        if ($status_detail=="") {
            echo"<center><input type='submit' value='Status Toko : ".$status_toko."' name='awal' maxlength='30' style='background:lightgreen; padding:5px; font-size:21px;'></center><br>";
        } else {
        echo"<center><input type='submit' maxlength='30' value='Status Toko : ".$status_toko." ".$status_detail."' name='awal' style='background:lightgreen; padding:5px; font-size:21px;'></center><br>";
        }
    } elseif ($status_toko=="in Trouble") {
        if ($status_detail=="") {
            echo"<center><input type='submit' value='Status Toko : ".$status_toko."' name='awal' style='background:red;color:white; padding:5px; font-size:21px;'></center><br>";
        } else {
        echo"<center><input type='submit' value='Status Toko : ".$status_toko." ".$status_detail."' name='awal' style='background:red; color:white; padding:5px; font-size:21px;'></center><br>";
        }
    } elseif ($status_toko=="Peninjauan Penghapusan") {
        echo"<center><input type='submit' value='Status Toko : ".$status_toko."' name='awal' style='background:black;color:white; padding:5px; font-size:21px;'></center><br>";
        
    } 
}
            echo "<center><img src='../gambar/toko/".$data['gambar_toko']."' width='500' height='250'></center><br>";

echo"<p>Halo <h3>".$row['nama']."</h3> Selamat bekerja sebagai admin.</p>";
echo'<p>Silahkan klik menu pilihan yang berada diatas untuk mengelola konten website ini.</p>';

             echo'<p>Data Pribadi Anda Adalah : </p><br>';
             echo"<p>&raquo; Nama : ".$row['nama']."</p>";
             echo"<p>&raquo; Telepon : ".$row['telepon']."</p>";
             echo"<p>&raquo; Jabatan : ".$row['jabatan']."</p><br>Hormat kami, <H3>".$data['pemilik']."</H3><br>";

} ?>