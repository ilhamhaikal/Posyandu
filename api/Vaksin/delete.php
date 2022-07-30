<?php
    // required headers
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");
    header("Access-Control-Allow-Methods: POST");
    header("Access-Control-Max-Age: 3600");
    header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
    
    // include database and object file
    include_once '../config/database.php';
    include_once '../objects/vaksin.php';
    
    $func_vaksin = $_POST['func_vaksin'];

    if ($func_vaksin == "delete"){
        // get database connection
        $database = new Database();
        $db = $database->getConnection();
        
        // prepare vaksin object
        $vaksin = new Vaksin($db);
        
        // set vaksin id to be deleted
        $vaksin->id_vaksin = $_POST['id_vaksin'];
        
        // delete the vaksin
        if($vaksin->delete()){
        
            // set response code - 200 ok
            http_response_code(200);
        
            // tell the user
            echo json_encode(array("message" => "vaksin was deleted."));
        }
        
        // if unable to delete the vaksin
        else{
        
            // set response code - 503 service unavailable
            http_response_code(503);
        
            // tell the user
            echo json_encode(array("message" => "Unable to delete vaksin."));
        }
    }
?>