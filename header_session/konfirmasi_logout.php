<?php
echo'<script>
        var yakin = confirm("Yakin ingin Logout?");

        if (yakin) {
        	window.location = "logout.php";
        } else {
            window.location = "../index.php";
        }
    </script>';
exit;
?>
