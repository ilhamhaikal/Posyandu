<?php
    //required header
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");

    //include database and ibu object
    include_once '../config/database.php';
    include_once '../objects/ibu.php';


        //Initialize Database
        $database = new Database();
        $db = $database->getConnection();

        $ibu = new Ibu($db);

        //Read Ibu
        $stmt = $ibu->read();
        $num = $stmt->rowCount();

        $dataPerPage = 10;
		$jumlahHalaman = ceil($num / $dataPerPage);
		$halamanAktif = $_GET['page'];
		$startPage = ($dataPerPage * $halamanAktif) - $dataPerPage;

		$ibu->dataPerPage = $dataPerPage;
		$ibu->startPage = $startPage;

		$stmt2 = $ibu->readPagination();
		$num2 = $stmt2->rowCount();

        if ($num2 >= 0){

            //Ibu array
            $ibu_arr = array();
            $ibu_arr["records"] = array();
            $ibu_arr["jumlahHalaman"] = $jumlahHalaman;
			$ibu_arr["halamanAktif"] = $halamanAktif;

            while ($row = $stmt2->fetch(PDO::FETCH_ASSOC)){
                extract($row);

                $ibu_item=array(
                    "id_ibu" => $id_ibu,
                    "nama_ibu" => $nama_ibu,
                    "nik_ibu" => $nik_ibu,
                    "alamat_ibu" => $alamat_ibu,
                    "no_telp_ibu" => $no_telp_ibu
                );

                array_push($ibu_arr["records"], $ibu_item);
            }

            http_response_code(200);

            echo json_encode($ibu_arr);

        } else {
            http_response_code(500);

            echo json_encode(
                array("message" => "500 ERROR")
            );
        }
    
?>