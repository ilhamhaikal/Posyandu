<?php
    // required headers
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");
    header("Access-Control-Allow-Methods: POST");
    header("Access-Control-Max-Age: 3600");
    header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
    

    include_once '../config/database.php';
    include_once '../objects/anak.php';

    $database = new Database();
    $db = $database->getConnection();
        
    $anak = new Anak($db);
      

    if ($_SERVER['REQUEST_METHOD'] == "GET"){
            
        $option = $db->query("SELECT id_ibu, nama_ibu FROM ref_ibu");
        echo "<option> PILIH NAMA IBU </option>\n";
        while ($row = $option->fetch(PDO::FETCH_ASSOC)){
            echo "<option value='". $row['id_ibu']. "'>". $row['nama_ibu']. "</option>\n";
        }
    }
    else if ($_SERVER['REQUEST_METHOD'] == "POST"){
            
        // get posted data
        $data = $_POST['data_anak'];
         // make sure data is not empty
        if(
            !empty($data['nama_anak']) &&
            !empty($data['nik_anak']) &&
            !empty($data['tempat_lahir_anak']) && 
            !empty($data['tgl_lahir_anak'])&&
            !empty($data['usia_anak'])&&
            !empty($data['jk_anak'])
        ){
            
            // set product property values
            $anak->nama_anak = $data['nama_anak'];
            $anak->nik_anak = $data['nik_anak'];
            $anak->tempat_lahir_anak = $data['tempat_lahir_anak'];
            $anak->tgl_lahir_anak = $data['tgl_lahir_anak'];
            $anak->usia_anak = $data['usia_anak'];
            $anak->jk_anak = $data['jk_anak'];
            
            $anak->id_ibu = isset($data['id_ibu']) ? $data['id_ibu'] : "";
        
             // create the imunisasi
            if($anak->create()){
        
                // set response code - 201 created
                http_response_code(201);
        
                // tell the user
                echo json_encode(
                    array("message" => "Data Anak berhasil Ditambah", "status" => 200));
                
            }

            // if unable to create the imunisasi, tell the user
            else{
        
                 // set response code - 503 service unavailable
                http_response_code(503);
        
                // tell the user
                echo json_encode(array("message" => "data anak tidak berhasil ditambahkan."));
            }
        }
            // tell the user data is incomplete
            else{
        
            // set response code - 400 bad request
            http_response_code(400);
        
            // tell the user
            echo json_encode(array("message" => "Unable to create data anak. Data is incomplete."));
            echo"<script type='text/javascript'>alert('DATA TIDAK KOMPLIT'  )</script>;";
        }
        
    }
?>