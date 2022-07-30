<?php
    // required headers
    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Headers: access");
    header("Access-Control-Allow-Methods: GET");
    header("Access-Control-Allow-Credentials: true");
    header('Content-Type: application/json');
    
    // include database and object files
    include_once '../config/database.php';
    include_once '../objects/Timbangan.php';

    $database = new Database();
    $db = $database->getConnection();
        
    $timbangan = new Timbangan($db);

    $func_timbangan = $_GET['func_timbangan'];

    if ($func_timbangan == "ambil_option_anak"){
        $option = $db->query("SELECT id_anak, nama_anak FROM ref_anak");
        echo "<option> PILIH NAMA ANAK </option>\n";
        while ($row = $option->fetch(PDO::FETCH_ASSOC)){
            echo "<option value='". $row['id_anak']. "'>". $row['nama_anak']. "</option>\n";
        }
    }
    
    else if ($func_timbangan == "ambil_single_data"){
        // set ID property of record to read
        $timbangan->id_timbang = isset($_GET['id_timbangan']) ? $_GET['id_timbangan'] : die();

        $timbangan->read_one();

        if($timbangan->id_timbang != null){
            // create array
            $timbangan_arr = array(
                "tinggi_badan" => $timbangan->tinggi_badan,
                "berat_badan" => $timbangan->berat_badan,
                "nama_anak" => $timbangan->nama_anak
            );
        
            // set response code - 200 OK
            http_response_code(200);
        
            // make it json format
            echo json_encode($timbangan_arr);
        } else {
            // set response code - 404 Not found
            http_response_code(404);
        
            // tell the user product does not exist
            echo json_encode(array("message" => "Timbangan does not exist."));
        }
    
    }
?>