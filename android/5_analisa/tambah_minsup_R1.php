<?php
ob_start();
include"../1_login_reg/login_reg.php";
ob_end_clean();
echo'<script>alert("Tambah Minimal 3 Rule");</script>';
?>
<div id="bgkonten">
<center><h2 class="art-postheader">Tambah Rule</h2></center>
<div class="view_data">
    <form method="post">
  <table border="1" style="border-color:#399;">
			<tr>
				<td><input type="hidden" name="id_toko" value="<?php echo $idtoko; ?>" readonly><input type="text" name="kdrule" value="R1" readonly><input type="hidden" name="itemset" value="01" readonly></td>
				<td><input type="text" name="support" placeholder="wajib diisi" maxlength="2"></td>
				<td><input type="submit" name="submit" value="SET RULE"><input type="hidden" name="act" value="rule"></td>
			</tr>
			</table>
			</form>
			<br><hr><br><?php
			    if (!preg_match("/^[1-9][0-9]*$/",$_POST['support'])) {
			        echo'<script>alert("Input harus berupa angka");</script>';
			    } else {
				$toko=$_POST['id_toko'];
				$rule=$_POST['kdrule'];
				$itemset=$_POST['itemset'];
				$support=$_POST['support'];
				$cek_minsupR1=mysqli_query($conn,"SELECT * FROM rule WHERE id_toko='$idtoko' AND kdrule='$rule'");
				$ambil_R1=mysqli_fetch_array($cek_minsupR1);
				$R1=$ambil_R1['kdrule'];
				if($R1>0) {
				    echo'<script>alert("Minimum Support R1 sudah ada");window.location="set_minimum_support.php";</script>';
				} else {
				    $input_minsupR1=mysqli_query($conn,"INSERT INTO rule (kdrule,id_toko,itemset,minsupport) VALUES ('$rule','$toko','$itemset','$support')"); 
				}
				$cek=mysqli_query($conn,"SELECT * FROM rule WHERE id_toko='$idtoko'");
				if(mysqli_num_rows($cek)<3) {
				$message="SET BERHASIL, SILAHKAN TAMBAH RULE LAGI";
				echo "<script type='text/javascript'>alert('$message');window.location='tambah_minsup_R2.php';</script>";
				}
			    }
			?><div>