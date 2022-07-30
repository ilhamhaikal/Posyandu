<?php
    // required headers
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");
    header("Access-Control-Allow-Methods: POST");
    header("Access-Control-Max-Age: 3600");
    header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
    

    include_once '../config/database.php';
    include_once '../objects/petugas.php';
    

        $database = new Database();
        $db = $database->getConnection();
        
        $petugas = new petugas($db);
        
        // get posted data
        $data = $_POST['petugas'];

        
        // make sure data is not empty
        if(
            !empty($data['nama_petugas']) &&
            //!empty($data['jabatan_petugas']) &&
            !empty($data['jk_petugas']) &&
            !empty($data['tempat_lahir_petugas']) && 
            !empty($data['tgl_lahir_petugas']) &&
            !empty($data['alamat_petugas']) && 
            !empty($data['no_telp_petugas'])
           // !empty($data['status_petugas'])
        ){
        
            // set product property values
            $petugas->nama_petugas = $data['nama_petugas'];
            // $petugas->jabatan_petugas = $data['jabatan_petugas'];
            $petugas->jk_petugas = $data['jk_petugas'];
            $petugas->tempat_lahir_petugas = $data['tempat_lahir_petugas'];
            $petugas->tgl_lahir_petugas = $data['tgl_lahir_petugas'];
            $petugas->alamat_petugas = $data['alamat_petugas'];
            $petugas->no_telp_petugas = $data['no_telp_petugas'];
            // $petugas->status_petugas = $data['status_petugas'];
        
            // create the petugas
            if($petugas->create()){
        
                // set response code - 201 created
                http_response_code(201);
        
                // tell the user
                echo json_encode(array("message" => "petugas was created."));
                
            }
        
            // if unable to create the petugas, tell the user
            else{
        
                // set response code - 503 service unavailable
                http_response_code(503);
        
                // tell the user
                echo json_encode(array("message" => "Unable to create petugas."));
            }
        }
        
        // tell the user data is incomplete
        else{
        
            // set response code - 400 bad request
            http_response_code(400);
        
            // tell the user
            echo json_encode(array("message" => "Unable to create petugas. Data is incomplete."));
        }
    
?>