<?php
    // required headers
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");
    header("Access-Control-Allow-Methods: POST");
    header("Access-Control-Max-Age: 3600");
    header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
    
    // include database and object files
    include_once '../config/database.php';
    include_once '../objects/anak.php';
    

        // get database connection
        $database = new Database();
        $db = $database->getConnection();
        
        // prepare anak object
        $anak = new anak($db);

        $data = $_POST['data_anak'];
        $anak->id_anak = $_POST['id_anak'];

        // set anak property values
        $anak->nama_anak = $data['nama_anak'];
        $anak->nik_anak = $data['nik_anak'];
        $anak->tempat_lahir_anak = $data['tempat_lahir_anak'];
        $anak->tgl_lahir_anak = $data['tgl_lahir_anak'];
        $anak->usia_anak = $data['usia_anak'];
        $anak->jk_anak = $data['jk_anak'];
        $anak->id_ibu = $data['id_ibu'];

        // update the anak
        if($anak->update()){
        
            // set response code - 200 ok
            http_response_code(201);
        
            // tell the user
            echo json_encode(array("message" => "anak was updated."));
        }
        
        // if unable to update the anak, tell the user
        else{
        
            // set response code - 503 service unavailable
            http_response_code(503);
        
            // tell the user
            echo json_encode(array("message" => "Unable to update anak."));
        }
    
?>