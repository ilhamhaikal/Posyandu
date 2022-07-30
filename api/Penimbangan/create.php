<?php
    // required headers
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");
    header("Access-Control-Allow-Methods: POST");
    header("Access-Control-Max-Age: 3600");
    header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
    

    include_once '../config/database.php';
    include_once '../objects/timbangan.php';


    $database = new Database();
    $db = $database->getConnection();
        
    $timbangan = new Timbangan($db);

    if ($_SERVER['REQUEST_METHOD'] == "GET"){
        $func_Penimbangan = $_GET['func_Penimbangan'];
        if ($func_Penimbangan == "ambil_option_anak"){
            $option = $db->query("SELECT id_anak, nama_anak FROM ref_anak");
            echo "<option> PILIH NAMA ANAK </option>\n";
            while ($row = $option->fetch(PDO::FETCH_ASSOC)){
                echo "<option value='". $row['id_anak'].  "'>". $row['nama_anak'] . "</option>\n";
            }
        }
    }

    else {
        // get posted data
        $data = $_POST['Penimbangan'];
        
        // make sure data is not empty
        if(
            !empty($data['tinggi_badan']) &&
            !empty($data['berat_badan']) &&
            !empty($data['nama_anak'])
        ){
        
            // set product property values
            // $Timbangan->tgl_Timbangan = $data['tgl_Timbangan'];
            $timbangan->tinggi_badan = $data['tinggi_badan'];
            $timbangan->berat_badan = $data['berat_badan'];
            $timbangan->nama_anak = isset($data['nama_anak']) ? $data['nama_anak'] : "";
        
            // create the timbangan
            if($timbangan->create()){
                
                // set response code - 201 created
                http_response_code(201);
        
                // tell the user
                echo json_encode(array("message" => "Timbangan was created."));
                
            }
        
            // if unable to create the Timbangan, tell the user
            else{
        
                // set response code - 503 service unavailable
                http_response_code(503);
        
                // tell the user
                echo json_encode(array("message" => "Unable to create Timbangan."));
            }
        }
        
        // tell the user data is incomplete
        else{
        
            // set response code - 400 bad request
            http_response_code(400);
        
            // tell the user
            echo json_encode(array("message" => "Unable to create Timbangan. Data is incomplete."));
        }
    } 
    
?>