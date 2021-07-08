$(document).ready(function() {
    selesai_status_resesi();
});
 

function selesai_status_resesi() {
    setTimeout(function() {
        jumlah_status_resesi();
        selesai_status_resesi();
        pesan_status_resesi();
    }, 200);
}


function jumlah_status_resesi() {
    $.getJSON("../notifikasi_web/jumlah_status_resesi.php", function(datas_status_resesi) {
        $("#notif_status_resesi").html(datas_status_resesi.jumlah_status_resesi);
    });
}



function pesan_status_resesi() {
    $.getJSON("../notifikasi_web/isi_notif_status_resesi.php", function(data_status_resesi) {
        $("#pesan_status_resesi").empty();
        var no_status_resesi = 1;
        $.each(data_status_resesi.result_status_resesi, function() {
            $("#pesan_status_resesi").append(`<a id="pesan_status_resesi" class="dropdown-item" href="../Super_Admin/halaman_tinjau_resesi.php"><br><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-envelope-fill" viewBox="0 0 16 16">
            <path fill-rule="evenodd" d="M.05 3.555A2 2 0 0 1 2 2h12a2 2 0 0 1 1.95 1.555L8 8.414.05 3.555zM0 4.697v7.104l5.803-3.558L0 4.697zM6.761 8.83l-6.57 4.027A2 2 0 0 0 2 14h12a2 2 0 0 0 1.808-1.144l-6.57-4.027L8 9.586l-1.239-.757zm3.436-.586L16 11.801V4.697l-5.803 3.546z"/>
            </svg>&nbsp;`+this['nama_toko'].substr(0, 20)+`...</a>`);
        });
    });
}