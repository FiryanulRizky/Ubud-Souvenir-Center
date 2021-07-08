<?php 
echo'<script>
        var yakin = confirm("Yakin ingin Logout?");

        if (yakin) {
        	window.location = "logout_sp.php";
        } else {
            window.location = "../Super_Admin/index.php";
        }
    </script>';
exit;
?>