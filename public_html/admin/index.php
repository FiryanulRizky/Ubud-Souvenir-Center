<?php include"../header_session/header_inner.php"; ?>
<!DOCTYPE html>
<html>
    <head>
        <title><?php $toko=mysqli_query($conn,"SELECT * FROM infotoko WHERE id_toko='$idtoko'"); $ambil_data_toko=mysqli_fetch_array($toko); $nama_toko=$ambil_data_toko['nama_toko']; echo $nama_toko." Dashboard"; ?></title>
        <link rel="shortcut icon" type="image/x-icon" href="../gambar/images/head_logo.ico" />
    </head>
<body>
<?php 
$sql = mysqli_query($conn,"SELECT * FROM infotoko WHERE id_toko ='$idtoko'");
if (mysqli_num_rows($sql)>0) {
          $data = mysqli_fetch_array($sql,MYSQLI_ASSOC);
echo '<div id="bgkonten">
<div class="row">
    <div class="col-sm-6">
      <div class="panel-group">
        <div class="panel panel-default">
          <div class="panel-heading"></div>
          <div class="panel-body"><iframe src="../dashboard_edit/halo_admin.php" width="100%" height="750"></iframe></div>
        </div>
      </div>
    </div>

    <div class="col-sm-6">
      <div class="panel-group">
        <div class="panel panel-default">
          <div class="panel-heading"></div>
          <div class="panel-body"><iframe src="../dashboard_edit/admin_order.php" width="100%" height="700"></iframe></div>
        </div>
      </div>
    </div>';
    include"../header_session/footer.php"; 
?>
</div>
</table>
<?php } else {
  unset($_SESSION['islogin']);
}?>
</body>
</html>