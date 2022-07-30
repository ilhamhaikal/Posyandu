<?php

	header("Access-Control-Allow-Origin: *");
	header("Content-Type: application/json; charset=UTF-8");

	//include database
	include_once '../config/database.php' ;
	include_once '../objects/account.php';

	//inistantiate database and product object
	$database = new Database();
	$db = $database->getConnection();

	//initialize object
	$account = new Account($db);
		
	$stmt = $account->read();
	$num = $stmt->rowCount();

	$dataPerPage = 10;
	$jumlahHalaman = ceil($num / $dataPerPage);
	$halamanAktif = $_GET['page'];
	$startPage = ($dataPerPage * $halamanAktif) - $dataPerPage;

	$account->dataPerPage = $dataPerPage;
	$account->startPage = $startPage;

	$stmt2 = $account->readPagination();
	$num2 = $stmt2->rowCount();

	//check if more than 0 record found
	if($num2>=0){

		$account_arr=array();
		$account_arr["records"]=array();
		$account_arr["jumlahHalaman"] = $jumlahHalaman;
		$account_arr["halamanAktif"] = $halamanAktif;

		while ($row = $stmt2->fetch(PDO::FETCH_ASSOC)){

			extract($row);

				$account=array(
					"id_login"=>$id_login,
					"nama_petugas"=>$nama_petugas,
					"username"=>$username
				);
			array_push($account_arr["records"], $account);
		}
		http_response_code(200);

		echo json_encode($account_arr);

	}
	else{
		http_response_code(404);
		echo json_encode(
			array("message" => "404! Not Found ")
		);
	}
?>