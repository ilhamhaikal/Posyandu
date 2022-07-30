<?php
    // required headers
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");
    header("Access-Control-Allow-Methods: POST");
    header("Access-Control-Max-Age: 3600");
    header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
    
    // include database and object file
    include_once '../config/database.php';
    include_once '../objects/anak.php';
    

        // get database connection
        $database = new Database();
        $db = $database->getConnection();
        
        // prepare anak object
        $anak = new Anak($db);
        
        // set anak id to be deleted
        $anak->id_anak = $_POST['id_anak'];
        
        // delete the ibu
        if($anak->delete()){
        
            // set response code - 200 ok
            http_response_code(200);
        
            // tell the user
            echo json_encode(array("message" => "Anak was deleted.", "status" => 200));
        }
        
        // if unable to delete the ibu
        else{
        
            // set response code - 503 service unavailable
            http_response_code(503);
        
            // tell the user
            echo json_encode(array("message" => "Unable to delete anak."));
        }
    
?>