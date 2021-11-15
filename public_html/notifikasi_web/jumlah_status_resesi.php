<?php
include "../db/koneksi.php";
    //menghitung jumlah pesan dari tabel pesan
    $query= mysqli_query($conn,"SELECT Count(id_toko) AS jumlah_status_resesi FROM infotoko WHERE status='in Trouble'");
    
    //menampilkan data
    $status_resesi = mysqli_fetch_array($query,MYSQLI_ASSOC);

    //membuat data json
    echo json_encode(array('jumlah_status_resesi' => $status_resesi['jumlah_status_resesi']));
    
    ?>
