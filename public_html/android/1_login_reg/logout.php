<?php 
echo'<script>
        var yakin = confirm("Yakin ingin Logout?");

        if (yakin) {
        	window.location = "logout_akhir.php";
        } else {
            window.location = "login_reg.php";
        }
    </script>';
exit;
?>