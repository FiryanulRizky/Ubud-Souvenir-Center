$(document).ready(function() {
    selesai_stok();
});
 

function selesai_stok() {
    setTimeout(function() {
        jumlah_stok();
        selesai_stok();
        pesan_stok();
    }, 200);
}


function jumlah_stok() {
    $.getJSON("../notifikasi_web/jumlah_stok_inner.php", function(datas_stok) {
        $("#notif_stok").html(datas_stok.jumlah_stok);
    });
}



function pesan_stok() {
    $.getJSON("../notifikasi_web/isi_notif_stok_inner.php", function(data_stok) {
        $("#pesan_stok").empty();
        var no_stok = 1;
        $.each(data_stok.result_stok, function() {
            $("#pesan_stok").append(`<a id="pesan_stok" class="dropdown-item" href="../PROSES_ALGORITMA_APRIORI/daftar_item.php"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-envelope-fill" viewBox="0 0 16 16">
            <path fill-rule="evenodd" d="M.05 3.555A2 2 0 0 1 2 2h12a2 2 0 0 1 1.95 1.555L8 8.414.05 3.555zM0 4.697v7.104l5.803-3.558L0 4.697zM6.761 8.83l-6.57 4.027A2 2 0 0 0 2 14h12a2 2 0 0 0 1.808-1.144l-6.57-4.027L8 9.586l-1.239-.757zm3.436-.586L16 11.801V4.697l-5.803 3.546z"/>
            </svg>&nbsp;`+this['merk'].substr(0, 20)+`...</a>`);
        });
    });
}