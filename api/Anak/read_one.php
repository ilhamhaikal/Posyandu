<?php
    // required headers
    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Headers: access");
    header("Access-Control-Allow-Methods: GET");
    header("Access-Control-Allow-Credentials: true");
    header('Content-Type: application/json');
    
    // include database and object files
    include_once '../config/database.php';
    include_once '../objects/anak.php';

    $func_anak = $_GET['func_anak'];

    $database = new Database();
    $db = $database->getConnection();
        
    $anak = new Anak($db);

    if ($func_anak == "ambil_option_ibu"){
        $option = $db->query("SELECT id_ibu, nama_ibu FROM ref_ibu");
        echo "<option> PILIH NAMA IBU </option>\n";
        while ($row = $option->fetch(PDO::FETCH_ASSOC)){
            echo "<option value='". $row['id_ibu']. "'>". $row['nama_ibu']. "</option>\n";
        }
    }

    else if ($func_anak == "ambil_single_data"){

        // set ID property of record to read
        $anak->id_anak = isset($_GET['id_anak']) ? $_GET['id_anak'] : die();
        
        $anak->read_one();

        if($anak->nama_anak != null){
            // create array
            $anak_arr = array(
                "id_anak" =>  $anak->id_anak,
                "nama_anak" => $anak->nama_anak,
                "nik_anak" => $anak->nik_anak,
                "tempat_lahir_anak" => $anak->tempat_lahir_anak,
                "tgl_lahir_anak" => $anak->tgl_lahir_anak,
                "usia_anak" => $anak->usia_anak,
                "jk_anak" => $anak->jk_anak,
                "id_ibu" =>$anak->id_ibu
            );
        
            // set response code - 200 OK
            http_response_code(200);
        
            // make it json format
            echo json_encode($anak_arr);
        } else {
            // set response code - 404 Not found
            http_response_code(404);
        
            // tell the user product does not exist
            echo json_encode(array("message" => "anak does not exist."));
        }
    }

?>