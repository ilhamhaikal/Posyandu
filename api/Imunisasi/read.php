<?php

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

//include database
include_once '../config/database.php' ;
include_once '../objects/imunisasi.php';

//inistantiate database and product object

		$database = new Database();
		$db = $database->getConnection();

		//initialize object
		$imun = new Imunisasi($db);

		//read product
		//query products
		$stmt = $imun->read();
		$num = $stmt->rowCount();

		$dataPerPage = 10;
		$jumlahHalaman = ceil($num / $dataPerPage);
		$halamanAktif = $_GET['page'];
		$startPage = ($dataPerPage * $halamanAktif) - $dataPerPage;

		$imun->dataPerPage = $dataPerPage;
		$imun->startPage = $startPage;

		$stmt2 = $imun->readPagination();
		$num2 = $stmt2->rowCount();
		//check if more than 0 record found
		if($num2>=0){

			$imun_arr=array();
			$imun_arr["records"]=array();
			$imun_arr["jumlahHalaman"] = $jumlahHalaman;
			$imun_arr["halamanAktif"] = $halamanAktif;

			while ($row = $stmt2->fetch(PDO::FETCH_ASSOC)){
				extract($row);
				
				$imun=array(
						"id_imunisasi"=>$id_imunisasi,
						"tgl_imunisasi"=>$tgl_imunisasi,
						"usia_saat_vaksin"=>$usia_saat_vaksin,
						"tinggi_badan"=>$tinggi_badan,
						"berat_badan_umur"=>$berat_badan_umur,
						"berat_badan_berdiri"=>$berat_badan_berdiri,
						"berat_badan_terlentang"=>$berat_badan_terlentang,
						"periode"=>$periode,
						"nama_anak"=>$nama_anak,
						"nama_petugas"=>$nama_petugas,
						"nama_vaksin"=>$id_vaksin,
						"nama_ibu"=>$nama_ibu,
				);
			array_push($imun_arr["records"], $imun);
			}
			http_response_code(200);

			echo json_encode($imun_arr);

		}
		else{
			http_response_code(500);
			echo json_encode(
				array("message" => "500 ERROR!")
			);
		}
	
?>