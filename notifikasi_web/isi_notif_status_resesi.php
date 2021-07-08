<?php
include "../db/koneksi.php";
    //mengambil data 5 pesan terbaru 
    $sql = mysqli_query($conn, "SELECT nama_toko,id_toko FROM infotoko WHERE status='in Trouble' ORDER BY id_toko DESC");
    $result_status_resesi = array();
    
    while ($row_status_resesi = mysqli_fetch_assoc($sql)) {
        $data_status_resesi[] = $row_status_resesi;
    }

    echo json_encode(array("result_status_resesi" => $data_status_resesi));
?>