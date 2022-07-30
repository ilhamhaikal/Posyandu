<?php

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

//include database
include_once '../config/database.php' ;
include_once '../objects/timbangan.php';

//inistantiate database and product object

		$database = new Database();
		$db = $database->getConnection();

		//initialize object
		$timbang = new Timbangan($db);

		//read product
		//query products
		$stmt = $timbang->read();
		$num = $stmt->rowCount();

		$dataPerPage = 10;
		$jumlahHalaman = ceil($num / $dataPerPage);
		$halamanAktif = $_GET['page'];
		$startPage = ($dataPerPage * $halamanAktif) - $dataPerPage;

		$timbang->dataPerPage = $dataPerPage;
		$timbang->startPage = $startPage;

		$stmt2 = $timbang->readPagination();
		$num2 = $stmt2->rowCount();
		//check if more than 0 record found
		if($num2>=0){

			$timbang_arr=array();
			$timbang_arr["records"]=array();
			$timbang_arr["jumlahHalaman"] = $jumlahHalaman;
			$timbang_arr["halamanAktif"] = $halamanAktif;

			while ($row = $stmt2->fetch(PDO::FETCH_ASSOC)){

			extract($row);

			$timbang=array(
					"id_timbangan"=>$id_timbangan,
					"nama_anak"=>$nama_anak,
					"nama_ibu"=>$nama_ibu,
					"alamat"=>$alamat_ibu,
					"status_kel"=>$status_kel,
					"jk_anak"=>$jk_anak,
					"tanggal_lahir"=>$tgl_lahir_anak,
					"usia_anak"=>$usia_anak,
                    "berat_badan"=>$berat_badan,
                    "tinggi_badan"=>$tinggi_badan
                );
			array_push($timbang_arr["records"], $timbang);
			}
			http_response_code(200);

			echo json_encode($timbang_arr);

		}
		else{
			http_response_code(500);
			echo json_encode(
				array("message" => "500 ERROR ")
			);
		}
	
?>