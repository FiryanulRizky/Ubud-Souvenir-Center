<link rel="stylesheet" type="text/css" href="../../css/style_admin.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" />
<?php
ob_start();
include"../1_login_reg/login_reg.php";
ob_end_clean();
include"../notif/notif_android.php";
?>
<div id='bgkonten'>
<?php 
$cek_jumlah_item=mysqli_query($conn,"SELECT * FROM item WHERE id_toko='$idtoko'");
$ambil_jml=mysqli_num_rows($cek_jumlah_item);
if($ambil_jml>0) {
$cek_jumlah_transaksi=mysqli_query($conn,"SELECT * FROM transaksi WHERE id_toko='$idtoko'");
$ambil_jml_transaksi=mysqli_num_rows($cek_jumlah_transaksi);
if($ambil_jml_transaksi==0) {?>
<div class="konten_tabel">
<center><h2 style="color:blue;">Data Transaksi <?php echo $namatoko3;?></h2><br>
<a href=tambah-transaksi.php><input type='button' value='TAMBAH' class='btn_submit'></a><br><H1>Data Transaksi Masih Kosong</H1></div>
<?php } else { ?>
<div class="konten_tabel">
<center><h2 style="color:blue;">Data Transaksi <?php echo $namatoko3;?></h2><br>
<a href=tambah-transaksi.php><input type='button' value='TAMBAH' class='btn_submit'></a><br><br>
<div class="view_data">
  <div class="card mt-5">
   <div class="card-body mx-auto">
    <form method="POST">
     <label for="date1">Tanggal</label>
     <input type="date" name="date1" id="date1">
     <label for="date2">sampai </label>
     <input type="date" name="date2" id="date2">
     <button type="submit" name="submit2" id="submit2" class="btn btn-primary">Cari</button>
    </form></center><br>
  <?php
  if (isset($_POST['submit2'])) {
 $date1 = $_POST['date1'];
 $date2 = $_POST['date2'];
    if (!empty($date1) && !empty($date2)) {
  // perintah tampil data berdasarkan range tanggal
  $result = mysqli_query($conn,"SELECT * FROM transaksi WHERE id_toko='$idtoko' AND tgltransaksi BETWEEN '$date1' AND '$date2' GROUP BY kdtransaksi");

  echo"<br><br>Data ditampilkan dari rentang tanggal "; echo date('d-M-Y', strtotime($date1)); echo " sampai "; echo date('d-M-Y', strtotime($date2)); echo "<br><br><a href='transaksi.php?clear=y'><button style='color:white;background:red;padding:5px;'>Hapus Filter</button></a><br><br>";
 } else {
  // perintah tampil semua data
  $result = mysqli_query($conn,"SELECT * FROM transaksi WHERE id_toko='$idtoko' GROUP BY kdtransaksi ORDER BY kdtransaksi ASC"); 
 }
} else {
 // perintah tampil semua data
 $result = mysqli_query($conn,"SELECT * FROM transaksi WHERE id_toko='$idtoko' GROUP BY kdtransaksi ORDER BY id_transaksi DESC");
}
echo'<table border="1" class="bgproduct1" style="width:100%;">';
    while($row = $result->fetch_assoc())
    {
    ?>
    <tr><td><?php echo ++$no; ?></td><td>
    <?php echo "Kode ".$row['kdtransaksi']."<hr>";?>
    <?=date('d-M-Y', strtotime($row['tgltransaksi']))?>
    <br><br><?php
      $kdtransaksi=$row['kdtransaksi'];
            $result2=mysqli_query($conn,"SELECT * FROM transaksi,item WHERE item.kditem=transaksi.kditem AND transaksi.id_toko=item.id_toko AND transaksi.id_toko='$idtoko' AND transaksi.kdtransaksi='$kdtransaksi' ORDER BY item.kditem");
        while($rowItem = $result2->fetch_assoc())
        {
          echo $rowItem['merk'] ." , ";
        }
        
      ?><br><br><?=date('H:i:s', strtotime($row['jam_order']))?> WITA</td>
      <td><?php echo'<a href="edit-transaksi.php?idtoko='.$row['id_toko'].'&kdtransaksi='.$row['kdtransaksi'].'"><i class="fa fa-pencil" style="font-size: 20px;"></i></a>';?></td><td><?php echo"<a href=\"hapus-transaksi.php?idtoko=".$row['id_toko']."&kdtransaksi=".$row['kdtransaksi']."\"><i class='fa fa-eraser' style='font-size: 20px;'></i></a></td>";?>
    </tr>
 
    <?php }
    ?>
</table>
</div><?php } } 
else { 
    echo"<center><h3>Data Produk Masih Kosong, Silahkan isi data produk</h3></center>";
} ?>
</div>
</body>
</html>
