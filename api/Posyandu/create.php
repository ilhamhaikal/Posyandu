<?php
    // required headers
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");
    header("Access-Control-Allow-Methods: POST");
    header("Access-Control-Max-Age: 3600");
    header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
    

    include_once '../config/database.php';
    include_once '../objects/posyandu.php';
    

        $database = new Database();
        $db = $database->getConnection();
        
        $posyandu = new Posyandu($db);
        
        // get posted data
        $data = $_POST['posyandu'];

        
        // make sure data is not empty
        if(
            !empty($data['nama_posyandu']) &&
            !empty($data['alamat_posyandu']) &&
            !empty($data['kel_posyandu']) && 
            !empty($data['kec_posyandu']) &&
            !empty($data['kota_kab_posyandu'])
        ){
        
            // set product property values
            $posyandu->nama_posyandu = $data['nama_posyandu'];
            $posyandu->alamat_posyandu = $data['alamat_posyandu'];
            $posyandu->kel_posyandu = $data['kel_posyandu'];
            $posyandu->kec_posyandu = $data['kec_posyandu'];
            $posyandu->kota_kab_posyandu = $data['kota_kab_posyandu'];
        
            // create the posyandu
            if($posyandu->create()){
        
                // set response code - 201 created
                http_response_code(201);
        
                // tell the user
                echo json_encode(array("message" => "posyandu was created."));
                
            }
        
            // if unable to create the posyandu, tell the user
            else{
        
                // set response code - 503 service unavailable
                http_response_code(503);
        
                // tell the user
                echo json_encode(array("message" => "Unable to create posyandu."));
            }
        }
        
        // tell the user data is incomplete
        else{
        
            // set response code - 400 bad request
            http_response_code(400);
        
            // tell the user
            echo json_encode(array("message" => "Unable to create posyandu. Data is incomplete."));
        }
    
?>