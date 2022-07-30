<?php
    // required headers
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");
    header("Access-Control-Allow-Methods: POST");
    header("Access-Control-Max-Age: 3600");
    header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
    
    // include database and object files
    include_once '../config/database.php';
    include_once '../objects/vaksin.php';
    
        // get database connection
        $database = new Database();
        $db = $database->getConnection();
        
        // prepare vaksin object
        $vaksin = new vaksin($db);

        $data = $_POST['vaksin'];
        $vaksin->id_vaksin = $_POST['id_vaksin'];

        // set vaksin property values
        $vaksin->nama_vaksin = $data['nama_vaksin'];

        // update the vaksin
        if($vaksin->update()){
        
            // set response code - 200 ok
            http_response_code(201);
        
            // tell the user
            echo json_encode(array("message" => "vaksin was updated."));
        }
        
        // if unable to update the vaksin, tell the user
        else{
        
            // set response code - 503 service unavailable
            http_response_code(503);
        
            // tell the user
            echo json_encode(array("message" => "Unable to update vaksin."));
        }
    
?>