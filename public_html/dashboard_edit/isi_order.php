<?php

ob_start();

include "../android/1_login_reg/login_reg2.php";

ob_end_clean();

    //mengambil data 5 pesan terbaru 

    $sql = mysqli_query($conn, "SELECT nama_pembeli,kode_order FROM pembeli WHERE id_toko='$idtoko' AND status='NEW' ORDER BY id_pembeli DESC limit 5");

    $result = array();

    

    while ($row = mysqli_fetch_assoc($sql)) {

        $data[] = $row;

    }



    echo json_encode(array("result" => $data));

?>