<?php
include '../../db/koneksi.php';
echo'
<form method="post" action="coba.php?id='.$_POST['coba'].'">';$query=mysqli_query($conn,"SELECT * FROM item");echo'<select name="coba">';
while($row=mysqli_fetch_array($query)){
$merk=$row['merk'];
$kditem=$row['kditem'];echo'
<option value='.$kditem.'>'.$merk.'</option>';} echo'
</select>
</form>
<input type="submit" value="PROSES">'; 