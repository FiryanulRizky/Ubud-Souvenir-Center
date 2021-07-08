<?php 
ob_start();
include"../1_login_reg/login_reg.php";
ob_end_clean();?>
<div id="bgkonten">
<div class="konten_tabel">
<center><h2 class="art-postheader">Tambah Rule</h2></center>
</div>
<div class="view_data">
  <table border="1" style="border-color:#399;">
  	<?php $cek=mysqli_query($conn,"SELECT * FROM rule WHERE id_toko='$idtoko'");
  	while($ambil=mysqli_fetch_array($cek,MYSQLI_ASSOC)) { ?>
<form method="post">	
			<tr>
				<td><input type="hidden" name="id_toko" value="<?php echo $idtoko; ?>" disabled="true"><input type="text" name="kdrule" value="<?php echo $ambil['kdrule']; ?>" disabled="true"><input type="hidden" name="itemset" value="<?php echo $ambil['itemset']; ?>" disabled="true"></td>
				<td><input type="text" name="support" value="<?php echo $ambil['minsupport'];?>" disabled="true"></td>
				<td><input type="text" name="submit" value="BERHASIL" disabled="true"></td>
			</tr>
			<?php } ?>
			<tr>
				<td><input type="hidden" name="id_toko" value="<?php echo $idtoko; ?>" readonly><input type="text" name="kdrule" value="R2" readonly><input type="hidden" name="itemset" value="03" readonly></td>
				<td><input type="text" name="support" placeholder="wajib diisi" maxlength="2"></td>
				<td><input type="submit" name="submit" value="SET RULE"><input type="hidden" name="act" value="rule"></td>
			</tr>
			</table>
			</form>
			<br><hr><br>
			<?php
			if ($_POST['act']=="rule") {
			    if (!preg_match("/^[1-9][0-9]*$/",$_POST['support'])) {
			        echo'<script>alert("Input harus berupa angka");</script>';
			    } else {
				$toko=$_POST['id_toko'];
				$rule=$_POST['kdrule'];
				$itemset=$_POST['itemset'];
				$support=$_POST['support'];
				$cek_minsupR2=mysqli_query($conn,"SELECT * FROM rule WHERE id_toko='$idtoko' AND kdrule='$rule'");
				$ambil_R2=mysqli_fetch_array($cek_minsupR2);
				$R2=$ambil_R2['kdrule'];
				if($R2>0) {
				    echo'<script>alert("Minimum Support R2 sudah ada");window.location="set_minimum_support.php";</script>';
				} else {
				    $input_minsupR2=mysqli_query($conn,"INSERT INTO rule (kdrule,id_toko,itemset,minsupport) VALUES ('$rule','$toko','$itemset','$support')"); 
				}
				$cek=mysqli_query($conn,"SELECT * FROM rule WHERE id_toko='$idtoko'");
				$message="SET BERHASIL, SILAHKAN TAMBAH RULE LAGI";
				echo "<script type='text/javascript'>alert('$message');window.location='tambah_minsup_R3.php'</script>";
			    }
			}
			?>
			</div>