<?php
    // required headers
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");
    header("Access-Control-Allow-Methods: POST");
    header("Access-Control-Max-Age: 3600");
    header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
    
    // include database and object files
    include_once '../config/database.php';
    include_once '../objects/imunisasi.php';
    

        // get database connection
        $database = new Database();
        $db = $database->getConnection();
        
        // prepare imunisasi object
        $imunisasi = new Imunisasi($db);

        $data = $_POST['imunisasi'];
        $imunisasi->id_imunisasi = $_POST['id_imunisasi'];

        // set imunisasi property values
        $imunisasi->tgl_imunisasi = $data['tgl_imunisasi'];
        $imunisasi->usia_saat_vaksin = $data['usia_saat_vaksin'];
        $imunisasi->tinggi_badan = $data['tinggi_badan'];
        $imunisasi->berat_badan_umur = $data['berat_badan_umur'];
        $imunisasi->berat_badan_berdiri = $data['berat_badan_berdiri'];
        $imunisasi->berat_badan_terlentang = $data['berat_badan_terlentang'];
        $imunisasi->periode = $data['periode'];
        $imunisasi->nama_anak = $data['nama_anak'];
        $imunisasi->nama_petugas = $data['nama_petugas'];
        $imunisasi->nama_vaksin = $data['nama_vaksin'];
        $imunisasi->nama_ibu = $data['nama_ibu'];


        // update the imunisasi
        if($imunisasi->update()){
        
            // set response code - 200 ok
            http_response_code(201);
        
            // tell the user
            echo json_encode(array("message" => "imunisasi was updated."));
        }
        
        // if unable to update the imunisasi, tell the user
        else{
        
            // set response code - 503 service unavailable
            http_response_code(503);
        
            // tell the user
            echo json_encode(array("message" => "Unable to update imunisasi."));
        }
    
?>