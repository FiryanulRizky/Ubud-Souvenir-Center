<link rel="stylesheet" type="text/css" href="../css/style_admin.css">
<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
<script>
  function resizeIframe(obj) {
    obj.style.height = obj.contentWindow.document.documentElement.scrollHeight + 'px';
  }
</script>
<div class="bgkonten">
<br><center><form method="post"><input type="submit" name="kembali" value="KEMBALI" class="btn_submit"></form></center><hr style="border-bottom: 5px solid;">
<?php if (isset($_POST['kembali'])) {
	echo '<script>top.document.location.href = "../admin/index.php";</script>';
} ?>
<iframe src="info_toko.php" width=100% frameborder="0" scrolling="no" onload="resizeIframe(this)"></iframe>
<hr style="border-bottom: 5px solid;">
<iframe src="../crud/update_toko.php" width=100% frameborder="0" scrolling="yes" onload="resizeIframe(this)"></iframe>
<hr style="border-bottom: 5px solid;">
<iframe src="../crud/ambil_data_update_admin.php" width=100% frameborder="0" scrolling="no" onload="resizeIframe(this)"></iframe>
<hr style="border-bottom: 5px solid;">
<iframe src="../crud/pengajuan_hapus_toko.php" width=100% frameborder="0" scrolling="no" onload="resizeIframe(this)"></iframe>
</div><div class="cleared"></div>
</div>