<?php
ob_start();
include "../1_login_reg/login_reg.php";
ob_end_clean();
    //menghitung jumlah pesan dari tabel pesan
    $query= mysqli_query($conn,"SELECT Count(id_item) AS jumlah_stok FROM item WHERE id_toko='$idtoko' AND stok<=5");
    
    //menampilkan data
    $hasil_stok = mysqli_fetch_array($query,MYSQLI_ASSOC);

    //membuat data json
    echo json_encode(array('jumlah_stok' => $hasil_stok['jumlah_stok']));
    
    ?>