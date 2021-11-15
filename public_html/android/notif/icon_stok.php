<script type="text/javascript" src="../../js/jquery-3.5.1.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" />
<script type="text/javascript">

    $(document).ready(function() {

    selesai();

});



function selesai() {

    setTimeout(function() {

        selesai();

        jumlah_stok();

    }, 200);

}



function jumlah_stok() {

    $.getJSON("jumlah_stok.php", function(datas) {

        $("#notif_stok").html(datas.jumlah_stok);

    });

}</script>
<H1 style="color:blue;"><span id="notif_stok" style="font-size:28px;color:blue;"></span></H1>