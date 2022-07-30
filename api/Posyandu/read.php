<?php
    //required header
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");

    //include database and ibu object
    include_once '../config/database.php';
    include_once '../objects/posyandu.php';

    $func_posyandu = $_GET['func_posyandu'];

    if ($func_posyandu == "ambil_data_posyandu"){
        //Initialize Database
        $database = new Database();
        $db = $database->getConnection();

        $posyandu = new Posyandu($db);

        //Read Ibu
        $stmt = $posyandu->read();
        $num = $stmt->rowCount();

        if ($num >= 0){

            //Ibu array
            $posyandu_arr = array();
            $posyandu_arr["records"] = array();

            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
                extract($row);

                $posyandu_item=array(
                    "id_posyandu" => $id_posyandu,
                    "nama_posyandu" => $nama_posyandu,
                    "alamat_posyandu" => $alamat_posyandu,
                    "kel_posyandu" => $kel_posyandu,
                    "kec_posyandu" => $kec_posyandu,
                    "kota_kab_posyandu" => $kota_kab_posyandu
                );

                array_push($posyandu_arr["records"], $posyandu_item);
            }

            http_response_code(200);

            echo json_encode($posyandu_arr);

        } else {
            http_response_code(500);

            echo json_encode(
                array("message" => "500 Error")
            );
        }
    }
?>