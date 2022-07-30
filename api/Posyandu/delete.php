<?php
    // required headers
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");
    header("Access-Control-Allow-Methods: POST");
    header("Access-Control-Max-Age: 3600");
    header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
    
    // include database and object file
    include_once '../config/database.php';
    include_once '../objects/posyandu.php';
    
    $func_posyandu = $_POST['func_posyandu'];

    if ($func_posyandu == "delete"){
        // get database connection
        $database = new Database();
        $db = $database->getConnection();
        
        // prepare posyandu object
        $posyandu = new Posyandu($db);
        
        // set posyandu id to be deleted
        $posyandu->id_posyandu = $_POST['id_posyandu'];
        
        // delete the posyandu
        if($posyandu->delete()){
        
            // set response code - 200 ok
            http_response_code(200);
        
            // tell the user
            echo json_encode(array("message" => "posyandu was deleted."));
        }
        
        // if unable to delete the posyandu
        else{
        
            // set response code - 503 service unavailable
            http_response_code(503);
        
            // tell the user
            echo json_encode(array("message" => "Unable to delete posyandu."));
        }
    }
?>