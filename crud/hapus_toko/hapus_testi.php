<?php 
include"../../db/koneksi.php"; 
 $hapus_testi=mysqli_query($conn,"DELETE FROM riwayat_testi WHERE id='".$_GET['idtk']."'");
 if($hapus_testi) {
 echo'<script>alert("Data berhasil dihapus");window.location = "../../Super_Admin/pesan_sp.php";</script>'; } else {
     echo'<script>alert("Data gagal dihapus");window.location = "../../Super_Admin/pesan_sp.php";</script>';
 }
 ?>