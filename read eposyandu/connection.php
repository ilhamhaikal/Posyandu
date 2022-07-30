<?php
	$conn = mysqli_connect("localhost","root","", "eposyandu");

	if (!$conn){
        die("Connection Failed:".mysqli_connect_error());
    }
?>