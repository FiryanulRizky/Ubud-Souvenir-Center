<html>
    <head>
        <title><?php ob_start();include"../header_session/login_inner.php";ob_end_clean(); $toko=mysqli_query($conn,"SELECT * FROM infotoko WHERE id_toko='$idtoko'"); $ambil_data_toko=mysqli_fetch_array($toko); $nama_toko=$ambil_data_toko['nama_toko']; echo $nama_toko." Transaksi"; ?></title>
        <link rel="shortcut icon" type="image/x-icon" href="../gambar/images/head_logo.ico" />
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" />
    </head>
<body>
<?php
include "../header_session/header_inner.php";
?>
<div id='bgkonten'>
<div class="konten_tabel">
<center><h2 class="art-postheader">Data Transaksi</h2>
<form method="post"><input type='submit' value='TAMBAH' class='btn_submit' name='proses_tambah'></form>
<?php 
if(isset($_POST['proses_tambah'])) {
    $cek_item=mysqli_query($conn,"SELECT * FROM item WHERE id_toko='$idtoko'");
    if(mysqli_num_rows($cek_item)>0){
    echo'<script>window.location="../crud/tambah_transaksi.php"</script>';} else {
        echo'<script>
        var yakin = confirm("Produk masih kosong, Proses Produk/Item Sekarang ?");

        if (yakin) {
        	window.location = "../crud/tambah_item.php";
        } else {
            window.location = "'.$_SERVER['PHP_SELF'].'";
        }
    </script>';
    }
}

$cek=mysqli_query($conn,"SELECT * FROM transaksi WHERE id_toko='$idtoko'");
if (mysqli_num_rows($cek)>0) {
?>
<div class="view_data">
  <table border="1" style="border-color:#399; width:100%;">
<tr style="background-color: lightgrey; text-align: center;">
      <td>No.</td>
      <td>KD Transaksi</td>
      <td>Produk Terjual</td>
      <td>Tanggal</td>
      <td>Jam Order</td>
      <td colspan="2" align="center">Aksi</td>
    </tr>
    <br>
  <div class="card mt-5">
   <div class="card-body mx-auto">
    <form method="POST" class="form-inline mt-3">
     <label for="date1">Tanggal</label>
     <input type="date" name="date1" id="date1" class="form-control mr-2">
     <label for="date2">sampai </label>
     <input type="date" name="date2" id="date2" class="form-control mr-2">
     <button type="submit" name="submit2" id="submit2" class="btn btn-primary">Cari</button>
    </form>
  <?php
  if (isset($_POST['submit2'])) {
 $date1 = $_POST['date1'];
 $date2 = $_POST['date2'];
    if (!empty($date1) && !empty($date2)) {
  // perintah tampil data berdasarkan range tanggal
  $result = mysqli_query($conn,"SELECT * FROM transaksi WHERE id_toko='$idtoko' AND tgltransaksi BETWEEN '$date1' AND '$date2' GROUP BY kdtransaksi");

  echo"<br><br>Data ditampilkan dari rentang tanggal "; echo date('d-M-Y', strtotime($date1)); echo " sampai "; echo date('d-M-Y', strtotime($date2)); echo "<br><br><a href='data_transaksi.php?clear=y'><button style='color:white;background:red;padding:5px;'>Hapus Filter</button></a><br><br>";
 } else {
  // perintah tampil semua data
  $result = mysqli_query($conn,"SELECT * FROM transaksi WHERE id_toko='$idtoko' GROUP BY kdtransaksi ORDER BY id_transaksi DESC"); 
 }
} else {
 // perintah tampil semua data
 $result = mysqli_query($conn,"SELECT * FROM transaksi WHERE id_toko='$idtoko' GROUP BY kdtransaksi ORDER BY id_transaksi DESC");
}
    while($row = $result->fetch_assoc())
    {
    ?>
    <tr>
      <td><?php echo ++$no;?></td>
      <td><?php echo "KDTR(".$row['kdtransaksi'].")";?></td>
      <td><?php
      $kdtransaksi=$row['kdtransaksi'];
            $result2=mysqli_query($conn,"SELECT * FROM transaksi,item WHERE item.kditem=transaksi.kditem AND transaksi.id_toko=item.id_toko AND transaksi.id_toko='$idtoko' AND transaksi.kdtransaksi='$kdtransaksi' ORDER BY item.id_item ASC");
        while($rowItem = $result2->fetch_assoc())
        {
          echo $rowItem['merk'] ." , ";
        }
        
      ?></td>
      <td><?=date('d-M-Y', strtotime($row['tgltransaksi']))?></td>
      <td><?=date('H:i:s', strtotime($row['jam_order']))?></td>
      <td align="center"><?php echo'<a href=\'../crud/ambil_data_update_transaksi.php?idtoko='.$idtoko.'&kdtransaksi='.$row['kdtransaksi'].'\'"><i class="fa fa-pencil" style="font-size: 20px;"></i></a>';?><img width="16" height="16" src="images/edit.png"></img></td>
        <td align="center"><?php echo'<a href=\'../crud/hapus_transaksi.php?idtoko='.$row['id_toko'].'&kdtransaksi='.$row['kdtransaksi'].'\'><i class="fa fa-eraser" style="font-size: 20px;"></i></a>';?><img width="16" height="16" src="images/drop.png"></img></td>
    </tr>
 
    <?php }
    ?>
</table></center>
<?php } else {
  echo"<center><H3>DATA TRANSAKSI MASIH KOSONG</H3></center>";
} ?>
</div>
<?php include"../header_session/footer.php";?>
</div>
</body>
</html>
