<?php
    // required headers
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");
    header("Access-Control-Allow-Methods: POST");
    header("Access-Control-Max-Age: 3600");
    header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
    
    // include database and object file
    include_once '../config/database.php';
    include_once '../objects/imunisasi.php';

        // get database connection
        $database = new Database();
        $db = $database->getConnection();
        
        // prepare imunisasi object
        $imunisasi = new Imunisasi($db);
        
        
        // set imunisasi id to be deleted
        $imunisasi->id_imunisasi = $_POST['id_imunisasi'];

        
        // delete the imunisasi
        if($imunisasi->delete()){
        
            // set response code - 200 ok
            http_response_code(200);
        
            // tell the user
            echo json_encode(array("message" => "imunisasi was deleted."));
        }
        
        // if unable to delete the imunisasi
        else{
        
            // set response code - 503 service unavailable
            http_response_code(503);
        
            // tell the user
            echo json_encode(array("message" => "Unable to delete imunisasi."));
        }
    
?>