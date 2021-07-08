<?php
ob_start();
include "../1_login_reg/login_reg.php";
ob_end_clean();
    //mengambil data 5 pesan terbaru 
    $sql_stok = mysqli_query($conn, "SELECT merk,stok FROM item WHERE id_toko='$idtoko' AND stok<=5 ORDER BY id_item DESC");
    $result_stok = array();
    
    while ($row_stok = mysqli_fetch_assoc($sql_stok)) {
        $data_stok[] = $row_stok;
    }

    echo json_encode(array("result_stok" => $data_stok));
?>