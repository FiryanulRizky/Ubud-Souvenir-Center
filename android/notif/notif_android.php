<link rel="stylesheet" type="text/css" href="../../css/bootstrap.min.css">

<script type="text/javascript" src="../../js/jquery-3.5.1.js"></script>

<script type="text/javascript">

    $(document).ready(function() {

    selesai();

});



function selesai() {

    setTimeout(function() {

        jumlah_order();

        selesai();

        pesan_order();

        jumlah_stok();

        pesan_stok();

    }, 200);

}



function jumlah_order() {

    $.getJSON("../notif/jumlah_order.php", function(datas) {

        $("#notif_order").html(datas.jumlah_order);

    });

}



function jumlah_stok() {

    $.getJSON("../notif/jumlah_stok.php", function(datas_stok) {

        $("#notif_stok").html(datas_stok.jumlah_stok);

    });

}



function pesan_order() {

    $.getJSON("../notif/isi_order.php", function(data) {

        $("#pesan_order").empty();

        var no = 1;

        $.each(data.result, function() {

            $("#pesan_order").append(`<a id="pesan_order" class="dropdown-item" style="background:lightblue;font-size:21px;font-weight:bold;" href="../../dashboard_edit/admin_order_android.php"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-envelope-fill" viewBox="0 0 16 16">

            <path fill-rule="evenodd" d="M.05 3.555A2 2 0 0 1 2 2h12a2 2 0 0 1 1.95 1.555L8 8.414.05 3.555zM0 4.697v7.104l5.803-3.558L0 4.697zM6.761 8.83l-6.57 4.027A2 2 0 0 0 2 14h12a2 2 0 0 0 1.808-1.144l-6.57-4.027L8 9.586l-1.239-.757zm3.436-.586L16 11.801V4.697l-5.803 3.546z"/>

            </svg>&nbsp;`+this['nama_pembeli'].substr(0, 20)+`...</a>`);

        });

    });

}



function pesan_stok() {

    $.getJSON("../notif/isi_stok.php", function(data_stok) {

        $("#pesan_stok").empty();

        var no_stok = 1;

        $.each(data_stok.result_stok, function() {

            $("#pesan_stok").append(`<a id="pesan_stok" class="dropdown-item" style="background:lightblue;font-size:21px;font-weight:bold;" href="../3_kelola_produk/item.php"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-envelope-fill" viewBox="0 0 16 16">

            <path fill-rule="evenodd" d="M.05 3.555A2 2 0 0 1 2 2h12a2 2 0 0 1 1.95 1.555L8 8.414.05 3.555zM0 4.697v7.104l5.803-3.558L0 4.697zM6.761 8.83l-6.57 4.027A2 2 0 0 0 2 14h12a2 2 0 0 0 1.808-1.144l-6.57-4.027L8 9.586l-1.239-.757zm3.436-.586L16 11.801V4.697l-5.803 3.546z"/>

            </svg>&nbsp;`+this['merk'].substr(0, 20)+`...</a>`);

        });

    });

}

</script>

<center><table><tr><td><br></td></tr>

    <tr><td><H3>

            <div class="dropdown">

                <form method="post">

                <button type="submit" class="btn_submit" name="notif_order" style="width: 100%;">

                    Order Masuk <span class="badge badge-light" id="notif_order"></span>

                </button></form>

                <?php ob_start();include "../1_login_reg/login_reg.php";ob_end_clean(); $sql = mysqli_query($conn, "SELECT * FROM pembeli WHERE id_toko='$idtoko' AND status!='LUNAS'");

                if (isset($_POST['notif_order'])) {

                    if (mysqli_num_rows($sql)>0) {

                     echo'<form method="post"><input type="submit" value="tutup notif" style="background:orange;color:white;font-size:21px;padding:5px;"></form><div id="pesan_order" style="text-align:left; font-size:18px;">';} else {

                        echo'<script>alert("Order masuk kosong");</script>';

                     }

                } ?>

            </div>

        </div>

    </H3></td><td>&nbsp;&nbsp;&nbsp;&nbsp;</td><td><H3>

            <div class="dropdown">

                <form method="post">

                <button type="submit" class="btn_submit" name="notif_stok" style="width: 100%;">

                    Refill Stok <span class="badge badge-light" id="notif_stok"></span>

                </button></form>

                <?php ob_start();include "../1_login_reg/login_reg.php";ob_end_clean(); $sql = mysqli_query($conn, "SELECT * FROM pembeli WHERE id_toko='$idtoko' AND status!='LUNAS'");

                if (isset($_POST['notif_stok'])) {

                    if (mysqli_num_rows($sql)>0) {

                     echo'<form method="post"><input type="submit" value="tutup notif" style="background:orange;color:white;font-size:21px;padding:5px;"></form><div id="pesan_stok" style="text-align:left; font-size:18px;">';} else {

                        echo'<script>alert("Order masuk kosong");</script>';

                     }

                } ?>

            </div>

        </div>

    </H3></td></tr>

</table></center><br>