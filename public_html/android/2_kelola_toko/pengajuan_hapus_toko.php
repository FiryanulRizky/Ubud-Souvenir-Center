<link rel="stylesheet" type="text/css" href="../css/style_admin.css">
<?php
ob_start(); 
include "../1_login_reg/login_reg.php";
ob_end_clean();
?>
<center><H2>Status Resesi & Pengajuan Hapus Toko</H2></center><br>
<?php 
$cek_resesi=mysqli_query($conn,"SELECT * FROM infotoko WHERE id_toko='$idtoko'");
$ambil_data=mysqli_fetch_array($cek_resesi);
$status_resesi=$ambil_data['status'];
$detail_resesi=$ambil_data['info_status'];
if (isset($_POST['resesi'])) {
    ?> <div id="bgkonten"><center><form method="post">
<input type="submit" name="hapus_toko" value="Status : in Trouble" style="background: red;color: white;font-size: 24px;width: 100%;height: 50px;"><?php if (empty($_POST['info_resesi'])) {
 ?><br><br><H3>Latar Belakang Masalah :</H3><?php if (!empty($status_detail)&&$status_toko=="in Trouble") {
     ?> <textarea name="info_resesi" value="<?php echo $status_detail; ?>" rows="8" cols="40"></textarea> <?php 
 } else { ?><textarea name="info_resesi" placeholder="contoh : (masalah internal toko (masalah keuangan), perlu reksadana, perlu inkubator bisnis (diskusi dengan pegiat bisnis digital), tambah fitur a karena.., kurangi fitur b karena..., bug di bagian order, desain sulit dipahami, dll.)" rows="8" cols="40"></textarea><?php } ?><br><br><b>- Wajib sertakan kalimat didalam kurung, misal (masalah b..)<br>- Fitur ini akan menonaktifkan akun toko dari panel penjualan</b><br><br><h3 style="color : red;">1 pesan = menuju ukm digital</h3><input type="submit" value="SET" name="resesi" class="btn_submit" style="background:blue;font-weight:bold;"><br><br><input type="submit" value="BATAL" name="batal_proses" class="btn_submit" style="background:orange;font-weight:bold;color:black;"></form></center></div><div class="cleared"></div><br><br> <?php } else {
    $status="in Trouble";$info=$_POST['info_resesi']; @mysqli_query($conn,"UPDATE infotoko SET status='$status',info_status='$info' WHERE id_toko='$idtoko'");
    echo'<script>top.document.location.href = "iframe_edit.php";</script>';
    }
} elseif (isset($_POST['batal_resesi'])) {
    ?> <div id="bgkonten"><center><form method="post">
<input type="submit" name="aktif" value="Status : Active" style="background: blue;color: white;font-size: 24px;width: 100%;height: 50px;"><?php if (empty($_POST['info_open'])) {
 ?><br><br><H3>Set Jam Buka :</H3><?php if (!empty($status_detail)&&$status_toko=="in Trouble") {
     ?> <input type="text" name="info_open" value="<?php echo $status_detail; ?>" class="teksbok_admin" maxlength="30"> <?php 
 } else { ?><input type="text" name="info_open" value="(Open ... - Closed ...)" class="teksbok_admin" maxlength="30"><?php } ?><br><br><i style="font-size: 16px;">*isikan ... dgn jam buka dan jam tutup toko, exp: (Open 10:00 - Closed 21:00)</i><br><br><input type="submit" value="set" name="batal_resesi" class="btn_submit">&nbsp;<input type="submit" value="Batal" name="batal_proses" class="btn_submit"></form></center></div><div class="cleared"></div><br><br> <?php } else {
    if ($_POST['info_open']!="(Open ... - Closed ...)") {
        $status="Active";$info=$_POST['info_open']; @mysqli_query($conn,"UPDATE infotoko SET status='$status',info_status='$info' WHERE id_toko='$idtoko'");
        echo'<script>top.document.location.href = "iframe_edit.php";</script>';
    } else {
        echo'<script>alert("titik-titik pada kolom set Jam Buka wajib diisi");top.document.location.href = "iframe_edit.php";</script>';
        }
    }
} elseif (isset($_POST['aktif'])) {
    ?> <div id="bgkonten"><center><form method="post">
<input type="submit" name="batal_resesi" value="Status : Closed" style="background: orange;color: white;font-size: 24px;width: 100%;height: 50px;"><?php if (empty($_POST['info_libur'])) {
 ?><br><br><H3>Set Tanggal Buka Kembali</H3><?php if (!empty($status_detail)&&$status_toko=="Closed") {
     ?> <input type="text" name="info_open" value="<?php echo $status_detail; ?>" class="teksbok_admin" maxlength="25"> <?php 
 } else { ?><input type="text" name="info_libur" value="(Ready ... ... ...)" class="teksbok_admin" maxlength="25"><?php } ?><br><br><i style="font-size: 16px;">*isikan ... dgn tgl/bln/tahun, exp: 21 January 2022</i><br><br><input type="submit" value="set" name="aktif" class="btn_submit">&nbsp;<input type="submit" value="Batal" name="batal_proses" class="btn_submit"></form></center></div><div class="cleared"></div><br><br> <?php } else {
    if ($_POST['info_libur']!="(Ready ... ... ...)") {
        $status="Closed";$info=$_POST['info_libur']; @mysqli_query($conn,"UPDATE infotoko SET status='$status',info_status='$info' WHERE id_toko='$idtoko'");
        echo'<script>top.document.location.href = "iframe_edit.php";</script>';
    } else {
        echo'<script>alert("titik-titik pada kolom set tanggal wajib diisi");top.document.location.href = "iframe_edit.php";</script>';
        }
    }
} elseif (isset($_POST['batal_proses'])) {
    echo '<script>alert("Proses Dibatalkan");top.document.location.href = "iframe_edit.php";</script>';
} elseif (isset($_POST['hapus_toko'])) {
    ?> <div id="bgkonten"><center><form method="post">
<input type="submit" name="resesi" value="Status : Peninjauan Penghapusan" style="background: black;color: white;font-size: 24px;width: 100%;height: 50px;"><?php if (empty($_POST['info_hapus'])) {
 ?><br><br><H3>Saran untuk developer :</H3><?php if (!empty($status_detail)&&$status_toko=="Peninjauan Penghapusan") {
     ?> <input type="text" name="info_hapus" value="<?php echo $status_detail; ?>" class="teksbok_admin"> <?php 
 } else { ?><textarea name="info_hapus" placeholder="contoh (rapikan desain, tambah fitur a agar fleksibel, kurangi fitur b karena jarang dipakai, dll.)" rows="6" cols="40"></textarea><?php } ?><br><br><b>- Wajib sertakan kalimat didalam kurung, misal (masalah b..)<br>- Akun akan dinonaktifkan dari panel penjualan<br>- Proses penghapusan akan diproses 1x24 jam</b><br><br><input type="submit" value="SET" name="hapus_toko" class="btn_submit" style="background:blue;font-weight:bold;"><br><br><input type="submit" value="BATAL" name="batal_proses" class="btn_submit" style="background:orange;font-weight:bold;color:black;"></form></center></div><div class="cleared"></div><br><br> <?php } else {
    $status="Peninjauan Penghapusan";$info=$_POST['info_hapus']; @mysqli_query($conn,"UPDATE infotoko SET status='$status',info_status='$info' WHERE id_toko='$idtoko'");
    echo'<script>top.document.location.href = "iframe_edit.php";</script>';
    }
}  
?><form method="post" enctype="multipart/form-data">
<center>
<table>
<?php
if ($status_resesi=="in Trouble") {  
	echo'<tr><td><H3 style="color:red;">Toko Anda dalam status Resesi dengan alasan : '.$detail_resesi.'</H3></td><td>&nbsp;</td><td><input type="submit" name="batal_resesi" value="Batalkan Resesi" class="btn_submit"></td></tr>';
} elseif ($status_resesi=="Peninjauan Penghapusan") {
    echo'<tr><td><H3>Akun Toko Anda dalam Peninjauan Penghapusan dengan alasan : '.$detail_resesi.'</H3></td><td>&nbsp;</td><td><input type="submit" name="batal_resesi" value="Batalkan Penghapusan" class="btn_submit"></td></tr>';
} else { if ($status_resesi!="in Trouble" || $status_resesi!="Peninjauan Penghapusan") { ?><tr><td colspan="3" style="text-align: center;"><?php echo "Status Toko Saat ini : <H3>".$status_resesi." ".$detail_resesi."</H3>"; ?></td></tr><tr><td><input type="submit" class="btn_submit" style="width:100%;background:red;" name="resesi" value="Ajukan Resesi"></td><td>&nbsp;&nbsp;&nbsp;&nbsp;</td><td><input type="submit" style="width:100%;background:black;" class="btn_submit" name="hapus_toko" value="Ajukan Hapus Akun Toko"></td>
</tr><?php } }?>
</table></center>
</form>