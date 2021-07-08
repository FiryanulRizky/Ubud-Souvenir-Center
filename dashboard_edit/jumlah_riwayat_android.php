<?php
ob_start();

include "../android/1_login_reg/login_reg2.php";

ob_end_clean();    
    //menghitung jumlah pesan dari tabel pesan

    $query= mysqli_query($conn,"SELECT Count(id_pembeli) AS jumlah_riwayat_android FROM pembeli WHERE id_toko='$idtoko' AND status='LUNAS'");

    //menampilkan data

    $hasil = mysqli_fetch_array($query,MYSQLI_ASSOC);

    //membuat data json

    echo json_encode(array('jumlah_riwayat_android' => $hasil['jumlah_riwayat_android']));

    ?>