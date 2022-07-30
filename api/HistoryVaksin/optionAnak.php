<?php
    header("Access-Control-Allow-Origin: *");
	header("Content-Type: application/json; charset=UTF-8");

	//include database
	include_once '../config/database.php' ;
	include_once '../objects/history.php';

	//inistantiate database and product object
	$database = new Database();
	$db = $database->getConnection();

    $option = $db->query("SELECT id_anak, nama_anak FROM ref_anak");
    echo "<option> PILIH NAMA ANAK </option>\n";
    while ($row = $option->fetch(PDO::FETCH_ASSOC)){
        echo "<option value='". $row['id_anak'].  "'>". $row['nama_anak'] . "</option>\n";
    }
    
?>