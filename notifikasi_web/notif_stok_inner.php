<!DOCTYPE html>
    <html lang="en">
    
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
    </head>
    
    <body>
        <H3 style="text-align: center;">
            <div class="dropdown">
                <form method="post">
                <button type="submit" class="btn_submit" name="stok" style="width:100%;">
                    Refill Stok <span class='badge badge-light' id='notif_stok'></span>
                </button></form>
                <?php $sql_stok = mysqli_query($conn, "SELECT * FROM item WHERE id_toko='$idtoko' AND stok<=5 ORDER BY id_item DESC");
                if (isset($_POST['stok'])&&mysqli_num_rows($sql_stok)>0) {
                     echo'<form method="post"><input type="submit" value="tutup notif" style="background:orange;color:white;font-size:21px;padding:5px;"></form><div id="pesan_stok" style="text-align:left; font-size:18px;">';
                } ?>
    
                </div>
        </div>
    </H3>
        <script type="text/javascript" src="../js/jquery-3.5.1.js"></script>
        <script type="text/javascript" src="../js/notif_stok_inner.js"></script>
    </body>
    
    </html>