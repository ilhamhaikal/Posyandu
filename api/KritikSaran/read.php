<?php

	header("Access-Control-Allow-Origin: *");
	header("Content-Type: application/json; charset=UTF-8");

	//include database
	include_once '../config/database.php' ;
	include_once '../objects/kritiksaran.php';


		$database = new Database();
		$db = $database->getConnection();
				
		$kritiksaran = new KritikSaran($db);

		//read product
		//query products
		$stmt = $kritiksaran->read();
		$num = $stmt->rowCount();

		$dataPerPage = 10;
		$jumlahHalaman = ceil($num / $dataPerPage);
		$halamanAktif = $_GET['page'];
		$startPage = ($dataPerPage * $halamanAktif) - $dataPerPage;

		$kritiksaran->dataPerPage = $dataPerPage;
		$kritiksaran->startPage = $startPage;

		$stmt2 = $kritiksaran->readPagination();
		$num2 = $stmt2->rowCount();
		if($num2>=0){

			$kritiksaran_arr=array();
			$kritiksaran_arr["records"]=array();
			$kritiksaran_arr["jumlahHalaman"] = $jumlahHalaman;
			$kritiksaran_arr["halamanAktif"] = $halamanAktif;

			while ($row = $stmt2->fetch(PDO::FETCH_ASSOC)){

				extract($row);

				$kritiksaran_item=array(
					"id_kritiksaran"=>$id_bantuan,
					"nama_kritiksaran"=>$nama_ibu,
					"email_kritiksaran" => $email,
					"tanggal"=>$tanggal		
				);
				array_push($kritiksaran_arr["records"], $kritiksaran_item);

			}
			http_response_code(200);

			echo json_encode($kritiksaran_arr);

		}
		else{
			http_response_code(500);
			echo json_encode(
				array("message" => "500! ERROR ")
			);
		}
	
?>