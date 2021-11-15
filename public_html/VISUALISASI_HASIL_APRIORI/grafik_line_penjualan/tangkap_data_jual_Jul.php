<link rel="stylesheet" type="text/css" href="../../css/style_admin.css">

<link rel="stylesheet" type="text/css" href="../../css/style.css">

<?php 

include"../../header_session/login_inner.php";
include"../../db/koneksi.php";
include "../../db/web_config.php";

?>

<div id="bgkonten">

<br>

<center><H2>PROSES GRAFIK LINE REKAM JEJAK TRANSAKSI</H2><br><table><tr><td style="border: 1px solid; background: lightgreen;"><a href="../index.php"><H3>MENU VISUALISASI</H3></a></td><td>&nbsp</td><td style="border: 1px solid; background: orange;"><a href="tangkap_data_jual_Juni.php"><H3>KEMBALI</H3></a></td><td>&nbsp</td><td><form method='post' action='tangkap_data_jual_Aug.php'><input type='submit' class='btn_submit' name='pindah' value='SELANJUTNYA'></form></td></tr></table></center><br>



<form method="post">



<center><input type="submit" name="proses" value="SIMPAN KE DATABASE" style="width: 165px; height: 50px; background: grey; color: white; font-weight: bold;"><input type="hidden" name="act" value="line"></center><br>



<table border="1" style="width: 100%; text-align: center;"><tr><td> <?php



echo"<H1 style='color:blue; text-shadow: 1px 1px black;'>Penjualan Bulan Juli<hr>";



$data_trans_1=mysqli_query($conn,"SELECT * FROM transaksi WHERE id_toko='$idtoko' AND MONTH(tgltransaksi)=7 GROUP BY kdtransaksi");

$data_trans_1_s=mysqli_query($conn,"SELECT * FROM transaksi WHERE id_toko='$idtoko' AND MONTH(tgltransaksi)=7");

$jumlah_1=mysqli_num_rows($data_trans_1_s);

$json_response = array();

while($tangkap_1=mysqli_fetch_array($data_trans_1,MYSQLI_ASSOC)) {

    $kdtransaksi=$tangkap_1['kdtransaksi'];

    $data_merk_1=mysqli_query($conn,"SELECT item.kditem,item.merk,item.gambar_item,item.harga FROM transaksi,item WHERE item.kditem=transaksi.kditem AND transaksi.id_toko=item.id_toko AND transaksi.id_toko='$idtoko' AND transaksi.kdtransaksi='$kdtransaksi' GROUP BY item.kditem ORDER BY item.id_item ASC");

    while($tangkap_merk_1=mysqli_fetch_array($data_merk_1,MYSQLI_ASSOC)) 

    {

        // echo "<br>".$tangkap_merk_1['merk']." : ";

        $json_response[] = $tangkap_merk_1;

        $kditem_1=$tangkap_merk_1['kditem'];

    

    }

}

$pendapatan_bulanan=mysqli_query($conn,"SELECT SUM(Juli) AS total FROM pendapatan WHERE id_toko='$idtoko'");

    while($tangkap_pendapatan=mysqli_fetch_array($pendapatan_bulanan,MYSQLI_ASSOC)) { 

echo "Penghasilan : ".format_currency($tangkap_pendapatan['total'])."<br></H1><br><H2>Total : ".$jumlah_1." Item Terjual</H2><br>";



}





    $data = $json_response;

    $jenis[]=null;    

    $cek="";

    $i=0;

    for($j=0;$j<count($data);$j++)

    {

        $index2=array_search($data[$j],$jenis);

        if($index2 == "")

        {    

            $jenis[$i]=$data[$j];

            $i++;

        }

    }



    cari($data, $jenis);

    

    function cari($data, $data2)

    {

        

        for($K=0;$K<count($data2);$K++)

        {    

            if ($data2[$K]>0) {

            echo '<img src=\'../../gambar/produk/'.$data2[$K]['gambar_item'].'\' width=120 height=80><br>';

            $produk=$data2[$K]['merk'];

            $kditem=$data2[$K]['kditem'];

            $harga=$data2[$K]['harga'];

            $produk_ar=array($produk);

            $laku=cariyangsama($data,$data2[$K]);

            echo "<H3>".$produk." => ".$laku." Item => ".format_currency($laku*$harga)."</H3><br><br>";
            include"../../header_session/login_inner.php";
            include"../../db/koneksi.php";
            $selectors = htmlentities(implode(',', $produk_ar));

                $data_db=$selectors;

                $input=$data_db;

                $pecah=explode("\r\n\r\n", $input);

                $text = "";

                for ($i=0; $i<=count($pecah)-1; $i++)

                {

                  $part = str_replace($pecah[$i], "<p>".$pecah[$i]."</p>", $pecah[$i]);

                  $text .=$part;

                }

                $text_line=$data_db;

                $text_line = explode(",",$text_line);

                for ($start=0; $start < count($text_line); $start++) {

                $laku;$kditem;$harga;

                $total=$laku*$harga;

                $baris=$text_line[$start];

                if ($_POST['act']=="line") {

                $cek_isi_db=mysqli_query($conn,"SELECT * FROM graph WHERE id_toko='$idtoko' AND produk='$baris' AND Juli='$laku'");

                $cek_kd=mysqli_fetch_array($cek_isi_db);

                $ck1=$cek_kd['kditem'];

                $cek_jumlah_db=mysqli_num_rows($cek_isi_db);

                if ($cek_jumlah_db>0 && $ck1==$kditem) {



                    echo'<script>alert("DATA SUDAH ADA");window.location="tangkap_data_jual_Jul.php"</script>';



                } else {



                    @mysqli_query($conn,"UPDATE graph SET Juli= Juli + '$laku' WHERE id_toko='$idtoko' AND kditem='$kditem' AND produk='$baris'");

                    @mysqli_query($conn,"UPDATE pendapatan SET Juli= Juli + '$total' WHERE id_toko='$idtoko' AND kditem='$kditem' AND produk='$baris'");



                        echo'<script>alert("Data Berhasil di Update");window.location ="tangkap_data_jual_Jul.php";</script>';

                    }

                }   

            }

        }

    }

}

    

    function cariyangsama($data,$dupval) {

        $nb= 0;

        foreach($data as $key => $val)

        if ($val==$dupval) $nb++;

        return $nb;

    }

    ?></td></tr></table></form></div>