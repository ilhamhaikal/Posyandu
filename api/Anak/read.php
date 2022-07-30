<?php

	header("Access-Control-Allow-Origin: *");
	header("Content-Type: application/json; charset=UTF-8");

	//include database
	include_once '../config/database.php' ;
	include_once '../objects/anak.php';

	//inistantiate database and product object
	$database = new Database();
	$db = $database->getConnection();

	//initialize object
	$anak = new Anak($db);

	//read product
	//query products
	$stmt = $anak->read();
	$num = $stmt->rowCount();

	$dataPerPage = 9;
	$jumlahHalaman = ceil($num / $dataPerPage);
	$halamanAktif = $_GET['page'];
	$startPage = ($dataPerPage * $halamanAktif) - $dataPerPage;
	$anak->dataPerPage = $dataPerPage;
	$anak->startPage = $startPage;

	$stmt2 = $anak->readPagination();
	$num2 = $stmt2->rowCount();

	//check if more than 0 record found
	if($num2>=0){

		$anak_arr=array();
		$anak_arr["records"]=array();
		$anak_arr["jumlahHalaman"] = $jumlahHalaman;
		$anak_arr["halamanAktif"] = $halamanAktif;

		while ($row = $stmt2->fetch(PDO::FETCH_ASSOC)){

		extract($row);

			$anak=array(
				"id_anak"=>$id_anak,
				"nama_anak"=>$nama_anak,
				"nik_anak"=>$nik_anak,
				"tempat_lahir_anak"=>$tempat_lahir_anak,
				"tgl_lahir_anak"=>$tgl_lahir_anak,
				"usia_anak"=>$usia_anak,
				"jk_anak"=>$jk_anak,
				"id_ibu"=>$nama_ibu
			);
		array_push($anak_arr["records"], $anak);
		}
		http_response_code(200);

		echo json_encode($anak_arr);

	}
	else{
		http_response_code(404);
		echo json_encode(
			array("message" => "404! Not Found ")
		);
	}
?>