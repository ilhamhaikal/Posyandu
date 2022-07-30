<?php
    // required headers
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");
    header("Access-Control-Allow-Methods: POST");
    header("Access-Control-Max-Age: 3600");
    header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
    
    // include database and object file
    include_once '../config/database.php';
    include_once '../objects/ibu.php';
    

        // get database connection
        $database = new Database();
        $db = $database->getConnection();
        
        // prepare ibu object
        $ibu = new Ibu($db);
        
        // set ibu id to be deleted
        $ibu->id_ibu = $_POST['id_ibu'];
        
        // delete the ibu
        if($ibu->delete()){
        
            // set response code - 200 ok
            http_response_code(200);
        
            // tell the user
            echo json_encode(array("message" => "ibu was deleted."));
        }
        
        // if unable to delete the ibu
        else{
        
            // set response code - 503 service unavailable
            http_response_code(503);
        
            // tell the user
            echo json_encode(array("message" => "Unable to delete ibu."));
        }
    
?>