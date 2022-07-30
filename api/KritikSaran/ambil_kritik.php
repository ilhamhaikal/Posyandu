<?php
    // required headers
    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Headers: access");
    header("Access-Control-Allow-Methods: GET");
    header("Access-Control-Allow-Credentials: true");
    header('Content-Type: application/json');
    
    // include database and object files
    include_once '../config/database.php';
    include_once '../objects/kritiksaran.php';


        $database = new Database();
        $db = $database->getConnection();
        
        $kritiksaran = new KritikSaran($db);

        // set ID property of record to read
        $kritiksaran->id_kritiksaran = isset($_GET['id_kritik']) ? $_GET['id_kritik'] : "";

        $kritiksaran->ambilPesan();

        if($kritiksaran->pesannya != null){
            // create array
            $kritiksaran_arr = array(
                "pesan_kritik" => $kritiksaran->pesannya
            );
        
            // set response code - 200 OK
            http_response_code(200);
        
            // make it json format
            echo json_encode($kritiksaran_arr);
        } else {
            // set response code - 404 Not found
            http_response_code(404);
        
            // tell the user product does not exist
            echo json_encode(array("message" => "Kritik saran does not exist."));
        }
    

?>