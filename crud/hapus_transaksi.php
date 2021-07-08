<html>
    <head>
        <title><?php ob_start();include"../header_session/login_inner.php";ob_end_clean(); $toko=mysqli_query($conn,"SELECT * FROM infotoko WHERE id_toko='$idtoko'"); $ambil_data_toko=mysqli_fetch_array($toko); $nama_toko=$ambil_data_toko['nama_toko']; echo $nama_toko." Hapus Transaksi"; ?></title>
        <link rel="shortcut icon" type="image/x-icon" href="../gambar/images/head_logo.ico" />
        <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
</head>
<body>
<div>
<?php
include "../header_session/header_inner.php";
$kdtransaksi=$_GET['kdtransaksi'];

$tanggal = date("Ymd");
            $waktu   = date("His"); 
            $cek_admin=mysqli_query($conn,"SELECT * FROM statistik WHERE id_toko='$idtoko' AND tanggal='$tanggal'");
            while($ambil_ip=mysqli_fetch_array($cek_admin)){ 
                $cek_ip=$ambil_ip['ip'];
            }
            if($cek_ip>1){ 
            echo '<script>alert("Hapus Transaksi Sedang dalam sesi admin lain");window.location="../PROSES_ALGORITMA_APRIORI/data_transaksi.php";</script>';
            } else {
          $ip = $_SERVER['REMOTE_ADDR'];
$tanggal = date("Ymd");
$waktu   = date("His");
$status="admin"; 
$s = mysqli_query($conn,"SELECT * FROM statistik WHERE ip='$ip' AND tanggal='$tanggal' AND id_toko='$idtoko'");
$ambil_data_ip=mysqli_fetch_array($s);
$ambil_ip=$ambil_data_ip['ip'];
if(mysqli_num_rows($s) == 0 && $ambil_ip != $ip){
  mysqli_query($conn,"INSERT INTO statistik(id_toko, ip, tanggal, online, status) VALUES('$idtoko','$ip','$tanggal','$waktu','$status')");} 
      else {
        mysqli_query($conn,"UPDATE statistik SET online='$waktu', status='$status' WHERE ip='$ip' AND tanggal='$tanggal' AND id_toko='$idtoko'");
      } }

if (!empty($_GET['kdtransaksi'])){
	$result = mysqli_query($conn,"SELECT * FROM transaksi WHERE id_toko='$idtoko' AND kdtransaksi='$kdtransaksi' GROUP BY kdtransaksi");
    while($row = $result->fetch_assoc()) {
    $rs=mysqli_query($conn,"SELECT * FROM transaksi,item WHERE item.kditem=transaksi.kditem AND transaksi.id_toko=item.id_toko AND transaksi.id_toko='$idtoko' AND transaksi.kdtransaksi='$kdtransaksi' ORDER BY item.kditem");
    $kditem=$row['kditem'];
    echo'<div id="bgkonten">
<H3>YAKIN INGIN DIHAPUS ?</H3>
<form method="post"><input type="submit" name="kembali_2" value="Batal" style="background:lightgrey;padding:10px;font-weight:bold;"></form>
<form method="post" enctype="multipart/form-data">';
if (isset($_POST['kembali_2'])) {
    $cek_ip=mysqli_query($conn,"SELECT * FROM statistik WHERE id_toko='$idtoko'");
    if (mysqli_num_rows($cek_ip)>0) {
        $del_statistik=mysqli_query($conn,"DELETE FROM statistik WHERE id_toko='$idtoko'");
        echo'<script>window.location="../PROSES_ALGORITMA_APRIORI/data_transaksi.php";</script>';
    } else {
        echo'<script>window.location="../PROSES_ALGORITMA_APRIORI/data_transaksi.php";</script>';
    }
}
echo'<b>Keterangan Data :</b><br>
<form method="post" enctype="multipart/form-data">
&raquo;&nbsp;kode transaksi : '.$row['kdtransaksi'].'<br>
&raquo;&nbsp;Nama Produk :';
    while($rowItem=mysqli_fetch_array($rs,MYSQLI_ASSOC)) {
echo $rowItem['merk'].", ";
$kd=$rowItem['kditem'];
$tgl=$rowItem['tgltransaksi'];
$harga=$rowItem['harga'];
if ($_POST['act']=="delete"){
    $query=mysqli_query($conn,"DELETE FROM transaksi WHERE kdtransaksi='$kdtransaksi' AND id_toko='$idtoko'");
    $del_ip=mysqli_query($conn,"DELETE FROM statistik WHERE id_toko='$idtoko'");
    if (date('M',strtotime($tgl))=="Jan") 
    {   
        @mysqli_query($conn,"UPDATE graph SET Januari=0 WHERE id_toko='$idtoko' AND kditem='$kd' ORDER BY id_graph ASC");
        @mysqli_query($conn,"UPDATE pendapatan SET Januari=0 WHERE id_toko='$idtoko' AND kditem='$kd' ORDER BY id_hasil ASC");
    } elseif (date('M',strtotime($tgl))=="Feb") {
        @mysqli_query($conn,"UPDATE graph SET Februari=0 WHERE id_toko='$idtoko' AND kditem='$kd' ORDER BY id_graph ASC");
        @mysqli_query($conn,"UPDATE pendapatan SET Februari=0 WHERE id_toko='$idtoko' AND kditem='$kd' ORDER BY id_hasil ASC");
    } elseif (date('M',strtotime($tgl))=="Mar") {
        @mysqli_query($conn,"UPDATE graph SET Maret=0 WHERE id_toko='$idtoko' AND kditem='$kd' ORDER BY id_graph ASC");
        @mysqli_query($conn,"UPDATE pendapatan SET Maret=0 WHERE id_toko='$idtoko' AND kditem='$kd' ORDER BY id_hasil ASC");
    } elseif (date('M',strtotime($tgl))=="Apr") {
        @mysqli_query($conn,"UPDATE graph SET April=0 WHERE id_toko='$idtoko' AND kditem='$kd' ORDER BY id_graph ASC");
        @mysqli_query($conn,"UPDATE pendapatan SET April=0 WHERE id_toko='$idtoko' AND kditem='$kd' ORDER BY id_hasil ASC");
    } elseif (date('M',strtotime($tgl))=="May") {
        @mysqli_query($conn,"UPDATE graph SET Mei=0 WHERE id_toko='$idtoko' AND kditem='$kd' ORDER BY id_graph ASC");
        @mysqli_query($conn,"UPDATE pendapatan SET Mei=0 WHERE id_toko='$idtoko' AND kditem='$kd' ORDER BY id_hasil ASC");
    } elseif (date('M',strtotime($tgl))=="Jun") {
        @mysqli_query($conn,"UPDATE graph SET Juni=0 WHERE id_toko='$idtoko' AND kditem='$kd' ORDER BY id_graph ASC");
        @mysqli_query($conn,"UPDATE pendapatan SET Juni=0 WHERE id_toko='$idtoko' AND kditem='$kd' ORDER BY id_hasil ASC");
    } elseif (date('M',strtotime($tgl))=="Jul") {
        @mysqli_query($conn,"UPDATE graph SET Juli=0 WHERE id_toko='$idtoko' AND kditem='$kd' ORDER BY id_graph ASC");
        @mysqli_query($conn,"UPDATE pendapatan SET Juli=0 WHERE id_toko='$idtoko' AND kditem='$kd' ORDER BY id_hasil ASC");
    } elseif (date('M',strtotime($tgl))=="Aug") {
        @mysqli_query($conn,"UPDATE graph SET Agustus=0 WHERE id_toko='$idtoko' AND kditem='$kd' ORDER BY id_graph ASC");
        @mysqli_query($conn,"UPDATE pendapatan SET Agustus=0 WHERE id_toko='$idtoko' AND kditem='$kd' ORDER BY id_hasil ASC");
    } elseif (date('M',strtotime($tgl))=="Sep") {
        @mysqli_query($conn,"UPDATE graph SET September=0 WHERE id_toko='$idtoko' AND kditem='$kd' ORDER BY id_graph ASC");
        @mysqli_query($conn,"UPDATE pendapatan SET September=0 WHERE id_toko='$idtoko' AND kditem='$kd' ORDER BY id_hasil ASC");
    } elseif (date('M',strtotime($tgl))=="Oct") {
        @mysqli_query($conn,"UPDATE graph SET Oktober=0 WHERE id_toko='$idtoko' AND kditem='$kd' ORDER BY id_graph ASC");
        @mysqli_query($conn,"UPDATE pendapatan SET Oktober=0 WHERE id_toko='$idtoko' AND kditem='$kd' ORDER BY id_hasil ASC");
    } elseif (date('M',strtotime($tgl))=="Nov") {
        @mysqli_query($conn,"UPDATE graph SET November=0 WHERE id_toko='$idtoko' AND kditem='$kd' ORDER BY id_graph ASC");
        @mysqli_query($conn,"UPDATE pendapatan SET November=0 WHERE id_toko='$idtoko' AND kditem='$kd' ORDER BY id_hasil ASC");
    } elseif (date('M',strtotime($tgl))=="Dec") {
        @mysqli_query($conn,"UPDATE graph SET Desember=0 WHERE id_toko='$idtoko' AND kditem='$kd' ORDER BY id_graph ASC");
        @mysqli_query($conn,"UPDATE pendapatan SET Desember=0 WHERE id_toko='$idtoko' AND kditem='$kd' ORDER BY id_hasil ASC");
    }
    echo '<script>alert("TRANSAKSI BERHASIL DIHAPUS ");window.location = "../PROSES_ALGORITMA_APRIORI/data_transaksi.php";</script>';    
}
		}
		echo'<br>&raquo;&nbsp;Tanggal : '.$row['tgltransaksi'].'<br>
&raquo;&nbsp;Jam Order: '.$row['jam_order'].'<br><br>
    
    <input type="submit" value="HAPUS TRANSAKSI" class="btn_submit">
    <input type="hidden" name="act" value="delete" >
    </form>';
    $row['kdtransaksi']=$kdhapus; 
	}
}
?>
</div>
</body>
</html>