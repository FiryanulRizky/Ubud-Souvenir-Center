<link rel="stylesheet" type="text/css" href="../../css/style_admin.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" />
<?php
// *** LOAD ADMIN PAGE HEADER
ob_start();
include "../1_login_reg/login_reg.php";
ob_end_clean();
include"../notif/notif_android.php";
echo"<div id='bgkonten'>";?>
<center><h2 class="art-postheader">List <?php echo $namatoko3 ?> Produk</h2>
<?php $cekstok=mysqli_query($conn,"SELECT SUM(stok) AS jml_stok FROM item WHERE id_toko='$idtoko'");
echo "<br><a href=\"tambah_item.php\"><input type='button' value='TAMBAH' class='btn_submit'></a></center><br> ";
$result = mysqli_query($conn,"SELECT * FROM item WHERE id_toko='$idtoko' ORDER BY id_item DESC");
if (mysqli_num_rows($result)>0) {
    echo"<center>";
    echo '
    <table border="1" class="bgproduct1" style="width:100%;">
    ';
        while ($row = mysqli_fetch_array($result,MYSQLI_ASSOC)){
            $no++;
      if ($row['stok']<=5) {
        echo "<tr style='background:yellow;'><td>".($recno+$no)."</td><td>Kode : BR".$row['kditem']."<hr>";
        echo $row['merk']."<br><br>";
        echo "Kategori : ".$row['jenis']."<br>";
        echo "<b style='background:red;color:white;'>Stok : ".$row['stok']."</b><br>";
        echo format_currency ($row['harga']); ?><br><br><?php
        if (file_exists("../../gambar/produk/".$row['gambar_item'].""))
                $gambar="<img src=\"../../gambar/produk/".$row['gambar_item']."\" width=50 >";
            else
                $gambar="";?>
        <?php echo $gambar;?><br><br>Deskripsi<br>
        <?php echo substr($row['deskripsi'], 0, 100)?>..........
        <?php
        echo "<td align='center' style='background:red;color:white;'>Refill Stok<br><a href=\"cek_update_item.php?idtoko=".$row['id_toko']."&id=".$row['id_item']."\"> <i class='fa fa-pencil' style='font-size: 20px;color:white;'></i></a><td>";
                echo"<a href=\"konfirmasi_hapus_item.php?idtoko=".$row['id_toko']."&id=".$row['id_item']."\"><i class='fa fa-eraser' style='font-size: 20px;'></i></a></td>";
      
      echo "</tr>";
      } else {
      echo "<tr><td>".($recno+$no)."</td><td>Kode : BR".$row['kditem']."<hr>";
        echo $row['merk']."<br><br>";
        echo "Kategori : ".$row['jenis']."<br>";
        echo "Stok : ".$row['stok']."<br>";
        echo format_currency ($row['harga']); ?><br><br><?php
        if (file_exists("../../gambar/produk/".$row['gambar_item'].""))
                $gambar="<img src=\"../../gambar/produk/".$row['gambar_item']."\" width=50 >";
            else
                $gambar="";?>
        <?php echo $gambar;?><br><br>Deskripsi<br>
        <?php echo substr($row['deskripsi'], 0, 100)?>..........
        <?php
        echo "<td><a href=\"update_item.php?id=".$row['id_item']."\"> <i class='fa fa-pencil' style='font-size: 20px;'></i></a><td>";
                echo"<a href=\"konfirmasi_hapus_item.php?id=".$row['id_item']."\"><i class='fa fa-eraser' style='font-size: 20px;'></i></a></td>";
      
      echo "</tr>"; }
    }
    echo'
    </table>
    '; } else {
      echo"<center><H3>PRODUK MASIH KOSONG</H3></center>";
    }

echo"</center>";

echo"</div>";
?>
<!-- <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>

<script>
  $(function () {
    // Multiple images preview with JavaScript
    var multiImgPreview = function (input, imgPreviewPlaceholder) {

      if (input.files) {
        var filesAmount = input.files.length;

        for (i = 0; i < filesAmount; i++) {
          var reader = new FileReader();

          reader.onload = function (event) {
            $($.parseHTML('<img>')).attr('src', event.target.result).appendTo(imgPreviewPlaceholder);
          }

          reader.readAsDataURL(input.files[i]);
        }
      }

    };

    $('#chooseFile').on('change', function () {
      multiImgPreview(this, 'div.imgGallery');
    });
  });
</script>
<div class="cleared"></div> -->
