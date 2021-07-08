<?php
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
	$conn = mysqli_connect("localhost","ubudsouv","d30n@U0MQP8hp-","ubudsouv_ubudmarket_research");
	if (mysqli_connect_errno()){
		echo "Koneksi database gagal : " . mysqli_connect_error();
	}
?>