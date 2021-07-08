<?php
include "../db/koneksi.php";
    //menghitung jumlah pesan dari tabel pesan
    $query= mysqli_query($conn,"SELECT Count(id_toko) AS jumlah_hapus_toko FROM infotoko WHERE status='Peninjauan Penghapusan'");
    
    //menampilkan data
    $hapus_toko = mysqli_fetch_array($query,MYSQLI_ASSOC);

    //membuat data json
    echo json_encode(array('jumlah_hapus_toko' => $hapus_toko['jumlah_hapus_toko']));
    
    ?>
