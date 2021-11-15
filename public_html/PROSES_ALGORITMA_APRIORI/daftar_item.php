<html>
    <head>
        <title><?php ob_start();include"../header_session/login_inner.php";ob_end_clean(); $toko=mysqli_query($conn,"SELECT * FROM infotoko WHERE id_toko='$idtoko'"); $ambil_data_toko=mysqli_fetch_array($toko); $nama_toko=$ambil_data_toko['nama_toko']; echo $nama_toko." Produk/Item"; ?></title>
        <link rel="shortcut icon" type="image/x-icon" href="../gambar/images/head_logo.ico" />
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" />
    </head>
<body>
<?php
// *** LOAD ADMIN PAGE HEADER
include "../header_session/header_inner.php";
include"../db/web_config.php";
echo"<div id='bgkonten'>";?>
<center><h2 class="art-postheader">Daftar Produk</h2><?php
echo "<a href=\"../crud/tambah_item.php\"><input type='button' value='TAMBAH' class='btn_submit'></a></center><br>";

$result = mysqli_query($conn,"SELECT * FROM item WHERE id_toko='$idtoko' ORDER BY id_item ASC");
if (mysqli_num_rows($result)>0) {
    echo"<center>";
    echo '
    <table border="1" class="bgproduct" style="width:100%;">
    <tr>
    <td><b>NO</td>
    <td align="center"><b>KATEGORI</td>
    <td align="center"><b>ID PRODUK</td>
    <td align="center"><b>NAMA</td>
     <td align="center"><b>STOK</td>
      <td align="center"><b>GAMBAR</td>
    <td align="center"><b>DESKRIPSI</td>
    <td align="center"><b>HARGA</td>
    <td colspan="4" align="center"> <b>PILIHAN</td>
    </tr>
    ';
        while ($row = mysqli_fetch_array($result,MYSQLI_ASSOC)){
            $no++;
            if ($row['stok']<=5) {
              echo "<tr style='background:yellow;'><td>".($recno+$no)."</td>";
        echo "<td>".$row['jenis']."</td>";
                echo "<td>".$row['kditem']."</td>";
        echo "<td>".$row['merk']."</td>";
                echo "<td style='background:red;color:white;font-size:24px;text-align:center;'>".$row['stok']."</td>";
            } else {
      echo "<tr><td>".($recno+$no)."</td>";
        echo "<td>".$row['jenis']."</td>";
                echo "<td>".$row['kditem']."</td>";
        echo "<td>".$row['merk']."</td>";
                echo "<td>".$row['stok']."</td>";}
        ?> <?php 
        if (file_exists("../gambar/produk/".$row['gambar_item'].""))
                $gambar="<a href=\"../gambar/produk/".$row['gambar_item']."\" target='_blank'><img src=\"../gambar/produk/".$row['gambar_item']."\" width=50 ></br>Lihat Gambar</a>";
            else
                $gambar="";?>
        <td align='center'><?php echo $gambar;?></td>
        <td><?php echo substr($row['deskripsi'], 0, 25)?>..........</td>
        <td><?php echo format_currency($row['harga']); if ($row['stok']<=5) { ?></td><?php
        echo "<td style='background:red;text-align:center;'><a href=\"../crud/update_item.php?id=".$row['id_toko']."&id=".$row['id_item']."\"><b style='color:white;'>Refill Stok</b><br> <i class='fa fa-pencil' style='font-size: 20px;color:white;'></i></a><td>";} else {
          echo "<td style='text-align:center;'><a href=\"../crud/update_item.php?idtoko=".$row['id_toko']."&id=".$row['id_item']."\"> <i class='fa fa-pencil' style='font-size: 20px;'></i></a><td>";
            }
                echo"<td><a href=\"../crud/hapus_item.php?idtoko=".$row['id_toko']."&id=".$row['id_item']."\"><i class='fa fa-eraser' style='font-size: 20px;'></i></a></td>";
      
      echo "</tr>";
    }
    echo'
    </table>
    ';} else {
      echo"<center><H3>PRODUK MASIH KOSONG</H3></center>";
    }

echo"</center>";
include"../header_session/footer.php";
echo"</div>";
?>
<!-- <script src="../js/jquery-3.5.1.slim.min.js"></script>

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
</script> -->
<div class="cleared"></div></body></html>
