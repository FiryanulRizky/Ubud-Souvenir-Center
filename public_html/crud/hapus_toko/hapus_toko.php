<html>
    <head>
        <title>Hapus Toko</title>
        <link rel="shortcut icon" type="image/x-icon" href="../../gambar/images/head_logo.ico" />
    </head>
<body>
<?php session_start(); include "../../db/koneksi.php";?>
<link rel="stylesheet" type="text/css" href="../../css/style_admin.css">
<link rel="stylesheet" type="text/css" href="../../css/bootstrap2.min.css">
<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
<div id="bgkonten">
<div class="container">
<form method="post"><input type="submit" name="kembali" value="KEMBALI" class="btn_submit"></form>
<?php
if(isset($_POST['kembali'])) {
    unset($_SESSION['tagar']);
    header("location:../../Super_Admin/halaman_tinjau_akun.php");
  }
$rs=mysqli_query($conn,"SELECT * FROM infotoko WHERE id_toko='".$_GET['id']."'"); $ambil_data=mysqli_fetch_array($rs); $namatoko=$ambil_data['nama_toko']; $no=0;$a=0;$b=0;$c=0;$d=0; if(mysqli_num_rows($rs)>0) {?>
  <center><h2>Proses Penghapusan Akun <?php echo $namatoko." (KDTK".$_GET['id'].")"; ?><hr style="width: 720px;border: 1px solid;"></h2><i style="font-size: 16px;">Ketentuan & Petunjuk Penghapusan Akun</i><br><table style="font-style: italic; font-size: 14px;"><?php if($_SESSION['TAGAR']) { echo'<tr><td>* </td><td>Akun '.$namatoko.' memiliki '.$_SESSION['tagar'].' Basis Data/td>'; } ?><tr><td>* </td><td>Selalu hapus dari tabel Pojok kiri atas</td></tr></tr><tr><td>* </td><td>Klik button "Hapus Semua Data.."</td></tr><tr><td>* </td><td>Pesan "Akun berhasil dihapus" = proses berhasil</td></tr></table></center><br>
    <?php $pola3=mysqli_query($conn,"SELECT * FROM itemc3 WHERE id_toko='".$_GET['id']."'"); if (mysqli_num_rows($pola3)>0) {
       ?>
    <div class="row">
    <div class="col-sm-6">
      <div class="panel-group">
        <div class="panel panel-default">
          <div class="panel-heading"><H3><?php echo '#'.($i=$no=$no+1).' Hapus Pola 3 Item '.$namatoko.' (KDTK'.$_GET['id'].')'; ?></H3></div>
          <div class="panel-body"><iframe src="<?php echo'data_pola3.php?id='.$_GET['id'].'';?>" width="100%" height="600"></iframe></div>
        </div>
      </div>
    </div>
    <div class="row">
        <div class="col-sm-6">
        <?php } else { echo'<div class="row"><div class="col-xs-12">'; } $pola2=mysqli_query($conn,"SELECT * FROM itemc2 WHERE id_toko='".$_GET['id']."'"); if (mysqli_num_rows($pola2)>0) {?>
      <div class="panel-group">
        <div class="panel panel-default">
          <div class="panel-heading"><H3><?php if ($no==0) {
            echo "#".($i=$a=$no+1)." Hapus Pola 2 Item ".$namatoko." (KDTK".$_GET['id'].")";
          } else { echo "#".($i=$a=$no+1)." Hapus Pola 2 Item ".$namatoko." (KDTK".$_GET['id'].")"; } ?></H3></div>
          <div class="panel-body"><iframe src="<?php echo'data_pola2.php?id='.$_GET['id'].'';?>" width="100%" height="600"></iframe></div>
        </div>
      </div>
    </div>
  </div><?php } $qr=mysqli_query($conn,"SELECT * FROM qrcodes WHERE id_toko='".$_GET['id']."'"); if (mysqli_num_rows($qr)>0) { ?>
<div class="row">
    <div class="col-xs-12">
      <div class="panel-group">
        <div class="panel panel-default">
          <div class="panel-heading">
            <H3><?php if ($no==0) {
              echo"#".($i=$b=$no+1+$a)." Hapus Data QR ".$namatoko." (KDTK".$_GET['id'].")";
            } else {echo"#".($i=$b=$no+$a)." Hapus Data QR ".$namatoko." (KDTK".$_GET['id'].")";} ?></H3>
          </div>
          <div class="panel-body"><iframe src="<?php echo'data_qr.php?id='.$_GET['id'].'';?>" width="100%" height="685"></iframe></div>
        </div>
      </div>
    </div>
  </div><?php } $pola1=mysqli_query($conn,"SELECT * FROM itemc1 WHERE id_toko='".$_GET['id']."'"); if (mysqli_num_rows($pola1)>0) {
       ?>
    <div class="row">
    <div class="col-sm-6">
      <div class="panel-group">
        <div class="panel panel-default">
          <div class="panel-heading"><H3><?php if($b==0) { echo "#".($i=$c=$a+1)." Hapus Pola 1 Item ".$namatoko." (KDTK".$_GET['id'].")"; } elseif ($no==0) {
            echo "#".($i=$c=$no+1+$b)." Hapus Pola 1 Item ".$namatoko." (KDTK".$_GET['id'].")";
          } else { echo "#".($i=$c=$no+$b)." Hapus Pola 1 Item ".$namatoko." (KDTK".$_GET['id'].")"; } ?></H3></div>
          <div class="panel-body"><iframe src="<?php echo'data_pola1.php?id='.$_GET['id'].'';?>" width="100%" height="600"></iframe></div>
        </div>
      </div>
    </div>
    <div class="row">
        <div class="col-sm-6">
        <?php } else { echo'<div class="row"><div class="col-xs-12">'; } $transaksi=mysqli_query($conn,"SELECT * FROM transaksi WHERE id_toko='".$_GET['id']."'"); if (mysqli_num_rows($transaksi)>0) { ?>
      <div class="panel-group">
        <div class="panel panel-default">
          <div class="panel-heading"><H3><?php if ($b==0 || $b==1 || $b==2) {
            echo "#".($i=$d=$no+1+$c)." Hapus Data Transaksi ".$namatoko." (KDTK".$_GET['id'].")";
          } else {echo "#".($i=$d=$no+$c)." Hapus Data Transaksi ".$namatoko." (KDTK".$_GET['id'].")";} ?></H3></div>
          <div class="panel-body"><iframe src="<?php echo'data_transaksi.php?id='.$_GET['id'].'';?>" width="100%" height="600"></iframe></div>
        </div>
      </div>
    </div>
  </div><?php } else {
    $item=mysqli_query($conn,"SELECT * FROM item WHERE id_toko='".$_GET['id']."'"); if (mysqli_num_rows($item)>0) {
       ?>
    <div class="row">
    <div class="col-sm-6">
      <div class="panel-group">
        <div class="panel panel-default">
          <div class="panel-heading"><H3><?php echo '#'.($i=$c=$no+$b).' Hapus Data Item '.$namatoko.' (KDTK'.$_GET['id'].')'; ?></H3></div>
          <div class="panel-body"><iframe src="<?php echo'data_item.php?id='.$_GET['id'].'';?>" width="100%" height="600"></iframe></div>
        </div>
      </div>
    </div>
    <div class="row">
        <div class="col-sm-6">
        <?php } else { echo'<div class="row"><div class="col-xs-12">'; } ?>
        <div class="panel-group">
        <div class="panel panel-default">
          <div class="panel-heading"><H3><?php echo "#".($i=$d=$no+$c)." Hapus Akun Toko ".$namatoko." (KDTK".$_GET['id'].")"; ?></H3></div>
          <div class="panel-body"><iframe src="<?php echo'data_toko.php?id='.$_GET['id'].'';?>" width="100%" height="600"></iframe></div>
        </div>
      </div>
    </div>
  </div><?php if(isset($_POST['kembali'])) {
    unset($_SESSION['tagar']);
    header("location:../../Super_Admin/halaman_tinjau_akun.php");
  } } } else { 
    echo'<script>alert("Akun Berhasil dihapus");window.location="../../Super_Admin/halaman_tinjau_akun.php";</script>';
  } $_SESSION['tagar']=$i; ?>
<div class="cleared"></div>