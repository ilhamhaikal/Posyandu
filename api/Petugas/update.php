<?php
    // required headers
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");
    header("Access-Control-Allow-Methods: POST");
    header("Access-Control-Max-Age: 3600");
    header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
    
    // include database and object files
    include_once '../config/database.php';
    include_once '../objects/petugas.php';
    

        // get database connection
        $database = new Database();
        $db = $database->getConnection();
        
        // prepare petugas object
        $petugas = new Petugas($db);

        $data = $_POST['petugas'];
        $petugas->id_petugas = $_POST['id_petugas'];

        // set petugas property values
        $petugas->nama_petugas = $data['nama_petugas'];
        //$petugas->jabatan_petugas = $data['jabatan_petugas'];
        $petugas->jk_petugas = $data['jk_petugas'];
        $petugas->tempat_lahir_petugas = $data['tempat_lahir_petugas'];
        $petugas->tgl_lahir_petugas = $data['tgl_lahir_petugas'];
        $petugas->alamat_petugas = $data['alamat_petugas'];
        $petugas->no_telp_petugas = $data['no_telp_petugas'];
        //$petugas->status_petugas = $data['status_petugas'];

        // update the petugas
        if($petugas->update()){
        
            // set response code - 200 ok
            http_response_code(201);
        
            // tell the user
            echo json_encode(array("message" => "petugas was updated."));
        }
        
        // if unable to update the petugas, tell the user
        else{
        
            // set response code - 503 service unavailable
            http_response_code(503);
        
            // tell the user
            echo json_encode(array("message" => "Unable to update petugas."));
        }
    
?>