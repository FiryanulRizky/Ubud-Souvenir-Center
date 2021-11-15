<html>
    <head>
        <title><?php ob_start();include"../header_session/login_inner.php";ob_end_clean(); $toko=mysqli_query($conn,"SELECT * FROM infotoko WHERE id_toko='$idtoko'"); $ambil_data_toko=mysqli_fetch_array($toko); $nama_toko=$ambil_data_toko['nama_toko']; echo $nama_toko." Minsup R1"; ?></title>
        <link rel="shortcut icon" type="image/x-icon" href="../gambar/images/head_logo.ico" />
    </head>
<body>
<?php 
include"../header_session/header_inner.php"; 

?>
<div id="bgkonten">
<div class="konten_tabel">
<h2 class="art-postheader">Tambah Rule</h2>
</div>
<div class="view_data">
  <table width="700" border="1" align="left" cellpadding="0" cellspacing="2" style="border:thin; border-color:#399; padding-left:3px; margin-top:5px;">
<form method="post">	
			<tr>
				<td><input type="text" name="id_toko" value="<?php echo $idtoko; ?>" readonly></td>
				<td><input type="text" name="kdrule" value="R1" readonly></td>
				<td><input type="text" name="itemset" value="01" readonly></td>
				<td><input type="text" name="support" placeholder="wajib diisi" maxlength="2"></td>
				<td><input type="submit" name="submit" value="SET RULE"><input type="hidden" name="act" value="rule"></td>
			</tr>
			</form>
			<?php
			if (!preg_match("/^[1-9][0-9]*$/",$_POST['support'])) {
			        echo'<script>alert("Input harus berupa angka");</script>';
			    } else {
			if ($_POST['act']=="rule") {
				$toko=$_POST['id_toko'];
				$rule=$_POST['kdrule'];
				$itemset=$_POST['itemset'];
				$support=$_POST['support'];
				$cek_minsupR1=mysqli_query($conn,"SELECT * FROM rule WHERE id_toko='$idtoko' AND kdrule='$rule'");
				$ambil_R1=mysqli_fetch_array($cek_minsupR1);
				$R1=$ambil_R1['kdrule'];
				if($R1>0) {
				    echo'<script>alert("Minimum Support R1 sudah ada");window.location="../PROSES_ALGORITMA_APRIORI/LANGKAH_1_SET_MINIMUM_SUPPORT.php";</script>';
				} else {
				    $input_minsupR1=mysqli_query($conn,"INSERT INTO rule (kdrule,id_toko,itemset,minsupport) VALUES ('$rule','$toko','$itemset','$support')"); 
				}
				$cek=mysqli_query($conn,"SELECT * FROM rule WHERE id_toko='$idtoko'");
				if(mysqli_num_rows($cek)<3) {
				$message="SET BERHASIL, SILAHKAN TAMBAH RULE LAGI";
				echo "<script type='text/javascript'>alert('$message');window.location='tambah_minsup_R2.php';</script>";
				}
			}
			}
			?>
			</div></body></html>