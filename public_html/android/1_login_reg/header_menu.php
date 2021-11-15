<?php 
ob_start();
include"login_reg.php";
ob_end_clean();
?>
<link rel="stylesheet" type="text/css" href="../css/style.css">
<link rel="stylesheet" type="text/css" href="../css/style_admin.css">
<div id="android_header">
	<div class="body_android">
<?php 
	
	echo "<center><h3 style='color:#1565c0;'>Hai, $namadmin3";

?>
		<center><?php echo "Wellcome to ".$namatoko3;?></h3><br>
		<img src="../../gambar/toko/<?php echo $namatoko2['gambar_toko'];?>" width="200" height="95">
		</center>
	</div>	
</div>