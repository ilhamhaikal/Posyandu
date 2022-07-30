<?php
    // required headers
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");
    header("Access-Control-Allow-Methods: POST");
    header("Access-Control-Max-Age: 3600");
    header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
    
    // include database and object files
    include_once '../config/database.php';
    include_once '../objects/ibu.php';
    

        // get database connection
        $database = new Database();
        $db = $database->getConnection();
        
        // prepare ibu object
        $ibu = new Ibu($db);

        $data = $_POST['ibu'];
        $ibu->id_ibu = $_POST['id_ibu'];

        // set ibu property values
        $ibu->nama_ibu = $data['nama_ibu'];
        $ibu->nik_ibu = $data['nik_ibu'];
        $ibu->alamat_ibu = $data['alamat_ibu'];
        $ibu->no_telp_ibu = $data['no_telp_ibu'];
        
        // update the ibu
        if($ibu->update()){
        
            // set response code - 200 ok
            http_response_code(201);
        
            // tell the user
            echo json_encode(array("message" => "ibu was updated."));
        }
        
        // if unable to update the ibu, tell the user
        else{
        
            // set response code - 503 service unavailable
            http_response_code(503);
        
            // tell the user
            echo json_encode(array("message" => "Unable to update ibu."));
        }
    
?>