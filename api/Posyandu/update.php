<?php
    // required headers
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");
    header("Access-Control-Allow-Methods: POST");
    header("Access-Control-Max-Age: 3600");
    header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
    
    // include database and object files
    include_once '../config/database.php';
    include_once '../objects/posyandu.php';
    

        // get database connection
        $database = new Database();
        $db = $database->getConnection();
        
        // prepare posyandu object
        $posyandu = new Posyandu($db);

        $data = $_POST['posyandu'];
        $posyandu->id_posyandu = $_POST['id_posyandu'];

        // set posyandu property values
        $posyandu->nama_posyandu = $data['nama_posyandu'];
        $posyandu->alamat_posyandu = $data['alamat_posyandu'];
        $posyandu->kel_posyandu = $data['kel_posyandu'];
        $posyandu->kec_posyandu = $data['kec_posyandu'];
        $posyandu->kota_kab_posyandu = $data['kota_kab_posyandu'];

        // update the posyandu
        if($posyandu->update()){
        
            // set response code - 200 ok
            http_response_code(201);
        
            // tell the user
            echo json_encode(array("message" => "posyandu was updated."));
        }
        
        // if unable to update the posyandu, tell the user
        else{
        
            // set response code - 503 service unavailable
            http_response_code(503);
        
            // tell the user
            echo json_encode(array("message" => "Unable to update posyandu."));
        }
    
?>