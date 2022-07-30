<?php
    // required headers
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");
    header("Access-Control-Allow-Methods: POST");
    header("Access-Control-Max-Age: 3600");
    header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
    
    // include database and object file
    include_once '../config/database.php';
    include_once '../objects/account.php';
    
        // get database connection
        $database = new Database();
        $db = $database->getConnection();
        
        // prepare account object
        $account = new Account($db);
        
        
        // set account id to be deleted
        $account->id_login = $_GET['id_login'];
        
        // delete the account
        if($account->delete()){
        
            // set response code - 200 ok
            http_response_code(200);
        
            // tell the user
            echo json_encode(array("message" => "account was deleted."));
        }
        
        // if unable to delete the account
        else{
        
            // set response code - 503 service unavailable
            http_response_code(503);
        
            // tell the user
            echo json_encode(array("message" => "Unable to delete account."));
        }
    
?>