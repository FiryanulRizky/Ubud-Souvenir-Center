<?php
include "../db/koneksi.php";
    //mengambil data 5 pesan terbaru 
    $sql = mysqli_query($conn, "SELECT nama_toko,id_toko FROM infotoko WHERE status='Peninjauan Penghapusan' ORDER BY id_toko DESC");
    $result_hapus_toko = array();
    
    while ($row_hapus_toko = mysqli_fetch_assoc($sql)) {
        $data_hapus_toko[] = $row_hapus_toko;
    }

    echo json_encode(array("result_hapus_toko" => $data_hapus_toko));
?>