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
                <button type="submit" class="btn_submit" name="status_resesi_btn">
                    Tinjau Resesi <span class='badge badge-light' id='notif_status_resesi'></span>
                </button></form>
                <?php $sql = mysqli_query($conn, "SELECT * FROM infotoko WHERE status='in Trouble' ORDER BY id_toko DESC");
                if (isset($_POST['status_resesi_btn'])&&mysqli_num_rows($sql)>0) {
                     echo'<form method="post"><input type="submit" value="tutup notif" style="background:orange;color:white;font-size:21px;padding:5px;"></form><div id="pesan_status_resesi" style="text-align:left; font-size:18px;">';
                } ?>
    
                </div>
        </div>
    </H3>
        <script type="text/javascript" src="../js/jquery-3.5.1.js"></script>
        <script type="text/javascript" src="../js/notif_status_resesi.js"></script>
    </body>
    
    </html>