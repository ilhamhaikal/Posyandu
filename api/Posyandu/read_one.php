<?php
    // required headers
    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Headers: access");
    header("Access-Control-Allow-Methods: GET");
    header("Access-Control-Allow-Credentials: true");
    header('Content-Type: application/json');
    
    // include database and object files
    include_once '../config/database.php';
    include_once '../objects/posyandu.php';

    $func_posyandu = $_GET['func_posyandu'];

    if ($func_posyandu == "ambil_single_data"){
        $database = new Database();
        $db = $database->getConnection();
        
        $posyandu = new Posyandu($db);

        // set ID property of record to read
        $posyandu->id_posyandu = isset($_GET['id_posyandu']) ? $_GET['id_posyandu'] : die();

        $posyandu->read_one();

        if($posyandu->nama_posyandu != null){
            // create array
            $posyandu_arr = array(
                "id_posyandu" =>  $posyandu->id_posyandu,
                "nama_posyandu" => $posyandu->nama_posyandu,
                "alamat_posyandu" => $posyandu->alamat_posyandu,
                "kel_posyandu" => $posyandu->kel_posyandu,
                "kec_posyandu" => $posyandu->kec_posyandu,
                "kota_kab_posyandu" => $posyandu->kota_kab_posyandu
            );
        
            // set response code - 200 OK
            http_response_code(200);
        
            // make it json format
            echo json_encode($posyandu_arr);
        } else {
            // set response code - 404 Not found
            http_response_code(404);
        
            // tell the user product does not exist
            echo json_encode(array("message" => "posyandu does not exist."));
        }
    }

?>