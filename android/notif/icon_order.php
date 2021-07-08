<script type="text/javascript" src="../../js/jquery-3.5.1.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" />
<script type="text/javascript">

    $(document).ready(function() {

    selesai();

});



function selesai() {

    setTimeout(function() {

        jumlah_order();

        selesai();

    }, 200);

}



function jumlah_order() {

    $.getJSON("jumlah_order.php", function(datas) {

        $("#notif_order").html(datas.jumlah_order);

    });

}</script>
<H1 style="color:blue;"><span id="notif_order" style="font-size:28px;color:blue;"></span></H1>
