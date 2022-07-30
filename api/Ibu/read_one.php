<?php
    // required headers
    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Headers: access");
    header("Access-Control-Allow-Methods: GET");
    header("Access-Control-Allow-Credentials: true");
    header('Content-Type: application/json');
    
    // include database and object files
    include_once '../config/database.php';
    include_once '../objects/ibu.php';


        $database = new Database();
        $db = $database->getConnection();
        
        $ibu = new Ibu($db);

        // set ID property of record to read
        $ibu->id_ibu = isset($_GET['id_ibu']) ? $_GET['id_ibu'] : die();

        $ibu->read_one();

        if($ibu->nama_ibu != null){
            // create array
            $ibu_arr = array(
                "id_ibu" =>  $ibu->id_ibu,
                "nik_ibu" => $ibu->nik_ibu,
                "nama_ibu" => $ibu->nama_ibu,
                "alamat_ibu" => $ibu->alamat_ibu,
                "no_telp_ibu" => $ibu->no_telp_ibu 
            );
        
            // set response code - 200 OK
            http_response_code(200);
        
            // make it json format
            echo json_encode($ibu_arr);
        } else {
            // set response code - 404 Not found
            http_response_code(404);
        
            // tell the user product does not exist
            echo json_encode(array("message" => "Product does not exist."));
        }
    

?>