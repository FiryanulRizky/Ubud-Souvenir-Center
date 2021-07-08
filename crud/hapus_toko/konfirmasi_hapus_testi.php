<?php 
echo'<script>
        var yakin = confirm("Yakin ingin menghapus testi dari '.$_GET['namatk'].'?");

        if (yakin) {
        	window.location = "hapus_testi.php?idtk='.$_GET['idtk'].'";
        } else {
            window.location = "../../Super_Admin/pesan_sp.php";
        }
    </script>';
?>