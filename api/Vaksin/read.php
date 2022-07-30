<?php

	header("Access-Control-Allow-Origin: *");
	header("Content-Type: application/json; charset=UTF-8");

	//include database
	include_once '../config/database.php' ;
	include_once '../objects/vaksin.php';


		$database = new Database();
		$db = $database->getConnection();
				
		$vaksin = new Vaksin($db);

		//read product
		//query products
		$stmt = $vaksin->read();
		$num = $stmt->rowCount();

		$dataPerPage = 10;
		$jumlahHalaman = ceil($num / $dataPerPage);
		$halamanAktif = $_GET['page'];
		$startPage = ($dataPerPage * $halamanAktif) - $dataPerPage;

		$vaksin->dataPerPage = $dataPerPage;
		$vaksin->startPage = $startPage;

		$stmt2 = $vaksin->readPagination();
		$num2 = $stmt2->rowCount();
		//check if more than 0 record found
		if($num2>=0){

			$vaksin_arr=array();
			$vaksin_arr["records"]=array();
			$vaksin_arr["jumlahHalaman"] = $jumlahHalaman;
			$vaksin_arr["halamanAktif"] = $halamanAktif;

			while ($row = $stmt2->fetch(PDO::FETCH_ASSOC)){

				extract($row);

				$vaksin_item=array(
					"id_vaksin"=>$id_vaksin,
					"nama_vaksin"=>$nama_vaksin	,		
				);
				array_push($vaksin_arr["records"], $vaksin_item);

			}
			http_response_code(200);

			echo json_encode($vaksin_arr);

		}
		else{
			http_response_code(500);
			echo json_encode(
				array("message" => "500! ERROR ")
			);
		}
	
?>