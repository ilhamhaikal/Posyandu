<?php
    // required headers
    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Headers: access");
    header("Access-Control-Allow-Methods: GET");
    header("Access-Control-Allow-Credentials: true");
    header('Content-Type: application/json');
    
    // include database and object files
    include_once '../config/database.php';
    include_once '../objects/vaksin.php';

    $func_vaksin = $_GET['func_vaksin'];

    if ($func_vaksin == "ambil_single_data"){
        $database = new Database();
        $db = $database->getConnection();
        
        $vaksin = new Vaksin($db);

        // set ID property of record to read
        $vaksin->id_vaksin = isset($_GET['id_vaksin']) ? $_GET['id_vaksin'] : die();

        $vaksin->read_one();

        if($vaksin->nama_vaksin != null){
            // create array
            $vaksin_arr = array(
                "id_vaksin" =>  $vaksin->id_vaksin,
                "nama_vaksin" => $vaksin->nama_vaksin
            );
        
            // set response code - 200 OK
            http_response_code(200);
        
            // make it json format
            echo json_encode($vaksin_arr);
        } else {
            // set response code - 404 Not found
            http_response_code(404);
        
            // tell the user product does not exist
            echo json_encode(array("message" => "vaksin does not exist."));
        }
    }

?>