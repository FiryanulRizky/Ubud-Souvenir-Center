<!DOCTYPE HTML>
<html>
<head>
<title>Edit Data</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" />
<link rel="stylesheet" type="text/css" href="../css/style_admin.css">
</head>
<body>
<?php 
ob_start();
include"../1_login_reg/login_reg.php";
ob_end_clean();
$query=mysqli_query($conn,"SELECT * FROM admin_web WHERE id_toko='$idtoko' ORDER BY id_admin ASC");
?>
<center>
    <form method="post" action="tambah_admin.php"><input type="submit" name="tambah_admin" class="btn_submit" value="TAMBAH ADMIN" style="background:blue;"></form><br>
    <H2>Kelola Daftar Admin</H2><br>
    <table border="1" style="width: 75%; text-align: center;">
    <tr>
      <td>No.</td>
      <td>Nama</td>
      <td>Username</td>
      <td>telepon</td>
      <td colspan="2">Aksi</td>
    </tr>
    <?php while($row=mysqli_fetch_array($query)) {?>
    <tr>
      <td><?php echo ++$no;?></td>
      <td><?php echo $row['nama'];?></td>
      <td><?php echo $row['username'];?></td> 
      <td><?php echo $row['telepon'];?></td>
      <td><?php echo"<a href=\"update_admin.php?id=".$row['id_admin']."\"> <i class='fa fa-pencil' style='font-size: 20px;'></i></a>";?></td>
      <td><?php echo"<a href=\"hapus_admin.php?id=".$row['id_admin']."\"> <i class='fa fa-eraser' style='font-size: 20px;'></i></a>";?></td>
    </tr><?php } ?>
  </table>
</table>
</center>
</body>
</html>
