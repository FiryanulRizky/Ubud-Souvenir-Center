<?php
ob_start();
include "../header_session/login_inner.php";
ob_end_clean();
    //menghitung jumlah pesan dari tabel pesan
    $query= mysqli_query($conn,"SELECT Count(id_pembeli) AS jumlah FROM pembeli WHERE id_toko='$idtoko' AND status='NEW'");
    
    //menampilkan data
    $hasil = mysqli_fetch_array($query,MYSQLI_ASSOC);

    //membuat data json
    echo json_encode(array('jumlah' => $hasil['jumlah']));
    
    ?>
