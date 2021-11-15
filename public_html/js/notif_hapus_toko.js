$(document).ready(function() {
    selesai_hapus_toko();
});
 

function selesai_hapus_toko() {
    setTimeout(function() {
        jumlah_hapus_toko();
        selesai_hapus_toko();
        pesan_hapus_toko();
    }, 200);
}


function jumlah_hapus_toko() {
    $.getJSON("../notifikasi_web/jumlah_hapus_toko.php", function(datas_hapus_toko) {
        $("#notif_hapus_toko").html(datas_hapus_toko.jumlah_hapus_toko);
    });
}



function pesan_hapus_toko() {
    $.getJSON("../notifikasi_web/isi_notif_hapus_toko.php", function(data_hapus_toko) {
        $("#pesan_hapus_toko").empty();
        var no_hapus_toko = 1;
        $.each(data_hapus_toko.result_hapus_toko, function() {
            $("#pesan_hapus_toko").append(`<a id="pesan_hapus_toko" class="dropdown-item" href="../Super_Admin/halaman_tinjau_akun.php"><br><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-envelope-fill" viewBox="0 0 16 16">
            <path fill-rule="evenodd" d="M.05 3.555A2 2 0 0 1 2 2h12a2 2 0 0 1 1.95 1.555L8 8.414.05 3.555zM0 4.697v7.104l5.803-3.558L0 4.697zM6.761 8.83l-6.57 4.027A2 2 0 0 0 2 14h12a2 2 0 0 0 1.808-1.144l-6.57-4.027L8 9.586l-1.239-.757zm3.436-.586L16 11.801V4.697l-5.803 3.546z"/>
            </svg>&nbsp;`+this['nama_toko'].substr(0, 20)+`...</a>`);
        });
    });
}