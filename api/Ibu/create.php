<?php
    // required headers
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");
    header("Access-Control-Allow-Methods: POST");
    header("Access-Control-Max-Age: 3600");
    header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
    

    include_once '../config/database.php';
    include_once '../objects/ibu.php';

        $database = new Database();
        $db = $database->getConnection();
        
        $ibu = new Ibu($db);
        
        // get posted data
        $data = $_POST['ibu'];
        
        // make sure data is not empty
        if(
            !empty($data['nama_ibu']) &&
            !empty($data['nik_ibu']) &&
            !empty($data['alamat_ibu']) && 
            !empty($data['no_telp_ibu'])
        ){
        
            // set product property values
            $ibu->nama_ibu = $data['nama_ibu'];
            $ibu->nik_ibu = $data['nik_ibu'];
            $ibu->alamat_ibu = $data['alamat_ibu'];
            $ibu->no_telp_ibu = $data['no_telp_ibu'];
        
            // create the ibu
            if($ibu->create()){
        
                // set response code - 201 created
                http_response_code(201);
        
                // tell the user
                echo json_encode(array("message" => "ibu was created."));
                
            }
        
            // if unable to create the ibu, tell the user
            else{
        
                // set response code - 503 service unavailable
                http_response_code(503);
        
                // tell the user
                echo json_encode(array("message" => "Unable to create ibu."));
            }
        }
        
        // tell the user data is incomplete
        else{
        
            // set response code - 400 bad request
            http_response_code(400);
        
            // tell the user
            echo json_encode(array("message" => "Unable to create ibu. Data is incomplete."));
        }
    
?>