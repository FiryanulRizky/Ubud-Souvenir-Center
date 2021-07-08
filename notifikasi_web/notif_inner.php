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
                <button type="submit" class="btn_submit" name="notif_pembeli" style="width:100%;">
                    Order Masuk <span class="badge badge-light" id="notif"></span>
                </button></form>
                <?php $sql = mysqli_query($conn, "SELECT * FROM pembeli WHERE id_toko='$idtoko' AND status!='LUNAS'");
                if (isset($_POST['notif_pembeli'])) {
                    if (mysqli_num_rows($sql)>0) {
                     echo'<form method="post"><input type="submit" value="tutup notif" style="background:orange;color:white;font-size:21px;padding:5px;"></form><div id="pesan" style="text-align:left; font-size:18px;">';} else {
                        echo'<script>alert("Order masuk kosong");</script>';
                     }
                } ?>
    
                </div>
        </div>
    </H3>
        <script type="text/javascript" src="../js/jquery-3.5.1.js"></script>
        <script type="text/javascript" src="../js/notif_inner.js"></script>
    </body>
    
    </html>